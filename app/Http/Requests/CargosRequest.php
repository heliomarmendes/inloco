<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CargosRequest extends FormRequest
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
            'nome' => 'required',
            'salario' => 'required',
            'refeicao' => 'required',
            'transporte' => 'required',
            'insalubridade' => 'required'
        ];

    }

    public function messages()
    {
        return [
            'nome.required' => 'O campo nome é obrigatório',
            'salario.required' => 'O campo salário é obrigatório',
            'refeicao.required' => 'O campo alimentação é obrigatório',
            'transporte.required' => 'O campo vale transporte é obrigatório', 
            'insalubridade.required' => 'O campo insalubridade é obrigatório'
        ];
    }
}
