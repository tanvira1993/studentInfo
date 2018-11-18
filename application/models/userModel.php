<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class userModel extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}


	public function insertUserInfo($data){
		//$ArrayData = [];

		$this->db->insert('users_info', $data);
		return $this->db->insert_id();
	}


	public function selectAllUsers(){
		//$ArrayData = [];

		$this->db->select('id');
		$this->db->select('first_name as firstName');
		$this->db->select('last_name as lastName');
		$this->db->select('gender');
		$this->db->select('dob');
		$this->db->select('email');
		$this->db->select('address');
		$this->db->select('phone');
		$this->db->select('status');
		$this->db->select('create_date as createDate');

		$this->db->from('users_info');
		return $this->db->get()->result_array();


	}

	public function UserInfo($userId)
	{

		$this->db->select('id');
		$this->db->select('first_name as firstName');
		$this->db->select('last_name as lastName');
		$this->db->select('gender');
		$this->db->select('dob');
		$this->db->select('email');
		$this->db->select('address');
		$this->db->select('phone');
		$this->db->select('status');
		//$this->db->select('password');

		$this->db->from('users_info');
		$this->db->where('id',$userId);
		return $this->db->get()->row_array();

	}

	public function update($userId, $data)
	{



		$this->db->update('users_info', $data, array('id'=>$userId));
		//$this->db->insert('users_info', $data);
		
		//$this->db->select('password');

		//$this->db->from('users_info');
		$this->db->where('id',$userId);

		return $this->db->insert_id();
		//return $this->db->get()->row_array();

	}

	public function deleteUserInfo($userId)
	{
		$this->db->delete('users_info', array('id'=>$userId));
		
		//return $this->db->delete_id();


	}

}



