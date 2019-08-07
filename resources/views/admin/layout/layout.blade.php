 
<!DOCTYPE HTML>
<html lang="{{ app()->getLocale() }}">
<head>
	<title>Star 900</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Augment Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

	<link href="{{URL::asset('administrator/css/jquery-confirm.min.css')}}" rel='stylesheet' type='text/css' />

	<link href="{{URL::asset('administrator/css/bootstrap.min.css')}}" rel='stylesheet' type='text/css' />

	<link href="{{URl::asset('administrator/bootstrap-colorpicker.css')}}" rel='stylesheet'/>

	<link href="{{URL::asset('administrator/css/fullcalendar.min.css')}}" rel='stylesheet' />

	<link href="{{URL::asset('administrator/css/fullcalendar.print.min.css')}}" rel='stylesheet' media='print' />

	<link href="{{URL::asset('administrator/css/style.css')}}" rel='stylesheet' type='text/css' />

	<link href="{{URl::asset('administrator/css/font-awesome.css')}}" rel="stylesheet"> 

	<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="{{URL('administrator/css/icon-font.min.css')}}" type='text/css' />


	<script src="{{URL::asset('administrator/js/jquery-1.10.2.min.js')}}"></script>

	<!-- time picker here -->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/css/bootstrap-timepicker.min.css">

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.js"></script>

	<!-- time picker here -->

	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.css">

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.js"></script>


	<script src="{{URL::asset('administrator/js/amcharts.js')}}"></script>	
	<script src="{{URL::asset('administrator/js/serial.js')}}"></script>	
	<script src="{{URL::asset('administrator/js/light.js')}}"></script>	
	<script src="{{URL::asset('administrator/js/radar.js')}}"></script>	
	<link href="{{URL::asset('administrator/css/fabochart.css')}}" rel='stylesheet' type='text/css' />

	<script src="{{URL::asset('administrator/js/css3clock.js')}}"></script>

	<script src="{{URL::asset('administrator/js/skycons.js')}}"></script>

	<script src="{{URL::asset('administrator/js/jquery.easydropdown.js')}}"></script>

