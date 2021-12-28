<?php

defined('BASEPATH') or exit('No direct script access allowed');

class user_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    //////////////////////////////////////////Login

    public function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');


        $this->db->where('username', $username);
        $this->db->where('password', $password);

        $respond = $this->db->get('staff');

        if ($respond->num_rows() == 1) {
            return $respond->row(0); // row(0) current row
        } else {
            return false;
        }
    }


    ////////////////////////////////////////////////////Users


    public function get_users()
    {
        $this->db->select('*');
        $this->db->from('staff');
        $objQuery = $this->db->get();

        return $objQuery->result_array();
    }

    public function insert_user()
    {
        $cc = $this->db->count_all('staff');
        $coun = str_pad($cc, 2, 0, STR_PAD_LEFT); // Updated line to include '0'
        $id = "SF" . "-";
        $d = date('y');
        $mnth = date("m");
        $staff_id = $id . $d . $mnth . $coun;

        $this->db->where('staff_ID', $staff_id);
        $querya = $this->db->get('staff');


        //true
        while ($querya->num_rows() > 0) {
            $cc++;
            $coun = str_pad($cc, 2, 0, STR_PAD_LEFT); // Updated line to include '0'
            $id = "SF" . "-";
            $d = date('y');
            $mnth = date("m");
            $staff_id = $id . $d . $mnth . $coun;

            $this->db->where('staff_ID', $staff_id);

            $querya = $this->db->get('staff');
        }


        $udata = array(
            'staff_ID' => $staff_id,
            'name' => $this->input->post('name', TRUE),
            'email' => $this->input->post('email', TRUE),
            'NIC' => $this->input->post('NIC', TRUE),
            'phone' => $this->input->post('phone', TRUE),
            'username' => $this->input->post('username', TRUE),
            'password' => $this->input->post('password', TRUE), // sha1           

        );

        return  $this->db->insert('staff', $udata);
    }

    public function update_user()
    {
        $id = trim($this->input->post('staff_ID', TRUE));
        $bdata = [

            'name' => $this->input->post('name', TRUE),
            'email' => $this->input->post('email', TRUE),
            'NIC' => $this->input->post('NIC', TRUE),
            'phone' => $this->input->post('phone', TRUE),
            'username' => $this->input->post('username', TRUE),


        ];


        $this->db->where('staff_ID', $id);
        $this->db->update('staff', $bdata);
        return true;
    }

    public function deleteusers()
    {
        $id = trim($this->input->post('staff_ID', TRUE));


        $this->db->where('staff_ID', $id);
        $this->db->delete('staff');
        return true;
    }
   
}
