<?php

namespace App\Http\Resources\File;

use App\Http\Resources\BaseResource;
use Illuminate\Http\Request;

/**
 * @mixin \App\Models\File
 */
class FileResource extends BaseResource
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
            'original_name' => $this->original_name,
            'url' => $this->url,
        ];
    }
}
