<?php

namespace App\Http\Resources\Warehouse;

use App\Http\Resources\BaseResource;
use App\Http\Resources\Company\CompanyResource;
use Illuminate\Http\Request;

/**
 * @mixin \App\Models\Warehouse
 */
class WarehouseResource extends BaseResource
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
            'company' => new CompanyResource($this->whenLoaded('company')),
        ];
    }
}
