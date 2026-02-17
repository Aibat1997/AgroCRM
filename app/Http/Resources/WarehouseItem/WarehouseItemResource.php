<?php

namespace App\Http\Resources\WarehouseItem;

use App\Http\Resources\BaseResource;
use App\Http\Resources\Currency\CurrencyResource;
use App\Http\Resources\Unit\UnitResource;
use App\Http\Resources\Warehouse\WarehouseResource;
use Illuminate\Http\Request;

/**
 * @mixin \App\Models\WarehouseItem
 */
class WarehouseItemResource extends BaseResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'article_number' => $this->article_number,
            'quantity' => $this->quantity,
            'unit' => new UnitResource($this->unit),
            'currency' => new CurrencyResource($this->currency),
            'original_unit_price' => $this->original_unit_price,
            'unit_price' => $this->unit_price,
            'supplier' => $this->supplier,
            'image' => $this->image,
            'warehouse' => new WarehouseResource($this->whenLoaded('warehouse')),
        ];
    }
}
