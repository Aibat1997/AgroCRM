<?php

namespace App\Http\Resources\PaymentMethod;

use App\Http\Resources\BaseResource;
use Illuminate\Http\Request;

/**
 * @mixin \App\Models\PaymentMethod
 */
class PaymentMethodResource extends BaseResource
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
