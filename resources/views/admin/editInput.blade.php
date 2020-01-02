@extends('admin.layout.layout')

@section('title','dasbhoard')

@section('content')

@php $typeArray=['select','radio','checkbox'];
$inputValues = json_decode($inputData->input_values);
@endphp
<div class="outter-wp">

	<!--/sub-heard-part-->

	<div class="sub-heard-part">

		<ol class="breadcrumb m-b-0">
			<li><a href="{{url('admin/schede-eye-visit')}}">{{ __('patient.Eye Visit Tabs') }}</a></li>
			<li><a href="{{url('admin/ingressi-scheda/'.$tabid)}}">{{ __('patient.Tab Inputs') }}</a></li>
			<li class="active">{{ __('patient.Edit Input') }}</li>

		</ol>

	</div>	

	<div class="forms-main">			

			<div class="set-1">

				<div class="graph-2 general">

					<h3 class="inner-tittle two"></h3>

					<div class="grid-1">

						<div class="form-body">

							<form id="add-input-form" class="form-horizontal" method="post" >

								<div class="form-group">

									<label for="title" class="col-sm-2 control-label">{{ __('patient.Title') }}</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" maxlength="200" value="{{ $inputData->title }}" name="title" id="title" placeholder="{{ __('patient.Title') }}">
									</div>
								</div>
								<div class="form-group">
									<label for="type" class="col-sm-2 control-label">{{ __('patient.Input Type') }}</label>
									<div class="col-sm-8">
										<select id="input-type" name="type" class="form-control1">
											<option value="">{{ __('patient.selectcttype') }}</option>
											<option value="text" {{ ($inputData->type == 'text')?'selected':'' }}>Casella di testo</option>
											<option value="number" {{ ($inputData->type == 'number')?'selected':'' }}>Numero</option>
											<option value="textarea" {{ ($inputData->type == 'textarea')?'selected':'' }}>Testo</option>
											<option value="select" {{ ($inputData->type == 'select')?'selected':'' }}>Selezione casella</option>
											<option value="radio" {{ ($inputData->type == 'radio')?'selected':'' }}>Pulsante di opzione</option>
											<option value="checkbox" {{ ($inputData->type == 'checkbox')?'selected':'' }}>Casella di spunta</option>
											<option value="date" {{ ($inputData->type == 'date')?'selected':'' }}>Data</option>
											<option value="print" {{ ($inputData->type == 'print')?'selected':'' }}>Pulsante stampa</option>
										</select>
									</div>

								</div>
								<div class="form-group">
									<div id="data-section" style="{{ (in_array($inputData->type, $typeArray))?'':'display: none;' }}">
										<div class="optionsec row">
											<div class="col-lg-2" ></div>
											<div class="col-lg-8 " >
												<input value="{{ (isset($inputValues[0]))?$inputValues[0]:'' }}" class="form-control1" type="text" name="input_val[]">
											</div>
											<div class="col-lg-2" >
												<i id="add-data" class="fa fa-plus-circle" aria-hidden="true"></i>
											</div>
										</div>
										@php  unset($inputValues[0]); @endphp
										@foreach($inputValues as $intpt)
										<div class="optionsec row">
											<div class="col-lg-2" ></div>
											<div class="col-lg-8 " >
												<input value="{{ $intpt }}" class="form-control1" type="text" name="input_val[]">
											</div>
											<div class="col-lg-2" >
												<i id="add-data" class="remove-data fa fa-times" aria-hidden="true"></i>
											</div>
										</div>
										@endforeach
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

