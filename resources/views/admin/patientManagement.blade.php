@extends('admin.layout.layout')
@section('title','dasbhoard')
@section('content')

<div class="outter-wp">
	<div class="sub-heard-part">
		<ol class="breadcrumb m-b-0">
			<li><a href="{{url('admin/dashboard')}}">Home</a></li>
			<li class="active">{{ __('patient.Manage Patient') }}</li>
		</ol>
	</div>
    <input type="hidden" value="{{$user->id}}" id="logged-in-user"/>
    <div class="row">
        <div class="col-sm-4">
            <select id="doctor-dropdown" class="form-control1">
                <option>Selezionare Medico</option>
                @foreach($doctorData as $dData)
                <option value="{{$dData->id}}">{{ $dData->surname.' '.$dData->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
	<div class="body-section">
    <div class="jobs-list-wrapper">
        <div class="jobs-list">
            <h2 class="jobs-list-heading">{{ __('patient.Patients of the day') }}</h2>
            <div class="jobs-list-body" id="new-jobs">
                <ul id="new-jobs-list">
                    <?php $patientFirstSection = (!empty($patientFirst)?$patientFirst:(!empty($existingPat->first)?json_decode($existingPat->first,true):[]));
                     ?>
                    @foreach($patientFirstSection as $patient)
                    <li class="indivisual_patient doc-{{ $patients[$patient['id']]->docId }}" color="{{ $patient['color'] }}" app-id="{{ $patients[$patient['id']]->appointid }}" updated-by="{{ $patient['updated_by'] }}" update-date="{{ $patient['update_date'] }}" patient-id="{{ $patient['id'] }}">
                        <div class="job-block" id="patient-{{ $patient['id'] }}" style="@php echo 'background-color:'.$patient['color'] @endphp">
                            <div class="job-name-block">
                                <div class="job-name">{{ $patients[$patient['id']]->surname.' '.$patients[$patient['id']]->name.' : '.$patients[$patient['id']]->dob}}</div>
                                <div class="job-edit">
                                    <a href="javascript:void(0);" data-href="{{ url('admin/getpatient/'.$patients[$patient['id']]->appointid) }}" class="openPopup">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    </a>
                                    <span class="color-pick">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                        <input type="hidden" class="select-color">
                                    </span>
                                </div>
                            </div>
                            <div class="job-info-block">
                                <div class="job-date">{{ __('patient.Start Time').':'.$patients[$patient['id']]->starteTime.', '.__('patient.End Time').':'.$patients[$patient['id']]->endtime }}</div>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="jobs-list-footer"></div>
        </div>
        <div class="jobs-list">
            <h2 class="jobs-list-heading">{{ __('patient.Check In') }}</h2>
            <div class="jobs-list-body" id="in-progress">
                <ul id="in-progress-list">
                    <?php $patientSecondSection = (!empty($existingPat->second)?json_decode($existingPat->second,true):[]);
                     ?>
                    @foreach($patientSecondSection as $patient)
                    <li class="indivisual_patient doc-{{ $patients[$patient['id']]->docId }}" color="{{ $patient['color'] }}" app-id="{{ $patients[$patient['id']]->appointid }}" updated-by="{{ $patient['updated_by'] }}" update-date="{{ $patient['update_date'] }}" patient-id="{{ $patient['id'] }}">
                        <div class="job-block" id="patient-{{ $patient['id'] }}" style="@php echo 'background-color:'.$patient['color'] @endphp">
                            <div class="job-name-block">
                                <div class="job-name">{{ $patients[$patient['id']]->surname.' '.$patients[$patient['id']]->name.' : '.$patients[$patient['id']]->dob}}</div>
                                <div class="job-edit">
                                    <a href="javascript:void(0);" data-href="{{ url('admin/getpatient/'.$patients[$patient['id']]->appointid) }}" class="openPopup">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    </a>
                                    <span class="color-pick">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                        <input type="hidden" class="select-color">
                                    </span>
                                </div>
                            </div>
                            <div class="job-info-block">
                                <div class="job-date">{{ __('patient.Start Time').':'.$patients[$patient['id']]->starteTime.', '.__('patient.End Time').':'.$patients[$patient['id']]->endtime }}</div>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="jobs-list-footer"></div>
        </div>
        <div class="jobs-list">
            <h2 class="jobs-list-heading">{{ __('patient.Surgery') }}</h2>
            <div class="jobs-list-body" id="waiting">
                <ul id="waiting-jobs-list">
                    <?php $patientThirdSection = (!empty($existingPat->third) && $existingPat->third?json_decode($existingPat->third,true):[]);
                     ?>
                    @foreach($patientThirdSection as $patient)
                    <li class="indivisual_patient doc-{{ $patients[$patient['id']]->docId }}" color="{{ $patient['color'] }}"  app-id="{{ $patients[$patient['id']]->appointid }}" updated-by="{{ $patient['updated_by'] }}" update-date="{{ $patient['update_date'] }}" patient-id="{{ $patient['id'] }}">
                        <div class="job-block" id="patient-{{ $patient['id'] }}" style="@php echo 'background-color:'.$patient['color'] @endphp">
                            <div class="job-name-block">
                                <div class="job-name">{{ $patients[$patient['id']]->surname.' '.$patients[$patient['id']]->name.' : '.$patients[$patient['id']]->dob}}</div>
                                <div class="job-edit">
                                    <a href="javascript:void(0);" data-href="{{ url('admin/getpatient/'.$patients[$patient['id']]->appointid) }}" class="openPopup">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    </a>
                                    <span class="color-pick">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                        <input type="hidden" class="select-color">
                                    </span>
                                </div>
                            </div>
                            <div class="job-info-block">
                                <div class="job-date">{{ __('patient.Start Time').':'.$patients[$patient['id']]->starteTime.', '.__('patient.End Time').':'.$patients[$patient['id']]->endtime }}</div>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="jobs-list-footer"></div>
        </div>
        <div class="jobs-list">
            <h2 class="jobs-list-heading">{{ __('patient.Exams') }}</h2>
            <div class="jobs-list-body" id="complete">
                <ul id="complete-jobs-list">
                    <?php $patientFourthSection = (!empty($existingPat->fourth)?json_decode($existingPat->fourth,true):[]);
                     ?>
                    @foreach($patientFourthSection as $patient)
                    <li class="indivisual_patient doc-{{ $patients[$patient['id']]->docId }}" color="{{ $patient['color'] }}" app-id="{{ $patients[$patient['id']]->appointid }}" updated-by="{{ $patient['updated_by'] }}" update-date="{{ $patient['update_date'] }}" patient-id="{{ $patient['id'] }}">
                        <div class="job-block" id="patient-{{ $patient['id'] }}"style="@php echo 'background-color:'.$patient['color'] @endphp">
                            <div class="job-name-block">
                                <div class="job-name">{{ $patients[$patient['id']]->surname.' '.$patients[$patient['id']]->name.' : '.$patients[$patient['id']]->dob}}</div>
                                <div class="job-edit">
                                    <a href="javascript:void(0);" data-href="{{ url('admin/getpatient/'.$patients[$patient['id']]->appointid) }}" class="openPopup">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    </a>
                                    <span class="color-pick">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                        <input type="hidden" class="select-color">
                                    </span>
                                </div>
                            </div>
                            <div class="job-info-block">
                                <div class="job-date">{{ __('patient.Start Time').':'.$patients[$patient['id']]->starteTime.', '.__('patient.End Time').':'.$patients[$patient['id']]->endtime }}</div>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="jobs-list-footer"></div>
        </div>
        <div class="jobs-list">
            <h2 class="jobs-list-heading">{{ __('patient.Check Out') }}</h2>
            <div class="jobs-list-body" id="rework">
                <ul id="rework-jobs-list">
                    <?php $patientFifthSection = (!empty($existingPat->fifth)?json_decode($existingPat->fifth,true):[]);
                     ?>
                    @foreach($patientFifthSection as $patient)
                    <li class="indivisual_patient doc-{{ $patients[$patient['id']]->docId }}" color="{{ $patient['color'] }}" app-id="{{ $patients[$patient['id']]->appointid }}" updated-by="{{ $patient['updated_by'] }}" update-date="{{ $patient['update_date'] }}" patient-id="{{ $patient['id'] }}">
                        <div class="job-block" id="patient-{{ $patient['id'] }}" style="@php echo 'background-color:'.$patient['color'] @endphp">
                            <div class="job-name-block">
                                <div class="job-name">{{ $patients[$patient['id']]->surname.' '.$patients[$patient['id']]->name.' : '.$patients[$patient['id']]->dob}}</div>
                                <div class="job-edit">
                                    <a href="javascript:void(0);" data-href="{{ url('admin/getpatient/'.$patients[$patient['id']]->appointid) }}" class="openPopup">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    </a>
                                    <span class="color-pick">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                        <input type="hidden" class="select-color">
                                    </span>
                                </div>
                            </div>
                            <div class="job-info-block">
                                <div class="job-date">{{ __('patient.Start Time').':'.$patients[$patient['id']]->starteTime.', '.__('patient.End Time').':'.$patients[$patient['id']]->endtime }}</div>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="jobs-list-footer"></div>
        </div>
    </div>
</div>
</div>
<!-- Modal HTML -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog" style="width:850px;">
        <div class="modal-content">
            
        </div>
    </div>
</div>
<div id="newvisitModal" class="modal fade" role="dialog">
    <div class="modal-dialog" style="width:550px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close close_appointment"  data-dismiss="modal">&times;</button>
                <h4 class="modal-title">{{ __('patient.Create New Visit') }} </h4>
                <span id="new-visit-error"></span>
            </div>
            <div class="modal-body">
                <form  id='newVisitForm' method="post">
                    <div class="form-group">
                            <label for="">{{ __('menu.Date') }} <span style="color: red">*</span></label>
                            <input id="appointment-date" type="text" name="selected_date" class="form-control"  required="required" style="margin-bottom: 0px;">
                    </div>
                    <input type="hidden" id="patient-id" name="patient_id">
                    <div class="form-group">
                        <label for="">{{ __('menu.StartTime') }} <span style="color: red">*</span></label>
                        <div class="input-group bootstrap-timepicker timepicker">
                            <input id="timepicker1" type="text" name="starteTime" class="form-control1 input-small timecall" readonly="" style="margin-bottom: 0px;">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                        </div>
                    </div>  

                    <div class="form-group">
                        <label for="">{{ __('menu.EndTime') }} <span style="color: red">*</span></label>
                        <div class="input-group bootstrap-timepicker timepicker">
                            <input id="timepicker2" type="text" name="endtime" class="form-control1 input-small timecall"  readonly="" style="margin-bottom: 0px;">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Motivo visita</label>
                        <div class="input-group">
                            <textarea name="visit_motive" cols="80" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="title">{{ __('menu.specialty') }}<span style="color: red">*</span></label> 
                        <select name="examination_id" id="examination_id"  class="form-control" required="required"  style="height: 48px!important">
                            <option value="">{{ __('menu.Select specialty') }}</option>
                            @foreach($examination as $item)
                            <option value="{{$item->id}}">{{$item->title}}</option>
                            @endforeach                                 
                        </select>
                    </div>
                    <div class="form-group ">
                        <label for="title">{{ __('menu.Type of visit') }} <span style="color: red">*</span></label> 
                        <select name="rooms" id="rooms"  class="form-control" required="required"  style="height: 48px!important">
                        </select>   
                    </div>
                    <div class="form-group ">
                        <label for="title">Dottore <span style="color: red">*</span></label> 
                        <select name="doctro" id="doctors"  class="form-control" required="required"  style="height: 48px!important">
                        </select>
                    </div>
                    
                    
                    {!! csrf_field() !!}
                    <button type="button" id="savebutton" class="btn btn-default" name="add">Inserisci</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div id="newsugeryModal" class="modal fade" role="dialog">
    <div class="modal-dialog" style="width:550px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close close_appointment"  data-dismiss="modal">&times;</button>
                <h4 class="modal-title">{{ __('patient.Create New intervention') }} </h4>
                <span id="new-surgery-error"></span>
            </div>
            <div class="modal-body">
                <form  id='newSurgeryForm' method="post">
                    <div class="form-group">
                            <label for="">{{ __('patient.Surgery Date') }} <span style="color: red">*</span></label>
                            <input id="surgery-date" type="text" name="surgery_date" class="form-control"  required="required" style="margin-bottom: 0px;">
                    </div>
                    <div class="form-group">
                            <label for="">{{ __('patient.Surgery Name') }} <span style="color: red">*</span></label>
                            <input type="text" name="surgery_name" class="form-control"  required="required" style="margin-bottom: 0px;">
                    </div>
                    <input type="hidden" id="surgery-pat-id" name="pat_id">
                    <input type="hidden" id="surgery-doctor-id" name="doc_id">
                    <div class="form-group">
                        <label for="">{{ __('patient.Surgery Time') }} <span style="color: red">*</span></label>
                        
                        <input id="surgery-duration" type="hidden" name="surgery_duration"/>
                       
                    </div>  
                    <div class="form-group">
                        <label for="">{{ __('patient.Surgery Type') }} <span style="color: red">*</span></label>
                        
                       <select class="form-control1" id="surgery-type" name="surgery_type">
                           <option value="">{{ __('patient.Select Surgery Type') }}</option>
                           <option value="1">Ambulatoriale</option>
                           <option value="2">Day Surgery</option>
                       </select>
                       
                    </div>  
                    
                    
                    {!! csrf_field() !!}
                    <button type="button" id="savesurgerybutton" class="btn btn-default" name="add">Inserisci</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('#surgery-duration').durationpicker({showDays: false,allowZeroTime: false});
        $('.openPopup').on('click',function(){
            var dataURL = $(this).attr('data-href');
            $('#myModal').find('.modal-content').load(dataURL,function(){
                $('#myModal').modal({show:true});
            });
        });

        $('#examination_id').change(function(){
            var id= $(this).val();
            var selecte_date= $('#appointment-date').val();
            if((id !== '') && (selecte_date !=='')){
            var starttime= $('#timepicker1').val();
            var endTime= $('#timepicker2').val();

            var SelectDateTime = selecte_date+' '+starttime;

            $.ajax({
                method: 'GET',
                url: "{{ url('/admin/ajaxresponse') }}"+'/'+id,
                data:{selectdate:SelectDateTime,starttime:starttime,endtime:endTime,avdoc:1},
                cache: false,
                success: function(html){                
                    var decodeData=  JSON.parse(html);
                $('#rooms').empty();
                //$('#rooms').append('<option value="">Select Rooms</option>');
            // here is for rooms section // 
            var firstDuration = 0;
            var ffCounter=1;       
            $.each(decodeData['rooms'], function( key, value ) {

                $('#rooms').append($('<option>',
                {
                    value: value.id,
                    text : value.room_name,
                    roomtime: value.duration
                }));
                if(ffCounter == 1) {
                    firstDuration = value.duration;
                }
                ffCounter++;
            });
            setSecondTimePicker(SelectDateTime,firstDuration);
           // end section here //

           //start doctor detail here//

           $('#doctors').empty();
           if(decodeData['DoctorInformation'] == ''){
                $('#error').html('<div class="alert alert-danger">Nessun medico disponibile.</div>');
           }else{
            $('#error').html('');
           }
           $.each(decodeData['DoctorInformation'], function( key1, value1 ) {

                $('#doctors').append($('<option>',
                {
                    value: value1.user_id,
                    text : value1.surname+' '+value1.name,
                }));
           });
            // end here doctor detail//
           }
         });
        }
        });
        $('.timecall').timepicker({
            showMeridian: false  ,
            minuteStep: 10
        });
        $('#timepicker1,#timepicker2').timepicker().on('changeTime.timepicker', function(e) {
            var id= $('#examination_id').val();
            if((id !== '') && (selecte_date !=='')){
                
            var selecte_date= $('#appointment-date').val();

            var starttime= $('#timepicker1').val();
            var endTime= $('#timepicker2').val();

            var SelectDateTime = selecte_date+' '+starttime;
            var roomSelected = $('#rooms').val();
            $.ajax({
                method: 'GET',
                url: "{{ url('/admin/ajaxresponse') }}"+'/'+id,
                data:{selectdate:SelectDateTime,starttime:starttime,endtime:endTime,avdoc:1},
                cache: false,
                success: function(html){                
                    var decodeData=  JSON.parse(html);
                    $('#rooms').empty();
                    //$('#rooms').append('<option value="">Select Rooms</option>');
                    // here is for rooms section // 
                    var firstDurationSec = 0;
                    var ffCounterSec=1;         
                    $.each(decodeData['rooms'], function( key, value ) {

                        $('#rooms').append($('<option>',
                        {
                            value: value.id,
                            text : value.room_name,
                            roomtime: value.duration
                        }));
                        if(ffCounterSec == 1) {
                            firstDurationSec = value.duration;
                        }
                        ffCounterSec++;
                    });
                    setSecondTimePicker(SelectDateTime,firstDurationSec);
                   // end section here //

                   //start doctor detail here//

                   $('#doctors').empty();
                   $.each(decodeData['DoctorInformation'], function( key1, value1 ) {

                        $('#doctors').append($('<option>',
                        {
                            value: value1.user_id,
                            text : value1.surname+' '+value1.name,
                        }));
                   });
                    // end here doctor detail//
                    if(roomSelected != '') {
                        $('#rooms').val(roomSelected);
                    }
                   }
            });
            }
        });
        var now = new Date();
        $('#timepicker1').timepicker('setTime', "09:00 AM");
        $('#timepicker2').timepicker('setTime', "09:10 AM");
        $('#appointment-date').datepicker({
            minDate:1,
            dateFormat: 'yy-mm-dd',
            beforeShowDay: $.datepicker.noWeekends
        });
        $('#surgery-date').datepicker({
            minDate:0,
            dateFormat: 'yy-mm-dd',
            beforeShowDay: $.datepicker.noWeekends
        });
        $("#newVisitForm").validate({
            rules: {
                examination_id: "required",
                rooms: "required",
                doctro: "required",
                patient: "required",
                date:"required"
            },
            messages: {
                examination_id: "Seleziona il tipo di esame.",
                rooms: "Si prega di selezionare la stanza.",
                doctro: "Per favore, seleziona un dottore.",
                patient: "Seleziona il paziente.",
                date:"Per favore, inserisci la data."
            }
        });
        $('#savebutton').click(function(){
            $('#new-visit-error').html('');
            var startTime=$('#timepicker1').val();
            var endTime=$('#timepicker2').val();
            if(checkStartEndTime(startTime, endTime)){
                var patId=$('#patient-id').val();
                if(patId != ''){
                    if($("#newVisitForm").valid()){
                        $.ajax({
                            type:"POST",
                            url:"{{url('admin/ajaxset-appointment')}}",
                            data:$("#newVisitForm").serialize(),
                            success: function(response){
                                if(response=='success')
                                {
                                    $('#newvisitModal').modal('hide');
                                    $('#myModal').modal({show:true});
                                    $('#success-message').html('<div class="alert alert-success">Il nuovo appuntamento è stato creato correttamente.</div>');
                                }else{
                                    $('#new-visit-error').html('<div class="alert alert-danger"><strong>Error!</strong>Questo appuntamento per data e ora è già prenotato.</div>');
                                }
                            }
                        });
                    }else{
                        $("#myForm").submit();
                    }
                } else {
                    $('#new-visit-error').html("<div class='alert alert-danger'><strong>Error!</strong>Paziente non valido.</div>");
                }
            } else {
                $('#new-visit-error').html("<div class='alert alert-danger'><strong>Error!</strong>L'ora di fine dovrebbe essere successiva all'ora di inizio..</div>");
            }
        });
        $('#rooms').change(function(){
            var optionSelRoom = $('option:selected', this).attr('roomtime');
            var selecte_date_room= $('#appointment-date').val();
            var starttime_room= $('#timepicker1').val();
            var SelectDateTimeRoom = selecte_date_room+' '+starttime_room;
            setSecondTimePicker(SelectDateTimeRoom,optionSelRoom);
        });
    });
    function checkStartEndTime(startTime, endTime)
    {
        var startTimeArr = startTime.split(":");
        var endTimeArr = endTime.split(":");

        var startHour = startTimeArr[0];
        var startMinute = startTimeArr[1];

        var endHour = endTimeArr[0];
        var endMinute = endTimeArr[1];

        //Create date object and set the time to that
        var startTimeObject = new Date();
        startTimeObject.setHours(startHour, startMinute, 0);

        //Create date object and set the time to that
        var endTimeObject = new Date(startTimeObject);
        endTimeObject.setHours(endHour, endMinute, 0);

         //Now we are ready to compare both the dates
        if(startTimeObject > endTimeObject)
        {
            return false;
        } else {
            return true;
        }
    }
    function setSecondTimePicker(SelectDateTime, firstDuration) {
        var timeObject = new Date(SelectDateTime); 
        timeObject.setSeconds(timeObject.getSeconds() + firstDuration);
        var hoursEndSeel = addZero(timeObject.getHours())+':'+addZero(timeObject.getMinutes());
        $('#timepicker2').val(hoursEndSeel);
    }
    function addZero(i) {
      if (i < 10) {
        i = "0" + i;
      }
      return i;
    }
</script>
@endsection