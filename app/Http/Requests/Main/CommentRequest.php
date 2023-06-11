<?php

namespace App\Http\Requests\Main;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
            'text' => 'required|string|min:10',
            'user_id' => 'required|integer|exists:users,id',
            'recipe_id' => 'required|integer|exists:recipes,id',
        ];
    }

    public function messages()
    {
        return [
            'text.required' => 'Комментарий обязателен для заполнения',
            'text.string' => 'Комментарий должен иметь строчный тип',
            'text.min' => 'Комментарий должен содержать не менее 10 символов',
            'user_id.required' => 'Имя пользователя не указано',
            'user_id.integer' => 'Имя пользователя не указано',
            'user_id.exists' => 'Такого пользователя не существует',
            'recipe_id.required' => 'Рецепт не указан',
            'recipe_id.integer' => 'Рецепт не указан',
            'recipe_id.exists' => 'Такого рецепта не существует',
        ];
    }
}
