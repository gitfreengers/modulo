@extends('example::template') 

{{-- Page content --}}
@section('body')

<div class="page-header">
	<h1>Listado  <span class="pull-right"><a href="{{ URL::to('todo/create') }}" class="btn btn-warning">Crear</a></span></h1>
</div>

<table class="table">
	<thead>
		<th>Id usuario</th>
		<th>Descripcion</th>
		<th>Completada</th>
		<th>Acciones</th>
	</thead>
	<tbody>	
	    @foreach ($examples as $example)
		<tr>
			<td>{{$example->user_id}}</td>
			<td>{{$example->todo}}</td>
			<td>{{$example->completed}}</td>
			<td>
				<a class="btn btn-warning" href="{{ URL::to("todo/{$example->id}/edit") }}">Editar</a>
				<a class="btn btn-danger" href="{{ URL::to("todo/{$example->id}/delete") }}">Borrar</a>
			</td>
		</tr>	
		@endforeach
		
	</tbody>
</table>
@endSection