<?php

namespace App\DTO;

class CreditDTO
{
    public function __construct(
        public readonly int $company_id,
        public readonly string $bank_name,
        public readonly int $amount,
        public readonly int $term_in_months,
        public readonly int $payment_frequency_id,
        public readonly int $payment_frequency_amount,
        public readonly string $description,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            company_id: (int) $data['company_id'],
            bank_name: (string) $data['bank_name'],
            amount: (int) $data['amount'],
            term_in_months: (int) $data['term_in_months'],
            payment_frequency_id: (int) $data['payment_frequency_id'],
            payment_frequency_amount: (int) $data['payment_frequency_amount'],
            description: (string) $data['description'],
        );
    }

    public function toArray(): array
    {
        return [
            'company_id' => $this->company_id,
            'bank_name' => $this->bank_name,
            'amount' => $this->amount,
            'term_in_months' => $this->term_in_months,
            'payment_frequency_id' => $this->payment_frequency_id,
            'payment_frequency_amount' => $this->payment_frequency_amount,
            'description' => $this->description,
        ];
    }
}
