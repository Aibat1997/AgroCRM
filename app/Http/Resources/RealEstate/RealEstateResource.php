<?php

namespace App\Http\Resources\RealEstate;

use App\Http\Resources\BaseResource;
use App\Http\Resources\File\FileResource;
use App\Http\Resources\RealEstateType\RealEstateTypeResource;
use App\Http\Resources\Unit\UnitResource;
use Illuminate\Http\Request;

/**
 * @mixin \App\Models\RealEstate
 */
class RealEstateResource extends BaseResource
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
            'real_estate_type' => new RealEstateTypeResource($this->realEstateType),
            'address' => $this->address,
            'area' => $this->area,
            'unit' => new UnitResource($this->unit),
            'cadastral_number' => $this->cadastral_number,
            'rented_from' => $this->rented_from,
            'rented_to' => $this->rented_to,
            'note' => $this->note,
            'files' => FileResource::collection($this->files),
        ];
    }
}
