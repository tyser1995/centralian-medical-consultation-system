<!-- Modal -->
<style>
    .emoji-icon {
        width: 40%;
        height: 20%;
    }
</style>
<form action="" method="POST" id="myForm">
    <div class="modal fade" data-keyboard="false" data-backdrop="static" id="addRowModal" tabindex="-1" role="dialog"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-secondary">
                    <h5 class="modal-title">
                        <span class="fw-mediumbold">
                            New</span>
                        <span class="fw-light">
                            Row
                        </span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row  appointment-details-container" id="data_for_edit">
                        <div class="col-md-12 mb-3"><span class="bg-secondary btn-block text-white">Appointment
                                Details</span></div>
                        <div class="col-md-4">
                            <div class="form-group form-group-default">
                                <label><span class="text-danger">*</span> Service</label>
                                <select name="id_service" id="id_service" class="form-control">
                                    <option value="">Select</option>
                                    <?php foreach($services as $row): ?>
                                    <option value="<?= $row->id ?>"><?= $row->service ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group form-group-default">
                                <label><span class="text-danger">*</span> Date</label>
                                <input type="date" name="appnt_date" id="appnt_date" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group form-group-default">
                                <label><span class="text-danger">*</span> Time</label>
                                <input type="time" name="appnt_time" id="appnt_time" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label><span class="text-danger">*</span> Remarks</label>
                                <textarea name="description" id="description" class="form-control" cols="30"
                                    rows="5"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row  illness-container">
                        <div class="col-md-12"><span class="bg-secondary btn-block text-white">Symptoms for the last 24
                                hours *</span></div>

                        <?php foreach($illnesses as $row): ?>
                        <div class="col-md-6 mt-3">
                            <div class="checkbox" title="<?= $row->description ?>"><label><input type="checkbox"
                                        title="<?= $row->description ?>" name="<?= $row->illness ?>"
                                        value="<?= $row->illness ?>"> <?= $row->illness ?></label></div>
                        </div>
                        <?php endforeach; ?>
                        <div class="col-md-12 mt-3">
                            <div class="form-group form-group-default">
                                <label><span class="text-danger">*</span> Other/s</label>
                                <textarea name="other_illness" id="other_illness" class="form-control" cols="30"
                                    rows="2" placeholder="How do you feel today?"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <hr>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox"><label><input type="checkbox" name="travel_history"
                                        value="travel_history"> Travel history for the last 14days outside of Iloilo
                                    Province</label></div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox"><label><input type="checkbox" name="exposure_to_covid"
                                        value="exposure_to_covid"> Exposure to suspected or confirmed COVID positive
                                    person (primary contact)</label></div>
                        </div>
                        <div class="col-md-12">
                            <div class="checkbox"><label><input type="checkbox" name="contact_to_person"
                                        value="contact_to_person"> Contact to person with COVID exposure (secondary
                                    contact)</label></div>
                        </div>
                    </div>

                    <div class="row mt-3 illness-container">
                        <div class="col-md-12"><span class="bg-secondary btn-block text-white">How do you feel today?
                                *</span></div>

                        <div class="col-md-3 mt-3">
                            <!-- <img src="<?= base_url() ?>public/assets/img/emojiiiiiiii.png" style="width:100%" alt=""> -->
                        </div>
                        <div class="col-md-3 mt-3">
                            <img src="<?= base_url() ?>public/assets/img/1.png" alt="" class="emoji-icon">
                              <input type="radio" id="1" name="feeling_today" value="1">
                              <label for="html">1</label><br>
                            <img src="<?= base_url() ?>public/assets/img/2.png" alt="" class="emoji-icon">
                              <input type="radio" id="2" name="feeling_today" value="2">
                              <label for="css">2</label><br>
                            <img src="<?= base_url() ?>public/assets/img/3.png" alt="" class="emoji-icon">
                              <input type="radio" id="3" name="feeling_today" value="3">
                              <label for="javascript">3</label><br>
                            <img src="<?= base_url() ?>public/assets/img/4.png" alt="" class="emoji-icon">
                              <input type="radio" id="4" name="feeling_today" value="4">
                              <label for="javascript">4</label><br>
                            <img src="<?= base_url() ?>public/assets/img/5.png" alt="" class="emoji-icon">
                              <input type="radio" id="5" name="feeling_today" value="5">
                              <label for="javascript">5</label>
                        </div>
                        <div class="col-md-3 mt-3">
                            <img src="<?= base_url() ?>public/assets/img/6.png" alt="" class="emoji-icon">
                              <input type="radio" id="6" name="feeling_today" value="6">
                              <label for="javascript">6</label><br>
                            <img src="<?= base_url() ?>public/assets/img/7.png" alt="" class="emoji-icon">
                              <input type="radio" id="7" name="feeling_today" value="7">
                              <label for="javascript">7</label><br>
                            <img src="<?= base_url() ?>public/assets/img/8.png" alt="" class="emoji-icon">
                              <input type="radio" id="8" name="feeling_today" value="8">
                              <label for="javascript">8</label><br>
                            <img src="<?= base_url() ?>public/assets/img/9.png" alt="" class="emoji-icon">
                              <input type="radio" id="9" name="feeling_today" value="9">
                              <label for="javascript">9</label><br>
                            <img src="<?= base_url() ?>public/assets/img/10.png" alt="" class="emoji-icon">
                              <input type="radio" id="10" name="feeling_today" value="10">
                              <label for="javascript">10</label>
                        </div>
                    </div>

                    <div class="row  assign-doctor-container" hidden>
                        <div class="col-md-12"><span class="bg-secondary btn-block text-white">Assign Doctor</span>
                        </div>
                        <div class="col-md-12 mb-3"></div>
                        <div class="col-md-12">
                            <label><span class="text-danger">*</span> Select Doctor</label>
                            <input type="hidden" name="status" value="1">
                            <input type="hidden" name="id" id="edit_id" value="1">
                            <input type="hidden" name="transaction" id="transaction" value="assign-doctor">
                            <input type="hidden" name="patient_id" id="not_patient_id">
                            <input type="hidden" name="not_appnt_date" id="not_appnt_date">
                            <input type="hidden" name="not_appnt_time" id="not_appnt_time">
                            <select name="doctor_id" id="doctor_id" class="form-control" required>
                                <option value="">Select</option>
                                <?php foreach($doctors as $row): ?>
                                <option value="<?= $row->id ?>"><?= $row->name ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="row  patient-details-container" hidden>
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label>Travel history for the last 14days outside of Iloilo Province</label>
                                <input type="text" id="travel_history_forview" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label>Exposure to suspected or confirmed COVID positive person (primary
                                    contact)</label>
                                <input type="text" id="exposure_to_covid_forview" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label>Contact to person with COVID exposure (secondary contact)</label>
                                <input type="text" id="contact_to_person_forview" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label>How do you feel today? *</label>
                                <input type="text" id="feeling_today_forview" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="col-md-12 mt-2"><span class="bg-secondary btn-block text-white">Patient
                                Details</span></div>
                        <div class="col-md-12 mb-3"></div>
                        <div class="col-sm-4">
                            <div class="form-group form-group-default">
                                <label><span class="text-danger">*</span> Patient Name</label>
                                <input type="text" name="patient_name" id="patient_name" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group form-group-default">
                                <label><span class="text-danger">*</span> Contact Details</label>
                                <input type="text" name="contact" id="contact" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group form-group-default">
                                <label><span class="text-danger">*</span> Address</label>
                                <input type="text" name="address" id="address" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label><span class="text-danger">*</span> Illnesses</label>
                                <textarea id="illness" cols="30" rows="2" class="form-control" disabled></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row  assigned-doctor-container" id="data_for_edit">
                        <div class="col-md-12 mb-3"><span class="bg-secondary btn-block text-white">Assigned
                                Doctor</span></div>
                        <div class="col-sm-6">
                            <div class="form-group form-group-default">
                                <label><span class="text-danger">*</span> Doctor</label>
                                <input type="text" name="doctor_forview" id="doctor_forview" class="form-control"
                                    disabled>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group form-group-default">
                                <label><span class="text-danger">*</span> Specialization</label>
                                <input type="text" name="specialization_forview" id="specialization_forview"
                                    class="form-control" disabled>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label><span class="text-danger">*</span> Doctor Remarks</label>
                                <textarea name="doctor_remarks_forview" id="doctor_remarks_forview" class="form-control"
                                    cols="30" rows="5" disabled></textarea>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label>Stool</label>
                            <div id="">
                                <img src="<?= base_url()?>public/uploads/stools/default_pic.png"
                                    class="img-thumbnail w-100 stoolpic" alt="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Xray</label>
                            <div id="">
                                <img src="<?= base_url()?>public/uploads/xray/default_pic.png"
                                    class="img-thumbnail w-100 xraypic" alt="">
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer no-bd">
                    <button type="submit" id="btnUpdate" class="btn btn-secondary" hidden><i class="fa fa-save"></i>
                        Update</button>
                    <button type="button" id="btnssave" class="btn btn-secondary"><i class="fa fa-save"></i>
                        Save</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</form>