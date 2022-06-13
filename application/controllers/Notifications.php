<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notifications extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if($this->session->userdata('id_user') == ''){
            redirect('login');
        }
        $this->load->library('form_validation');
        $this->load->helper(array('form'));
        $this->load->model('notifications_model');

	}

  public function index(){
    $data['notifications'] = $this->notifications_model->get();
    $this->notifications_model->mark_as_seen();
    $this->load->view('dashboard/notifications',$data);
  }

}
