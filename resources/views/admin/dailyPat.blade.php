<?php $patientFirstSection = (!empty($patientFirst)?$patientFirst:(!empty($existingPat->first)?json_decode($existingPat->first,true):[]));
    ?>
@foreach($patientFirstSection as $patient)
@if(isset($patients[$patient['id']]))
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
@endif
@endforeach
||&&||
<?php $patientSecondSection = (!empty($existingPat->second)?json_decode($existingPat->second,true):[]);
    ?>
@foreach($patientSecondSection as $patient)
@if(isset($patients[$patient['id']]))
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
@endif
@endforeach
||&&||
<?php $patientThirdSection = (!empty($existingPat->third) && $existingPat->third?json_decode($existingPat->third,true):[]);
    ?>
@foreach($patientThirdSection as $patient)
@if(isset($patients[$patient['id']]))
<li class="indivisual_patient doc-{{ $patients[$patient['id']]->docId }}" color="{{ $patient['color'] }}"  app-id="{{ $patients[$patient['id']]->appointid }}" updated-by="{{ $patient['updated_by'] }}" update-date="{{ $patient['update_date'] }}" patient-id="{{ $patient['id'] }}">
    <div class="job-block" id="patient-{{ $patient['id'] }}" style="@php echo 'background-color:'.$patient['color'] @endphp">
        <div class="job-name-block">
            <div class="job-name">{{ $patients[$patient['id']]->surname.' '.$patients[$patient['id']]->name.' : '.$patients[$patient['id']]->dob}}</div>
            <div class="job-edit">
                <a href="javascript:void(0);" data-href="{{ url('admin/getpatient/'.$patients[$patient['id']]->appointid) }}" class="openPopup">
                <i class="fa fa-user" aria-hidden="true"></i>
                </a>
                <span class="color-pick" style="display:inline;">
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
@endif
@endforeach
||&&||
<?php $patientFourthSection = (!empty($existingPat->fourth)?json_decode($existingPat->fourth,true):[]);
    ?>
@foreach($patientFourthSection as $patient)
@if(isset($patients[$patient['id']]))
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
@endif
@endforeach
||&&||              
<?php $patientFifthSection = (!empty($existingPat->fifth)?json_decode($existingPat->fifth,true):[]);
    ?>
@foreach($patientFifthSection as $patient)
@if(isset($patients[$patient['id']]))
<li class="indivisual_patient doc-{{ $patients[$patient['id']]->docId }}" color="{{ $patient['color'] }}" app-id="{{ $patients[$patient['id']]->appointid }}" updated-by="{{ $patient['updated_by'] }}" update-date="{{ $patient['update_date'] }}" patient-id="{{ $patient['id'] }}">
    <div class="job-block" id="patient-{{ $patient['id'] }}" style="@php echo 'background-color:'.$patient['color'] @endphp">
        <div class="job-name-block">
            <div class="job-name">{{ $patients[$patient['id']]->surname.' '.$patients[$patient['id']]->name.' : '.$patients[$patient['id']]->dob}}</div>
            <div class="job-edit">
                <a href="javascript:void(0);" data-href="{{ url('admin/getpatient/'.$patients[$patient['id']]->appointid) }}" class="openPopup">
                <i class="fa fa-user" aria-hidden="true"></i>
                </a>
                <span class="color-pick" >
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
@endif
@endforeach