<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserTaskResource extends JsonResource
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
            'user' => new MinimalUserResource($this->user),
            'title' => $this->title,
            'description' => $this->description,
            'start_date' => $this->start_date,
            'finish_date' => $this->finish_date,
            'status' => $this->status,
        ];
    }
}
