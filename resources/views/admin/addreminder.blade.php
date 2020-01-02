@extends('admin.layout.layout')
@section('title','dasbhoard')
@section('content')
<div class="outter-wp">
    <!--/sub-heard-part-->
    <div class="sub-heard-part">
        <ol class="breadcrumb m-b-0">
            <li><a href="{{url('admin/promemoria')}}">{{ __('patient.Reminder') }}</a></li>
            <li class="active">{{ __('patient.Add Reminder') }}</li>
        </ol>
    </div>
    <div class="forms-main">
        <div class="set-1">
            <div class="graph-2 general">
                <h3 class="inner-tittle two"></h3>
                <div class="grid-1">
                    <div class="form-body">
                        <form id="add-reminder" class="form-horizontal" method="post" >
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('patient.Description') }}</label>
                                <div class="col-sm-8">
                                    <textarea placeholder="{{ __('patient.Description') }}" class="form-control" name="description"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('patient.Time') }}</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control1" name="reminder_time" id="reminder_time" placeholder="{{ __('patient.Time') }}">
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
	$.datetimepicker.setLocale('it');
	$('#reminder_time').datetimepicker({
	       	dayOfWeekStart :1,
	    	ownerDocument: document,
	    	contentWindow: window,
	    	value: '',
	    	rtl: false,
	    	format: 'Y-m-d H:i',
	    	formatTime: 'H:i',
	    	formatDate: 'Y-m-d',
	    	startDate:  false, 
	    	pickTime: false,
	    	step: 05,
	    	monthChangeSpinner: true,
	    	closeOnDateSelect: false,
	    	closeOnTimeSelect: true,
	    	closeOnWithoutClick: true,
	    	closeOnInputClick: true,
		    openOnFocus: true,
		    timepicker: true,
		    datepicker: true,
		    weeks: false,
		    defaultTime: false, 
		    defaultDate: false,
		    minDate:0
	    });
	$(document).ready(function(){
	    $('#add-reminder').validate({
	        rules: {
	            description: "required",
	            reminder_time: "required"
	        },
	        messages: {
	            description: "Questo campo è obbligatorio.",
	            reminder_time: "Questo campo è obbligatorio."
	        }
	    });
	});
</script>
@endsection

