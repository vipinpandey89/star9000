@extends('admin.layout.layout')
@section('title','dasbhoard')
@section('content')
@php
$diagnosisArray = [1=>'Astigmatismo',2=>'Miopia',3=>'Strabismo'];
$surgeryArray = [1=>'Femto Lasik',2=>'Lasik 1',3=>'Lasik 2'];
$eyeArray = [1=>'Sinistra',2=>'Destro',3=>'Entrambi'];
@endphp
<div class="outter-wp">
	<div class="sub-heard-part">
		<ol class="breadcrumb m-b-0">
			<li><a href="{{url('admin/dashboard')}}">Home</a></li>
			<li class="active">{{ __('patient.Update intervention') }}</li>
		</ol>
	</div>
	<div class="forms-main">
		@if (Session::has('error'))
			<div class="alert alert-danger alert-block">
				<button type="button" class="close" data-dismiss="alert">×</button> 
				<strong>{{Session::get('error') }}</strong>
			</div>
		@endif
		<div class="set-1">
			<div class="graph-2 general">
				<h3 class="inner-tittle two"></h3>
				<div class="grid-1">
					<div class="form-body">
						<form id="edit-surgery-form" class="form-horizontal" method="post" >
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label class="col-sm-2 control-label">{{ __('patient.Medical Number') }}</label>
										<div class="col-sm-8">
											<input type="text" value="{{ $surgeryData->medical_number }}" class="form-control1" name="medical_number" placeholder="{{ __('patient.Medical Number') }}">
										</div>									
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label class="col-sm-2 control-label">{{ __('patient.Intervention Number') }}</label>
										<div class="col-sm-8">
											<input type="text" value="{{ $surgeryData->intervention_number }}" class="form-control1" name="intervention_number" placeholder="{{ __('patient.Intervention Number') }}">
										</div>									
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label class="col-sm-2 control-label">{{ __('patient.Surgery Name') }}</label>
										<div class="col-sm-8">
											<input type="text" value="{{ $surgeryData->name }}" class="form-control1" name="surgery_name" placeholder="{{ __('patient.Surgery Name') }}">
										</div>									
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label class="col-sm-2 control-label">{{ __('patient.Date') }}</label>
										<div class="col-sm-8">
											<input class="form-control1" id="sugery-date" type="text"  value="{{ $surgeryData->surgery_date }}" name="surgery_date" placeholder="{{ __('patient.Date') }}">
										</div>									
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label class="col-sm-2 control-label">{{ __('patient.Surgery Time') }}</label>
										<div class="col-sm-8">
											<input id="sugery-duration" type="hidden"  value="{{ $surgeryData->time }}" name="surgery_duration" placeholder="{{ __('patient.Surgery Time') }}">
										</div>									
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label class="col-sm-2 control-label">{{ __('patient.Surgery Type') }}</label>
										<div class="col-sm-8">
											<select class="form-control1" id="surgery-type" name="surgery_type">
					                           <option value="">{{ __('patient.Select Surgery Type') }}</option>
					                           <option <?php echo ($surgeryData->surgery_type == 1)?'selected':''; ?> value="1">Ambulatoriale</option>
					                           <option <?php echo ($surgeryData->surgery_type == 2)?'selected':''; ?> value="2">Day Surgery</option>
					                       </select>
										</div>									
									</div>
								</div>
							</div>
								<div class="row">
									<div class="col-lg-6">
										<div class="form-group">
											<label class="col-sm-2 control-label">{{ __('patient.Diagnosis') }}</label>
											<div class="col-sm-8">
												<select class="form-control1" id="diagnosis" name="diagnosis">
						                           <option value="">{{ __('patient.Select Diagnosis') }}</option>
						                           <option <?php echo ($surgeryData->diagnosis == 1)?'selected':''; ?> value="1">Astigmatismo</option>
						                           <option <?php echo ($surgeryData->diagnosis == 2)?'selected':''; ?> value="2">Miopia</option>
						                           <option <?php echo ($surgeryData->diagnosis == 3)?'selected':''; ?> value="3">Strabismo</option>
						                       </select>
											</div>									
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label class="col-sm-2 control-label">{{ __('patient.Surgery') }}</label>
											<div class="col-sm-8">
												<select class="form-control1" id="surgery" name="surgery">
						                           <option value="">{{ __('patient.Select Surgery') }}</option>
						                           <option <?php echo ($surgeryData->surgery == 1)?'selected':''; ?> value="1">Femto Lasik</option>
						                           <option <?php echo ($surgeryData->surgery == 2)?'selected':''; ?> value="2">Lasik 1</option>
						                           <option <?php echo ($surgeryData->surgery == 3)?'selected':''; ?> value="3">Lasik 2</option>
						                       </select>
											</div>									
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-6">
										<div class="form-group">
											<label class="col-sm-2 control-label">{{ __('patient.Eye') }}</label>
											<div class="col-sm-8">
												<select class="form-control1" id="eyee" name="eye">
						                           <option value="">{{ __('patient.Select Eye') }}</option>
						                           <option <?php echo ($surgeryData->eye == 1)?'selected':''; ?> value="1">Sinistra</option>
						                           <option <?php echo ($surgeryData->eye == 2)?'selected':''; ?> value="2">Destro</option>
						                           <option <?php echo ($surgeryData->eye == 3)?'selected':''; ?> value="3">Entrambi</option>
						                       </select>
											</div>									
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label class="col-sm-2 control-label">{{ __('patient.Local Objective Examination') }}</label>
											<div class="col-sm-8">
												<textarea rows="6" class="form-control" name="local_examination">{{ $surgeryData->local_examination }}</textarea>
											</div>									
										</div>
									</div>
								</div>
								<div id="ambulatoriale-section" style="{{ ($surgeryData->surgery_type == 1)?"":"display:none" }}">
								<span class="float-right btn btn-primary" id="print-ambulatoriale">{{ __('patient.Ambulatoriale Print') }}</span>
								</div>
							
							<div id="day-surgery-section" style="{{ ($surgeryData->surgery_type == 2)?"":"display:none" }}">
								<div class="row">
									<div class="col-lg-12">
										<div class="form-group">
											<label class="col-sm-2 control-label">{{ __('patient.Description') }}</label>
											<div class="col-sm-8">
												<textarea rows="10" id="description" class="form-control" name="desc" placeholder="{{ __('patient.Description') }}">{{ $surgeryData->description }}</textarea>
											</div>									
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-12">
										<div class="form-group">
											<label class="col-sm-2 control-label">{{ __('patient.Operative register') }}</label>
											<div class="col-sm-8">
												<textarea rows="10" id="operating_record" class="form-control" name="operating_record" placeholder="{{ __('patient.Operative register') }}">{{ $surgeryData->operating_record }}</textarea>
											</div>									
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-12">
										<div class="form-group">
											<label class="col-sm-2 control-label">{{ __('patient.Clinical Diary') }}</label>
											<div class="col-sm-8">
												<textarea rows="10" id="operating_record" class="form-control" name="clinical_diary" placeholder="{{ __('patient.Clinical Diary') }}">{{ $surgeryData->clinical_diary }}</textarea>
											</div>									
										</div>
									</div>
								</div>
								<span class="float-right btn btn-primary" id="day-surgery-ambulatoriale">{{ __('patient.Day Surgery Print') }}</span>
								<span class="float-right btn btn-primary" id="day-surgery-operatorio">{{ __('patient.Operative Register') }}</span>
							</div>
							
							{!! csrf_field() !!}								

							<div class="col-sm-offset-2"> <button type="submit" name="add" class="btn btn-default">Salva</button> </div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="ambulatoriale-to-print" style="display: none;">
	<center>Ambulatoriale</center>
	<hr>
	<div>
		Numero medico : {{ !empty($surgeryData->medical_number)?$surgeryData->medical_number:'NA' }}, 
		Data : {{ $surgeryData->surgery_date }}
	</div>
	<div>
		<h2>Paziente</h2>
		<p>
			<div>{{ __('patient.Surname') }} : {{ $patientData->surname }}, {{ __('patient.Name') }} : {{ $patientData->name }}</div>
			<div>{{ __('patient.Date of Birth') }} : {{ $patientData->dob }}</div>
			<div>{{ __('patient.Email') }} : {{ $patientData->email }}</div>
			<div>{{ __('patient.Phone') }} : {{ $patientData->phone }}</div>
		</p>
	</div>
	<div>
		<h2>Diagnosi</h2>
		<p>
			<div>{{ !empty($surgeryData->diagnosis)?$diagnosisArray[$surgeryData->diagnosis]:'NA' }}</div>
		</p>
	</div>
	<div>
		<h2>Intervento</h2>
		<p>
			<div>Femto : {{ !empty($surgeryData->surgery)?$surgeryArray[$surgeryData->surgery]:'NA' }}</div>
			<div>In Occhio : {{ !empty($surgeryData->eye)?$eyeArray[$surgeryData->eye]:'NA' }}</div>
		</p>
	</div>
	<div>
		<h2>Medico Accettante</h2>  Dott. {{ $doctorData->docsurname.' '.$doctorData->docname }}
	</div>
	<div>
		<h2>Esame Obiettivo Locale</h2>
		<p>
			<div>@php echo !empty($surgeryData->local_examination)?nl2br($surgeryData->local_examination):'NA' @endphp</div>
		</p>
	</div>
	<div style="text-align: right;">Dott. {{ $doctorData->docsurname.' '.$doctorData->docname }}</div>
