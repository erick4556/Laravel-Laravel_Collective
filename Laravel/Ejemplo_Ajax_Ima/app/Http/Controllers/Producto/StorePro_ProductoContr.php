<?php

namespace Ejemplo\Http\Controllers\Producto;

use Illuminate\Http\Request;
use Ejemplo\Http\Controllers\Controller;
use Ejemplo\Models\Producto\Product;
use Ejemplo\Models\Producto\Mark;
use Ejemplo\Http\Requests;
use Ejemplo\Http\Requests\Product\ProductCreateRequest;
use Ejemplo\Http\Requests\Product\UpdateRequest;
use DB;


class StorePro_ProductoContr extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View('product/index');
    }


    //Aqui se va usar el store procedura..

    public function storeprocedure()
    {
        
        $products = DB::select("call sp_producto(1)");   
        return View('product/store')->with('products',$products);      
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
