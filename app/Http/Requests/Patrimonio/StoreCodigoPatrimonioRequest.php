<?php

namespace App\Http\Requests\Patrimonio;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class StoreCodigoPatrimonioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'codigo' => 'required|unique:codigos|max:255',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        $errors = $validator->errors();
        return redirect()->back()->withErrors($errors)->withInput();
    }
}
