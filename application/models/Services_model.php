<?php

class Services_model extends CI_Model{

    public function get(){
        $this->db->where('del_status',1);
        $query = $this->db->get("services");
        return $query->result();
    }

        
    public function save(){
        $this->db->insert('services',$this->input->post());
    }

    public function edit(){
        $id = $this->input->post('id');
        $this->db->where('id',$id);
        $query = $this->db->get("services");
        return $query->result();
    }

    public function update(){
        $id = $this->input->post('id');
        $this->db->where('id',$id);
        $this->db->update('services',$this->input->post());
    }

    public function delete(){
        $id = $this->input->post('id');
        $this->db->where('id',$id);
        $query = $this->db->UPDATE('services',array('del_status' => 0));
    }

}