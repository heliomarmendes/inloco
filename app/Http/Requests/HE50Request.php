<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Carbon\Carbon;

class HE50Request extends FormRequest
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
            'data_he50' => 'required|date_format:Y-m-d',
            'valor' => 'required',
            'horas' => 'required',
            'observacao' => 'required'
        ];

    }

    public function messages()
    {
        return [
            'funcionario_id.required' => 'O campo funcionário é obrigatório',
            'data_he50.required' => 'O campo data é obrigatório',
            'valor.required' => 'O campo valor é obrigatório',
            'horas.required' => 'O campo horas é obrigatório',
            'observacao.required' => 'O campo observação é obrigatório'
        ];
    }
}
