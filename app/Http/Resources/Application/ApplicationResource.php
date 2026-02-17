<?php

namespace App\Http\Resources\Application;

use App\Http\Resources\BaseResource;
use App\Http\Resources\User\MinimalUserResource;
use Illuminate\Http\Request;

/**
 * @mixin \App\Models\Application
 */
class ApplicationResource extends BaseResource
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
            'author' => new MinimalUserResource($this->author),
            'description' => $this->description,
            'status' => $this->status,
        ];
    }
}
