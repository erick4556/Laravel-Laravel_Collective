<?php

namespace Ejemplo\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductCreateRequest extends FormRequest
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
            //
            //Campo requerido, minimo de 3 caracteres y que sea unico ese nombre en la tabla.
            'name' => 'required|min:3|unique:products,name',
            'price' => 'required',
            'marks_id' => 'required|not_in:0', //Que tire el error cuando no he seleccionado nada..

        ];
    }


//Personalizar el mensaje del id de la marca..

    public function messages(){
        return [

              'marks_id.not_in' => 'The marca field is required'  

        ];
    }
}
