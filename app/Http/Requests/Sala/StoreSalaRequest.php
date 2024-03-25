<?php

namespace App\Http\Requests\Sala;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class StoreSalaRequest extends FormRequest
{
   
    public function rules()
    {
        return [
            'telefone' => 'required|regex:/^\(\d{2}\) 9 \d{4}-\d{4}$/|unique:tenants,',
            'nome' => 'required|unique:salas|max:255',
            'predio_id' => 'required|integer|exists:predios,id'
        ];
    }

    
    public function failedValidation(Validator $validator)
    {
        $errors = $validator->errors();
        return redirect()->back()->withErrors($errors)->withInput();
    }
    
}
