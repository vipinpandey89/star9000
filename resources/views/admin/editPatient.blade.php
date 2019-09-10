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
		<div id="myModal" class="modal fade">
		    <div class="modal-dialog">
		        <div class="modal-content">
		            <div class="modal-header">
		                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		                <h4 class="modal-title">vita privata</h4>

		            </div>
		            
		            <div class="modal-body">
		            	<div id="to-print">
		                <?php  echo $privacy->description; ?>
		            	</div>
		                <div class=""> 
		                	<button type="button" id="agree-button" class="btn btn-default">Essere d'accordo</button>
		                	<button type="button" id="disagree-button" class="btn btn-default">disaccordo</button>
		                	 <button class="pull-right btn btn-default" id="print-privacy">{{ __('patient.Print') }}</button>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
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
								<div class="col-lg-12">
									<div class="form-group">
										<label class="col-sm-2 control-label">{{ __('patient.Description') }}</label>
										<div class="col-sm-8">
											<textarea id="description" class="form-control" name="description" placeholder="{{ __('patient.Description') }}">{{ !empty($patientData->description)?$patientData->description:'' }}
											</textarea>
										</div>									
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<div class="form-group">
										<label class="col-sm-2 control-label">
											<input {{ $patientData->minor_patient == 1?'checked':'' }} value ="1" type="checkbox" name="minor_patient" id="check-minor-patient">
										</label>
										<div class="col-sm-8" style="margin-top: 15px;">
											{{ __('patient.Minor Patient') }}
										</div>									
									</div>
								</div>
							</div>
							<div class="row minor_patient" style="{{ $patientData->minor_patient == 1?'':'display: none;' }}">
								<div class="col-lg-10">
									<span>{{ __('patient.Relative Information') }}</span>
									<div class="float-right"><i title="{{ __('patient.Add Relative') }}" id="add-relative" class="fa fa-plus-circle" aria-hidden="true"></i></div><br>
								</div>
							</div>
							<div id="relative-section" class="minor_patient" style="{{ $patientData->minor_patient == 1?'':'display: none;' }}">
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

							<div class=""> <button type="submit" name="add" class="btn btn-default">Salva</button> </div>
						</form>
						<form id="privacy-form">
							<?php
							$privacyData = [];
							$pri=0;
							if(!empty($patientData->privacy)) {
								$privacyData = json_decode($patientData->privacy);
								$pri =1; 
							}
							?>
							<input type="hidden" id="alreadyagree" value="{{ $pri }}"/>
							<input type="hidden" name="pat_id" value="{{ $patientData->id }}">
							<div class="row">
								<div class="col-lg-10">
									<span>{{ __('patient.Privacy') }}</span>
								</div>
								<span id="succ-mssg"></span>
							</div>
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label class="col-sm-2 control-label">{{ __('patient.Convention') }}</label>
										<div class="col-sm-8">
											<input value="{{ isset($privacyData->convention)?$privacyData->convention:'' }}" id="convention" type="text" class="form-control1" name="privacy[convention]" placeholder="{{ __('patient.Convention') }}">
										</div>									
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label class="col-sm-2 control-label">{{ __('patient.Number') }}</label>
										<div class="col-sm-8">
											<input type="text" value="{{ isset($privacyData->card_number)?$privacyData->card_number:'' }}" class="form-control1" name="privacy[card_number]" placeholder="{{ __('patient.Card Number') }}">
										</div>									
									</div>
								</div>
							</div>
							{!! csrf_field() !!}
							<div class=""> <button id="privacy-button" type="button" name="privacy-button" class="btn btn-default">Confermare</button></div>
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
							 		  	<th>{{ __('patient.Eye Visit') }}</th>
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
							 	  		<td>
										  <a href="{{url('admin/eyevisit/'.$appnt->id)}}" title="{{ __('patient.Eye Visit') }}"><i class="fa fa-eye" aria-hidden="true"></i></a>
										</td>
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