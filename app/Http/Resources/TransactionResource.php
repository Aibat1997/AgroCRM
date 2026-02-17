<?php

namespace App\Http\Resources;

use App\Http\Resources\Company\CompanyResource;
use App\Http\Resources\User\MinimalUserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin \App\Models\Transaction
 */
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
            'author' => new MinimalUserResource($this->author),
            'amount' => $this->amount,
            'description' => $this->description,
            'is_income' => $this->is_income,
            'status' => $this->status,
            'committed_at' => $this->committed_at,
        ];
    }
}
