<?php

namespace App\DTO;

use App\Contracts\ClientDataProviderInterface;

class DebtDTO implements ClientDataProviderInterface
{
    public function __construct(
        public readonly int $company_id,
        public readonly string $client_name,
        public readonly string $client_identifier,
        public readonly string $client_phone,
        public readonly int $amount,
        public readonly string $due_date,
        public readonly int $percent = 0,
        public readonly string $issued_at,
        public readonly ?string $description = null,
        public readonly bool $is_client_owes,
        public readonly ?string $status = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            company_id: (int) $data['company_id'],
            client_name: (string) $data['client_name'],
            client_identifier: (string) $data['client_identifier'],
            client_phone: (string) $data['client_phone'],
            amount: (int) $data['amount'],
            due_date: (string) $data['due_date'],
            percent: (int) ($data['percent'] ?? 0),
            issued_at: today()->toDateString(),
            description: isset($data['description']) ? (string) $data['description'] : null,
            is_client_owes: (bool) $data['is_client_owes'],
            status: isset($data['status']) ? (string) $data['status'] : null,
        );
    }

    public function toArray(): array
    {
        return [
            'company_id' => $this->company_id,
            'client_name' => $this->client_name,
            'client_identifier' => $this->client_identifier,
            'client_phone' => $this->client_phone,
            'amount' => $this->amount,
            'due_date' => $this->due_date,
            'percent' => $this->percent,
            'issued_at' => $this->issued_at,
            'description' => $this->description,
            'is_client_owes' => $this->is_client_owes,
            'status' => $this->status,
        ];
    }

    public function getClientData(): array
    {
        return [
            'name' => $this->client_name,
            'identifier' => $this->client_identifier,
            'phone' => $this->client_phone,
        ];
    }
}
