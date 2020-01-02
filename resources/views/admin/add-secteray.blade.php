@extends('admin.layout.layout')

@section('title','dasbhoard')

@section('content')



<div class="outter-wp">

	<!--/sub-heard-part-->

	<div class="sub-heard-part">

		<ol class="breadcrumb m-b-0">
			<li><a href="{{url('admin/lista-segretaria')}}">Elenco admin</a></li>
			<li class="active">{{ __('menu.Addsecretary') }}</li>

		</ol>

	</div>	

	<div class="forms-main">			

			<div class="set-1">

				<div class="graph-2 general">

					<h3 class="inner-tittle two"></h3>

					<div class="grid-1">

						<div class="form-body">

							<form class="form-horizontal" method="post" >

								<div class="form-group {{ $errors->has('fullname') ? ' has-error' : '' }}">

									<label for="fullname" class="col-sm-2 control-label">{{ __('menu.Name') }}</label>

									<div class="col-sm-8">

										<input type="text" class="form-control1" value="{{old('fullname')}}"   maxlength="30" name="fullname" id="fullname" placeholder="{{ __('menu.Name') }}">

										 @if ($errors->has('fullname'))

		                                    <span class="help-block">

		                                        <strong>{{ $errors->first('fullname') }}</strong>

		                                    </span>

                               			 @endif

									</div>

									<div class="col-sm-2">

										

									</div>

								</div>

								<div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">

									<label for="email" class="col-sm-2 control-label">E-mail</label>

									<div class="col-sm-8">

										<input  type="text" class="form-control1" id="email" value="{{old('email')}}" maxlength="30" name="email" placeholder="E-mail">

										 @if ($errors->has('email'))

		                                    <span class="help-block">

		                                        <strong>{{ $errors->first('email') }}</strong>

		                                    </span>

                               			 @endif



									</div>

								</div>



							    <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">

									<label for="phone" class="col-sm-2 control-label">{{ __('menu.Phone') }}</label>

									<div class="col-sm-8">

										<input  type="text" class="form-control1" id="phone" value="{{old('phone')}}" maxlength="10" name="phone" placeholder="{{ __('menu.Phone') }}">

										 @if ($errors->has('phone'))

		                                    <span class="help-block">

		                                        <strong>{{ $errors->first('phone') }}</strong>

		                                    </span>

                               			 @endif



									</div>

								</div>





								<div class="form-group {{ $errors->has('regione') ? ' has-error' : '' }}">

									<label for="reasion" class="col-sm-2 control-label">Nazionalità</label>

									<div class="col-sm-8">

										<input  type="text" class="form-control1" id="regione" value="{{old('regione')}}" name="regione" placeholder="Nazionalità">

										 @if ($errors->has('regione'))

		                                    <span class="help-block">

		                                        <strong>{{ $errors->first('regione') }}</strong>

		                                    </span>

                               			 @endif



									</div>

								</div>



								<div class="form-group {{ $errors->has('cap') ? ' has-error' : '' }}">

									<label for="cap" class="col-sm-2 control-label">Cap</label>

									<div class="col-sm-8">

										<input  type="text" class="form-control1" id="cap" maxlength="8" value="{{old('cap')}}" name="cap" placeholder="Cap">

										 @if ($errors->has('cap'))

		                                    <span class="help-block">

		                                        <strong>{{ $errors->first('cap') }}</strong>

		                                    </span>

                               			 @endif



									</div>

								</div>



								<div class="form-group {{ $errors->has('dob') ? ' has-error' : '' }}">

									<label for="dob" class="col-sm-2 control-label">Nata/o</label>

									<div class="col-sm-8">

										<input  type="text" class="form-control1 dateTime" readonly="" id="dob" name="dob"  value="{{old('dob')}}" placeholder="Nata/o">

										 @if ($errors->has('dob'))

		                                    <span class="help-block">

		                                        <strong>{{ $errors->first('dob') }}</strong>

		                                    </span>

                               			 @endif



									</div>

								</div>

								{!! csrf_field() !!}

								<!-- <div class="form-group">

									<label for="inputPassword" class="col-sm-2 control-label">Password</label>

									<div class="col-sm-8">

										<input type="password" class="form-control1" id="inputPassword" placeholder="Password">

									</div>

								</div> -->

								

								<div class="col-sm-offset-2"> <button type="submit" name="addsectary" class="btn btn-default">Salva</button> </div>

							</form>

						</div>



					</div>

				</div>

			</div>

			</div>			

		</div>		

	</div> 										   

</div>


<script>
$.datetimepicker.setLocale('it');
$('.dateTime').datetimepicker({
dayOfWeekStart :1,

ownerDocument: document,

contentWindow: window,

value: '',

rtl: false,

format: 'd-m-Y ',

//formatTime: 'H:i',

formatDate: 'd-m-Y',

startDate:  false, 

 pickTime: false,

step: 60,

monthChangeSpinner: true,

closeOnDateSelect: false,

closeOnTimeSelect: true,

closeOnWithoutClick: true,

closeOnInputClick: true,

openOnFocus: true,

timepicker: false,

datepicker: true,

weeks: false,

defaultTime: false, 

defaultDate: false, 

});



</script>

@endsection							

