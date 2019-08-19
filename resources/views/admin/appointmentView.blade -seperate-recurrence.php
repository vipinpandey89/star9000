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
	<div class="graph-visual tables-main">	

		<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#recurrence-appointment" style="margin-bottom: 11px;">
			 Appuntamento di ricorrenza
		</button>


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
	<!-- here create a model for -->
	<div id="myModal" class="modal" role="dialog">
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

						<div class="form-group ">
							<label for="title">Tipo di esame <span style="color: red">*</span></label> 
							<select name="examination_id" id="examination_id"  class="form-control" required="required"  style="height: 48px!important">
								<option value="">{{ __('menu.selectctexamination') }}</option>
								@foreach($examination as $item)
								<option value="{{$item->id}}">{{$item->title}}</option>
								@endforeach									
							</select>	

						</div>




						<div class="form-group ">
							<label for="title">{{ __('menu.Available rooms') }} <span style="color: red">*</span></label> 
							<select name="rooms" id="rooms"  class="form-control" required="required"  style="height: 48px!important">


							</select>	

						</div>

						<div class="form-group ">
							<label for="title">Dottore <span style="color: red">*</span></label> 
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
							<label for="">{{ __('menu.Patient Name') }} <span style="color: red">*</span></label>
							<input id="patient-name" type="text" name="patient_name" class="form-control"  maxlength="30" required="required" style="margin-bottom: 0px;">
						</div>
						<div class="form-group">
							<label for="">{{ __('menu.Patient Email') }} <span style="color: red">*</span></label>
							<input id="patient-email" type="email" name="patient_email" class="form-control"  required="required" style="margin-bottom: 0px;">
							
						</div>
						<div class="form-group">
							<label for="">{{ __('menu.Patient Phone Number') }} <span style="color: red">*</span></label>
							<input id="patient-phone" required="required" type="number" name="patient_phone" class="form-control"  style="margin-bottom: 0px;">
							
						</div>

						<input type="hidden" name="selected_date" id="selecte_date">

						{!! csrf_field() !!}	

						<button type="button" id="savebutton" class="btn btn-default" name="add">Inserisci</button> 
						<button type="button" style="display: none;" id="delete-appointment" class="btn btn-default" name="add">Annulla appuntamento</button> 
					</form>
				</div>					
			</div>
		</div>
	</div>
	<!-- end here-->
	<!-- here we are recurrence appointment-->
	<div id="recurrence-appointment" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Appuntamento di ricorrenza</h4>
				</div>
				<div class="modal-body">
					<form  id='recurrence-appointment-form' method="post" enctype="multipart/form-data"> 			
						<div class="form-group ">
							<label for="title">Tipo di esame <span style="color: red">*</span></label> 
							<select name="rec_examination_id" id="rec_examination_id"  class="form-control" required="required"  style="height: 48px!important">
								<option value="">{{ __('menu.selectctexamination') }}</option>
								@foreach($examination as $item)
								<option value="{{$item->id}}">{{$item->title}}</option>
								@endforeach									
							</select>	

						</div>
						<div class="form-group ">
							<label for="title">{{ __('menu.Available rooms') }} <span style="color: red">*</span></label> 
							<select name="rec_rooms" id="rec_rooms"  class="form-control" required="required"  style="height: 48px!important">
							</select>	
						</div>
						<div class="form-group ">
							<label for="title">Dottore <span style="color: red">*</span></label> 
							<select name="rec_doctro" id="rec_doctro"  class="form-control" required="required"  style="height: 48px!important">
							</select>
						</div>
						<div class="form-group {{ $errors->has('weekday_num') ? ' has-error' : '' }}">
							<label for="">{{ __('menu.StartTime') }} <span style="color: red">*</span></label>
							<div class="input-group bootstrap-timepicker timepicker">
								<input id="rec_timepicker1" type="text" name="rec_starteTime" class="form-control1 input-small timecall" readonly="" style="margin-bottom: 0px;">
								<span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
							</div>
						</div>	

						<div class="form-group {{ $errors->has('weekday_num') ? ' has-error' : '' }}">
							<label for="">{{ __('menu.EndTime') }} <span style="color: red">*</span></label>
							<div class="input-group bootstrap-timepicker timepicker">
								<input id="rec_timepicker2" type="text" name="rec_endtime" class="form-control1 input-small timecall"  readonly="" style="margin-bottom: 0px;">
								<span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
							</div>
						</div>

						<div class="form-group">
							<label for="">{{ __('menu.Patient Name') }} <span style="color: red">*</span></label>
							<input id="rec-patient-name" type="text" name="rec_patient_name" class="form-control"  maxlength="30" required="required" style="margin-bottom: 0px;">
						</div>
						<div class="form-group">
							<label for="">{{ __('menu.Patient Email') }} <span style="color: red">*</span></label>
							<input id="rec-patient-email" type="email" name="rec_patient_email" class="form-control"  required="required" style="margin-bottom: 0px;">
							
						</div>
						<div class="form-group">
							<label for="">{{ __('menu.Patient Phone Number') }} <span style="color: red">*</span></label>
							<input id="rec-patient-phone" required="required" type="number" name="rec_patient_phone" class="form-control"  style="margin-bottom: 0px;">
							
						</div>
						<div class="form-group">
							<label for="">{{ __('menu.Recurrence Start Date') }} <span style="color: red">*</span></label>
							<input required="required" type="text" id="recurrence_start" name="recurrence_start" class="form-control"  style="margin-bottom: 0px;">
							
						</div>
						<div class="form-group">
							<label for="">{{ __('menu.Recurrence End Date') }} <span style="color: red">*</span></label>
							<input required="required" type="text" id="recurrence_end" name="recurrence_end" class="form-control"  style="margin-bottom: 0px;">
							
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
						<div id="monthly-section" style="display: none;">
							<div class="form-group">
								<label for="">{{ __('menu.Select Day of Month') }} <span style="color: red">*</span></label>
								<input required="required" type="text" id="recurrence_monthly_date" name="recurrence_monthly_date" class="form-control"  style="margin-bottom: 0px;">
							</div>
						</div>
						<div id="yearly-section" style="display: none;">
							<div class="form-group">
								<label for="">{{ __('menu.Select Date') }} <span style="color: red">*</span></label>
								<input required="required" type="text" id="recurrence_yearly_date" name="recurrence_yearly_date" class="form-control"  style="margin-bottom: 0px;">
							</div>
						</div>
						<?php $weekDays = array('Mon','Tue','Wed','Thu','Fri','Sat','Sun'); ?>
						<div id="weekly-section" style="display: none;">
							<div class="form-group">
								<label for="">{{ __('menu.Recurrence Day') }} <span style="color: red">*</span></label>
								@foreach($weekDays as $day)
									<input type="checkbox" value="{{$day}}" name="day[]"> {{$day}}
								@endforeach
							</div>
						</div>
						{!! csrf_field() !!}	

						<button type="button" id="save-recurrence-appointment" class="btn btn-default" name="add">Inserisci</button> 
					</form>	
				</div>
			</div>
		</div>
	</div>
	<!-- end here -->
