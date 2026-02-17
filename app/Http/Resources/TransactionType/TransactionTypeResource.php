<?php

namespace App\Http\Resources\TransactionType;

use App\Http\Resources\BaseResource;
use Illuminate\Http\Request;

/**
 * @mixin \App\Models\TransactionType
 */
class TransactionTypeResource extends BaseResource
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
        ];
    }
}
