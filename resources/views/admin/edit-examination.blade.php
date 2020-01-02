@extends('admin.layout.layout')

@section('title','dasbhoard')

@section('content')



<div class="outter-wp">

	<!--/sub-heard-part-->

	<div class="sub-heard-part">

		<ol class="breadcrumb m-b-0">
			<li><a href="{{url('admin/visite')}}">Elenco delle specialità</a></li>
			<li class="active">{{ __('menu.specialty') }}</li>

		</ol>

	</div>	

	<div class="forms-main">			

			<div class="set-1">

				<div class="graph-2 general">

					<h3 class="inner-tittle two"></h3>

					<div class="grid-1">

						<div class="form-body">

							<form class="form-horizontal" method="post" >





								<div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">

									<label for="title" class="col-sm-2 control-label">{{ __('menu.specialty') }}</label>

									<div class="col-sm-8">

										<input type="text" class="form-control1" value="{{!empty($data)?$data->title:old('title')}}"   maxlength="30" name="title" id="title" placeholder="{{ __('menu.specialty') }}">

										 @if ($errors->has('title'))

		                                    <span class="help-block">

		                                        <strong>{{ $errors->first('title') }}</strong>

		                                    </span>

                               			 @endif

									</div>

									<div class="col-sm-2">

										

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

@endsection							

