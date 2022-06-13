

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
							<a href="#">Teacher Management</a>
						</li>
					</ul>
				</div>
				<div class="row row-card-no-pd">
					<div class="col-md-12">
						<div class="card">
							<div class="card-header">
								<div class="card-head-row">
									<h4 class="card-title">List of <?= ucfirst($this->uri->segment(4)) ?></h4>
									<button id="btnAdd" class="btn btn-secondary btn-round ml-auto">
										<i class="fa fa-plus"></i>
										Add <?= ucfirst(  substr_replace($this->uri->segment(4), "", -1) ) ?>
									</button>
								</div>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table id="multi-filter-select" class="display table table-striped table-hover" >
										<thead>
											<tr>
												<th>Name</th>
												<th>Birthday</th>
												<th>Gender</th>
												<th>Email</th>
												<th>Contact</th>
												<th>Option</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach($users as $table_row) :?>
												<tr>
													<td><?= $table_row->name?></td>
													<td><?= $table_row->birthday?></td>
													<td><?= $table_row->gender?></td>
													<td><?= $table_row->email?></td>
													<td><?= $table_row->contact?></td>
													<td>
														<div class="btn-group">
															<button title="Edit" class="form-control btn-warning btn-sm br-0" onclick="getEdit('<?= $table_row->id ?>','<?= $table_row->id_user_role ?>')"><i class="fa fa-edit"></i></button>
															
															<button title="Delete" class="form-control btn-danger btn-sm br-0" onclick="getDelete('<?= $table_row ->id ?>','<?= base_url()?>/user/delete')"><i class="fa fa-trash"></i></button>
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

<?php $this->load->view('dashboard/admin/modal/add-user.php')?>
<?php $this->load->view('dashboard/class/delete.php')?>
<?php $this->load->view('dashboard/template/footer.php')?>
<?php $this->load->view('dashboard/class/notification.php')?>
<?php $this->load->view('dashboard/class/save-user-form.php')?>
<?php $this->load->view('dashboard/class/upload-picture-ajax.php')?>

<script>
	$('#btnAdd').click(function(){
		$('#addRowModal').modal('show');
		$('#addRowModal').find('.modal-title').text('<?= ucfirst(  substr_replace($this->uri->segment(4), "", -1) ) ?> Details');
		$('#myForm').attr('action','<?php echo base_url() ?>user/add_user');
		$("#btnssave").attr('data-operation','add');
	});

	$("#file").change(function(){
		
		var userfile = $(this).prop('files');

		var temp_photo_arr = $("#temp_photo_arr").val();
		var name = document.getElementById("file").files[0].name;
		var form_data = new FormData();
		var ext = name.split('.').pop().toLowerCase();

		if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) 
		{
		alert("Invalid Image File");
		}
		var oFReader = new FileReader();
		oFReader.readAsDataURL(document.getElementById("file").files[0]);
		var f = document.getElementById("file").files[0];
		var fsize = f.size||f.fileSize;
		if(fsize > 2000000)
		{
		alert("Image File Size is very big");
		}
		else
		{
		form_data.append("file", document.getElementById('file').files[0]);
		$.ajax({
			url: "<?= base_url() ?>user/upload_profile_pic/" + temp_photo_arr,
			method:"POST",
			data: form_data,
			contentType: false,
			cache: false,
			processData: false,
			beforeSend:function(){
				$('.uploaded_image').html("<label class='text-success'>Image Uploading...</label>");
			},   
			success:function(response){
				var split_img = response.split(',');
				$('.uploaded_image').html(split_img[0]);
				$("#temp_photo_arr").val(split_img[1]);
			}
		});
		}
	})

	function getEdit(id,id_user_role){
		$('#addRowModal').modal('show');
		$('#addRowModal').find('.modal-title').text('Update User');
		$('#myForm').attr('action','<?php echo base_url() ?>/user/update');
		$('#btnSaveProduct').text('Update');
		$("#username").attr('required',false);
		$("#password").attr('required',false);
		$("#btnssave").attr('data-operation','edit');
		

		$.ajax({
			type: 'ajax',
			method: 'post',
			url: '<?php echo base_url()?>user/edit',
			data:{
				id:id,
				id_user_role:id_user_role
				},
			async: false,
			dataType: 'text',
			success: function(response){
			var data = JSON.parse(response);
		
				$("#id").val(data[0].id);
				$("#first_name").val(data[0].first_name);
				$("#middle_name").val(data[0].middle_name);
				$("#last_name").val(data[0].last_name);
				$("#birthday").val(data[0].birthday);
				$("#gender").val(data[0].gender);
				$("#nationality").val(data[0].nationality);
				$("#civil_status").val(data[0].civil_status);
				$("#religion").val(data[0].religion);
				$("#email").val(data[0].email);
				$("#contact").val(data[0].contact);
				$("#address").val(data[0].address);
				$("#id_user_role").val(data[0].id_user_role);
				$("#temp_photo_arr").val(data[0].picture);
				// $("#btnssave").attr('data-picture',data[0].picture);
				$(".profilepic").attr({'src': '<?= base_url()?>public/uploads/dp/'+data[0].picture});
				if(data[0].id_user_role == 4){ // Doctor
					$("#id_specialization").val(data[0].id_specialization);
					$("#description").val(data[0].description);
				}
				if(data[0].id_user_role == 3){ // Patient
					$("#eci_fullname").val(data[0].eci_fullname);
					$("#eci_contact").val(data[0].eci_contact);
					$("#eci_address").val(data[0].eci_address);
					$("#medical_history").val(data[0].medical_history);
				}
			
			},
			error: function(){
				swal('Something went wrong');
			}
		});
	}

</script>
