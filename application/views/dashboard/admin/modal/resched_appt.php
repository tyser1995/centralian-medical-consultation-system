<!-- Modal -->
<form action="<?php echo base_url()?>appointments/resched_appt" method="POST" enctype="multipart/form-data">
    <div class="modal fade" data-keyboard="false" data-backdrop="static" id="myForm_resched_appt" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">									
            <div class="modal-content">
                <div class="modal-header bg-secondary">
                    <h5 class="modal-title">
                        Appointment Reschedule
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">          
                    <div class="row p-3" id="data_for_edit">
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label><span class="text-danger">*</span> Add Remarks</label>
                                <input type="hidden" id="resched_appt_id" name="id">
                                <input type="hidden" id="resched_appt_patient_id" name="patient_id">
                                <input type="date" name="appnt_date" id="resched_appt_appnt_date" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label><span class="text-danger">*</span> Add Remarks</label>
                                <input type="time" name="appnt_time" id="resched_appt_appnt_time" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer no-bd">
                    <button type="submit" class="btn btn-secondary" data-status="1"><i class="fa fa-save"></i>  Reschedule</button>
                </div>
            </div>
        </div>
    </div>
</form>