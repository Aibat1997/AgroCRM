<?php

namespace App\Http\Resources\OrderProduct;

use App\Http\Resources\BaseResource;
use App\Http\Resources\WarehouseItem\MinimalWarehouseItemResource;
use Illuminate\Http\Request;

/**
 * @mixin \App\Models\OrderProduct
 */
class OrderProductResource extends BaseResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'unit_price' => $this->unit_price,
            'quantity' => $this->quantity,
            'warehouse_item' => new MinimalWarehouseItemResource($this->warehouseItem),
        ];
    }
}
