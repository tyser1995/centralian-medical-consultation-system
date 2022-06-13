<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Record Management System for Health Office</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="<?= base_url()?>/public/assets/img/icon.ico" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="<?= base_url()?>/public/assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['<?= base_url()?>/public/assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="<?= base_url()?>/public/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url()?>/public/assets/css/atlantis.min.css">
	<link rel="stylesheet" href="<?= base_url()?>/public/assets/css/jrey.css">

	<!-- CSS Just for demo purpose, don't include it in your project -->
</head>
<body data-background-color="bg2">
	<div class="">
		<div class="">

            <div class="col-md-8 ml-auto mr-auto m-top-50">
                <div class="alert alert-info" role="alert">
                    Do you have an account? Kindly login <a href="<?= base_url()?>login">here</a> to see your appointment and medical record.
                </div>
                <div class="card">
                    <div class="card-header text-center" style="background-color:#2C1870">
                        <div class="card-title text-white" style="font-size:17px;">ONLINE REGISTRATION FORM</div>
                    </div>
                    <div class="card-body pb-0">
                    <?php $this->load->view('dashboard/class/add-user-form.php')?>
                    <div class="row p-3" id="data_for_edit">                  
                        <div class="col-md-3"></div>
                        <div class="col-md-9">
                            <button type="submit" id="btnssave" class="btn btn-secondary btn-block" data-operation="add"><i class="fa fa-save"></i> Save</button>
                        </div>
                    </div>
                    </div>
                </div>

                <div class=" text-center">
                    <!-- For Online Appointment Click <a href="#">Here</a>! -->
                </div>
            </div>
		<!-- End Custom template -->
	</div>
	<!--   Core JS Files   -->
	<script src="<?= base_url()?>/public/assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="<?= base_url()?>/public/assets/js/core/popper.min.js"></script>
	<script src="<?= base_url()?>/public/assets/js/core/bootstrap.min.js"></script>
	<!-- Sweet Alert -->
	<script src="<?= base_url()?>public/assets/js/plugin/sweetalert/sweetalert.min.js"></script>

</body>
</html>

<?php $this->load->view('dashboard/class/save-user-form.php')?>
<?php $this->load->view('dashboard/class/upload-picture-ajax.php')?>

<?php  
if($this->session->userdata('status_msg')){
?>
<script>
    window.location.replace("<?= base_url() ?>/login");
</script>
<?php
}
?>
