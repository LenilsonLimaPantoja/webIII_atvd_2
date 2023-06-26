<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LocacaoRequest extends FormRequest
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
            'data_locacao' => 'required',
            'data_entrega' => 'required',
            'status' => 'required',
            'veiculo_id' => 'required|exists:veiculo,id',
            'cliente_id' => 'required|exists:cliente,id'
        ];
    }

    public function messages(): array
    {
        return [
            'data_locacao.required' => 'Data de locação é obrigatória',
            'data_entrega.required' => 'Data de entrega é obrigatória',
            'status.required' => 'Status é obrigatório',
            'veiculo_id.exists' => 'Veiculo não encontrado',
            'cliente_id.exists' => 'Cliente não encontrado',


        ];
    }
}
