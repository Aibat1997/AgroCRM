<?php

namespace App\Http\Requests\Api\OrderProduct;

use Illuminate\Foundation\Http\FormRequest;

class PurchaseProductRequest extends FormRequest
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
            'products' => 'required|array',
            'products.*.warehouse_id' => 'required|integer|exists:warehouses,id,deleted_at,NULL',
            'products.*.title' => 'required|string',
            'products.*.article_number' => 'nullable|string',
            'products.*.quantity' => 'required|integer|min:1',
            'products.*.unit_id' => 'required|integer|exists:units,id,deleted_at,NULL',
            'products.*.currency_id' => 'required|integer|exists:currencies,id,deleted_at,NULL',
            'products.*.original_unit_price' => 'required|numeric|min:0',
            'products.*.supplier' => 'nullable|string',
        ];
    }
}
