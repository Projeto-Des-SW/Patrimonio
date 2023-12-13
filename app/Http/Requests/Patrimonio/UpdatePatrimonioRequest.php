<?php

namespace App\Http\Requests\Patrimonio;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePatrimonioRequest extends FormRequest
{
    
    public function rules()
    {
        return [
            'nome' => 'required|string|max:255',
            'nota_fiscal' => 'nullable|string|max:255',
            'descricao' => 'required|string|max:255',
            'servidor_id' => 'required|integer|exists:servidores,id',
            'setor_id' => 'required|integer|exists:setores,id',
            'classificacao_id' => 'required|integer|exists:classificacoes,id',
            'origem_id' => 'required|integer|exists:origens,id',
            'sala_id' => 'required|integer|exists:salas,id',
            'situacao' => 'required|integer|exists:situations,id',
        ];
    }
    
    public function failedValidation(Validator $validator)
    {
        $errors = $validator->errors();
        return redirect()->back()->withErrors($errors)->withInput();
    }

}
