<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VeiculoRequest extends FormRequest
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
            'modelo' => 'required',
            'marca' => 'required',
            'valor_dia' => 'required',
            'placa' => 'required',
            'ano' => 'required',
            'categoria_id' => 'required|exists:categoria,id'
        ];
    }

    public function messages(): array
    {
        return [
            'modelo.required' => 'Modelo é obrigatório',
            'marca.required' => 'Marca é obrigatória',
            'valor_dia.required' => 'Valor dia é obrigatória',
            'placa.required' => 'Placa é obrigatória',
            'ano.required' => 'Ano de fabricação é obrigatório',
            'categoria_id.required' => 'Categoria id é obrigatório',
            'autor_id.exists' => 'Autor não encontrado',
            'categoria_id.exists' => 'Categoria não encontrada',


        ];
    }
}
