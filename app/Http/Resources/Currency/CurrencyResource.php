<?php

namespace App\Http\Resources\Currency;

use App\Http\Resources\BaseResource;
use Illuminate\Http\Request;

/**
 * @mixin \App\Models\Currency
 */
class CurrencyResource extends BaseResource
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
            'in_local_currency' => $this->in_local_currency,
            'symbol' => $this->symbol,
        ];
    }
}
