<?php

namespace App\Http\Controllers\Api;

use App\DTO\ClientDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Client\StoreClientRequest;
use App\Http\Requests\Api\Client\UpdateClientRequest;
use App\Http\Resources\Client\ClientCollection;
use App\Http\Resources\Client\ClientResource;
use App\Http\Resources\EmptyResource;
use App\Models\Client;
use App\Services\ClientService;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function __construct(private readonly ClientService $clientService) {}

    public function index(Request $request)
    {
        $clients = Client::filter($request->all())->paginate(15);
        return new ClientCollection($clients);
    }

    public function store(StoreClientRequest $request)
    {
        $dto = ClientDTO::fromArray($request->validated());
        $client = $this->clientService->store($dto);

        return new ClientResource($client);
    }

    public function show(Client $client)
    {
        return new ClientResource($client);
    }

    public function update(UpdateClientRequest $request, Client $client)
    {
        $dto = ClientDTO::fromArray($request->validated());
        $this->clientService->update($dto, $client);

        return new ClientResource($client);
    }

    public function destroy(Client $client)
    {
        $client->delete();
        return EmptyResource::success();
    }

    public function restore(Client $client)
    {
        //
    }
}
