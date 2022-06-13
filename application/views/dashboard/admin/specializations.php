

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
							<a href="#">Doctor Specializations</a>
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
									<h4 class="card-title">List of Specializations</h4>
									<button id="btnAdd" class="btn btn-secondary btn-round ml-auto">
										<i class="fa fa-plus"></i>
										Add Specialization
									</button>
								</div>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table id="multi-filter-select" class="display table table-striped table-hover" >
										<thead>
											<tr>
												<th>Specialization</th>
												<th>Option</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach($specializations as $row): ?>
											<tr>
												<td><?= $row->specialization?></td>
												<td>
													<div class="btn-group">
														<button type="button" class="btn btn-secondary" onclick="getEdit('<?= $row->id ?>')"><i class="fa fa-edit"></i></button>
														<button type="button" class="btn btn-danger" onclick="getDelete('<?= $row ->id ?>','<?= base_url()?>/admin/specializations/delete')"><i class="fa fa-trash"></i></button>
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

<?php $this->load->view('dashboard/admin/modal/add-specialization.php')?>
<?php $this->load->view('dashboard/class/delete.php')?>
<?php $this->load->view('dashboard/template/footer.php')?>

<script>
	$('#btnAdd').click(function(){
		$('#addRowModal').modal('show');
		$('#addRowModal').find('.modal-title').text('Specialization Details');
		$('#myForm').attr('action','<?php echo base_url() ?>admin/specializations/save');
	});

	function getEdit(id){
		$('#addRowModal').modal('show');
		$('#addRowModal').find('.modal-title').text('Specialization Details');
		$('#myForm').attr('action','<?php echo base_url() ?>admin/specializations/update');
		$('#btnssave').text('Update');

		$.ajax({
			type: 'ajax',
			method: 'post',
			url: '<?php echo base_url()?>admin/specializations/edit',
			data:{
				id:id,
				},
			async: false,
			dataType: 'text',
			success: function(response){
			var data = JSON.parse(response);
		
				$("#id").val(data[0].id);
				$("#specialization").val(data[0].specialization);
			
			},
			error: function(){
				swal('Something went wrong');
			}
		});
	}

</script>
