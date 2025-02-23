<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;

class TaskFormRequest extends FormRequest
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
            'title' => ['required','min:3'],
            'description' => ['required']
        ];
    }

    public function messages():array
    {
        return [
            'title' => 'É necessário conter um titulo',
            'title.min' => 'O titulo precisa ter :min caracters',
            'description' => 'O campo descrição é obrigatório'
        ];
    }
}
