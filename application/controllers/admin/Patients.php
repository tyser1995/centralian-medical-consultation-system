<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Patients extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if($this->session->userdata('id_user') == ''){
            redirect('login');
        }
        $this->load->library('form_validation');
        $this->load->helper(array('form'));
	}

  public function index()
  {
    $this->load->view('dashboard/admin/appointments');
  }


}
