<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Appointments extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper(array('form'));
        $this->load->model('appointments_model');
        $this->load->model('illnesses_model');
        $this->load->model('services_model');
        $this->load->model('user_model');
        $this->load->model('videotelephony_model');
	}

  public function index($appt_status){
    $this->customlib->checkLogin();
    $data['illnesses'] = $this->illnesses_model->get();
    $data['services'] = $this->services_model->get();
    $data['doctors'] = $this->user_model->getUsers(4);
    $data['appointments'] = $this->appointments_model->get($appt_status);
    $this->load->view('dashboard/admin/appointments',$data);
  }

  public function online_appointment()
  {
    $data['barangays'] = $this->appointments_model->getBarangay();
    $this->load->view('online-appointment',$data);
  }

  public function save(){
    $this->appointments_model->save();
    $msg = "Appointment was successfully Created";
    $this->session->set_userdata('status_msg',$msg);
    $this->session->set_userdata('status_type','success');
    redirect($_SERVER['HTTP_REFERER']);
  }

  public function saveRatings(){
    $data = $this->input->post();
    $this->appointments_model->saveRatings($data);
    $msg = "Ratings was submitted Successfully";
    $this->session->set_userdata('status_msg',$msg);
    $this->session->set_userdata('status_type','success');
    redirect($_SERVER['HTTP_REFERER']);
  }

  public function cancel(){
    $this->appointments_model->cancel();
    $msg = "Appointment was cancelled";
    $this->session->set_userdata('status_msg',$msg);
    $this->session->set_userdata('status_type','success');
    redirect($_SERVER['HTTP_REFERER']);
  }

  public function view(){
    $appt_status = '-';
    $data = $this->appointments_model->get($appt_status);
    echo json_encode($data);
  }

  public function appt_ratings(){
    $id = $this->input->post('id');
    $data = $this->appointments_model->appt_ratings($id);
    echo json_encode($data);
  }

  public function update(){
    $this->appointments_model->update();
    $msg = "Appointment was succesfully updated";
    $this->session->set_userdata('status_msg',$msg);
    $this->session->set_userdata('status_type','success');
    redirect($_SERVER['HTTP_REFERER']);
  }

  public function updateAndComplete(){
    $this->appointments_model->updateAndComplete();
    $msg = "Appointment was updated and marks as completed";
    $this->session->set_userdata('status_msg',$msg);
    $this->session->set_userdata('status_type','success');
  }

  public function doctor_remarks(){
    $this->appointments_model->doctor_remarks();
    $msg = "Remarks was successfully updated";
    $this->session->set_userdata('status_msg',$msg);
    $this->session->set_userdata('status_type','success');
    redirect($_SERVER['HTTP_REFERER']);
  }

  public function patient_remarks(){
    $this->appointments_model->patient_remarks();
    $msg = "Stool and X-ray was successfully updated";
    $this->session->set_userdata('status_msg',$msg);
    $this->session->set_userdata('status_type','success');
    redirect($_SERVER['HTTP_REFERER']);
  }

  public function resched_appt(){
    $this->appointments_model->resched_appt();
    $msg = "Record was successfully updated";
    $this->session->set_userdata('status_msg',$msg);
    $this->session->set_userdata('status_type','success');
    redirect($_SERVER['HTTP_REFERER']);
  }

  public function add_invitation_link(){
    $this->appointments_model->add_invitation_link();
    $msg = "Invitation Link was successfully added";
    $this->session->set_userdata('status_msg',$msg);
    $this->session->set_userdata('status_type','success');
    redirect($_SERVER['HTTP_REFERER']);
  }
}
