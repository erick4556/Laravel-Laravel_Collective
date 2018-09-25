<?php

namespace Ejemplo\Http\Controllers;

use Illuminate\Http\Request;

class DesktopContr extends Controller
{
    
    public function index(){
    	return view('welcome');
    }	


}
