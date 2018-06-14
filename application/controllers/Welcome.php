<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct()
	{
			parent::__construct();
			$this->load->model('vendor_model');
			$this->load->model('user_model');
			$this->load->library('session');
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
		$data['get_all_vendor_type'] = $this->vendor_model->get_all_vendor_type();
		$this->load->helper('url');
		$this->load->view('welcome_message.php',$data);
	}

	public function logout()
	{
		$this->session->unset_userdata('User_id');
		$this->session->unset_userdata('IsVendor');
		$this->session->unset_userdata('vendor_id');

		redirect('Welcome/login');
	}

	public function login()
	{
		$this->load->helper('url');
		$this->load->view('planningtool/login.php');
	}

  public function signup()
	{
		$this->load->helper('url');
		$this->load->view('planningtool/signup.php');
	}

	public function profile()
	{
		$User_id = $this->session->userdata('User_id');
		if(isset($User_id) && count($User_id)>0)
		{
			$data['get_all_vendor_type'] = $this->vendor_model->get_all_vendor_type();
			$vendor_id = $this->vendor_model->get_vendor_id_by_user_id($User_id);
			$data['user_detail'] = $this->user_model->get_user_by_id($User_id);
			$data['vendor_id'] = $vendor_id['Vendor_id'];
			if(isset($data['vendor_id']) && count($data['vendor_id'])>0)
			{
				$data['vendor_detail'] = $this->vendor_model->get_vendor_by_id($data['vendor_id']);
				$data['vendor_picture'] = $this->vendor_model->get_vendor_picture_by_id($data['vendor_id']);
				$data['vendor_services'] = $this->vendor_model->vendor_services($data['vendor_id']);
				$this->load->helper('url');
				$this->load->view('planningtool/profile.php',$data);
			}
			else {
					redirect('Welcome/dashboard');
			}
		}
		else {
			redirect('Welcome/login');
		}
	}

	public function dologin()
	{
		$User_email = $this->input->post('User_email');
		if(isset($User_email) && count($User_email)>0)
		{
			$data['User_email'] = $User_email;
			$data['User_password'] = $this->input->post('User_password');

			$user = $this->user_model->dologin($data);
			if(isset($user) && count($user) > 0)
			{
				$this->session->set_userdata('User_id',$user['User_id']);
				$this->session->set_userdata('IsVendor',$user['IsVendor']);
				echo 'true';
			}
			else {
				echo 'false';
			}
		}
	}

	public function dashboard()
	{
		$User_id = $this->session->userdata('User_id');
		if(isset($User_id) && count($User_id)>0)
		{
			$data['get_all_vendor_type'] = $this->vendor_model->get_all_vendor_type();
			$vendor_id = $this->vendor_model->get_vendor_id_by_user_id($User_id);
			if(isset($vendor_id) && count($vendor_id)>0)
			{
				$this->session->set_userdata('vendor_id',$vendor_id);
			}
			$data['vendor_id'] = $vendor_id['Vendor_id'];
			$this->load->helper('url');
			$this->load->view('planningtool/dashboard.php',$data);
		}
		else {
			redirect('Welcome/login');
		}
	}

	public function save()
	{
		$User_fname = $this->input->post('User_fname');
		if(isset($User_fname) && count($User_fname)>0)
		{
			$data['User_fname'] = $this->input->post('User_fname');
			$data['User_lname'] = $this->input->post('User_lname');
			$data['User_email'] = $this->input->post('User_email');
			$data['User_phone_no'] = $this->input->post('User_phone_no');
			$data['User_contact_preference'] = $this->input->post('User_contact_preference');
			$data['User_password'] = $this->input->post('User_password');
			$data['IsVendor'] = $this->input->post('IsVendor');
			If(isset($data['IsVendor']) && count($data['IsVendor'])>0)
			{
				$data['IsVendor'] = 1;
			}
			else {
				$data['IsVendor'] = 0;
			}
			$User_id = $this->user_model->add($data);
			echo true;
		}
	}

	public function chk_email()
	{
		$User_email = $this->input->post('User_email');
		if(isset($User_email) && count($User_email)>0)
		{
			$do_exist = $this->user_model->chk_email($User_email);
			if($do_exist > 0)
			{
				echo 'false';
			}
			else {
				echo 'true';
			}

		}
	}

}
