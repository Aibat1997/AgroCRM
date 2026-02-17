<?php

namespace App\Http\Resources\RealEstate;

use App\Http\Resources\BaseResource;
use App\Http\Resources\RealEstateType\RealEstateTypeResource;
use Illuminate\Http\Request;

/**
 * @mixin \App\Models\RealEstate
 */
class MinimalRealEstateResource extends BaseResource
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
        ];
    }
}
