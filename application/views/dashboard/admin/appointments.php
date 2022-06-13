

<?php $this->load->view('dashboard/template/header.php')?>
<?php $this->load->view('dashboard/template/sidebar.php')?>
<?php
if($this->uri->segment(3) == 0){
	$appt_status = 'Pending';
}else if($this->uri->segment(3) == 1){
	$appt_status = 'Approved';
}else if($this->uri->segment(3) == 2){
	$appt_status = 'Completed';
}else if($this->uri->segment(3) == 3){
	$appt_status = 'Cancelled';
}
?>

	<div class="main-panel">
		<div class="content">
			<div class="page-inner">
				<div class="page-header">
					<h4 class="page-title">Dashboard</h4>
					<ul class="breadcrumbs">
						<li class="nav-home">
							<a href="<?= base_url()?>/user">
								<i class="flaticon-home"></i>
							</a>
						</li>
						<li class="separator">
							<i class="flaticon-right-arrow"></i>
						</li>
						<li class="nav-item">
							<a href="#"><?= $appt_status ?> Appointments</a>
						</li>
					</ul>
				</div>
				<div class="row row-card-no-pd">
					<div class="col-md-12">
						<div class="card">
							<div class="card-header">
								<div class="card-head-row">
									<h4 class="card-title">List of <?= $appt_status ?>  Appointments</h4>

									<?php
									if($_SESSION['id_user_role'] == 3){
										?>
										<button id="btnAdd" class="btn btn-secondary btn-round ml-auto">
											<i class="fa fa-plus"></i>
											Add Appointment
										</button>
										<?php
									}
									?>
								</div>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table id="multi-filter-select" class="display table table-striped table-hover" >
										<thead>
											<tr>
												<th>Reference #</th>
												<th>Patient Name</th>
												<th style="width:150px">Date & Time</th>
												<th>Service</th>
												<th>Illness</th>
												<th>Other Illness</th>
												<?php
												if($appt_status == 'Cancelled'){
													echo '<td>Cancelled By</td>';
													echo '<td>Cancellation Reason</td>';
												}
												?>

												<?php
												if($_SESSION['id_user_role'] == 4){
													echo '<td>My Remarks</td>';
												}
												?>
												<th>Option</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach($appointments as $row):?>
											<tr>
												<td>APPT-<?= $row->id ?></td>
												<td><?= $row->patient_name ?></td>
												<td><?= $row->appnt_date.' - '.$row->appnt_time ?><br>
													<?php
													if($_SESSION['id_user_role'] == 1 || $_SESSION['id_user_role'] == 4){
														?>
														<button type="button" class="btn btn-warning btn-sm" onclick="resched_appt('<?= $row->id ?>')" title="Add Remarks"><i class="fas fa-redo"></i> Resched</button>
														<?php
													}
													?>
												</td>
												<td><?= $row->service ?></td>
												<td>
													<?php
													$illnesses = explode(',',$row->illness);
													for($i=0;$i < count($illnesses); $i++){
														$a=array("primary","secondary","warning","danger","info","success");
														echo '<span class="badge badge-'.$a[rand(1,5)].'">'.$illnesses[$i].'</span>';
													} 
													?>
												</td>
												<td><?= $row->other_illness ?></td>
												<?php
												if($appt_status == 'Cancelled'){
													echo '<td>'.$row->cancelled_by.'</td>';
													echo '<td>'.$row->cancellation_reason.'</td>';
												}
												?>

												<?php
												if($_SESSION['id_user_role'] == 4){
													echo '<td>'.$row->doctor_remarks.'</td>';
												}
												?>
												<td>
													<div class="btn-group">
														<button type="button" class="btn btn-info btn-sm" onclick="getView('<?= $row->id ?>')" title="View Appointment"><i class="fa fa-eye"></i></button>
														<?php
														if($_SESSION['id_user_role'] == 1 && $appt_status != 'Cancelled' && $appt_status != 'Completed'){
															?>
															<button type="button" class="btn btn-secondary btn-sm" onclick="getAdmin_Edit('<?= $row->id ?>','<?= $row->patient_id ?>','<?= $row->appnt_date ?>','<?= $row->appnt_time ?>')"><i class="fas fa-user-md"></i></button>
															<?php
														}
														?>

														<?php
														if($_SESSION['id_user_role'] == 4){
															?>
															<button type="button" class="btn btn-secondary btn-sm" onclick="getDoctor_remarks('<?= $row->id ?>','<?= $row->patient_id ?>')" title="Add Remarks"><i class="fas fa-prescription"></i></button>
															<?php
														}
														?>

														<?php
														if($appt_status != 'Cancelled' && $appt_status != 'Completed'){
															?>
															<button type="button" class="btn btn-danger btn-sm" title="Cancel Appointment" onclick="getCancel('<?= $row->id ?>')"><i class="fa fa-ban"></i></button>
															<?php
														}
														?>
														
														<?php
														if($appt_status == 'Completed' && $_SESSION['id_user_role'] == 3){
															?>
															<button type="button" class="btn btn-warning btn-sm" title="Cancel Appointment" onclick="addRatings('<?= $row->id ?>')"><i class="fas fa-grin-stars"></i> Add Ratings</button>
															<?php
														}
														?>

														<?php
														if($appt_status == 'Completed' && $_SESSION['id_user_role'] == 1){
															?>
															<button type="button" class="btn btn-warning btn-sm" title="Cancel Appointment" onclick="addRatings('<?= $row->id ?>')"><i class="fas fa-grin-stars"></i> View Ratings</button>
															<?php
														}
														?>

													</div>
												</td>
											</tr>
											<?php endforeach; ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php $this->load->view('dashboard/admin/modal/add-appointment.php')?>
