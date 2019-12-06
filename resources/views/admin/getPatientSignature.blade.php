 <form method="post" id="capture-patient-signature-form" class="form-horizontal">
      <div class="row">
        <input type="hidden" id="patient-signature-image" name="patient_signature"/>
        <input type="hidden" value="{{ $patData->id }}" name="pat_id"/>
        <div class="col-lg-8">
          <div class="form-group">
          <div id="imageBox" class="form-control1" style="margin-left: 10px;height: 150px;"></div>
          </div>
        </div>
        <div class="col-lg-6">
          <input class="btn btn-default" type="button" id="btnStartStopWizard" value="Inizia il processo" onClick="wizardEventController.start_stop(4)" title="Inizia il processo"/>
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