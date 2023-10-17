<?php

namespace App\Http\Requests\Main\Recipe;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'title' => 'required|string|min:3|unique:recipes,title',
            'subtitle' => 'required|string|min:3',
            'ingredients' => 'required|string|min:3',
            'process' => 'required|string|min:3',
            'image' => 'required|file',
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
            'title.unique' => 'Название рецепта уже существует',
            'title.min' => 'Название рецепта должен содержать не менее 3 символов',
            'subtitle.required' => 'Краткое описание рецепта обязательно для заполнения',
            'subtitle.string' => 'Краткое описание рецепта должен иметь строчный тип',
            'subtitle.min' => 'Краткое описание должно содержать не менее 3 символов',
            'ingredients.required' => 'Ингредиенты рецепта обязательны для заполнения',
            'ingredients.string' => 'Ингредиенты рецепта должен иметь строчный тип',
            'ingredients.min' => 'Ингредиенты рецепта должны содержать не менее 3 символов',
            'process.required' => 'Шаги приготовления обязательны для заполнения',
            'process.string' => 'Шаги приготовления должны иметь строчный тип',
            'process.min' => 'Шаги приготовления должны содержать не менее 3 символов',
            'image.required' => 'Необходимо добавить изображение',
            'image.file' => 'Допустимы только изображения',
            'category_id.required' => 'Необходимо выбрать категорию',
            'category_id.exists' => 'Выберите допустимую категорию',
            'tag_ids.required' => 'Необходимо выбрать теги',
            'tag_ids.array' => 'Необходимо отпарвить массив тегов',
        ];
    }
}
