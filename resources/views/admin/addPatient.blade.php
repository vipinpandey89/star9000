@extends('admin.layout.layout')
@section('title','dasbhoard')
@section('content')

<div class="outter-wp">
	<div class="sub-heard-part">
		<ol class="breadcrumb m-b-0">
			<li><a href="{{url('admin/paziente')}}">Sezione paziente</a></li>
			<li class="active">{{ __('patient.Add Patient') }}</li>
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
											<input type="text" class="form-control1" name="surname" placeholder="{{ __('patient.Surname') }}">
										</div>									
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label class="col-sm-2 control-label">{{ __('patient.Name') }}</label>
										<div class="col-sm-8">
											<input type="text" class="form-control1" name="name" placeholder="{{ __('patient.Name') }}">
										</div>									
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label class="col-sm-2 control-label">{{ __('patient.Email') }}</label>
										<div class="col-sm-8">
											<input type="text" class="form-control1" name="email" placeholder="{{ __('patient.Email') }}">
										</div>									
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label class="col-sm-2 control-label">{{ __('patient.Phone') }}</label>
										<div class="col-sm-8">
											<input type="number" class="form-control1" name="phone" placeholder="{{ __('patient.Phone') }}">
										</div>									
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label class="col-sm-2 control-label">{{ __('patient.Date of Birth') }}</label>
										<div class="col-sm-8">
											<input id="dob" autocomplete="off" type="text" class="form-control1" name="dob" placeholder="{{ __('patient.Date of Birth') }}">
										</div>									
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label class="col-sm-2 control-label">{{ __('patient.Sex') }}</label>
										<div class="col-sm-8">
											<select class="form-control1" id="sex" name="sex">
					                           <option value="">{{ __('patient.Select Sex') }}</option>
					                           <option value="1">{{ __('patient.Male') }}</option>
					                           <option value="2">{{ __('patient.Female') }}</option>
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
											<input id="document" type="text" class="form-control1" name="document" placeholder="{{ __('patient.Document') }}">
										</div>									
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label class="col-sm-2 control-label">{{ __('patient.Profession') }}</label>
										<div class="col-sm-8">
											<input id="profession" type="text" class="form-control1" name="profession" placeholder="{{ __('patient.Profession') }}">
										</div>							
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label class="col-sm-2 control-label">{{ __('patient.Place of birth') }}</label>
										<div class="col-sm-8">
											<input id="place_of_birth	" type="text" class="form-control1" name="place_of_birth" placeholder="{{ __('patient.Place of birth') }}">
										</div>									
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label class="col-sm-2 control-label">{{ __('patient.Province of birth') }}</label>
										<div class="col-sm-8">
											<input id="province_of_birth" type="text" class="form-control1" name="province_of_birth" placeholder="{{ __('patient.Province of birth') }}">
										</div>							
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label class="col-sm-2 control-label">{{ __('patient.Fiscal code') }}</label>
										<div class="col-sm-8">
											<input id="fiscal_code" type="text" class="form-control1" name="fiscal_code" placeholder="{{ __('patient.Fiscal code') }}">
										</div>									
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label class="col-sm-2 control-label">{{ __('patient.Place of living') }}</label>
										<div class="col-sm-8">
											<input id="place_of_living" type="text" class="form-control1" name="place_of_living" placeholder="{{ __('patient.Place of living') }}">
										</div>							
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label class="col-sm-2 control-label">{{ __('patient.Province of living') }}</label>
										<div class="col-sm-8">
											<input id="province_of_living" type="text" class="form-control1" name="province_of_living" placeholder="{{ __('patient.Province of living') }}">
										</div>									
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label class="col-sm-2 control-label">{{ __('patient.Number of the address') }}</label>
										<div class="col-sm-8">
											<input id="number_of_the_address" type="text" class="form-control1" name="number_of_the_address" placeholder="{{ __('patient.Number of the address') }}">
										</div>							
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label class="col-sm-2 control-label">{{ __('patient.Address') }}</label>
										<div class="col-sm-8">
											<textarea class="form-control" id="address" name="address"></textarea>
										</div>									
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label class="col-sm-2 control-label">{{ __('patient.Postal Code') }}</label>
										<div class="col-sm-8">
											<input id="postal-code" type="number" class="form-control1" name="postal_code" placeholder="{{ __('patient.Postal Code') }}">
										</div>							
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label class="col-sm-2 control-label">{{ __('patient.Telephone Number') }}</label>
										<div class="col-sm-8">
											<input id="telephone" type="number" class="form-control1" name="telephone" placeholder="{{ __('patient.Telephone Number') }}">
										</div>									
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label class="col-sm-2 control-label">{{ __('patient.Nationality') }}</label>
										<div class="col-sm-8">
											<input id="nationality" type="text" class="form-control1" name="nationality" placeholder="{{ __('patient.Nationality') }}">
										</div>							
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label class="col-sm-2 control-label">{{ __('patient.Pec') }}</label>
										<div class="col-sm-8">
											<input id="pec" type="text" class="form-control1" name="pec" placeholder="{{ __('patient.Pec') }}">
										</div>									
									</div>
								</div>
								<div class="col-lg-6">
									&nbsp;
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<div class="form-group">
										<label class="col-sm-2 control-label">{{ __('patient.Description') }}</label>
										<div class="col-sm-8">
											<textarea id="description" class="form-control" name="description" placeholder="{{ __('patient.Description') }}"></textarea>
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