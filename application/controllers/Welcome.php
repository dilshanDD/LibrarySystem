<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
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
		$object['controller'] = $this;
		$object['active_tab'] = "Dashboard";
		$object['title'] = "Dashboard";
		$this->load->view('include/header', $object);     //or use render method
		$this->load->view('include/sidebar');
		$this->load->view('dashboard');
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

			redirect('Staff');
		} else {

			redirect('Staff/login');
		}
	}
}
