<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin \App\Models\TransactionFormField
 */
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
            'id' => $this->id,
            'field_title' => $this->field_title,
            'field_tag' => $this->field_tag,
            'field_name' => $this->field_name,
            'field_type' => $this->field_type,
            'field_values_url' => $this->field_values_url,
            'field_attributes' => $this->field_attributes,
            'is_required' => $this->pivot->is_required,
        ];
    }
}
