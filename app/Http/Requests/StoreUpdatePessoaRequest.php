<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdatePessoaRequest extends FormRequest
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
            "nome"=>"required|min:3",
            "endereco"=>"required"
        ];
    }

    public function messages()
    {
        return [
            "nome.required" => "O nome é obrigatório",
            "endereco.required" => "O endereço é obrigatório"
        ];
    }
}
