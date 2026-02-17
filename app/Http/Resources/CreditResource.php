<?php

namespace App\Http\Resources;

use App\Http\Resources\Company\CompanyResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin \App\Models\Credit
 */
class CreditResource extends JsonResource
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
            'bank_name' => $this->bank_name,
            'amount' => $this->amount,
            'term_in_months' => $this->term_in_months,
            'payment_frequency' => new PaymentFrequencyResource($this->paymentFrequency),
            'payment_frequency_amount' => $this->payment_frequency_amount,
            'description' => $this->description,
            'receipt_date' => $this->receipt_date,
            'status' => $this->status,
        ];
    }
}
