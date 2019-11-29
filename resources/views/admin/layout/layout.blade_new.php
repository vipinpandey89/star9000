
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
	@if ((Route::currentRouteAction() == 'App\Http\Controllers\AppointmentController@index') || (Route::currentRouteAction() == 'App\Http\Controllers\DoctorController@appointments'))
	<link href="{{URL::asset('administrator/css/fullcalendar.min.css')}}" rel='stylesheet' />
	<link href="{{URL::asset('administrator/css/fullcalendar.print.min.css')}}" rel='stylesheet' media='print' />
	@endif
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
	@if ((Route::currentRouteAction() == 'App\Http\Controllers\PatientController@intervento') || (Route::currentRouteAction() == 'App\Http\Controllers\PatientController@EditIntervento'))
		<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
		<link rel="stylesheet" href="{{URL('administrator/css/jquery.durationpicker.min.css')}}" type='text/css' />
	@endif
	@if (Route::currentRouteAction() == 'App\Http\Controllers\PatientController@managepatient')
		<link rel="stylesheet" href="{{URL('administrator/css/managepatient.css')}}" type='text/css' />
		<link rel="stylesheet" href="{{URL('administrator/css/jquery.durationpicker.min.css')}}" type='text/css' />
	@endif
	@if (Route::currentRouteAction() == 'App\Http\Controllers\PatientController@listByDoctor')
		<link rel="stylesheet" href="{{URL('administrator/css/managepatient.css')}}" type='text/css' />
	@endif
	@if ((Route::currentRouteAction() == 'App\Http\Controllers\AdminController@AddRoome') || (Route::currentRouteAction() == 'App\Http\Controllers\AdminController@EditRooms'))
		<link rel="stylesheet" href="{{URL('administrator/css/jquery.durationpicker.min.css')}}" type='text/css' />
	@endif
	@if ((Route::currentRouteAction() == 'App\Http\Controllers\AppointmentController@index'))
		<link rel="stylesheet" type="text/css" href="{{ URL('administrator/css/bootstrap-multiselect.css') }}">
	@endif
	
	@if ((Route::currentRouteAction() == 'App\Http\Controllers\AdminController@EditRooms') || (Route::currentRouteAction() == 'App\Http\Controllers\AdminController@AddRoome') || (Route::currentRouteAction() == 'App\Http\Controllers\PatientController@managepatient'))
		<link rel="stylesheet" type="text/css" href="{{ URL('administrator/css/evol-colorpicker.min.css') }}">
	@endif
	<script type="text/javascript">
		var base_url = '<?php echo url('/') ?>';
	</script>
