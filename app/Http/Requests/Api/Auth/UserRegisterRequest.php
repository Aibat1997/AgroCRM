<?php

namespace App\Http\Requests\Api\Auth;

use App\Enums\UserRoleId;
use Illuminate\Foundation\Http\FormRequest;

class UserRegisterRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'role_id' => 'required|integer|exists:user_roles,id|not_in:' . UserRoleId::OWNER->value . ',' . UserRoleId::ADMIN->value,
            'company_id' => 'required|integer|exists:companies,id',
            'name' => 'required|string',
            'phone' => 'required|string|size:11|starts_with:7|unique:users,phone,NULL,id,deleted_at,NULL',
            'password' => 'required|string',
            'device_token' => 'sometimes|required|string',
        ];
    }
}
