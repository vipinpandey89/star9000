@extends('admin.layout.layout')
@section('title','dasbhoard')
@section('content')
<style>
.error {
	color: red;
}
</style>
<div class="outter-wp">
	<div class="sub-heard-part">
		<ol class="breadcrumb m-b-0">
			<li><a href="{{url('admin/dashboard')}}">Home</a></li>
			<li class="active">Calendario</li>
		</ol>
	</div>
	@if (Session::has('success'))
	<div class="alert alert-success alert-block">
		<button type="button" class="close" data-dismiss="alert">×</button> 
		<strong>{{Session::get('success') }}</strong>
	</div>
	@endif
	<div class="row">
		<form method="get" action="{{url('admin/calendario')}}">
			<div class="col-lg-3" >
				<div class="form-group">
					<div class="col-sm-10">
						<div id="date-selecter-picker" ></div>
					</div>									
				</div>
			</div>
			<div class="col-lg-6" >
				<div class="form-group">
					<div class="col-sm-10">
						<input class="form-control1" type="text" id="up-search-bttn" placeholder="Ricerca">
					</div>									
				</div>
			</div>
			<div class="col-lg-3">
				<div class="form-group">
					<div class="col-sm-10">
						<input type="text" id="filter-from-date" class="form-control1" name="fromdate" placeholder="{{ __('menu.From Date') }}">
					</div>									
				</div>
			</div>
			<div class="col-lg-3">
				<div class="form-group">
					<div class="col-sm-10">
						<input type="text" id="filter-to-date" class="form-control1" name="todate" placeholder="{{ __('menu.To Date') }}">
					</div>									
				</div>
			</div>
			<div class="col-lg-3">
				<div class="">
					<div class="col-sm-10">
						<select multiple="mutiple" id="filter-doctor" name="filter_doctor[]">
							<!-- <option value="">{{ __('menu.Select Doctor') }}</option> -->
							@foreach($Doctor as $doc)
								<option value="{{$doc->id}}">{{$doc->surname.' '.$doc->name}}</option>
							@endforeach	
						</select>
					</div>									
				</div>
			</div>
			<div class="col-lg-3">
				<div class="form-group">
					<div class="col-sm-10">
						<select id="filter-examtype" class="form-control1" multiplename="filter_examtype">
							<option value="">{{ __('menu.Select specialty') }}</option>
							@foreach($examination as $item)
							<option value="{{$item->id}}">{{$item->title}}</option>
							@endforeach	
						</select>
					</div>									
				</div>
			</div>
			<div class="col-lg-3">
				<div class="form-group">
					<div class="col-sm-10">
						<select id="filter-room" class="form-control1" name="filter_room">
							<option value="">{{ __('menu.Type of visit') }}</option>
							@foreach($rooms as $room)
								<option value="{{$room->id}}">{{$room->room_name}}</option>
							@endforeach	
						</select>
					</div>									
				</div>
			</div>
			<div class="col-lg-3">
				<div class="form-group">
					<div class="col-sm-10">
						<button type="button" id="filter-button" class="btn btn-default"> {{ __('menu.Filter') }}</button>
					</div>									
				</div>
			</div>
			<div class="col-lg-3">
				<div class="form-group">
					<div class="col-sm-10">
						<button type="button" id="clear-filter-button" class="btn btn-default"> {{ __('menu.Clear Filter') }}</button> 
					</div>									
				</div>
			</div>
			<div class="col-lg-3">
				<div class="form-group">
					<div class="col-sm-10">
						<button type="button" id="next-availability" class="btn btn-default"> {{ __('menu.Next Availability') }}</button>
						<button type="button" id="all-availability" class="btn btn-default"> {{ __('menu.All Availability') }}</button> 
						<button type="button" id="compare-doctor" class="btn btn-default"> {{ __('menu.Compare') }}</button> 
					</div>									
				</div>
			</div>
			
		</form>
	</div>
	<div><center><span id="doc-av-mssg" style="color: orange;"></span></center></div>
	<br>
	<div class="graph-visual tables-main">	

		<div id='calendar'></div>
		<div style='clear:both'></div>
		<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-body">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<p></p>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div id="patientModal" class="modal" role="dialog" style="overflow-y: scroll;">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close close_appointment"  data-dismiss="modal">&times;</button>
					<h4 id="custom-app-title-pat" class="modal-title">Crea nuovo paziente</h4>
					<span id="error-pat"></span>
				</div>
				<div class="modal-body">
					<form  id='patientForm' method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label for="">{{ __('menu.Patient Surname') }} <span style="color: red">*</span></label>
							<input id="pat-surname" type="text" name="surname" class="form-control" style="margin-bottom: 0px;">
						</div>
						<div class="form-group">
							<label for="">{{ __('menu.Patient Name') }} </label>
							<input id="pat-name" type="text" name="pat_name" class="form-control" style="margin-bottom: 0px;">
						</div>
						<div class="form-group">
							<label for="">{{ __('menu.Patient Email') }} </label>
							<input id="pat-email" type="text" name="pat_email" class="form-control" style="margin-bottom: 0px;">
						</div>
						<div class="form-group">
							<label for="">{{ __('menu.Patient Phone Number') }} </label>
							<input id="pat-phone-number" type="number" name="pat_phone_num" class="form-control" style="margin-bottom: 0px;">
						</div>
						<div class="form-group">
							<label for="">{{ __('menu.Date of Birth') }}  <span style="color: red">*</span></label>
							<input id="pat-dob" type="text" name="pat_dob" class="form-control" style="margin-bottom: 0px;">
						</div>
						<div class="form-group">
							<label for="">{{ __('menu.Patient Description') }}</label>
							<textarea class="form-control" name="pat_desc"></textarea>
						</div>
						{!! csrf_field() !!}	

						<button type="button" id="savepatientbutton" class="btn btn-default" name="add">Crea paziente</button> 
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- here create a model for -->
	<div id="myModal" class="modal" role="dialog" style="overflow-y: scroll;">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close close_appointment"  data-dismiss="modal">&times;</button>
					<h4 id="custom-app-title" class="modal-title">Appuntamento </h4>
					<span id="error"></span>
				</div>
				<div class="modal-body">
					
					<form  id='myForm' method="post" enctype="multipart/form-data"> 			<input type="hidden" name="appointment_id" id="app_id" value="">
						<input type="hidden" name="pat_id" id="pat_id" value="">
						<input type="hidden" id="available_doc" value="1">

						<div class="form-group ">
							<label for="title">{{ __('menu.specialty') }}<span style="color: red">*</span></label> 
							<select name="examination_id" id="examination_id"  class="form-control" required="required"  style="height: 48px!important">
								<option value="">{{ __('menu.Select specialty') }}</option>
								@foreach($examination as $item)
								<option value="{{$item->id}}">{{$item->title}}</option>
								@endforeach									
							</select>	

						</div>




						<div class="form-group ">
							<label for="title">{{ __('menu.Type of visit') }} <span style="color: red">*</span></label> 
							<select name="rooms" id="rooms"  class="form-control" required="required"  style="height: 48px!important">


							</select>	

						</div>

						<div class="form-group ">
							<label for="title">Medico <span style="color: red">*</span></label> 
							<select name="doctro" id="doctors"  class="form-control" required="required"  style="height: 48px!important">

							</select>
							

						</div>


						<div class="form-group {{ $errors->has('weekday_num') ? ' has-error' : '' }}">
							<label for="">{{ __('menu.StartTime') }} <span style="color: red">*</span></label>
							<div class="input-group bootstrap-timepicker timepicker">
								<input id="timepicker1" type="text" name="starteTime" class="form-control1 input-small timecall" readonly="" style="margin-bottom: 0px;">
								<span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
							</div>
						</div>	

						<div class="form-group {{ $errors->has('weekday_num') ? ' has-error' : '' }}">
							<label for="">{{ __('menu.EndTime') }} <span style="color: red">*</span></label>
							<div class="input-group bootstrap-timepicker timepicker">
								<input id="timepicker2" type="text" name="endtime" class="form-control1 input-small timecall"  readonly="" style="margin-bottom: 0px;">
								<span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
							</div>
						</div>
						<div class="form-group">
							<label for="">Motivo visita</label>
							<div class="input-group">
								<textarea id="appointment-visit-motive" name="visit_motive" cols="80" class="form-control"></textarea>
							</div>
						</div>
						<input type="hidden" id="patient-id" name="patient_id">
						<div class="form-group">
							<label for="">{{ __('menu.Patient') }} <span style="color: red">*</span></label>
							<input id="patient-info" type="text" name="patient" class="form-control"  required="required" style="margin-bottom: 0px;">
							
						</div>

						<input type="hidden" name="selected_date" id="selecte_date">

						<div id="recurrence_box" class="form-group">
							<label for="">{{ __('menu.Recurrence') }}</label>
							<input id="recurrence-cust" value="1" type="checkbox" name="recurrence" style="margin-bottom: 0px;">
						</div>

						<div id="recurrence-section" style="display: none;">
							<div class="form-group">
								<label for="">{{ __('menu.Recurrence End Date') }} <span style="color: red">*</span></label>
								<input required="required" type="text" id="recurrence_end" name="recurrence_end"  class="form-control"  style="margin-bottom: 0px;">
							</div>
							<div class="form-group">
								<label for="">{{ __('menu.Recurrence Type') }} <span style="color: red">*</span></label>
								<select name="recurrence_type" id="recurrence_type"  class="form-control" required="required"  style="height: 48px!important">
									<option value="">Selezionare</option>
									<option value="daily">Quotidiana</option>
									<option value="weekly">settimanalmente</option>
									<option value="monthly">Mensile</option>
									<option value="yearly">Annuale</option>
								</select>
							</div>
						</div>

						{!! csrf_field() !!}	

						<button type="button" id="savebutton" class="btn btn-default" name="add">Inserisci</button> 
						<button type="button" style="display: none;" id="delete-appointment" class="btn btn-default" name="add">Annulla appuntamento</button>
						
						<button type="button" style="display: none;" id="delete-recurrence-appointment" class="btn btn-default" name="add">Elimina appuntamento di ricorrenza</button>
					</form>
				</div>					
			</div>
		</div>
	</div>
	<!-- end here-->
	
