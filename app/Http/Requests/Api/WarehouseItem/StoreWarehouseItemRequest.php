<?php

namespace App\Http\Requests\Api\WarehouseItem;

use Illuminate\Foundation\Http\FormRequest;

class StoreWarehouseItemRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'warehouse_id' => 'required|integer|exists:warehouses,id,deleted_at,NULL',
            'title' => 'required|string',
            'article_number' => 'nullable|string',
            'quantity' => 'required|integer',
            'unit_id' => 'required|integer|exists:units,id,deleted_at,NULL',
            'currency_id' => 'required|integer|exists:currencies,id,deleted_at,NULL',
            'original_unit_price' => 'required|numeric|min:0',
            'supplier' => 'nullable|string',
            'image' => 'nullable|image',
        ];
    }
}
