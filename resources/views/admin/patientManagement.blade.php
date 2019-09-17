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
	<div class="body-section">
    <div class="jobs-list-wrapper">
        <div class="jobs-list">
            <h2 class="jobs-list-heading">{{ __('patient.Patients of the day') }}</h2>
            <div class="jobs-list-body" id="new-jobs">
                <ul id="new-jobs-list">
                    <?php $patientFirstSection = (!empty($patientFirst)?$patientFirst:(!empty($existingPat->first)?json_decode($existingPat->first,true):[]));
                     ?>
                    @foreach($patientFirstSection as $patient)
                    <li class="indivisual_patient" app-id="{{ $patients[$patient['id']]->appointid }}" updated-by="{{ $patient['updated_by'] }}" update-date="{{ $patient['update_date'] }}" patient-id="{{ $patient['id'] }}">
                        <div class="job-block" id="patient-{{ $patient['id'] }}">
                            <div class="job-name-block">
                                <div class="job-name">{{ $patients[$patient['id']]->surname.' : '.$patients[$patient['id']]->dob}}</div>
                                <div class="job-edit">
                                    <a href="javascript:void(0);" data-href="{{ url('admin/getpatient/'.$patients[$patient['id']]->appointid) }}" class="openPopup">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    </a>
                                    <span class="color-pick">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
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
                    <li class="indivisual_patient" app-id="{{ $patients[$patient['id']]->appointid }}" updated-by="{{ $patient['updated_by'] }}" update-date="{{ $patient['update_date'] }}" patient-id="{{ $patient['id'] }}">
                        <div class="job-block" id="patient-{{ $patient['id'] }}">
                            <div class="job-name-block">
                                <div class="job-name">{{ $patients[$patient['id']]->surname.' : '.$patients[$patient['id']]->dob}}</div>
                                <div class="job-edit">
                                    <a href="javascript:void(0);" data-href="{{ url('admin/getpatient/'.$patients[$patient['id']]->appointid) }}" class="openPopup">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    </a>
                                    <span class="color-pick">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
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
                    <li class="indivisual_patient" app-id="{{ $patients[$patient['id']]->appointid }}" updated-by="{{ $patient['updated_by'] }}" update-date="{{ $patient['update_date'] }}" patient-id="{{ $patient['id'] }}">
                        <div class="job-block" id="patient-{{ $patient['id'] }}">
                            <div class="job-name-block">
                                <div class="job-name">{{ $patients[$patient['id']]->surname.' : '.$patients[$patient['id']]->dob}}</div>
                                <div class="job-edit">
                                    <a href="javascript:void(0);" data-href="{{ url('admin/getpatient/'.$patients[$patient['id']]->appointid) }}" class="openPopup">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    </a>
                                    <span class="color-pick">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
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
                    <li class="indivisual_patient" app-id="{{ $patients[$patient['id']]->appointid }}" updated-by="{{ $patient['updated_by'] }}" update-date="{{ $patient['update_date'] }}" patient-id="{{ $patient['id'] }}">
                        <div class="job-block" id="patient-{{ $patient['id'] }}">
                            <div class="job-name-block">
                                <div class="job-name">{{ $patients[$patient['id']]->surname.' : '.$patients[$patient['id']]->dob}}</div>
                                <div class="job-edit">
                                    <a href="javascript:void(0);" data-href="{{ url('admin/getpatient/'.$patients[$patient['id']]->appointid) }}" class="openPopup">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    </a>
                                    <span class="color-pick">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
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
                    <li class="indivisual_patient" app-id="{{ $patients[$patient['id']]->appointid }}" updated-by="{{ $patient['updated_by'] }}" update-date="{{ $patient['update_date'] }}" patient-id="{{ $patient['id'] }}">
                        <div class="job-block" id="patient-{{ $patient['id'] }}">
                            <div class="job-name-block">
                                <div class="job-name">{{ $patients[$patient['id']]->surname.' : '.$patients[$patient['id']]->dob}}</div>
                                <div class="job-edit">
                                    <a href="javascript:void(0);" data-href="{{ url('admin/getpatient/'.$patients[$patient['id']]->appointid) }}" class="openPopup">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    </a>
                                    <span class="color-pick">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
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
    <div class="modal-dialog">
        <div class="modal-content">
            
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('.openPopup').on('click',function(){
            var dataURL = $(this).attr('data-href');
            console.log(dataURL);
            $('.modal-content').load(dataURL,function(){
                $('#myModal').modal({show:true});
            });
        }); 
    });
</script>
@endsection