</head> 
<body>
	<div class="page-container">

		<div class="left-content">

			<div class="inner-content">

				<div class="header-section">

					<div class="top_menu">
						<div class="main-search">
							<form>
								<input type="text" value="Cerca" onFocus="this.value = '';" onBlur="if (this.value == '') {this.value = 'Cerca';}" class="text"/>
								<input type="submit" value="">
							</form>
							<div class="close"><img src="{{url('administrator/images/cross.png')}}" /></div>
						</div>
						<div class="srch"><button></button></div>
						<script type="text/javascript">
							$('.main-search').hide();
							$('button').click(function (){
								$('.main-search').show();
								$('.main-search text').focus();
							}
							);
							$('.close').click(function(){
								$('.main-search').hide();
							});
						</script>

						<div class="profile_details_left">
							<ul class="nofitications-dropdown">
								<li class="dropdown note dra-down">
									<div id="dd" class="wrapper-dropdown-3" tabindex="1">
										<span>Italia</span>
										<!-- <ul class="dropdown">
											<li><a class="deutsch">France</a></li>
											<li><a class="english"> Italy</a></li>
											<li><a class="espana">Brazil</a></li>
											<li><a class="russian">Usa</a></li>

										</ul> -->
									</div>
									<script type="text/javascript">

										function DropDown(el) {
											this.dd = el;
											this.placeholder = this.dd.children('span');
											this.opts = this.dd.find('ul.dropdown > li');
											this.val = '';
											this.index = -1;
											this.initEvents();
										}
										DropDown.prototype = {
											initEvents : function() {
												var obj = this;

												obj.dd.on('click', function(event){
													$(this).toggleClass('active');
													return false;
												});

												obj.opts.on('click',function(){
													var opt = $(this);
													obj.val = opt.text();
													obj.index = opt.index();
													obj.placeholder.text(obj.val);
												});
											},
											getValue : function() {
												return this.val;
											},
											getIndex : function() {
												return this.index;
											}
										}

										$(function() {

											var dd = new DropDown( $('#dd') );

											$(document).click(function() {
																			// all dropdowns
																			$('.wrapper-dropdown-3').removeClass('active');
																		});

										});

									</script>
								</li>
								<!-- <li class="dropdown note">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-envelope-o"></i> <span class="badge">3</span></a>


									<ul class="dropdown-menu two first">
										<li>
											<div class="notification_header">
												<h3>You have 3 new messages  </h3> 
											</div>
										</li>
										<li><a href="#">
											<div class="user_img"><img src="{{url('administrator/images/1.jpg')}}" alt=""></div>
											<div class="notification_desc">
												<p>Lorem ipsum dolor sit amet</p>
												<p><span>1 hour ago</span></p>
											</div>
											<div class="clearfix"></div>	
										</a></li>
										<li class="odd"><a href="#">
											<div class="user_img"><img src="{{url('administrator/images/in.jpg')}}" alt=""></div>
											<div class="notification_desc">
												<p>Lorem ipsum dolor sit amet </p>
												<p><span>1 hour ago</span></p>
											</div>
											<div class="clearfix"></div>	
										</a></li>
										<li><a href="#">
											<div class="user_img"><img src="{{url('administrator/images/in1.jpg')}}" alt=""></div>
											<div class="notification_desc">
												<p>Lorem ipsum dolor sit amet </p>
												<p><span>1 hour ago</span></p>
											</div>
											<div class="clearfix"></div>	
										</a></li>
										<li>
											<div class="notification_bottom">
												<a href="#">See all messages</a>
											</div> 
										</li>
									</ul>
								</li> -->

								<!-- <li class="dropdown note">
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
								</li>	 -->
								<!-- <li class="dropdown note">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-tasks"></i> <span class="badge blue1">9</span></a>
									<ul class="dropdown-menu two">
										<li>
											<div class="notification_header">
												<h3>You have 9 pending task</h3>
											</div>
										</li>
										<li><a href="#">
											<div class="task-info">
												<span class="task-desc">Database update</span><span class="percentage">40%</span>
												<div class="clearfix"></div>	
											</div>
											<div class="progress progress-striped active">
												<div class="bar yellow" style="width:40%;"></div>
											</div>
										</a></li>
										<li><a href="#">
											<div class="task-info">
												<span class="task-desc">Dashboard done</span><span class="percentage">90%</span>
												<div class="clearfix"></div>	
											</div>

											<div class="progress progress-striped active">
												<div class="bar green" style="width:90%;"></div>
											</div>
										</a></li>
										<li><a href="#">
											<div class="task-info">
												<span class="task-desc">Mobile App</span><span class="percentage">33%</span>
												<div class="clearfix"></div>	
											</div>
											<div class="progress progress-striped active">
												<div class="bar red" style="width: 33%;"></div>
											</div>
										</a></li>
										<li><a href="#">
											<div class="task-info">
												<span class="task-desc">Issues fixed</span><span class="percentage">80%</span>
												<div class="clearfix"></div>	
											</div>
											<div class="progress progress-striped active">
												<div class="bar  blue" style="width: 80%;"></div>
											</div>
										</a></li>
										<li>
											<div class="notification_bottom">
												<a href="#">See all pending task</a>
											</div> 
										</li>
									</ul>
								</li>	 -->	   							   		
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

					<div class="down">	
						<a href="{{url('/admin/bacheca')}}"><img src="{{url('administrator/images/admin.jpg')}}"></a>
						<a href="{{url('/admin/bacheca')}}"><span class=" name-caret">Lucia Rossi</span></a>
						<p>Segretaria</p>
						<ul>
							<li><a class="tooltips" href="javascript:void()"><span>Profilo</span><i class="lnr lnr-user"></i></a></li>
							<li><a class="tooltips" href="javascript:void()"><span>Settaggi</span><i class="lnr lnr-cog"></i></a></li>
							<li><a class="tooltips" href="{{url('admin/admin-logout')}}"><span>Log out</span><i class="lnr lnr-power-switch"></i></a></li>
						</ul>
					</div>
					<!--//down-->
					<div class="menu">
						      <ul id="menu" >
						            	<li><a href="{{url('admin/bacheca')}}"><i class="fa fa-tachometer"></i> <span>{{ __('menu.Dashboard') }}</span></a></li>

								@if(Auth::user()->role_type=='1')			
										<li><a href="{{url('admin/lista-segretaria')}}"><i class="lnr lnr-user"></i> <span>{{ __('menu.Addsecretary') }}</span></a></li>

										<li><a href="{{url('admin/visite')}}"><i class="lnr lnr-user"></i> <span>{{ __('menu.Examination') }} </span></a></li>

										<li><a href="{{url('admin/calendario')}}"><i class="fa fa-table"></i> <span>{{ __('menu.appointment_label') }}</span></a></li>

										<li><a href="{{url('admin/assegna-stanza')}}"><i class="fa fa-table"></i> <span>{{ __('menu.Rooms') }}</span></a></li>

										<li><a href="{{url('admin/elenco-medico')}}"><i class="fa fa-user-md" aria-hidden="true"></i><span>{{ __('menu.AddDoctor') }}</span></a></li>

										<!--<li><a href="{{url('admin/doctor-leaves')}}"><i class="fa fa-user-md" aria-hidden="true"></i><span>Leaves</span></a></li>-->
								@elseif( Auth::user()->role_type=='2')

								       <li><a href="{{url('admin/elenco-medico')}}"><i class="fa fa-user-md" aria-hidden="true"></i><span>{{ __('menu.AddDoctor') }}</span></a></li>

								       <li><a href="{{url('admin/calendario')}}"><i class="fa fa-table"></i> <span>{{ __('menu.appointment_label') }}</span></a></li>
								@else		
										<li><a href="{{url('admin/profilo-visite')}}"><i class="fa fa-user-md" aria-hidden="true"></i><span>{{ __('menu.ProfileExamination') }}</span></a></li>
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
						<link rel="stylesheet" href="{{URL::asset('administrator/css/vroom.css')}}">
						<script type="text/javascript" src="{{URL::asset('administrator/js/vroom.js')}}"></script>
						<script type="text/javascript" src="{{URL::asset('administrator/js/TweenLite.min.js')}}"></script>
						<script type="text/javascript" src="{{URl::asset('administrator/js/CSSPlugin.min.js')}}"></script>
						<script src="{{URL::asset('administrator/js/jquery.nicescroll.js')}}"></script>
						<script src="{{URl::asset('administrator/js/scripts.js')}}"></script>
						<script type="text/javascript" src="{{URL::asset('administrator/js/jquery.min.js')}}" ></script>
						<script type="text/javascript" src="{{URL::asset('administrator/js/jquery-ui.min.js')}}"></script>
						<script type="text/javascript" src="{{URL::asset('administrator/js/jquery-confirm.min.js')}}" ></script>
						<script src="{{URL::asset('administrator/js/bootstrap.min.js')}}"></script>
						
						<script src="{{URL::asset('administrator/bootstrap-colorpicker.js')}}"></script>
						<script type="text/javascript" src="{{URL::asset('administrator/js/moment.min.js')}}" ></script>
						<script type="text/javascript" src="{{URL::asset('administrator/js/fullcalendar.min.js')}}" ></script>
					</body>
					</html>