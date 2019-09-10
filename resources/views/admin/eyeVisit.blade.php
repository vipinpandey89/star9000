@extends('admin.layout.layout')
@section('title','dasbhoard')
@section('content')

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
		<div class="set-1">
			<div class="graph-2 general">
				<h3 class="inner-tittle two"></h3>
				<div class="grid-1">
					<div class="form-body">
						<form id="add-patient-form" class="form-horizontal" method="post" >
							<input type="hidden" name="pat_id" value="{{ $appointmentData->patient_id }}">
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label class="col-sm-2 control-label">{{ __('patient.Type of Visit') }}</label>
										<div class="col-sm-8">
											<select class="form-control1" name="eye_visit[type_of_visit]">
												<option value="">{{ __('patient.Type of Visit') }}</option>
												<option value="1">1</option>
											</select>
										</div>									
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label class="col-sm-2 control-label">{{ __('patient.Insurance') }}</label>
										<div class="col-sm-8">
											<input type="text" class="form-control1" name="eye_visit[insurance]" placeholder="{{ __('patient.Insurance') }}">
										</div>									
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<div class="form-group">
										<label class="col-sm-2 control-label">{{ __('patient.History') }}</label>
										<div class="col-sm-8">
											<input type="text" class="form-control1" name="eye_visit[history]" placeholder="{{ __('patient.History') }}">
										</div>									
									</div>
								</div>
								<div class="col-lg-12">
									<div class="form-group">
										<label class="col-sm-2 control-label">{{ __('patient.Reason to visit') }}</label>
										<div class="col-sm-8">
											<textarea rows="4" class="form-control" name="eye_visit[reason_of_visit]" placeholder="{{ __('patient.Reason to visit') }}"></textarea>
										</div>									
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-4">
									<div class="form-group">
										<label class="col-sm-2 control-label">{{ __('patient.Note') }}</label>
										<div class="col-sm-8">
											<select class="form-control1" name="eye_visit[note]">
												<option value="">{{ __('patient.Note') }}</option>
												<option value="1">1</option>
											</select>
										</div>									
									</div>
								</div>
								<div class="col-lg-4">
									<div class="form-group">
										<label class="col-sm-2 control-label">{{ __('patient.orthoptic val') }}</label>
										<div class="col-sm-8">
											<select class="form-control1" name="eye_visit[orthoptic_val]">
												<option value="">{{ __('patient.orthoptic val') }}</option>
												<option value="1">1</option>
											</select>
										</div>									
									</div>
								</div>
								<div class="col-lg-4">
									<div class="form-group">
										<label class="col-sm-2 control-label">{{ __('patient.Allergies') }}</label>
										<div class="col-sm-8">
											<select class="form-control1" name="eye_visit[allergies]">
												<option value="">{{ __('patient.Allergies') }}</option>
												<option value="1">1</option>
											</select>
										</div>									
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-lg-2">
									<div class="form-group">
										<label class="col-sm-2 control-label">{{ __('patient.Visus nat') }}</label>
										<div class="col-sm-8">
											<select class="form-control1" name="eye_visit[visus_nat]">
												<option value="">{{ __('patient.Visus nat') }}</option>
												<option value="1">1</option>
											</select>
										</div>									
									</div>
								</div>
								<div class="col-lg-2">
									<div class="form-group">
										<label class="col-sm-2 control-label">{{ __('patient.Corr') }}</label>
										<div class="col-sm-8">
											<input type="text" class="form-control1" name="eye_visit[corr]" placeholder="{{ __('patient.Corr') }}">
										</div>									
									</div>
								</div>
								<div class="col-lg-2">
									<div class="form-group">
										<label class="col-sm-2 control-label">{{ __('patient.Sf') }}</label>
										<div class="col-sm-8">
											<select class="form-control1" name="eye_visit[sf]">
												<option value="">{{ __('patient.Sf') }}</option>
												<option value="1">1</option>
											</select>
										</div>									
									</div>
								</div>
								<div class="col-lg-2">
									<div class="form-group">
										<label class="col-sm-2 control-label">{{ __('patient.Cil') }}</label>
										<div class="col-sm-8">
											<select class="form-control1" name="eye_visit[cil]">
												<option value="">{{ __('patient.Cil') }}</option>
												<option value="1">1</option>
											</select>
										</div>									
									</div>
								</div>
								<div class="col-lg-2">
									<div class="form-group">
										<label class="col-sm-2 control-label">{{ __('patient.X') }}</label>
										<div class="col-sm-8">
											<input type="text" class="form-control1" name="eye_visit[x]" placeholder="{{ __('patient.X') }}">
										</div>									
									</div>
								</div>
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
@endsection