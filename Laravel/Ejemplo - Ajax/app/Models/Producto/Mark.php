<?php

namespace Ejemplo\Models\Producto;

use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    protected $table = 'marks';
	protected $primarykey = 'id';
	//Para eviar el error con los campos que genera automaticamente eloquent..
	public $timestamps = false;

	protected $fillable = [
		'id','name'
	];

	public function product(){

		//belongsto = pertenece a un producto..
		//La marca pertenece a al model producto..
		return $this->belongsto(Product::class);
	}

}
