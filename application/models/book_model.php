


<?php

defined('BASEPATH') or exit('No direct script access allowed');

class book_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    ////////////////////////////////////////////////Books



    public function get_books()
    {
        $this->db->select('*');
        $this->db->from('books');
        $objQuery = $this->db->get();

        return $objQuery->result_array();
    }

    public function insert_book()
    {
        $cc = $this->db->count_all('books');
        $coun = str_pad($cc, 2, 0, STR_PAD_LEFT); // Updated line to include '0'
        $id = "BK" . "-";
        $d = date('y');
        $mnth = date("m");
        $b_id = $id . $d . $mnth . $coun;

        $this->db->where('book_id', $b_id);
        $querya = $this->db->get('books');


        //true
        while ($querya->num_rows() > 0) {
            $cc++;
            $coun = str_pad($cc, 2, 0, STR_PAD_LEFT); // Updated line to include '0'
            $id = "BK" . "-";
            $d = date('y');
            $mnth = date("m");
            $b_id = $id . $d . $mnth . $coun;

            $this->db->where('book_id', $b_id);

            $querya = $this->db->get('books');
        }



        $bdata = array(
            'book_id' => $b_id,
            'book_tittle' => $this->input->post('book_tittle', TRUE),
            'edition' => $this->input->post('edition', TRUE),
            'category' => $this->input->post('category', TRUE),
            'auth_firstname' => $this->input->post('auth_firstname', TRUE),
            'auth_lastname' => $this->input->post('auth_lastname', TRUE),

        );
        $this->db->insert('books', $bdata);
    }

    public function update_book()
    {
        $id = trim($this->input->post('book_id', TRUE));
        $bdata = [

            'book_tittle' => $this->input->post('book_tittle', TRUE),
            'edition' => $this->input->post('edition', TRUE),
            'category' => $this->input->post('category', TRUE),
            'auth_firstname' => $this->input->post('auth_firstname', TRUE),
            'auth_lastname' => $this->input->post('auth_lastname', TRUE),

        ];


        $this->db->where('book_id', $id);
        $this->db->update('books', $bdata);
        return true;
    }

    public function delete_book()
    {
        $id = trim($this->input->post('book_id', TRUE));

        $this->db->where('book_id', $id);
        $this->db->delete('books');
        return true;
    }


    ////////////////////////////////////////// Damaged Books

    public function damaged_books()
    {

        $this->db->select('*');
        $this->db->from('damaged_books');
        $objQuery = $this->db->get();

        return $objQuery->result_array();
    }

    public function addamaged()
    {
        $cc = $this->db->count_all('damaged_books');
        $coun = str_pad($cc, 2, 0, STR_PAD_LEFT); // Updated line to include '0'
        $id = "DBK" . "-";
        $d = date('y');
        $mnth = date("m");
        $dbk_id = $id . $d . $mnth . $coun;

        $this->db->where('damagedbook_ID', $dbk_id);
        $querya = $this->db->get('damaged_books');


        //true
        while ($querya->num_rows() > 0) {
            $cc++;
            $coun = str_pad($cc, 2, 0, STR_PAD_LEFT); // Updated line to include '0'
            $id = "DBK" . "-";
            $d = date('y');
            $mnth = date("m");
            $dbk_id = $id . $d . $mnth . $coun;

            $this->db->where('damagedbook_ID', $dbk_id);

            $querya = $this->db->get('damaged_books');
        }

        $ddata = array(
            'damagedbook_ID' => $dbk_id,
            'book_copyID' => trim($this->input->post('book_copyID', TRUE)),
            'damaged_date' => $this->input->post('damaged_date', TRUE),
            'description' => $this->input->post('description', TRUE),

        );
        //insert into damaged book table
        $damagedbkData = $this->db->insert('damaged_books', $ddata);


        $status = 'not_available';
        //Update book copy table
        $bookcopydata = array(
            'status' => $status

        );

        $this->db->where('book_copyID = ', $ddata['book_copyID']);
        $bkcopydata = $this->db->update('book_copy', $bookcopydata);

        // if ($damagedbkData == true && $bkcopydata == true) {
        //     return true;
        // }
        // return false;
    }

    public function update_damagedbook()
    {
        $id = trim($this->input->post('damagedbook_ID', TRUE));

        $bdata = [

            'book_copyID' => trim($this->input->post('book_copyID', TRUE)),
            'damaged_date' => $this->input->post('damaged_date', TRUE),
            'description' => $this->input->post('description', TRUE)


        ];


        $this->db->where('damagedbook_ID =', $id);
        $damagedbkData = $this->db->update('damaged_books', $bdata);


        $status = 'not_available';
        //Update book copy table
        $bookcopydata = array(
            'status' => $status

        );

        $this->db->where('book_copyID = ', $bdata['book_copyID']);
        $bkcopydata = $this->db->update('book_copy', $bookcopydata);

        if ($damagedbkData == true && $bkcopydata == true) {
            return true;
        }
        return false;
    }

    public function delete_damagedbooks()
    {
        $id = trim($this->input->post('damagedbook_ID', TRUE));

        $this->db->where('damagedbook_ID', $id);
        $this->db->delete('damaged_books');
        return true;
    }
}
