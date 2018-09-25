<?php

namespace Ejemplo\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Routing\Route;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

    public function __construct(Route $route){
    $this->route = $route; 
    }

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
             //Campo requerido, minimo de 3 caracteres y que sea unico ese nombre en la tabla y capturamos el codigo producto
            'name' => 'required|min:3|unique:products,name,'.$this->route->parameter('producto'),
            'price' => 'required',
            'marks_id' => 'required|not_in:0', 
        ];
    }

      public function messages(){
        return [

              'marks_id.not_in' => 'The marca field is required'  

        ];
    }
}
