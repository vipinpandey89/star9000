$(document).ready(function(){
	if($('#myTable').length) {
		$('#myTable').DataTable({
			"language": {
	            "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Italian.json"
	        },
			"ajax" : {
				url : base_url+'/admin/getMainPatientList',
				type: "post"
			},
			"order": [[ 1, "asc" ]],
			serverSide: true,
			"processing": true,
			"paging": true
		});
	}
	if($('#appointmentTable').length) {
		$('#appointmentTable').DataTable({
			"columnDefs": [ {
			"targets": 6,
			"orderable": false
			},
			{
			"targets": 7,
			"orderable": false
			} ],
			"language": {
	            "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Italian.json"
	        }
		});
	}
	$('#dob').datepicker({
		changeMonth: true,
		changeYear: true,
		yearRange: "-100:+0",
		maxDate:0,
		dateFormat:'yy-mm-dd'
	});
	$('#dob').keydown(function(){
		return false;
	});
	$('#add-patient-form').validate({
		rules: {
			surname: "required",
			phone: {
				maxlength:10,
				minlength:10,
				required:true
			},
			email:{
				email: true
			}
		},
		messages: {
			surname: "Per favore, inserisci il cognome.",
			phone: {
				maxlength:"Si prega di inserire il numero di telefono valido.",
				minlength:"Si prega di inserire il numero di telefono valido",
				required:"Si prega di inserire il numero di telefono valido"
			},
			email:{
				email: "Si prega di inserire un indirizzo email valido"
			},
			dob: "Si prega di inserire la data di nascita."
		}
	});
	if($('#add-relative').length) {
		var counter = $('.patinfo').length;
		$('#add-relative').click(function(){
			if($('.patinfo').length < 5) {
				var relativeHtml = '<div class="patinfo row"><div class="col-lg-3 " ><input class="form-control1" type="text" name="relative['+counter+'][fullname]" placeholder="Nome e cognome"></div><div class="col-lg-3" ><input class="form-control1" type="text" name="relative['+counter+'][relation]" placeholder="Grado di parentela"></div><div class="col-lg-3" ><input class="form-control1" type="number" name="relative['+counter+'][contactno]" placeholder="Numero di contatto"></div><div class="col-lg-3" ><div class="col-lg-3" ><input type="radio" value="'+counter+'" name="relative[prefer]"/></div><div class="col-lg-3" ><i class="remove-relative fa fa-times" aria-hidden="true"></i></div></div></div>';
				$('#relative-section').append(relativeHtml);
				counter++;
			}
		});
		$( "body" ).on( "click", ".remove-relative", function() {
			$(this).parent().parent().remove();
		});
	}

	if($('#privacy-button').length) {
		$('#privacy-button').on('click', function(e){
		  	$('#myModal').modal('show');
		});
		$('#disagree-button').on('click', function(e){
		  $('#myModal').modal('hide');
		});
		$('#agree-button').on('click', function(e){
			$('#myModal').modal('hide');
		  	$.ajax({
				type:"POST",
				data:$('#privacy-form').serialize(),
				url: base_url+'/admin/saveprivacy',
				success: function(response){
					if(response == 'success'){
						$('#succ-mssg').html('<div class="alert alert-success">Successo</div>');
						 setTimeout(function(){ $('#succ-mssg').html(''); }, 3000);
					}
				}
			});
		});

		$('#check-minor-patient').click(function(){
			if($(this).prop("checked") == true){
                $('.minor_patient').show();
            } else {
            	$('.minor_patient').hide();
            }
		});

		$('#print-privacy,#print-privacy-upper').on('click', function(){
			var newWin=window.open('','Print-Window');

  			newWin.document.open();

  			newWin.document.write('<html><body onload="window.print()">'+$('#to-print').html()+'</body></html>');

  			newWin.document.close();
		});
	}
	if($('#capture-patient-signature').length){
		$('#capture-patient-signature,#privacy-get-signature-button').on('click',function(){
			var patientSigId= $('#patientData-id-pat').val();
            var dataURL = base_url+'/admin/ottenere-la-firma-dellutente/'+patientSigId;
            $('#capture-signature-model').find('.modal-body').load(dataURL,function(){
                $('#capture-signature-model').modal({show:true});
            });
        });
	}
});
