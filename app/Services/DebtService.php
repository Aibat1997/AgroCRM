<?php

namespace App\Services;

use App\DTO\ClientDTO;
use App\DTO\DebtDTO;
use App\Enums\DebtStatus;
use App\Models\Client;
use App\Models\Debt;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;

class DebtService
{
    public function __construct(
        private readonly ClientService $clientService,
    ) {}

    /**
     * Create a new debt
     *
     * @throws Exception
     */
    public function store(DebtDTO $dto): Debt
    {
        try {
            $client = $this->findOrCreateClient($dto);

            return Debt::create([
                'company_id' => $dto->company_id,
                'client_id' => $client->id,
                'amount' => $dto->amount,
                'percent' => $dto->percent,
                'issued_at' => today()->toDateString(),
                'due_date' => $dto->due_date,
                'description' => $dto->description,
                'is_client_owes' => $dto->is_client_owes,
                'status' => DebtStatus::ACTIVE->value,
            ]);
        } catch (Exception $e) {
            Log::error('Failed to store debt', [
                'error' => $e->getMessage(),
                'dto' => $dto->toArray(),
            ]);
            throw $e;
        }
    }

    /**
     * Update an existing debt
     *
     * @throws ModelNotFoundException|Exception
     */
    public function update(DebtDTO $dto, Debt $debt): Debt
    {
        try {
            $client = $this->findOrCreateClient($dto);

            $updateData = [
                'company_id' => $dto->company_id,
                'client_id' => $client->id,
                'amount' => $dto->amount,
                'percent' => $dto->percent,
                'issued_at' => today()->toDateString(),
                'due_date' => $dto->due_date,
                'description' => $dto->description,
                'is_client_owes' => $dto->is_client_owes,
                'status' => $dto->status,
            ];

            $debt->update($updateData);

            return $debt;
        } catch (Exception $e) {
            Log::error('Failed to update debt', [
                'error' => $e->getMessage(),
                'debt_id' => $debt->id,
                'dto' => $dto->toArray(),
            ]);
            throw $e;
        }
    }

    /**
     * Find existing client or create a new one
     */
    private function findOrCreateClient(DebtDTO $dto): Client
    {
        $client = Client::where('identifier', $dto->client_identifier)->first();

        if (!$client) {
            $clientDTO = new ClientDTO(
                name: $dto->client_name,
                identifier: $dto->client_identifier,
                phone: $dto->client_phone
            );

            $client = $this->clientService->store($clientDTO);
        }

        return $client;
    }
}
