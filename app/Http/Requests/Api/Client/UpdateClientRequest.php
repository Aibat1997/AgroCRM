<?php

namespace App\Http\Requests\Api\Client;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClientRequest extends FormRequest
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
        $clientId = $this->route('client')->id;

        return [
            'name' => 'required|string',
            'phone' => 'required|string|size:11|starts_with:7|unique:clients,phone,' . $clientId . ',id,deleted_at,NULL',
            'identifier' => 'required|string|size:12|unique:clients,identifier,' . $clientId . ',id,deleted_at,NULL',
        ];
    }
}
