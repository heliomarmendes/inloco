<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CentroCustosRequest extends FormRequest
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
            'cnpj' => 'required'
        ];

    }

    public function messages()
    {
        return [
            'nome.required' => 'O campo nome é obrigatório',
            'cnpj.required' => 'O campo cnpj é obrigatório'
        ];
    }
}
