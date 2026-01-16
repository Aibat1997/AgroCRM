<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WarehouseItemResource extends JsonResource
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
            'quantity' => $this->quantity,
            'unit' =>  new UnitResource($this->unit),
            'currency' =>  new CurrencyResource($this->currency),
            'original_unit_price' => $this->original_unit_price,
            'unit_price' => $this->unit_price,
            'supplier' => $this->supplier,
            'image' => $this->image,
            'warehouse' => new WarehouseResource($this->whenLoaded('warehouse')),
        ];
    }
}
