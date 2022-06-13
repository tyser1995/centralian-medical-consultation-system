<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload_picture_ajax extends CI_Controller {

    public function __construct(){
      parent::__construct();
      if($this->session->userdata('id_user') == ''){
          redirect('login');
      }
      $this->load->library('form_validation');
      $this->load->helper(array('form'));
      $this->load->model('user_model');
	}

    public function upload_picture($usage, $temp_photo_arr = NULL){
        if($usage == 'stool'){
            $path = 'public/uploads/stools/';
        }
        if($usage == 'xray'){
            $path = 'public/uploads/xray/';
        }

        if($temp_photo_arr != NULL){
            unlink($path.$temp_photo_arr);
        }

        $raw_name = explode('.', $_FILES["file"]["name"]);
        $ext = end($raw_name);
        $code = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 10)), 0, 10);
        $name = $code.rand(10000, 99999) . '.' . $ext;
        $location = $path.$name;  
        move_uploaded_file($_FILES["file"]["tmp_name"], $location);
        echo '<img src="'.base_url().$location.'" style="width:100%" class="img-thumbnail" />,'.$name;
    }
}
