<?php

namespace App\Http\Requests\Movimento;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class ConcluirMovimentoRequest extends FormRequest
{

    public function rules()
    {
        return [
            'sala_id' => 'required|integer',
            'movimento_id' => 'required|integer'
        ];
    }

    public function failedValidation(Validator $validator)
    {
        $errors = $validator->errors();
        return redirect()->back()->withErrors($errors)->withInput();
    }
}
