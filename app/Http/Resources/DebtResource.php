<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

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
            'is_client_owes' => $this->is_client_owes,
            'status' => $this->status,
        ];
    }
}
