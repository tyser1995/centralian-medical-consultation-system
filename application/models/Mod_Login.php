<?php

class Mod_Login extends CI_Model{

    public function verify_username($username){
        $this->db->where('a.del_status',1);
        $this->db->where('username',$username);
        $this->db->join('user_role c','c.id = a.id_user_role');
        $this->db->join('user_profile b','a.id_user = b.id');
        $query = $this->db->get('users a');
        return $query->result();
    }

}