<?php

defined('BASEPATH') or exit('No direct script access allowed');

class report_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }


    /////////////////////////////////////////////// Reports

    public function getDamagedBooks()
    {
        $this->db->from('damaged_books as t1');
        $this->db->select('t3.book_tittle,t1.damagedbook_ID,t1.book_copyID,t2.purchase_date,t1.damaged_date,t2.price');
        $this->db->join('book_copy as t2', 't1.book_copyID = t2.book_copyID', 'LEFT');
        $this->db->join('books as t3', 't2.book_id = t3.book_id', 'LEFT');
        $objQuery = $this->db->get();

        return $objQuery->result_array();
    }


    public function get_DamagedBook_Dates()
    {

        $startDate = $this->input->post('start_date', TRUE);
        $endDate = $this->input->post('end_date', TRUE);



        $this->db->from('damaged_books as t1');
        $this->db->where('damaged_date >=', $startDate);
        $this->db->where('damaged_date <=', $endDate);
        $this->db->select('t3.book_tittle,t1.damagedbook_ID,t1.book_copyID,t2.purchase_date,t1.damaged_date,t2.price');



        $this->db->join('book_copy as t2', 't1.book_copyID = t2.book_copyID', 'LEFT');
        $this->db->join('books as t3', 't2.book_id = t3.book_id', 'LEFT');

        $this->db->group_by('t1.damagedbook_ID');
        $objQuery = $this->db->get();



        return $objQuery->result_array();
    }

    public function get_student_report()
    {
        $startDate = $this->input->post('start_date', TRUE);
        $endDate = $this->input->post('end_date', TRUE);


        $this->db->select('*');
        $this->db->from('students');
        $this->db->where('registered_date >=', $startDate);
        $this->db->where('registered_date <=', $endDate);
        $objQuery = $this->db->get();

        return $objQuery->result_array();
    }



    public function membership_fee_generate()
    {
        $this->db->from('membership_log as t1');

        $this->db->select('t1.student_id,t2.first_name,t2.last_name,t1.membership_ID,t1.expire_date,t1.renew_date,t1.renew_fee');

        $this->db->join('students as t2', 't1.student_id = t2.student_ID', 'LEFT');

        $objQuery = $this->db->get();

        return $objQuery->result_array();
    }

    public function membership_report()
    {
        $startDate = $this->input->post('start_date', TRUE);
        $endDate = $this->input->post('end_date', TRUE);



        $this->db->from('membership_log as t1');
        $this->db->where('renew_date >=', $startDate);
        $this->db->where('renew_date <=', $endDate);
        $this->db->select('t1.student_id,t2.first_name,t2.last_name,t1.membership_ID,t1.expire_date,t1.renew_date,t1.renew_fee');

        $this->db->join('students as t2', 't1.student_id = t2.student_ID', 'LEFT');

        $objQuery = $this->db->get();

        return $objQuery->result_array();
    }

    //////////////////////////////////////////////////////////////////////////// Late Return


    public function All_late_return()
    {
        $status = 'not_received';

        $this->db->from('borrow_book as t1');
        $this->db->where('t1.status =', $status);
        $this->db->select('t1.studentID,t2.first_name,t2.last_name,t2.phone,t3.book_copyID,t4.book_tittle,t1.checkout_date, t1.return_date, t1.status');

        $this->db->join('students as t2', 't1.studentID = t2.student_ID', 'LEFT');
        $this->db->join('book_copy as t3', 't1.book_copyID = t3.book_copyID', 'LEFT');
        $this->db->join('books as t4', 't3.book_id = t4.book_id', 'LEFT');

        $objQuery = $this->db->get();

        return $objQuery->result_array();
    }

    ////////////////////////////////////////////////////////////////////////////////////////Late return upto

    public function late_return()
    {
        $upto_date = $this->input->post('upto_date', TRUE);
        $status = 'not_received';

        $this->db->from('borrow_book as t1');
        $this->db->where('t1.return_date <=', $upto_date);
        $this->db->where('t1.status = ', $status);

        $this->db->select('t1.studentID,t2.first_name,t2.last_name,t2.phone,t3.book_copyID,t4.book_tittle,t1.checkout_date, t1.return_date, t1.status');

        $this->db->join('students as t2', 't1.studentID = t2.student_ID', 'LEFT');
        $this->db->join('book_copy as t3', 't1.book_copyID = t3.book_copyID', 'LEFT');
        $this->db->join('books as t4', 't3.book_id = t4.book_id', 'LEFT');

        $objQuery = $this->db->get();

        return $objQuery->result_array();
    }
}
