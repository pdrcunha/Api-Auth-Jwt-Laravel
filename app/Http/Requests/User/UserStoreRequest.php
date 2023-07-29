<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserStoreRequest extends FormRequest
{

    // public function authorize(): bool
    // {
    //     return true;
    // }


    public function rules(): array
    {
        $id = $this->route('id');
        return [
            'name' => 'required|max:255',
            'email' => [
                'required',
                'email',
                $id?Rule::unique('users')->ignore($id):'unique:users,email'],
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
            'email.unique' => 'Email já cadastrado',

            'password.required' => 'Senha obrigatória',
            'password.min' => 'A senha deve conter no mínimo 6 caracteres',
        ];
    }
}
