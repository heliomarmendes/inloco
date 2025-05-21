<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AtestadosRequest extends FormRequest
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
            'funcionario_id' => 'required',
            'data_atestado' => 'required|date_format:Y-m-d',
            'dias' => 'required',
            'valor_transporte' => 'required',
            'valor_alimentacao' => 'required',
            'observacao' => 'required'
        ];

    }

    public function messages()
    {
        return [
            'funcionario_id.required' => 'O campo funcionário é obrigatório',
            'data_atestado.required' => 'O campo data do atestado é obrigatório',
            'dias.required' => 'O campo dias é obrigatório',
            'valor_transporte.required' => 'O campo valor do desconto do vale transporte é obrigatório',
            'valor_alimentacao.required' => 'O campo valor do desconto da alimentação é obrigatório',
            'observacao.required' => 'O campo observação é obrigatório'
        ];
    }
}
