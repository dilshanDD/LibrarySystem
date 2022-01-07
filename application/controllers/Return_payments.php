<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Return_payments extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('borrowbook_model');
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
        $latereturn['late_return_details'] = $this->borrowbook_model->get_latereturn();


        $object['controller'] = $this;
        $object['active_tab'] = "returnpay";
        $object['active_main_tab'] = "returnpay";
        $object['title'] = "returnpay";

        $this->load->view('include/header', $object);
        $this->load->view('include/sidebar');
        $this->load->view('books/returnpay', $latereturn);
        $this->load->view('include/footer');
    }



    public function addReturnPayment()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('student_id', 'Student ID', 'required');
        $this->form_validation->set_rules('book_copyID', 'Book copy ID', 'required');
        $this->form_validation->set_rules('fine_amount', 'Fine Amount', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('date', 'Date', 'required');


        if ($this->form_validation->run()) {

            $array = array(
                'success' => 'Success !!'
            );

            $this->load->model('borrowbook_model');
            $this->borrowbook_model->newlate_reuturn();
        } else {

            $array = array(

                'error' => 'Error !!',  // keys
                'paystudentID_error' => form_error('student_id'),
                'paybook_copyID_error' => form_error('book_copyID'),
                'payfine_amount_error' => form_error('fine_amount'),
                'pay_description_error' => form_error('description'),
                'paydatepick_error' => form_error('date'),

            );
        }

        echo json_encode($array);
    }
}
