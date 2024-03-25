<?php

namespace App\Http\Requests\Movimento;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class StoreMovimentoRequest extends FormRequest
{

    public function rules()
    {
        return [
            'observacao' => 'nullable|string|max:255',
            'servidor_destino_id' => 'required|integer|exists:servidores,id',
            'servidor_origem_id' => 'required|integer|exists:servidores,id',
            'tipo_movimento_id' => 'required|integer|exists:tipos_movimento,id',
            'data_movimento' => 'required|date'
        ];
    }

    public function failedValidation(Validator $validator)
    {
        $errors = $validator->errors();
        return redirect()->back()->withErrors($errors)->withInput();
    }
}
