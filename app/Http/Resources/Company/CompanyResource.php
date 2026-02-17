<?php

namespace App\Http\Resources\Company;

use App\Http\Resources\BaseResource;
use Illuminate\Http\Request;

/**
 * @mixin \App\Models\Company
 */
class CompanyResource extends BaseResource
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
            'name' => $this->name,
            'logo' => $this->logo,
            'childs' => CompanyResource::collection($this->whenLoaded('childs')),
        ];
    }
}
