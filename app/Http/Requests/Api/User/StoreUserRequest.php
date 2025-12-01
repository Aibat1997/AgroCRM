<?php

namespace App\Http\Requests\Api\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'role_id' => 'required|integer|exists:user_roles,id,deleted_at,NULL',
            'company_id' => 'required|integer|exists:companies,id,deleted_at,NULL',
            'name' => 'required|string',
            'phone' => 'required|string|size:11|starts_with:7|unique:users,phone,NULL,deleted_at',
            'avatar' => 'nullable|image',
            'salary' => 'nullable|numeric',
            'password' => 'required|string',
        ];
    }
}
