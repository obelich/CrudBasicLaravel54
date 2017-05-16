<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactsRequest extends FormRequest
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
            'names'=>'required|min:4|max:100',
            'last_name'=>'required|min:4|max:100',
            'email'=>'required|min:4|email|unique:people,email',
            'telephones.type'=>'required',
            'telephones.number'=>'required|min:11|max:12'
        ];
    }

    public function messages()
    {
        return [
            'names.required' => 'El nombre es requerido.',
            'names.min' => 'El nombre debe tener mínimo 4 carácter',
            'names.max' => 'El nombre no puede tener más de 100 carácter',
            'last_name.required' => 'Los apellidos son requerido.',
            'last_name.min' => 'Los apellidos debe tener mínimo 4 carácter',
            'last_name.max' => 'Los apellidos no puede tener más de 100 carácter',
            'email.email' => 'Verifique su email',
            'email.required' => 'El email es requerido',
            'email.unique' => 'El email ya se encuentra en la base de datos',
            'telephones.number.required' => 'El número de teléfono es requerido',
            'telephones.number.min' => 'El número debe tener mínimo 11 números',
            'telephones.number.max' => 'El número debe tener maximo 12 números',


        ];
    }
}
