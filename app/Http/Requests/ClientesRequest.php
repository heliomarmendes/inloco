<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientesRequest extends FormRequest
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
            'cnpj' => 'required',
            'telefone' => 'required',
            'bairro' => 'required',
            'endereco' => 'required',
            'cidade' => 'required',
            'uf' => 'required',
            'cep' => 'required',
            'status' => 'required',
            'data_contrato' => 'required|date_format:Y-m-d',
            'data_rescisao' => 'required|date_format:Y-m-d',
        ];

    }

    public function messages()
    {
        return [
            'nome.required' => 'O campo nome é obrigatório',
            'cnpj.required' => 'O campo cnpj é obrigatório',
            'telefone.required' => 'O campo telefone é obrigatório',
            'bairro.required' => 'O campo bairro é obrigatório',
            'endereco.required' => 'O campo endereço é obrigatório',
            'cidade.required' => 'O campo cidade é obrigatório',
            'uf.required' => 'O campo UF é obrigatório',
            'cep.required' => 'O campo cep é obrigatório',
            'status.required' => 'O campo status é obrigatório',
            'data_contrato.required' => 'O campo data contrato é obrigatório',
            'data_rescisao.required' => 'Informar a data de fim do contrato',
        ];
    }
}
