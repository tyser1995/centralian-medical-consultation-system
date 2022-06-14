<!-- Modal -->
<form action="<?php echo base_url()?>appointments/add_invitation_link" method="POST" enctype="multipart/form-data">
    <div class="modal fade" data-keyboard="false" data-backdrop="static" id="myForm_add_invitation_link" tabindex="-1"
        role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-secondary">
                    <h5 class="modal-title">
                        Appointment Videotelephony
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row p-3" id="data_for_edit">
                        <input type="hidden" id="add_invitation_link_appt_id" name="id">
                        <input type="hidden" id="add_invitation_link_patient_id" name="patient_id">
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label><span class="text-danger">*</span> Add Invitation Link</label>
                                <input type="text" name="message" id="add_invitation_link_invitation_link" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer no-bd">
                    <button type="submit" class="btn btn-secondary" data-status="1"><i class="fa fa-save"></i>
                        Save</button>
                </div>
            </div>
        </div>
    </div>
</form>