<form method="post" id="capture-patient-signature-form" class="form-horizontal">
    <div id="signature-message"></div>
    <div class="row">
        <input type="hidden" id="patient-signature-image" name="patient_signature"/>
        <input type="hidden" id="patient-option1" value="1"/>
        <input type="hidden" id="patient-option2" value="1"/>
        <input type="hidden" id="patient-option3" value="1"/>
        <div class="col-lg-8">
            <div class="form-group">
                <div id="imageBox" class="form-control1" style="margin-left: 10px;height: 180px;"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <input class="btn btn-default" type="button" id="btnStartStopWizard" value="Inizia il processo" onClick="wizardEventController.start_stop(4)" title="Inizia il processo"/>
        </div>
        <div class="col-lg-6">
            <input class="btn btn-default" type="button" id="save-button-signature" value="Salva" title="Salva"/>
        </div>
    </div>
</form>
<div style="display:none;">
    <h3>Options</h3>
    <input type="checkbox" id="chkDisplayWizard" checked="checked"/>Display Wizard Control Window
    <input type="checkbox" id="chkLargeCheckbox"/>Large size checkbox
    <input type="checkbox" id="chkSigText"/>Output sigtext to browser text window <br/><br/>Button options: 
    <p style="margin-left: 40px">
        <input type="radio" name="buttontype" id="standard" value="standard" checked="checked">Use standard buttons<br/>
        <input type="radio" name="buttontype" id="utf8" value="utf8"/>Display UTF-8 text (e.g. for languages using logograms)<br/>
        <input type="radio" name="buttontype" id="local" value="local">Use local images<br/>
        <input type="radio" name="buttontype" id="remote" value="remote"/>Use remote (URL) images
        <br/>
    </p>
    <textarea cols="125" rows="15" id="txtDisplay"></textarea>
</div>
<script type="text/javascript">
$(document).ready(function(){
  $('#save-button-signature').click(function(){
    $('#signature-message').html('');
    if($('#patient-signature-image').val() != '') {
      var pat_signature = $('#patient-signature-image').val();
      var pat_option1 = $('#patient-option1').val();
      var pat_option2 = $('#patient-option2').val();
      var pat_option3 = $('#patient-option3').val();
      var optionVal= pat_option1+'|'+pat_option2+'|'+pat_option3;
      $.ajax({
        type:"POST",
        url:"{{url('admin/ottenere-la-firma-dellutente/'.$patData->id )}}",
        data:{signature:pat_signature,optionVal:optionVal,"_token": "{{ csrf_token() }}",},
        success: function(response){
          if(response=='success')
          {
            $('#patient-signature-image').val('');
            $('#imageBox').find('img').remove();
            $('#signature-message').html('<div class="alert alert-success">La firma del paziente è stata salvata correttamente.');
            setTimeout(function(){ location.reload();  }, 3000);
            
          }
        }
      });
    }else{
      $('#signature-message').html('<div class="alert alert-danger">Si prega di prendere la firma del paziente.</div>');
    }
  });
});
</script>
