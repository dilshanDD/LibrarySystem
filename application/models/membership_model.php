


<?php

defined('BASEPATH') or exit('No direct script access allowed');

class membership_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
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
