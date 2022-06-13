<?php

class Specializations_model extends CI_Model{

    public function get(){
        $this->db->where('del_status',1);
        $query = $this->db->get("specializations");
        return $query->result();
    }

        
    public function save(){
        $this->db->insert('specializations',$this->input->post());
    }

    public function edit(){
        $id = $this->input->post('id');
        $this->db->where('id',$id);
        $query = $this->db->get("specializations");
        return $query->result();
    }

    public function update(){
        $id = $this->input->post('id');
        $this->db->where('id',$id);
        $this->db->update('specializations',$this->input->post());
    }

    public function delete(){
        $id = $this->input->post('id');
        $this->db->where('id',$id);
        $query = $this->db->UPDATE('specializations',array('del_status' => 0));
    }

}