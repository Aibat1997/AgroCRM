<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin \App\Models\Machinery
 */
class MachineryResource extends JsonResource
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
            'company' => new CompanyResource($this->company),
            'title' => $this->title,
            'identifier' => $this->identifier,
            'quantity' => $this->quantity,
            'note' => $this->note,
            'comment' => $this->comment,
        ];
    }
}
