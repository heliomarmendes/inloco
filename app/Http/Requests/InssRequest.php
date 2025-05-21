<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Carbon\Carbon;

class InssRequest extends FormRequest
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
            'data_competencia' => 'required|date_format:Y-m-d',
            'porcentagem' => 'required',
            'valor_inss' => 'required',
            'observacao' => 'required'
        ];

    }

    public function messages()
    {
        return [
            'funcionario_id.required' => 'O campo funcionário é obrigatório',
            'data_competencia.required' => 'O campo data da competência é obrigatório',
            'porcentagem.required' => 'O campo porcentagem do INSS é obrigatório',
            'valor_inss.required' => 'O campo valor do INSS é obrigatório',
            'observacao.required' => 'O campo observação é obrigatório'
        ];
    }
}
