<?php

namespace App\Http\Requests\Main;

use Illuminate\Foundation\Http\FormRequest;

class SignUpRequest extends FormRequest
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
            'username' => 'required|string|min:3|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => ['required', 'min:6', 'same:re_password'],
            'avatar' => 'nullable|file',
            'slug' => ''
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Имя пользователя обязательно для заполнения',
            'username.string' => 'Имя пользователя должен иметь строчный тип данных',
            'username.min' => 'Имя пользователя должно содержать не менее 3 символов',
            'username.unique' => 'Имя пользователя уже существует',
            'email.required' => 'E-mail пользователя обязательно для заполнения',
            'email.email' => 'E-mail пользователя должен иметь вид E-mail',
            'email.unique' => 'Пользователь с таким E-mail уже существует',
            'password.required' => 'Пароль пользователя обязательно для заполнения',
            'password.min' => 'Пароль пользователя должен состоять минимум из 6 символов',
            'password.same' => 'Пароли не совпадают',
            'avatar.file' => 'Аватар пользователя должен быть файлом',
        ];
    }
}
