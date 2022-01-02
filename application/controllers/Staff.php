<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Staff extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
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
        $users['userdetails'] = $this->user_model->get_users();

        $object['controller'] = $this;
        $object['active_tab'] = "manageusers";
        $object['title'] = "manageusers";

        $this->load->view('include/header', $object);         //or use render method
        $this->load->view('include/sidebar');
        $this->load->view('users/users', $users);
        $this->load->view('include/footer');

        $this->load->model('user_model');
    }

    public function login()
    {
        $this->load->view('users/login');
    }


    public function loginvalidate()
    {

        $this->load->model('user_model');
        $result = $this->user_model->login();

        if ($result != false) {
            $userdata = array(
                'id' => $result->staff_ID,
                'username' => $result->username,
                'email' => $result->email,
                'loggedin' => TRUE
            );
            $this->session->set_userdata($userdata);
            $this->session->set_flashdata('Welcome', 'Welcome');

            redirect('Welcome');
        } else {

            redirect('Staff/login');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('loggedin');
        redirect('Staff/login');
    }

    public function register_users()
    {

        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Staff Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('NIC', 'NIC', 'required');
        $this->form_validation->set_rules('phone', 'Phone Number', 'required');
        $this->form_validation->set_rules('username', 'User Name', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');


        if ($this->form_validation->run()) {

            $array = array(
                'success' => 'Success !!' 
            );

            $this->load->model('user_model');
            $this->user_model->insert_user();
          

        } else {

            $array = array(

                'error' => 'Error !!',  // keys
                'name_error' => form_error('name'),
                'email_error' => form_error('email'),
                'NIC_error' => form_error('NIC'),
                'phone_error' => form_error('phone'),
                'username_error' => form_error('username'),
                'password_error' => form_error('password'),
                'confirm_password_error' => form_error('confirm_password')
            );
        }

        echo json_encode($array);
    }

    public function updateuser()
    {
        $this->load->model('user_model');
        $data = $this->user_model->update_user();


        if ($data) {
            $this->session->set_flashdata('msg', 'update_success');
            redirect('Staff');
        }
    }

    public function deleteuser()
    {
        $this->load->model('user_model');
        $data = $this->user_model->deleteusers();


        if ($data) {
            $this->session->set_flashdata('msg', 'deleted');
            redirect('Staff');
        }
    }
}
