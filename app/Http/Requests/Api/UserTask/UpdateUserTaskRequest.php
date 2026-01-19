<?php

namespace App\Http\Requests\Api\UserTask;

use App\Enums\UserTaskStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserTaskRequest extends FormRequest
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
            'status' => ['sometimes', 'string', Rule::enum(UserTaskStatus::class)],
        ];
    }
}
