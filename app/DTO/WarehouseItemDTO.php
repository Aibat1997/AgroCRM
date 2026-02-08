<?php

namespace App\DTO;

use Illuminate\Http\UploadedFile;

class WarehouseItemDTO
{
    public function __construct(
        public readonly int $warehouse_id,
        public readonly string $title,
        public readonly ?string $article_number = null,
        public readonly int $quantity,
        public readonly int $unit_id,
        public readonly int $currency_id,
        public readonly float $original_unit_price,
        public readonly string $supplier,
        public readonly ?UploadedFile $image = null,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            warehouse_id: (int) $data['warehouse_id'],
            title: (string) $data['title'],
            article_number: isset($data['article_number']) ? (string) $data['article_number'] : null,
            quantity: (int) $data['quantity'],
            unit_id: (int) $data['unit_id'],
            currency_id: (int) $data['currency_id'],
            original_unit_price: (float) $data['original_unit_price'],
            supplier: (string) $data['supplier'],
            image: $data['image'] ?? null,
        );
    }

    public function toArray(): array
    {
        return [
            'warehouse_id' => $this->warehouse_id,
            'title' => $this->title,
            'article_number' => $this->article_number,
            'quantity' => $this->quantity,
            'unit_id' => $this->unit_id,
            'currency_id' => $this->currency_id,
            'original_unit_price' => $this->original_unit_price,
            'supplier' => $this->supplier,
        ];
    }
}