</div>
<script>
	$(document).ready(function() {
		$('.timecall').timepicker({
			showMeridian: false  ,
			minuteStep: 10
		});
		$('#calendar').fullCalendar({
			header:{
				left:'prev,next today',
				center:'title',
				right:'month,agendaWeek,agendaDay'
			},
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
			//defaultView: 'agendaDay',
			slotDuration: '00:10:00',
			slotLabelInterval: 10,
			slotLabelFormat: 'H:mm',
			editable: true,
			axisFormat: 'HH:mm',
			timeFormat: 'HH:mm',
			theme: true,    
			themeSystem:'bootstrap3', 
			close: 'fa-times',
			prev: 'fa-chevron-left',
			next: 'fa-chevron-right',
			prevYear: 'fa-angle-double-left',
			nextYear: 'fa-angle-double-right', 
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
			    	if(view.name=='agendaDay'){
			    		$.confirm({
			    			title: ' ',
			    			content: 'Inserisci un nuovo appuntamento ',
			    			buttons: {
			    				Yes: function () {
									//createEvent('Available', date, calculateEndDate(date, parseInt(txtDuration), hoursOrDays));
									searchDoctorAvailability(date);
								},
								cancel: function () {
									
								},
							}
						});

			    	}
		    	}
		    },
		    events: "{{ url('/admin/responsedata') }}",
		    selectable:true,
		    selectHelper:true,
		    selectAllow: function(select) {
			    return moment().diff(select.start) <= 0; 
			},
		    eventClick: function(event) {
			    	$('#myForm')[0].reset();
			    	$("#myForm").valid();
			    	$('#error').html('');
			    	var dateSec = event.start.format('Y')+'-'+event.start.format('M')+'-'+event.start.format('D');
					$('#selecte_date').val(dateSec);
			    	$('#timepicker1').val(event.starttime);
					$('#timepicker2').val(event.endtime);
					$('#examination_id').val(event.examination_id).trigger('change');
					setTimeout(function(){
						$('#rooms').val(event.room_id);
						$('#doctors').val(event.doctor_id);
					}, 3000);
					$('#patient-name').val(event.patient_name);
					$('#patient-email').val(event.patient_email);
					$('#patient-phone').val(event.patient_phone);
			    	$('#app_id').val(event.id);
			    	$('#pat_id').val(event.patient_id);
			    	$('#custom-app-title').html('Annulla appuntamento');
			    	$('#savebutton').html('Aggiornare');
			    	if(event.is_cancel != 1){
			    		if (moment().format('YYYY-MM-DD') === event.start.format('YYYY-MM-DD') || event.start.isAfter(moment())) {
			    			$('#savebutton').show();
			    			$('#delete-appointment').show();
			    		}else{
			    			$('#savebutton').hide();
			    			$('#delete-appointment').hide();
			    		}
			    	} else{
			    		$('#savebutton').hide();
			    		$('#delete-appointment').hide();
			    	}

			  		$('#myModal').show();
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
			$('#patient-name').val('');
			$('#patient-email').val('');
			$('#patient-phone').val('');
			$('#savebutton').show();
			var date = SelectDateTime.format('Y')+'-'+SelectDateTime.format('M')+'-'+SelectDateTime.format('D');
			$('#selecte_date').val(date);
			$('#app_id').val('');
			$('#pat_id').val('');
			$('#custom-app-title').html('appuntamento');
			$('#savebutton').html('Inserisci');
			$('#delete-appointment').hide();
			$('#myModal').show();

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
			$('#myModal').hide();
		});
		$('#timepicker1,#timepicker2').timepicker().on('changeTime.timepicker', function(e) {
			var id= $('#examination_id').val();
			if(id !== ''){
			var selecte_date= $('#selecte_date').val();

			var starttime= $('#timepicker1').val();
			var endTime= $('#timepicker2').val();

			var SelectDateTime = selecte_date+' '+starttime;

			$.ajax({
				method: 'GET',
				url: "{{ url('/admin/ajaxresponse') }}"+'/'+id,
				data:{selectdate:SelectDateTime,starttime:starttime,endtime:endTime},
				cache: false,
				success: function(html){		   		
					var decodeData=  JSON.parse(html);
					//console.log(decodeData);
			   		$('#rooms').empty();
			   		$('#rooms').append('<option value="">Select Rooms</option>');
		            // here is for rooms section //       
		            $.each(decodeData['rooms'], function( key, value ) {

		            	$('#rooms').append($('<option>',
		            	{
		            		value: value.id,
		            		text : value.room_name,
		            	}));
		            });

		           // end section here //

		           //start doctor detail here//

		           $('#doctors').empty();
		           $.each(decodeData['DoctorInformation'], function( key1, value1 ) {

			           	$('#doctors').append($('<option>',
			           	{
			           		value: value1.user_id,
			           		text : value1.name,
			           	}));
		           });
		           	// end here doctor detail//
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

			$.ajax({
				method: 'GET',
				url: "{{ url('/admin/ajaxresponse') }}"+'/'+id,
				data:{selectdate:SelectDateTime,starttime:starttime,endtime:endTime},
				cache: false,
				success: function(html){		   		


					var decodeData=  JSON.parse(html);
					//console.log(decodeData);
		   	
		   		$('#rooms').empty();
		   		$('#rooms').append('<option value="">Select Rooms</option>');
            // here is for rooms section //       
            $.each(decodeData['rooms'], function( key, value ) {

            	$('#rooms').append($('<option>',
            	{
            		value: value.id,
            		text : value.room_name,
            	}));
            });

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
	           		text : value1.name,
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
		$('#delete-appointment').click(function(){
			var appointmentId = $('#app_id').val();
			if(appointmentId != '') {
				$.confirm({
	    			title: 'Annulla appuntamento',
	    			content: 'sei sicuro?',
	    			buttons: {
	    				Yes: function () {
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
						cancel: function() {

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
				patient_name: "required",
				patient_email: {
					required: true,
					email: true
				},
				patient_phone: {
					required: true,
					maxlength: 10,
					minlength: 10
				}
			},
			messages: {
				examination_id: "Seleziona il tipo di esame.",
				rooms: "Si prega di selezionare la stanza.",
				doctro: "Per favore, seleziona un dottore.",
				patient_name: "Inserisci il nome del paziente.",
				patient_email: {
					required: "Inserisci l'e-mail del paziente.",
					email: "Inserisci un indirizzo email valido per il paziente."
				},
				patient_phone: {
					required: "Inserisci il numero di telefono del paziente.",
					maxlength: "Inserire un numero di telefono paziente valido.",
					minlength: "Inserire un numero di telefono paziente valido."
				}
			}
		});

		$('#savebutton').click(function(){
			var startTime=$('#timepicker1').val();
			var endTime=$('#timepicker2').val();
			if(checkStartEndTime(startTime, endTime)){
				if($("#myForm").valid()){
					$.ajax({
						type:"POST",
						url:"{{url('admin/ajaxset-appointment')}}",
						data:$("#myForm").serialize(),
						success: function(response){
							console.log(response);
							if(response=='success')
							{
								location.reload();
							}else{
								$('#error').html('<div class="alert alert-danger"><strong>Error!</strong>Questo appuntamento per data e ora è già prenotato.</div>');
							}
						}
					});
				}else{
					$("#myForm").submit();
				}
			} else {
				$('#error').html("<div class='alert alert-danger'><strong>Error!</strong>L'ora di fine dovrebbe essere successiva all'ora di inizio..</div>");
			}
		});
		$('#recurrence_type').change(function(){
			switch($(this).val()) {
				case 'weekly':
					$('#weekly-section').show();
					$('#monthly-section').hide();
					$('#yearly-section').hide();
					break;
				case 'monthly':
					$('#weekly-section').hide();
					$('#monthly-section').show();
					$('#yearly-section').hide();
					break;
				case 'yearly':
					$('#weekly-section').hide();
					$('#monthly-section').hide();
					$('#yearly-section').show();
					break;
				default:
					$('#weekly-section').hide();
					$('#monthly-section').hide();
					$('#yearly-section').hide();
					break;
			}
		});
		$("#recurrence_start").datepicker({
            dateFormat: "dd-mm-yy",
            minDate: 0,
            onSelect: function (date) {
                var dt2 = $('#recurrence_end');
                var minDate = $(this).datepicker('getDate');
                dt2.datepicker('option', 'minDate', minDate);
            }
        });
        $('#recurrence_end').datepicker({
            dateFormat: "dd-mm-yy"
        });
        $('#recurrence_yearly_date').datepicker({
        	dateFormat: "dd-MM",
        	changeMonth: true,
      		changeYear: false
        });
        $('#recurrence_monthly_date').datepicker({
        	dateFormat: "dd",
        });
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
</script>
@endsection							
