
<!DOCTYPE HTML>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<html lang="{{ app()->getLocale() }}">
<head>
	<title>Star 9000</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Augment Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	@if (Route::currentRouteAction() == 'App\Http\Controllers\PatientController@EditPatient')
	<script src="{{URL::asset('signature/js/wgssSigCaptX.js')}}"></script>
		<script src="{{URL::asset('signature/js/base64.js')}}"></script>
		<script src="{{URL::asset('signature/js/SigCaptX-Wizard-Main.js')}}"></script>
		<script src="{{URL::asset('signature/js/SigCaptX-Wizard-PadDefs.js')}}"></script>
		<script src="{{URL::asset('signature/js/SigCaptX-Utils.js')}}"></script>
		<script src="{{URL::asset('signature/js/SigCaptX-SessionControl.js')}}"></script>
		<script src="{{URL::asset('signature/js/SigCaptX-Globals.js')}}"></script>
		
	@endif
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
<body <?php echo (Route::currentRouteAction() == 'App\Http\Controllers\PatientController@EditPatient')?'onload="wizardEventController.body_onload()"':'' ?>>
	<div id="header-menu-section">
		<div class="top_header">
		        <nav class="navbar" style="background-color:#021f4e;">
		          <div class="container-fluid">
		            <!-- Brand and toggle get grouped for better mobile display -->
		            <div class="navbar-header">
		              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		                <span class="sr-only">Toggle navigation</span>
		                <span class="icon-bar"></span>
		                <span class="icon-bar"></span>
		                <span class="icon-bar"></span>
		              </button>
		              <span id="logo"> <h1>Star 9000</h1></span>
		            </div>
		            <!-- Collect the nav links, forms, and other content for toggling -->
		            <?php $userData=Auth::user();
					$roleTypeArray=['1'=>'Admin','2'=>'segretario','3'=>'Medico'];
					 ?>
		            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		              <ul class="nav navbar-nav navbar-right">
		                @if($userData->role_type=='1')
								<li><a href="{{url('admin/bacheca')}}"><i class="fa fa-tachometer"></i> {{ __('menu.Dashboard') }}</a></li>			
								<li><a href="{{url('admin/lista-segretaria')}}"><i class="lnr lnr-user"></i> {{ __('menu.Addsecretary') }}</a></li>

								<li><a href="{{url('admin/visite')}}"><i class="fa fa-plus-square"></i> {{ __('menu.Add specialty') }}</a></li>

								<li><a href="{{url('admin/calendario')}}"><i class="fa fa-table"></i> {{ __('menu.appointment_label') }}</a></li>

								<li> <a href="{{url('admin/assegna-stanza')}}"><i class="fa fa-hospital-o"></i> {{ __('menu.Rooms') }}</a></li>

								<li><a href="{{url('admin/elenco-medico')}}"> <i class="fa fa-user-md" aria-hidden="true"></i> {{ __('menu.AddDoctor') }}</a></li>
								<li class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="javascript:void(0);"><i class="fa fa-user" aria-hidden="true"></i>{{ __('menu.Patient') }}<span class="caret"></span></a>
									<ul class="dropdown-menu">
										<li><a href="{{url('admin/paziente')}}">{{ __('menu.Patient Section') }}</a></li>
										<li><a href="{{url('admin/privacy')}}">{{ __('menu.Privacy') }}</a></li>
										<li><a href="{{url('admin/intervento')}}">{{ __('menu.Intervention') }}</a></li>
										<li><a href="{{url('admin/gestire-il-paziente')}}">{{ __('menu.Manage Patient') }}</a></li>

									</ul>
								</li>
								<li><a href="{{url('admin/schede-eye-visit')}}"><i class="fa fa-eye" aria-hidden="true"></i> {{ __('menu.Eye Visit Tabs') }}</a></li>
								<li><a href="{{url('admin/promemoria')}}"><i class="fa fa-bell" aria-hidden="true"></i><span>{{ __('menu.Reminder') }}</span></a></li>
								<li><a href="{{url('admin/livello-di-accesso')}}"><i class="fa fa-unlock-alt" aria-hidden="true"></i> {{ __('menu.Access Level') }}</a></li>


						@elseif( Auth::user()->role_type=='2')
								<li><a href="{{url('admin/bacheca')}}"><i class="fa fa-tachometer"></i>{{ __('menu.Dashboard') }}</a></li>
								@foreach($accessibleMenus as $menu)
						       		<li><a href="{{url('admin/'.$menu->nav_link)}}">
						       			@if(!empty($menu->icon))
						       			<i class="{{$menu->icon}}" aria-hidden="true"></i>
						       			@endif
						       		{{$menu->tab_name}}</a></li>
						       	@endforeach
						       <li><a href="{{url('admin/elenco-per-medico')}}"><i class="fa fa-user" aria-hidden="true"></i>{{ __('menu.List By Doctor') }}</a></li> 
						@else	
								<li><a href="{{url('medico/bacheca')}}"><i class="fa fa-tachometer"></i>{{ __('menu.Dashboard') }}</a></li>	
								<li><a href="{{url('medico/appuntamenti')}}"><i class="fa fa-table" aria-hidden="true"></i>{{ __('menu.Appointments') }}</a></li>
								<li><a href="{{url('medico/paziente')}}"><i class="lnr lnr-user" aria-hidden="true"></i>{{ __('menu.Patients') }}</a></li>
								<li><a href="{{url('medico/profilo-visite')}}"><i class="fa fa-user-md" aria-hidden="true"></i>{{ __('menu.UserProfile') }}</a></li>
						@endif


						<li class="dropdown user_dropdown"> 
							<a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="javascript:void(0);"><span class="glyphicon glyphicon-user"></span><span class="caret"></span></a>
							<ul class="dropdown-menu">
							<div class="user_box">
								<p>{{$userData->surname.' '.$userData->name}}</p>
								<p>{{$userData->email}}</p>
								<p>Ruolo : {{$roleTypeArray[$userData->role_type]}}</p>
								@if( Auth::user()->role_type=='3')
								<button><a href="{{url('medico/logout')}}">Logout</a></button>
								@else
								<button><a href="{{url('admin/logout')}}">Logout</a></button>
								@endif
							</div>
						</ul>
						</li>
		              </ul>
		            </div><!-- /.navbar-collapse -->
		          </div><!-- /.container-fluid -->
		        </nav>
		    </div>
	</div>
	<div class="page-container">

		<div class="">

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