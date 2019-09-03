$(document).ready(function(){
	if($('#myTable').length) {
		$('#myTable').DataTable({
			"columnDefs": [ {
			"targets": 7,
			"orderable": false
			} ]
		});
	}
	if($('#appointmentTable').length) {
		$('#appointmentTable').DataTable({
			"columnDefs": [ {
			"targets": 6,
			"orderable": false
			} ]
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
				minlength:10
			},
			email:{
				email: true
			},
			dob: "required"
		},
		messages: {
			surname: "Per favore, inserisci il cognome.",
			phone: {
				maxlength:"Si prega di inserire il numero di telefono valido.",
				minlength:"Si prega di inserire il numero di telefono valido"
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
				var relativeHtml = '<div class="patinfo row"><div class="col-lg-3 " ><input class="form-control1" type="text" name="relative['+counter+'][fullname]" placeholder="Nome e cognome"></div><div class="col-lg-3" ><input class="form-control1" type="text" name="relative['+counter+'][relation]" placeholder="Relazione"></div><div class="col-lg-3" ><input class="form-control1" type="number" name="relative['+counter+'][contactno]" placeholder="Numero di contatto"></div> <div class="col-lg-3" ><i class="remove-relative fa fa-times" aria-hidden="true"></i></div></div>';
				$('#relative-section').append(relativeHtml);
				counter++;
			}
		});
		$( "body" ).on( "click", ".remove-relative", function() {
			$(this).parent().parent().remove();
		});
	}
});
