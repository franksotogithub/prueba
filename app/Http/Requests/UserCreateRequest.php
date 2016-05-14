<?php

namespace Cinema\Http\Requests;

use Cinema\Http\Requests\Request;

class UserCreateRequest extends Request
{/*Aqui se determina las reglas del negocio*/
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //return false;// cambiar a autorizado true

        return true;// cambiar a autorizado
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required', // required es para indicar que el campo es obligatorio de llenar
            'email'=>'required|unique:users', // aqui defines que ademas de ser un campo obligatorio es unico en la tabla users
            'password'=>'required'

        ];
    }
}
