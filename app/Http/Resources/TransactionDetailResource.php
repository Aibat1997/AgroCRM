<?php

namespace App\Http\Resources;

use App\Services\TransactionFormFieldCacheService;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin \App\Models\TransactionDetail
 */
class TransactionDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $cacheService = app(TransactionFormFieldCacheService::class);
        $formField = $cacheService->getTransactionFormFieldById($this->transaction_form_field_id);

        return [
            'form_field' => new TransactionFormFieldResource($formField),
            'field_value' => $this->field_value,
        ];
    }
}
