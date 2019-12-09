<script type="text/javascript">
patientNameForSignature = "{{$patientData->surname.' '.$patientData->name}}";
</script>
@extends('admin.layout.layout')
@section('title','dasbhoard')
@section('content')

<div class="outter-wp">
	<div class="sub-heard-part">
		@php $sec = ($user->role_type == 3)?'medico':'admin'; @endphp
		<ol class="breadcrumb m-b-0">
			<li><a href="{{url($sec.'/bacheca')}}">Home</a></li>
			<li><a href="{{url($sec.'/paziente')}}">Sezione paziente</a></li>
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
		<div id="myModal" class="modal fade" >
		    <div class="modal-dialog">
		        <div class="modal-content"  style="width:150%;margin-left:-18%;">
		            <div class="modal-header">
		                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		                <h4 class="modal-title">Privacy</h4>

		            </div>
		            
		            <div class="modal-body">
		            	<div id="to-print">
						<div id="header-image-print" style="position:fixed;width:100%;">
							<center><img src="{{url($sec.'/../administrator/images/star.jpg')}}" width="150" height="50"></center>
						</div>
						<table>
						<thead>
						<tr>
							<td>
							<div class="page-header-space" style="width:100%;height:80px;display: block;margin-left: auto;margin-right: auto;width: 50%;"></div>
							</td>
						</tr>
						</thead>
						<tbody>
						<tr>
							<td>
						<div style="margin:10mm;">
						<?php  echo nl2br($privacy->description); ?>
						
						@if(!empty($patientData->patient_signature))
							<hr>
							<div>
								@php
								$sigOtions = explode('|',$patientData->sig_option);
								$op=0;
								@endphp
								@foreach($wacomQuestions as $wques)
								<div>{{ ($op+1).') '.$wques->question}}</div>
								<div>
									<input disabled type="radio" {{ ($sigOtions[$op]==1)?'checked':'' }}> Do il consenso
									<input disabled type="radio" {{ ($sigOtions[$op]==2)?'checked':'' }}> Nego il consenso
								</div>
								@php $op++; @endphp
								@endforeach
								<br>
								<div class="pull-left">Data: {{$patientData->sig_date}}</div>
								<div style="float:right;">
									<span>Firma</span>
									<p>
										<img height="60" width="100" src="{{$patientData->patient_signature}}" alt="{{$patientData->surname.' '.$patientData->name}}"><br>
										<span>{{$patientData->surname.' '.$patientData->name}}</span>
										
									</p>
								</div>
							</div>
						@endif
						</div>
						</td></tr></tbody></table>
						</div>
						<br><br><br><br><br><br>
		                <div class=""> 
		                	<button type="button" id="agree-button" class="btn btn-default">Accetta</button>
							<button type="button" id="disagree-button" class="btn btn-default">Rifiuta</button>
							<button class="btn btn-default" id="capture-patient-signature">Cattura firma paziente</button>
		                	 <button class="pull-right btn btn-default" id="print-privacy">Stampa</button>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
		<input type="hidden" id="patientData-id-pat" value="{{$patientData->id}}"/>
		<div id="capture-signature-model" class="modal fade">
		    <div class="modal-dialog">
		        <div class="modal-content">
		            <div class="modal-header">
		                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		                <h4 class="modal-title">Cattura firma paziente</h4>

		            </div>
		            
		            <div class="modal-body">
		            	
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
										<label class="col-sm-2 control-label">{{ __('patient.Sex') }}</label>
										<div class="col-sm-8">
											<select class="form-control1" id="sex" name="sex">
					                           <option value="">{{ __('patient.Select Sex') }}</option>
					                           <option value="1" {{ ($patientData->sex == 1)?'selected':'' }}>{{ __('patient.Male') }}</option>
					                           <option value="2" {{ ($patientData->sex == 2)?'selected':'' }}>{{ __('patient.Female') }}</option>
					                       </select>
										</div>								
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label class="col-sm-2 control-label">{{ __('patient.Document') }}</label>
										<div class="col-sm-8">
											<input value="{{ $patientData->document }}" id="document" type="text" class="form-control1" name="document" placeholder="{{ __('patient.Document') }}">
										</div>									
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label class="col-sm-2 control-label">{{ __('patient.Profession') }}</label>
										<div class="col-sm-8">
											<input value="{{ $patientData->profession }}" id="profession" type="text" class="form-control1" name="profession" placeholder="{{ __('patient.Profession') }}">
										</div>							
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label class="col-sm-2 control-label">{{ __('patient.Place of birth') }}</label>
										<div class="col-sm-8">
											<input value="{{ $patientData->place_of_birth }}" id="place_of_birth	" type="text" class="form-control1" name="place_of_birth" placeholder="{{ __('patient.Place of birth') }}">
										</div>									
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label class="col-sm-2 control-label">{{ __('patient.Province of birth') }}</label>
										<div class="col-sm-8">
											<input value="{{ $patientData->province_of_birth }}" id="province_of_birth" type="text" class="form-control1" name="province_of_birth" placeholder="{{ __('patient.Province of birth') }}">
										</div>							
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label class="col-sm-2 control-label">{{ __('patient.Fiscal code') }}</label>
										<div class="col-sm-8">
											<input value="{{ $patientData->fiscal_code }}" id="fiscal_code" type="text" class="form-control1" name="fiscal_code" placeholder="{{ __('patient.Fiscal code') }}">
										</div>									
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label class="col-sm-2 control-label">{{ __('patient.Place of living') }}</label>
										<div class="col-sm-8">
											<input value="{{ $patientData->place_of_living }}" id="place_of_living" type="text" class="form-control1" name="place_of_living" placeholder="{{ __('patient.Place of living') }}">
										</div>							
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label class="col-sm-2 control-label">{{ __('patient.Province of living') }}</label>
										<div class="col-sm-8">
											<input value="{{ $patientData->province_of_living }}" id="province_of_living" type="text" class="form-control1" name="province_of_living" placeholder="{{ __('patient.Province of living') }}">
										</div>									
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label class="col-sm-2 control-label">{{ __('patient.Number of the address') }}</label>
										<div class="col-sm-8">
											<input value="{{ $patientData->number_of_the_address }}" id="number_of_the_address" type="text" class="form-control1" name="number_of_the_address" placeholder="{{ __('patient.Number of the address') }}">
										</div>							
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label class="col-sm-2 control-label">{{ __('patient.Address') }}</label>
										<div class="col-sm-8">
											<textarea class="form-control" id="address" name="address">{{ $patientData->address }}</textarea>
										</div>									
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label class="col-sm-2 control-label">{{ __('patient.Postal Code') }}</label>
										<div class="col-sm-8">
											<input value="{{ $patientData->postal_code }}" id="postal-code" type="number" class="form-control1" name="postal_code" placeholder="{{ __('patient.Postal Code') }}">
										</div>							
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label class="col-sm-2 control-label">{{ __('patient.Telephone Number') }}</label>
										<div class="col-sm-8">
											<input value="{{ $patientData->telephone }}" id="telephone" type="number" class="form-control1" name="telephone" placeholder="{{ __('patient.Telephone Number') }}">
										</div>									
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label class="col-sm-2 control-label">{{ __('patient.Nationality') }}</label>
										<div class="col-sm-8">
											<input value="{{ $patientData->nationality }}" id="nationality" type="text" class="form-control1" name="nationality" placeholder="{{ __('patient.Nationality') }}">
										</div>							
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label class="col-sm-2 control-label">{{ __('patient.Pec') }}</label>
										<div class="col-sm-8">
											<input value="{{ $patientData->pec }}" id="pec" type="text" class="form-control1" name="pec" placeholder="{{ __('patient.Pec') }}">
										</div>									
									</div>
								</div>
								<div class="col-lg-6">
									<label class="col-sm-2 control-label">ID</label>
									<div class="col-sm-8">
										<input disabled value="{{ $patientData->id }}" type="text" class="form-control1">
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
											<input value="{{$relative->relation}}" class="form-control1" type="text" name="relative[{{$count}}][relation]" placeholder="Grado di parentela">
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
							
							@if($user->role_type != 3)
							<div class=""> <button type="submit" name="add" class="btn btn-default">Salva</button> </div>
							@endif
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
							@if(!empty($patientData->patient_signature))
							<div class="row">
								<div class="col-lg-10">
									<div class="form-group">
										<label class="col-sm-2 control-label">Firma del paziente</label>
										<div class="col-sm-8" >
											
											<img  src="{{$patientData->patient_signature}}" height="60" width="250">
											
										</div>									
									</div>
								</div>
							</div>
							@endif
							{!! csrf_field() !!}
							@if($user->role_type != 3)
							<div class=""> <button id="privacy-button" type="button" name="privacy-button" class="btn btn-default">Salva</button></div>
							@endif
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
										  <a href="{{url($sec.'/eyevisit/'.$patientData->id.'/'.$appnt->id)}}" title="{{ __('patient.Eye Visit') }}"><i class="fa fa-eye" aria-hidden="true"></i></a>
										</td>
							 	  		<td>vedi</td>
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
<style>
#header-image-print {
	top: 100px;
    width: 129% !important;
}
</style>
@endsection