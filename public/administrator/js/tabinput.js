$(document).ready(function(){
	$('#add-input-form').validate({
		rules: {
			title: "required",
			type: "required",
			'input_val[]': "required"
		},
		messages: {
			title: "Questo campo è obbligatorio.",
			type: "Questo campo è obbligatorio.",
			'input_val[]': "Questo campo è obbligatorio."
		}
	});
	$('#input-type').change(function(){
		switch($(this).val()) {
			case 'select':
				$('#data-section').show();
				break;
			case 'radio':
				$('#data-section').show();
				break;
			case 'checkbox':
				$('#data-section').show();
				break;
			default:
				$('#data-section').hide();
				break;
		}
	});
	var counter = $('.optionsec').length;
	$('#add-data').click(function(){
		if($('.optionsec').length < 100) {
			var relativeHtml = '<div class="optionsec row"><div class="col-lg-2" ></div><div class="col-lg-8 " ><input class="form-control1" type="text" name="input_val[]"></div> <div class="col-lg-2" ><i class="remove-data fa fa-times" aria-hidden="true"></i></div></div>';
			$('#data-section').append(relativeHtml);
			counter++;
		}
	});
	$( "body" ).on( "click", ".remove-data", function() {
		$(this).parent().parent().remove();
	});
});