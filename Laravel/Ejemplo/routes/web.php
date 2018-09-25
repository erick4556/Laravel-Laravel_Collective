<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::group(['middleware' => ['web']],function(){

	/*route::get('usuario',function(){
		return 'Hola amigos!';
	});*/

	//Rutas con parametros
	/*route::get('usuario/{codigo}',function($codigo){
		return 'Hola usuario '.$codigo;
	});*/

	//Rutas con restricciones.
	/*route::get('usuario/{codigo}',function($codigo){
		return 'Hola usuario '.$codigo;
	})
	//Para solo números.
	//->where('codigo','[0-9]+');
	//Para solo texto.
	->where('codigo','[A-Za-z]+');*/

	//Nombre de la ruta
	/*route::get('escritorio',[
	'as'=> 'escritorio', 'uses'=> 'DesktopContr@index'	//Nombre del controlador
	]);*/

	//-------------------------------------

	//route::get('producto','Producto\ProductoController@index');
	route::resource('producto','Producto\ProductoController');

	//Ruta con recurso..

	route:: resource('marca','Producto\ResourceMarcaController');

	route::get('panel','Desktop\AdministratorController@panel');

	route::get('access','Desktop\AdministratorController@access');

	route::get('reports','Desktop\AdministratorController@reports');

	route::get('modelweb','Desktop\DashboardController@modelweb');

	//Para entrar al dashboard primero tenemos que loguearnos y tambien se puede usar dentro del mismo controlador..
	route::get('dashboard','Desktop\DashboardController@index');//->middleware('auth');


	  Route::group(['prefix'=>'admin','middleware'=>['auth','admin']],function (){
            route::get('demo',['as'=>'demo','uses'=>'DemoController@index']);
      });



});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
