<?php

namespace App\Http\Resources\WarehouseItem;

use App\Http\Resources\BaseResource;
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
            'warehouse' => new WarehouseResource($this->warehouse),
            'title' => $this->title,
            'article_number' => $this->article_number,
            'quantity' => $this->quantity,
            'unit' => new UnitResource($this->unit),
            'min_sell_price' => $this->min_sell_price,
            'image' => $this->image,
        ];
    }
}
