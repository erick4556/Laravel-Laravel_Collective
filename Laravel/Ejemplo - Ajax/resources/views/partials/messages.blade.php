<!--Validar Si encuentra un error mayor que 0 pinta el error y muestra la lista de errores que encuentre..-->
@if (count($errors)>0)
	<div class='alert alert-danger' roler='alert'>
		<strong>Errores:</strong>
		<ul>
			@foreach($errors->all() as $error)
				<li>{{$error}} </li>
			@endforeach
		</ul>

	</div>

@endif

@if (Session::has('save'))
	
	<div class="alert alert-success" role="alert">
		
		<strong>{{Session::get('save')}}</strong>

	</div>

@endif


@if (Session::has('update'))
	
	<div class="alert alert-success" role="alert">
		
		<strong>{{Session::get('update')}}</strong>

	</div>

@endif


@if (Session::has('delete'))
	
	<div class="alert alert-success" role="alert">
		
		<strong>{{Session::get('delete')}}</strong>

	</div>

@endif




