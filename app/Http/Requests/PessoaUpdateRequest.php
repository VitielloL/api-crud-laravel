<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PessoaUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome' => 'required|string|min:1|max:14',
            'sobrenome' => 'required|string|min:1|max:14',
            'cpf' => 'required|string|min:11|max:11',
            'celular' => 'required|string|min:9|max:11',
            'logradouro' => 'required|string|min:1|max:30',
            'cep' => 'required|string|min:8|max:8'
        ];
    }
}
