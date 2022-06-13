<?php

class Notifications_model extends CI_Model{

    public function get(){
        $this->db->order_by('id','desc');
        $this->db->where('id_user',$_SESSION['id_user']);
        $data =  $this->db->get('notifications');
        return $data->result();
    }

    public function notifications_counter(){
        $this->db->where('is_seen',0);
        $this->db->where('id_user',$_SESSION['id_user']);
        $data =  $this->db->get('notifications');
        return $data->result();
    }

    public function mark_as_seen(){
        $this->db->where('id_user',$_SESSION['id_user']);
        $this->db->update('notifications',array('is_seen'=>1));
    }

}