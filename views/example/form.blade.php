@extends('example::template')

{{-- Page content --}}
@section('body')

<div class="page-header">
	<h1>{{ $mode == 'create' ? 'Crear' : 'Actualizar' }} <small>{{ $mode === 'update' ? $example->name : null }}</small><span class="pull-right"><a href="{{ URL::to('todo/') }}" class="btn btn-default">Regresar</a></span></h1>
</div>


{!! Form::open(['route' => [$example->id > 0 ? 'todo.update' : 'todo.store', isset($example->id) ? $example->id : 0], 'method'=>isset($example->id) ? 'PUT' : 'POST', 'class' => 'form']) !!}

	<div class="form-group{{ $errors->first('user_id', ' has-error') }}">
		<label for="user_id">Usuario</label>
		{!! Form::select('user_id', array('1' => 'usuario 1', '2' => 'usuario 2'), $example->user_id, ['class'=> 'form-control', 'placeholder'=>'Ingrese el usuario']) !!}
		<span class="help-block">{{{ $errors->first('user_id', ':message') }}}</span>
	</div>

	<div class="form-group{{ $errors->first('todo', ' has-error') }}">
		<label for="todo">Todo </label>
		{!! Form::input('text', 'todo', $example->todo, ['class'=> 'form-control', 'placeholder'=>'Ingrese el todo']) !!}
		<span class="help-block">{{{ $errors->first('todo', ':message') }}}</span>
	</div>
	
	<div class="form-group{{ $errors->first('completed', ' has-error') }}">
		<label for="completed">Completada</label>
		{!! Form::checkbox('completed', $example->completed) !!}
		<span class="help-block">{{{ $errors->first('completed', ':message') }}}</span>
	</div>

	<button type="submit" class="btn btn-default">Guardar</button>

</form>

@stop
