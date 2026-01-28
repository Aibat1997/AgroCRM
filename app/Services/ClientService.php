<?php

namespace App\Services;

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
}
