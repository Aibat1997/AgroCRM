<?php

namespace App\DTO;

class OrderProductDTO
{
    public function __construct(
        public readonly int $warehouse_item_id,
        public readonly int $quantity,
        public readonly float $unit_price
    ) {}

    /**
     * @param array{ id: int, quantity: int, price: float } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            warehouse_item_id: $data['id'],
            quantity: $data['quantity'],
            unit_price: $data['price']
        );
    }

    /**
     * @param list<array{ id: int, quantity: int, price: float }> $items
     * @return list<OrderProductDTO>
     */
    public static function fromArrayList(array $items): array
    {
        return array_map(fn($item) => self::fromArray($item), $items);
    }

    public function toArray(): array
    {
        return [
            'warehouse_item_id' => $this->warehouse_item_id,
            'quantity' => $this->quantity,
            'unit_price' => $this->unit_price,
        ];
    }
}
