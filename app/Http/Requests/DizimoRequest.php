<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DizimoRequest extends FormRequest
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
            'valor' => 'required|min:3|max:999999',
            'mes_referencia' => 'required|date',
            'membros_id' => 'required',
            'ponto_id' => 'required',
            'users_id' => 'required',
        ];
    }
}
