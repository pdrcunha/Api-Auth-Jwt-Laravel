<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;


class UserStoreRequest extends FormRequest
{

    // public function authorize(): bool
    // {
    //     return true;
    // }


    public function rules(): array
    {
        return [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nome obrigatório.',
            'name.max' => 'Nome muito grande.',

            'email.required' => 'Email obrigatório.',
            'email.email' => 'Email no formato errado.',
            'email.unique:users' => 'Email já cadastrado',

            'password.required' => 'Senha obrigatória',
            'password.min' => 'A senha deve conter no mínimo 6 caracteres',
        ];
    }
}
