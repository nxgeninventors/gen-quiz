<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssignTestsRequest extends FormRequest
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
            'user_id' => 'required|exists:users,id',
            'quiz_ids' => 'required|array',
            'quiz_ids.*' => 'exists:quizzes,id',
        ];
    }

    public function messages()
    {
        return [
            'user_id.required' => 'Please select a user.',
            'user_id.exists' => 'The selected user does not exist.',
            'quiz_ids.required' => 'Please select at least one test.',
            'quiz_ids.array' => 'The selected tests must be in an array.',
            'quiz_ids.*.exists' => 'One or more selected tests do not exist.',
        ];
    }

}
