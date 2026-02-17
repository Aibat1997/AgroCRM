<?php

namespace App\Http\Resources\UserTask;

use App\Http\Resources\BaseResource;
use App\Http\Resources\User\MinimalUserResource;
use Illuminate\Http\Request;

/**
 * @mixin \App\Models\UserTask
 */
class UserTaskResource extends BaseResource
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
            'executor' => new MinimalUserResource($this->executor),
            'title' => $this->title,
            'description' => $this->description,
            'start_date' => $this->start_date,
            'finish_date' => $this->finish_date,
            'status' => $this->status,
        ];
    }
}
