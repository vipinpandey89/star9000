@extends('admin.layout.layout')
@section('title','dasbhoard')
@section('content')

<div class="outter-wp">
	<div class="sub-heard-part">
		<ol class="breadcrumb m-b-0">
			<li><a href="{{url('admin/dashboard')}}">Home</a></li>
			<li class="active">{{ __('menu.List By Doctor') }}</li>
		</ol>
	</div>
	<div class="body-section">
    <div class="jobs-list-wrapper">
        @foreach($doctorData as $docD)
        <div class="jobs-list">
            <h2 class="jobs-list-heading">{{ $docD->surname.' '.$docD->name }}</h2>
            <div class="jobs-list-body" id="new-jobs">
                <ul id="new-jobs-list">
                    @foreach($patientsTodayData[$docD->id] as $patient)
                    <li class="indivisual_patient" >
                        <div class="job-block" style="color:white;background-color: {{ $patient['color'] }}">
                            <div class="job-name-block">
                                <div class="job-name">{{ $patient['patname']." : ".$patient['dob'] }}, Stato : <span id="patient-{{ $patient['id'] }}">{{ $patient['curent_status'] }}</span></div>
                                <div class="job-edit">
                                    <a href="javascript:void(0);" data-href="{{ url('admin/dailyPatChangeStatus/'.$patient['id']) }}" class="openPopup">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </a>
                                </div>

                            </div>
                            <div class="job-info-block">
                                <div class="job-date">{{ __('patient.Start Time').':'.$patient['appointment_start'].', '.__('patient.End Time').':'.$patient['appointment_end'] }}</div>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="jobs-list-footer"></div>
        </div>
        @endforeach
    </div>
</div>
</div>
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog" style="width:850px;">
        <div class="modal-content">
            
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('.openPopup').on('click',function(){
            var dataURL = $(this).attr('data-href');
            $('#myModal').find('.modal-content').load(dataURL,function(){
                $('#myModal').modal({show:true});
            });
        });
    });
</script>
@endsection