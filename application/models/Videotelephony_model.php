<?php

class Videotelephony_model extends CI_Model{

    public function get(){
        $this->db->order_by('id','desc');
        $this->db->where('id_user',$_SESSION['id_user']);
        // $this->db->where('del_status = 1');
        $data =  $this->db->get('videotelephony');
        return $data->result();
    }

    public function videotelephony_counter(){
        $this->db->where('is_seen',0);
        $this->db->where('id_user',$_SESSION['id_user']);
        $data =  $this->db->get('videotelephony');
        return $data->result();
    }

    public function mark_as_seen(){
        $this->db->where('id_user',$_SESSION['id_user']);
        $this->db->update('videotelephony',array('is_seen'=>1));
    }


    //CURD process
    // public function get(){
    //     $this->db->where('del_status',1);
    //     $query = $this->db->get("services");
    //     return $query->result();
    // }
        
    public function save(){
        // $data = array(
        //     'id_user' => $_SESSION['id_user'],
        //     'message' => $this->input->post('message')
        // );

        $this->db->insert('videotelephony',$this->input->post());
        // $this->db->insert('videotelephony',$data);
        //die($this->db->last_query());
    }

    public function edit(){
        $id = $this->input->post('id');
        $this->db->where('id',$id);
        $query = $this->db->get("videotelephony");
        return $query->result();
    }

    public function update(){
        $id = $this->input->post('id');
        $this->db->where('id',$id);
        $this->db->update('videotelephony',$this->input->post());
    }

    public function delete(){
        $id = $this->input->post('id');
        $this->db->where('id',$id);
        $query = $this->db->UPDATE('videotelephony',array('del_status' => 0));
    }
}