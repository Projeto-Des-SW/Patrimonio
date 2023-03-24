<?php

namespace App\Http\Requests\Predio;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class StorePredioRequest extends FormRequest
{
    public function rules()
    {
        return [

            'nome' => 'required|unique:predios|max:255'
            
        ];
            
    }

    public function failedValidation(Validator $validator)
    {
        $errors = $validator->errors();
        return redirect()->back()->withErrors($errors)->withInput();
    }

}
