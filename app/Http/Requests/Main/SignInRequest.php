<?php

namespace App\Http\Requests\Main;

use Illuminate\Foundation\Http\FormRequest;

class SignInRequest extends FormRequest
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
            'username' => 'required',
            'password' => ['required', 'min:6'],
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Имя пользователя обязательно для заполнения',
            'password.required' => 'Пароль пользователя обязательно для заполнения',
            'password.min' => 'Пароль пользователя должен состоять минимум из 6 символов',
        ];
    }
}
