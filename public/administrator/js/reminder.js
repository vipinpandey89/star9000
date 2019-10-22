$(document).ready(function(){
	var mainUserId = $('#main-content-userid').val();
	$.ajax({
		type:"GET",
		data:{'userid':mainUserId},
		dataType:'json',
		url: base_url+'/admin/getreminder',
		success: function(response){
			remindme(response);
		}
	});
});
function remindme(reminders) {
	$.each(reminders, function(i, item) {
	    setTimeout(function(){ 
	    $.confirm({
			title: 'Promemoria : '+reminders[i].actime,
			content: reminders[i].description,
			buttons: {
				Ok: function () {
					$.ajax({
						type:"GET",
						data:{'id':reminders[i].id},
						url: base_url+'/admin/updatereminder',
						success: function(res){
							
						}
					});
				}
			}
		});
		}, reminders[i].time*1000);
	});
	
}