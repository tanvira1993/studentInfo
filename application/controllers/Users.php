<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->model('userModel');

	}

	public function index()
	{
		$this->load->view('users/index');
	}

	public function getAllUsers()
	{
		$data = $this->userModel->selectAllUsers();
		echo json_encode(array('success'=>1,'userData'=>$data));
	}
	public function create()
	{
		$this->load->view('users/create');	
	}

	public function update()
	{
		$this->load->view('users/update');	
	}

	public function save()
	{
		$userArr = $this->input->post();

		
		$data = [];
		$data['first_name'] = $userArr['firstName'];
		$data['last_name'] = $userArr['lastName'];
		$data['dob'] = $userArr['dob'];
		$data['gender'] = $userArr['gender'];
		$data['email'] = $userArr['email'];
		$data['address'] = $userArr['address'];
		$data['status'] = $userArr['status'];
		$data['phone'] = $userArr['phone'];		
		$data['password'] = sha1($userArr['password']);
		$data['file'] = isset($userArr['file']) ? $userArr['file'] : null;

		//exit;
		$data = $this->userModel->insertUserInfo($data);
		//json_success($Arr,200);
		json_encode(array('success'=>1,'data'=>$data));

	}


	public function updateDone()
	{
		$userArr = $this->input->post();



		$data = [];
		$data['first_name'] = $userArr['firstName'];
		$data['last_name'] = $userArr['lastName'];
		$data['dob'] = $userArr['dob'];
		$data['gender'] = $userArr['gender'];
		$data['email'] = $userArr['email'];
		$data['address'] = $userArr['address'];
		$data['status'] = $userArr['status'];
		$data['phone'] = $userArr['phone'];
		
		//exit;
		$data = $this->userModel->update($userArr['id'],$data);
		//json_success($Arr,200);
		//json_encode(array('success'=>1,'data'=>$data));
		json_success($data,200);

	}


	public function delete($id)
	{
		//$userArr = $this->input->post();
		
		$this->userModel->deleteUserInfo($id);
		json_success();


	}


	public function getUserInfo($id)
	{
		$this->benchmark->mark('code_start');


		$data = $this->userModel->UserInfo($id);
		$this->benchmark->mark('code_end');
		$executeDuration = $this->benchmark->elapsed_time('code_start', 'code_end');
		json_success($data,200, $executeDuration);

	}

	public function uploadFile()
	{
		$fileData = $this->input->post();
		
		$config['upload_path']   = './uploads';
		$config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';
		$config['max_size']      = 51200;
			// $config['max_width']     = 4000;
			// $config['max_height']    = 4000;
		$config['remove_spaces'] = TRUE;
		$config['encrypt_name']  = TRUE;

		$this->load->library('upload', $config);

		if (!is_dir('uploads')) {
			mkdir('./uploads', 0777, true);
		}

		$data = array();
		if (!$this->upload->do_upload('image')) { 
			// upload failed
			$jsonData = array('error' => true, 'message' => $this->upload->display_errors('', ''), 'heading' => 'validation error');
		} else {
			$jsonData      = array('success' => true, 'data' => $this->upload->data());
		}

		echo json_encode($jsonData);
	}

	public function admin(){
		$this->load->view('', $data, FALSE);
	}


}

/* End of file UsersController.php */
/* Location: ./application/controllers/UsersController.php */