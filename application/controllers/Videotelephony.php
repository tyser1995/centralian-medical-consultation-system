<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Videotelephony extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if($this->session->userdata('id_user') == ''){
            redirect('login');
        }
        $this->load->library('form_validation');
        $this->load->helper(array('form'));
        $this->load->model('videotelephony_model');

	}

  public function index(){
    $data['videotelephony'] = $this->videotelephony_model->get();
    $this->videotelephony_model->mark_as_seen();
    $this->load->view('dashboard/videotelephony',$data);
  }

  public function save(){
    $this->videotelephony_model->save();
    $msg = "New url or link was succesfully added";
    $this->session->set_userdata('status_msg',$msg);
    $this->session->set_userdata('stat_msg_type','success');
    redirect($_SERVER['HTTP_REFERER']);
  }

  public function edit(){
    $data = $this->videotelephony_model->edit();
    echo json_encode($data);
  }

  public function update(){
    $this->videotelephony_model->update();
    $msg = "Url or link was succesfully updated";
    $this->session->set_userdata('status_msg',$msg);
    $this->session->set_userdata('stat_msg_type','success');
    redirect($_SERVER['HTTP_REFERER']);
  }

  public function delete(){
    $this->videotelephony_model->delete();
  }
}
