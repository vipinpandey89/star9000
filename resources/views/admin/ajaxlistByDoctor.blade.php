@if(!$doctorData->isEmpty())
    @foreach($doctorData as $docD)
    <div class="jobs-list">
        <h2 class="jobs-list-heading">{{ $docD->surname.' '.$docD->name }}</h2>
        <div class="jobs-list-body" id="new-jobs">
            <ul id="new-jobs-list">
                @foreach($patientsTodayData[$docD->id] as $patient)
                <li class="indivisual_patient" >
                    <div class="job-block" style="border-right: solid 5px {{ $patient['color'] }};background-color: white">
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
@endif