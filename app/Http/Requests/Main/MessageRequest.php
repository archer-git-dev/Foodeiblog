<?php

namespace App\Http\Requests\Main;

use Illuminate\Foundation\Http\FormRequest;

class MessageRequest extends FormRequest
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
            'username' => 'required|string|min:3',
            'email' => 'required|string|email',
            'text' => 'required|string|min:10',
        ];
    }

    public function messages()
    {
        return [
            'text.required' => 'Сообщение обязательно для заполнения',
            'text.string' => 'Сообщение должно иметь строчный тип',
            'text.min' => 'Сообщение должно содержать не менее 10 символов',
            'email.required' => 'Email не указан',
            'email.string' => 'Email должен иметь строчный тип',
            'email.email' => 'Email указан не в правильном формате',
            'username.required' => 'Имя пользователя обязательно для заполнения',
            'username.string' => 'Имя пользователя должен иметь строчный тип',
            'username.min' => 'Имя пользователя должно содержать не менее 3 символов',
        ];
    }
}
