<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Membership extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('membership_model');
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
        $membership['membershipdetails'] = $this->membership_model->get_membership();


        $object['controller'] = $this;
        $object['active_tab'] = "membership";
        $object['active_main_tab'] = "membership";
        $object['title'] = "membership";

        $this->load->view('include/header', $object);
        $this->load->view('include/sidebar');
        $this->load->view('students/membership', $membership);
        $this->load->view('include/footer');
    }



    public function addMembership()
    {
        $this->load->model('membership_model');
        $data = $this->membership_model->addMembership();

        if ($data) {
            $this->session->set_flashdata('msg', 'update_success');
            redirect('Student');
        }
    }
}
