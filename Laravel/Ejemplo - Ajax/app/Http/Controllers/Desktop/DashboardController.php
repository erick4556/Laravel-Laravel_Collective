<?php

namespace Ejemplo\Http\Controllers\Desktop;

use Illuminate\Http\Request;
use Ejemplo\Http\Controllers\Controller;

class DashboardController extends Controller
{
    //
	//Para entrar al dashboard primero tenemos que loguearnos 
	public function __construct(){
		$this->middleware('auth');
	}

   public function index()
   {
         return view('dashboard');
   }
   public function modelweb()
   {
      return view('modelweb');
   }
}