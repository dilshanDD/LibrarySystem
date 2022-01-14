


<?php

defined('BASEPATH') or exit('No direct script access allowed');

class borrowbook_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }



    /////////////////////////// Borrow Books 

    public function get_borrowbooks()
    {
        $this->db->select('*');
        $this->db->from('borrow_book');
        $objQuery = $this->db->get();

        return $objQuery->result_array();
    }

    public function addBorrow_books()
    {
        $bdata = array(
            'studentID' => $this->input->post('studentID', TRUE),
            'book_copyID' => $this->input->post('book_copyID', TRUE),
            'checkout_date' => $this->input->post('checkout_date', TRUE),
            'return_date' => $this->input->post('return_date', TRUE),
            'status' => $this->input->post('status', TRUE),

        );
        $this->db->insert('borrow_book', $bdata);
    }

    public function update_borrowbooks()
    {

        $bid = trim($this->input->post('book_copyID', TRUE));
        $stid = trim($this->input->post('student_ID', TRUE));

        $bdata = [

            'checkout_date' => $this->input->post('checkout_date', TRUE),
            'return_date' => $this->input->post('return_date', TRUE),
            'status' => $this->input->post('status', TRUE)


        ];



        $this->db->where('book_copyID = ', $bid, '& student_ID = ', $stid, '& return_date >', Date('yy mm dd'));
        $this->db->update('borrow_book', $bdata);
        return true;
    }

    public function receive_book()
    {

        $bid = trim($this->input->post('book_copyID', TRUE));

        $bdata = [

            'checkout_date' => $this->input->post('checkout_date', TRUE),
            'return_date' => $this->input->post('return_date', TRUE),
            'status' => $this->input->post('status', TRUE),


        ];



        $this->db->where('book_copyID = ', $bid, '& status = ', "not_received");
        $this->db->update('borrow_book', $bdata);
        return true;
    }
    ////////////////////////////////////////////////////////////late return pay

    public function get_latereturn()
    {
        $this->db->select('*');
        $this->db->from('late_return_fine');
        $objQuery = $this->db->get();

        return $objQuery->result_array();
    }

    public function newlate_reuturn()
    {
        $cc = $this->db->count_all('late_return_fine');
        $coun = str_pad($cc, 2, 0, STR_PAD_LEFT); // Updated line to include '0'
        $id = "PAY" . "-";
        $d = date('y');
        $mnth = date("m");
        $pay_id = $id . $d . $mnth . $coun;

        $this->db->where('late_returnID', $pay_id);
        $querya = $this->db->get('late_return_fine');


        //true
        while ($querya->num_rows() > 0) {
            $cc++;
            $coun = str_pad($cc, 2, 0, STR_PAD_LEFT); // Updated line to include '0'
            $id = "PAY" . "-";
            $d = date('y');
            $mnth = date("m");
            $pay_id = $id . $d . $mnth . $coun;

            $this->db->where('late_returnID', $pay_id);

            $querya = $this->db->get('late_return_fine');
        }

        $ddata = array(
            'late_returnID' => $pay_id,
            'student_id' => trim($this->input->post('student_id', TRUE)),
            'book_copyID' => trim($this->input->post('book_copyID', TRUE)),
            'fine_amount' => $this->input->post('fine_amount', TRUE),
            'description' => $this->input->post('description', TRUE),
            'date' => $this->input->post('date', TRUE),

        );

        $this->db->insert('late_return_fine', $ddata);
    }
}