</div>
<div id="myModalCompare" class="modal fade" role="dialog">
    <div class="modal-dialog" style="width:850px;">
        <div class="modal-content">
            
        </div>
    </div>
</div>
<?php
$patientEmail=[];
foreach($patientsData as $dat){
	$patientEmail[]=$dat['email'];
}
?>
<script>
	$(document).ready(function() {
		patientEmail='<?php echo json_encode($patientEmail)?>';
		$('.timecall').timepicker({
			showMeridian: false  ,
			minuteStep: 10
		});
		availableTags = JSON.parse('<?php echo json_encode($patientsData) ?>');
		$('#calendar').fullCalendar({
			header:{
				left:'prev,next today',
				center:'title',
				right:'month,agendaWeek,agendaDay'
			},
			editable: true,
			droppable: true,
			eventLimit:true,
			eventLimitText:'Di Più',
			views: {
		        month: { 
		            editable: false,
		            eventLimit: 8
		        },
		        agendaDay: {
		        	editable: false
		        }
		    },
			hiddenDays: [ 0, 6 ],
			defaultView:'agendaDay',
			monthNames: ['Gennaio', 'Febbraio', 'Marzo', 'Aprile', 'Maggio', 'Giugno', 'Luglio', 'Agosto', 'Settembre', 'Ottobre', 'Novembre', 'Dicembre'],
			monthNamesShort: ['genn','febbr','mar','apr','magg','giugno','luglio','ag','sett','ott','nov','dic'],
			dayNames: ['Domenica', 'Lunedi', 'Martedì', 'Mercoledì', 'Giovedì', 'Venerdì', 'Sabato'],
			dayNamesShort: ['dom','lun','mar','mer','gio','ven','sab'],
			allDayText: 'Giornata',
			firstDay: 1,
			buttonText: {
				today: 'oggi',
				month: 'mese',
				week: 'settimana',
				day: 'giorno',

			},
			slotDuration: '00:10:00',
			slotLabelInterval: 10,
			slotLabelFormat: 'H:mm',
			axisFormat: 'HH:mm',
			timeFormat: 'HH:mm',
			theme: true,    
			themeSystem:'bootstrap3', 
			close: 'fa-times',
			prev: 'fa-chevron-left',
			next: 'fa-chevron-right',
			prevYear: 'fa-angle-double-left',
			nextYear: 'fa-angle-double-right',
			minTime:'07:00:00',
			maxTime:'19:00:00',
			nowIndicator:true,
			eventResize: function(event, delta, revertFunc) {
				revertFunc();
			},
			eventDrop: function(event, delta, revertFunc) {
				if(event.start.isAfter(moment())) {
					if(moment().format('YYYY-MM-DD') === event.start.format('YYYY-MM-DD')) {
						if(event.start.format("YYYY-MM-DD HH:mm:ss") < moment().format("YYYY-MM-DD HH:mm:ss")) {
							revertFunc();
							throw new Error('Not allowed.');
						}

					}
					var updatedStartDate = event.start.format('YYYY-MM-DD HH:mm:ss');
					var updatedEndDate = event.end.format('YYYY-MM-DD HH:mm:ss');
					$.confirm({
						title: event.title,
						content: 'sei sicuro?',
						buttons: {
							Ok: function () {
								$.ajax({
									type:"POST",
									url:"{{url('admin/modify-appointment')}}",
									data:{updatedStartDate:updatedStartDate,updatedEndDate:updatedEndDate,id:event.id,docId:event.doctor_id,"_token": "{{ csrf_token() }}",},
									success: function(response){
										console.log(response);
										if(response=='success')
										{
											$('#calendar').fullCalendar('refetchEvents');
										} else if(response=='exist') {
											$.confirm({
												title: 'Esiste già un appuntamento dal medico.',
												content: '',
												buttons: {
													Ok: function () {
													}
												}
											});
											revertFunc();
										} else if(response=='docnotAvailable') {
											$.confirm({
												title: 'Medico non disponibile.',
												content: '',
												buttons: {
													Ok: function () {
													}
												}
											});
											revertFunc();
										}
									}
								});
							},
							Annulla: function() {
								revertFunc();
							}
						}
					});
				} else {
					revertFunc();
				}
			},
			dayClick: function(date, jsEvent, view) {
		    	if (moment().format('YYYY-MM-DD') === date.format('YYYY-MM-DD') || date.isAfter(moment())) {
		    		
			    	if(view.name=='month'){
			    		view.calendar.gotoDate(date);
			    		view.calendar.changeView('agendaDay');
			    	}
			    	if(view.name=='agendaWeek'){
			    		view.calendar.gotoDate(date);
			    		view.calendar.changeView('agendaDay');
			    	}
			    	if(view.name=='agenda') {
			    		view.calendar.gotoDate(date);
			    		view.calendar.changeView('agendaDay');
			    	}
			    	if(view.name=='agendaDay'){
			    		if(date.format("YYYY-MM-DD HH:mm:ss") >= moment().format("YYYY-MM-DD HH:mm:ss")) {
				    		$.confirm({
				    			title: ' ',
				    			content: 'Inserisci un nuovo appuntamento ',
				    			buttons: {
				    				Ok: function () {
										searchDoctorAvailability(date);
									},
									Annulla: function () {
										
									},
								}
							});
			    		}
			    	}	
		    	}
		    },
		    events: function(start, end, timezone, callback) {
		    	renderAppointment(callback);
		    },
		    eventRender: function(event, element) {
		    	if(event.icon){          
			        element.find(".fc-content").prepend(event.icon);
			     }
		    	element.find('.eventtooltip').tooltip({
		    		title:event.description,
		    		html:true,
		    		container:'body'
		    	});
		    },
		    selectable:true,
		    selectHelper:true,
		    selectAllow: function(select) {
			    return moment().diff(select.start) <= 0; 
			},
		    eventClick: function(event) {
		    		$('#available_doc').val('2');
			    	$('#myForm')[0].reset();
			    	$("#myForm").valid();
			    	$('#error').html('');
			    	$('#app_id').val(event.id);
			    	var dateSec = event.start.format('Y')+'-'+event.start.format('M')+'-'+event.start.format('D');
					$('#selecte_date').val(dateSec);
			    	$('#timepicker1').val(event.starttime);
					$('#timepicker2').val(event.endtime);
					$('#examination_id').val(event.examination_id).trigger('change');
					setTimeout(function(){
						$('#rooms').val(event.room_id);
						$('#doctors').val(event.doctor_id);
					}, 3000);
					$('#available_doc').val('1');
					$('#patient-info').val(event.patient_email);
					$('#appointment-visit-motive').val(event.visit_motive);
			    	
			    	$('#pat_id').val(event.patient_id);
			    	$('#patient-id').val(event.patient_id);
			    	$('#custom-app-title').html('Annulla appuntamento');
			    	$('#savebutton').html('Modificare');
			    	$('#recurrence_box').hide();
			    	if(event.is_cancel != 1){
			    		if (moment().format('YYYY-MM-DD') === event.start.format('YYYY-MM-DD') || event.start.isAfter(moment())) {
			    			$('#savebutton').show();
			    			$('#delete-appointment').show();
			    			if(event.recurrence != ''){
			    				$('#delete-recurrence-appointment').show();
			    			}else{
			    				$('#delete-recurrence-appointment').hide();
			    			}
			    		}else{
			    			$('#savebutton').hide();
			    			$('#delete-appointment').hide();
			    			$('#delete-recurrence-appointment').hide();
			    		}
			    	} else{
			    		$('#savebutton').hide();
			    		$('#delete-appointment').hide();
			    		$('#delete-recurrence-appointment').hide();
			    	}

			  		$('#myModal').show();
			  		$('#pat-dob').datepicker({
						changeMonth: true,
						changeYear: true,
						yearRange: "-100:+0",
						maxDate:0,
						dateFormat:'yy-mm-dd'
					});
					$('#pat-dob').keydown(function(){
						return false;
					});
			  		$( "#patient-info" ).easyAutocomplete({
						data:availableTags,
						getValue: "surname",
						list: {
							match: {
								enabled: true
							},
							onLoadEvent: function() {
								if($( "#patient-info" ).val().length >= 8) {
									var elementCount = $("#eac-container-patient-info").find('li').length;
									if (elementCount <= 0) {
				                        $.confirm({
							    			title: ' ',
							    			content: 'vuoi creare un nuovo paziente? ',
							    			buttons: {
							    				Ok: function () {
													showPatientPopup();
												},
												Annulla: function () {
													
												},
											}
										});
				                    }
								}
							},
							onSelectItemEvent: function() {
								var value = $("#patient-info").getSelectedItemData().id;
								$('#patient-id').val(value);
							}
						},
						placeholder: "Scegli paziente"
					});
		  	},
		  	select: function(startDate, endDate, jsEvent, view, resource) {
		  		$('#myForm')[0].reset();
		  		if(view.name=='agendaDay'){
		  			$('#timepicker1').val('');
					$('#timepicker2').val('');
		  			var hoursStart = startDate.format('H:m');
					var hoursEnd = endDate.format('H:m');
					$('#timepicker1').timepicker('setTime', hoursStart);
					$('#timepicker2').timepicker('setTime', hoursEnd);
		      	}
		    }
		  });		

		function searchDoctorAvailability(SelectDateTime)
		{
			$('#error').html('');
			$('#selecte_date').val('');
			$('#patient-info').val('');
			$('#savebutton').show();
			var date = SelectDateTime.format('Y')+'-'+SelectDateTime.format('M')+'-'+SelectDateTime.format('D');
			$('#selecte_date').val(date);
			$('#app_id').val('');
			$('#pat_id').val('');
			$('#appointment-visit-motive').val('');
			$('#patient-id').val('');
			$('#custom-app-title').html('Appuntamento');
			$('#savebutton').html('Inserisci');
			$('#delete-appointment').hide();
			$('#delete-recurrence-appointment').hide();
			$('#recurrence_box').show();
			$('#myModal').show();
			var startDateRecurrence = new Date($('#selecte_date').val());
			$('#recurrence_end').datepicker({
				minDate:startDateRecurrence
			});
			$('#pat-dob').datepicker({
				changeMonth: true,
				changeYear: true,
				yearRange: "-100:+0",
				maxDate:0,
				dateFormat:'yy-mm-dd'
			});
			$('#pat-dob').keydown(function(){
				return false;
			});
			$( "#patient-info" ).easyAutocomplete({
				data:availableTags,
				getValue: "surname",
				list: {
					match: {
						enabled: true
					},
					onLoadEvent: function() {
						if($( "#patient-info" ).val().length >= 8) {
							var elementCount = $("#eac-container-patient-info").find('li').length;
							if (elementCount <= 0) {
		                        $.confirm({
					    			title: ' ',
					    			content: 'vuoi creare un nuovo paziente? ',
					    			buttons: {
					    				Ok: function () {
											showPatientPopup();
										},
										Annulla: function () {
											
										},
									}
								});
		                    }
						}
					},
					onSelectItemEvent: function() {
						var value = $("#patient-info").getSelectedItemData().id;
						$('#patient-id').val(value);
					}
				},
				placeholder: "Scegli paziente"
			});
		}

		function showPatientPopup() {
			$('#myModal').hide();
			$('#patientModal').show();
		}
		
		function createEvent(text, start, end) {
			var calendario = $('#calendar');
			var evento = {
				title: text,
				start: start,
				end: end,
				durationEditable: false,
				resourceEditable: false
			};
			calendario.fullCalendar('renderEvent', evento);
		}
		function calculateEndDate(start, duration, hoursOrDays) {
			var unit = hoursOrDays === 'D' ? 'days' : 'hours';
			return start.clone().add(duration, unit);
		}

		$('.close_appointment').click(function(){ 
			$('.modal').hide();
			$('#recurrence-section').hide();
		});
		$('#timepicker1,#timepicker2').timepicker().on('changeTime.timepicker', function(e) {
			var id= $('#examination_id').val();
			var Avdoc= $('#available_doc').val();
			if(id !== ''){
				var startDateRecurrence = new Date($('#selecte_date').val());
			$('#recurrence_end').datepicker({
				minDate:startDateRecurrence
			});
			var selecte_date= $('#selecte_date').val();

			var starttime= $('#timepicker1').val();
			var endTime= $('#timepicker2').val();

			var SelectDateTime = selecte_date+' '+starttime;
			var roomSelected = $('#rooms').val();
			$.ajax({
				method: 'GET',
				url: "{{ url('/admin/ajaxresponse') }}"+'/'+id,
				data:{selectdate:SelectDateTime,starttime:starttime,endtime:endTime,avdoc:Avdoc},
				cache: false,
				success: function(html){		   		
					var decodeData=  JSON.parse(html);
			   		$('#rooms').empty();
			   		//$('#rooms').append('<option value="">Select Rooms</option>');
		            // here is for rooms section //  
		            var firstDurationSec = 0;
            		var ffCounterSec=1;      
		            $.each(decodeData['rooms'], function( key, value ) {

		            	$('#rooms').append($('<option>',
		            	{
		            		value: value.id,
		            		text : value.room_name,
		            		roomtime: value.duration
		            	}));
		            	if(ffCounterSec == 1) {
		            		firstDurationSec = value.duration;
		            	}
		            	ffCounterSec++;
		            });
		            setSecondTimePicker(SelectDateTime,firstDurationSec);
		           // end section here //

		           //start doctor detail here//

		           $('#doctors').empty();
		           $.each(decodeData['DoctorInformation'], function( key1, value1 ) {

			           	$('#doctors').append($('<option>',
			           	{
			           		value: value1.user_id,
			           		text : value1.surname+' '+value1.name,
			           	}));
		           });
		           	// end here doctor detail//
		           	if(roomSelected != '') {
		           		$('#rooms').val(roomSelected);
		           	}
		           }
      	 	});
			}
		});
		$('#examination_id').change(function(){

			var id= $(this).val();
			
			if(id !== ''){
			var selecte_date= $('#selecte_date').val();

			var starttime= $('#timepicker1').val();
			var endTime= $('#timepicker2').val();

			var SelectDateTime = selecte_date+' '+starttime;
			var AvdocSec= $('#available_doc').val();
			$.ajax({
				method: 'GET',
				url: "{{ url('/admin/ajaxresponse') }}"+'/'+id,
				data:{selectdate:SelectDateTime,starttime:starttime,endtime:endTime,avdoc:AvdocSec},
				cache: false,
				success: function(html){		   		
					var decodeData=  JSON.parse(html);
		   		$('#rooms').empty();
		   		//$('#rooms').append('<option value="">Tipologia visita</option>');
            // here is for rooms section //  
            var firstDuration = 0;
            var ffCounter=1; 
            $.each(decodeData['rooms'], function( key, value ) {

            	$('#rooms').append($('<option>',
            	{
            		value: value.id,
            		text : value.room_name,
            		roomtime: value.duration
            	}));
            	if(ffCounter == 1) {
            		firstDuration = value.duration;
            	}
            	ffCounter++;
            });
            setSecondTimePicker(SelectDateTime,firstDuration);
           // end section here //

           //start doctor detail here//

           $('#doctors').empty();
           if(decodeData['DoctorInformation'] == ''){
           		$('#error').html('<div class="alert alert-danger">Nessun medico disponibile.</div>');
           }else{
           	$('#error').html('');
           }
           $.each(decodeData['DoctorInformation'], function( key1, value1 ) {

	           	$('#doctors').append($('<option>',
	           	{
	           		value: value1.user_id,
	           		text : value1.surname+' '+value1.name,
	           	}));
           });
           	// end here doctor detail//
           }
      	 });
		}
	});
		
	});
