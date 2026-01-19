<?php

namespace App\Http\Requests\Api\CottonPreparation;

use Illuminate\Foundation\Http\FormRequest;

class StoreWeigherDataRequest extends FormRequest
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
            'invoice_number' => 'required|integer',
            'transport' => 'required|string',
            'supplier' => 'required|string',
            'supplier_identifier' => 'required|string',
            'gross_weight' => 'required|integer',
            'container_weight' => 'required|integer|lt:gross_weight',
            'weighing_date' => 'required|date|after_or_equal:' . today()->toDateString(),
        ];
    }
}
