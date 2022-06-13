

<?php $this->load->view('dashboard/template/header.php')?>
<style>
	.logo-header[data-background-color=orange2] {
    background: #ff9e27!important;
} 

.navbar-header[data-background-color=orange] {
    background: #ffad46!important;
}
</style>
<?php $this->load->view('dashboard/template/sidebar.php')?>

		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="mt-2 mb-4">
						<h2 class="text-black pb-2">Announcement</h2>
					</div>
			

					<div class="row row-card-no-pd">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="card-head-row">
										<h4 class="card-title">Add new Announcement </h4>
										<button class="btn btn-danger btn-sm ml-auto" id="btnAdd"><i class="fa fa-plus"></i> Add</button>
									</div>
								</div>
								<div class="card-body">
									<div class="row">
										<div class="col-sm-6">
											<div class="form-group form-group-default">
												<label>* Announcement Title</label>
												<input  type="text" name="title" id="title"
												value="" class="form-control" placeholder="Announcement" required>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="form-group form-group-default">
												<label>* Announcement Description</label>
												<input  type="text" name="description" id="description"
												value="" class="form-control" placeholder="Description" required>
											</div>
										</div>


										<div class="col-md-12">
											<hr>
											<h3>Transaction in Queque</h3>
										</div>
										<div class="col-md-12">
											<div class="table-responsive">
												<table id="multi-filter-select" class="display table table-striped table-hover" >
													<thead>
														<tr>
															<th>Title</th>
															<th>Description</th>
															<th>Option</th>
														</tr>
													</thead>
													<tbody>
													<?php foreach($announcement as $announcement) :?>
														<tr>
															<td><?= $announcement->title?></td>
															<td><?= $announcement->description?></td>
															<td>
																<div class="btn-group">
																		<button class="btn btn-danger btn-sm" onclick="getDelete('<?= $announcement ->id_announcement ?>')"><i class="fa fa-trash"></i></button>
																</div>
															</td>
														</tr>
													<?php endforeach ?>
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

		

<?php $this->load->view('dashboard/template/footer.php')?>

<script>
$("#btnAdd").click(function(){
	
	let title = $("#title").val();
	let description = $("#description").val();

	$.ajax({
			type: 'ajax',
			method: 'post',
			url: '<?= base_url()?>queque/add_announcement',
			data:{
				title:title,
				description:description
			},
			// async: false,
			dataType: 'text',
			success: function(response){
				window.location.href="<?= base_url()?>queque/announcement";
			},
			error: function(){
					swal('Something went wrong');
			}
	});  

})

function getDelete(id_announcement){
	$.ajax({
			type: 'ajax',
			method: 'post',
			url: '<?= base_url()?>queque/ann_delete',
			data:{
				id_announcement:id_announcement
			},
			// async: false,
			dataType: 'text',
			success: function(response){
				window.location.href="<?= base_url()?>queque/announcement";
			},
			error: function(){
					swal('Something went wrong');
			}
	});  
}

</script>

