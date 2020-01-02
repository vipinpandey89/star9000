@php
$relativeData = [];
if(!empty($patientData->relative_info)) {
	$relativeData = json_decode($patientData->relative_info);
	$relativeDataSec = json_decode($patientData->relative_info,true);
}
$relName = '';
if(isset($relativeData->prefer) && ($patientData->minor_patient == 1))
{
	$sePrefer=$relativeData->prefer;
	$relName = $relativeDataSec[$sePrefer]['fullname'];
}
@endphp
@if($patientData->minor_patient == 1)
<script type="text/javascript">
patientNameForSignature = "{{$relName}}";
</script>
@else
<script type="text/javascript">
patientNameForSignature = "{{$patientData->surname.' '.$patientData->name}}";
</script>
@endif
@extends('admin.layout.layout')
@section('title','dasbhoard')
@section('content')

<div class="outter-wp">
	<div class="sub-heard-part">
		@php $sec = ($user->role_type == 3)?'medico':'admin'; @endphp
		<ol class="breadcrumb m-b-0">
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
						<button class="pull-right btn btn-default" id="print-privacy-upper">Stampa</button>
		            	<div id="to-print">
						<div id="header-image-print" style="position:fixed;width:100%;">
							<center><img src="{{url($sec.'/../administrator/images/star.jpg')}}" width="150" height="60"><hr id="hori"></center>
						</div>
						<div id="f-footer" class="page-footer" style="position:fixed;width:100%;bottom: 0;">
							<center>
								<hr>
								<div>STAR 9000 SRL</div>
								<div>Sede Operativa: via Corfù 71, 25124 Brescia | Sede Legale: via Rodi 27, 25124 Brescia</div>
								<div>Tel: 030 2420273 | Fax: 030 2428117 | Mail: info@star9000.it</div>
								<div>P. IVA e Cod. Fiscale 03386790178</div>
							</center>
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
						<div style="margin:10mm;page-break-after: always;">
						<div><?php  echo nl2br($privacy->description); ?></div>
						
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
										@php
										if(!empty($relName)){
											$signatureName = $relName;
										}else{
											$signatureName = $patientData->surname.' '.$patientData->name;
										}
										@endphp
										<img height="60" width="100" src="{{$patientData->patient_signature}}" alt="{{$signatureName}}"><br>
										<span>{{$signatureName}}</span>
										
									</p>
								</div>
							</div>
						@endif
						</div>
						</td></tr>
						<tfoot>
							<tr>
								<td>
								<div class="page-footer-space" style="width:100%;height:80px;"></div>
								</td>
							</tr>
						</tfoot>
						</tbody></table>
						</div>
						<br><br><br><br><br><br>
		                <div class=""> 
		                	<!-- <button type="button" id="agree-button" class="btn btn-default">Accetta</button>
							<button type="button" id="disagree-button" class="btn btn-default">Rifiuta</button> -->
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
										<label class="col-sm-2 control-label">@php echo empty($patientData->surname)?'<i class="fa fa-exclamation-circle exclamation-mark" aria-hidden="true"></i>':'' @endphp {{ __('patient.Surname') }}</label>
										<div class="col-sm-8">
											<input value="{{ $patientData->surname }}" type="text" class="form-control1" name="surname" placeholder="{{ __('patient.Surname') }}">
										</div>									
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label class="col-sm-2 control-label">@php echo empty($patientData->name)?'<i class="fa fa-exclamation-circle exclamation-mark" aria-hidden="true"></i>':'' @endphp {{ __('patient.Name') }}</label>
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
										<label class="col-sm-2 control-label">@php echo empty($patientData->phone)?'<i class="fa fa-exclamation-circle exclamation-mark" aria-hidden="true"></i>':'' @endphp {{ __('patient.Phone') }}</label>
										<div class="col-sm-8">
											<input type="number" value="{{ $patientData->phone }}" class="form-control1" name="phone" placeholder="{{ __('patient.Phone') }}">
										</div>									
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label  class="col-sm-2 control-label">@php echo empty($patientData->dob)?'<i class="fa fa-exclamation-circle exclamation-mark" aria-hidden="true"></i>':'' @endphp {{ __('patient.Date of Birth') }}</label>
										<div class="col-sm-8">
											<input value="{{ $patientData->dob }}" id="dob" type="text" class="form-control1" autocomplete="off" name="dob" placeholder="{{ __('patient.Date of Birth') }}">
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
										<label class="col-sm-2 control-label">@php echo empty($patientData->place_of_birth)?'<i class="fa fa-exclamation-circle exclamation-mark" aria-hidden="true"></i>':'' @endphp {{ __('patient.Place of birth') }}</label>
										<div class="col-sm-8">
											<input value="{{ $patientData->place_of_birth }}" id="place_of_birth	" type="text" class="form-control1" name="place_of_birth" placeholder="{{ __('patient.Place of birth') }}">
										</div>									
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label class="col-sm-2 control-label">@php echo empty($patientData->province_of_birth)?'<i class="fa fa-exclamation-circle exclamation-mark" aria-hidden="true"></i>':'' @endphp {{ __('patient.Province of birth') }}</label>
										<div class="col-sm-8">
											<input value="{{ $patientData->province_of_birth }}" id="province_of_birth" type="text" class="form-control1" name="province_of_birth" placeholder="{{ __('patient.Province of birth') }}">
										</div>							
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label class="col-sm-2 control-label">@php echo empty($patientData->fiscal_code)?'<i class="fa fa-exclamation-circle exclamation-mark" aria-hidden="true"></i>':'' @endphp {{ __('patient.Fiscal code') }}</label>
										<div class="col-sm-8">
											<input value="{{ $patientData->fiscal_code }}" id="fiscal_code" type="text" class="form-control1" name="fiscal_code" placeholder="{{ __('patient.Fiscal code') }}">
										</div>									
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label class="col-sm-2 control-label">@php echo empty($patientData->place_of_living)?'<i class="fa fa-exclamation-circle exclamation-mark" aria-hidden="true"></i>':'' @endphp {{ __('patient.Place of living') }}</label>
										<div class="col-sm-8">
											<input value="{{ $patientData->place_of_living }}" id="place_of_living" type="text" class="form-control1" name="place_of_living" placeholder="{{ __('patient.Place of living') }}">
										</div>							
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label class="col-sm-2 control-label">@php echo empty($patientData->province_of_living)?'<i class="fa fa-exclamation-circle exclamation-mark" aria-hidden="true"></i>':'' @endphp {{ __('patient.Province of living') }}</label>
										<div class="col-sm-8">
											<input value="{{ $patientData->province_of_living }}" id="province_of_living" type="text" class="form-control1" name="province_of_living" placeholder="{{ __('patient.Province of living') }}">
										</div>									
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label class="col-sm-2 control-label">@php echo empty($patientData->number_of_the_address)?'<i class="fa fa-exclamation-circle exclamation-mark" aria-hidden="true"></i>':'' @endphp {{ __('patient.Number of the address') }}</label>
										<div class="col-sm-8">
											<input value="{{ $patientData->number_of_the_address }}" id="number_of_the_address" type="text" class="form-control1" name="number_of_the_address" placeholder="{{ __('patient.Number of the address') }}">
										</div>							
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label class="col-sm-2 control-label">@php echo empty($patientData->address)?'<i class="fa fa-exclamation-circle exclamation-mark" aria-hidden="true"></i>':'' @endphp {{ __('patient.Address') }}</label>
										<div class="col-sm-8">
											<textarea class="form-control" id="address" name="address">{{ $patientData->address }}</textarea>
										</div>									
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label class="col-sm-2 control-label">@php echo empty($patientData->postal_code)?'<i class="fa fa-exclamation-circle exclamation-mark" aria-hidden="true"></i>':'' @endphp {{ __('patient.Postal Code') }}</label>
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
								$prefer = isset($relativeData->prefer)?$relativeData->prefer:'';
								unset($relativeData->prefer);
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
											<div class="col-lg-3" >
												<input type="radio" value="{{$count}}"  name="relative[prefer]" @php echo ($count == $prefer)?'checked':''; @endphp/>
											</div>
											<div class="col-lg-3" >
												<i class="remove-relative fa fa-times" aria-hidden="true"></i>
											</div>
										</div>
										
									</div>
									<?php $count++; ?>
								@endforeach
							</div>
							<br/>
							<?php
							$privacyData = [];
							$pri=0;
							if(!empty($patientData->privacy)) {
								$privacyData = json_decode($patientData->privacy);
								$pri =1; 
							}
							?>
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
							
							@if($user->role_type != 3)
							<div class=""> <button type="submit" name="add" class="btn btn-default">Salva</button> </div>
							@endif
						</form>
						<form id="privacy-form">
							<input type="hidden" id="alreadyagree" value="{{ $pri }}"/>
							<input type="hidden" name="pat_id" value="{{ $patientData->id }}">
							<div class="row">
								<div class="col-lg-12">
									<span class="text-center"><h3>{{ __('patient.Privacy') }}</span></h3>
								</div>
								<span id="succ-mssg"></span>
							</div>
							<br>
							@if(!empty($patientData->patient_signature))
							<div class="row text-center">
								<div class="col-lg-12">
									<div class="form-group">
										<label class="col-sm-6 control-label text-right"> Firma &nbsp;&nbsp;: </label>
										<div class="col-sm-6 text-left" >
											
											<span class="glyphicon glyphicon-ok"></span></p> 
										</div>									
									</div>
								</div>
							</div>
							@else
							<center><h3>Nessuna firma</h3></center>
							@endif
							<br>
							{!! csrf_field() !!}
							@if($user->role_type != 3)
							<div class="text-center"> <button id="privacy-button" type="button" name="privacy-button" class="btn btn-default">Stampa la privacy</button>&nbsp;<button id="privacy-get-signature-button" type="button" name="privacy-button" class="btn btn-default">Ottieni la firma</button></div>
							
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
.exclamation-mark{
	float: left;
	margin: 4 0 0 -28;
	position: absolute;
}
#f-footer,#hori {
	display:none;
}
</style>
@endsection