</div>
<div id="day-surgery-to-print" style="display: none;">
	<center>Day Surgery</center>
	<hr>
	<div>
		Numero medico : {{ !empty($surgeryData->medical_number)?$surgeryData->medical_number:'NA' }}, 
		Data : {{ $surgeryData->surgery_date }}
	</div>
	<div>
		<h2>Paziente</h2>
		<p>
			<div>{{ __('patient.Surname') }} : {{ $patientData->surname }}, {{ __('patient.Name') }} : {{ $patientData->name }}</div>
			<div>{{ __('patient.Date of Birth') }} : {{ $patientData->dob }}</div>
			<div>{{ __('patient.Email') }} : {{ $patientData->email }}</div>
			<div>{{ __('patient.Phone') }} : {{ $patientData->phone }}</div>
		</p>
	</div>
	<div>
		<h2>Diagnosi</h2>
		<p>
			<div>{{ !empty($surgeryData->diagnosis)?$diagnosisArray[$surgeryData->diagnosis]:'NA' }}</div>
		</p>
	</div>
	<div>
		<h2>Intervento</h2>
		<p>
			<div>Femto : {{ !empty($surgeryData->surgery)?$surgeryArray[$surgeryData->surgery]:'NA' }}</div>
			<div>In Occhio : {{ !empty($surgeryData->eye)?$eyeArray[$surgeryData->eye]:'NA' }}</div>
		</p>
	</div>
	<div>
		<h2>Medico Accettante</h2>  Dott. {{ $doctorData->docsurname.' '.$doctorData->docname }}
	</div>
	<div>
		<h2>Esame Obiettivo Locale</h2>
		<p>
			<div>@php echo !empty($surgeryData->local_examination)?nl2br($surgeryData->local_examination):'NA' @endphp</div>
		</p>
	</div>
	<div>
		<h2>Diario Clinico</h2>
		<p>
			<div>@php echo !empty($surgeryData->clinical_diary)?nl2br($surgeryData->clinical_diary):'NA' @endphp</div>
		</p>
	</div>
	<div style="text-align: right;">Dott. {{ $doctorData->docsurname.' '.$doctorData->docname }}</div>
