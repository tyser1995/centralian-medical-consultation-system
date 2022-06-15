<!-- Modal -->
<form action="" method="POST" id="myForm" enctype="multipart/form-data">
    <div class="modal fade" data-keyboard="false" data-backdrop="static" id="addRowModalPatientRemarks" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">									
            <div class="modal-content">
                <div class="modal-header bg-secondary">
                    <h5 class="modal-title">
                        Patient Remarks
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">          
                    <div class="row p-3" id="data_for_edit">
                        <div class="col-md-12">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label>Stool</label>
                                    <div id="stool_uploaded">
                                        <img src="<?= base_url()?>public/uploads/stools/default_pic.png" class="img-thumbnail w-100 stoolpic" alt="">
                                    </div>
                                    <button type="button" class="btn btn-success btn-sm btn-block btnBrowseRemarks"  style="display:block;height:30px;" onclick="document.getElementById('upload_stool').click()">Browse</button>
                                    <input type='file' id="upload_stool" style="display:none">
                                    <input type="hidden" id="stool" name="picture">
                                </div>
                                <div class="col-md-6">
                                    <label>Xray</label>
                                    <div id="xray_uploaded">
                                        <img src="<?= base_url()?>public/uploads/xray/default_pic.png" class="img-thumbnail w-100 xraypic" alt="">
                                    </div>
                                    <button type="button" class="btn btn-success btn-sm btn-block btnBrowseRemarks"  style="display:block;height:30px;" onclick="document.getElementById('upload_xray').click()">Browse</button>
                                    <input type='file' id="upload_xray" style="display:none">
                                    <input type="hidden" id="xray" name="picture">
                                </div>
                            </div>
                            <div class="form-group form-group-default">
                                <label class="labelRemarks"><span class="text-danger"></span> Doctor's Remarks</label>
                                <input type="hidden" id="id3" name="id">
                                <input type="hidden" id="patient_id3" name="patient_id">
                                <textarea name="doctor_remarks" id="patient_remarks" class="form-control" cols="30" rows="10" readonly></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer no-bd">
                    <!-- <button type="button" class="btn btn-success BtnDoctorRemarks btnBrowseRemarksPatient" data-status="2"><i class="fa fa-check"></i> Update and Mark as Completed</button> -->
                    <button type="button" class="btn btn-secondary BtnPatientRemarks" data-status="1"><i class="fa fa-save"></i>  Update</button>
                </div>
            </div>
        </div>
    </div>
</form>