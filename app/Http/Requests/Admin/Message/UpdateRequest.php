<?php

namespace App\Http\Requests\Admin\Message;

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
            'text' => 'required|string|min:10'
        ];
    }

    public function messages()
    {
        return [
            'text.required' => 'Сообщение обязательно для заполнения',
            'text.string' => 'Сообщение должно иметь строчный тип',
            'text.min' => 'Сообщение должно содержать не менее 10 символов',
        ];
    }
}