<?php $this->load->view('dashboard/admin/modal/cancel-appointment-modal.php')?>
<?php $this->load->view('dashboard/admin/modal/add-appt-ratings.php')?>
<?php $this->load->view('dashboard/admin/modal/add-doctor-remarks-modal.php')?>
<?php $this->load->view('dashboard/admin/modal/resched_appt.php')?>
<?php $this->load->view('dashboard/template/footer.php')?>
<?php $this->load->view('dashboard/class/notification.php')?>
<?php $this->load->view('dashboard/class/upload-picture-ajax.php')?>

<script>
	$('#btnAdd').click(function(){
		$('#addRowModal').modal('show');
		$('#addRowModal').find('.modal-title').text('Appointment Details');
		$('#myForm').attr('action','<?php echo base_url() ?>appointments/save');

		$("#id_service").val('');
		$("#appnt_date").val('');
		$("#appnt_time").val('');
		$("#description").val('');

		$(".illness-container").attr('hidden',false);
		$(".assign-doctor-container").attr('hidden',true);
		$(".patient-details-container").attr('hidden',true);
		$(".appointment-details-container").attr('hidden',false);
		$(".assigned-doctor-container").attr('hidden',true);
		$("#btnssave").attr('hidden',false);
		$("#id_service").attr('disabled',false);
		$("#appnt_date").attr('disabled',false);
		$("#appnt_time").attr('disabled',false);
		$("#description").attr('disabled',false);

		$("#id_service").val();
		$("#appnt_date").val();
		$("#appnt_time").val();
		$("#description").val();
	});

	$('#btnssave').click(function(e){
		e.preventDefault(e);
		let data = $("#myForm").serializeArray();
		console.log(data);


		for(var i=0;i<data.length;i++){
			if(data[i].name != 'travel_history' && data[i].name != 'exposure_to_covid' && data[i].name != 'contact_to_person' && data[i].name != 'doctor_id' && data[i].name != 'other_illness' && data[i].name != 'not_appnt_date' && data[i].name != 'not_appnt_time' && data[i].name != 'patient_id'){
				if(data[i].value == ''){
					swal('Please fill-up all the required fields','','warning');
					return false;
				}
			}
		}

		let feeling_today = $("input[name=feeling_today]").is(":checked");
		if(feeling_today == false){
			swal('Please let us know, How do you feel today, by rating from 1-10','','warning');
			return false;
		}

		$("#myForm").submit();

	});

	function getCancel(id){
		$('#addRowModalCancel').modal('show');
		$("#id2").val(id);
	}

	function addRatings(id){
		$('#addRowModalRatings').modal('show');
		$("#id_appt_ratings").val(id);

		$.ajax({
			type: 'ajax',
			method: 'post',
			url: '<?php echo base_url()?>appointments/appt_ratings',
			data:{
				id:id,
				},
			async: false,
			dataType: 'text',
			success: function(response){
				var data = JSON.parse(response);
				let facilities_accessible = '.facilities_accessible'+data[0].facilities_accessible;
				$(facilities_accessible).prop('checked', true);

				let facilities_functional = '.facilities_functional'+data[0].facilities_functional;
				$(facilities_functional).prop('checked', true);

				let service_comprehensive_instructions = '.service_comprehensive_instructions'+data[0].service_comprehensive_instructions;
				$(service_comprehensive_instructions).prop('checked', true);

				let service_promptness = '.service_promptness'+data[0].service_promptness;
				$(service_promptness).prop('checked', true);

				let staff_attentiveness = '.staff_attentiveness'+data[0].staff_attentiveness;
				$(staff_attentiveness).prop('checked', true);

				let staff_competency = '.staff_competency'+data[0].staff_competency;
				$(staff_competency).prop('checked', true);

				let staff_amiability = '.staff_amiability'+data[0].staff_amiability;
				$(staff_amiability).prop('checked', true);

				$(".appt_ratings_remarks").val(data[0].remarks);
			},
			error: function(){
				swal('Something went wrong');
			}
		});
	}

	function getView(id){
		$('#addRowModal').modal('show');
		$('#addRowModal').find('.modal-title').text('Appointment Details');

		$.ajax({
			type: 'ajax',
			method: 'post',
			url: '<?php echo base_url()?>appointments/view',
			data:{
				id:id,
				},
			async: false,
			dataType: 'text',
			success: function(response){
			var data = JSON.parse(response);
			
				// $("#id").val(data[0].id);
				$("#id_service").val(data[0].id_service);
				$("#appnt_date").val(data[0].appnt_date);
				$("#appnt_time").val(data[0].appnt_time);
				$("#illness").val(data[0].illness);
				$("#description").val(data[0].description);
				$("#patient_name").val(data[0].patient_name);
				$("#contact").val(data[0].contact);
				$("#address").val(data[0].address);
				$("#doctor_remarks_forview").val(data[0].doctor_remarks);
				$("#doctor_forview").val(data[0].doctor_name);
				$("#specialization_forview").val(data[0].specialization);

				$("#travel_history_forview").val(yesNo(data[0].travel_history));
				$("#exposure_to_covid_forview").val(yesNo(data[0].exposure_to_covid));
				$("#contact_to_person_forview").val(yesNo(data[0].contact_to_person));
				$("#feeling_today_forview").val(data[0].feeling_today+" of 10");

				$(".illness-container").attr('hidden',true);
				$(".assign-doctor-container").attr('hidden',true);
				$(".patient-details-container").attr('hidden',false);
				$(".appointment-details-container").attr('hidden',false);
				$(".assigned-doctor-container").attr('hidden',false);
				if(data[0].doctor_name == null){
					$(".assigned-doctor-container").attr('hidden',true);
				}
				$("#btnssave").attr('hidden',true);
				$("#id_service").attr('disabled',true);
				$("#appnt_date").attr('disabled',true);
				$("#appnt_time").attr('disabled',true);
				$("#description").attr('disabled',true);


				let stool = data[0].stool;
				let xray = data[0].xray;

				if(stool == ''){
					stool = 'default_pic.png';
				}

				if(xray == ''){
					xray = 'default_pic.png';
				}

				$(".stoolpic").attr({'src': '<?= base_url()?>public/uploads/stools/'+stool});
				$(".xraypic").attr({'src': '<?= base_url()?>public/uploads/xray/'+xray});
			},
			error: function(){
				swal('Something went wrong');
			}
		});
	}

	function yesNo($data){
		if($data == 0){
			return 'No';
		}else{
			return 'Yes';
		}
	}

	$(".BtnDoctorRemarks").click(function(){
		let id = $("#id3").val();
		let doctor_remarks = $("#doctor_remarks").val();
		let patient_id = $("#patient_id3").val();
		let stool = $("#stool").val();
		let xray = $("#xray").val();
		let status = $(this).attr('data-status');


		$.ajax({
			type: 'ajax',
			method: 'post',
			url: '<?= base_url()?>appointments/doctor_remarks',
			data:{
				id:id,
				doctor_remarks:doctor_remarks,
				patient_id:patient_id,
				status:status,
				stool:stool,
				xray:xray
				},
			async: false,
			dataType: 'text',
			success: function(response){
				location.reload();
			},
			error: function(){
				swal('Something went wrong');
			}
		});
	})

	function getAdmin_Edit(id,patient_id,appnt_date,appnt_time){
		$('#addRowModal').modal('show');
		$('#addRowModal').find('.modal-title').text('Assign Doctor');
		$('#myForm').attr('action','<?php echo base_url() ?>appointments/update');
		$("#btnssave").text('Update');
		$("#edit_id").val(id);
		$("#not_patient_id").val(patient_id);
		$("#not_appnt_date").val(appnt_date);
		$("#not_appnt_time").val(appnt_time);

		$(".illness-container").attr('hidden',true);
		$(".assign-doctor-container").attr('hidden',false);
		$(".patient-details-container").attr('hidden',true);
		$(".appointment-details-container").attr('hidden',true);
		$(".assigned-doctor-container").attr('hidden',true);
		$("#btnssave").attr('hidden',true);
		$("#btnUpdate").attr('hidden',false);
	}

	function getDoctor_remarks(id,patient_id){
		$('#addRowModalDoctorRemarks').modal('show');
		$("#id3").val(id);
		$("#patient_id3").val(patient_id);

		$.ajax({
			type: 'ajax',
			method: 'post',
			url: '<?php echo base_url()?>appointments/view',
			data:{
				id:id,
				patient_id:patient_id
				},
			async: false,
			dataType: 'text',
			success: function(response){
				var data = JSON.parse(response);
				$("#doctor_remarks").val(data[0].doctor_remarks);
				$("#stool").val(data[0].stool);
				$("#xray").val(data[0].xray);

				let stool = data[0].stool;
				let xray = data[0].xray;

				if(stool == ''){
					stool = 'default_pic.png';
				}

				if(xray == ''){
					xray = 'default_pic.png';
				}

				$(".stoolpic").attr({'src': '<?= base_url()?>public/uploads/stools/'+stool});
				$(".xraypic").attr({'src': '<?= base_url()?>public/uploads/xray/'+xray});

			},
			error: function(){
				swal('Something went wrong');
			}
		});
	}

	$("#upload_stool").change(function(){
		upload_picture('stool','upload_stool');
	})

	$("#upload_xray").change(function(){
		upload_picture('xray','upload_xray');
	})

	function resched_appt(id){
		$('#myForm_resched_appt').modal('show');

		$.ajax({
			type: 'ajax',
			method: 'post',
			url: '<?php echo base_url()?>appointments/view',
			data:{
				id:id
				},
			async: false,
			dataType: 'text',
			success: function(response){
				var data = JSON.parse(response);
				$("#resched_appt_id").val(data[0].id);
				$("#resched_appt_appnt_date").val(data[0].appnt_date);
				$("#resched_appt_appnt_time").val(data[0].appnt_time);
				$("#resched_appt_patient_id").val(data[0].patient_id);
			},
			error: function(){
				swal('Something went wrong');
			}
		});
	}

</script>
