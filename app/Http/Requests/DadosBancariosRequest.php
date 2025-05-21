<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Carbon\Carbon;

class DadosBancariosRequest extends FormRequest
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
            'banco' => 'required',
            'agencia' => 'required',
            'conta' => 'required',
            'pix' => 'required',
            'favorecido' => 'required',
            'desconto' => 'required'
        ];

    }

    public function messages()
    {
        return [
            'funcionario_id.required' => 'O campo funcionário é obrigatório',
            'banco.required' => 'O campo banco é obrigatório',
            'agencia.required' => 'O campo agência é obrigatório',
            'conta.required' => 'O campo conta é obrigatório',
            'pix.required' => 'O campo pix é obrigatório',
            'favorecido.required' => 'O campo favorecido é obrigatório',
            'desconto.required' => 'O campo valor do desconto é obrigatório'
        ];
    }
}