</head> 
<body>
	<div id="header-menu-section">
		<div class="sidebar-menu">
					<header class="logo">
						<a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> <a href="{{url('/admin/bacheca')}}"> <span id="logo"> <h1>Star 9000</h1></span> 

						</a> 
					</header>
					<div style="border-top:1px solid rgba(69, 74, 84, 0.7)"></div>
					<?php $userData=Auth::user();
					$roleTypeArray=['1'=>'Admin','2'=>'segretario','3'=>'Medico']
					 ?>
					 <input type="hidden" id="main-content-userid" value="{{ $userData->id }}">
					<div class="down">	
						<a href="{{url('/admin/bacheca')}}"><img src="{{url('administrator/images/admin.jpg')}}"></a>
						<a href="{{url('/admin/bacheca')}}"><span class=" name-caret">{{$userData->email}}</span></a>
						<p>{{$roleTypeArray[$userData->role_type]}}</p>
						<ul>
							<li><a class="tooltips" href="{{url('admin/profilo-visite')}}"><span>Profilo</span><i class="lnr lnr-user"></i></a></li>
							<li><a class="tooltips" href="{{url('admin/admin-logout')}}"><span>Esci</span><i class="lnr lnr-power-switch"></i></a></li>
						</ul>
					</div>
					<!--//down-->
					<div class="menu">
						      <ul id="menu" >
						            	

								@if($userData->role_type=='1')
										<li><a href="{{url('admin/bacheca')}}"><i class="fa fa-tachometer"></i> <span>{{ __('menu.Dashboard') }}</span></a></li>			
										<li><a href="{{url('admin/lista-segretaria')}}"><i class="lnr lnr-user"></i> <span>{{ __('menu.Addsecretary') }}</span></a></li>

										<li><a href="{{url('admin/visite')}}"><i class="fa fa-plus-square"></i> <span>{{ __('menu.Add specialty') }} </span></a></li>

										<li><a href="{{url('admin/calendario')}}"><i class="fa fa-table"></i> <span>{{ __('menu.appointment_label') }}</span></a></li>

										<li><a href="{{url('admin/assegna-stanza')}}"><i class="fa fa-hospital-o"></i> <span>{{ __('menu.Rooms') }}</span></a></li>

										<li><a href="{{url('admin/elenco-medico')}}"><i class="fa fa-user-md" aria-hidden="true"></i><span>{{ __('menu.AddDoctor') }}</span></a></li>
										<li>
											<a href="javascript:void(0);"><i class="fa fa-user" aria-hidden="true"></i><span>{{ __('menu.Patient') }}</span></a>
											<ul>
												<li><a href="{{url('admin/paziente')}}"><span>{{ __('menu.Patient Section') }}</span></a></li>
												<li><a href="{{url('admin/privacy')}}"><span>{{ __('menu.Privacy') }}</span></a></li>
												<li><a href="{{url('admin/intervento')}}"><span>{{ __('menu.Intervention') }}</span></a></li>
												<li><a href="{{url('admin/gestire-il-paziente')}}"><span>{{ __('menu.Manage Patient') }}</span></a></li>

											</ul>
										</li>
										<li><a href="{{url('admin/schede-eye-visit')}}"><i class="fa fa-eye" aria-hidden="true"></i><span>{{ __('menu.Eye Visit Tabs') }}</span></a></li>
										<li><a href="{{url('admin/promemoria')}}"><i class="fa fa-bell" aria-hidden="true"></i><span>{{ __('menu.Reminder') }}</span></a></li>


								@elseif( Auth::user()->role_type=='2')
										<li><a href="{{url('admin/bacheca')}}"><i class="fa fa-tachometer"></i> <span>{{ __('menu.Dashboard') }}</span></a></li>
								       <li><a href="{{url('admin/elenco-medico')}}"><i class="fa fa-user-md" aria-hidden="true"></i><span>{{ __('menu.AddDoctor') }}</span></a></li>

								       <li><a href="{{url('admin/calendario')}}"><i class="fa fa-table"></i> <span>{{ __('menu.appointment_label') }}</span></a></li>
								       <li><a href="{{url('admin/elenco-per-medico')}}"><i class="fa fa-user" aria-hidden="true"></i><span>{{ __('menu.List By Doctor') }}</span></a></li>
								@else	
										<li><a href="{{url('medico/bacheca')}}"><i class="fa fa-tachometer"></i> <span>{{ __('menu.Dashboard') }}</span></a></li>	
										<li><a href="{{url('medico/appuntamenti')}}"><i class="fa fa-table" aria-hidden="true"></i><span>{{ __('menu.Appointments') }}</span></a></li>
										<li><a href="{{url('medico/paziente')}}"><i class="lnr lnr-user" aria-hidden="true"></i><span>{{ __('menu.Patients') }}</span></a></li>
										<li><a href="{{url('medico/profilo-visite')}}"><i class="fa fa-user-md" aria-hidden="true"></i><span>{{ __('menu.UserProfile') }}</span></a></li>
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
	</div>
	<div class="page-container">

		<div class="left-content">

			<div class="inner-content">

		
				

				@yield('content')
						
						<script src="{{URL::asset('administrator/js/jquery.nicescroll.js')}}"></script>
						<script src="{{URl::asset('administrator/js/scripts.js')}}"></script>
						<script type="text/javascript" src="{{URL::asset('administrator/js/jquery.min.js')}}" ></script>
						<script type="text/javascript" src="{{URL::asset('administrator/js/jquery-ui.min.js')}}"></script>
						<script type="text/javascript" src="{{URL::asset('administrator/js/jquery-confirm.min.js')}}" ></script>
						<script src="{{URL::asset('administrator/js/bootstrap.min.js')}}"></script>
						
						<script src="{{URL::asset('administrator/bootstrap-colorpicker.js')}}"></script>

						<script type="text/javascript" src="{{URL::asset('administrator/js/moment.min.js')}}" ></script>
						@if ((Route::currentRouteAction() == 'App\Http\Controllers\AppointmentController@index') || (Route::currentRouteAction() == 'App\Http\Controllers\DoctorController@appointments'))
						<script type="text/javascript" src="{{URL::asset('administrator/js/fullcalendar.min.js')}}" ></script>
						@endif
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
						@if ((Route::currentRouteAction() == 'App\Http\Controllers\PatientController@addInput') || (Route::currentRouteAction() == 'App\Http\Controllers\PatientController@editInput'))
							<script type="text/javascript" src="{{URL::asset('administrator/js/tabinput.js')}}" ></script>
						@endif
						@if (Route::currentRouteAction() == 'App\Http\Controllers\PatientController@managepatient')
							<script type="text/javascript" src="{{URL::asset('administrator/js/managepatient.js')}}" ></script>
							<script type="text/javascript" src="{{URL::asset('administrator/js/jquery.durationpicker.min.js')}}" ></script>
						@endif
						@if ((Route::currentRouteAction() == 'App\Http\Controllers\PatientController@intervento') || (Route::currentRouteAction() == 'App\Http\Controllers\PatientController@EditIntervento'))
							<script type="text/javascript" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
							<script type="text/javascript" src="{{URL::asset('administrator/js/jquery.durationpicker.min.js')}}" ></script>
							<script type="text/javascript" src="{{URL::asset('administrator/js/intervento.js')}}" ></script>
						@endif
						@if ((Route::currentRouteAction() == 'App\Http\Controllers\AdminController@AddRoome') || (Route::currentRouteAction() == 'App\Http\Controllers\AdminController@EditRooms'))
							<script type="text/javascript" src="{{URL::asset('administrator/js/jquery.durationpicker.min.js')}}" ></script>
						@endif
						@if ((Route::currentRouteAction() == 'App\Http\Controllers\AppointmentController@index'))
							<script type="text/javascript" src="{{ URL('administrator/js/bootstrap-multiselect.js') }}"></script>
						@endif
						@if ((Route::currentRouteAction() == 'App\Http\Controllers\AdminController@EditRooms') || (Route::currentRouteAction() == 'App\Http\Controllers\AdminController@AddRoome') || (Route::currentRouteAction() == 'App\Http\Controllers\PatientController@managepatient'))
							<script type="text/javascript" src="{{ URL('administrator/js/evol-colorpicker.min.js') }}"></script>
						@endif
						<script type="text/javascript" src="{{URL::asset('administrator/js/datepicker-it.js')}}" ></script>
						<script type="text/javascript">
							$(function() {
								$.datepicker.setDefaults( $.datepicker.regional["it" ]);
							});
						</script>
						<script type="text/javascript" src="{{ URL('administrator/js/reminder.js') }}"></script>
					</body>
					</html>