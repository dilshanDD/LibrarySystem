<?php

defined('BASEPATH') or exit('No direct script access allowed');

class student_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


    ////////////////////////////////////////////// Students

    public function get_students()
    {
        $this->db->select('*');
        $this->db->from('students');
        $objQuery = $this->db->get();

        return $objQuery->result_array();
    }


    public function addStudent()
    {

        $cc = $this->db->count_all('students');
        $coun = str_pad($cc, 2, 0, STR_PAD_LEFT); // Updated line to include '0'
        $id = "STU" . "-";
        $d = date('y');
        $mnth = date("m");
        $student_ID = $id . $d . $mnth . $coun;


        $this->db->where('student_ID', $student_ID);

        $querya = $this->db->get('students');

        //true
        while ($querya->num_rows() > 0) {
            $cc++;
            $coun = str_pad($cc, 2, 0, STR_PAD_LEFT); // Updated line to include '0'
            $id = "STU" . "-";
            $d = date('y');
            $mnth = date("m");
            $student_ID = $id . $d . $mnth . $coun;

            $this->db->where('student_ID', $student_ID);

            $querya = $this->db->get('students');
        }


        $bdata = array(
            'student_ID' => $student_ID,
            'staff_id' => trim($this->input->post('staff_id')),
            'NIC' => $this->input->post('NIC', TRUE),
            'email' => $this->input->post('email', TRUE),
            'phone' => $this->input->post('phone', TRUE),
            'address' => $this->input->post('address', TRUE),
            'first_name' => $this->input->post('first_name', TRUE),
            'last_name' => $this->input->post('last_name', TRUE),
            'registered_date' => $this->input->post('registered_date', TRUE),

        );
        $this->db->insert('students', $bdata);
    }

    public function update_student()
    {

        $id = trim($this->input->post('student_ID', TRUE));
        $bdata = [

            'staff_id' => trim($this->input->post('staff_id')),
            'NIC' => $this->input->post('NIC', TRUE),
            'email' => $this->input->post('email', TRUE),
            'phone' => $this->input->post('phone', TRUE),
            'address' => $this->input->post('address', TRUE),
            'first_name' => $this->input->post('first_name', TRUE),
            'last_name' => $this->input->post('last_name', TRUE),
            'registered_date' => $this->input->post('registered_date', TRUE),


        ];


        $this->db->where('student_ID', $id);
        $this->db->update('students', $bdata);
        return true;
    }

    public function delete_student()
    {
        $id = trim($this->input->post('student_ID', TRUE));


        $this->db->where('student_ID', $id);
        $this->db->delete('students');
        return true;
    }



    ////////////////////////////////// Membership

    public function get_membership()
    {
        $this->db->select('*');
        $this->db->from('membership_log');
        $objQuery = $this->db->get();

        return $objQuery->result_array();
    }

    public function addMembership()
    {
        $cc = $this->db->count_all('membership_log');
        $coun = str_pad($cc, 2, 0, STR_PAD_LEFT); // Updated line to include '0'
        $id = "MSP" . "-";
        $d = date('y');
        $mnth = date("m");
        $membership_ID = $id . $d . $mnth . $coun;


        $this->db->where('membership_ID', $membership_ID);

        $querya = $this->db->get('membership_log');

        //true
        while ($querya->num_rows() > 0) {
            $cc++;
            $coun = str_pad($cc, 2, 0, STR_PAD_LEFT); // Updated line to include '0'
            $id = "MSP" . "-";
            $d = date('y');
            $mnth = date("m");
            $membership_ID = $id . $d . $mnth . $coun;

            $this->db->where('membership_ID', $membership_ID);

            $querya = $this->db->get('membership_log');
        }


        $bdata = array(
            'membership_ID' => $membership_ID,
            'student_id' => trim($this->input->post('student_id')),
            'expire_date' => $this->input->post('expire_date', TRUE),
            'renew_date' => $this->input->post('renew_date', TRUE),
            'renew_fee' => $this->input->post('renew_fee', TRUE),

        );
        return $this->db->insert('membership_log', $bdata);
    }
}
