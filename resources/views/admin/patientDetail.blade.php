<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title">{{ __('patient.Detail') }}</h4>
</div>
@php setlocale(LC_TIME, 'it_IT'); @endphp
<div class="modal-body">
	<div class="row">
		<div id="success-message"></div>
		<div class="col-lg-8">
			<input type="hidden" id="patientID" value="{{ $appointment->id }}">
			<div class="row">
				<div class="col-lg-6">
					{{ __('patient.Surname') }} : {{ (!empty($appointment->surname)?$appointment->surname:'NA') }}
				</div>
				<div class="col-lg-6">
					{{ __('patient.Name') }} : {{ (!empty($appointment->surname)?$appointment->surname:'NA') }}
				</div>
				
			</div>
			<div class="row">
				<div class="col-lg-10">
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
				<div class="col-lg-10">
					{{ __('patient.Doctor Name') }} : {{ (!empty($appointment->surname)?$appointment->surname:'') }} {{ (!empty($appointment->doctorname)?$appointment->doctorname:'NA') }}
				</div>
			</div>
			<div class="row">
				
				<div class="col-lg-10">
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
		</div>
		<div class="col-lg-2">
			<div><a class="btn btn-default" id="patient-new-visit" href="javascript:void(0);">{{ __('patient.New Visit') }}</a></div>
			<div><a class="btn btn-default" id="patient-new-surgery" href="javascript:void(0);">{{ __('patient.New intervention') }}</a></div>
			<div><a class="btn btn-default" target="_blank" href="{{ url('admin/modifica-paziente/'.$appointment->id) }}">{{ __('patient.Patient Info') }}</a></div>
		</div>
	</div>
	<div class="row">
		<ul class="nav nav-tabs">
		    <li class="active"><a data-toggle="tab" href="#comment">{{ __('patient.Comment') }}</a></li>
		    <li><a data-toggle="tab" href="#history">{{ __('patient.History') }}</a></li>
		    <li><a data-toggle="tab" href="#medicine">{{ __('patient.Medicine') }}</a></li>
		</ul>
		<div class="tab-content">
			<div id="comment" class="tab-pane fade in active">
				<div class="actionBox">
				    <ul id="comments" class="commentList">
				      	@foreach($comments as  $comment)
				      		<li><div class="commentText"><p class="">{{$comment->comment}}</p> <span class="date sub-text">{{ $comment->commentname }}  {{ strftime('%d %B %Y %I:%M', strtotime($comment->created_at)) }}</span></div></li>
				      	@endforeach
				    </ul>
				</div>
		      <div class="col-lg-12" style="margin-top: 10px;">
		      	<textarea maxlength="100" id="user-comment" rows="3" cols="80"></textarea>
		      	<input type="hidden" id="selected-appointment-id" value="{{ $appointment->appointid }}">
		      	<button type="button" class="btn btn-default" id="submit-comment">{{ __('patient.Save') }}</button>
		      </div>
		    </div>
		    <div id="history" class="tab-pane fade">
		      	<div class="actionBox">
				    <ul id="pat-history" class="commentList">
				      	@foreach($patientshistory as  $pathis)
				      		<li><div class="commentText"><p class="">
				      			@php
				      			echo $pathis->message;

				      			@endphp
				      			</p><span class="date sub-text"> {{ strftime('%d %B %Y %I:%M', strtotime($pathis->created_at)) }}</span></div></li>
				      	@endforeach
				    </ul>
				</div>
		    </div>
		    <div id="medicine" class="tab-pane fade" style="margin-top: 20px;margin-left: 10px;">
		    	<div id="success-medicine"></div>
		    	@php $medicinesData = isset($medicines->medicine)?json_decode($medicines->medicine,true):[]; @endphp
		    	<form id="medicne-form">
			    	<div id="medicine-section">
				      	<div class="medicineinfo row">
							<div class="col-lg-4 ">
								<input value="{{ isset($medicinesData[0]['name'])?$medicinesData[0]['name']:'' }}" class="form-control1" type="text" name="medicine[0][name]" placeholder="Nome della medicina">
							</div>
							<div class="col-lg-4">
								<input value="{{ isset($medicinesData[0]['dosage'])?$medicinesData[0]['dosage']:'' }}" class="form-control1" type="text" name="medicine[0][dosage]" placeholder="Dosaggio">
							</div>
							<div class="col-lg-4">
								<i title="Aggiungi medicina" id="add-medicine" class="fa fa-plus-circle" aria-hidden="true"></i>
							</div>
						</div>
						@php unset($medicinesData[0]);
						$medcounter = 1;
						@endphp
						@foreach($medicinesData as $med)
						<div class="medicineinfo row">
							<div class="col-lg-4 ">
								<input value="{{ $med['name'] }}" class="form-control1" type="text" name="medicine[{{$medcounter}}][name]" placeholder="Nome della medicina">
							</div>
							<div class="col-lg-4">
								<input value="{{ $med['dosage'] }}" class="form-control1" type="text" name="medicine[{{$medcounter}}][dosage]" placeholder="Dosaggio">
							</div>
							<div class="col-lg-4">
								<i class="remove-medicine fa fa-times" aria-hidden="true"></i>
							</div>
						</div>
						@php $medcounter++; @endphp
						@endforeach
					</div>

					{!! csrf_field() !!}
					<input type="hidden" name="app_id" value="{{ $appointment->appointid }}">
				</form>
				<button type="button" class="btn btn-default" id="submit-medicine">{{ __('patient.Save') }}</button>
		    </div>
		</div>
		<input type="hidden" id="doctor-id-selected" value="{{ $appointment->doctorid }}">
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
		$('#patient-new-visit').click(function(){
			$('#myModal').modal('hide');
			$('#newvisitModal').modal({show:true});
			$('#patient-id').val($('#patientID').val());
		});
		$('#patient-new-surgery').click(function(){
			$('#myModal').modal('hide');
			$('#newsugeryModal').modal({show:true});
			$('#surgery-pat-id').val($('#patientID').val());
			$('#surgery-doctor-id').val($('#doctor-id-selected').val());
		});
		
		$('#add-medicine').click(function(){
			var medicineCounter = $('.medicineinfo').length;
			var medicineHtml = '<div class="medicineinfo row"><div class="col-lg-4 "><input class="form-control1" type="text" name="medicine['+medicineCounter+'][name]" placeholder="Nome della medicina"></div><div class="col-lg-4"><input class="form-control1" type="text" name="medicine['+medicineCounter+'][dosage]" placeholder="Dosaggio"></div><div class="col-lg-4"><i class="remove-medicine fa fa-times" aria-hidden="true"></i></div></div>';
			if(medicineCounter < 5) {
				$('#medicine-section').append(medicineHtml);
			}
		});
		$('body').on('click','.remove-medicine', function(){
			$(this).parent().parent().remove();
		});
		$('#submit-medicine').click(function(){
			$.ajax({
		        type: "POST",
		        data: $('#medicne-form').serialize(),
		        url: base_url + '/admin/savemedicine',
		        success: function(res) {
		            if (res == 'success') {
		            	$('#success-medicine').html('<div class="alert alert-success">La medicina è stata aggiornata con successo.</div>');
		            }
		        }
		    });
		});
	});
</script>