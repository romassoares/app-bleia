<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePontoRequest extends FormRequest
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
            'cidade' => 'required|min:3|max:255',
            'bairro' => 'required|min:3|max:255',
            'rua' => 'required|min:3|max:255',
            'numero' => 'required|min:1|max:11',
            'contato' => 'required|max:11',
            'user_id' => 'required'
        ];
    }
}
