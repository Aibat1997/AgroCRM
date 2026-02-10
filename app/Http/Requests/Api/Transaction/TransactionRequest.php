<?php

namespace App\Http\Requests\Api\Transaction;

use App\Services\TransactionFormFieldCacheService;
use Illuminate\Foundation\Http\FormRequest;

class TransactionRequest extends FormRequest
{
    public function __construct(private readonly TransactionFormFieldCacheService $transactionFormFieldCacheService)
    {
        parent::__construct();
    }

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
        $transactionFormFields = $this->transactionFormFieldCacheService->getTransactionFormFieldByTypeId($this->input('transaction_type_id'));
        $additionalFieldRules = [];

        foreach ($transactionFormFields as $field) {
            $additionalFieldRules['additional_fields.' . $field->field_name] = $field->field_validation;
        }

        return array_merge([
            'transaction_type_id' => 'required|integer|exists:transaction_types,id',
            'amount' => 'required|integer|min:0',
            'description' => 'required|string',
            'additional_fields' => 'nullable|array',
        ], $additionalFieldRules);
    }
}
