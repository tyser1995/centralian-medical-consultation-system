

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
							<a href="#">Notifications</a>
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
									<h4 class="card-title">List of Notifications</h4>
								</div>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table id="multi-filter-select1" class="display table table-striped table-hover" >
										<thead>
											<tr>
												<th>Notification</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach($notifications as $row): ?>
											<tr>
												<td><?= $row->message?></td>
										
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

<?php $this->load->view('dashboard/admin/modal/add-service.php')?>
<?php $this->load->view('dashboard/class/delete.php')?>
<?php $this->load->view('dashboard/template/footer.php')?>

<script>
	$('#btnAdd').click(function(){
		$('#addRowModal').modal('show');
		$('#addRowModal').find('.modal-title').text('Service Details');
		$('#myForm').attr('action','<?php echo base_url() ?>admin/services/save');
	});

	function getEdit(id){
		$('#addRowModal').modal('show');
		$('#addRowModal').find('.modal-title').text('Service Details');
		$('#myForm').attr('action','<?php echo base_url() ?>admin/services/update');
		$('#btnssave').text('Update');

		$.ajax({
				type: 'ajax',
				method: 'post',
				url: '<?php echo base_url()?>admin/services/edit',
				data:{
					id:id,
					},
				async: false,
				dataType: 'text',
				success: function(response){
				var data = JSON.parse(response);
			
					$("#id").val(data[0].id);
					$("#service").val(data[0].service);
					$("#fee").val(data[0].fee);
				
				},
				error: function(){
					swal('Something went wrong');
				}
			});
		}
</script>
