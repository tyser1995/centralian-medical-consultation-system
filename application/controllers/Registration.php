<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends CI_Controller {

    public function __construct(){
        parent::__construct();

        if($this->session->userdata('id_user') == ''){
            redirect('login');
        }
 
        $this->load->library('form_validation');
        $this->load->helper(array('form'));
        $this->load->model('user_model');
        $this->load->model('driver_type_model');
        $this->load->model('car_brand_model');
        $this->load->model('car_type_model');
        $this->load->model('registration_model');

	}

  public function index()
  {
    $data['get_driver_type'] = $this->driver_type_model->get_driver_type();
    $data['get_car_brand'] = $this->car_brand_model->get_car_brand();
    $data['get_car_type'] = $this->car_type_model->get_car_type();
    $this->load->view('dashboard/index',$data);
  }
  
  public function add(){

    $result = $this->registration_model->check_duplicate($this->input->post('plate'));

    if($result == FALSE){
      $this->form_validation->set_rules('last_name', 'last_name', 'trim|required|xss_clean');
      $this->form_validation->set_rules('first_name', 'first_name', 'trim|required|xss_clean');
      $this->form_validation->set_rules('middle_name', 'middle_name', 'trim|required|xss_clean');
      $this->form_validation->set_rules('address', 'address', 'trim|required|xss_clean');
      $this->form_validation->set_rules('contact_nos', 'contact_nos', 'trim|required|xss_clean');
      $this->form_validation->set_rules('id_driver_type', 'id_driver_type', 'trim|required|xss_clean');
      $this->form_validation->set_rules('plate', 'plate', 'trim|required|xss_clean');
      $this->form_validation->set_rules('id_car_type', 'id_car_type', 'trim|required|xss_clean');
      $this->form_validation->set_rules('id_car_brand', 'id_car_brand', 'trim|required|xss_clean');
      $this->form_validation->set_rules('car_color', 'car_color', 'trim|required|xss_clean');
  
      if ($this->form_validation->run() == FALSE) {
        $msg = "Failed: Kindly fill all the required field";
        $this->session->set_userdata('result_msg',$msg);
        $this->session->set_userdata('result_type','danger');
      }else{
  
        if (isset($_FILES["driver_image"]) && !empty($_FILES['driver_image']['name'])) {
          $fileInfo = pathinfo($_FILES["driver_image"]["name"]);
          $driver_image = 'vi'.date("ymdhis"). '.' . $fileInfo['extension'];
          move_uploaded_file($_FILES["driver_image"]["tmp_name"], "./public/uploads/driver-image/" . $driver_image);
        }else{
          $driver_image = '';
        }
  
        if (isset($_FILES["vehicle_image"]) && !empty($_FILES['vehicle_image']['name'])) {
          $fileInfo = pathinfo($_FILES["vehicle_image"]["name"]);
          $vehicle_image = 'vi'.date("ymdhis"). '.' . $fileInfo['extension'];
          move_uploaded_file($_FILES["vehicle_image"]["tmp_name"], "./public/uploads/car-image/" . $vehicle_image);
        }else{
          $vehicle_image = '';
        }
  
        if (isset($_FILES["vehicle_or"]) && !empty($_FILES['vehicle_or']['name'])) {
          $fileInfo = pathinfo($_FILES["vehicle_or"]["name"]);
          $vehicle_or = 'vor'.date("ymdhis"). '.' . $fileInfo['extension'];
          move_uploaded_file($_FILES["vehicle_or"]["tmp_name"], "./public/uploads/car-or/" . $vehicle_or);
        }else{
          $vehicle_or = '';
        }
  
        if (isset($_FILES["vehicle_cr"]) && !empty($_FILES['vehicle_cr']['name'])) {
          $fileInfo = pathinfo($_FILES["vehicle_cr"]["name"]);
          $vehicle_cr = 'vcr'.date("ymdhis"). '.' . $fileInfo['extension'];
          move_uploaded_file($_FILES["vehicle_cr"]["tmp_name"], "./public/uploads/car-cr/" . $vehicle_cr);
        }else{
          $vehicle_cr = '';
        }
  
        if (isset($_FILES["receipt"]) && !empty($_FILES['receipt']['name'])) {
          $fileInfo = pathinfo($_FILES["receipt"]["name"]);
          $receipt = 'rec'.date("ymdhis"). '.' . $fileInfo['extension'];
          move_uploaded_file($_FILES["receipt"]["tmp_name"], "./public/uploads/receipt/" . $receipt);
        }else{
          $receipt = '';
        }
  
        $result = $this->registration_model->add($driver_image,$vehicle_image,$vehicle_or,$vehicle_cr,$receipt);
        if($result == true){
          $msg = "New Car/Vehicle was registered successfully!";
          $this->session->set_userdata('result_msg',$msg);
          $this->session->set_userdata('result_type','success');
        }else{
          $msg = "Something went wrong in the backend!";
          $this->session->set_userdata('result_msg',$msg);
          $this->session->set_userdata('result_type','danger');
        }
      }
      redirect('registration/');
    }else{
      $msg = "Plate number is already registered in this school year!";
      $this->session->set_userdata('result_msg',$msg);
      $this->session->set_userdata('result_type','danger');
      redirect('registration/');
    }


  }

  public function update($status){

    $this->form_validation->set_rules('last_name', 'last_name', 'trim|required|xss_clean');
    $this->form_validation->set_rules('first_name', 'first_name', 'trim|required|xss_clean');
    $this->form_validation->set_rules('middle_name', 'middle_name', 'trim|required|xss_clean');
    $this->form_validation->set_rules('address', 'address', 'trim|required|xss_clean');
    $this->form_validation->set_rules('contact_nos', 'contact_nos', 'trim|required|xss_clean');
    $this->form_validation->set_rules('id_driver_type', 'id_driver_type', 'trim|required|xss_clean');
    $this->form_validation->set_rules('plate', 'plate', 'trim|required|xss_clean');
    $this->form_validation->set_rules('id_car_type', 'id_car_type', 'trim|required|xss_clean');
    $this->form_validation->set_rules('id_car_brand', 'id_car_brand', 'trim|required|xss_clean');
    $this->form_validation->set_rules('car_color', 'car_color', 'trim|required|xss_clean');

    if ($this->form_validation->run() == FALSE) {
      $msg = "Failed: Kindly fill all the required field";
      $this->session->set_userdata('result_msg',$msg);
      $this->session->set_userdata('result_type','danger');
    }else{

      if (isset($_FILES["driver_image"]) && !empty($_FILES['driver_image']['name'])) {
        $fileInfo = pathinfo($_FILES["driver_image"]["name"]);
        $driver_image = 'vi'.date("ymdhis"). '.' . $fileInfo['extension'];
        move_uploaded_file($_FILES["driver_image"]["tmp_name"], "./public/uploads/driver-image/" . $driver_image);
      }else{
        $driver_image = '';
      }


      if (isset($_FILES["vehicle_image"]) && !empty($_FILES['vehicle_image']['name'])) {
        $fileInfo = pathinfo($_FILES["vehicle_image"]["name"]);
        $vehicle_image = 'vi'.date("ymdhis"). '.' . $fileInfo['extension'];
        move_uploaded_file($_FILES["vehicle_image"]["tmp_name"], "./public/uploads/car-image/" . $vehicle_image);
      }else{
        $data_img = '';
      }

      if (isset($_FILES["vehicle_or"]) && !empty($_FILES['vehicle_or']['name'])) {
        $fileInfo = pathinfo($_FILES["vehicle_or"]["name"]);
        $vehicle_or = 'vor'.date("ymdhis"). '.' . $fileInfo['extension'];
        move_uploaded_file($_FILES["vehicle_or"]["tmp_name"], "./public/uploads/car-or/" . $vehicle_or);
      }else{
        $data_img = '';
      }

      if (isset($_FILES["vehicle_cr"]) && !empty($_FILES['vehicle_cr']['name'])) {
        $fileInfo = pathinfo($_FILES["vehicle_cr"]["name"]);
        $vehicle_cr = 'vcr'.date("ymdhis"). '.' . $fileInfo['extension'];
        move_uploaded_file($_FILES["vehicle_cr"]["tmp_name"], "./public/uploads/car-cr/" . $vehicle_cr);
      }else{
        $data_img = '';
      }

      if (isset($_FILES["receipt"]) && !empty($_FILES['receipt']['name'])) {
        $fileInfo = pathinfo($_FILES["receipt"]["name"]);
        $receipt = 'rec'.date("ymdhis"). '.' . $fileInfo['extension'];
        move_uploaded_file($_FILES["receipt"]["tmp_name"], "./public/uploads/receipt/" . $receipt);
      }else{
        $receipt = '';
      }

      $result = $this->registration_model->update($driver_image,$vehicle_image,$vehicle_or,$vehicle_cr,$receipt);
      if($result == true){
        $msg = "Registratin vehicle was updated successfully!";
        $this->session->set_userdata('result_msg',$msg);
        $this->session->set_userdata('result_type','success');
      }else{
        $msg = "Something went wrong in the backend!";
        $this->session->set_userdata('result_msg',$msg);
        $this->session->set_userdata('result_type','danger');
      }
    }
    redirect('registration/get_car_registration/'.$status);

  }

  public function get_car_registration($status){
    $data['get_driver_type'] = $this->driver_type_model->get_driver_type();
    $data['get_car_brand'] = $this->car_brand_model->get_car_brand();
    $data['get_car_type'] = $this->car_type_model->get_car_type();
    $data['get_car_registration'] = $this->registration_model->get_car_registration('',$status);
    $this->load->view('dashboard/car_mngt',$data);
  }

  public function get_car_reg_details(){
    $id_car_registration = $this->input->post('id_car_registration');
    $status = $this->input->post('status');
    $data = $this->registration_model->get_car_registration($id_car_registration,$status);
    echo json_encode($data);
  }

  public function change_status($status){
    $this->registration_model->change_status($status);
  }

  public function getNotify(){
    $this->registration_model->getNotify();
  }

  public function getRenew(){
    $this->registration_model->getRenew();
  }

  public function delete(){
    $this->registration_model->delete();
  }

  public function sticker($id_car_registration){
    $data = $this->registration_model->get_car_registration($id_car_registration,'');
    foreach($data as $row){
      $data['name'] = $row->name;
      $data['car_type'] = $row->car_type;
      $data['car_brand'] = $row->car_brand;
      $data['plate'] = $row->plate;
      $data['car_color'] = $row->car_color;
    }
    $this->load->view('dashboard/sticker',$data);
  }

  public function yearly_renewal(){
    $data['get_car_registration'] = $this->registration_model->get_car_registration('','');
    $this->load->view('dashboard/yearly_renewal',$data);
  }

}
