<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Illnesses extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper(array('form'));
        $this->load->model('illnesses_model');
	}

  public function index()
  {
    $data['illneses'] = $this->illnesses_model->get();
    $this->load->view('dashboard/admin/illnesses',$data);
  }

  public function save(){
    $this->illnesses_model->save();
    $msg = "New illness was succesfully created";
    $this->session->set_userdata('status_msg',$msg);
    $this->session->set_userdata('stat_msg_type','success');
    redirect($_SERVER['HTTP_REFERER']);
  }

  public function edit(){
    $data = $this->illnesses_model->edit();
    echo json_encode($data);
  }

  public function update(){
    $this->illnesses_model->update();
    $msg = "Illness was succesfully updated";
    $this->session->set_userdata('status_msg',$msg);
    $this->session->set_userdata('stat_msg_type','success');
    redirect($_SERVER['HTTP_REFERER']);
  }

  public function delete(){
    $this->illnesses_model->delete();
  }

}
