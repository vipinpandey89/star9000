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
			<li class="active">Calendario</li>
		</ol>
	</div>
	@if (Session::has('success'))
	<div class="alert alert-success alert-block">
		<button type="button" class="close" data-dismiss="alert">×</button> 
		<strong>{{Session::get('success') }}</strong>
	</div>
	@endif
	<div><center><span id="doc-av-mssg" style="color: orange;"></span></center></div>
	<br>
	<div class="graph-visual tables-main">	

		<div id='calendar'></div>
		<div style='clear:both'></div>
		
	</div>
</div>
<script>
	$(document).ready(function() {
		$('#calendar').fullCalendar({
			header:{
				left:'prev,next today',
				center:'title',
				right:'month,agendaWeek,agendaDay'
			},
			eventLimit:true,
			eventLimitText:'Di Più',
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
		    selectable:false,
		    selectHelper:false,
		    selectAllow: function(select) {
			    return moment().diff(select.start) <= 0; 
			},
		    eventClick: function(event) {
		  	}
		  });		

		$('.close_appointment').click(function(){ 
			$('.modal').hide();
			$('#recurrence-section').hide();
		});
		
	});
	function renderAppointment(callback) {
		$.ajax({
			type:"GET",
			dataType:"json",
			url:"{{url('/medico/responsedata')}}",
			success: function(response){
				callback(response);
			}
		});
	}
</script>
@endsection							
