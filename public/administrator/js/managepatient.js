/************************************************************************************
      Sortable functions for Drag & Drop Interface
      *************************************************************************************/
$(function() {
    $("#new-jobs-list").sortable({
        connectWith: ["#in-progress-list", "#waiting-jobs-list", "#complete-jobs-list", "#rework-jobs-list"],
        over: function(event, ui) { //triggered when sortable element hovers sortable list
            $('#new-jobs').css('background-color', 'rgba(0,0,0,.1)')
        },
        out: function(event, ui) { //event is triggered when a sortable item is moved away from a sortable list.
            $('#new-jobs').css('background-color', 'rgba(0,0,0,.0)');
        },
        remove: function(event, ui) {
            savepatient('new-jobs-list', 'first');
        },
        receive: function(event, ui) { // event is triggered when an item from a connected sortable list has been dropped into another list
            $('#new-jobs').css('background-color', 'rgba(0,0,0,.0)');
            var d = new Date($.now());
            ui.item.attr('update-date',d.getFullYear()+"-"+(d.getMonth()+1)+"-"+d.getDate()+" "+d.getHours()+":"+d.getMinutes()+":"+d.getSeconds());
            ui.item.attr('updated-by',$('#logged-in-user').val());
            savepatient(ui.item.parent().attr('id'), 'first', ui.item.attr('app-id'));
            ui.item.find('.color-pick').hide();
        }
    });
});

$(function() {
    $("#in-progress-list").sortable({
        connectWith: ["#waiting-jobs-list", "#complete-jobs-list", "#rework-jobs-list", "#new-jobs-list"],
        over: function(event, ui) { //triggered when sortable element hovers sortable list
            $('#in-progress').css('background-color', 'rgba(0,0,0,.1)');
        },
        out: function(event, ui) { //event is triggered when a sortable item is moved away from a sortable list.
            $('#in-progress').css('background-color', 'rgba(0,0,0,.0)')
        },
        remove: function(event, ui) {
            savepatient('in-progress-list', 'second');
        },
        receive: function(event, ui) { // event is triggered when an item from a connected sortable list has been dropped into another list
            $('#in-progress').css('background-color', 'rgba(0,0,0,.0)');
            var d = new Date($.now());
            ui.item.attr('update-date',d.getFullYear()+"-"+(d.getMonth()+1)+"-"+d.getDate()+" "+d.getHours()+":"+d.getMinutes()+":"+d.getSeconds());
            ui.item.attr('updated-by',$('#logged-in-user').val());
            savepatient(ui.item.parent().attr('id'), 'second', ui.item.attr('app-id'));
            ui.item.find('.color-pick').hide();
        },
        revert: 100
    });
});

$(function() {
    $("#waiting-jobs-list").sortable({
        connectWith: ["#in-progress-list", "#complete-jobs-list", "#rework-jobs-list", "#new-jobs-list"],
        over: function(event, ui) { //triggered when sortable element hovers sortable list
            $('#waiting').css('background-color', 'rgba(0,0,0,.1)')
        },
        out: function(event, ui) { //event is triggered when a sortable item is moved away from a sortable list.
            $('#waiting').css('background-color', 'rgba(0,0,0,.0)')
        },
        remove: function(event, ui) {
            savepatient('waiting-jobs-list', 'third');
        },
        receive: function(event, ui) { // event is triggered when an item from a connected sortable list has been dropped into another list
            $('#waiting').css('background-color', 'rgba(0,0,0,.0)');
            var d = new Date($.now());
            ui.item.attr('update-date',d.getFullYear()+"-"+(d.getMonth()+1)+"-"+d.getDate()+" "+d.getHours()+":"+d.getMinutes()+":"+d.getSeconds());
            ui.item.attr('updated-by',$('#logged-in-user').val());
            savepatient(ui.item.parent().attr('id'), 'third',ui.item.attr('app-id'));
            ui.item.find('.color-pick').show();
        },
        revert: 100
    });
});

