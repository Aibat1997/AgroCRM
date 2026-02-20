<?php

namespace App\DTO;

use Illuminate\Http\UploadedFile;

class WarehouseItemDTO
{
    public function __construct(
        public readonly int $warehouse_id,
        public readonly string $title,
        public readonly int $quantity,
        public readonly int $unit_id,
        public readonly ?int $min_sell_price,
        public readonly ?string $article_number,
        public readonly ?UploadedFile $image,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            warehouse_id: (int) $data['warehouse_id'],
            title: (string) $data['title'],
            quantity: (int) $data['quantity'],
            unit_id: (int) $data['unit_id'],
            min_sell_price: isset($data['min_sell_price']) ? (int) $data['min_sell_price'] : null,
            article_number: isset($data['article_number']) ? (string) $data['article_number'] : null,
            image: $data['image'] ?? null,
        );
    }

    public function toArray(): array
    {
        return [
            'warehouse_id' => $this->warehouse_id,
            'title' => $this->title,
            'quantity' => $this->quantity,
            'unit_id' => $this->unit_id,
            'min_sell_price' => $this->min_sell_price,
            'article_number' => $this->article_number,
            'image' => $this->image,
        ];
    }
}
