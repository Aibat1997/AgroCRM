<?php

namespace App\Http\Resources\Order;

use App\Http\Resources\BaseResource;
use App\Http\Resources\Company\CompanyResource;
use App\Http\Resources\PaymentMethod\PaymentMethodResource;
use App\Http\Resources\User\MinimalUserResource;
use Illuminate\Http\Request;

/**
 * @mixin \App\Models\Order
 */
class OrderResource extends BaseResource
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
            'author' => new MinimalUserResource($this->author),
            'payment_method' => new PaymentMethodResource($this->paymentMethod),
            'total_amount' => $this->total_amount,
            'is_purchase' => $this->is_purchase,
            'status' => $this->status,
            'created_at' => $this->created_at,
        ];
    }
}
