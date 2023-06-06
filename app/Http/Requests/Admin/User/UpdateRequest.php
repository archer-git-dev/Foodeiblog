<?php

namespace App\Http\Requests\Admin\User;

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
            'username' => 'required|string',
            'email' => 'required|string|email',
            'avatar' => 'nullable|file',
            'role' => 'required|string',
            'slug' => '',
            'old_avatar' => '',
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Имя пользователя обязательно для заполнения',
            'username.string' => 'Имя пользователя должен иметь строчный тип данных',
            'email.required' => 'E-mail пользователя обязательно для заполнения',
            'email.string' => 'E-mail пользователя должен иметь строчный тип данных',
            'email.email' => 'E-mail пользователя должен иметь вид E-mail',
            'avatar.file' => 'Аватар пользователя должен быть файлом',
            'role.required' => 'Роль пользователя обязательно для заполнения',
            'role.string' => 'Роль пользователя должен иметь строчный тип данных',
        ];
    }
}
