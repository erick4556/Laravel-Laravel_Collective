<?php

namespace Ejemplo\Http\Controllers\Desktop;

use Illuminate\Http\Request;
use Ejemplo\Http\Controllers\Controller;
use Ejemplo\Models\Producto\Product;


class DashboardController extends Controller
{
    //
	//Para entrar al dashboard primero tenemos que loguearnos 
	public function __construct(){
		$this->middleware('auth');
	}

   public function index()
   {      
        $product = Product::pluck('name','id')->prepend('selecciona');//Me traiga el nombre y id del producto.
        return view('dashboard',['product'=>$product]);
          //return view('dashboard')->with('product',$product);
         
   }
   public function modelweb()
   {
      return view('modelweb');
   }
}