<?php

namespace App\Http\Resources\Debt;

use App\Http\Resources\BaseResource;
use App\Http\Resources\Client\ClientResource;
use App\Http\Resources\Company\CompanyResource;
use Illuminate\Http\Request;

/**
 * @mixin \App\Models\Debt
 */
class DebtResource extends BaseResource
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
            'client' => new ClientResource($this->client),
            'amount' => $this->amount,
            'percent' => $this->percent,
            'issued_at' => $this->issued_at,
            'due_date' => $this->due_date,
            'description' => $this->description,
            'paid_with_raw_materials' => $this->paid_with_raw_materials,
            'status' => $this->status,
        ];
    }
}
