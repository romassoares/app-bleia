<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MembroRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nome' => 'required|max:150|min:2',
            'cpf' => 'required|unique:membros|max:11',
            'estado_civil' => 'in:cas,sol,viu,div',
            'naturalidade' => 'required|max:150|min:3',
            'cep' => 'required|max:9|min:8',
            'cidade' => 'required|max:250|min:3',
            'bairro' => 'required|max:250|min:3',
            'rua' => 'nullable|max:250|min:3',
            'sexo' => 'in:m,f',
            'numero' => 'nullable|max:10|min:2',
            'nome_mae' => 'nullable|max:250|min:3',
            'nome_pai' => 'nullable|max:250|min:2',
            'data_batismo' => 'nullable|date',
            'data_nascimento' => 'required|date',
            'cargo_id' => 'required',
            'ponto_id' => 'required',
            'users_id' => 'required'
        ];
    }
}
