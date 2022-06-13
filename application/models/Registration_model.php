<?php

class Registration_model extends MY_Model{

  public function get_car_brand(){
    $this->db->where("del_status",1);
    $query = $this->db->get("car_brand");
    return $query->result();
  }

  public function add($driver_image,$vehicle_image,$vehicle_or,$vehicle_cr,$receipt){

    $arr = array(
      'last_name'=>$this->input->post('last_name'),
      'first_name'=>$this->input->post('first_name'),
      'middle_name'=>$this->input->post('middle_name'),
      'address'=>$this->input->post('address'),
      'contact_nos'=>$this->input->post('contact_nos'),
      'email'=>$this->input->post('email'),
      'id_driver_type'=>$this->input->post('id_driver_type'),
      'plate'=>$this->input->post('plate'),
      'id_car_type'=>$this->input->post('id_car_type'),
      'id_car_brand'=>$this->input->post('id_car_brand'),
      'car_color'=>$this->input->post('car_color'),
      'driver_image'=>$driver_image,
      'vehicle_image'=>$vehicle_image,
      'vehicle_or'=>$vehicle_or,
      'vehicle_cr'=>$vehicle_cr,
      'receipt'=>$receipt,
      'remarks'=>$this->input->post('remarks'),
    );
    
    $this->db->insert('car_registration',$arr);
    
    $error = $this->db->error();
    if($error['code'] != 0){//HAS ERROR
      return false;
    }else{
      $contact = $this->input->post('contact_nos');
      $txt1 = "We have received your vehicle pass request and will evaluate submitted requirements";
      // die($contact.$txt1);
      $this->ItextMo($contact,$txt1);

      return true;
    }
  }

  public function update($driver_image,$vehicle_image,$vehicle_or,$vehicle_cr,$receipt){
    $id_car_registration = $this->input->post('id_car_registration');
    $arr = array(
      'last_name'=>$this->input->post('last_name'),
      'first_name'=>$this->input->post('first_name'),
      'middle_name'=>$this->input->post('middle_name'),
      'address'=>$this->input->post('address'),
      'contact_nos'=>$this->input->post('contact_nos'),
      'email'=>$this->input->post('email'),
      'id_driver_type'=>$this->input->post('id_driver_type'),
      'plate'=>$this->input->post('plate'),
      'id_car_type'=>$this->input->post('id_car_type'),
      'id_car_brand'=>$this->input->post('id_car_brand'),
      'car_color'=>$this->input->post('car_color'),
      'remarks'=>$this->input->post('remarks'),
    );
    
    $this->db->where('id_car_registration',$id_car_registration);
    $this->db->update('car_registration',$arr);

    if($vehicle_image != ''){
      $this->db->where('id_car_registration',$id_car_registration);
      $this->db->update('car_registration',array('driver_image'=>$driver_image));
    }

    if($vehicle_image != ''){
      $this->db->where('id_car_registration',$id_car_registration);
      $this->db->update('car_registration',array('vehicle_image'=>$vehicle_image));
    }

    if($vehicle_or != ''){
      $this->db->where('id_car_registration',$id_car_registration);
      $this->db->update('car_registration',array('vehicle_or'=>$vehicle_or));
    }

    if($vehicle_cr != ''){
      $this->db->where('id_car_registration',$id_car_registration);
      $this->db->update('car_registration',array('vehicle_cr'=>$vehicle_cr));
    }

    if($receipt != ''){
      $this->db->where('id_car_registration',$id_car_registration);
      $this->db->update('car_registration',array('receipt'=>$receipt));
    }
    
    $error = $this->db->error();
    if($error['code'] != 0){//HAS ERROR
      return false;
    }else{
      return true;
    }
  }

  public function get_car_registration($id = null,$status){
    $this->db->select("a.*,CONCAT(a.last_name,', ',a.first_name,' ',a.middle_name) as name,b.id_driver_type,b.type as 'driver_type',c.id_car_brand, c.brand as 'car_brand',d.id_car_type, d.type as 'car_type'");
    $this->db->where("a.del_status",1);
    if($status != 0){
      // $this->db->where("a.status",$status);
      $this->db->like("a.status", $status);
    }
    if($id != ''){
      $this->db->like("a.id_car_registration",$id);
    }
    $this->db->join("driver_type as b","a.id_driver_type = b.id_driver_type");
    $this->db->join("car_brand as c","a.id_car_brand = c.id_car_brand");
    $this->db->join("car_type as d","a.id_car_type = d.id_car_type");
    $query = $this->db->get("car_registration as a ");
    // die($this->db->last_query());
    return $query->result();
  }

  public function check_duplicate($plate){
    $this->db->where('plate',$plate);
    $result = $this->db->get('car_registration');
    if($result -> num_rows() > 0){
      return TRUE;
    }else{
      return FALSE;
    }
  }

  public function change_status($status){
    $contact = '';
    $result = $this->get_car_registration($this->input->post('id'),1);
    foreach($result as $row){
      $contact = $row->contact_nos;
      $name = $row->first_name;
      $car_type = $row->car_type;
      $car_brand = $row->car_brand;
    }

    if($status == 2){
      $txt1 = "You may now pay at the cashier and send us a copy of the receipt so we can have your vehicle pass sticker ready for release";
    }else{
      $txt1 = "Good day $name, Sorry your registration is disapproved to avail vehicle pass";
    }
  
    $this->ItextMo($contact,$txt1);

    $arr = array('status'=>$status);
    $this->db->where('id_car_registration',$this->input->post('id'));
    $this->db->update('car_registration',$arr);
    // die($this->db->last_query());
  }

  public function delete(){
    $arr = array('del_status'=>0);
    $this->db->where('id_car_registration',$this->input->post('id'));
    $this->db->update('car_registration',$arr);
    // die($this->db->last_query());
  }

  public function getNotify(){
    $contact = '';
    $result = $this->get_car_registration($this->input->post('id'),2);
    foreach($result as $row){
      $contact = $row->contact_nos;
      $name = $row->first_name;
      $car_type = $row->car_type;
      $car_brand = $row->car_brand;
      $date_renew =  date("(l)  F j, Y", strtotime(date('Y-m-d', strtotime('+1 year', strtotime(date("Y-m-d",strtotime($row->dt))))) ));
    }


    $txt1 = "Good day $name, Please be informed that you need to renew your Vehicle pass before $date_renew";
    // die($contact.$txt1);
    $this->ItextMo($contact,$txt1);

  }

  public function getRenew(){
    $hour = date("h:i:sa");

    $today              = strtotime("today $hour");
    $new_dt = date("Y-m-d H:i:s\n", $today);

    $contact = '';
    $result = $this->get_car_registration($this->input->post('id'),'');
    foreach($result as $row){
      $contact = $row->contact_nos;
      $name = $row->first_name;
      $car_type = $row->car_type;
      $car_brand = $row->car_brand;
    }


    $txt1 = "Good day $name, your vehicle pass was successfully renewed";

    $this->ItextMo($contact,$txt1);

    $arr = array('dt'=>$new_dt);
    $this->db->where('id_car_registration',$this->input->post('id'));
    $this->db->update('car_registration',$arr);
  }

}