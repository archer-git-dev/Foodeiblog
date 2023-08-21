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
            'email' => 'required|email',
            'password' => ['required', 'min:6'],
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'E-mail пользователя обязательно для заполнения',
            'email.email' => 'E-mail пользователя должен иметь вид E-mail',
            'password.required' => 'Пароль пользователя обязательно для заполнения',
            'password.min' => 'Пароль пользователя должен состоять минимум из 6 символов',
        ];
    }
}
