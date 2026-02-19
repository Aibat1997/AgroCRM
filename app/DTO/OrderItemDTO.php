<?php

namespace App\DTO;

class OrderItemDTO
{
    public function __construct(
        public readonly int $id,
        public readonly int $quantity,
        public readonly float $price
    ) {}

    /**
     * @param array{ id: int, quantity: int, price: float } $data
     */
    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'],
            quantity: $data['quantity'],
            price: $data['price']
        );
    }

    /**
     * @param list<array{ id: int, quantity: int, price: float }> $items
     * @return list<OrderItemDTO>
     */
    public static function fromArrayList(array $items): array
    {
        return array_map(fn($item) => self::fromArray($item), $items);
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'quantity' => $this->quantity,
            'price' => $this->price,
        ];
    }
}