$(function() {
    $("#complete-jobs-list").sortable({
        connectWith: ["#in-progress-list", "#waiting-jobs-list", "#rework-jobs-list", "#new-jobs-list"],
        over: function(event, ui) { //triggered when sortable element hovers sortable list
            $('#complete').css('background-color', 'rgba(0,0,0,.1)')
        },
        out: function(event, ui) { //event is triggered when a sortable item is moved away from a sortable list.
            $('#complete').css('background-color', 'rgba(0,0,0,.0)')
        },
        remove: function(event, ui) {
            savepatient('complete-jobs-list', 'fourth');
        },
        receive: function(event, ui) { // event is triggered when an item from a connected sortable list has been dropped into another list
            $('#complete').css('background-color', 'rgba(0,0,0,.0)');
            var status = 'Complete';
            var orderId = ui.item["0"].firstChild.id;
            var d = new Date($.now());
            ui.item.attr('update-date',d.getFullYear()+"-"+(d.getMonth()+1)+"-"+d.getDate()+" "+d.getHours()+":"+d.getMinutes()+":"+d.getSeconds());
            ui.item.attr('updated-by',$('#logged-in-user').val());
            savepatient(ui.item.parent().attr('id'), 'fourth',ui.item.attr('app-id'));
            ui.item.find('.color-pick').hide();
        },
        revert: 100
    });
});

$(function() {
    $("#rework-jobs-list").sortable({
        connectWith: ["#in-progress-list", "#waiting-jobs-list", "#complete-jobs-list", "#new-jobs-list"],
        over: function(event, ui) { //triggered when sortable element hovers sortable list
            $('#rework').css('background-color', 'rgba(0,0,0,.1)')
        },
        out: function(event, ui) { //event is triggered when a sortable item is moved away from a sortable list.
            $('#rework').css('background-color', 'rgba(0,0,0,.0)')
        },
        remove: function(event, ui) {
            savepatient('rework-jobs-list', 'fifth');
        },
        receive: function(event, ui) { // event is triggered when an item from a connected sortable list has been dropped into another list
            $('#rework').css('background-color', 'rgba(0,0,0,.0)');
            var d = new Date($.now());
            ui.item.attr('update-date',d.getFullYear()+"-"+(d.getMonth()+1)+"-"+d.getDate()+" "+d.getHours()+":"+d.getMinutes()+":"+d.getSeconds());
            ui.item.attr('updated-by',$('#logged-in-user').val());
            savepatient(ui.item.parent().attr('id'), 'fifth',ui.item.attr('app-id'));
            ui.item.find('.color-pick').hide();
        },
        revert: 100,
    });

    $('#waiting-jobs-list').find('.color-pick').show();
    
    $(".select-color").colorpicker({hideButton: true});
    $('.color-pick').click(function(evt){
        evt.stopImmediatePropagation();
        $(this).find('.select-color').colorpicker("showPalette");
    });
    $(".select-color").on("change.color", function(event, color){
        $(this).parent().parent().parent().parent().parent().css('background-color',color);
        $(this).parent().parent().parent().parent().parent().parent().attr('color',color);
        savepatient('waiting-jobs-list', 'third');
    });

    $('#newSurgeryForm').validate({
        rules: {
            surgery_date:"required",
            surgery_name: "required",
            surgery_type: "required"
        },
        messages: {
            surgery_name: "Il campo è obbligatorio.",
            surgery_date:"Il campo è obbligatorio.",
            surgery_type: "Il campo è obbligatorio."
        }
    });
    $('#savesurgerybutton').click(function(){
        if($('#newSurgeryForm').valid()){
            $.ajax({
                type: "GET",
                data: $('#newSurgeryForm').serialize(),
                url: base_url + '/admin/saveintervento',
                success: function(response) {
                    if (response == 'success') {
                        $('#newsugeryModal').modal('hide');
                        $('#myModal').modal({show:true});
                        $('#success-message').html('<div class="alert alert-success">La nuova chirurgia è stata creata con successo.</div>');
                    }
                }
            });
        } else {
            $('#newSurgeryForm').submit();
        }
    });

    
});

function savepatient(divid, sectiontype, appid=null) {
    var patArray = [];
    $('#'+divid).find('.indivisual_patient').each(function(){
        patArray.push({
            id: $(this).attr('patient-id'),
            updated_by: $(this).attr('updated-by'),
            update_date: $(this).attr('update-date'),
            color: $(this).attr('color')
        });
    });
    $.ajax({
        type: "GET",
        data: {
            'section_type': sectiontype,
            'patients':patArray,
            'appid':appid
        },
        url: base_url + '/admin/dailypatientupdate',
        success: function(response) {
            if (response == 'success') {
            }
        }
    });
}