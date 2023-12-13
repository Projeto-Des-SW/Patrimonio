<?php

namespace App\Http\Requests\Classificacao;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class StoreClassificacaoRequest extends FormRequest
{
    
    public function rules()
    {
        return [
            'nome' => 'required|unique:classificacoes|max:255'
        ];
    }

    public function failedValidation(Validator $validator)
    {
        $errors = $validator->errors();
        return redirect()->back()->withErrors($errors)->withInput();
    }
}
