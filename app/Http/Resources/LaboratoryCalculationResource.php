<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LaboratoryCalculationResource extends JsonResource
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
            'user' => new MinimalUserResource($this->user),
            'variety' => $this->variety,
            'picking_type' => $this->picking_type,
            'pile' => $this->pile,
            'batch' => $this->batch,
            'gross_weight' => $this->gross_weight,
            'container_weight' => $this->container_weight,
            'physical_weight' => $this->physical_weight,
            'actual_contamination' => $this->actual_contamination,
            'estimated_weight' => $this->estimated_weight,
            'actual_humidity' => $this->actual_humidity,
            'conditioned_weight' => $this->conditioned_weight,
            'created_at' => $this->created_at,
        ];
    }
}
