@extends('admin.layout.layout')
@section('title','dasbhoard')
@section('content')

<div class="outter-wp">
	<!--/sub-heard-part-->
	<div class="sub-heard-part">
		<ol class="breadcrumb m-b-0">
			<li><a href="{{url('admin/elenco-medico')}}">Medico</a></li>
			<li class="active">{{ __('menu.EditDoctor') }}</li>
		</ol>
	</div>	
	<div class="forms-main">			
			<div class="set-1">
				<div class="graph-2 general">
					<h3 class="inner-tittle two"></h3>
					<div class="grid-1">
						<div class="form-body">
							<form class="form-horizontal" method="post" >
								<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">

									<label class="col-sm-2 control-label">{{ __('menu.Surname') }}</label>

									<div class="col-sm-8">

										<input type="text" class="form-control1" value="{{!empty($userProfile)?$userProfile->surname:old('surname')}}" maxlength="30" name="surname" id="surname" placeholder="{{ __('menu.Surname') }}">

										@if ($errors->has('surname'))

										<span class="help-block">

											<strong>{{ $errors->first('surname') }}</strong>

										</span>

										@endif

									</div>									

								</div>
								<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
									<label for="room-name" class="col-sm-2 control-label">{{ __('menu.Name') }}</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" value="{{!empty($userProfile)?$userProfile->name:old('name')}}"   maxlength="30" name="name" id="name" placeholder="{{ __('menu.Name') }}">
										 @if ($errors->has('name'))
		                                    <span class="help-block">
		                                        <strong>{{ $errors->first('name') }}</strong>
		                                    </span>
                               			 @endif
									</div>									
								</div>

								<div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
									<label for="room-name" class="col-sm-2 control-label">E-mail</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" value="{{!empty($userProfile)?$userProfile->email:old('email')}}" readonly=""   maxlength="30" name="email" id="email" placeholder="E-mail">
										 @if ($errors->has('email'))
		                                    <span class="help-block">
		                                        <strong>{{ $errors->first('email') }}</strong>
		                                    </span>
                               			 @endif
									</div>									
								</div>

								<div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
									<label for="room-name" class="col-sm-2 control-label">{{ __('menu.Phone') }}</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" value="{{!empty($userProfile)?$userProfile->phone:old('phone')}}"   maxlength="10" name="phone" id="phone" placeholder="{{ __('menu.Phone') }}">
										 @if ($errors->has('phone'))
		                                    <span class="help-block">
		                                        <strong>{{ $errors->first('phone') }}</strong>
		                                    </span>
                               			 @endif
									</div>									
								</div>


								<div class="form-group {{ $errors->has('regione') ? ' has-error' : '' }}">
									<label for="room-name" class="col-sm-2 control-label">Nazionalità</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" value="{{!empty($userProfile)?$userProfile->regione:old('regione')}}"   maxlength="30" name="regione" id="regione" placeholder="Nazionalità">
										 @if ($errors->has('regione'))
		                                    <span class="help-block">
		                                        <strong>{{ $errors->first('regione') }}</strong>
		                                    </span>
                               			 @endif
									</div>									
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Indirizzo</label>
									<div class="col-sm-8">
										<textarea id="doc-address" class="form-control" name="address">{{ !empty($userProfile->address)?$userProfile->address:'' }}</textarea>
									</div>									
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Codice fiscale</label>
									<div class="col-sm-8">
										<input value="{{!empty($userProfile->postal_code)?$userProfile->postal_code:''}}" type="number" id="doc-postal-code" class="form-control1" name="postal_code" placeholder="Codice fiscale">
									</div>									
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Numero di telefono</label>
									<div class="col-sm-8">
										<input value="{{!empty($userProfile->telephone)?$userProfile->telephone:''}}" type="number" id="telephone" class="form-control1" name="telephone" placeholder="Numero di telefono">
									</div>									
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Tipo di prestazione</label>
									<div class="col-sm-8">
										<input value="{{!empty($userProfile->performance_type)?$userProfile->performance_type:''}}" type="text" id="performance-type" class="form-control1" name="performance_type" placeholder="Tipo di prestazione">
									</div>									
								</div>

							<div class="form-group {{ $errors->has('cap') ? ' has-error' : '' }}">
									<label for="room-name" class="col-sm-2 control-label">Cap</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" value="{{!empty($userProfile)?$userProfile->cap:''}}"   maxlength="6" name="cap" id="cap" placeholder="Cap">
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
										<input  type="text" class="form-control1 dateTime" id="dob" readonly="" name="dob"  value="{{!empty($userProfile)?date('d-m-Y',strtotime($userProfile->dob)):old('dob')}}" placeholder="Nata/o">
										 @if ($errors->has('dob'))
		                                    <span class="help-block">
		                                        <strong>{{ $errors->first('dob') }}</strong>
		                                    </span>
                               			 @endif

									</div>
						</div>


							<?php $examId = '';?>
							<div class="form-group {{ $errors->has('weekday_num') ? ' has-error' : '' }}">
								<label for="" class="col-sm-2 control-label">{{ __('menu.WeekDays') }}</label>
								<div class="col-sm-8">
									@foreach($doctorDetail as $detail)
									<?php if(!empty($detail->examination_id)) { $examId=$detail->examination_id; }  
									?>
									<div class="col-sm-12">
										<div class="col-sm-2">	
											<input  type="checkbox"  id="{{$detail->weekday_num}}" readonly="" name="weekday_num[{{$detail->weekday_num}}]" class="weekday_num"  value="{{$detail->weekday_num}}" <?php echo($detail->weekday_num==$detail->weekdays_id)?'checked':'';?> placeholder="{{ __('menu.Week Days') }}">	
											<span>{{$detail->day_of_week_it}}</span>
										</div>
										<div class="col-sm-5 <?php echo $detail->weekday_num;?>_1">
											<div class="form-group {{ $errors->has('weekday_num') ? ' has-error' : '' }}">
												<label for="" class="col-sm-2 control-label">{{ __('menu.StartTime') }}</label>
												<div class="input-group bootstrap-timepicker timepicker">
													<input id="timepicker1" value="<?php echo !empty($detail->start_time)?$detail->start_time:'';?>" type="text" name="startDate[{{$detail->weekday_num}}]" class="form-control1 input-small timecall" readonly="" style="margin-bottom: 0px;">
													<span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
												</div>
											</div>
										</div>
										<div class="col-sm-5 <?php echo $detail->weekday_num;?>_2">	
										<div class="form-group {{ $errors->has('weekday_num') ? ' has-error' : '' }}">
											<label for="" class="col-sm-2 control-label">{{ __('menu.EndTime') }}</label>
											<div class="input-group bootstrap-timepicker timepicker">
												<input id="timepicker2" value="<?php echo !empty($detail->end_time)?$detail->end_time:'';?>" type="text" name="enddate[{{$detail->weekday_num}}]" class="form-control1 input-small timecall"  readonly="" style="margin-bottom: 0px;">
												<span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
											</div>
										</div>
										</div>
									</div>

									@endforeach

									@if ($errors->has('weekday_num'))
									<span class="help-block">
										<strong>{{ $errors->first('weekday_num') }}</strong>
									</span>
									@endif

								</div>
							</div>
							<div class="form-group {{ $errors->has('examination_type') ? ' has-error' : '' }}">
											<label for="examination_type" class="col-sm-2 control-label">{{ __('menu.specialty') }}</label>
											<div class="col-sm-8">
												<select name="examination_type" class="form-control1">

													<option value=" ">{{ __('menu.Select specialty') }}</option>
														@foreach($examination as $item)
															<option value="{{$item->id}}" <?php echo ($examId==$item->id)?'selected':'';?>>{{$item->title}}</option>
														@endforeach											

												</select>
												 @if ($errors->has('examination_type'))
				                                    <span class="help-block">
				                                        <strong>{{ $errors->first('examination_type') }}</strong>
				                                    </span>
		                               			 @endif

											</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">Disponibilità da</label>
									<div class="col-sm-8">
										<input type="text" id="availability-from" class="form-control1" name="availability_from" placeholder="Disponibilità da" value="<?php echo !empty($userProfile->availability_from)?$userProfile->availability_from:'';?>">
									</div>									
								</div>

								<div class="form-group">
									<label class="col-sm-2 control-label">Disponibilità a</label>
									<div class="col-sm-8">
										<input type="text" id="availability-to" class="form-control1" name="availability_to" placeholder="Disponibilità a" value="<?php echo !empty($userProfile->availability_to)?$userProfile->availability_to:'';?>">
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
<!-- <script>
  $(function () {
      $('#color-picker-component').colorpicker();
  });
 </script> -->


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

<script type="text/javascript">
	$(document).ready(function(){
		$('#availability-from').datepicker({
			dateFormat: "yy-mm-dd",
			minDate: 0,
			beforeShowDay: $.datepicker.noWeekends,
	        onSelect: function(date){            
	            var date1 = $('#availability-from').datepicker('getDate');           
	            var date = new Date( Date.parse( date1 ) ); 
	            date.setDate( date.getDate() + 1 );        
	            var newDate = date.toDateString(); 
	            newDate = new Date( Date.parse( newDate ) );                      
	            $('#availability-to').datepicker("option","minDate",newDate);            
	        }
		});
		$('#availability-to').datepicker({
			dateFormat: "yy-mm-dd",
			beforeShowDay: $.datepicker.noWeekends,
			minDate: 0
		});
		$('.timecall').timepicker({
			showMeridian: false,
			minuteStep:10
		});
	});
</script>
@endsection							
