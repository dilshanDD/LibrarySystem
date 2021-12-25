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
        return $this->db->insert('books', $bdata);
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
        $id = $this->input->post('book_id', TRUE);

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

        $ddata = array(
            'damagedbook_ID' => $dbk_id,
            'book_copyID' => $this->input->post('book_copyID', TRUE),
            'damaged_date' => $this->input->post('damaged_date', TRUE),
            'description' => $this->input->post('description', TRUE),

        );
        return $this->db->insert('damaged_books', $ddata);
    }

    public function update_damagedbook()
    {
        $id = $this->input->post('id', TRUE);

        $bdata = [

            'staff_id' => $this->input->post('staff_id', TRUE),
            'book_id' => $this->input->post('book_id', TRUE),
            'student_id' => $this->input->post('student_id', TRUE),
            'damaged_date' => $this->input->post('damaged_date', TRUE),
            'description' => $this->input->post('description', TRUE),

        ];


        $this->db->where('id', $id);
        $this->db->update('damaged_books', $bdata);
        return true;
    }

    public function delete_damagedbooks()
    {
        $id = $this->input->post('damagedbook_ID', TRUE);

        $this->db->where('damagedbook_ID', $id);
        $this->db->delete('damaged_books');
        return true;
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
        $id = $this->input->post('book_copyID', TRUE);
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
        $id = $this->input->post('book_copyID', TRUE);

        $this->db->where('book_copyID', $id);
        $this->db->delete('book_copy');
        return true;
    }
    public function getbookcopyByID()
    {
        $id = $this->input->post('book_id', TRUE);

        $this->db->select('*');
        $this->db->from('book_copy');
        $this->db->where('book_id', $id);
        $objQuery = $this->db->get();

        return $objQuery->result_array();
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
        return $this->db->insert('students', $bdata);
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
        return $this->db->insert('borrow_book', $bdata);
    }

    public function update_borrowbooks()
    {

        $bid = $this->input->post('book_copyID', TRUE);

        $bdata = [

            'checkout_date' => $this->input->post('checkout_date', TRUE),
            'return_date' => $this->input->post('return_date', TRUE),


        ];



        $this->db->where('book_copyID = ', $bid, '& status = ', "not_received");
        $this->db->update('borrow_book', $bdata);
        return true;
    }

    public function receive_book()
    {

        $bid = $this->input->post('book_copyID', TRUE);

        $bdata = [

            'checkout_date' => $this->input->post('checkout_date', TRUE),
            'return_date' => $this->input->post('return_date', TRUE),
            'status' => $this->input->post('status', TRUE),


        ];



        $this->db->where('book_copyID = ', $bid, '& status = ', "not_received");
        $this->db->update('borrow_book', $bdata);
        return true;
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
