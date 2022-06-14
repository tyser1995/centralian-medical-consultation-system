

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
							<a href="#">Videotelephony</a>
						</li>
					</ul>
				</div>
	
				<div class="row row-card-no-pd">
					<div class="col-md-12">
						<?php  
						if($this->session->userdata('status_msg')){
						?>
								<div class="alert alert-<?php echo $_SESSION['stat_msg_type'] ?>" role="alert">
								<?php echo $_SESSION['status_msg'] ?>
								</div>
						<?php
						unset($_SESSION['status_msg']);	
						unset($_SESSION['stat_msg_type']);	
						}
						?>
					</div>
					<div class="col-md-12">
						<div class="card">
							<div class="card-header">
								<div class="card-head-row">
									<h4 class="card-title">List of Conferences</h4>
									<!-- <?php if($_SESSION['id_user_role'] == 4) {?>
										<button id="btnAdd" class="btn btn-secondary btn-round ml-auto">
											<i class="fa fa-plus"></i>
											Add Videotelephony
										</button>
									<?php }?> -->
								</div>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table id="multi-filter-select" class="display table table-striped table-hover" >
										<thead>
											<tr>
												<th>Patient Name</th>
												<th>Invitation Link</th>
												<th>Option</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach($videotelephony as $row): ?>
											<tr>
												<td><?= $row->patient_name?></td>
												<td> <?php if(is_null($row->message)) {?> Please click the link to join<?php }?>  <a target="_blank" href="<?= $row->message?>"><?= $row->message?></a></td>
												<td>
												<?php if($_SESSION['id_user_role'] == 4) {?>
													<div class="btn-group">
													<?php if($_SESSION['id_user_role'] == 4 && !is_null($row->message)) {?>
															<button type="button" class="btnAdd btn btn-success btn-sm" title="Add Invitation Link" onclick="getEdit('<?= $row->id ?>')"><i class="fas fa-plus"></i></button>
														<?php } else{ ?>
															<button type="button" class="btn btn-secondary btn-sm" title="Edit Invitation Link" onclick="getEdit('<?= $row->id ?>')"><i class="fa fa-edit"></i></button>
														<?php }?>
														<button type="button" class="btn btn-danger btn-sm" title="Remove Invitation Link" onclick="getDelete('<?= $row->id ?>','<?= base_url()?>videotelephony/delete')"><i class="fa fa-trash"></i></button>
														<button type="button" class="btn btn-warning btn-sm" title="Add Remarks"><i class="fas fa-redo"></i> Resched</button>
													</div>
												<?php }?>
												<?php if($_SESSION['id_user_role'] == 3) {?>
													<div class="btn-group">
														<button type="button" class="btn btn-success btn-sm" title="Accept Invitation" onclick="getEdit('<?= $row->id ?>')"><i class="fa fa-plus"></i></button>
														<button type="button" class="btn btn-danger btn-sm" title="Reject Invitation" onclick="getDelete('<?= $row ->id ?>','<?= base_url()?>videotelephony/delete')"><i class="fa fa-trash"></i></button>
													</div>
												<?php }?>
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

<?php $this->load->view('dashboard/admin/modal/add-videotelephony.php')?>
<?php $this->load->view('dashboard/class/delete.php')?>
<?php $this->load->view('dashboard/template/footer.php')?>

<script>
	$('.btnAdd').click(function(){
		$('#addRowModal').modal('show');
		$('#addRowModal').find('.modal-title').text('Videotelephony Details');
		$("#id_user").val($_SESSION['id_user']);
		$('#myForm').attr('action','<?php echo base_url() ?>videotelephony/save');
	});

	function getEdit(id){
		$('#addRowModal').modal('show');
		$('#addRowModal').find('.modal-title').text('Videotelephony Details');
		$('#myForm').attr('action','<?php echo base_url() ?>videotelephony/update');
		$('#btnssave').text('Update');
		
		$.ajax({
				type: 'ajax',
				method: 'post',
				url: '<?php echo base_url()?>videotelephony/edit',
				data:{
					id:id,
					},
				async: false,
				dataType: 'text',
				success: function(response){
				var data = JSON.parse(response);
			
					$("#id").val(data[0].id);
					$("#message").val(data[0].message);
					//$("#fee").val(data[0].fee);
				
				},
				error: function(){
					swal('Something went wrong');
				}
			});
		}
</script>
