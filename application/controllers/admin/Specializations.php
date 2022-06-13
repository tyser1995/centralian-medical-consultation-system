<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Specializations extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if($this->session->userdata('id_user') == ''){
            redirect('login');
        }
        $this->load->library('form_validation');
        $this->load->helper(array('form'));
        $this->load->model('specializations_model');
	}

  public function index()
  {
    $data['specializations'] = $this->specializations_model->get();
    $this->load->view('dashboard/admin/specializations',$data);
  }

  public function save(){
    $this->specializations_model->save();
    $msg = "New specialization was succesfully created";
    $this->session->set_userdata('status_msg',$msg);
    $this->session->set_userdata('stat_msg_type','success');
    redirect('admin/specializations/');
  }

  public function edit(){
    $data = $this->specializations_model->edit();
    echo json_encode($data);
  }

  public function update(){
    $this->specializations_model->update();
    $msg = "Specialization was succesfully updated";
    $this->session->set_userdata('status_msg',$msg);
    $this->session->set_userdata('stat_msg_type','success');
    redirect('admin/document_categories/');
  }

  public function delete(){
    $this->specializations_model->delete();
  }

}
