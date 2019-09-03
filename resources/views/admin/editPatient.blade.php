@extends('admin.layout.layout')
@section('title','dasbhoard')
@section('content')

<div class="outter-wp">
	<div class="sub-heard-part">
		<ol class="breadcrumb m-b-0">
			<li><a href="{{url('admin/dashboard')}}">Home</a></li>
			<li class="active">{{ __('patient.Edit Patient') }}</li>
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
						<form id="add-patient-form" class="form-horizontal" method="post" >
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label class="col-sm-2 control-label">{{ __('patient.Surname') }}</label>
										<div class="col-sm-8">
											<input value="{{ $patientData->surname }}" type="text" class="form-control1" name="surname" placeholder="{{ __('patient.Surname') }}">
										</div>									
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label class="col-sm-2 control-label">{{ __('patient.Name') }}</label>
										<div class="col-sm-8">
											<input value="{{ $patientData->name }}" type="text" class="form-control1" name="name" placeholder="{{ __('patient.Name') }}">
										</div>									
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label class="col-sm-2 control-label">{{ __('patient.Email') }}</label>
										<div class="col-sm-8">
											<input value="{{ $patientData->email }}" type="text" class="form-control1" name="email" placeholder="{{ __('patient.Email') }}">
										</div>									
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label class="col-sm-2 control-label">{{ __('patient.Phone') }}</label>
										<div class="col-sm-8">
											<input type="number" value="{{ $patientData->phone }}" class="form-control1" name="phone" placeholder="{{ __('patient.Phone') }}">
										</div>									
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label  class="col-sm-2 control-label">{{ __('patient.Date of Birth') }}</label>
										<div class="col-sm-8">
											<input value="{{ $patientData->dob }}" id="dob" type="text" class="form-control1" name="dob" placeholder="{{ __('patient.Date of Birth') }}">
										</div>									
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										&nbsp;								
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-10">
									<span>{{ __('patient.Relative Information') }}</span>
									<div class="float-right"><i title="{{ __('patient.Add Relative') }}" id="add-relative" class="fa fa-plus-circle" aria-hidden="true"></i></div><br>
								</div>
							</div>
							<div id="relative-section">
								<?php 
								$relativeData = [];
								if(!empty($patientData->relative_info)) {
									$relativeData = json_decode($patientData->relative_info);
								}
								$count=0; ?>
								@foreach($relativeData as $relative)
									<div class="patinfo row">
										<div class="col-lg-3 " >
											<input value="{{$relative->fullname}}" class="form-control1" type="text" name="relative[{{$count}}][fullname]" placeholder="Nome e cognome">
										</div>
										<div class="col-lg-3" >
											<input value="{{$relative->relation}}" class="form-control1" type="text" name="relative[{{$count}}][relation]" placeholder="Relazione">
										</div>
										<div class="col-lg-3" >
											<input value="{{$relative->contactno}}" class="form-control1" type="number" name="relative[{{$count}}][contactno]" placeholder="Numero di contatto">
										</div>
										<div class="col-lg-3" >
											<i class="remove-relative fa fa-times" aria-hidden="true"></i>
										</div>
									</div>
									<?php $count++; ?>
								@endforeach
							</div>
							{!! csrf_field() !!}								

							<div class="col-sm-offset-2"> <button type="submit" name="add" class="btn btn-default">Salva</button> </div>
						</form>
						<div class="row">
							<div class="col-lg-10">
								<span>{{ __('patient.Appointment History') }}</span><br>
							</div>
						</div>
						<div class="row">
							<table id="appointmentTable" class="table table-bordered">
								<thead> 
							 		<tr>
							 		 	<th>{{ __('patient.Doctor Name') }}</th>	 		 
							 		  	<th>{{ __('patient.Examination') }}</th>
							 		  	<th>{{ __('patient.Room') }}</th>
							 		  	<th>{{ __('patient.Date') }}</th>
							 		  	<th>{{ __('patient.Start Time') }}</th>
							 		  	<th>{{ __('patient.End Time') }}</th>
							 		   	<th>{{ __('patient.Prescription') }}</th>
							 		</tr>
							 	</thead> 
							 	<tbody>
							 		@foreach($appointments as $appnt)
							 	  	<tr>
							 	  		<td>{{ !empty($appnt->name)?$appnt->name:'NA' }}</td>
							 	  		<td>{{ !empty($appnt->title)?$appnt->title:'NA' }}</td>
							 	  		<td>{{ !empty($appnt->room_name)?$appnt->room_name:'NA' }}</td>
							 	  		<td>{{ date('Y-m-d', strtotime($appnt->start_date)) }}</td>
							 	  		<td>{{ !empty($appnt->starteTime)?$appnt->starteTime:'NA'}}</td>
							 	  		<td>{{ !empty($appnt->endtime)?$appnt->endtime:'NA'}}</td>
							 	  		<td>View</td>
							 	  	</tr>
							 	  	@endforeach
							 	</tbody>
						 	</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection