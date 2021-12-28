<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Student extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('student_model');
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
        $this->load->model('student_model');
        $data = $this->student_model->addStudent();
        if ($data) {
            $this->session->set_flashdata('msg', 'success');
            redirect('Student');
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
