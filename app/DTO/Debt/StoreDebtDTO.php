<?php

namespace App\DTO\Debt;

class StoreDebtDTO
{
    public function __construct(
        public readonly int $company_id,
        public readonly string $client_name,
        public readonly string $client_identifier,
        public readonly string $client_phone,
        public readonly int $amount,
        public readonly string $due_date,
        public readonly string $issued_at,
        public readonly int $percent = 0,
        public readonly ?string $description = null,
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
            'status' => $this->status,
        ];
    }
}
