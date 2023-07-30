<?php

namespace App\Http\Requests\Products;

use Illuminate\Foundation\Http\FormRequest;

class ProdutcStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    // public function authorize(): bool
    // {
    //     return false;
    // }


    public function rules(): array
    {
        $id = $this->route('id');
        return [
            'name' => 'required|max:255',
            'type' => 'required',
            'price' => 'float',
            'amount' => 'required|integer|min:0',
            'amount_type' => 'required|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nome obrigatório.',
            'name.max' => 'Nome muito grande.',

            'type.required' => 'Tipo obrigatório.',
            'price.float' => 'Preço float.',

            'amount.required' => 'Quantidade obrigatória.',
            'amount.integer' => 'Quantidade deve ser inteiro.',
            'amount.min' => 'Quantidade deve ter no minimo 0.',

            'amount_type.required' => 'Tipo de unidade obrigatório',
            'amount_type.max' => 'Tipo unidade muito grande',
        ];
    }
}


