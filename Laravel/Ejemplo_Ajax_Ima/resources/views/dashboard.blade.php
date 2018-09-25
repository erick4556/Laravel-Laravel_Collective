@extends('layouts.master')

@section('title','Panel de Control')

@section('content')

   <ol class="breadcrumb">
     <li>Panel de Control</li>
     <li class="active">Escritorio</li>
   </ol>

   <!-- Main component for a primary marketing message or call to action -->
   <div class="page-header">
     
   </div>

   <div class="row">
     <div class="col-md-8">
          {!! Form::select('product',$product,null,['id'=>'product','class'=>'js-example-responsive','style'=>'width: 50%']) !!}   
     </div>
   </div>


   <script>
      $("#product").select2({
       theme: "classic",
      templateResult: formatState
      // templateSelection: formatState
      });


      //Si el state es diferente a nulo regresa un texto (codigo y nombre)..
       function formatState (state)
      {
      if (!state.id) {
          return state.text;
      }
      var $state = $(
        '<span><img width=10% src="images/products/' + state.element.value.toLowerCase() + '.jpg" /> ' + state.text + '</span>'
      );
      return $state;
       };


   </script>


@endsection