<?php

class Illnesses_model extends CI_Model{

    public function get(){
        $this->db->where('del_status',1);
        $query = $this->db->get("illnesses");
        return $query->result();
    }
  
    public function save(){
        $this->db->insert('illnesses',$this->input->post());
    }

    public function edit(){
        $id = $this->input->post('id');
        $this->db->where('id',$id);
        $query = $this->db->get("illnesses");
        return $query->result();
    }

    public function update(){
        $id = $this->input->post('id');
        $this->db->where('id',$id);
        $this->db->update('illnesses',$this->input->post());
    }

    public function delete(){
        $id = $this->input->post('id');
        $this->db->where('id',$id);
        $query = $this->db->UPDATE('illnesses',array('del_status' => 0));
    }

}