<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FaltasRequest extends FormRequest
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
            'data_falta' => 'required|date_format:Y-m-d',
            'valor_falta' => 'required',
            'observacao' => 'required'
        ];

    }

    public function messages()
    {
        return [
            'funcionario_id.required' => 'O campo funcionário é obrigatório',
            'data_falta.required' => 'O campo data do vale obrigatório',
            'valor_falta.required' => 'O campo valor é obrigatório',
            'observacao.required' => 'O campo observação é obrigatório'
        ];
    }
}
