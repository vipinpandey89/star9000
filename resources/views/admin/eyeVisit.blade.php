@extends('admin.layout.layout')
@section('title','dasbhoard')
@section('content')
@php
$patientEyeData = [];
if(isset($eyeDataPat->eye_visit)) {
	$patientEyeData = json_decode($eyeDataPat->eye_visit,true);
}
@endphp
<div class="outter-wp">
	<div class="sub-heard-part">
		<ol class="breadcrumb m-b-0">
			<li><a href="{{url('admin/dashboard')}}">Home</a></li>
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
			{{ __('patient.Doctor Name') }} : {{ $appointmentData->name }} | {{ __('patient.Doctor Email') }} : {{ $appointmentData->email }} | {{ __('patient.Date') }} : {{ date('Y-m-d', strtotime($appointmentData->start_date)) }} | {{ __('patient.Start Time') }} : {{ $appointmentData->starteTime }} | {{ __('patient.End Time') }} : {{ $appointmentData->endtime }}
		</div>
		<br>
		<div class="row">
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
						@endif
						</div>
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
<script type="text/javascript">
	$(document).ready(function(){
		$('.eye-visit-datepicker').datepicker({dateFormat: 'yy-mm-dd'});
		$('.eye-visit-datepicker').keydown(function(){
			return false;
		})
	});
</script>
@endsection