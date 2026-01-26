<?php

namespace App\Http\Requests\Api\UserTask;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserTaskRequest extends FormRequest
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
            'title' => 'required|string',
            'description' => 'nullable|string',
            'start_date' => 'required|date|after_or_equal:' . today()->toDateString(),
            'finish_date' => 'required|date|after_or_equal:start_date',
            'user_id' => 'nullable|integer|exists:users,id,deleted_at,NULL',
        ];
    }
}
