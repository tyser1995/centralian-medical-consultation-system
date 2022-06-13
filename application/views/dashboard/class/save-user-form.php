<script>
    	$("#btnssave").click(function(e){
		e.preventDefault();
		var data = {};
		let dataArray = $('#myForm').serializeArray();
		let operation = $(this).attr('data-operation');
		let condition = '';
        console.log(dataArray);

		for(var i=0;i<dataArray.length;i++){
			if(operation == 'add'){
				condition = dataArray[i].name != 'id' && dataArray[i].name != 'picture';
			}else if(operation == 'edit'){
				condition = dataArray[i].name != 'id' && dataArray[i].name != 'picture' && dataArray[i].name != 'username' && dataArray[i].name != 'password' && dataArray[i].name != 'cpassword';
			}
			if(condition){
				if(dataArray[i].value == ''){
					swal('Please fill-up all the required fields','','warning');
					return false;
				}
			}
		}

		let eci_contact = $("#eci_contact").val();
		if(eci_contact != undefined){
			if (eci_contact.length != 11) {
				swal('Mobile number must be Must be 11 digits','','warning');
				return false;
			}
		}

		let contact = $("#contact").val();
		if (contact.length != 11) {
            swal('Mobile number must be Must be 11 digits','','warning');
            return false;
        }


		let id = $("#id").val();
		let username = $("#username").val();
		let password = $("#password").val();
		let cpassword = $("#cpassword").val();
		if(password != cpassword){
			swal('Password didnt match','','warning');
			return false;
		}

		let is_existed = 'no';
		$.ajax({
			type: 'ajax',
			method: 'post',
			url: '<?php echo base_url()?>user/checkUsername',
			data:{
				id:id,
				username:username
				},
			async: false,
			dataType: 'text',
			success: function(response){
				if(response == 'existed'){
					is_existed = 'yes';
				}
			},
			error: function(){
				swal('Something went wrong');
			}
		});

		if(is_existed == 'yes'){
			swal('Username is already existing','','warning');
			return false;
		}

		$("#myForm").submit();

	})
</script>