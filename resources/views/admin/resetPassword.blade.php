<!DOCTYPE HTML>

<html>

<head>

	<title>Star9000</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<meta name="keywords" content="Augment Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 

	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />

	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

	<link href="{{URL::asset('administrator/css/bootstrap.min.css')}}" rel='stylesheet' type='text/css' />



	<link href="{{URL::asset('administrator/css/style.css')}}" rel='stylesheet' type='text/css' />



	<link href="{{URL::asset('administrator/css/font-awesome.css')}}" rel="stylesheet"> 



	<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'>



	<link rel="stylesheet" href="{{URL::asset('administrator/css/icon-font.min.css')}}" type='text/css' />



	<script src="{{URL::asset('administrator/js/jquery-1.10.2.min.js')}}"></script>



</head> 

<body>



	<div class="error_page">												

		<div class="error-top" style="width:32%;">

			<h2 class="inner-tittle page">Star 9000</h2>



			@if ($errors->any())

			<div class="alert alert-danger">

				<ul>

					@foreach ($errors->all() as $error)

					<li>{{ $error }}</li>

					@endforeach

				</ul>

			</div>

			@endif



            @if (Session::has('success'))

			<div class="alert alert-success alert-block">

				<button type="button" class="close" data-dismiss="alert">×</button> 

				<strong>{{Session::get('success') }}</strong>

			</div>

			@endif

			@if (Session::has('danger'))

			<div class="alert alert-danger alert-block">

				<button type="button" class="close" data-dismiss="alert">×</button> 

				<strong>{{Session::get('danger') }}</strong>

			</div>

			@endif

			<div class="login">

				<h3 class="inner-tittle t-inner">Resetta la password</h3>																

				<form method="post">

					<input type="text" class="text" value="{{ old('email') }}" placeholder="indirizzo e-mail" name="email" >
					<div class="submit"><input style="font-size:15px;" type="submit" value="Invia Reimposta collegamento password" ></div>

					<div class="clearfix"></div>

					{!! csrf_field() !!}

				</form>

			</div>

		</div>

	</div>

	<div class="footer">





	</div>

	<script src="{{URL::asset('administrator/js/jquery.nicescroll.js')}}"></script>

	<script src="{{URL::asset('administrator/js/scripts.js')}}"></script>

	<script src="{{URL::asset('administrator/js/bootstrap.min.js')}}"></script>

</body>

</html>