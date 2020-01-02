@extends('admin.layout.layout')
@section('title','dasbhoard')
@section('content')
@php
$patientEyeData = [];
if(isset($eyeDataPat->eye_visit)) {
	$patientEyeData = json_decode($eyeDataPat->eye_visit,true);
}
$refrazioneArray = ['VISUS NAT'=>['LONTANO','VICINO'],'IN USO'=>['LONTANO','VICINO','LAC'],'AUTO REF' => ['MIOSI','CICLO'],'SOGG' => ['LONTANO','VICINO','CICLO','FORO ST'],'PRESCRIZIONE'=>['LONTANO','INTERMEDIO','VICINO']];
$eyeArray =['right','left','oo'];
@endphp
<div class="outter-wp" style="margin-left: 12px;">
	<div class="sub-heard-part">
		<ol class="breadcrumb m-b-0">
			<li><a href="{{url('medico/paziente')}}">Sezione paziente</a></li>
			<li><a href="{{url('medico/modifica-paziente/'.$patid)}}">{{$patientData->surname.' '.$patientData->name}}</a></li>
			<li class="active">{{ __("patient.Patient's Eye Visit") }}</li>
		</ol>
	</div>
	<div class="forms-main">
		@if (Session::has('error'))
			<div class="alert alert-danger alert-block">
				<button type="button" class="close" data-dismiss="alert">×</button> 
				<strong>{{Session::get('error') }}</strong>
			</div>
		@endif
		@if (Session::has('success'))
			<div class="alert alert-success alert-block">
				<button type="button" class="close" data-dismiss="alert">×</button> 
				<strong>{{Session::get('success') }}</strong>
			</div>
		@endif
		<div>
			{{ __('patient.Doctor Name') }} : {{ $appointmentData->surname.' '.$appointmentData->name }} | {{ __('patient.Doctor Email') }} : {{ $appointmentData->email }} | {{ __('patient.Date') }} : {{ date('Y-m-d', strtotime($appointmentData->start_date)) }} | {{ __('patient.Start Time') }} : {{ $appointmentData->starteTime }} | {{ __('patient.End Time') }} : {{ $appointmentData->endtime }}
		</div>
		<br>
		<div class="row"  style="margin-left: 8px;">
			<ul class="nav nav-tabs">
				@php $tabCounter = 1; @endphp
				@foreach($eyeVisitTabs as $tab)
			    <li class="{{ ($tabCounter == 1)?'active':'' }}"><a data-toggle="tab" href="#tab-content-{{ $tabCounter }}">{{ $tab->title }}</a></li>
			    @php $tabCounter++; @endphp
			    @endforeach
			</ul>
			<form id="eyevisit-patient-form" class="form-horizontal" method="post" >
				<div class="tab-content">
					@php $tabCounterSec = 1; @endphp
					@foreach($eyeVisitTabs as $tab)
					<div id="tab-content-{{ $tabCounterSec }}" class="tab-pane fade in {{ ($tabCounterSec == 1)?'active':'' }}">
						<br>
						@if($tab->id == 3)
						<div class="comparison">
							<table class="table-bordered table">
								<thead>
									<tr>
										<th class="tl tl2"></th>
								        <th colspan="4" class="qbo">
								           <input type="checkbox" value="1" name="eye_visit[cus_eye_type][]" <?php echo ((isset($patientEyeData['cus_eye_type']))?(in_array(1, $patientEyeData['cus_eye_type'])?'checked':''):''); ?>> Occhio destro
								        </th>
								        <th colspan="4" class="qbo">
								        	<input type="checkbox" value="2" name="eye_visit[cus_eye_type][]" <?php echo ((isset($patientEyeData['cus_eye_type']))?(in_array(2, $patientEyeData['cus_eye_type'])?'checked':''):''); ?>>
								            Occhio sinistro
								        </th>
								        <th colspan="4" class="qbo">
								        	<input type="checkbox" value="3" name="eye_visit[cus_eye_type][]" <?php echo ((isset($patientEyeData['cus_eye_type']))?(in_array(3, $patientEyeData['cus_eye_type'])?'checked':''):''); ?>>
								          	OO
								        </th>
								    </tr>
								    <tr>
								        <th class="tl"></th>
								        <th class="compare-heading">
								          Visus
								        </th>
								        <th class="compare-heading">
								          SF
								        </th>
								        <th class="compare-heading">
								          CIL
								        </th>
								        <th class="compare-heading">
								          X
								        </th>
								        <th class="compare-heading">
								          Visus
								        </th>
								        <th class="compare-heading">
								          SF
								        </th>
								        <th class="compare-heading">
								          CIL
								        </th>
								        <th class="compare-heading">
								          X
								        </th>
								        <th class="compare-heading">
								          Visus
								        </th>
								        <th class="compare-heading">
								          SF
								        </th>
								        <th class="compare-heading">
								          CIL
								        </th>
								        <th class="compare-heading">
								          X
								        </th>
								    </tr>
								</thead>
								<tbody>
									@foreach($refrazioneArray as $regKey=>$refData)
									<tr>
								        <th class="span" colspan="13" scope="colgroup">
								            <center>{{$regKey}}</center>
								        </th>
								    </tr>
								    @foreach($refData as $rData)
								    <tr class="compare-row">
										<td>{{$rData}}</td>
										@foreach($eyeArray as $eye)
										@include('admin.inputfield',['eyeVisitInputTabs' => $eyeVisitInputTabs,'regKey'=>$regKey,'eye'=>$eye,'rData'=>$rData,'patientEyeData'=>$patientEyeData])
										@endforeach
								    </tr>
								    @endforeach	
									@endforeach
								</tbody>
							</table>
							<br>
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group">
										<label class="col-sm-2 control-label">DIST. INTERP.</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" name="eye_visit[3][dist_interp]" value="{{ (isset($patientEyeData[3]['dist_interp']))?$patientEyeData[3]['dist_interp']:'' }}">
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="form-group">
										<label class="col-sm-2 control-label">Note</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" name="eye_visit[3][note]" value="{{ (isset($patientEyeData[3]['note']))?$patientEyeData[3]['note']:'' }}">
										</div>
									</div>
								</div>
							</div>
						</div>
						@else
						<div class="row" style="margin-left:8px;">
						@if(isset($eyeVisitInputTabs[$tab->id]))
						@foreach($eyeVisitInputTabs[$tab->id] as $tabInput)
							@php
							switch($tabInput['type']) {
							    case 'textarea':
							    	@endphp
							    	<div class="col-lg-6">
										<div class="form-group">
											<label class="col-sm-2 control-label">{{ $tabInput['title'] }}</label>
											<div class="col-sm-8">
												<textarea name="eye_visit[{{ $tabInput['tab_id'] }}][{{ $tabInput['input_name'] }}]" class="form-control">{{ (isset($patientEyeData[$tabInput['tab_id']][$tabInput['input_name']]))?$patientEyeData[$tabInput['tab_id']][$tabInput['input_name']]:'' }}</textarea>
											</div>									
										</div>
									</div>
							    	@php
							        break;
							    case 'select':
							    	$selectOptions = json_decode($tabInput['input_values']);
							        @endphp
							    	<div class="col-lg-6">
										<div class="form-group">
											<label class="col-sm-2 control-label">{{ $tabInput['title'] }}</label>
											<div class="col-sm-8">
												<select class="form-control1" name="eye_visit[{{ $tabInput['tab_id'] }}][{{ $tabInput['input_name'] }}]">
												<option value="">Selezionare {{ $tabInput['title'] }}</option>
												@foreach($selectOptions as $soption)
												<option value="{{ $soption }}" {{ (isset($patientEyeData[$tabInput['tab_id']][$tabInput['input_name']]))?(($patientEyeData[$tabInput['tab_id']][$tabInput['input_name']] == $soption)?'selected':''):'' }}>{{ $soption }}</option>
												@endforeach
											</select>
											</div>									
										</div>
									</div>
							    	@php
							        break;
							    case 'radio':
							    	$radioOptions = json_decode($tabInput['input_values']);
							        @endphp
							    	<div class="col-lg-6">
										<div class="form-group">
											<label class="col-sm-2 control-label">{{ $tabInput['title'] }}</label>
											<div class="col-sm-8">
												@foreach($radioOptions as $roption)
												<input value="{{$roption}}" type="radio" name="eye_visit[{{ $tabInput['tab_id'] }}][{{ $tabInput['input_name'] }}]" {{ (isset($patientEyeData[$tabInput['tab_id']][$tabInput['input_name']]))?(($patientEyeData[$tabInput['tab_id']][$tabInput['input_name']] == $roption)?'checked':''):'' }}>&nbsp;{{$roption}}
												@endforeach
											</div>									
										</div>
									</div>
							    	@php
							        break;
							    case 'checkbox':
							    	$checkOptions = json_decode($tabInput['input_values']);
							        @endphp
							    	<div class="col-lg-6">
										<div class="form-group">
											<label class="col-sm-2 control-label">{{ $tabInput['title'] }}</label>
											<div class="col-sm-8">
												@foreach($checkOptions as $coption)
												<input value="{{$coption}}" type="checkbox" name="eye_visit[{{ $tabInput['tab_id'] }}][{{ $tabInput['input_name'] }}][]" <?php echo ((isset($patientEyeData[$tabInput['tab_id']][$tabInput['input_name']]))?(in_array($coption, $patientEyeData[$tabInput['tab_id']][$tabInput['input_name']])?'checked':''):''); ?>>&nbsp;{{$coption}}
												@endforeach
											</div>									
										</div>
									</div>
							    	@php
							        break;
							    case 'date':
							        @endphp
							    	<div class="col-lg-6">
										<div class="form-group">
											<label class="col-sm-2 control-label">{{ $tabInput['title'] }}</label>
											<div class="col-sm-8">
												<input type="text" class="form-control1 eye-visit-datepicker" name="eye_visit[{{ $tabInput['tab_id'] }}][{{ $tabInput['input_name'] }}]" placeholder="{{ $tabInput['title'] }}" value="{{ (isset($patientEyeData[$tabInput['tab_id']][$tabInput['input_name']]))?$patientEyeData[$tabInput['tab_id']][$tabInput['input_name']]:'' }}">
											</div>									
										</div>
									</div>
							    	@php
							        break;
							    case 'print':
							        @endphp
							    	<div class="col-lg-6">
										<div class="form-group">
											<label class="col-sm-2 control-label">&nbsp;</label>
											<div class="col-sm-8">
												<button class="hidden-print float-right btn btn-primary eyevisit-print" id="{{ $tabInput['input_name'] }}" parent="tab-content-{{ $tabCounterSec }}">{{ $tabInput['title'] }}</button>
											</div>									
										</div>
									</div>
							    	@php
							        break;
							    default:
							    	@endphp
							    	<div class="col-lg-6">
										<div class="form-group">
											<label class="col-sm-2 control-label">{{ $tabInput['title'] }}</label>
											<div class="col-sm-8">
												<input type="{{$tabInput['type']}}" class="form-control1" name="eye_visit[{{ $tabInput['tab_id'] }}][{{ $tabInput['input_name'] }}]" placeholder="{{ $tabInput['title'] }}" value="{{ (isset($patientEyeData[$tabInput['tab_id']][$tabInput['input_name']]))?$patientEyeData[$tabInput['tab_id']][$tabInput['input_name']]:'' }}">
											</div>									
										</div>
									</div>
							    	@php
							        break;
							}
							@endphp
						@endforeach
						@if($tab->id == 8)
							<div class="col-lg-6">
								<div class="form-group">
									<label class="col-sm-2 control-label">&nbsp;</label>
									<div class="col-sm-8">
									<table rules="all" style="width: 170px;margin: 0 auto;">
										<tr>
											<td>&nbsp;</td>
											<td>&nbsp;</td>
											<td>&nbsp;</td>
										</tr>
										<tr>
											<td>&nbsp;</td>
											<td>&nbsp;</td>
											<td>&nbsp;</td>
										</tr>
									</table>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label class="col-sm-2 control-label">&nbsp;</label>
									<div class="col-sm-8">
									<table rules="all" style="width: 170px;margin: 0 auto;">
										<tr>
											<td>&nbsp;</td>
											<td>&nbsp;</td>
											<td>&nbsp;</td>
										</tr>
										<tr>
											<td>&nbsp;</td>
											<td>&nbsp;</td>
											<td>&nbsp;</td>
										</tr>
									</table>
									</div>
								</div>
							</div>
						@endif
						@endif
						</div>
						@endif
					</div>
					@php $tabCounterSec++; @endphp
				    @endforeach
				</div>
				{!! csrf_field() !!}								
				<input type="hidden" name="pat_id" value="{{ $appointmentData->patient_id }}">
				<div class="col-sm-offset-2"> <button type="submit" name="add" class="btn btn-default">Salva</button> </div>
			</form>
		</div>
	</div>
</div>
<div id="print-div" class="visible-print-block"></div>
<script type="text/javascript">
	$(document).ready(function(){
		$('.eye-visit-datepicker').datepicker({dateFormat: 'yy-mm-dd'});
		$('.eye-visit-datepicker').keydown(function(){
			return false;
		});
		$('.eyevisit-print').click(function(){
			var parentdiv = $(this).attr('parent');
			$('#'+parentdiv).clone().appendTo('#print-div');
			$('#print-div').find('button').remove();
			/*$('#print-div input').replaceWith(function() {
			    return $('<div>' + $(this).val() + '</div>');
			});*/
		    var newWin=window.open('','Stampa visita oculare');
			newWin.document.open();
			newWin.document.write('<html><body onload="window.print()">'+$('#print-div').html()+'</body></html>');
			newWin.document.close();
		});
	});
</script>
<style>
table td {
  padding: 1rem;
}
</style>
@endsection