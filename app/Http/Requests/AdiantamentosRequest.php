<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Carbon\Carbon;

class AdiantamentosRequest extends FormRequest
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
            'valor' => 'required',
            'observacao' => 'required',
            'data_adiantamento' => 'required|date_format:Y-m-d'
        ];

    }

    public function messages()
    {
        return [
            'funcionario_id.required' => 'O campo funcionário é obrigatório',
            'valor.required' => 'O campo valor é obrigatório',
            'observacao.required' => 'O campo observação é obrigatório',
            'data_adiantamento.required' => 'O campo data do vale é obrigatório'
        ];
    }
}
