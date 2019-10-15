@extends('admin.layout.layout')
@section('title','dasbhoard')
@section('content')

<div class="outter-wp">
	<div class="sub-heard-part">
		<ol class="breadcrumb m-b-0">
			<li><a href="{{url('admin/dashboard')}}">Home</a></li>
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
											<input id="dob" type="text" class="form-control1" name="dob" placeholder="{{ __('patient.Date of Birth') }}">
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
											<textarea id="description" class="form-control" name="description" placeholder="{{ __('patient.Description') }}">
											</textarea>
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