<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FuncionariosRequest extends FormRequest
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
            'cpf' => 'required',
            'rg' => 'required',
            'pis' => 'required',
            'ctps' => 'required',
            'status' => 'required',
            'contrato' => 'required',
            'data_contratacao' => 'required|date_format:Y-m-d',
            'telefone' => 'required',
        ];

    }

    public function messages()
    {
        return [
            'nome.required' => 'O campo nome é obrigatório',
            'cpf.required' => 'O campo CPF é obrigatório',
            'rg.required' => 'O campo RG é obrigatório',
            'pis.required' => 'O campo PIS é obrigatório',
            'ctps.required' => 'O campo ctps é obrigatório',
            'status.required' => 'O campo status é obrigatório',
            'contrato.required' => 'O campo tipo e contrato é obrigatório',
            'cargo.required' => 'O cargo é obrigatório',
            'data_contratacao.required' => 'O campo data contratação é obrigatório',
            'telefone.required' => 'O campo telefone é obrigatório',
        ];
    }
}
