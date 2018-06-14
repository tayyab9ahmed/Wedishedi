<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendor extends CI_Controller {
	function __construct()
	{
			parent::__construct();
			$this->load->model('vendor_model');
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
		$this->load->helper('url');
		$data['get_all_vendor_type'] = $this->vendor_model->get_all_vendor_type();
		$data['listing'] = $this->vendor_model->get_all_vendors();

		$this->load->view('vendor/index.php',$data);
	}

	public function detail()
	{
		$vendor_id = $this->uri->segment(3);
		$data['get_all_vendor_type'] = $this->vendor_model->get_all_vendor_type();
		$data['get_vendor_by_id'] = $this->vendor_model->get_vendor_by_id($vendor_id);

		$vendor_type =  $data['get_vendor_by_id']['Vendor_type'];
		$data['get_all_vendor_services'] = $this->vendor_model->vendor_services($vendor_id);
		$data['get_all_vendor_pictures'] = $this->vendor_model->get_vendor_images($vendor_id);
		$data['get_all_package'] = $this->vendor_model->get_all_package($vendor_id);
		//$vendor_type =
		$this->load->helper('url');
		$this->load->view('vendor/detail.php',$data);
	}

	public function search()
	{
		$vendor_type = $this->input->post('vendor_type');
		$vendor_city = $this->input->post('city');
		if(isset($vendor_type) && count($vendor_type)>0 && isset($vendor_city) && count($vendor_city) > 0)
		{
			$data['get_all_vendor_type'] = $this->vendor_model->get_all_vendor_type();
			$data['listing'] = $this->vendor_model->get_all_vendor_by_type_city($vendor_type,$vendor_city);
			$data['vendor_type'] = $vendor_type;
			$data['city'] = $vendor_city;
			$this->load->view('vendor/index.php',$data);
			//var_dump($listing);
			//exit();
		}
		else {
			$vendor_type = $this->input->get('vendor_type');
			if(isset($vendor_type) && count($vendor_type)>0)
			{
				$data['get_all_vendor_type'] = $this->vendor_model->get_all_vendor_type();
				$data['listing'] = $this->vendor_model->get_all_vendor_by_type($vendor_type);
				$data['vendor_type'] = $vendor_type;
				$this->load->view('vendor/index.php',$data);
				//var_dump($listing);
				//exit();
			}
			else {
				redirect('welcome');
			}

		}
	}

	public function get_services_by_vendor_type()
  {
    $vendor_type_id = $this->input->get('vendor_type_id');

    $vendor_services_list = $this->vendor_model->get_services_by_vendor_type($vendor_type_id);
    echo $vendor_services_list;
  }

	public function get_vendor_service_by_id()
  {
    $vendor_id = $this->input->get('vendor_id');
		$vendor_type_id = $this->input->get('vendor_type_id');

    $vendor_services_list = $this->vendor_model->get_vendor_service_by_id($vendor_id,$vendor_type_id);
    echo $vendor_services_list;
  }

	public function get_vendor_images()
	{
		$vendor_id = $this->input->get('vendor_id');
		$vendor_images = $this->vendor_model->get_vendor_images($vendor_id);
		$filepath = ''.str_replace('\\', '/',FCPATH).'images/vendortesting/';

		foreach($vendor_images as $file){ //get an array which has the names of all the files and loop through it
				$obj['name'] = $file['Vendor_picture_path']; //get the filename in array
        $obj['size'] = filesize(''.$filepath.$file['Vendor_picture_path'].''); //get the flesize in array
        $result[] = $obj; // copy it to another array
      }
       header('Content-Type: application/json');
       echo json_encode($result);
	}

	public function get_package_images()
	{
		$package_id = $this->input->get('package_id');
		$vendor_images = $this->vendor_model->get_package_images($package_id);
		$filepath = ''.str_replace('\\', '/',FCPATH).'images/packagetesting/';

		foreach($vendor_images as $file){ //get an array which has the names of all the files and loop through it
				$obj['name'] = $file['package_picture_path']; //get the filename in array
        $obj['size'] = filesize(''.$filepath.$file['package_picture_path'].''); //get the flesize in array
        $result[] = $obj; // copy it to another array
      }
       header('Content-Type: application/json');
       echo json_encode($result);
	}

	public function get_vendor_services()
	{
		$vendor_type = $this->input->post('vendor_type_id');
		echo json_encode($this->vendor_model->get_vendor_services($vendor_type));
	}

	public function edit()
	{
		$User_id = $this->session->userdata('User_id');
		if(isset($User_id) && count($User_id)>0)
		{
			$data['get_all_vendor_type'] = $this->vendor_model->get_all_vendor_type();
			$vendor_id = $this->vendor_model->get_vendor_id_by_user_id($User_id);
			$data['user_detail'] = $this->user_model->get_user_by_id($User_id);
			$data['vendor_id'] = $vendor_id['Vendor_id'];
			$data['vendor_detail'] = $this->vendor_model->get_vendor_by_id($data['vendor_id']);
			$data['vendor_picture'] = $this->vendor_model->get_vendor_picture_by_id($data['vendor_id']);
			$data['vendor_services'] = $this->vendor_model->vendor_services($data['vendor_id']);
			$this->load->helper('url');
			$this->load->view('vendor/edit.php',$data);
		}
		else {
			redirect('Welcome/login');
		}

	}

	public function save()
		{
			$Vendor_name = $this->input->post('Vendor_name');
			if(isset($Vendor_name) && count($Vendor_name)>0 )
			{

				$data['Vendor_name'] = $Vendor_name;
				$data['Vendor_type'] = $this->input->post('Vendor_type');
				$data['Vendor_description'] = $this->input->post('Vendor_description');
				$data['Vendor_starting_price'] = $this->input->post('Vendor_starting_price');
				$data['Vendor_address'] = $this->input->post('Vendor_address');
				$data['User_id'] = $this->input->post('User_id');
				$data['city'] = $this->input->post('city');
				$data['Vendor_lat'] = $this->input->post('Vendor_lat');
				$data['Vendor_long'] =  $this->input->post('Vendor_long');
				$data['vendor_id'] = $this->input->post('vendor_id');
				if(isset($data['vendor_id']) && $data['vendor_id'] > 0)
				{
					$vendor_id = $data['vendor_id'];
					$this->vendor_model->edit($data);
				}
				else {
					$vendor_id = $this->vendor_model->add($data);
				}

				$min_max_service_id = $this->vendor_model->get_min_max_service_id();

				for($x = $min_max_service_id['min_serive_id'];$x<=$min_max_service_id['max_serive_id'];$x++)
				{

						$result = $this->input->post('Service_id_'.$x.'');

						if(isset($result) && count($result)>0)
						{

							$service_id = $x;
							if(isset($data['vendor_id']) && $data['vendor_id'] > 0)
							{
								$vendor_service_id = $this->vendor_model->edit_vendor_services($vendor_id,$service_id,$result);
							}
							else {
								$vendor_service_id = $this->vendor_model->add_vendor_services($vendor_id,$service_id,$result);
							}
						}
				}
						$config['upload_path']   = FCPATH.'images\vendortesting';
					 $config['allowed_types'] = 'gif|png|jpg|jpeg';
					 $config['max_size']      = 400000000000;
					 $config['max_width']     = 3260;
					 $config['max_height']    = 1600;

					 $this->load->library('upload', $config);
							$config['file_name'] = 'vendor_'.$vendor_id.'' ;
							$this->upload->initialize($config);
					 		//$this->upload->do_upload('vendor_img');
					 		//$data = $this->upload->data();
					 		if ( ! $this->upload->do_upload('Vendor_picture')) {
					 				$error = array('error' => $this->upload->display_errors());
					 				var_dump($error);
					 				exit();
					 		 }
					 		 else {
					 			 $data = $this->upload->data();
					 			 //$path = $data['full_path'].'/'.$config['file_name'];
									 $profile_pic = 1;
					 			$this->vendor_model->add_image_path($vendor_id,$data['file_name'],$profile_pic);
					 		 }


				 echo $vendor_id;
			}
			else {
				redirect('vendor');
			}

		}

		public function file_upload()
	{
		$vendor_id = $this->input->POST('vendor_id');
		if(isset($vendor_id) && $vendor_id > 0)
		{
				$filesCount = count($_FILES['myFiles']['name']);
				$config['upload_path']   = FCPATH.'images\vendortesting';
			 $config['allowed_types'] = 'gif|png|jpg|jpeg';
			 $config['max_size']      = 400000000000;
			 $config['max_width']     = 3260;
			 $config['max_height']    = 1600;

			 $this->load->library('upload', $config);
			 $files = $_FILES;
				 for ($i = 0; $i < $filesCount; $i++) {
					 $_FILES['myFiles']['name']= $files['myFiles']['name'][$i];
		        $_FILES['myFiles']['type']= $files['myFiles']['type'][$i];
		        $_FILES['myFiles']['tmp_name']= $files['myFiles']['tmp_name'][$i];
		        $_FILES['myFiles']['error']= $files['myFiles']['error'][$i];
		        $_FILES['myFiles']['size']= $files['myFiles']['size'][$i];
					$config['file_name'] = 'vendor_'.$vendor_id.'_'.$i.'' ;
					$this->upload->initialize($config);
			 		//$this->upload->do_upload('vendor_img');
			 		//$data = $this->upload->data();
			 		if ( ! $this->upload->do_upload('myFiles')) {
			 				$error = array('error' => $this->upload->display_errors());
			 				var_dump($error);
			 				exit();
			 		 }
			 		 else {
			 			 $data = $this->upload->data();
			 			 //$path = $data['full_path'].'/'.$config['file_name'];
						 if($i == 0)
						 {
							 $profile_pic = 1;
						 }
						 else {
						 	$profile_pic = 0;
						 }
			 			$this->vendor_model->add_image_path($vendor_id,$data['file_name'],$profile_pic);
			 		 }

				 }
			 }
			}

			public function package()
			{
				$User_id = $this->session->userdata('User_id');
				if(isset($User_id) && count($User_id)>0)
				{
					$this->load->helper('url');
					$data['get_all_vendor_type'] = $this->vendor_model->get_all_vendor_type();
					$user_id = $this->session->userdata('User_id');
					$vendor_id = $this->vendor_model->get_vendor_id_by_user_id($user_id);
					if(isset($vendor_id) && count($vendor_id)>0)
					{
						$data['get_all_package'] = $this->vendor_model->get_all_package($vendor_id['Vendor_id']);
						$this->load->view('vendor/package.php',$data);
					}
					else {
						redirect('Welcome/dashboard');
					}
				}
				else {
					redirect('Welcome/login');
				}
			}

			public function addpackage()
			{
				$User_id = $this->session->userdata('User_id');
				if(isset($User_id) && count($User_id)>0)
				{
					$this->load->helper('url');
					$data['get_all_vendor_type'] = $this->vendor_model->get_all_vendor_type();
					$user_id = $this->session->userdata('User_id');
					$data['Vendor_id'] = $this->vendor_model->get_vendor_id_by_user_id($user_id);
					$this->load->view('vendor/addpackage.php',$data);
				}
				else {
					redirect('Welcome/login');
				}
			}

			public function editpackage()
			{
				$User_id = $this->session->userdata('User_id');

				if(isset($User_id) && count($User_id)>0)
				{
					$this->load->helper('url');
					$package_id = $this->uri->segment(3);
					$data['get_all_vendor_type'] = $this->vendor_model->get_all_vendor_type();
					//$user_id = $this->session->userdata('User_id');
					$data['Vendor_id'] = $this->vendor_model->get_vendor_id_by_user_id($User_id);
					$data['User_id'] = $User_id;
					$data['get_package_by_id'] = $this->vendor_model->get_package_by_id($package_id);
					$this->load->view('vendor/editpackage.php',$data);
				}
				else {
					redirect('Welcome/login');
				}
			}

			public function delete_package_picture()
			{
				$pic_name = $this->input->POST('name');
				$file_path= FCPATH.'images\packagetesting\\'.$pic_name;
				if(is_file($file_path))
				{
					unlink($file_path);
					$this->vendor_model->delete_package_picture($pic_name);
				}

			}

			public function packagesave()
			{
				$vendor_id = $this->input->POST('vendor_id');
				$user_id = $this->input->POST('User_id');
				if(isset($vendor_id) && $vendor_id > 0 && isset($user_id) && $user_id > 0)
				{
					$data['Package_title'] = $this->input->POST('Package_title');
					$data['Package_category'] = $this->input->POST('Package_category');
					$data['Package_description'] = $this->input->POST('Package_description');
					$data['Package_price'] = $this->input->POST('Package_price');
					$data['vendor_id'] = $this->input->POST('vendor_id');
					$Package_id = $this->input->POST('Package_id');
					if(isset($Package_id) && $Package_id > 0)
					{
						$data['Package_id'] = $this->input->POST('Package_id');
						$this->vendor_model->packageedit($data);
					}
					else {
						$Package_id = $this->vendor_model->packageadd($data);
					}

					if(isset($Package_id) && count($Package_id)>0)
					{
						$filesCount = count($_FILES['myFiles']['name']);
						$config['upload_path']   = FCPATH.'images\packagetesting';
					 $config['allowed_types'] = 'gif|png|jpg|jpeg';
					 $config['max_size']      = 400000000000;
					 $config['max_width']     = 3260;
					 $config['max_height']    = 1600;

					 $this->load->library('upload', $config);
					 $files = $_FILES;
						 for ($i = 0; $i < $filesCount; $i++) {
							 $_FILES['myFiles']['name']= $files['myFiles']['name'][$i];
				        $_FILES['myFiles']['type']= $files['myFiles']['type'][$i];
				        $_FILES['myFiles']['tmp_name']= $files['myFiles']['tmp_name'][$i];
				        $_FILES['myFiles']['error']= $files['myFiles']['error'][$i];
				        $_FILES['myFiles']['size']= $files['myFiles']['size'][$i];
							$config['file_name'] = 'package_'.$Package_id.'_'.$i.'' ;
							$this->upload->initialize($config);
					 		//$this->upload->do_upload('vendor_img');
					 		//$data = $this->upload->data();
					 		if ( ! $this->upload->do_upload('myFiles')) {
					 				$error = array('error' => $this->upload->display_errors());
					 				var_dump($error);
					 				exit();
					 		 }
					 		 else {
					 			 $data = $this->upload->data();
					 			$this->vendor_model->add_package_image_path($Package_id,$data['file_name']);
					 		 }

						 }
					}
				}
			}
}
