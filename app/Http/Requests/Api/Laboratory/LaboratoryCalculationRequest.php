<?php

namespace App\Http\Requests\Api\Laboratory;

use Illuminate\Foundation\Http\FormRequest;

class LaboratoryCalculationRequest extends FormRequest
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
            'variety' => 'required|string',
            'picking_type' => 'required|string',
            'pile' => 'required|integer',
            'batch' => 'required|integer',
            'gross_weight' => 'required|integer',
            'container_weight' => 'required|integer',
            'actual_contamination' => 'required|numeric',
            'actual_humidity' => 'required|numeric',
        ];
    }
}
