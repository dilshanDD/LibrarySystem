


<?php

defined('BASEPATH') or exit('No direct script access allowed');

class bookcopy_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }



    ////////////////////////////////////// Book Copies

    public function get_bookcopies()
    {
        $this->db->select('*');
        $this->db->from('book_copy');
        $objQuery = $this->db->get();

        return $objQuery->result_array();
    }

    public function insert_bookcopy()
    {

        $cc = $this->db->count_all('book_copy');
        $coun = str_pad($cc, 2, 0, STR_PAD_LEFT); // Updated line to include '0'
        $id = "BC" . "-";
        $d = date('y');
        $mnth = date("m");
        $bkcopy_id = $id . $d . $mnth . $coun;


        $this->db->where('book_copyID', $bkcopy_id);

        $querya = $this->db->get('book_copy');

        //true
        while ($querya->num_rows() > 0) {
            $cc++;
            $coun = str_pad($cc, 2, 0, STR_PAD_LEFT); // Updated line to include '0'
            $id = "BC" . "-";
            $d = date('y');
            $mnth = date("m");
            $bkcopy_id = $id . $d . $mnth . $coun;

            $this->db->where('book_copyID', $bkcopy_id);

            $querya = $this->db->get('book_copy');
        }


        $bdata = array(
            'book_copyID' => $bkcopy_id,
            'book_id' => trim($this->input->post('book_id')),
            'status' => $this->input->post('status', TRUE),
            'purchase_date' => $this->input->post('purchase_date', TRUE),
            'price' => $this->input->post('price', TRUE),

        );
        return $this->db->insert('book_copy', $bdata);
    }

    public function update_bookcopy()
    {
        $id = trim($this->input->post('book_copyID', TRUE));
        $bdata = [

            'status' => $this->input->post('status', TRUE),
            'purchase_date' => $this->input->post('purchase_date', TRUE),
            'price' => $this->input->post('price', TRUE),

        ];


        $this->db->where('book_copyID', $id);
        $this->db->update('book_copy', $bdata);
        return true;
    }

    public function delete_bookcopy()
    {
        $id = trim($this->input->post('book_copyID', TRUE));

        $this->db->where('book_copyID', $id);
        $this->db->delete('book_copy');
        return true;
    }
    public function getbookscopyByID()
    {

        $id = trim($this->input->post('book_id', TRUE));
        echo ($id);

        $this->db->select('*');
        $this->db->from('book_copy');
        $this->db->where('book_id', $id);
        $objQuery = $this->db->get();

        return $objQuery->result_array();
    }
}
