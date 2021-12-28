<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Book_copies extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('bookcopy_model');
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
        $book['bookcopydetails'] = $this->bookcopy_model->get_bookcopies();

        $object['controller'] = $this;
        $object['active_tab'] = "book_copies";
        $object['active_main_tab'] = "books";
        $object['title'] = "bookcopies";

        $this->load->view('include/header', $object);
        $this->load->view('include/sidebar');
        $this->load->view('books/book_copies', $book);
        $this->load->view('include/footer');
    }


    public function addbookcopy()
    {
        $this->load->model('bookcopy_model');
        $data = $this->bookcopy_model->insert_bookcopy();

        if ($data) {
            $this->session->set_flashdata('msg', 'success');
            redirect('Book');
        }
    }

    public function getbookcopyByID()
    {

        $book['bookcopydetails'] = $this->bookcopy_model->getbookscopyByID();

        $object['controller'] = $this;
        $object['active_tab'] = "book_copies";
        $object['active_main_tab'] = "books";
        $object['title'] = "bookcopies";

        $this->load->view('include/header', $object);
        $this->load->view('include/sidebar');
        $this->load->view('books/book_copies', $book);
        $this->load->view('include/footer');
    }

    public function updatebookcopy()
    {
        $this->load->model('bookcopy_model');
        $data = $this->bookcopy_model->update_bookcopy();

        if ($data) {
            $this->session->set_flashdata('msg', 'update_success');
            redirect('Book_copies');
        }
    }
    public function deletebookcopy()
    {
        $this->load->model('bookcopy_model');
        $data = $this->bookcopy_model->delete_bookcopy();

        if ($data) {
            $this->session->set_flashdata('msg', 'deleted');
            redirect('Book_copies');
        }
    }
}
