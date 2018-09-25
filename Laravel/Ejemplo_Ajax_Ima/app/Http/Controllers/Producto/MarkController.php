<?php

namespace Ejemplo\Http\Controllers\Producto;

use Illuminate\Http\Request;
use Ejemplo\Http\Controllers\Controller;
use Ejemplo\Models\Producto\Mark;
use Ejemplo\Http\Requests;
use Ejemplo\Http\Requests\Mark\MarkCreateRequest;
use Ejemplo\Http\Requests\Mark\MarkUpdateRequest;
use Session;

class MarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('mark/index');
    }
    
    public function listallmark(){
        $mark = Mark::
            select('id','name')->paginate(5);
        return View('mark/listall')->with('marks',$mark); 
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return View('mark/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MarkCreateRequest $request)
    {
        if($request->ajax()){
            $result = Mark::create($request->all());

            //Si no tiene ningun error.
            if($result){
                Session::flash('save',"Se ha creado correctamente!!");
                return response()->json(['success'=>'true']); //Si se hizo sin ningun problema me va devolver true..
            }else{
                return response()->json(['success'=>'true']);
            }


        }


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
        $mark = Mark::find($id);
        return response()->json($mark); //Devolvemos un json de la información..
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MarkUpdateRequest $request, $id)
    {
        if ($request->ajax())
        {
            $mark = mark::FindOrFail($id);//Busca el id..
            $input = $request->all();//Se guarda toda la información..
            $result = $mark->fill($input)->save();//Se actualiza
            
            if ($result){
                return response()->json(['success'=>'true']);
            } 
            else
            {
              return response()->json(['success'=>'false']);  
            }
        }   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mark = Mark::FindOrFail($id);
        $result = $mark->delete();
        if ($result)
        {
            return response()->json(['success'=>'true']); 
        }
        else
        {
            return response()->json(['success'=> 'false']);
        }
    }
}
