<?php $this->load->view('dashboard/template/header.php')?>
<?php $this->load->view('dashboard/template/sidebar.php')?>


		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">Dashboard</h4>
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a href="#">
									<i class="flaticon-home"></i>
								</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Profile</a>
							</li>
						</ul>
					</div>
					<div class="row">

                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                <form action="<?php echo base_url() ?>user/update_display_profile/" method="POST" id="myForm" enctype="multipart/form-data">
                                    <div class="d-flex align-items-center">
                                        <h4 class="card-title">Change Display Picture</h4>
                                        
                                        <button type="submit" class="btn btn-warning btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                                            <i class="fa fa-plus"></i>
                                            Save Changes
                                        </button>
                                    </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">              
                                            <div class="col-sm-12">
                                                <div class="form-group form-group-default">
                                                    <label>Account Code</label>
                                                    <input  type="file" name="userfile" id="userfile" class="form-control" placeholder="Code"   required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
                                <form action="<?php echo base_url() ?>user/update_user_account/" method="POST" id="myForm" enctype="multipart/form-data">
                                    <div class="d-flex align-items-center">
										<h4 class="card-title">Change Username</h4>
										<button type="submit" class="btn btn-warning btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
											<i class="fa fa-plus"></i>
											Save Changes
										</button>
									</div>
								</div>
								<div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12" id="error_msg">
                                        </div>                       
                                        <div class="col-sm-4">
                                            <div class="form-group form-group-default">
                                                <label>First Name</label>
                                                <input  type="text" name="first_name" id="first_name" class="form-control" placeholder="First name" value="<?= $_SESSION['first_name']?>" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group form-group-default">
                                                <label>Middle Name</label>
                                                <input  type="text" name="middle_name" id="middle_name" class="form-control" placeholder="Middle name" value="<?= $_SESSION['middle_name']?>"   required>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group form-group-default">
                                                <label>Last Name</label>
                                                <input  type="text" name="last_name" id="last_name" class="form-control" placeholder="Last name" value="<?= $_SESSION['last_name']?>"   required>
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <div class="form-group form-group-default">
                                                <label>Email</label>
                                                <input  type="email" name="email" id="email" class="form-control" placeholder="email" value="<?= $_SESSION['email']?>"  required>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group form-group-default">
                                                <label>Mobile Number</label>
                                                <input  type="text" name="contact" maxlength="11" id="contact" class="form-control" placeholder="Contact" onkeyup="this.value=this.value.replace(/[^\d]/,'')" value="<?= $_SESSION['contact']?>" required>
                                            </div>
                                        </div>
									</div>
                                </form>
							</div>
						</div>
						
							<div class="col-md-12">
								<div class="card">
									<div class="card-header">
									<form action="<?php echo base_url() ?>user/update_account_password/" method="POST" id="myForm" enctype="multipart/form-data">
										<div class="d-flex align-items-center">
											<h4 class="card-title">Change Password</h4>
											<button type="submit" class="btn btn-warning btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
												<i class="fa fa-plus"></i>
												Save Changes
											</button>
										</div>
									</div>
									<div class="card-body">
										<div class="row">
											<div class="col-md-12" id="error_msg">
											</div>                       
											<div class="col-sm-4">
												<div class="form-group form-group-default">
													<label>Current Password</label>
													<input  type="password" name="current_password" id="current_password" class="form-control" placeholder="current password" required>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group form-group-default">
													<label>New Password</label>
													<input  type="password" name="new_password" id="new_password" class="form-control" placeholder="new password" required>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="form-group form-group-default">
													<label>Confirm Password</label>
													<input  type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="confirm password" required>
												</div>
											</div>
										</div>
									</div>
									</form>
								</div>
							</div>


					</div>
				</div>
			</div>
		</div>


<?php $this->load->view('dashboard/template/footer.php')?>
<?php $this->load->view('dashboard/class/notification.php')?>



		
	