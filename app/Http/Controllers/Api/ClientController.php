<?php

namespace App\Http\Controllers\Api;

use App\DTO\ClientDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Client\StoreClientRequest;
use App\Http\Requests\Api\Client\UpdateClientRequest;
use App\Http\Resources\ClientResource;
use App\Models\Client;
use App\Services\ClientService;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function __construct(private readonly ClientService $clientService) {}

    public function index(Request $request)
    {
        $clients = Client::filter($request->all())->paginate(15);
        return ClientResource::collection($clients)->additional(['success' => true]);
    }

    public function store(StoreClientRequest $request)
    {
        $dto = ClientDTO::fromArray($request->validated());
        $client = $this->clientService->store($dto);

        return $this->return_success(new ClientResource($client));
    }

    public function show(Client $client)
    {
        return $this->return_success(new ClientResource($client));
    }

    public function update(UpdateClientRequest $request, Client $client)
    {
        $dto = ClientDTO::fromArray($request->validated());
        $this->clientService->update($dto, $client);

        return $this->return_success(new ClientResource($client));
    }

    public function destroy(Client $client)
    {
        $client->delete();
        return $this->return_success();
    }

    public function restore(Client $client)
    {
        //
    }
}
