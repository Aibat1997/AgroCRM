<?php

namespace App\Http\Requests\Api\Credit;

use Illuminate\Foundation\Http\FormRequest;

class CreditRequest extends FormRequest
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
            'company_id' => 'required|integer|exists:companies,id',
            'bank_name' => 'required|string',
            'amount' => 'required|integer|min:0',
            'term_in_months' => 'required|integer|min:1|max:200',
            'payment_frequency_id' => 'required|integer|exists:payment_frequencies,id',
            'payment_frequency_amount' => 'required|integer|min:0',
            'description' => 'required|string',
        ];
    }
}
