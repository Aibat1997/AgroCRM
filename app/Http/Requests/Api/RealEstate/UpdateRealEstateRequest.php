<?php

namespace App\Http\Requests\Api\RealEstate;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRealEstateRequest extends FormRequest
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
            'real_estate_type_id' => 'required|integer|exists:real_estate_types,id',
            'address' => 'required|string',
            'area' => 'required|numeric',
            'unit_id' => 'required|integer|exists:units,id,deleted_at,NULL',
            'cadastral_number' => 'nullable|string',
            'rented_from' => 'nullable|date',
            'rented_to' => 'nullable|date|after:rented_from',
            'note' => 'nullable|string',
            'files' => 'nullable|array',
            'files.*' => 'file|mimes:pdf,doc,docx',
        ];
    }
}
