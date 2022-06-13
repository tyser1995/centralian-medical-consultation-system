<?php $this->load->view('dashboard/template/header.php')?>
<?php $this->load->view('dashboard/template/sidebar.php')?>
	<div class="main-panel">
		<div class="content">
			<div class="panel-header bg-primary-gradient">
				<div class="page-inner py-5">
					<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
						<div>
							<h2 class="text-white pb-2 fw-bold">Dashboard</h2>
							<h5 class="text-white op-7 mb-2">Blessed Day, <?= $_SESSION['last_name']?>, <?= $_SESSION['first_name']?>  </h5>
						</div>
						<div class="ml-md-auto py-2 py-md-0">
							<!-- <a href="#" class="btn btn-primary btn-border btn-round mr-2">Manage Classes</a>
							<a href="#" class="btn btn-secondary btn-round">Add Student</a> -->
						</div>
					</div>
				</div>
			</div>
			<div class="page-inner mt--5">
				<div class="row mt--2">
					<div class="col-md-12">
						<div class="card full-height">
							<div class="card-body">
								<div class="card-title">Overall statistics</div><br>
								<!-- <div class="card-category">Daily information about statistics in system for drivers and bookings</div> -->

								<?php
								if($_SESSION['id_user_role'] == 1){
									?>
								<div class="d-flex flex-wrap justify-content-around pt-4">
									<div class="col">
										<div class="card card-stats card-secondary card-round">
											<div class="card-body">
												<div class="row">
													<div class="col-5">
														<div class="icon-big text-center">
															<i class="fas fa-users"></i>
														</div>
													</div>
													<div class="col-7 col-stats">
														<div class="numbers">
															<p class="card-category">Overall Users</p>
															<h4 class="card-title"><?= $report->overall_users?></h4>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col">
										<div class="card card-stats card-primary card-round">
											<div class="card-body">
												<div class="row">
													<div class="col-5">
														<div class="icon-big text-center">
															<i class="fas fa-users"></i>
														</div>
													</div>
													<div class="col-7 col-stats">
														<div class="numbers">
															<p class="card-category">Patients</p>
															<h4 class="card-title"><?= $report->patient_count?></h4>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col">
										<div class="card card-stats card-info card-round">
											<div class="card-body ">
												<div class="row">
													<div class="col-5">
														<div class="icon-big text-center">
															<i class="fas fa-users"></i>
														</div>
													</div>
													<div class="col-7 col-stats">
														<div class="numbers">
															<p class="card-category">Doctors</p>
															<h4 class="card-title"><?= $report->doctor_count?></h4>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col">
										<div class="card card-stats card-success card-round">
											<div class="card-body ">
												<div class="row">
													<div class="col-5">
														<div class="icon-big text-center">
															<i class="fas fa-users"></i>
														</div>
													</div>
													<div class="col-7 col-stats">
														<div class="numbers">
															<p class="card-category">Services</p>
															<h4 class="card-title"><?= $report->services?></h4>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<?php
								}
								?>

								<div class="d-flex flex-wrap justify-content-around ">
									<div class="col">
										<div class="card card-stats card-round">
											<div class="card-body ">
												<div class="row">
													<div class="col-5">
														<div class="icon-big text-center">
															<i class="fas fa-copy text-warning"></i>
														</div>
													</div>
													<div class="col-7 col-stats">
														<div class="numbers">
															<p class="card-category">Pending</p>
															<h4 class="card-title"><?= $report->pending?></h4>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col">
										<div class="card card-stats card-round">
											<div class="card-body ">
												<div class="row">
													<div class="col-5">
														<div class="icon-big text-center">
															<i class="fas fa-envelope-open text-success"></i>
														</div>
													</div>
													<div class="col-7 col-stats">
														<div class="numbers">
															<p class="card-category">Ongoing</p>
															<h4 class="card-title"><?= $report->ongoing?></h4>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col">
										<div class="card card-stats card-round">
											<div class="card-body">
												<div class="row">
													<div class="col-5">
														<div class="icon-big text-center">
															<i class="fas fa-check text-danger"></i>
														</div>
													</div>
													<div class="col-7 col-stats">
														<div class="numbers">
															<p class="card-category">Completed</p>
															<h4 class="card-title"><?= $report->completed?></h4>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col">
										<div class="card card-stats card-round">
											<div class="card-body">
												<div class="row">
													<div class="col-5">
														<div class="icon-big text-center">
															<i class="fas fa-ban text-danger"></i>
														</div>
													</div>
													<div class="col-7 col-stats">
														<div class="numbers">
															<p class="card-category">Cancelled</p>
															<h4 class="card-title"><?= $report->cancelled?></h4>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<?php
					if($_SESSION['id_user_role'] == 1){
						?>
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="card-head-row">
										<h4 class="card-title">Number Illnesses per barangay</h4>
									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="multi-filter-select1" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>Barangay</th>
													<th>Illness</th>
													<th>Number of Patient</th>
												</tr>
											</thead>
											<tbody>
												
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
						<?php
					}
					?>

					<?php
					if($_SESSION['id_user_role'] != 1){
					?>
					<div class="col-md-12">
						<div class="card">
							<div class="card-header">
								<div class="card-head-row">
									<h4 class="card-title">My Appointments</h4>
								</div>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table id="multi-filter-select" class="display table table-striped table-hover" >
										<thead>
											<tr>
												<th>Patient Name</th>
												<th>Date & Time</th>
												<th>Service</th>
												<th>Illness</th>
												<th>Status</th>
											</tr>
										</thead>
										<tbody>
											
										</tbody>
									</table>
									
								</div>
							</div>
						</div>
					</div>
					<?php
					}
					?>	

				</div>
			</div>
		</div>
	</div>

		

<?php $this->load->view('dashboard/template/footer.php')?>
<script>
	var barChart = document.getElementById('barChart').getContext('2d'),
		pieChart = document.getElementById('pieChart').getContext('2d');

		var myBarChart = new Chart(barChart, {
			type: 'bar',
			data: {
				labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
				datasets : [{
					label: "Sales",
					backgroundColor: 'rgb(23, 125, 255)',
					borderColor: 'rgb(23, 125, 255)',
					data: [3, 2, 9, 5, 4, 6, 4, 6, 7, 8, 7, 4],
				}],
			},
			options: {
				responsive: true, 
				maintainAspectRatio: false,
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				},
			}
		});

		var myPieChart = new Chart(pieChart, {
			type: 'pie',
			data: {
				datasets: [{
					data: [50, 35, 15],
					backgroundColor :["#1d7af3","#f3545d","#fdaf4b"],
					borderWidth: 0
				}],
				labels: ['Pending', 'Approved', 'Banned'] 
			},
			options : {
				responsive: true, 
				maintainAspectRatio: false,
				legend: {
					position : 'bottom',
					labels : {
						fontColor: 'rgb(154, 154, 154)',
						fontSize: 11,
						usePointStyle : true,
						padding: 20
					}
				},
				pieceLabel: {
					render: 'percentage',
					fontColor: 'white',
					fontSize: 14,
				},
				tooltips: false,
				layout: {
					padding: {
						left: 20,
						right: 20,
						top: 20,
						bottom: 20
					}
				}
			}
		})
</script>
