<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
                'title'  => 'required|unique:articles,title,'.$this->id,
                'image' => 'max:1000',
                'content'     => 'required',
                'user_id'     => 'required',
                'category_id'     => 'required',
                'slider' => 'required',
                'price' => 'required|numeric|min:1|max:100',

            ];
                } else {
                // Form create
                return [
                'title'  => 'required|min:4|unique:articles',
                'image'     => 'required|image|max:1000',
                'content' => 'required',
                'user_id'     => 'required',
                'category_id'     => 'required',
                'slider' => 'required',
                'price' => 'required|numeric|min:1|max:100',
                ];
            }
    }
    public function messages() {
         return [
                    'title.required' => 'El campo Titulo es obligatorio',
                    'title.unique' => 'El campo Titulo ya esta en uso',
                    'content.required' => 'El campo contenido es obligatorio',
                    'image.required' => 'El campo Foto es obligatorio',
                    'image.max' => 'El campo archivo Foto no debe pasar más de :max kilobites.',
                    'user_id.required' => 'El campo Usuario es obligatorio',
                    'category_id.required' => 'El campo Categoria es obligatorio',
                    'slider.required' => 'El campo Importante es obligatorio',
                    'price.required' => 'El campo precio es obligatorio',
                    'price.numeric' => 'El campo precio debe ser un numero'

         ];
    }
}
