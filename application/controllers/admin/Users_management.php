<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_management extends CI_Controller {

    public function __construct(){
      parent::__construct();
      if($this->session->userdata('id_user') == ''){
          redirect('login');
      }
      $this->load->library('form_validation');
      $this->load->helper(array('form'));
      $this->load->model('user_model');
      $this->load->model('specializations_model');
	}

  public function index($user_role)
  {
    $data['specializations'] = $this->specializations_model->get();
    $data['users'] = $this->user_model->getUsers($this->customlib->identifyUserRole($user_role));
    $this->load->view('dashboard/admin/users-management',$data);
  }


}
