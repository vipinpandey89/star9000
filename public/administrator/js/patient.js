$(document).ready(function(){
	if($('#myTable').length) {
		$('#myTable').DataTable({
			paging: false,
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
			name: "required",
			phone: {
				maxlength:10,
				minlength:10
			},
			email:{
				email: true
			}
		},
		messages: {
			name: "Inserisci il nome del paziente.",
			phone: {
				maxlength:"Si prega di inserire il numero di telefono valido.",
				minlength:"Si prega di inserire il numero di telefono valido"
			},
			email:{
				email: "Si prega di inserire un indirizzo email valido"
			}
		}
	});
});
