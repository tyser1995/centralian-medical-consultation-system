	<body data-background-color="bg2">
	<div class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header">
				
				<a href="<?= base_url()?>user" class="logo">
					<!-- <img src="<?= base_url()?>public/assets/img/logo.svg" alt="navbar brand" class="navbar-brand"> -->
                    <h3 class="navbar-brand card-title mt-3" style="font-size: 18px;"><span class="text-white"> <?= ucfirst($_SESSION['role']) ?> Dashboard</span></h3>
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
				</button>
				<!-- <button class="topbar-toggler more"><i class="icon-options-vertical"></i></button> -->
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
						<i class="icon-menu"></i>
					</button>
				</div> 
			</div> 
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg">
				
				<div class="container-fluid">
					<div class="collapse" id="search-nav">
						<form class="navbar-left navbar-form nav-search mr-md-3">
							<!-- <div class="input-group">
								<div class="input-group-prepend">
									<button type="submit" class="btn btn-search pr-1">
										<i class="fa fa-search search-icon"></i>
									</button>
								</div>
								<input type="text" placeholder="Search ..." class="form-control">
							</div> -->
						</form>
						
						<h3 class="navbar-brand card-title mt-1" style="font-size: 18px;"><span class="text-white" >Central Philippine University Online Consultation</span></h3>
					</div>
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item toggle-nav-search hidden-caret">
							<a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
								<i class="fa fa-search"></i>
							</a>
						</li>


		
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>


		<!-- Sidebar -->
		<div class="sidebar sidebar-style-2" data-background-color="white">
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<img src="<?= base_url()?>public/uploads/dp/<?php echo empty($_SESSION['picture']) ? 'default_pic.png' : $_SESSION['picture'] ?>" alt="..." class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
										<?= $_SESSION['last_name']?>, <?= $_SESSION['first_name']?>  
										<span class="user-level"><?= ucfirst($_SESSION['role'])?> </span>
										<?php
										// if($_SESSION['type'] == 0){
										// 		echo '<span class="user-level">Administrator</span>';
										// }
										?>
									
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>

							<div class="collapse in" id="collapseExample">
								<ul class="nav">
									<!-- <li>
										<a href="<?= base_url()?>user/profile">
											<span class="link-collapse">My Profile</span>
										</a>
									</li> -->
										<li>
										<a href="<?= base_url()?>login/logout">
											<span class="link-collapse">Logout</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<ul class="nav nav-primary">
			
						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">Components</h4>
						</li>

						<li class="nav-item">
							<a href="<?= base_url()?>user">
								<i class="fas fa-chalkboard"></i>
								<p>My Dashboard</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url()?>user/profile/">
								<i class="fas fa-user"></i>
								<p>My Account</p>
							</a>
						</li>
						<?php if($_SESSION['id_user_role'] == 3 || $_SESSION['id_user_role'] == 4){ ?>
							<li class="nav-item">
								<a href="<?= base_url()?>notifications/">
									<i class="fas fa-bell"></i>
									<p>Notifications</p>
									<span class="badge badge-info"><?= $this->customlib->notifications_counter() ?></span>
								</a>
							</li>
							<!-- <li class="nav-item">
								<a href="<?= base_url()?>videotelephony/">
									<i class="fas fa-video"></i>
									<p>Videotelephony</p>
									<span class="badge badge-info"><?= $this->customlib->videotelephony_counter() ?></span>
								</a>
							</li> -->
						<?php } ?>
						<!-- <li class="nav-item">
							<a data-toggle="collapse" href="#sidebarLayouts" class="collapsed" aria-expanded="false">
								<i class="fas fa-calendar-alt"></i>
								<p>Videotelephony</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="sidebarLayouts" style="">
								<ul class="nav nav-collapse">


									<?php
									if($_SESSION['id_user_role'] != 4){
										?>
										<li>
											<a href="<?= base_url()?>videotelephony/index/0">
												<span class="sub-item">Pending</span>
												<span class="badge badge-info"><?= $this->customlib->appointment_counter(0) ?></span>
											</a>
										</li>
										<?php
									}
									?>

									<li>
										<a href="<?= base_url()?>videotelephony/index/1">
											<span class="sub-item">Approved</span>
											<span class="badge badge-info"><?= $this->customlib->appointment_counter(1) ?></span>
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>videotelephony/index/2">
											<span class="sub-item">Completed</span>
											<span class="badge badge-info"><?= $this->customlib->appointment_counter(2) ?></span>
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>videotelephony/index/3">
											<span class="sub-item">Cancelled</span>
											<span class="badge badge-info"><?= $this->customlib->appointment_counter(3) ?></span>
										</a>
									</li>
								</ul>
							</div>
						</li> -->
						<li class="nav-item">
							<a data-toggle="collapse" href="#sidebarLayouts" class="collapsed" aria-expanded="false">
								<i class="fas fa-calendar-alt"></i>
								<p>Appointments</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="sidebarLayouts" style="">
								<ul class="nav nav-collapse">


									<?php
									if($_SESSION['id_user_role'] != 4){
										?>
										<li>
											<a href="<?= base_url()?>appointments/index/0">
												<span class="sub-item">Pending</span>
												<span class="badge badge-info"><?= $this->customlib->appointment_counter(0) ?></span>
											</a>
										</li>
										<?php
									}
									?>

									<li>
										<a href="<?= base_url()?>appointments/index/1">
											<span class="sub-item">Approved</span>
											<span class="badge badge-info"><?= $this->customlib->appointment_counter(1) ?></span>
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>appointments/index/2">
											<span class="sub-item">Completed</span>
											<span class="badge badge-info"><?= $this->customlib->appointment_counter(2) ?></span>
										</a>
									</li>
									<li>
										<a href="<?= base_url()?>appointments/index/3">
											<span class="sub-item">Cancelled</span>
											<span class="badge badge-info"><?= $this->customlib->appointment_counter(3) ?></span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						
						<?php
						if($_SESSION['id_user_role'] == 1){
							?>
							<li class="nav-item">
								<a href="<?= base_url()?>admin/users_management/index/patients">
									<i class="fas fa-users"></i>
									<p>Patients Managment</p>
									
								</a>
							</li>
							<li class="nav-item">
								<a href="<?= base_url()?>admin/users_management/index/doctors">
									<i class="fas fa-user-md"></i>
									<p>Doctors Managment</p>
									
								</a>
							</li>
							<li class="nav-item" hidden>
								<a href="<?= base_url()?>admin/users_management/index/nurses">
									<i class="fas fa-user-friends"></i>
									<p>Nurses Managment</p>
									
								</a>
							</li>
							<li class="nav-item">
							<a href="<?= base_url()?>admin/services">
								<i class="far fa-flag"></i>
								<p>Services</p>
								
							</a>
							</li>
							<li class="nav-item">
								<a href="<?= base_url()?>admin/specializations">
									<i class="far fa-file-alt"></i>
									<p>Doctor Specializations</p>
									
								</a>
							</li>
							<li class="nav-item">
								<a href="<?= base_url()?>admin/illnesses">
									<i class="fas fa-tired"></i>
									<p>Illness / Pains</p>
									
								</a>
							</li>
							<?php
						}
						?>

						<li class="nav-item">
							<a href="<?= base_url()?>login/logout">
								<i class="fas fa-sign-out-alt"></i>
								<p>Logout</p>
								
							</a>
						</li>

					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->