


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
}
