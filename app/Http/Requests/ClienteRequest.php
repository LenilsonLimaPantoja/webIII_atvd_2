<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'nome' => 'required',
            'telefone' => 'required',
            'cpf' => 'required',
            'cep' => 'required',
            'logradouro' => 'required',
            'bairro' => 'required',
            'numero' => 'required',
            'cidade' => 'required',
            'uf' => 'required',
            'email' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required' => 'Nome é obrigatório',
            'telefone.required' => 'Telefone é obrigatório',
            'cpf.required' => 'CPF é obrigatório',
            'cep.required' => 'CEP é obrigatório',
            'logradouro.required' => 'Logradouro é obrigatório',
            'bairro.required' => 'Bairro é obrigatório',
            'numero.required' => 'Número é obrigatório',
            'cidade.required' => 'Cidade é obrigatória',
            'uf.required' => 'UF é obrigatório',
            'email.required' => 'Email é obrigatório',
        ];
    }
}
