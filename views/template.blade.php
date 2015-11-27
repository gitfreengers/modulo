<!DOCTYPE html>
<html>
<head>
	<title>CRUD</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- jQuery -->
	<script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
	
	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

  </head>
  <body>

  	<div class="flux clearfix">
  		<div class="flux--1"></div>
  		<div class="flux--2"></div>
  		<div class="flux--3"></div>
  		<div class="flux--4"></div>
  		<div class="flux--5"></div>
  	</div>

  	<div class="container">

  		<nav class="navbar xnavbar-fixed-top navbar-inverse" role="navigation">

  			<div class="navbar-header">
  				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
  					<span class="sr-only">Toggle navigation</span>
  					<span class="icon-bar"></span>
  					<span class="icon-bar"></span>
  					<span class="icon-bar"></span>
  				</button>
  				<a class="navbar-brand" href="{{ URL::to('/') }}">Ejemplo modulo</a>
  			</div>

  			<div class="collapse navbar-collapse navbar-ex1-collapse">

  				<ul class="nav navbar-nav">
  				
  				</ul>
          <ul class="nav navbar-nav pull-right">
            	<li>Accion de ejemplo</li>
          </ul>

  		</div>
  	</nav>

  	@if ($errors->any())
  	<div class="alert alert-danger alert-block">
  		<button type="button" class="close" data-dismiss="alert"><i class="fa fa-minus-square"></i></button>
  		<strong>Error: </strong>
  		@if ($message = $errors->first(0, ':message'))
  			{{ $message }}
  		@else
  			Revisa los siguientes errores
  		@endif
  	</div>
  	@endif

  	@if ($message = Session::get('success'))
  	<div class="alert alert-success alert-block">
  		<button type="button" class="close" data-dismiss="alert"><i class="fa fa-minus-square"></i></button>
  		<strong>Exitoso: </strong> {{ $message }}
  	</div>
  	@endif


  	@yield('body')
  </div>

  	{!! Html::script('assets/plugins/jQuery/jQuery-2.1.3.min.js') !!} 
	{!! Html::script('assets/js/bootstrap.min.js') !!} 

  <script type="text/javascript">
  	$('.tip').tooltip();
  	//$('#modal').modal();
  </script>

  @yield('scripts')


</body>
</html>