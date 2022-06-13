<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Customlib
{

    public $CI;

    public function __construct()
    {
        $this->CI = &get_instance();
        $this->CI->load->library('upload'); 
        $this->CI->load->model('user_model');
        $this->CI->load->model('notifications_model');
        $this->CI->load->model('appointments_model');
        $this->CI->load->model('videotelephony_model');
    }

    public function identifyUserRole($user_type){
        if($user_type == 'patients'){
            return 3;
        }
        if($user_type == 'doctors'){
            return 4;
        }
        if($user_type == 'nurses'){
            return 5;
        }
    }

    public function checkUsername($username,$id){
        return $this->CI->user_model->checkUsername($username,$id);
    }

    public function checkLogin(){
        if($this->CI->session->userdata('id_user') == ''){
            redirect('login');
        }
    }

    public function upload($path,$file_name,$allowed_types){
        if(!empty($file_name)){
            $config['upload_path']          = $path;
            $config['allowed_types']        = $allowed_types;
            $config['max_size']             = 0; // INFINIT 0
            $config['max_width']            = 0; // INFINIT 0
            $config['max_height']           = 0; // INFINIT 0
            $new_name                       = time().$file_name;
            $config['file_name']            = $new_name;
    
            $this->CI->upload->initialize($config); 
          
            if($this->CI->upload->do_upload())
            {
                $data = array('upload_data' => $this->CI->upload->data());
                $new_name = str_replace(' ','_',$new_name);
                return $new_name;
            }else{
                print_r($this->CI->upload->display_errors());die($this->CI->upload->display_errors());
                return false;
            }
        }else{
            return  '';
        }
    }

    public function notifications_counter(){
        $data =  $this->CI->notifications_model->notifications_counter();
        return count($data);
    }

    public function appointment_counter($status){
        $data =  $this->CI->appointments_model->appointment_counter($status);
        return count($data);
    }

    public function videotelephony_counter(){
        $data =  $this->CI->videotelephony_model->videotelephony_counter();
        return count($data);
    }
}
