<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Client\StoreClientRequest;
use App\Http\Requests\Api\Client\UpdateClientRequest;
use App\Http\Resources\ClientResource;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(Request $request)
    {
        $clients = Client::filter($request->all())->paginate(15);
        return ClientResource::collection($clients)->additional(['success' => true]);
    }

    public function store(StoreClientRequest $request)
    {
        $client = Client::create($request->validated());
        return $this->return_success(new ClientResource($client));
    }

    public function show(Client $client)
    {
        return $this->return_success(new ClientResource($client));
    }

    public function update(UpdateClientRequest $request, Client $client)
    {
        $client->update($request->validated());
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
