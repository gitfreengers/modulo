@extends('template')

{{-- Page content --}}
@section('body')
<h1>Listado</h1>

<table class="table">
	<thead>
		<th>Id usuario</th>
		<th>Descripcion</th>
		<th>Completada</th>
		<th>Acciones</th>
	</thead>
	<tbody>	
	    @foreach ($examples as $example)
		<td>{{$example->user_id}}</td>
		<td>{{$example->todo}}</td>
		<td>{{$example->completed}}</td>
		<td>{{$example->completed}}</td>
		@endforeach
		
	</tbody>
</table>