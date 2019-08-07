@extends('admin.layout.layout')
@section('title','dasbhoard')
@section('content')
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
						<h4 class="modal-title">Appuntamento</h4>
					</div>
					<div class="modal-body">

						<form action="{{url('admin/appointment')}}" method="post" enctype="multipart/form-data"> 
						
							<div class="form-group ">
								<label for="title">Dottore</label> 
								<select name="doctro"  class="form-control" required style="height: 48px!important">
									<option value="Stefano Scuri">Stefano Scuri</option>
									<option value="Filippo Scuri">Filippo Scuri</option>
									<option value="Mario Rossi">Mario Rossi</option>
								</select>
								
							</div>
							
							<div class="form-group ">
								<label for="title">Tipo di esame</label> 
								<select name="examination_id" id="examination_id"  class="form-control" required style="height: 48px!important">
									<option value="">{{ __('menu.selectctexamination') }}</option>
									@foreach($examination as $item)
									<option value="{{$item->id}}">{{$item->title}}</option>
									@endforeach									
								</select>								
							</div>


							<div class="form-group ">
								<label for="title">{{ __('menu.Available rooms') }}</label> 
								<select name="rooms" id="rooms"  class="form-control" required style="height: 48px!important">
									
																	
								</select>								
							</div>

							
							 <div class="form-group {{ $errors->has('weekday_num') ? ' has-error' : '' }}">
								<label for="">{{ __('menu.StartTime') }}</label>
								<div class="input-group bootstrap-timepicker timepicker">
									<input id="timepicker1" type="text" name="starteTime" class="form-control1 input-small timecall" readonly="" style="margin-bottom: 0px;">
									<span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
								</div>
							</div>	

							<div class="form-group {{ $errors->has('weekday_num') ? ' has-error' : '' }}">
								<label for="">{{ __('menu.EndTime') }}</label>
								<div class="input-group bootstrap-timepicker timepicker">
									<input id="timepicker2" type="text" name="endtime" class="form-control1 input-small timecall"  readonly="" style="margin-bottom: 0px;">
									<span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
								</div>
							</div>

							<input type="hidden" name="selected_date" id="selecte_date">

								{!! csrf_field() !!}	

							<button type="submit" class="btn btn-default" name="add">Inserisci</button> 
						</form>
					</div>					
				</div>
			</div>
        </div>
<!-- end here-->
</div>
<script>
	$(document).ready(function() {
		$('#calendar').fullCalendar({
			header:{
			     left:'prev,next today',
			     center:'title',
			     right:'month,agendaWeek,agendaDay'
   			 },
			 views: {
			//month: {columnFormat: 'ddd'}, 
			week: {columnFormat: 'ddd D/M'}, 
			//day: {columnFormat: 'ddd d MMM' }
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
		    	// console.log(date.format('H:m'))
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
								searchDoctorAvailability(date)
							},
							cancel: function () {
								$.alert('Canceled!');
							},
						}
					});
					  
				}

          },
          events: 'http://star9000.komete.it/public/admin/responsedata',
		    selectable:true,
		    selectHelper:true, 
		  eventClick: function(event) {
               console.log(event);
		  	var id= event.id; 
		  		//alert(id);
			}
		});		

		function searchDoctorAvailability(SelectDateTime)
		{	
			//console.log(SelectDateTime.format('DD'));		

			var date = SelectDateTime.format('Y')+'-'+SelectDateTime.format('M')+'-'+SelectDateTime.format('D');

			 var weekdays= SelectDateTime.format('ddd');

			 var hours = SelectDateTime.format('H:m');

			$('#timepicker1').val(hours);

			$('#selecte_date').val(date);	

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

$('#examination_id').change(function(){

	var id= $(this).val();

		$.ajax({
	        method: 'GET',
		    url: "{{ url('/admin/ajaxresponse') }}"+'/'+id,
		    cache: false,
		    success: function(html){		   		
		   		
		   		var decodeData=  JSON.parse(html);
                                   $('#rooms').empty();
                                   $('#rooms').append('<option value="">Seleziona stanze</option>');
		   		$.each( decodeData, function( key, value ) {

			          $('#rooms').append($('<option>',
				     {
				        value: value.id,
				        text : value.room_name,
				    }));
			   });

		  }
	});

});

});
</script>

<script type="text/javascript">
$('.timecall').timepicker({
	showMeridian: false   
});

</script>
@endsection							
