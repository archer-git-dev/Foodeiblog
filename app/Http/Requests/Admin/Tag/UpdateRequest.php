<?php

namespace App\Http\Requests\Admin\Tag;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'title' => 'required|string|min:3|',
            'slug' => ''
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Название рецепта обязательно для заполнения',
            'title.string' => 'Название рецепта должен иметь строчный тип',
        ];
    }
}
