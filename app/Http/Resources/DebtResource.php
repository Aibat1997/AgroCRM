<?php

namespace App\Http\Resources;

use App\Http\Resources\Client\ClientResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin \App\Models\Debt
 */
class DebtResource extends JsonResource
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
