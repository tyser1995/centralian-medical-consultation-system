<form action="<?php echo base_url() ?>user/add_user" method="POST" id="myForm" enctype="multipart/form-data">
    <div class="row p-3" id="data_for_edit">                      
        <div class="row ">
            <div class="col-md-3">

                <div class="uploaded_image">
                    <img src="<?= base_url()?>public/uploads/dp/default_pic.png" class="img-thumbnail w-100 profilepic" alt="">
                </div>
                <button type="button" class="btn btn-secondary btn-sm btn-block"  style="display:block;height:30px;" onclick="document.getElementById('file').click()">Browse</button>
                <input type='file' id="file" style="display:none">
                <input type="hidden" id="temp_photo_arr" name="picture">

            </div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-12">
                        <span class="bg-secondary btn-block text-white">BASIC DETAILS</span>
                    </div>
                    <div class="col-md-12 mb-3"></div>
                    <div class="col-md-4">
                        <div class="form-group form-group-default">
                            <label><span class="text-danger"><span class="text-danger">*</span></span> Last name</label>

                            <?php $id_user_role = $this->customlib->identifyUserRole($this->uri->segment('4'))?>
                            <input  type="hidden" name="id_user_role" id="id_user_role" value="<?php echo isset($id_user_role) ? $id_user_role : 3 ?>">
                            <input  type="hidden" name="id" id="id" class="form-control" placeholder="Last name">
                            <input  type="text" name="last_name" id="last_name" class="form-control" placeholder="Last name">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group form-group-default">
                            <label><span class="text-danger">*</span> First name</label>
                            <input  type="text" name="first_name" id="first_name" class="form-control" placeholder="First name">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group form-group-default">
                            <label><span class="text-danger">*</span> MI</label>
                            <input  type="text" name="middle_name" id="middle_name"class="form-control" placeholder="Mi">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group form-group-default">
                            <label><span class="text-danger"><span class="text-danger">*</span></span> Birthday</label>
                            <input  type="date" name="birthday" id="birthday"class="form-control" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group form-group-default">
                            <label><span class="text-danger">*</span> Gender</label>
                            <select name="gender" id="gender" class="form-control">
                                <option value="">Select</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group form-group-default">
                            <label><span class="text-danger">*</span> Nationality</label>
                            <input  type="text" name="nationality" id="nationality" class="form-control" placeholder="Nationality" value="Filipino">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group form-group-default">
                            <label><span class="text-danger"><span class="text-danger">*</span></span> Civil Status</label>
                            <select name="civil_status" id="civil_status" class="form-control">
                                <option value="">Select</option>
                                <option value="Single">Single</option>
                                <option value="Married">Married</option>
                                <option value="Divorce">Divorce</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group form-group-default">
                            <label><span class="text-danger">*</span> Religion</label>
                            <input  type="text" name="religion" id="religion" class="form-control" placeholder="Religion">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group form-group-default">
                            <label><span class="text-danger">*</span> Contact</label>
                            <input  type="text" name="contact" id="contact" class="form-control" placeholder="contact" oninput="this.value = this.value.replace(/[^0-9.]/g, &quot;&quot;); this.value = this.value.replace(/(\..*)\./g, &quot;$1&quot;)">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group form-group-default">
                            <label><span class="text-danger">*</span> Email</label>
                            <input  type="text" name="email" id="email" class="form-control" placeholder="email">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group form-group-default">
                            <label><span class="text-danger">*</span> Address</label>
                            <input  type="text" name="address" id="address" class="form-control" placeholder="address">
                        </div>
                    </div>
                    <?php
                    if($this->uri->segment(4) == 'doctors'){
                    ?>
                        <div class="col-md-12">
                            <span class="bg-secondary btn-block text-white"><?= strtoupper(ucfirst(  substr_replace($this->uri->segment(4), "", -1) )) ?> DETAILS</span>
                        </div>
                        <div class="col-md-12 mb-3"></div>
                        <div class="col-md-4">
                            <div class="form-group form-group-default">
                                <label><span class="text-danger"><span class="text-danger">*</span></span> Specializations</label>
                                <select name="id_specialization" id="id_specialization" class="form-control">
                                    <option value="">Select</option>
                                    <?php foreach($specializations as $row): ?>
                                    <option value="<?= $row->id?>"><?= $row->specialization?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group form-group-default">
                                <label><span class="text-danger">*</span> Doctor Licensed</label>
                                <input  type="text" name="description" id="description" class="form-control" placeholder="description">
                            </div>
                        </div>
                    <?php
                    }else{
                        ?>
                        <div class="col-sm-12 mb-2">
                            <span class="btn-block bg-secondary text-white">EMERGENCY CONTACT INFORMATION</span> 
                        </div>
                        <div class="col-md-12 mb-3"></div>
                        <div class="col-md-4">
                            <div class="form-group form-group-default">
                                <label><span class="text-danger"><span class="text-danger">*</span></span> Full Name</label>
                                <input  type="text" name="eci_fullname" id="eci_fullname" class="form-control" placeholder="Full name">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group form-group-default">
                                <label><span class="text-danger">*</span> Contact Details</label>
                                <input  type="text" name="eci_contact" id="eci_contact" class="form-control" placeholder="Contact Details" oninput="this.value = this.value.replace(/[^0-9.]/g, &quot;&quot;); this.value = this.value.replace(/(\..*)\./g, &quot;$1&quot;)" max="11">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group form-group-default">
                                <label><span class="text-danger">*</span> Address</label>
                                <input  type="text" name="eci_address" id="eci_address" class="form-control" placeholder="Address">
                            </div>
                        </div>
                        <div class="col-sm-12 mb-2">
                            <span class="btn-block bg-secondary text-white">MEDICAL HISTORY</span> 
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group form-group-default">
                                <label> Medical History </label>
                                <textarea name="medical_history" id="medical_history" cols="30" rows="3"  class="form-control" placeholder="Type here if any"></textarea>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="col-md-12">
                        <span class="bg-secondary btn-block text-white">LOGIN CREDENTIALS</span>
                    </div>
                    <div class="col-md-12 mb-3"></div>
                    <div class="col-md-4">
                        <div class="form-group form-group-default">
                            <label><span class="text-danger">*</span> Username</label>
                            <input  type="text" name="username" id="username" class="form-control" placeholder="Username">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group form-group-default">
                            <label><span class="text-danger">*</span> Password</label>
                            <input  type="password" name="password" id="password" class="form-control" placeholder="Password">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group form-group-default">
                            <label><span class="text-danger">*</span> Confirm Password</label>
                            <input  type="password" name="cpassword" id="cpassword" class="form-control" placeholder="Password">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>