<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Student extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('student_model');
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
        $students['studentdetails'] = $this->student_model->get_students();

        $object['controller'] = $this;
        $object['active_tab'] = "managestudents";
        $object['title'] = "managestudents";

        $this->load->view('include/header', $object);         //or use render method
        $this->load->view('include/sidebar');
        $this->load->view('students/students', $students);
        $this->load->view('include/footer');
    }

    public function Add_student()
    {


        $this->load->library('form_validation');

        $this->form_validation->set_rules('NIC', 'NIC', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_checkemail');
        $this->form_validation->set_rules('phone', 'Phone number', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('registered_date', 'Registered Date', 'required');


        if ($this->form_validation->run()) {

            $array = array(
                'success' => 'Success !!'
            );

            $this->load->model('student_model');
            $this->student_model->addStudent();
        } else {

            $array = array(

                'error' => 'Error !!',  // keys
                'newNIC_error' => form_error('NIC'),
                'newemail_error' => form_error('email'),
                'newphone_error' => form_error('phone'),
                'newaddress_error' => form_error('address'),
                'newfirst_name_error' => form_error('first_name'),
                'newlast_name_error' => form_error('last_name'),
                'datepicker_error' => form_error('registered_date')
            );
        }

        echo json_encode($array);
    }

    public function checkemail($email)
    {

        $this->db->where('email', $email);
        $querya = $this->db->get('students');


        //true
        if ($querya->num_rows() == 0) {
            return true;
        } else {
            $this->form_validation->set_message('checkemail', 'Please insert a unique email !');
            return FALSE;
        }
    }



    public function updateStudent()
    {
        $this->load->model('student_model');
        $data = $this->student_model->update_student();

        if ($data) {
            $this->session->set_flashdata('msg', 'update_success');
            redirect('Student');
        }
    }

    public function deleteStudent()
    {
        $this->load->model('student_model');
        $data = $this->student_model->delete_student();

        if ($data) {
            $this->session->set_flashdata('msg', 'deleted');
            redirect('Student');
        }
    }

    ////////////////////////////////////////////////

}
