<?php

namespace App\Http\Requests\Admin\UserRecipe;

use Illuminate\Foundation\Http\FormRequest;

class FeedbackRequest extends FormRequest
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
            'feedback' => 'required|string|min:10',
        ];
    }

    public function messages()
    {
        return [
            'feedback.required' => 'Замечание обязательно для заполнения',
            'feedback.string' => 'Замечание должно иметь строчный тип',
            'feedback.min' => 'Замечание должно содержать не менее 10 символов',
        ];
    }
}
