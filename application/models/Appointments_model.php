<?php

class Appointments_model extends CI_Model{

    public function get($appt_status){
        $id = $this->input->post('id');
        $this->db->select('a.*,b.service,CONCAT(c.last_name,",",c.first_name) as patient_name,CONCAT(d.last_name,",",d.first_name) as doctor_name,c.contact,c.address,g.specialization,
                        h.travel_history,h.exposure_to_covid,h.contact_to_person,h.feeling_today');
        
        if($appt_status != '-'){
            $this->db->where('a.status', $appt_status);
        }
        if($id != ''){
            $this->db->where('a.id', $id);
        }
        if($_SESSION['id_user_role'] == 3){
            $this->db->where('a.patient_id', $_SESSION['id_user']);
        }
        if($_SESSION['id_user_role'] == 4){
            $this->db->where('a.doctor_id', $_SESSION['id_user']);
        }
        $this->db->join('user_profile c','a.patient_id = c.id');
        $this->db->join('services b','a.id_service = b.id');
        $this->db->join('users e','a.doctor_id = e.id_user','left');
        $this->db->join('user_profile d','d.id = e.id_user','left');
        $this->db->join('doctor_details f','a.doctor_id = f.id_user','left');
        $this->db->join('specializations g','f.id_specialization = g.id','left');
        $this->db->join('appointment_details h','h.id_appointment = a.id','left');
        return $this->db->get('appointments a')->result();
    }

    public function appt_ratings($id){
        $this->db->order_by('a.id','desc');
        $this->db->where('a.id_appointment',$id);
        $data = $this->db->get('appointment_ratings a');
        // die($this->db->last_query());
        return $data->result();
    }

    public function getBarangay(){
        $this->db->where('citymunCode','012934');
        $query = $this->db->get("main_address_barangay");
        return $query->result();
    }


    public function save(){
        $id_service = $this->input->post('id_service');
        $appnt_date = $this->input->post('appnt_date');
        $appnt_time = $this->input->post('appnt_time');
        $description = $this->input->post('description');
        $other_illness = $this->input->post('other_illness');
        $travel_history = $this->input->post('travel_history');
        $exposure_to_covid = $this->input->post('exposure_to_covid');
        $contact_to_person = $this->input->post('contact_to_person');
        $feeling_today = $this->input->post('feeling_today');
        unset($_POST['id_service']);
        unset($_POST['appnt_date']);
        unset($_POST['appnt_time']);
        unset($_POST['description']);
        unset($_POST['other_illness']);
        unset($_POST['id']);
        unset($_POST['status']);
        unset($_POST['doctor_id']);
        unset($_POST['not_appnt_date']);
        unset($_POST['not_appnt_time']);
        unset($_POST['patient_id']);
        unset($_POST['travel_history']);
        unset($_POST['exposure_to_covid']);
        unset($_POST['contact_to_person']);
        unset($_POST['feeling_today']);
        unset($_POST['transaction']);

        $illnesses = $this->input->post();
        $illness_data = [];
        foreach($illnesses as $row){
            array_push($illness_data,$row);
        }

        $illnesses = '';
        for ($x = 0; $x < count($illness_data); $x++) {
            $illnesses .= $illness_data[$x].',';
        }

        $data = array(
            'ref_nos' => rand(100000, 999999),
            'id_service' => $id_service,
            'appnt_date' => $appnt_date,
            'appnt_time' => $appnt_time,
            'patient_id' => $_SESSION['id_user'],
            'description' => $description,
            'other_illness' => $other_illness,
            'illness' => substr_replace($illnesses,' ',-1),
        );
       
        $this->db->insert('appointments',$data);
        $this->db->insert('videotelephony',$data);
        $id_appointment = $this->db->insert_id();

        if($travel_history == null){$travel_history =  0;}else{$travel_history = 1;}
        if($exposure_to_covid == null){$exposure_to_covid = 0;}else{$exposure_to_covid = 1;}
        if($contact_to_person == null){$contact_to_person = 0;}else{$contact_to_person = 1;}

        $data_appt_details = array(
            'id_appointment' => $id_appointment,
            'travel_history' => $travel_history,
            'exposure_to_covid' => $exposure_to_covid,
            'contact_to_person' => $contact_to_person,
            'feeling_today' => $feeling_today,
        );
        $this->db->insert('appointment_details',$data_appt_details);
        // die($this->db->last_query());
    }

    public function saveRatings($data){
        $this->db->insert('appointment_ratings',$data);
        // die($this->db->last_query());
    }

    public function saveInvitationLink($data){
        $this->appointment_model->update();
        $msg = "Invitation was succesfully updated";
        $this->session->set_userdata('status_msg',$msg);
        $this->session->set_userdata('stat_msg_type','success');
    }

    public function cancel(){
        $this->customlib->checkLogin();
        $id = $this->input->post('id');
        $_POST['status'] = 3;
        $_POST['cancelled_by'] = ucfirst($_SESSION['role']);
        $this->db->where('id',$id);
        $this->db->update('appointments',$this->input->post());
    }

    public function update(){
        $this->customlib->checkLogin();
        $id = $this->input->post('id');
        $transaction = $this->input->post('transaction');
        $patient_id = $this->input->post('patient_id');
        $appnt_date = $this->input->post('not_appnt_date');
        $appnt_time = $this->input->post('not_appnt_time');
        $doctor_id = $this->input->post('doctor_id');
        
        unset($_POST['id_service']);
        unset($_POST['appnt_date']);
        unset($_POST['appnt_time']);
        unset($_POST['transaction']);
        unset($_POST['patient_id']);
        unset($_POST['not_appnt_date']);
        unset($_POST['not_appnt_time']);
        $this->db->where('id',$id);
        $this->db->update('appointments',$this->input->post());
      
        $message = 'Your appointment with the reference number of APPT-'.$id.' on '.$appnt_date.' '.$appnt_time.' is now approved. Go to your list of appointments to see the details.';
        $array = array(
            'id_user' => $patient_id,
            'transaction' => $transaction,
            'id_transaction' => $id,
            'message' => $message,
        );
        $this->db->insert('notifications',$array);


        $message = 'You have your new appointment with the reference number of APPT-'.$id.' on '.$appnt_date.' '.$appnt_time.'. Go to your list of appointments to see the details.';
        $array = array(
            'id_user' => $doctor_id,
            'transaction' => $transaction,
            'id_transaction' => $id,
            'message' => $message,
        );
        $this->db->insert('notifications',$array);
    }

    public function updateAndComplete(){
        $this->customlib->checkLogin();
        $id = $this->input->post('id');
        $patient_id = $this->input->post('patient_id');
        unset($_POST['patient_id']);
        
        $this->db->where('id',$id);
        $this->db->update('appointments',$this->input->post());

        $message = 'Your doctor '.$_SESSION['last_name'].', '. $_SESSION['first_name'].' update and mark as complete  your appointment with the reference number of APPT-'.$id;
        $array = array(
            'id_user' => $patient_id,
            'id_transaction' => $id,
            'message' => $message,
        );
        $this->db->insert('notifications',$array);
    }

    public function doctor_remarks(){
        $this->customlib->checkLogin();
        $id = $this->input->post('id');
        $patient_id = $this->input->post('patient_id');
        $this->db->where('id',$id);
        unset($_POST['id_service']);
        unset($_POST['patient_id']);
        $this->db->update('appointments',$this->input->post());

        $message = 'Your doctor '.$_SESSION['last_name'].', '. $_SESSION['first_name'].' added an update with your appointment with the reference number of APPT-'.$id;
        $array = array(
            'id_user' => $patient_id,
            'id_transaction' => $id,
            'message' => $message,
        );
        $this->db->insert('notifications',$array);
    }

    public function patient_remarks(){
        $this->customlib->checkLogin();
        $id = $this->input->post('id');
        $patient_id = $this->input->post('patient_id');
        $this->db->where('id',$id);
        unset($_POST['id_service']);
        unset($_POST['patient_id']);
        $this->db->update('appointments',$this->input->post());

        // $message = 'Your doctor '.$_SESSION['last_name'].', '. $_SESSION['first_name'].' added an update with your appointment with the reference number of APPT-'.$id;
        // $array = array(
        //     'id_user' => $patient_id,
        //     'id_transaction' => $id,
        //     'message' => $message,
        // );
        // $this->db->insert('notifications',$array);
    }

    public function resched_appt(){
        $this->customlib->checkLogin();
        $id = $this->input->post('id');
        $patient_id = $this->input->post('patient_id');
        $this->db->where('id',$id);
        $this->db->update('appointments',$this->input->post());

        $message = 'Your doctor '.$_SESSION['last_name'].', '. $_SESSION['first_name'].' reschedule your appointment with the reference number of APPT-'.$id;
        $array = array(
            'id_user' => $patient_id,
            'id_transaction' => $id,
            'message' => $message,
        );
        $this->db->insert('notifications',$array);
    }

    public function add_invitation_link(){
        $this->customlib->checkLogin();
        $id = $this->input->post('id');
        $patient_id = $this->input->post('patient_id');
        $invitation_link = $this->input->post('message');
        $this->db->where('id',$id);
        $this->db->update('appointments',$this->input->post());
        $message = 'Your doctor '.$_SESSION['last_name'].', '. $_SESSION['first_name'].' reschedule your appointment with the reference number of APPT-'.$id.' with the invitation link ';
        $array = array(
            'id_user' => $patient_id,
            'id_transaction' => $id,
            'message' => $message,
            'invitation_link' => $invitation_link,
        );
        $this->db->insert('notifications',$array);
        
    }

    public function appointment_counter($status){
        if($_SESSION['id_user_role'] == 3){
            $this->db->where('patient_id',$_SESSION['id_user']);
        }
        if($_SESSION['id_user_role'] == 4){
            $this->db->where('doctor_id',$_SESSION['id_user']);
        }
        $this->db->where('status',$status);
        $data =  $this->db->get('appointments');
        return $data->result();
    }


}