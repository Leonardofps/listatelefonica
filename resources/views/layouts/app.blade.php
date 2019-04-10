<!DOCTYPE html>
<html>
	<head>
		<title>{{$title or 'Panel EspecializaTi'}}</title>

		<!-- Bootstrap -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<!--Fonts-->
		<link rel="stylesheet" href="{{url('assets/panel/css/font-awesome.min.css')}}">
		<link rel="stylesheet" href="{{url('assets/panel/css/font-awesome.css')}}">

		<!--CSS Person-->
		<link rel="stylesheet" href="{{url('assets/panel/css/agenda-projeto.css')}}">
		<link rel="stylesheet" href="{{url('assets/panel/css/agenda-reset.css')}}">

		<!--Favicon-->
		<link rel="icon" type="image/png" href="{{url('assets/panel/imgs/favicon.png')}}">
	</head>
<body>

<section class="menu">
	
	<div class="logo">
		<a href="{{route('pessoa.index')}}">
			<img src="{{url('assets/panel/imgs/logo-funcex.png')}}" alt="Funcex" class="logo-painel">
		</a>
	</div>

	<div class="list-menu">
		<ul class="menu-list">
			<li>
				<a href="{{route('pessoa.index')}}">
					<i class="fa fa-user"></i>
					Pessoa
				</a>
			</li>

			<li>
				<a href="{{route('empresa.index')}}">
					<i class="fa fa-building"></i>
					Empresa
				</a>
			</li>
		</ul>
	</div>

</section><!--End Menu-->

<section class="content">

	<div class="content-ds">
		
		@yield('content')


	</div><!--End Content DS-->

</section><!--End Content-->

	

	<!--jQuery-->
	<script src="{{url('assets/panel/js/jquery-3.1.1.min.js')}}"></script>
	<script type="text/javascript" src="{{url('assets/panel/js/jquery.mask.min.js')}}"></script>
	<script type="text/javascript" src="{{url('assets/panel/js/funcoes.js')}}"></script>

	<!-- jS Bootstrap -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>