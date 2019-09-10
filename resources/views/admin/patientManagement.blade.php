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
	<div class="body-section">
    <div class="jobs-list-wrapper">
        <div class="jobs-list">
            <h2 class="jobs-list-heading">New Jobs</h2>
            <div class="jobs-list-body" id="new-jobs">
                <ul id="new-jobs-list">
                    <li>
                        <div class="job-block" id="new-job-test">
                            <div class="job-name-block">
                                <div class="job-name">Artiste Logo</div>
                                <div class="job-edit"><img class="edit-job-icon" src="https://image.flaticon.com/icons/svg/61/61456.svg"></div>
                            </div>
                            <div class="job-info-block">
                                <div class="job-date">14 Feb</div>
                                <div class="user-email">codepen@gmail.com</div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="jobs-list-footer"></div>
        </div>
        <div class="jobs-list">
            <h2 class="jobs-list-heading">In Progress</h2>
            <div class="jobs-list-body" id="in-progress">
                <ul id="in-progress-list">
                    <li>
                        <div class="job-block" id="in-progress-test">
                            <div class="job-name-block">
                                <div class="job-name">Corporate Logo</div>
                                <div class="job-edit"><img class="edit-job-icon" src="https://image.flaticon.com/icons/svg/61/61456.svg"></div>
                            </div>
                            <div class="job-info-block">
                                <div class="job-date">21 Apr</div>
                                <div class="user-email">test@gmail.com</div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="jobs-list-footer"></div>
        </div>
        <div class="jobs-list">
            <h2 class="jobs-list-heading">While you wait</h2>
            <div class="jobs-list-body" id="waiting">
                <ul id="waiting-jobs-list">
                    <li>
                        <div class="job-block" id="waiting-job-test">
                            <div class="job-name-block">
                                <div class="job-name">Brochure Design</div>
                                <div class="job-edit"><img class="edit-job-icon" src="https://image.flaticon.com/icons/svg/61/61456.svg"></div>
                            </div>
                            <div class="job-info-block">
                                <div class="job-date">01 Nov</div>
                                <div class="user-email">little@gmail.com</div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="jobs-list-footer"></div>
        </div>
        <div class="jobs-list">
            <h2 class="jobs-list-heading">Complete</h2>
            <div class="jobs-list-body" id="complete">
                <ul id="complete-jobs-list">
                    <li>
                        <div class="job-block" id="complete-jobs-test">
                            <div class="job-name-block">
                                <div class="job-name">Artwork Design</div>
                                <div class="job-edit"><img class="edit-job-icon" src="https://image.flaticon.com/icons/svg/61/61456.svg"></div>
                            </div>
                            <div class="job-info-block">
                                <div class="job-date">16 Mar</div>
                                <div class="user-email">flipper@test.com</div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="jobs-list-footer"></div>
        </div>
        <div class="jobs-list">
            <h2 class="jobs-list-heading">Re-work  </h2>
            <div class="jobs-list-body" id="rework">
                <ul id="rework-jobs-list">
                    <li>
                        <div class="job-block" id="rework-job-test">
                            <div class="job-name-block">
                                <div class="job-name">Business Cards</div>
                                <div class="job-edit"><img class="edit-job-icon" src="https://image.flaticon.com/icons/svg/61/61456.svg"></div>
                            </div>
                            <div class="job-info-block">
                                <div class="job-date">26 Jun</div>
                                <div class="user-email">rework@es.com</div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="jobs-list-footer"></div>
        </div>
        <div class="jobs-list">
            <h2 class="jobs-list-heading">Feedback</h2>
            <div class="jobs-list-body" id="feedback">
                <ul id="feedback-jobs-list">
                    <li>
                        <div class="job-block" id="feedback-job-test">
                            <div class="job-name-block">
                                <div class="job-name">Video Animation</div>
                                <div class="job-edit"><img class="edit-job-icon" src="https://image.flaticon.com/icons/svg/61/61456.svg"></div>
                            </div>
                            <div class="job-info-block">
                                <div class="job-date">31 Dec</div>
                                <div class="user-email">memory@feedbac.com</div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="jobs-list-footer"></div>
        </div>
    </div>
</div>
</div>
@endsection