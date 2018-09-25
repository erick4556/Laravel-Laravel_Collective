@extends('layouts.master')

@section('title','Lista de productos')

@section('content')

 <!-- Main component for a primary marketing message or call to action -->
   <ol class="breadcrumb">
     <li><a href="{{url('dashboard')}}">Escritorio</a></li>
     <li class="active">Productos</li>
   </ol>

<div class="page-header">
     <h1>Productos <small>Actualizados hasta hoy</small></h1>
   </div>


   <div class="row">
     <div class="col-md-8">

      @include('partials.messages')

        <div class="panel panel-default">
          <div class="panel-heading">
             Lista
             <p class="navbar-text navbar-right" style=" margin-top: 1px;">
                <button type="button" id="nuevo" name="nuevo" class="btn btn-warning navbar-btn" style="margin-bottom: 1px; margin-top: -5px;margin-right: 8px;padding: 3px 20px;">Nuevo</button>
             </p>
           </div>
          <div class="panel-body">

          <div id="list-product"></div>

             
          </div>
        </div>


     </div>
   </div>

   <script>
    //Al iniciarse la página me ejecute el list product..
     $(document).ready(function(){
        listProduct();
    });

     $(document).on("click",".pagination li a",function(e) {
        e.preventDefault();
        var url = $(this).attr("href");
        $.ajax({
            type:'get',
            url:url,
            success: function(data){
                $('#list-product').empty().html(data);
            }
        });
    });


    //Nombre boton = nuevo
  $("#nuevo").click(function(event)
  {
      document.location.href = "{{ route('producto.create')}}";
  });

   var listProduct = function()
  {
      $.ajax({
          type:'get',
          url:'{{ url('listall')}}', //Aqui va apuntar a la ruta..
          success: function(data){
              $('#list-product').empty().html(data);
          }
      });
  }

</script>


@endsection