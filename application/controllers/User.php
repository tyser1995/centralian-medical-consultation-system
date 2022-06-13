<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct(){
        parent::__construct();
 
        $this->load->library('form_validation');
        $this->load->helper(array('form'));
        $this->load->model('user_model');
        $this->load->model('report_model');
	}

	public function index()
	{
        if($_SESSION['id_user_role'] == 1){
            $data['report'] = $this->report_model->statistics();
        }

        if($_SESSION['id_user_role'] == 3){
            $data['report'] = $this->report_model->patient_statistics();
        }

        if($_SESSION['id_user_role'] == 4){
            $data['report'] = $this->report_model->doctor_statistics();
        }

        $this->customlib->checkLogin();
		$this->load->view('dashboard/index',$data);
    }
    
    public function profile()
	{
        $this->customlib->checkLogin();
		$this->load->view('dashboard/profile');
    }
    
    public function edit_profile($id)
	{
        $this->customlib->checkLogin();
        if($this->input->post()){
            $this->form_validation->set_rules('name','Name is required','required');
            $this->form_validation->set_rules('contact','Contact is required','required');
            $this->form_validation->set_rules('email','Email is required','required');
            $this->form_validation->set_rules('username','Usrname is required','required');
            $this->form_validation->set_rules('password','Password is required','required');
            $this->form_validation->set_rules('picture','Picture is required','required');
            $this->form_validation->set_rules('status','Status is required','required');

            $this->upload->do_upload('userfile');
            $data = array('upload_data' => $this->upload->data());
            $_POST['picture'] = $data['upload_data']['file_name'];
            $this->user_model->edit_user($this->input->post(),$id);
            redirect('user/profile');
        }
	}

    public function add_user(){
        $result = $this->user_model->add_user();
        $status_msg = "Account created succesfully!";
        $this->session->set_userdata('status_type','success');
        $this->session->set_userdata('status_msg',$status_msg);
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function upload_profile_pic($temp_photo_arr = NULL){
        if($temp_photo_arr != NULL){
            unlink('public/uploads/dp/'.$temp_photo_arr);
        }
        // die('x');
        $raw_name = explode('.', $_FILES["file"]["name"]);
        $ext = end($raw_name);
        $name = rand(100000, 999999) . '.' . $ext;
        $location = 'public/uploads/dp/' . $name;  
        move_uploaded_file($_FILES["file"]["tmp_name"], $location);
        echo '<img src="'.base_url().$location.'" style="width:100%" class="img-thumbnail" />,'.$name;
    }

    public function delete(){
        $this->customlib->checkLogin();
        $this->user_model->delete();
    }

    public function edit(){
        $this->customlib->checkLogin();
        $data = $this->user_model->edit();
        echo json_encode($data);
    }
      
    public function update(){
        $this->customlib->checkLogin();
        $this->user_model->update();
        $msg = "User was succesfully updated";
        $this->session->set_userdata('status_msg',$msg);
        $this->session->set_userdata('status_type','success');
        redirect($_SERVER['HTTP_REFERER']);
    }
    
    public function checkUsername(){
        $this->customlib->checkLogin();
        $id = $this->input->post('id');
        $username = $this->input->post('username');
        $result =  $this->customlib->checkUsername($username,$id);
        if($result == true){
            echo 'existed';
        }else{
            echo 'not_exist';
        }
    }

    public function update_display_profile(){
        $path = 'public/uploads/dp/';
        $file_name = $_FILES["userfile"]['name'];
        $allowed_types = 'gif|jpg|jpeg|png|GIF|JPG|PNG|JPEG';
        $picture = $this->customlib->upload($path,$file_name,$allowed_types);
        if($picture == false){
            $msg = "The filetype you are attempting to upload is not allowed.";
            $this->session->set_userdata('status_type','warning');
        }else{
            $this->user_model->update_display_profile($picture);
            $msg = "Display picture was succesfully updated";
            $this->session->set_userdata('status_type','success');
        }
       
        $this->session->set_userdata('status_msg',$msg);
        redirect('user/profile');
    }

    
    public function update_user_account(){
        $operation = 'update';
        if($this->user_model->check_duplicate_staff($operation)){
            $msg = "Maybe mobile number or email is already used by the other user";
            $this->session->set_userdata('status_msg',$msg);
            $this->session->set_userdata('status_type','warning');
        }else{
            $operation = 'update';
            $result = $this->user_model->update_user_account($update);
            $_SESSION['accounts_id'] = $this->input->post('accounts_id');
            $_SESSION['first_name'] = $this->input->post('first_name');
            $_SESSION['middle_name'] = $this->input->post('middle_name');
            $_SESSION['last_name'] = $this->input->post('last_name');
            $_SESSION['email'] = $this->input->post('email');
            $_SESSION['contact'] = $this->input->post('contact');
            $_SESSION['username'] = $this->input->post('username');
            $_SESSION['address'] = $this->input->post('address');

            $msg = "Your account was succesfully updated";
            $this->session->set_userdata('status_msg',$msg);
            $this->session->set_userdata('status_type','success');
        }
        redirect('user/profile/');
    }

    public function update_account_password(){
        $current_password = $this->input->post('current_password');
        $new_password = $this->input->post('new_password');
        $confirm_password = $this->input->post('confirm_password');
       
        if(!password_verify($current_password,$_SESSION['password'])){
            $msg = "Please check your current password";
            $this->session->set_userdata('status_type','warning');
        }else{
            if($new_password != $confirm_password){
                $msg = "Password didnt match";
                $this->session->set_userdata('status_type','warning');
            }else{
                $result = $this->user_model->update_account_password($new_password);
                $msg = "Account password was succesfully updated";
                $this->session->set_userdata('status_type','success');
            }
        }
        $this->session->set_userdata('status_msg',$msg);
        redirect('user/profile/');
    }
    
}
