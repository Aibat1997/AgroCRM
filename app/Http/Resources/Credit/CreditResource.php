<?php

namespace App\Http\Resources\Credit;

use App\Http\Resources\BaseResource;
use App\Http\Resources\Company\CompanyResource;
use App\Http\Resources\PaymentFrequency\PaymentFrequencyResource;
use Illuminate\Http\Request;

/**
 * @mixin \App\Models\Credit
 */
class CreditResource extends BaseResource
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
