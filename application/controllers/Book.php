<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Book extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('book_model');
        // Load base_url
        $this->load->helper('url');
    }

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {

        $book = $this->book_model->get_books();

        $data['bookdetails'] = $book;

        $object['controller'] = $this;
        $object['active_tab'] = "managebooks";
        $object['active_main_tab'] = "books";
        $object['title'] = "viewbooks";

        $this->load->view('include/header', $object);
        $this->load->view('include/sidebar');
        $this->load->view('books/books', $data);
        $this->load->view('include/footer');
    }


    public function addbooks()
    {

        $this->load->library('form_validation');

        $this->form_validation->set_rules('book_tittle', 'Book tittle', 'required');
        $this->form_validation->set_rules('edition', 'Edition', 'required');
        $this->form_validation->set_rules('category', 'Category', 'required');
        $this->form_validation->set_rules('auth_firstname', 'Author First Name', 'required');
        $this->form_validation->set_rules('auth_lastname', 'Author Last Name', 'required');


        if ($this->form_validation->run()) {

            $array = array(
                'success' => 'Success !!'
            );

            $this->load->model('book_model');
            $this->book_model->insert_book();
        } else {

            $array = array(

                'error' => 'Error !!',  // keys
                'newbook_tittle_error' => form_error('book_tittle'),
                'newedition_error' => form_error('edition'),
                'newcategory_error' => form_error('category'),
                'newauth_firstname_error' => form_error('auth_firstname'),
                'newauth_lastname_error' => form_error('auth_lastname'),

            );
        }

        echo json_encode($array);
    }
    public function updatebook()
    {
        $this->load->model('book_model');
        $data = $this->book_model->update_book();

        if ($data) {
            $this->session->set_flashdata('msg', 'update_success');
            redirect('Book');
        }
    }
    public function deletebook()
    {
        $this->load->model('book_model');
        $data = $this->book_model->delete_book();

        if ($data) {
            $this->session->set_flashdata('msg', 'deleted');
            redirect('Book');
        }
    }



    public function damagedbooks()
    {
        $reserve['damageddetails'] = $this->book_model->damaged_books();

        $object['controller'] = $this;
        $object['active_tab'] = "damagedbooks";
        $object['active_main_tab'] = "books";
        $object['title'] = "damagedbooks";

        $this->load->view('include/header', $object);
        $this->load->view('include/sidebar');
        $this->load->view('books/damagedbooks', $reserve);
        $this->load->view('include/footer');
    }
    public function add_damagedbook()
    {



        $this->load->library('form_validation');

        $this->form_validation->set_rules('book_copyID', 'Book copy ID', 'required');
        $this->form_validation->set_rules('damaged_date', 'Damaged date', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');



        if ($this->form_validation->run()) {

            $array = array(
                'success' => 'Success !!'
            );

            $this->load->model('book_model');
            $this->book_model->addamaged();
        } else {

            $array = array(

                'error' => 'Error !!',  // keys
                'newbook_copyID_error' => form_error('book_copyID'),
                'datepicker1_error' => form_error('damaged_date'),
                'newDescription_error' => form_error('description')

            );
        }

        echo json_encode($array);
    }

    public function update_damagedbooks()
    {
        $this->load->model('book_model');
        $data = $this->book_model->update_damagedbook();

        if ($data) {
            $this->session->set_flashdata('msg', 'update_success');
            redirect('Book/damagedbooks');
        }
    }

    public function delete_damagedbook()
    {
        $this->load->model('book_model');
        $data = $this->book_model->delete_damagedbooks();

        if ($data) {
            $this->session->set_flashdata('msg', 'deleted');
            redirect('Book/damagedbooks');
        }
    }

    public function updatebookcopy()
    {
        $this->load->model('book_model');
        $data = $this->book_model->update_bookcopy();

        if ($data) {
            $this->session->set_flashdata('msg', 'update_success');
            redirect('Book_copies');
        }
    }
}
