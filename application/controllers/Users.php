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

		echo '<pre>';
		print_r($userArr);
		echo '</pre>';
		


		$data = [];
		$data['first_name'] = $userArr['firstName'];
		$data['last_name'] = $userArr['lastName'];
		$data['dob'] = $userArr['dob'];
		$data['gender'] = $userArr['gender'];
		$data['email'] = $userArr['email'];
		$data['address'] = $userArr['address'];
		$data['status'] = $userArr['status'];
		$data['phone'] = $userArr['phone'];
		$data['phone'] = $userArr['phone'];
		
		$data['password'] = sha1($userArr['password']);


		//exit;
		$data = $this->userModel->insertUserInfo($data);
		//json_success($Arr,200);
		json_encode(array('success'=>1,'data'=>$data));

	}


	public function updateDone()
	{
		$userArr = $this->input->post();

		echo '<pre>';
		print_r($userArr);
		echo '</pre>';
		


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


	public function getUserInfo($id)
	{
		$this->benchmark->mark('code_start');


		$data = $this->userModel->UserInfo($id);
		$this->benchmark->mark('code_end');
		$executeDuration = $this->benchmark->elapsed_time('code_start', 'code_end');
		json_success($data,200, $executeDuration);

	}
}

/* End of file UsersController.php */
/* Location: ./application/controllers/UsersController.php */