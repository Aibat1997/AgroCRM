<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin \App\Models\CottonPreparation
 */
class CottonPreparationResource extends JsonResource
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
            'client' => new ClientResource($this->client),
            'weigher' => new MinimalUserResource($this->weigher),
            'laboratorian' => new MinimalUserResource($this->laboratorian),
            'invoice_number' => $this->invoice_number,
            'transport' => $this->transport,
            'gross_weight' => $this->gross_weight,
            'container_weight' => $this->container_weight,
            'physical_weight' => $this->physical_weight,
            'cotton_receiving_point' => $this->cotton_receiving_point,
            'selective_variety' => $this->selective_variety,
            'variety' => $this->variety,
            'pile' => $this->pile,
            'batch' => $this->batch,
            'picking_type' => $this->picking_type,
            'contamination' => $this->contamination,
            'estimated_weight' => $this->estimated_weight,
            'humidity' => $this->humidity,
            'conditioned_weight' => $this->conditioned_weight,
            'price_per_kg' => $this->price_per_kg,
            'total_price' => $this->total_price,
            'weighing_date' => $this->weighing_date,
            'laboratory_date' => $this->laboratory_date,
            'status' => $this->status,
            'created_at' => $this->created_at,
        ];
    }
}
