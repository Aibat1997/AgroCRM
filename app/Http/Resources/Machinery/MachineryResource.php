<?php

namespace App\Http\Resources\Machinery;

use App\Http\Resources\BaseResource;
use App\Http\Resources\Company\CompanyResource;
use Illuminate\Http\Request;

/**
 * @mixin \App\Models\Machinery
 */
class MachineryResource extends BaseResource
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
