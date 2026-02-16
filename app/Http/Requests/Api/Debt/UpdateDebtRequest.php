<?php

namespace App\Http\Requests\Api\Debt;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDebtRequest extends FormRequest
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
            'amount' => 'nullable|required_without:paid_with_raw_materials|integer|min:0|max:' . $this->route('debt')->amount,
            'paid_with_raw_materials' => 'nullable|required_without:amount|boolean',
        ];
    }
}
