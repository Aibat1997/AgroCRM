<?php

namespace App\Http\Requests\Api\Debt;

use App\Enums\DebtStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DebtRequest extends FormRequest
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
            'client_name' => 'required|string',
            'client_identifier' => 'required|string|size:12',
            'client_phone' => 'required|string|size:11|starts_with:7',
            'amount' => 'required|integer|min:0',
            'due_date' => 'required|date',
            'percent' => 'nullable|integer|min:0|max:20',
            'description' => 'nullable|string',
            'status' => ['sometimes', 'required', 'string', Rule::enum(DebtStatus::class)],
        ];
    }
}
