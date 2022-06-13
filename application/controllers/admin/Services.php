<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if($this->session->userdata('id_user') == ''){
            redirect('login');
        }
        $this->load->library('form_validation');
        $this->load->helper(array('form'));
        $this->load->model('services_model');
	}

  public function index()
  {
    $data['services'] = $this->services_model->get();
    $this->load->view('dashboard/admin/services',$data);
  }

  public function save(){
    $this->services_model->save();
    $msg = "New service was succesfully created";
    $this->session->set_userdata('status_msg',$msg);
    $this->session->set_userdata('stat_msg_type','success');
    redirect($_SERVER['HTTP_REFERER']);
  }

  public function edit(){
    $data = $this->services_model->edit();
    echo json_encode($data);
  }

  public function update(){
    $this->services_model->update();
    $msg = "Service was succesfully updated";
    $this->session->set_userdata('status_msg',$msg);
    $this->session->set_userdata('stat_msg_type','success');
    redirect($_SERVER['HTTP_REFERER']);
  }

  public function delete(){
    $this->services_model->delete();
  }

}
