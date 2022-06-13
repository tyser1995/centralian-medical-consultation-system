<?php

class Report_model extends CI_Model{

  public function statistics(){
    return $this->db->query("SELECT  
            (SELECT COUNT(id) FROM users) as overall_users,
            (SELECT COUNT(id) FROM users WHERE id_user_role = 3) as patient_count,
            (SELECT COUNT(id) FROM users WHERE id_user_role = 4) as doctor_count,
            (SELECT COUNT(id) FROM services WHERE del_status = 1) as services,
            (SELECT COUNT(id) FROM appointments WHERE status = 0) as pending,
            (SELECT COUNT(id) FROM appointments WHERE status = 1) as ongoing,
            (SELECT COUNT(id) FROM appointments WHERE status = 2) as completed,
            (SELECT COUNT(id) FROM appointments WHERE status = 3) as cancelled
            FROM users a")->row();
  }

  public function patient_statistics(){
    return $this->db->query("SELECT  
            (SELECT COUNT(id) FROM appointments WHERE status = 0 AND patient_id = $_SESSION[id_user]) as pending,
            (SELECT COUNT(id) FROM appointments WHERE status = 1 AND patient_id = $_SESSION[id_user]) as ongoing,
            (SELECT COUNT(id) FROM appointments WHERE status = 2 AND patient_id = $_SESSION[id_user]) as completed,
            (SELECT COUNT(id) FROM appointments WHERE status = 3 AND patient_id = $_SESSION[id_user]) as cancelled
            FROM users a")->row();
  }

  public function doctor_statistics(){
    return $this->db->query("SELECT  
            (SELECT COUNT(id) FROM appointments WHERE status = 0 AND doctor_id = $_SESSION[id_user]) as pending,
            (SELECT COUNT(id) FROM appointments WHERE status = 1 AND doctor_id = $_SESSION[id_user]) as ongoing,
            (SELECT COUNT(id) FROM appointments WHERE status = 2 AND doctor_id = $_SESSION[id_user]) as completed,
            (SELECT COUNT(id) FROM appointments WHERE status = 3 AND doctor_id = $_SESSION[id_user]) as cancelled
            FROM users a")->row();
  }

}