<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RealEstateRentalResource extends JsonResource
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
            'real_estate' => new MinimalRealEstateResource($this->real_estate),
            'client' => new ClientResource($this->client),
            'from_date' => $this->from_date,
            'to_date' => $this->to_date,
            'payment_frequency' => new PaymentFrequencyResource($this->payment_frequency),
            'amount' => $this->amount,
            'area' => $this->area,
            'unit' =>  new UnitResource($this->unit),
            'contract' => $this->contract,
            'note' => $this->note,
            'created_at' => $this->created_at,
        ];
    }
}
