<?php

namespace App\Http\Requests\Admin\Newsletter;

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
            'email' => 'required|string|email|unique:newsletters,email',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Email обязателен для заполнения',
            'email.string' => 'Email должен иметь строчный тип',
            'email.email' => 'Email указан в неверном формате',
            'email.unique' => 'Email уже существует',
        ];
    }
}
