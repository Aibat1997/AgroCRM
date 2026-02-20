<?php

namespace App\Http\Resources\OrderProduct;

use App\Http\Resources\BaseResource;
use App\Http\Resources\Currency\CurrencyResource;
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
            'warehouse_item' => new MinimalWarehouseItemResource($this->warehouseItem),
            'currency' => new CurrencyResource($this->currency),
            'currency_rate' => $this->currency_rate,
            'currency_price' => $this->currency_price,
            'price' => $this->price,
            'quantity' => $this->quantity,
            'supplier' => $this->supplier,
        ];
    }
}
