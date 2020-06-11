<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
                'name'  => 'required|min:4',
                'description' => 'required',
                'image'     => 'max:1000',
            ];
                } else {
                // Form create
                return [
                'name'  => 'required|unique:categories|min:4',
                'description'     => 'required',
                'image' => 'required|image|max:1000',
                ];
            }
        }
        public function messages() {
         return [
                    'name.required' => 'El campo Nombre de categoria es obligatorio',
                    'name.unique' => 'El campo Nombre de categoria ya esta en uso',
                    'name.min' => 'El campo Nombre de categoria debe tener al menos :min caracteres',
                    'description.required' => 'El campo descripcion es obligatorio',
                    'image.required' => 'El campo Foto es obligatorio',
                    'image.max' => 'El campo archivo Foto no debe pasar más de :max kilobites.',
         ];
    }
}