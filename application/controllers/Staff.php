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
        $this->load->model('user_model');
        $data = $this->user_model->insert_user();

        if ($data) {
            $this->session->set_flashdata('msg', 'success');
            redirect('Staff');
        }
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
