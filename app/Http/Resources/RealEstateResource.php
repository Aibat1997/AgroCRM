<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RealEstateResource extends JsonResource
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
            'real_estate_type' => new RealEstateTypeResource($this->real_estate_type),
            'address' => $this->address,
            'area' => $this->area,
            'unit' =>  new UnitResource($this->unit),
            'cadastral_number' => $this->cadastral_number,
            'rented_from' => $this->rented_from,
            'rented_to' => $this->rented_to,
            'note' => $this->note,
        ];
    }
}
