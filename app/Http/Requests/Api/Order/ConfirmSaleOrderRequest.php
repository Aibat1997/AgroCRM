<?php

namespace App\Http\Requests\Api\Order;

use App\Enums\PaymentMethodId;
use Illuminate\Foundation\Http\FormRequest;

class ConfirmSaleOrderRequest extends FormRequest
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
            'payment_method_id' => 'required|integer|exists:payment_methods,id',
            'client_name' => 'nullable|required_if:payment_method_id,' . PaymentMethodId::ON_DEBT->value . '|string',
            'client_identifier' => 'nullable|required_if:payment_method_id,' . PaymentMethodId::ON_DEBT->value . '|string|size:12',
            'client_phone' => 'nullable|required_if:payment_method_id,' . PaymentMethodId::ON_DEBT->value . '|string|size:11|starts_with:7',
        ];
    }
}
