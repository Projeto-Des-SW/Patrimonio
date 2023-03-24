<?php

namespace App\Http\Requests\Cargo;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class StoreCargoRequest extends FormRequest
{
    
    public function rules()
    {
        return [
            'nome' => 'required|unique:cargos|max:255'
        ];
    }

    public function failedValidation(Validator $validator)
    {
        $errors = $validator->errors();
        return redirect()->back()->withErrors($errors)->withInput();
    }
}
