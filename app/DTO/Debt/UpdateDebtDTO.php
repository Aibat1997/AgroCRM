<?php

namespace App\DTO\Debt;

class UpdateDebtDTO
{
    public function __construct(
        public readonly int $amount,
        public readonly bool $paid_with_raw_materials,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            amount: (int) ($data['amount'] ?? 0),
            paid_with_raw_materials: (bool) ($data['paid_with_raw_materials'] ?? false),
        );
    }

    public function toArray(): array
    {
        return [
            'amount' => $this->amount,
            'paid_with_raw_materials' => $this->paid_with_raw_materials,
        ];
    }
}
