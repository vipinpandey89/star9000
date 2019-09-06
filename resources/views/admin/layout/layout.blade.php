
<!DOCTYPE HTML>
<html lang="{{ app()->getLocale() }}">
<head>
	<title>Star 9000</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Augment Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<script src="{{URL::asset('administrator/js/jquery-1.10.2.min.js')}}"></script>
	<link href="{{URL::asset('administrator/css/jquery-confirm.min.css')}}" rel='stylesheet' type='text/css' />

	<link href="{{URL::asset('administrator/css/bootstrap.min.css')}}" rel='stylesheet' type='text/css' />

	<link href="{{URl::asset('administrator/bootstrap-colorpicker.css')}}" rel='stylesheet'/>

	<link href="{{URL::asset('administrator/css/fullcalendar.min.css')}}" rel='stylesheet' />

	<link href="{{URL::asset('administrator/css/fullcalendar.print.min.css')}}" rel='stylesheet' media='print' />

	<link href="{{URL::asset('administrator/css/style.css')}}" rel='stylesheet' type='text/css' />

	<link href="{{URl::asset('administrator/css/font-awesome.css')}}" rel="stylesheet"> 

	<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="{{URL('administrator/css/icon-font.min.css')}}" type='text/css' />
	<link rel="stylesheet" href="{{URL('administrator/css/easy-autocomplete.min.css')}}" type='text/css' />

	

	<!-- time picker here -->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/css/bootstrap-timepicker.min.css">

	<!-- time picker here -->

	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.css">

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.js"></script>
	
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.js"></script>
	
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="{{URL::asset('administrator/js/css3clock.js')}}"></script>
	@if ((Route::currentRouteAction() == 'App\Http\Controllers\PatientController@index') || (Route::currentRouteAction() == 'App\Http\Controllers\PatientController@EditPatient'))
		<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
	@endif
	<script type="text/javascript">
		var base_url = '<?php echo url('/') ?>';
	</script>
