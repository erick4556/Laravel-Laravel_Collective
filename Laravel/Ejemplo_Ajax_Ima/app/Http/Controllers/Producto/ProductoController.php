<?php

namespace Ejemplo\Http\Controllers\Producto;

use Illuminate\Http\Request;
use Ejemplo\Http\Controllers\Controller;
use Ejemplo\Models\Producto\Product;
use Ejemplo\Models\Producto\Mark;
use Ejemplo\Http\Requests;
use Ejemplo\Http\Requests\Product\ProductCreateRequest;
use Ejemplo\Http\Requests\Product\UpdateRequest;
use Image;
use Session; //Para mensajes flash.

class ProductoController extends Controller
{
    
    public function index(){

    	return View('product/index');
      
    }

    public function listall(){
            $producto = Product::
                        select('products.id', 'products.name as product', 'price', 
                            'marks.name as mark','image')->join('marks','marks.id','=','products.marks_id')->paginate(5);
                            //Crear paginación y que lo enpagine de 5 en 5.//get();

        //all(); //Vaye a la base datos y traiga toda la tabla productos.

        return View('product/listall')->with('producto', $producto);
    }


   /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $marks = Mark::pluck('name','id')->prepend('Seleccione la Marca');
        return view('product/create')->with('marks',$marks);
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   // public function store(Request $request) No estaba validado
      public function store(ProductCreateRequest $request) //Validando
    {
        Product::create($request->all());
        Session::Flash('save','Se ha creado correctamente!!');
        return redirect()->route('producto.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $products = Product::FindOrFail($id);
         return view('product/show')->with('products',$products);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $marks = Mark::pluck('name','id')->prepend('Seleccione la Marca');
         $products = Product::FindOrFail($id); //FindOrFail se produce un error cuando no se encuentra el modelo...

         return view('product/edit', array('products'=>$products,'marks'=>$marks));
    }


    public function photo($id)
    {
        $product = Product::find($id);
        return view('product.photo')->with('product',$product);
    }

    public function update_photo(Request $request)
    {
            $photo = $request->file('photo'); //Recibe el parametro
            //Concatena el nombre de la foto tiempo mas la extension
            $filename = time() . '.' . $photo->getClientOriginalExtension(); 
            //Se le asigna el tamaño y se guarda la imagen en la carpeta images
            Image::make($photo)->resize(380, 600)->save(public_path('images/products/' . $filename ) );
            $products= Product::find($request->get('id'));
            $products->image = $filename;
            $products->save();
            return view('product.photo')->with('product',$products);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //public function update(Request $request, $id)
    public function update(UpdateRequest $request, $id)
    {
        $products = Product::FindOrFail($id); //Buscamos el id en el modelo.
        $input = $request->all();
        $products->fill($input)->save();
        Session::Flash('update','Se ha actualizado correctamente!!'); //Cuando se actualice me mande un mensaje.
        return redirect()->route('producto.index');

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
        $products = Product::FindOrFail($id);
        $products->delete();
        Session::Flash('delete','Se ha eliminado correctamente!!');
        return redirect()->route('producto.index');
    }
       
    

}