</div>
<div id="day-surgery-operation" style="display: none;">
	<center>Registro Operatorio {{ !empty($surgeryData->intervention_number)?$surgeryData->intervention_number:'NA' }}</center>
	<hr>
	<p>
		<div>{{ __('patient.Intervention Number') }} : {{ !empty($surgeryData->intervention_number)?$surgeryData->intervention_number:'NA' }}</div>
		<div>Data Intervento : {{ !empty($surgeryData->surgery_date)?$surgeryData->surgery_date:'NA' }}</div>
		<div>{{ __('patient.Surname') }} : {{ $patientData->surname }}, {{ __('patient.Name') }} : {{ $patientData->name }}</div>
		<div>{{ __('patient.Date of Birth') }} : {{ $patientData->dob }}</div>
		<div>{{ __('patient.Email') }} : {{ $patientData->email }}</div>
		<div>{{ __('patient.Phone') }} : {{ $patientData->phone }}</div>
		<div>Ricovero : Day Surgery</div>
	</p>
	<p>
		<div>{{ !empty($surgeryData->diagnosis)?$diagnosisArray[$surgeryData->diagnosis]:'NA' }}</div>
		<div>Femto : {{ !empty($surgeryData->surgery)?$surgeryArray[$surgeryData->surgery]:'NA' }}</div>
		<div>In Occhio : {{ !empty($surgeryData->eye)?$eyeArray[$surgeryData->eye]:'NA' }}</div>
	</p>
	<p>
		@php echo !empty($surgeryData->operating_record)?nl2br($surgeryData->operating_record):'NA' @endphp
	</p>
	<p>
		@php echo !empty($surgeryData->description)?nl2br($surgeryData->description):'NA' @endphp
	</p>
	<div style="text-align: right;">Dott. {{ $doctorData->docsurname.' '.$doctorData->docname }}</div>
</div>
@endsection