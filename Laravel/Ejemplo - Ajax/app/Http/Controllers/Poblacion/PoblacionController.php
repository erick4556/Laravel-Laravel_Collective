<?php

namespace Ejemplo\Http\Controllers\Poblacion;

use Illuminate\Http\Request;
use Ejemplo\Http\Controllers\Controller;
use Ejemplo\Http\Requests;
use Ejemplo\Models\Poblacion\CallesPoblaciones;

class PoblacionController extends Controller
{
    public function index()
	{
		$CallesPoblaciones = CallesPoblaciones::all()->take(10);
        return View('poblacion/index')->with('CallesPoblaciones',$CallesPoblaciones);
	}
}
