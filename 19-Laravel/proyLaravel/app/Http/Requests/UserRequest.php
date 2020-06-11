<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        if ($this->method() == 'PUT') {
            // Form edit
            return [
            'fullname'  => 'required|min:4',
            'email'     => 'required|email|unique:users,email,'.$this->id,
            'phone'     => 'required|numeric',
            'birthdate' => 'required|date',
            'gender'    => 'required',
            'address'   => 'required',
            'photo'     => 'max:1000',
        ];
        } else {
            // Form create
            return [
            'fullname'  => 'required|min:4',
            'email'     => 'required|email|unique:users',
            'phone'     => 'required|numeric',
            'birthdate' => 'required|date',
            'gender'    => 'required',
            'address'   => 'required',
            'photo'     => 'required|image|max:1000',
            'password'  => 'required|confirmed',
        ];
        }
    }
    public function messages() {
         return [
                    'fullname.required' => 'El campo Nombre Completo es obligatorio',
                    'fullname.min' => 'El campo Nombre Completo debe tener al menos :min caracteres',
                    'email.required' => 'El campo Correo Electronico es obligatorio',
                    'email.email' => 'El campo Correo Electronico debe ser una direccion de correo valida',
                    'email.unique' => 'El campo Correo Electronico ya esta en uso', 
                    'phone.required' => 'El campo Numero Telefonico es obligatorio',
                    'phone.numeric' => 'El campo Nombre Completo debe ser un numero',
                    'birthdate.required' => 'El campo Fecha de Nacimiento es obligatorio',
                    'birthdate.date' => 'El campo Fecha de Nacimiento no corresponde con una fecha valida',
                    'gender.required' => 'El campo Genero es obligatorio',
                    'address.required' => 'El campo Direccion es obligatorio',
                    'photo.required' => 'El campo Foto es obligatorio',
                    'photo.max' => 'El campo archivo Foto no debe pasar más de :max kilobites.',
                    'password.required' => 'El campo Contraseña es obligatorio',
                    'password.confirmed' => 'El campo Confirmacion de Contraseña no coincide',
         ];
     }
}
