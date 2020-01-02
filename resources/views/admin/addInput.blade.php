@extends('admin.layout.layout')

@section('title','dasbhoard')

@section('content')

<div class="outter-wp">

	<!--/sub-heard-part-->

	<div class="sub-heard-part">

		<ol class="breadcrumb m-b-0">
			<li><a href="{{url('admin/schede-eye-visit')}}">{{ __('patient.Eye Visit Tabs') }}</a></li>
			<li><a href="{{url('admin/ingressi-scheda/'.$tabid)}}">{{ __('patient.Tab Inputs') }}</a></li>
			<li class="active">{{ __('patient.Add Input') }}</li>

		</ol>

	</div>	

	<div class="forms-main">			

			<div class="set-1">

				<div class="graph-2 general">

					<h3 class="inner-tittle two"></h3>

					<div class="grid-1">

						<div class="form-body">

							<form id="add-input-form" class="form-horizontal" method="post" >

								<div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">

									<label for="title" class="col-sm-2 control-label">{{ __('patient.Title') }}</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" maxlength="200" name="title" id="title" placeholder="{{ __('patient.Title') }}">
									</div>
								</div>
								<div class="form-group">
									<label for="type" class="col-sm-2 control-label">{{ __('patient.Input Type') }}</label>
									<div class="col-sm-8">
										<select id="input-type" name="type" class="form-control1">
											<option value="">{{ __('patient.selectcttype') }}</option>
											<option value="text">Casella di testo</option>
											<option value="number">Numero</option>
											<option value="textarea">Testo</option>
											<option value="select">Selezione casella 
</option>
											<option value="radio">Pulsante di opzione 
</option>
											<option value="checkbox">Casella di spunta 
</option>
											<option value="date">Data</option>
											<option value="print">Pulsante stampa


</option>
										</select>
									</div>

								</div>
								<div class="form-group">
									<div id="data-section" style="display: none;">
										<div class="optionsec row">
											<div class="col-lg-2" ></div>
											<div class="col-lg-8 " >
												<input class="form-control1" type="text" name="input_val[]">
											</div>
											<div class="col-lg-2" >
												<i id="add-data" class="fa fa-plus-circle" aria-hidden="true"></i>
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

