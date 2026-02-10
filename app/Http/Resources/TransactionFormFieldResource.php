<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TransactionFormFieldResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->transactionFormField->id,
            'field_title' => $this->transactionFormField->field_title,
            'field_tag' => $this->transactionFormField->field_tag,
            'field_name' => $this->transactionFormField->field_name,
            'field_type' => $this->transactionFormField->field_type,
            'field_values_url' => $this->transactionFormField->field_values_url,
            'field_attributes' => $this->transactionFormField->field_attributes,
            'is_required' => $this->is_required,
        ];
    }
}
