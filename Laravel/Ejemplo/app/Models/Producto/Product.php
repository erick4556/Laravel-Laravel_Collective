<?php

namespace Ejemplo\Models\Producto;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    
	protected $table = 'products';
	protected $primarykey = 'id';
	//Para eviar el error con los campos que genera automaticamente eloquent..
	public $timestamps = false;


	//Dentro de este array se pueden especificar cuales de los campos de la tabla pueden ser editados o rellenados.
	protected $fillable = [
		'id','name', 'price', 'marks_id'
	];


	//Migraciones
	public function mark(){

		//hasmany = tiene muchas.
		//El producto puede tener una o muchas marcas..
		return $this->hasmany(Mark::class);
	}

}
