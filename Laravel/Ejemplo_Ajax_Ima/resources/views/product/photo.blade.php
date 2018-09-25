@extends('layouts.master')

@section('title','Imagenes de Producto')

@section('content')

	<ol class="breadcrumb">
	     <li><a href="{{url('dashboard')}}">Escritorio</a></li>
	     <li><a href="{{url('producto')}}">Productos</a></li>
	     <li class="active">Imagenes</li>
    </ol>
    <div class="container" style="margin-top: -52px;">
       <div class="page-header">
       <h1>Imagen <small> del producto</small></h1>
  	   </div>
			@if (Session::has('error'))
				<div class="alert alert-danger" role='alert'>
					<strong>{{Session::get('error')}}</strong>
				</div>
			@endif
	       <section class="container" style="margin-top: -39px;">
	            <div class="coloum-wrapper" style="padding-top: 37px;">

				    <p class="col-sm-2" style="z-index: -1;">
						<img src="/images/products/{{ $product->image }}" style="width:267px;height:341px;margin-left: -91px;">
			            <h2><span style="color: steelblue;">{{ $product->name }}</span></h2>
			            
			            <form enctype="multipart/form-data" action="/photoproduct" method="POST">
			                <label>Actualiza la imagen de la portada</label><br>
			                <input type="file" name="photo" >
			                <input type="hidden" name="id" id='id' value="{{ $product->id }}">
			                <input type="hidden" name="_token" value="{{csrf_token()}}">
			                <p></p>
			                <input type="submit" class="btn btn-md btn--warning btn--wider" value="Aceptar">
			            </form>
							
	            	</p>

				</div>
			</section>
	     </div>
	   </div>
  </div> 

  @endsection