</script>

<script type="text/javascript">
	$(document).ready(function(){
		$('#filter-from-date').datepicker({
			dateFormat: "yy-mm-dd", 
	        onSelect: function(date){            
	            var date1 = $('#filter-from-date').datepicker('getDate');           
	            var date = new Date( Date.parse( date1 ) ); 
	            date.setDate( date.getDate() + 1 );        
	            var newDate = date.toDateString(); 
	            newDate = new Date( Date.parse( newDate ) );                      
	            $('#filter-to-date').datepicker("option","minDate",newDate);            
	        }
		});
		$('#filter-to-date').datepicker({
			dateFormat: "yy-mm-dd"
		});
		$('#delete-appointment').click(function(){
			var appointmentId = $('#app_id').val();
			if(appointmentId != '') {
				$.confirm({
	    			title: 'Annulla appuntamento',
	    			content: 'sei sicuro?',
	    			buttons: {
	    				Ok: function () {
							$.ajax({
								type:"POST",
								url:"{{url('admin/cancel-appointment')}}",
								data:{appid:appointmentId,"_token": "{{ csrf_token() }}",},
								success: function(response){
									console.log(response);
									if(response=='success')
									{
										location.reload();
									}
								}
							});
						},
						Annulla: function() {

						}
					}
				});
			}
		});
		$('#delete-recurrence-appointment').click(function(){
			var appointmentId = $('#app_id').val();
			if(appointmentId != '') {
				$.confirm({
	    			title: 'Annulla appuntamento',
	    			content: 'sei sicuro?',
	    			buttons: {
	    				Ok: function () {
							$.ajax({
								type:"POST",
								url:"{{url('admin/cancel-recurrence-appointment')}}",
								data:{appid:appointmentId,"_token": "{{ csrf_token() }}",},
								success: function(response){
									console.log(response);
									if(response=='success')
									{
										location.reload();
									}
								}
							});
						},
						Annulla: function() {

						}
					}
				});
			}
		});
		$("#myForm").validate({
			rules: {
				examination_id: "required",
				rooms: "required",
				doctro: "required",
				patient: "required",
				recurrence_end:"required",
				recurrence_type:"required"
			},
			messages: {
				examination_id: "Seleziona il tipo di esame.",
				rooms: "Si prega di selezionare la stanza.",
				doctro: "Per favore, seleziona un dottore.",
				patient: "Seleziona il paziente.",
				recurrence_end:"Inserisci la data di fine della ricorrenza.",
				recurrence_type:"Seleziona il tipo di ricorrenza."
			}
		});

		$('#patientForm').validate({
			rules: {
				surname: "required",
				pat_email: {
					email: true
				},
				pat_phone_num: {
					maxlength: 10,
					minlength: 10
				},
				pat_dob:"required"
			},
			messages: {
				surname: "Inserisci il cognome del paziente.",
				pat_email: {
					email: "Inserisci un indirizzo email valido per il paziente."
				},
				pat_phone_num: {
					maxlength: "Inserire un numero di telefono paziente valido.",
					minlength: "Inserire un numero di telefono paziente valido."
				},
				pat_dob:"Inserisci la data di nascita del paziente."
			}
		});

		$('#savepatientbutton').click(function() {
			$('#error-pat').html('');
			var patEmail = $('#pat-email').val();
			var patSurname = $('#pat-surname').val();
			var patnameS = $('#pat-name').val();
			var patDob = $('#pat-dob').val();
			var emailError=1;
			if(patEmail != '') {
				if(patientEmail.indexOf(patEmail) != -1){
					$('#error-pat').html('<div class="alert alert-danger"><strong>Errore!</strong>Il paziente esiste già.</div>');
					emailError=2;
				}else{
					emailError=1;
				}
				patSurname = patSurname+' '+patnameS+' - ('+patDob+')';
			}
			if(emailError==1){
				if($("#patientForm").valid()) {
					$.ajax({
						type:"POST",
						url:"{{url('admin/create-patient')}}",
						data:$("#patientForm").serialize(),
						success: function(response){
							if(response != '')
							{
								$('#myModal').show();
								$('#patientModal').hide();
								$('#patient-info').val(patSurname);
								$('#patient-id').val(response);
								availableTags.push({"surname":patSurname,"email":patEmail,"id":response,"dob":patDob});
								$('#error').html('<div class="alert alert-success">Il paziente è stato creato con successo.</div>');
							} else {
								$('#error-pat').html('<div class="alert alert-danger"><strong>Errore!</strong>si è verificato un errore, riprova più tardi.</div>');
							}
						}
					});
				} else {
					$("#patientForm").submit()
				}
			}
		});

		$('#savebutton').click(function(){
			var startTime=$('#timepicker1').val();
			var endTime=$('#timepicker2').val();
			if(checkStartEndTime(startTime, endTime)){
				var patId=$('#patient-id').val();
				if(patId != ''){
					if($("#myForm").valid()){
						$.ajax({
							type:"POST",
							url:"{{url('admin/ajaxset-appointment')}}",
							data:$("#myForm").serialize(),
							success: function(response){
								if(response=='success')
								{
									location.reload();
								}else{
									$('#error').html('<div class="alert alert-danger"><strong>Errore!</strong>Questo appuntamento per data e ora è già prenotato.</div>');
								}
							}
						});
					}else{
						$("#myForm").submit();
					}
				} else {
					$('#error').html("<div class='alert alert-danger'><strong>Errore!</strong>Paziente non valido.</div>");
				}
			} else {
				$('#error').html("<div class='alert alert-danger'><strong>Errore!</strong>L'ora di fine dovrebbe essere successiva all'ora di inizio..</div>");
			}
		});
		
		$('#recurrence-cust').click(function(){
			if($(this).is(':checked')) {
				$('#recurrence-section').show();
				
			} else {
				$('#recurrence-section').hide();
			}
		});
		$('#filter-button').click(function(){
			var filterfromDate = $('#filter-from-date').val();
			var filtertoDate = $('#filter-to-date').val();
			if(filterfromDate != '' && filtertoDate != '') {
				$('#calendar').fullCalendar('changeView', 'agenda');
				$('#calendar').fullCalendar('option', 'visibleRange', {
				  start: new Date( Date.parse(filterfromDate)),
				  end: new Date( Date.parse(filtertoDate))
				});
			}
			var filterbydoctorssecond = $('#filter-doctor').val();
			var filterexamtypesecond = $('#filter-examtype').val();
			var filterroomsecond = $('#filter-room').val();
			if((filterbydoctorssecond != '') || (filterexamtypesecond != '') || (filterroomsecond != '')){
				$('#calendar').fullCalendar('refetchEvents');
			}
		});
		$('#next-availability').click(function(){
			var filterByDoctor = $('#filter-doctor').val();

			if(filterByDoctor != '') {
				if($('#filter-doctor').val().length > 1) {
					$.confirm({
		    			title: 'Medico',
		    			content: 'Seleziona un medico singolo.',
		    			buttons: {
		    				Ok: function () {
								
							}
						}
					});
				} else {
					var today = new Date();
					var dateToday = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
					var timeToday = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
					var dateTimeToday = dateToday+' '+timeToday;
					$.ajax({
						type:"GET",
						data:{filterByDoctor:filterByDoctor,dateTimeToday:dateTimeToday},
						url:"{{url('/admin/getdoctoravailability')}}",
						success: function(availableDate){
							$('#calendar').fullCalendar('refetchEvents');
							$("#calendar").fullCalendar('gotoDate', availableDate);
							$('#calendar').fullCalendar('changeView', 'agendaDay');
						}
					});
				}
			} else {
				$.confirm({
	    			title: 'Medico',
	    			content: 'Per favore, seleziona un medico.',
	    			buttons: {
	    				Ok: function () {
							
						}
					}
				});
			}
		});
		$('#all-availability').click(function(){
			var filterByDoctor = $('#filter-doctor').val();

			if(filterByDoctor != '') {
				if($('#filter-doctor').val().length > 1) {
					$.confirm({
		    			title: 'Medico',
		    			content: 'Seleziona un medico singolo.',
		    			buttons: {
		    				Ok: function () {
								
							}
						}
					});
				} else {
					var today = new Date();
					var dateToday = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
					var timeToday = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
					var dateTimeToday = dateToday+' '+timeToday;
					$.ajax({
						type:"GET",
						data:{filterByDoctor:filterByDoctor,dateTimeToday:dateTimeToday},
						dataType:'json',
						url:"{{url('/admin/getdoctoravailabilityDates')}}",
						success: function(result){
							var availableDates = result.dates;
							var docAvailabilty = result.ava;
							$('#date-selecter-picker').datepicker('destroy').datepicker({
								dateFormat: 'yy-mm-dd',
								beforeShowDay: function( date ) {
									var m = date.getMonth(), d = date.getDate(), y = date.getFullYear();
									var n = date.getDay()
									if((n == 0) || n == 6) {
										return [false];
									} else{
							            for (i = 0; i < availableDates.length; i++) {
							            	var dateSelectedCus = y + '-' + (m+1) + '-' + d;
							                if($.inArray(dateSelectedCus,availableDates) != -1) {
							                    return [true, 'ui-available', docAvailabilty[dateSelectedCus]];
							                }
							            }
							            return [true];
						        	}
						        },
								onSelect: function(dateText, inst) {
							        var datePik = $(this).val();
							        var day  = inst.selectedDay,
					                    mon  = inst.selectedMonth,
					                    year = inst.selectedYear;

					                var inst = $(inst.dpDiv).find('[data-year="'+year+'"][data-month="'+mon+'"]').filter(function() {
					                    return $(this).find('a').text().trim() == day;
					                });
					                if ( inst.hasClass('ui-available')){
					                    $('#doc-av-mssg').html(inst.attr('title'));
					                } else {
					                    $('#doc-av-mssg').html('');
					                }
					               
							        $("#calendar").fullCalendar( 'gotoDate', datePik );
							         $('#calendar').fullCalendar('changeView', 'agendaDay');
							    }
							});
						}
					});
				}
			} else {
				$.confirm({
					title: 'Medico',
					content: 'Per favore, seleziona un medico.',
					buttons: {
						Ok: function () {
							
						}
					}
				});
			}
		});
		$('#compare-doctor').click(function(){
			var filterByDoctorC = $('#filter-doctor').val();
			if(filterByDoctorC != '') {
				if($('#filter-doctor').val().length < 2) {
					$.confirm({
		    			title: 'Medico',
		    			content: 'Seleziona due medico.',
		    			buttons: {
		    				Ok: function () {
								
							}
						}
					});
				} else {
					var selectCalDate= $('#calendar').fullCalendar('getDate');
					var dateCom = selectCalDate.format('Y')+'-'+selectCalDate.format('M')+'-'+selectCalDate.format('D');
					var dataURL = base_url+'/admin/compareDoctor?filterByDoctor[]='+filterByDoctorC+'&date='+dateCom;
		            $('#myModalCompare').find('.modal-content').load(dataURL,function(){
		                $('#myModalCompare').modal({show:true});
		            });
	        	}
			} else {
				$.confirm({
					title: 'Medico',
					content: 'Per favore, seleziona un medico.',
					buttons: {
						Ok: function () {
						}
					}
				});
			}
		});
		$('#clear-filter-button').click(function(){
			location.reload();
		});
		
		$('#filter-doctor').multiselect({
			nonSelectedText: 'Seleziona medico',
			allSelectedText: 'Tutti selezionati',
			onChange: function(option, checked) {
		    // Get selected options.
		    var selectedOptions = $('#filter-doctor option:selected');

		    if (selectedOptions.length >= 2) {
		        // Disable all other checkboxes.
		        var nonSelectedOptions = $('#filter-doctor option').filter(function() {
		            return !$(this).is(':selected');
		        });

		        nonSelectedOptions.each(function() {
		            var input = $('input[value="' + $(this).val() + '"]');
		            input.prop('disabled', true);
		            input.parent('li').addClass('disabled');
		        });
		    }
		    else {
		        // Enable all checkboxes.
		        $('#filter-doctor option').each(function() {
		            var input = $('input[value="' + $(this).val() + '"]');
		            input.prop('disabled', false);
		            input.parent('li').addClass('disabled');
		        });
		    }
		}
		});
		$('#rooms').change(function(){
			var optionSelRoom = $('option:selected', this).attr('roomtime');
			var selecte_date_room= $('#selecte_date').val();

			var starttime_room= $('#timepicker1').val();
			var SelectDateTimeRoom = selecte_date_room+' '+starttime_room;
			setSecondTimePicker(SelectDateTimeRoom,optionSelRoom);
		});
		$('#date-selecter-picker').datepicker({
			dateFormat: 'yy-mm-dd',
			beforeShowDay: $.datepicker.noWeekends,
			onSelect: function(dateText, inst) {
		        var datePik = $(this).val();
		        $("#calendar").fullCalendar( 'gotoDate', datePik );
		        $('#calendar').fullCalendar('changeView', 'agendaDay');
		    }
		});
		$('#up-search-bttn').easyAutocomplete({
			url: function(phrase) {
			    return "{{ url('/admin/searchAppointment') }}";
			},
			getValue: function(element) {
			    return element.name;
			},
			ajaxSettings: {
			    dataType: "json",
			    method: "POST",
			    data: {
			      dataType: "json"
			    }
			},
			preparePostData: function(data) {
			    data.phrase = $("#up-search-bttn").val();
			    return data;
			},
			requestDelay: 400,
			list: {
				onSelectItemEvent: function() {
					var selAppDate = $('#up-search-bttn').getSelectedItemData().appdate;
					$("#calendar").fullCalendar( 'gotoDate', selAppDate );
				}
			}
		})
	});
	function checkStartEndTime(startTime, endTime)
	{
		var startTimeArr = startTime.split(":");
		var endTimeArr = endTime.split(":");

		var startHour = startTimeArr[0];
		var startMinute = startTimeArr[1];

		var endHour = endTimeArr[0];
		var endMinute = endTimeArr[1];

		//Create date object and set the time to that
		var startTimeObject = new Date();
		startTimeObject.setHours(startHour, startMinute, 0);

		//Create date object and set the time to that
		var endTimeObject = new Date(startTimeObject);
		endTimeObject.setHours(endHour, endMinute, 0);

		 //Now we are ready to compare both the dates
		if(startTimeObject > endTimeObject)
		{
			return false;
		} else{
			return true;
		}
	}
	function renderAppointment(callback) {
		var filterbydoctor = $('#filter-doctor').val();
		var filterexamtype = $('#filter-examtype').val();
		var filterroom = $('#filter-room').val();
		$.ajax({
			type:"GET",
			dataType:"json",
			data:{filterbydoctor:filterbydoctor,filterexamtype:filterexamtype,filterroom:filterroom},
			url:"{{url('/admin/responsedata')}}",
			success: function(response){
				callback(response);
			}
		});
	}

	function setSecondTimePicker(SelectDateTime, firstDuration) {
		var timeObject = new Date(SelectDateTime); 
        timeObject.setSeconds(timeObject.getSeconds() + firstDuration);
		var hoursEndSeel = addZero(timeObject.getHours())+':'+addZero(timeObject.getMinutes());
		$('#timepicker2').val(hoursEndSeel);
	}
	function addZero(i) {
	  if (i < 10) {
	    i = "0" + i;
	  }
	  return i;
	}
</script>
@endsection							
