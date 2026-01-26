<?php

namespace App\Http\Requests\Api\RealEstateRental;

use Illuminate\Foundation\Http\FormRequest;

class RealEstateRentalRequest extends FormRequest
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
            'real_estate_id' => 'required|integer|exists:real_estates,id',
            'tenant_name' => 'required|string',
            'tenant_phone' => 'required|string|size:11|starts_with:7',
            'tenant_identifier' => 'nullable|string',
            'from_date' => 'required|date',
            'to_date' => 'nullable|date|after:from_date',
            'payment_frequency_id' => 'required|exists:payment_frequencies,id',
            'amount' => 'required|integer|min:0',
            'area' => 'nullable|numeric',
            'unit_id' => 'nullable|integer|exists:units,id,deleted_at,NULL',
            'contract' => 'nullable|file|mimes:pdf,doc,docx',
            'note' => 'nullable|string',
        ];
    }
}
