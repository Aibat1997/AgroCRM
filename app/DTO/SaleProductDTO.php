<?php

namespace App\DTO;

class SaleProductDTO
{
    public function __construct(
        public readonly array $orderProducts,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            orderProducts: array_map(fn($item) => OrderProductDTO::fromArray($item), $data['products']),
        );
    }

    public function toArray(): array
    {
        return [
            'products' => array_map(fn($item) => $item->toArray(), $this->orderProducts),
        ];
    }
}
