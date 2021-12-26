<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Book extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
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

        $book = $this->user_model->get_books();

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
        $this->load->model('user_model');
        $data = $this->user_model->insert_book();

        if ($data) {
            $this->session->set_flashdata('msg', 'success');
            redirect('Book');
        }
    }
    public function updatebook()
    {
        $this->load->model('user_model');
        $data = $this->user_model->update_book();

        if ($data) {
            $this->session->set_flashdata('msg', 'update_success');
            redirect('Book');
        }
    }
    public function deletebook()
    {
        $this->load->model('user_model');
        $data = $this->user_model->delete_book();

        if ($data) {
            $this->session->set_flashdata('msg', 'deleted');
            redirect('Book');
        }
    }

    public function getbookcopyByID()
    {

        $book['bookcopydetails'] = $this->user_model->getbookscopyByID();

        $object['controller'] = $this;
        $object['active_tab'] = "book_copies";
        $object['active_main_tab'] = "books";
        $object['title'] = "bookcopies";

        $this->load->view('include/header', $object);
        $this->load->view('include/sidebar');
        $this->load->view('books/book_copies', $book);
        $this->load->view('include/footer');
    }

    public function damagedbooks()
    {
        $reserve['damageddetails'] = $this->user_model->damaged_books();

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
        $this->load->model('user_model');
        $data = $this->user_model->addamaged();
        if ($data) {
            redirect('Book/damagedbooks');
        }
    }

    public function update_damagedbooks()
    {
        $this->load->model('user_model');
        $data = $this->user_model->update_damagedbook();

        if ($data) {
            redirect('Book/damagedbooks');
        }
    }

    public function delete_damagedbook()
    {
        $this->load->model('user_model');
        $data = $this->user_model->delete_damagedbooks();

        if ($data) {
            redirect('Book/damagedbooks');
        }
    }
}
