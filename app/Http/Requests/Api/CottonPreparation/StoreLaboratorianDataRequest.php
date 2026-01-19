<?php

namespace App\Http\Requests\Api\CottonPreparation;

use Illuminate\Foundation\Http\FormRequest;

class StoreLaboratorianDataRequest extends FormRequest
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
            'cotton_receiving_point' => 'required|string',
            'selective_variety' => 'required|string',
            'variety' => 'required|string',
            'pile' => 'required|string',
            'batch' => 'required|string',
            'picking_type' => 'required|string',
            'contamination' => 'required|numeric|min:0|max:100',
            'humidity' => 'required|numeric|min:0|max:100',
            'laboratory_date' => 'required|date|after_or_equal:' . today()->toDateString(),
        ];
    }
}
