$(document).ready(function(){
	if($('#myTable').length) {
		$('#myTable').DataTable({
			"columnDefs": [ {
			"targets": 6,
			"orderable": false
			} ],
			"language": {
	            "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Italian.json"
	        }
		});
	}
	if($('#sugery-duration').length) {
		$('#sugery-duration').durationpicker({showDays: false,allowZeroTime: false});
		$('#edit-surgery-form').validate({
			rules: {
				surgery_name: "required",
				surgery_date: "required",
				surgery_type: "required"
			},
			messages: {
				surgery_name: "Questo campo è obbligatorio.",
				surgery_date: "Questo campo è obbligatorio.",
				surgery_type: "Questo campo è obbligatorio."
			}
		});
	}
	$('#sugery-date').datepicker({
        minDate:1,
        dateFormat: 'yy-mm-dd',
        beforeShowDay: $.datepicker.noWeekends
    });
    $('#surgery-type').change(function() {
        var surgryType = $(this).val();
        if(surgryType == 1) {
            $('#ambulatoriale-section').show();
            $('#day-surgery-section').hide();
        } else if(surgryType == 2){
        	$('#ambulatoriale-section').hide();
            $('#day-surgery-section').show();
        } else {
        	$('#ambulatoriale-section').hide();
            $('#day-surgery-section').hide();
        }
    });
    $('#sugery-date').keydown(function(){
    	return false;
    });
    $('#print-ambulatoriale').click(function(){
	    var newWin=window.open('','Ambulatoriale-Window');
		newWin.document.open();
		newWin.document.write('<html><body onload="window.print()">'+$('#ambulatoriale-to-print').html()+'</body></html>');
		newWin.document.close();
	});
	$('#day-surgery-ambulatoriale').click(function(){
	    var newWinSec=window.open('','Day-Surgery-Window');
		newWinSec.document.open();
		newWinSec.document.write('<html><body onload="window.print()">'+$('#day-surgery-to-print').html()+'</body></html>');
		newWinSec.document.close();
	});
	$('#day-surgery-operatorio').click(function(){
	    var newWinThird=window.open('','Day-Surgery-Window');
		newWinThird.document.open();
		newWinThird.document.write('<html><body onload="window.print()">'+$('#day-surgery-operation').html()+'</body></html>');
		newWinThird.document.close();
	});
	
});
