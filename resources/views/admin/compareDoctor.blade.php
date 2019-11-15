@extends('admin.layout.layout')
@section('title','dasbhoard')
@section('content')
<div class="outter-wp" style="margin-left: 12px;">
<h2>Confronto degli appuntamenti con i medici</h2>
<div class="comparison">
	<table class="table-bordered table">
		<thead>
			<tr>
				<th></th>
	        	@foreach($docData as $doc)
	           		<th>{{ $doc->surname.' '.$doc->name }}</th>
	        	@endforeach
		    </tr>
		</thead>
		<tbody>
			@php
			$x = '07:00:00';
			$countr=0;
			while($x < '18:50:00') {
				$startTime = $date.'07:00:00';
			    $time=date('H:i',strtotime('+'.$countr.' minutes',strtotime($startTime)));
			@endphp
			<tr>
				<td>{{ $time }}</td>
				@foreach($docData as $doc)
					@php $tdClass = '';
					$tdLabel ='&nbsp;';
					if(isset($docAppData[$doc->id])){
						foreach($docAppData[$doc->id] as $docAppointment) {
							if(($time >= $docAppointment->starteTime) && ($time < $docAppointment->endtime)){
								$tdClass = "background-color:".$docAppointment->examination_color;
								$tdLabel = 'Paziente : '.$docAppointment->surname.' '.$docAppointment->name.' ('.$docAppointment->dob.')';
							}
						}
					}
					@endphp
					<td style="color:white;{{ $tdClass }}">{{ $tdLabel }}</td>
				@endforeach
			</tr>
			@php
				$x=date('H:i:s',strtotime('+'.$countr.' minutes',strtotime($startTime)));
				$countr = $countr+10;
			}
			@endphp
		</tbody>
	</table>
</div>
</div>
@endsection