@extends('admin.layout.layout')

@section('title','dasbhoard')

@section('content')



<div class="outter-wp">

	<!--/sub-heard-part-->

	<div class="sub-heard-part">

		<ol class="breadcrumb m-b-0">
		    <li><a href="{{url('admin/assegna-stanza')}}">Elenco stanza</a></li>
			<li class="active">{{ __('menu.Rooms') }}</li>

		</ol>

	</div>	

	<div class="forms-main">			

			<div class="set-1">

				<div class="graph-2 general">

					<h3 class="inner-tittle two"></h3>

					<div class="grid-1">

						<div class="form-body">

							<form class="form-horizontal" method="post" >

								<div class="form-group {{ $errors->has('room-name') ? ' has-error' : '' }}">

									<label for="room-name" class="col-sm-2 control-label">{{ __('menu.Room Name') }}</label>

									<div class="col-sm-8">

										<input type="text" class="form-control1" value="{{old('room-name')}}"   maxlength="30" name="room-name" id="room-name" placeholder="{{ __('menu.Room Name') }}">

										 @if ($errors->has('room-name'))

		                                    <span class="help-block">

		                                        <strong>{{ $errors->first('room-name') }}</strong>

		                                    </span>

                               			 @endif

									</div>

									<div class="col-sm-2">

										

									</div>

								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">{{ __('menu.Duration') }}</label>
									<div class="col-sm-8">
										<div class="col-sm-8">
											<input id="duration" type="hidden" name="duration" placeholder="{{ __('menu.Duration') }}">
										</div>
									</div>
								</div>
								<div class="form-group {{ $errors->has('Color') ? ' has-error' : '' }}">

									<label for="Color" class="col-sm-2 control-label">{{ __('menu.Color Code') }}</label>

									<div class="col-sm-8">

										<input  type="text" class="form-control1" id="color-picker-component" value="{{old('Color')}}" maxlength="30" name="Color" readonly="" placeholder="{{ __('menu.Color Code') }}">

										 @if ($errors->has('Color'))

		                                    <span class="help-block">

		                                        <strong>{{ $errors->first('Color') }}</strong>

		                                    </span>

                               			 @endif



									</div>

								</div>



								<div class="form-group {{ $errors->has('examination_type') ? ' has-error' : '' }}">

									<label for="examination_type" class="col-sm-2 control-label">{{ __('menu.specialty') }}</label>

									<div class="col-sm-8">

										<select name="examination_type" class="form-control1">



											<option value=" ">{{ __('menu.selectctexamination') }}</option>

												@foreach($examination as $item)

													<option value="{{$item->id}}">{{$item->title}}</option>

												@endforeach											



										</select>

										 @if ($errors->has('examination_type'))

		                                    <span class="help-block">

		                                        <strong>{{ $errors->first('examination_type') }}</strong>

		                                    </span>

                               			 @endif



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

	</div> 										   

</div>

<script>

  $(function () {

      $('#color-picker-component').colorpicker();
      $('#duration').durationpicker({showDays: false,allowZeroTime: false});
		
  });

 </script>

@endsection							

