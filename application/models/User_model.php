<?php

class User_model extends CI_Model{

    public function edit_user($data,$id){

        $post = $data;
        $post['password'] = password_hash($post['password'], PASSWORD_DEFAULT);
        unset($post['passwordconf']);

        $this->db->where('id_user',$id);
        if($this->db->update('users',$post)){
            return true;
        }else{
            return false;
        }
    }

    public function getUsers($id_user_role = null){
        $this->db->select('a.*,CONCAT(a.last_name,", ",a.first_name) as name,c.role,b.id_user_role');
        if($id_user_role != ''){
            $this->db->where('b.id_user_role',$id_user_role);
        }
        $this->db->where('b.del_status',1);
        $this->db->where('a.id !=',$_SESSION['id_user']);
        $this->db->join('users b','a.id = b.id_user');
        $this->db->join('user_role c','b.id_user_role = c.id');
        return $this->db->get('user_profile a')->result();
    }

    function check_duplicate_staff($operation){
        $email = $this->input->post('email');
        $contact = $this->input->post('contact');
        if($operation == 'update'){
            $this->db->where('id !=',$_SESSION['id_user']);
        }
        $this->db->where('(contact = "'.$contact.'" or email = "'.$email.'")');
        // $this->db->or_where('email',$email);
        $result = $this->db->get('user_profile');
        // die($this->db->last_query());
       if($result-> num_rows() > 0){
            return true;
        }else{
            return false;
        }
    }

    function checkUsername($username,$id){
        if($id != ''){
            $this->db->where('id !=',$id);
        }
        $this->db->where('username',$username);
        $result = $this->db->get('users');
        if($result-> num_rows() > 0){
            return true;
        }else{
            return false;
        }
    }

    public function add_user(){
        $id_user_role = $this->input->post('id_user_role');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $picture = $this->input->post('picture');
        $id = $this->input->post('id');
        unset($_POST['id_user_role']);
        unset($_POST['username']);
        unset($_POST['password']);
        unset($_POST['cpassword']);
        unset($_POST['id']);

        if($id_user_role == 4){
            $id_specialization = $this->input->post('id_specialization');
            $description = $this->input->post('description');
            unset($_POST['id_specialization']);
            unset($_POST['description']);
        }

        if($id_user_role == 3){
            $eci_fullname = $this->input->post('eci_fullname');
            $eci_contact = $this->input->post('eci_contact');
            $eci_address = $this->input->post('eci_address');
            $medical_history = $this->input->post('medical_history');
            unset($_POST['eci_fullname']);
            unset($_POST['eci_contact']);
            unset($_POST['eci_address']);
            unset($_POST['medical_history']);
        }

        if($picture == ''){
            $_POST['picture'] = 'default_pic.png';
        }

        $this->db->insert("user_profile",$this->input->post());
        $last_id = $this->db->insert_id();
        
        $array = array(
            'id_user_role' => $id_user_role,
            'id_user' => $last_id,
            'username' => $username,
            'password' => password_hash($password, PASSWORD_DEFAULT)
        );
        $this->db->insert("users",$array);

        if($id_user_role == 4){
            $array = array(
                'id_user' => $last_id,
                'id_specialization' => $id_specialization,
                'description' => $description
            );
            $this->db->insert("doctor_details",$array);
        }

        if($id_user_role == 3){
            $array = array(
                'id_patient' => $last_id,
                'eci_fullname' => $eci_fullname,
                'eci_contact' => $eci_contact,
                'eci_address' => $eci_address,
                'medical_history' => $medical_history
            );
            $this->db->insert("patient_details",$array);
        }

    }

    public function delete(){
        $id = $this->input->post('id');
        $this->db->where('id_user',$id);
        $this->db->UPDATE('users',array('del_status' => 0));
    }

    public function edit(){
        $id = $this->input->post('id');
        $id_user_role = $this->input->post('id_user_role');

        
        if($id_user_role == 4){ // Doctor
            $this->db->select('a.*,b.id_user_role,c.id_specialization,c.description');
        }else if($id_user_role == 3){ // Patient
            $this->db->select('a.*,b.id_user_role,c.eci_fullname,c.eci_contact,c.eci_address,medical_history');
        }else{
            $this->db->select('a.*,b.id_user_role');
        }

        $this->db->where('a.id',$id);
        if($id_user_role == 4){ // Doctor
            $this->db->join('doctor_details c','a.id = c.id_user');
        }
        if($id_user_role == 3){ // Patient
            $this->db->join('patient_details c','a.id = c.id_patient');
        }
        $this->db->join('users b','a.id = b.id_user');
        $query = $this->db->get("user_profile a");
        return $query->result();
    }

    public function update(){
        $id_user_role = $this->input->post('id_user_role');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $picture = $this->input->post('picture');
        $id = $this->input->post('id');
        unset($_POST['id_user_role']);
        unset($_POST['id']);
        unset($_POST['username']);
        unset($_POST['password']);
        unset($_POST['cpassword']);

        if($id_user_role == 4){
            $id_specialization = $this->input->post('id_specialization');
            $description = $this->input->post('description');
            unset($_POST['id_specialization']);
            unset($_POST['description']);
        }

        if($id_user_role == 3){
            $eci_fullname = $this->input->post('eci_fullname');
            $eci_contact = $this->input->post('eci_contact');
            $eci_address = $this->input->post('eci_address');
            $medical_history = $this->input->post('medical_history');
            unset($_POST['eci_fullname']);
            unset($_POST['eci_contact']);
            unset($_POST['eci_address']);
            unset($_POST['medical_history']);
        }

        if($picture == ''){
            unset($_POST['picture']);
        }

        $this->db->where('id',$id);
        $this->db->update('user_profile',$this->input->post());
        // die($this->db->last_query());
        if($username != ''){
            $this->db->where('id_user',$id);
            $this->db->update('users',array('username'=>$username));
        }
        if($password != ''){
            $this->db->where('id_user',$id);
            $this->db->update('users',array('password'=>password_hash($password, PASSWORD_DEFAULT)));
        }

        if($id_user_role == 4){
            $array = array(
                'id_specialization' => $id_specialization,
                'description' => $description
            );
            $this->db->where("id_user",$id);
            $this->db->update("doctor_details",$array);
        }

        if($id_user_role == 3){
            $array = array(
                'eci_fullname' => $eci_fullname,
                'eci_contact' => $eci_contact,
                'eci_address' => $eci_address,
                'medical_history' => $medical_history
            );
            $this->db->where("id_user",$id);
            $this->db->update("patient_details",$array);
        }

    }

    
    public function update_display_profile($picture){
        $_SESSION['picture'] = $picture;
        $query = $this->db->query("UPDATE user_profile SET picture='$picture' WHERE id='$_SESSION[id_user]'");
    }


    public function update_user_account(){
        $this->db->where('id',$_SESSION['id_user']);
        $result = $this->db->update("user_profile",$this->input->post());
    }

    public function update_account_password($new_password){
        $new_hash_password = password_hash($new_password, PASSWORD_DEFAULT);
        $_SESSION['password'] = $new_hash_password;
        $this->db->query("UPDATE users SET password='$new_hash_password' WHERE id_user='$_SESSION[id_user]' ");
    }

}