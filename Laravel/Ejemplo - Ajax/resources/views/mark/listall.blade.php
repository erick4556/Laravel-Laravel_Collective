<table class="table table-bordered">
    <thead>
    <th>Nombre</th>
    <th>Acción</th>
    </thead>
    <tbody>
    @foreach($marks as $mark)
        <!--Este formato de variable es como se usa en blade-->
        {{--/* @$name = str_replace(' ','&nbsp;', $mark->name) */--}}      
        <tr>
            <td>{{$mark->name}}</td>
            <td>
                <!-- Se implementa funciones que ayudan a levantar el model-->
                <a href="#" OnClick='Mostrar({{$mark->id}});' data-toggle='modal' data-target='#myModal'>[Editar]</a>
                 <a href="#" onclick="Eliminar('{{$mark->id}}','{{$mark->name}}')" >[Eliminar]</a></td>
        </tr>
    @endforeach
    </tbody>


</table>
<div class="text-center">
    {!!$marks->links()!!}
</div>