</head> 
<body>
	<div class="page-container">

		<div class="left-content">

			<div class="inner-content">

				<div class="header-section">

					<div class="top_menu">

						<div class="profile_details_left">
							<ul class="nofitications-dropdown">
								<li class="dropdown note dra-down">
									
										&nbsp;
									
								</li>

								<li class="dropdown note">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-bell-o"></i> <span class="badge">5</span></a>

									<ul class="dropdown-menu two">
										<li>
											<div class="notification_header">
												<h3>You have 5 new notification</h3>
											</div>
										</li>
										<li><a href="#">
											<div class="user_img"><img src="{{url('administrator/images/in.jpg')}}" alt=""></div>
											<div class="notification_desc">
												<p>Lorem ipsum dolor sit amet</p>
												<p><span>1 hour ago</span></p>
											</div>
											<div class="clearfix"></div>	
										</a></li>
										<li class="odd"><a href="#">
											<div class="user_img"><img src="{{url('administrator/images/in5.jpg')}}" alt=""></div>
											<div class="notification_desc">
												<p>Lorem ipsum dolor sit amet </p>
												<p><span>1 hour ago</span></p>
											</div>
											<div class="clearfix"></div>	
										</a></li>
										<li><a href="#">
											<div class="user_img"><img src="{{url('administrator/images/in8.jpg')}}" alt=""></div>
											<div class="notification_desc">
												<p>Lorem ipsum dolor sit amet </p>
												<p><span>1 hour ago</span></p>
											</div>
											<div class="clearfix"></div>	
										</a></li>
										<li>
											<div class="notification_bottom">
												<a href="#">See all notification</a>
											</div> 
										</li>
									</ul>
								</li>	
															   		
								<div class="clearfix"></div>	
							</ul>
						</div>
						<div class="clearfix"></div>	
						<!--//profile_details-->
					</div>
					<!--//menu-right-->
					<div class="clearfix"></div>
				</div>
				

				@yield('content')


				<div class="sidebar-menu">
					<header class="logo">
						<a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> <a href="{{url('/admin/bacheca')}}"> <span id="logo"> <h1>Star 9000</h1></span> 

						</a> 
					</header>
					<div style="border-top:1px solid rgba(69, 74, 84, 0.7)"></div>
					<?php $userData=Auth::user();
					$roleTypeArray=['1'=>'Super amministratore','2'=>'segretario','3'=>'Medico']
					 ?>
					<div class="down">	
						<a href="{{url('/admin/bacheca')}}"><img src="{{url('administrator/images/admin.jpg')}}"></a>
						<a href="{{url('/admin/bacheca')}}"><span class=" name-caret">{{$userData->email}}</span></a>
						<p>{{$roleTypeArray[$userData->role_type]}}</p>
						<ul>
							<li><a class="tooltips" href="{{url('admin/profilo-visite')}}"><span>Profilo</span><i class="lnr lnr-user"></i></a></li>
							<li><a class="tooltips" href="{{url('admin/admin-logout')}}"><span>Log out</span><i class="lnr lnr-power-switch"></i></a></li>
						</ul>
					</div>
					<!--//down-->
					<div class="menu">
						      <ul id="menu" >
						            	<li><a href="{{url('admin/bacheca')}}"><i class="fa fa-tachometer"></i> <span>{{ __('menu.Dashboard') }}</span></a></li>

								@if($userData->role_type=='1')			
										<li><a href="{{url('admin/lista-segretaria')}}"><i class="lnr lnr-user"></i> <span>{{ __('menu.Addsecretary') }}</span></a></li>

										<li><a href="{{url('admin/visite')}}"><i class="lnr lnr-user"></i> <span>{{ __('menu.Examination') }} </span></a></li>

										<li><a href="{{url('admin/calendario')}}"><i class="fa fa-table"></i> <span>{{ __('menu.appointment_label') }}</span></a></li>

										<li><a href="{{url('admin/assegna-stanza')}}"><i class="fa fa-table"></i> <span>{{ __('menu.Rooms') }}</span></a></li>

										<li><a href="{{url('admin/elenco-medico')}}"><i class="fa fa-user-md" aria-hidden="true"></i><span>{{ __('menu.AddDoctor') }}</span></a></li>

										<li><a href="{{url('admin/patient')}}"><i class="fa fa-user-md" aria-hidden="true"></i><span>{{ __('menu.Patient Section') }}</span></a></li>

										<li><a href="{{url('admin/privacy')}}"><i class="" aria-hidden="true"></i><span>{{ __('menu.Privacy') }}</span></a></li>

								@elseif( Auth::user()->role_type=='2')

								       <li><a href="{{url('admin/elenco-medico')}}"><i class="fa fa-user-md" aria-hidden="true"></i><span>{{ __('menu.AddDoctor') }}</span></a></li>

								       <li><a href="{{url('admin/calendario')}}"><i class="fa fa-table"></i> <span>{{ __('menu.appointment_label') }}</span></a></li>
								@else		
										<li><a href="{{url('admin/doctor-appointments')}}"><i class="fa fa-table" aria-hidden="true"></i><span>{{ __('menu.Appointments') }}</span></a></li>
										<li><a href="{{url('admin/profilo-visite')}}"><i class="fa fa-user-md" aria-hidden="true"></i><span>{{ __('menu.UserProfile') }}</span></a></li>
								@endif
							 </ul>
						 </div>
						 </div>
					     <div class="clearfix"></div>		
						</div>
						<script>
							var toggle = true;

							$(".sidebar-icon").click(function() {                
								if (toggle)
								{
									$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
									$("#menu span").css({"position":"absolute"});
								}
								else
								{
									$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
									setTimeout(function() {
										$("#menu span").css({"position":"relative"});
									}, 400);
								}

								toggle = !toggle;
							});
						</script>

						<!--js -->
						
						<script src="{{URL::asset('administrator/js/jquery.nicescroll.js')}}"></script>
						<script src="{{URl::asset('administrator/js/scripts.js')}}"></script>
						<script type="text/javascript" src="{{URL::asset('administrator/js/jquery.min.js')}}" ></script>
						<script type="text/javascript" src="{{URL::asset('administrator/js/jquery-ui.min.js')}}"></script>
						<script type="text/javascript" src="{{URL::asset('administrator/js/jquery-confirm.min.js')}}" ></script>
						<script src="{{URL::asset('administrator/js/bootstrap.min.js')}}"></script>
						
						<script src="{{URL::asset('administrator/bootstrap-colorpicker.js')}}"></script>

						<script type="text/javascript" src="{{URL::asset('administrator/js/moment.min.js')}}" ></script>
						<script type="text/javascript" src="{{URL::asset('administrator/js/fullcalendar.min.js')}}" ></script>
						<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.js"></script>
						<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.min.js"></script>
						<script src="{{URL::asset('administrator/js/jquery.easy-autocomplete.min.js')}}"></script>
						@if ((Route::currentRouteAction() == 'App\Http\Controllers\PatientController@index') || (Route::currentRouteAction() == 'App\Http\Controllers\PatientController@EditPatient'))
							<script type="text/javascript" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
							<script type="text/javascript" src="{{URL::asset('administrator/js/patient.js')}}" ></script>
						@endif
						@if (Route::currentRouteAction() == 'App\Http\Controllers\PatientController@AddPatient')
							<script type="text/javascript" src="{{URL::asset('administrator/js/patient.js')}}" ></script>
						@endif
					</body>
					</html>