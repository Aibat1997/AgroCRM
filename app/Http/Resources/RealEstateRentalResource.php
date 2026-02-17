<?php

namespace App\Http\Resources;

use App\Http\Resources\Client\ClientResource;
use App\Http\Resources\File\FileResource;
use App\Http\Resources\PaymentFrequency\PaymentFrequencyResource;
use App\Http\Resources\RealEstate\MinimalRealEstateResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin \App\Models\RealEstateRental
 */
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
            'real_estate' => new MinimalRealEstateResource($this->realEstate),
            'client' => new ClientResource($this->client),
            'from_date' => $this->from_date,
            'to_date' => $this->to_date,
            'payment_frequency' => new PaymentFrequencyResource($this->paymentFrequency),
            'amount' => $this->amount,
            'area' => $this->area,
            'unit' => new UnitResource($this->unit),
            'contract' => new FileResource($this->file),
            'note' => $this->note,
            'created_at' => $this->created_at,
        ];
    }
}
