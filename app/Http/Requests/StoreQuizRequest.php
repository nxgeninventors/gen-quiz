<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuizRequest extends FormRequest
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
            'quiz_name' => 'required|string',
            'quiz_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'quiz_type' => 'required|in:pre-test,test',
            'description' => 'required|string',
            'quiz_category_id' => 'nullable|exists:quiz_categories,id'
        ];
    }
}
