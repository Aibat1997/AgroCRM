<?php

namespace App\DTO;

class PurchaseProductDTO
{
    /**
     * @param list<WarehouseItemDTO> $warehouseItems
     */
    public function __construct(
        public readonly array $warehouseItems,
    ) {}

    public static function fromArray(array $data): self
    {
        $warehouseItems = array_map(fn(array $item) => WarehouseItemDTO::fromArray($item), $data['products']);

        return new self(
            warehouseItems: $warehouseItems
        );
    }

    public function toArray(): array
    {
        return [
            'products' => array_map(fn(WarehouseItemDTO $item) => $item->toArray(), $this->warehouseItems),
        ];
    }
}
