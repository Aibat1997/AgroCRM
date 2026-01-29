<?php

namespace App\Services;

use App\Contracts\ClientDataProviderInterface;
use App\DTO\ClientDTO;
use App\Models\Client;

class ClientService
{
    public function store(ClientDTO $dto): Client
    {
        return Client::create([
            'name' => $dto->name,
            'identifier' => $dto->identifier,
            'phone' => $dto->phone,
        ]);
    }

    public function update(ClientDTO $dto, Client $client): Client
    {
        $client->update([
            'name' => $dto->name,
            'identifier' => $dto->identifier,
            'phone' => $dto->phone,
        ]);

        return $client;
    }

    public function findOrCreateByIdentifier(ClientDataProviderInterface $provider): Client
    {
        $clientDTO = ClientDTO::fromArray($provider->getClientData());
        $client = Client::where('identifier', $clientDTO->identifier)->first();

        if (!$client) {
            $client = $this->store($clientDTO);
        }

        return $client;
    }
}
