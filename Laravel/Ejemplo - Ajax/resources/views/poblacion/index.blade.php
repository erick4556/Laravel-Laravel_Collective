@extends('layouts.master')

@section('title','Lista de Productos')

@section('content')

  <link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

   <div class="page-header">
     <h1>Población<small> Calles, codigo postal</small></h1>
   </div>

    <div class="panel-body">
        <table class="table table-bordered" id='myTable'>
            <thead>
              <th>Codigo Población</th>
              <th>Nombre </th>
              <th>Codigo Postal</th>
            </thead>
            <tbody>
            @foreach($CallesPoblaciones as $CallePoblaciones)
                <tr>
                    <td>{{$CallePoblaciones->CodPoblacion}}</td>
                    <td>{{$CallePoblaciones->nombre}}</td>
                    <td>{{$CallePoblaciones->CodPostal}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <script src="http://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

   <script> 

    $(document).ready( function () {
     $('#myTable').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "api/poblacioncalles",
        "columns":[
          {data:'CodPoblacion'},
          {data:'nombre'},
          {data:'CodPostal'},
        ]
    });
    });

    </script>

@endsection