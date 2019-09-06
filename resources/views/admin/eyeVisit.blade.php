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
	</div>
	{!! csrf_field() !!}								

	<div class="col-sm-offset-2"> <button id="eye-visit-button" type="button" name="add" class="btn btn-default">Salva</button> </div>
</form>