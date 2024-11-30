<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LocacoesRequest extends FormRequest
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
            'cliente_id' => 'required',
            'codigo_locacao' => 'required',
            'descricao' => 'required',
            'status' => 'required',
        ];

    }

    public function messages()
    {
        return [
            'cliente_id.required' => 'O campo cliente é obrigatório',
            'codigo_locacao.required' => 'O campo código locação é obrigatório',
            'descricao.required' => 'O campo descrição é obrigatório',
            'status.required' => 'O campo status é obrigatório',
        ];
    }
}
