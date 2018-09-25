<?php

namespace Ejemplo\Http\Controllers;

use Illuminate\Http\Request;

class DemoController extends Controller
{
    //

	public function index(){
		return "Usted es el administrador del sistema!!";
	}

}
