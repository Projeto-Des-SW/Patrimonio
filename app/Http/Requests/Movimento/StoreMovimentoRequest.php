<?php

namespace App\Http\Requests\Movimento;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class StoreMovimentoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'observacao' => 'nullable|string|max:255',
            'servidor_destino_id' => 'required|integer|exists:servidors,id',
            'servidor_origem_id' => 'required|integer|exists:servidors,id',
            'tipo_movimento_id' => 'required|integer|exists:tipo_movimentos,id',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        $errors = $validator->errors();
        return redirect()->back()->withErrors($errors)->withInput();
    }
}
