<?php

namespace App\Http\Requests\Admin\Recipe;

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
            'title' => 'required|string|min:3',
            'content' => 'required|string|min:10',
            'image' => 'nullable|file',
            'category_id' => 'required|integer|exists:categories,id',
            'tag_ids' => 'required|array',
            'tag_ids*' => 'required|integer|exists:tags,id',
            'slug' => ''
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Название рецепта обязательно для заполнения',
            'title.string' => 'Название рецепта должен иметь строчный тип',
            'content.required' => 'Содержимое рецепта обязательно для заполнения',
            'content.string' => 'Содержимое рецепта должен иметь строчный тип',
            'image.file' => 'Допустимы только изображения',
            'category_id.required' => 'Необходимо выбрать категорию',
            'category_id.exists' => 'Выберите допустимую категорию',
            'tag_ids.required' => 'Необходимо выбрать теги',
            'tag_ids.array' => 'Необходимо отпарвить массив тегов',
        ];
    }
}
