<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class planningtool extends CI_Controller {
	function __construct()
	{
			parent::__construct();
			$this->load->model('vendor_model');
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
		$this->load->view('planningtool/dashboard.php',$data);
	}
}
