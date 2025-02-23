<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginCreateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required','min:3'],
            'email' => ['required','email:rfc'],
            'password' => ['required','min:3']
        ];
    }

    public function messages(): array
    {
        return [
            'name' => 'O campo nome é obrigatório',
            'name.min' => 'O campo nome precisa ter ao menos :min caracteres',
            'email' => 'O campo email é obrigatório',
            'email.email' => 'Email invalido',
            'password' => 'O campo senha é obrigátorio',
            'password.min' => 'A senha precisa ter :min caracteres'
        ];
    }
}
