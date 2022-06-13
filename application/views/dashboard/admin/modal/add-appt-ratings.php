<!-- Modal -->
<form action="<?php echo base_url() ?>appointments/saveRatings" method="POST" id="myForm">
    <div class="modal fade" data-keyboard="false" data-backdrop="static" id="addRowModalRatings" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">									
            <div class="modal-content">
                <div class="modal-header bg-secondary">
                    <h5 class="modal-title">
                        Ratings
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">          
                    <div class="row p-3" id="data_for_edit">
                    <div class="col-md-12 mb-2"><span class="bg-secondary btn-block text-white">Rating Scale</span></div>
                        <input type="hidden" name="id_appointment" id="id_appt_ratings">
                        <div class="col-md-2">
                            <!-- <input type="radio" id="5" name="appointment_ratings" value="5"> -->
                            <label for="javascript">(5) Excellent</label><br>
                        </div>
                        <div class="col-md-3">
                            <!-- <input type="radio" id="4" name="appointment_ratings" value="4"> -->
                            <label for="javascript">(4) Very Good</label><br>
                        </div>
                        <div class="col-md-2">
                        <!--     <input type="radio" id="3" name="appointment_ratings" value="3"> -->
                            <label for="javascript">(3) Good</label><br>
                        </div>
                        <div class="col-md-2">
                        <!--     <input type="radio" id="2" name="appointment_ratings" value="2"> -->
                            <label for="css">(2) Fair</label><br>
                        </div>
                        <div class="col-md-3">
                        <!--   <input type="radio" id="1" name="appointment_ratings" value="1"> -->
                          <label for="html">(1) Unsatisfactory</label>
                        </div>

                    <div class="col-md-12 mt-5 mb-2"><span class="bg-secondary btn-block text-white">I.FACILITIES/ONLINE CONNECTIVITY *</span></div>
                        <div class="col-md-4">
                            <label for="javascript">Accessible</label>
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                            <div class="col-md-2">
                                <input type="radio" class="facilities_accessible5" id="5" name="facilities_accessible" value="5">
                                <label for="javascript">(5)</label><br>
                            </div>
                            <div class="col-md-3">
                                <input type="radio" class="facilities_accessible4" id="4" name="facilities_accessible" value="4">
                                <label for="javascript">(4)</label><br>
                            </div>
                            <div class="col-md-2">
                                <input type="radio" class="facilities_accessible3" id="3" name="facilities_accessible" value="3">
                                <label for="javascript">(3)</label><br>
                            </div>
                            <div class="col-md-2">
                                <input type="radio" class="facilities_accessible2" id="2" name="facilities_accessible" value="2">
                                <label for="css">(2) </label><br>
                            </div>
                            <div class="col-md-3">
                              <input type="radio" class="facilities_accessible1" id="1" name="facilities_accessible" value="1">
                              <label for="html">(1)</label>
                            </div>
                            </div>
                        </div>

                        <div class="col-md-12"><hr></div>

                        <div class="col-md-4">
                            <label for="javascript">Functional</label>
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                            <div class="col-md-2">
                                <input type="radio" class="facilities_functional5" id="5" name="facilities_functional" value="5">
                                <label for="javascript">(5)</label><br>
                            </div>
                            <div class="col-md-3">
                                <input type="radio" class="facilities_functional4" id="4" name="facilities_functional" value="4">
                                <label for="javascript">(4)</label><br>
                            </div>
                            <div class="col-md-2">
                                <input type="radio" class="facilities_functional3" id="3" name="facilities_functional" value="3">
                                <label for="javascript">(3)</label><br>
                            </div>
                            <div class="col-md-2">
                                <input type="radio" class="facilities_functional2" id="2" name="facilities_functional" value="2">
                                <label for="css">(2) </label><br>
                            </div>
                            <div class="col-md-3">
                              <input type="radio" class="facilities_functional1" id="1" name="facilities_functional" value="1">
                              <label for="html">(1)</label>
                            </div>
                            </div>
                        </div>

                    <div class="col-md-12 mt-5 mb-2"><span class="bg-secondary btn-block text-white">II. SERVICES RENDERED *</span></div>
                        <div class="col-md-4">
                            <label for="javascript">Comprehensible Instructions</label>
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                            <div class="col-md-2">
                                <input type="radio" class="service_comprehensive_instructions5" id="5" name="service_comprehensive_instructions" value="5">
                                <label for="javascript">(5)</label><br>
                            </div>
                            <div class="col-md-3">
                                <input type="radio" class="service_comprehensive_instructions4" id="4" name="service_comprehensive_instructions" value="4">
                                <label for="javascript">(4)</label><br>
                            </div>
                            <div class="col-md-2">
                                <input type="radio" class="service_comprehensive_instructions3" id="3" name="service_comprehensive_instructions" value="3">
                                <label for="javascript">(3)</label><br>
                            </div>
                            <div class="col-md-2">
                                <input type="radio" class="service_comprehensive_instructions2" id="2" name="service_comprehensive_instructions" value="2">
                                <label for="css">(2) </label><br>
                            </div>
                            <div class="col-md-3">
                              <input type="radio" class="service_comprehensive_instructions1" id="1" name="service_comprehensive_instructions" value="1">
                              <label for="html">(1)</label>
                            </div>
                            </div>
                        </div>

                        <div class="col-md-12"><hr></div>

                        <div class="col-md-4">
                            <label for="javascript">Promptness in attending queries</label>
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                            <div class="col-md-2">
                                <input type="radio" class="service_promptness5" id="5" name="service_promptness" value="5">
                                <label for="javascript">(5)</label><br>
                            </div>
                            <div class="col-md-3">
                                <input type="radio" class="service_promptness4" id="4" name="service_promptness" value="4">
                                <label for="javascript">(4)</label><br>
                            </div>
                            <div class="col-md-2">
                                <input type="radio" class="service_promptness3" id="3" name="service_promptness" value="3">
                                <label for="javascript">(3)</label><br>
                            </div>
                            <div class="col-md-2">
                                <input type="radio" class="service_promptness2" id="2" name="service_promptness" value="2">
                                <label for="css">(2) </label><br>
                            </div>
                            <div class="col-md-3">
                              <input type="radio" class="service_promptness1" id="1" name="service_promptness" value="1">
                              <label for="html">(1)</label>
                            </div>
                            </div>
                        </div>

                    <div class="col-md-12 mt-5 mb-2"><span class="bg-secondary btn-block text-white">III. STAFF *</span></div>

                        <div class="col-md-4">
                            <label for="javascript">Attentiveness</label>
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                            <div class="col-md-2">
                                <input type="radio" class="staff_attentiveness5" id="5" name="staff_attentiveness" value="5">
                                <label for="javascript">(5)</label><br>
                            </div>
                            <div class="col-md-3">
                                <input type="radio" class="staff_attentiveness4" id="4" name="staff_attentiveness" value="4">
                                <label for="javascript">(4)</label><br>
                            </div>
                            <div class="col-md-2">
                                <input type="radio" class="staff_attentiveness3" id="3" name="staff_attentiveness" value="3">
                                <label for="javascript">(3)</label><br>
                            </div>
                            <div class="col-md-2">
                                <input type="radio" class="staff_attentiveness2" id="2" name="staff_attentiveness" value="2">
                                <label for="css">(2) </label><br>
                            </div>
                            <div class="col-md-3">
                              <input type="radio" class="staff_attentiveness1" id="1" name="staff_attentiveness" value="1">
                              <label for="html">(1)</label>
                            </div>
                            </div>
                        </div>

                        <div class="col-md-12"><hr></div>

                        <div class="col-md-4">
                            <label for="javascript">Competency</label>
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                            <div class="col-md-2">
                                <input type="radio" class="staff_competency5" id="5" name="staff_competency" value="5">
                                <label for="javascript">(5)</label><br>
                            </div>
                            <div class="col-md-3">
                                <input type="radio" class="staff_competency4" id="4" name="staff_competency" value="4">
                                <label for="javascript">(4)</label><br>
                            </div>
                            <div class="col-md-2">
                                <input type="radio" class="staff_competency3" id="3" name="staff_competency" value="3">
                                <label for="javascript">(3)</label><br>
                            </div>
                            <div class="col-md-2">
                                <input type="radio" class="staff_competency2" id="2" name="staff_competency" value="2">
                                <label for="css">(2) </label><br>
                            </div>
                            <div class="col-md-3">
                              <input type="radio" class="staff_competency1" id="1" name="staff_competency" value="1">
                              <label for="html">(1)</label>
                            </div>
                            </div>
                        </div>


                        <div class="col-md-12"><hr></div>

                        <div class="col-md-4">
                            <label for="javascript">Amiability</label>
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                            <div class="col-md-2">
                                <input type="radio" class="staff_amiability5" id="5" name="staff_amiability" value="5">
                                <label for="javascript">(5)</label><br>
                            </div>
                            <div class="col-md-3">
                                <input type="radio" class="staff_amiability4" id="4" name="staff_amiability" value="4">
                                <label for="javascript">(4)</label><br>
                            </div>
                            <div class="col-md-2">
                                <input type="radio" class="staff_amiability3" id="3" name="staff_amiability" value="3">
                                <label for="javascript">(3)</label><br>
                            </div>
                            <div class="col-md-2">
                                <input type="radio" class="staff_amiability2" id="2" name="staff_amiability" value="2">
                                <label for="css">(2) </label><br>
                            </div>
                            <div class="col-md-3">
                              <input type="radio" class="staff_amiability1" id="1" name="staff_amiability" value="1">
                              <label for="html">(1)</label>
                            </div>
                            </div>
                        </div>

                        <div class="col-md-12 mt-5">
                            <div class="form-group form-group-default">
                                <label><span class="text-danger">*</span> Remarks</label>
                                <textarea class="form-control appt_ratings_remarks" name="remarks" id="remarks" cols="30" rows="5"></textarea>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="modal-footer no-bd">
                    <?php
                    if($_SESSION['id_user_role'] == 4){
                        ?>
                        <button type="submit" id="btnRatings" class="btn btn-secondary"><i class="fa fa-save"></i> Confirm</button>
                        <?php
                    }
                    ?>
                    
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</form>