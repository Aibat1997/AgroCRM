<?php

namespace App\DTO;

class TransactionDTO
{
    public function __construct(
        public readonly int $transaction_type_id,
        public readonly ?int $company_id = null,
        public readonly int $amount,
        public readonly string $description,
        public readonly ?array $additional_fields = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            transaction_type_id: (int) $data['transaction_type_id'],
            company_id: isset($data['company_id']) ? (int) $data['company_id'] : null,
            amount: (int) $data['amount'],
            description: (string) $data['description'],
            additional_fields: isset($data['additional_fields']) ? (array) $data['additional_fields'] : null,
        );
    }

    public function toArray(): array
    {
        return [
            'transaction_type_id' => $this->transaction_type_id,
            'company_id' => $this->company_id,
            'amount' => $this->amount,
            'description' => $this->description,
            'additional_fields' => $this->additional_fields,
        ];
    }
}
