<?php 

class User_model extends CI_model
{
 

	public function __construct()
	{
		$this->load->database();
		$this->load->helper('url');
	}

	// public function insert($user_arr)
	// {
	// 	$insert = $this->db->insert('user',$user_arr);
	// 	return $insert;
	// }

	public function select_email($email)
	{

		$this->db->where('email',$email);
		$select_email = $this->db->get('user_login');
		return $select_email;
	}

	public function select()
	{
		$user = $this->db->get('user');
		return $user;
	}

	public function login_user($data)
	{
		$this->db->select('*');
		$this->db->where('user_email', $data['email']);
        $this->db->where('user_password', $data['password']);
		$user = $this->db->get('user_login');
		return $user;
	}

	public function select_user($userid)
	{
		$this->db->where('id',$userid);
		$result = $this->db->get('user');
		return $result;
	}

	public function update_password($id,$data)
	{
		$this->db->where('id',$id);
		$update = $this->db->update('user',$data);
		return $update;
	}

	public function update_user($userid,$user_arr)
	{
		$this->db->where('id',$userid);
		$update = $this->db->update('user',$user_arr);
		return $update;
	}
	
	

}
?>