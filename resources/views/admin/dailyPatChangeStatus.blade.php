<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title">Cambiare stato</h4>
</div>
<div class="modal-body">
	<div class="row">
		<div id="success-message"></div>
		<div class="col-lg-10">
			<div class="row">
				<div class="col-lg-6">
					Stato attuale : <span id="paz-{{$patId}}" style="border: none;" class="form-control">{{ $currentStatus }}</span>
				</div>
				<div class="col-lg-6">
					Cambia stato in : 
					<select class="form-control1" id="new-status">
						<option value="">Selezionare</option>
						<option value="first">Pazienti del giorno</option>
						<option value="second">Check In</option>
						<option value="third">Chirurgia</option>
						<option value="fourth">Esami</option>
						<option value="fifth">Check Out</option>
					</select>
				</div>
				
			</div>
		</div>
	</div>
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-default" id="submit-status">Salva</button>
    <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('patient.Cancel') }}</button>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		var patId = '<?php echo $patId ?>';
		$('#submit-status').click(function(){
			var changeSta=$('#new-status').val();
			if(changeSta != ''){
				$('#success-message').html('');
				$.ajax({
			        type: "POST",
			        data:{section:changeSta,"_token": "{{ csrf_token() }}"},
			        url: base_url + '/admin/dailyPatChangeStatus/'+patId,
			        success: function(res) {
			            var dataRes = res.split("|");
			            $('#patient-'+dataRes[0]).html(dataRes[1]);
			            $('#paz-'+dataRes[0]).html(dataRes[1]);
			            $('#success-message').html('<div class="alert alert-success">Aggiornato con successo..</div>');
			        }
			    });
			}else{
				$('#success-message').html('<div class="alert alert-danger">Seleziona lo stato.</div>');
			}
		});
	});
</script>