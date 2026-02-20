<?php

namespace App\DTO;

class OrderProductDTO
{
    public function __construct(
        public readonly int $warehouse_item_id,
        public readonly int $currency_id,
        public readonly float $currency_price,
        public readonly int $quantity,
        public readonly ?string $supplier,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            warehouse_item_id: (int)$data['warehouse_item_id'],
            currency_id: (int)$data['currency_id'],
            currency_price: (float)$data['currency_price'],
            quantity: (int)$data['quantity'],
            supplier: isset($data['supplier']) ? (string)$data['supplier'] : null,
        );
    }

    public function toArray(): array
    {
        return [
            'warehouse_item_id' => $this->warehouse_item_id,
            'currency_id' => $this->currency_id,
            'currency_price' => $this->currency_price,
            'quantity' => $this->quantity,
            'supplier' => $this->supplier,
        ];
    }
}
