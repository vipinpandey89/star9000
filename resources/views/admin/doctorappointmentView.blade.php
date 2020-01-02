@extends('admin.layout.layout')
@section('title','Doctors Appointment')
@section('content')
<style>
.error {
	color: red;
}
</style>
<div class="outter-wp">
	<div class="sub-heard-part">
		<ol class="breadcrumb m-b-0">
			<li class="active">appuntamenti</li>
		</ol>
	</div>
	@if (Session::has('success'))
	<div class="alert alert-success alert-block">
		<button type="button" class="close" data-dismiss="alert">×</button> 
		<strong>{{Session::get('success') }}</strong>
	</div>
	@endif
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
	<!-- here create a model for -->
	<div id="myModal" class="modal" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close close_appointment"  data-dismiss="modal">&times;</button>
					<h4 id="custom-app-title" class="modal-title">appuntamenti </h4>
					<span id="error"></span>
				</div>
				<div class="modal-body">
					
					<div  id='myForm'>
						<div class="form-group ">
							<label for="title">Tipo di esame <span style="color: red">*</span></label> 
							<div id="examination"  class="form-control" style="height: 48px!important">								
							</div>	

						</div>
						<div class="form-group ">
							<label for="title">{{ __('menu.Available rooms') }} <span style="color: red">*</span></label> 
							<div id="rooms" class="form-control"></div>	

						</div>

						<div class="form-group ">
							<label for="title">Dottore <span style="color: red">*</span></label> 
							<div id="doctors" class="form-control"></div>

						</div>


						<div class="form-group">
							<label for="">{{ __('menu.StartTime') }} <span style="color: red">*</span></label>
							<div class="input-group bootstrap-timepicker timepicker">
								<div id="timepicker1" class="form-control1 input-small timecall" style="margin-bottom: 0px;"></div>
								<span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
							</div>
						</div>	

						<div class="form-group">
							<label for="">{{ __('menu.EndTime') }} <span style="color: red">*</span></label>
							<div class="input-group bootstrap-timepicker timepicker">
								<div id="timepicker2" class="form-control1 input-small timecall" style="margin-bottom: 0px;"></div>
								<span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
							</div>
						</div>

						<div class="form-group">
							<label for="">{{ __('menu.Patient Name') }} <span style="color: red">*</span></label>
							<div id="patient-name" class="form-control"  maxlength="30" style="margin-bottom: 0px;"></div>
						</div>
						<div class="form-group">
							<label for="">{{ __('menu.Patient Email') }} <span style="color: red">*</span></label>
							<div id="patient-email" class="form-control" style="margin-bottom: 0px;"></div>
							
						</div>
						<div class="form-group">
							<label for="">{{ __('menu.Patient Phone Number') }} <span style="color: red">*</span></label>
							<div id="patient-phone" class="form-control"  style="margin-bottom: 0px;"></div>
							
						</div>
					</div>
				</div>					
			</div>
		</div>
	</div>
	<!-- end here-->
	
</div>
<?php
$examtypesDoc = json_encode($examtypes);
$roomsDoc = json_encode($rooms);
$availableDaysDoc = json_encode($availableDays);

?>
<script>
	$(document).ready(function() {
		var examtypesDoc = JSON.parse('<?php echo $examtypesDoc ?>');
		var roomsDoc = JSON.parse('<?php echo $roomsDoc ?>');
		var availableDaysDoc = JSON.parse('<?php echo $availableDaysDoc ?>');
		var scrollTimeDoc='<?php echo date("H:i:s",strtotime($scrollTime)) ?>';
		$('#calendar').fullCalendar({
			businessHours:availableDaysDoc,
			scrollTime:scrollTimeDoc,
			header:{
				left:'prev,next today',
				center:'title'
			},
			minTime:'07:00:00',
			maxTime:'19:00:00',
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
			defaultView: 'agendaWeek',
			slotDuration: '00:10:00',
			slotLabelInterval: 10,
			slotLabelFormat: 'H:mm',
			editable: false,
			axisFormat: 'HH:mm',
			timeFormat: 'HH:mm',
			theme: true,    
			themeSystem:'bootstrap3', 
			close: 'fa-times',
			prev: 'fa-chevron-left',
			next: 'fa-chevron-right',
			prevYear: 'fa-angle-double-left',
			nextYear: 'fa-angle-double-right',
			editable: false,
		    events: "{{ url('/admin/doctorresponsedata') }}",
		    eventClick: function(event) {
		    	$('#doctors').html(event.doctorname);
	    		$('#rooms').html(roomsDoc[event.room_id]);
		    	$('#timepicker1').html(event.starttime);
				$('#timepicker2').html(event.endtime);
				$('#examination').html(examtypesDoc[event.examination_id]);
				$('#patient-name').html(event.patient_name);
				$('#patient-email').html(event.patient_email);
				$('#patient-phone').html(event.patient_phone);
		  		$('#myModal').show();
		  	}
		 });
		$('.close_appointment').click(function(){ 
			$('#myModal').hide();
		});
	});
</script>
@endsection							
