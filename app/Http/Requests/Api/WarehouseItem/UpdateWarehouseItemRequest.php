<?php

namespace App\Http\Requests\Api\WarehouseItem;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWarehouseItemRequest extends FormRequest
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
        $warehouseItemId = $this->route('warehouse_item')->id;

        return [
            'warehouse_id' => 'required|integer|exists:warehouses,id,deleted_at,NULL',
            'title' => 'required|string',
            'article_number' => 'nullable|string|unique:warehouse_items,article_number,' . $warehouseItemId . ',id,deleted_at,NULL',
            'quantity' => 'required|integer',
            'unit_id' => 'required|integer|exists:units,id,deleted_at,NULL',
            'min_sell_price' => 'nullable|integer',
            'image' => 'nullable|image',
        ];
    }
}
