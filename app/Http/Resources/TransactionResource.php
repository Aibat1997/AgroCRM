<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
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
            'transaction_type' => new TransactionTypeResource($this->transactionType),
            'company' => new CompanyResource($this->company),
            'user' => new MinimalUserResource($this->user),
            'amount' => $this->amount,
            'description' => $this->description,
            'is_income' => $this->is_income,
            'transaction_details' => TransactionDetailResource::collection($this->transactionDetails),
            'committed_at' => $this->committed_at,
        ];
    }
}
