<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Borrow_books extends CI_Controller
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
        $borrow['borrowdetails'] = $this->user_model->get_borrowbooks();


        $object['controller'] = $this;
        $object['active_tab'] = "borrowbook";
        $object['active_main_tab'] = "borrowbook";
        $object['title'] = "borrowbook";

        $this->load->view('include/header', $object);
        $this->load->view('include/sidebar');
        $this->load->view('books/borrowbooks', $borrow);
        $this->load->view('include/footer');
    }

    public function addBorrowBook()
    {
        $this->load->model('user_model');
        $data = $this->user_model->addBorrow_books();

        if ($data) {
            redirect('Borrow_books');
        }
    }
    public function update_borrowbook()
    {
        $this->load->model('user_model');
        $data = $this->user_model->update_borrowbooks();

        if ($data) {
            redirect('Borrow_books');
        } else {
            echo ('error');
        }
    }

    public function returnbook()
    {
        $this->load->model('user_model');
        $data = $this->user_model->receive_book();

        if ($data) {
            redirect('Borrow_books');
        } else {
            echo ('error');
        }
    }



    public function getbookcopyByID()
    {
        $bookcopyID['bookcopydetails'] = $this->user_model->getbookcopyByID();
        redirect('Book/viewbooks');
    }
}