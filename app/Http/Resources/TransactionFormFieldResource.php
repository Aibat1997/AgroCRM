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
            'id' => $this->id,
            'field_label' => $this->field_label,
            'field_tag' => $this->field_tag,
            'field_name' => $this->field_name,
            'field_type' => $this->field_type,
            'field_values_url' => $this->field_values_url,
            'field_attributes' => $this->field_attributes,
            'is_required' => $this->is_required,
        ];
    }
}
