<?php

namespace App\Http\Requests\Api\Machinery;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMachineryRequest extends FormRequest
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
        $machineryId = $this->route('machinery')->id;

        return [
            'company_id' => 'required|integer|exists:companies,id',
            'driver_id' => 'nullable|integer|exists:users,id',
            'title' => 'required|string',
            'identifier' => 'nullable|string|unique:machineries,identifier,' . $machineryId . ',id,deleted_at,NULL',
            'quantity' => 'required|integer|min:1',
            'note' => 'nullable|string',
            'comment' => 'nullable|string',
        ];
    }
}
