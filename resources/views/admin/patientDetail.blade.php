<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title">{{ __('patient.Detail') }}</h4>
</div>
<div class="modal-body">
	<div class="row">
		<div class="col-lg-4">
			{{ __('patient.Surname') }} : {{ (!empty($appointment->surname)?$appointment->surname:'NA') }}
		</div>
		<div class="col-lg-4">
			{{ __('patient.Name') }} : {{ (!empty($appointment->surname)?$appointment->surname:'NA') }}
		</div>
		<div class="col-lg-4">
			{{ __('patient.Date of Birth') }} : {{ (!empty($appointment->dob)?$appointment->dob:'NA') }}
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6">
			{{ __('patient.Email') }} : {{ (!empty($appointment->email)?$appointment->email:'NA') }}
		</div>
		<div class="col-lg-6">
			{{ __('patient.Phone') }} : {{ (!empty($appointment->phone)?$appointment->phone:'NA') }}
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6">
			{{ __('patient.Doctor Name') }} : {{ (!empty($appointment->doctorname)?$appointment->doctorname:'NA') }}
		</div>
		<div class="col-lg-6">
			{{ __('patient.Doctor Email') }} : {{ (!empty($appointment->doctoremail)?$appointment->doctoremail:'NA') }}
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6">
			{{ __('patient.Examination') }} : {{ (!empty($appointment->examtitle)?$appointment->examtitle:'NA') }}
		</div>
		<div class="col-lg-6">
			{{ __('patient.Room') }} : {{ (!empty($appointment->room_name)?$appointment->room_name:'NA') }}
		</div>
	</div>
	<div class="row">
		<ul class="nav nav-tabs">
		    <li class="active"><a data-toggle="tab" href="#comment">{{ __('patient.Comment') }}</a></li>
		    <li><a data-toggle="tab" href="#history">{{ __('patient.History') }}</a></li>
		</ul>
		<div class="tab-content">
			<div id="comment" class="tab-pane fade in active">
				<div class="actionBox">
				    <ul id="comments" class="commentList">
				      	@foreach($comments as  $comment)
				      		<li><div class="commentText"><p class="">{{$comment->comment}}</p> <span class="date sub-text">{{ $comment->commentname }} on {{ date('F jS, Y H:i:s', strtotime($comment->created_at)) }}</span></div></li>
				      	@endforeach
				    </ul>
				</div>
		      <div class="col-lg-12" style="margin-top: 10px;">
		      	<textarea maxlength="100" id="user-comment" rows="3" cols="60"></textarea>
		      	<input type="hidden" id="selected-appointment-id" value="{{ $appointment->appointid }}">
		      	<button type="button" class="btn btn-default" id="submit-comment">{{ __('patient.Submit') }}</button>
		      </div>
		    </div>
		    <div id="history" class="tab-pane fade">
		      	<div class="actionBox">
				    <ul id="pat-history" class="commentList">
				      	@foreach($patientshistory as  $pathis)
				      		<li><div class="commentText"><p class="">
				      			@php
				      			echo $pathis->message
				      			@endphp
				      			</p><span class="date sub-text"> on {{ date('F jS, Y H:i:s', strtotime($pathis->created_at)) }}</span></div></li>
				      	@endforeach
				    </ul>
				</div>
		    </div>
		</div>
	</div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('patient.Cancel') }}</button>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#submit-comment').click(function(){
			if($('#user-comment').val() != '') {
				var commentText=$('#user-comment').val();
				$.ajax({
			        type: "GET",
			        data: {
			            'comment': commentText,
			            'appid': $('#selected-appointment-id').val()
			        },
			        url: base_url + '/admin/savecomment',
			        success: function(commentTime) {
			            if (commentTime) {
			            	$('#comments').append('<li><div class="commentText"><p class="">'+commentText+'</p> <span class="date sub-text">'+commentTime+'</span></div></li>');
			            	$('#user-comment').val('');

			            }
			        }
			    });
			}
		});
	});
</script>