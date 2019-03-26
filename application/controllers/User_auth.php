<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_auth extends CI_Controller {

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

	public function __construct()
	{
		parent:: __construct();
		$this->load->database();
		$this->load->model('Master_model');

		$this->load->helper(array('form','url'));
		// $this->load->library('form_validation');
		$this->load->library('session');

	}

	public function index()
	{

		$this->load->view('user/login');
	}

	public function process_login()
	{

        $email = $this->input->post('email');
		$password = $this->input->post('password');

		// $arr_data = [
		// 				'email'=>$email,
		// 				'password'=>$password
		// 			];

		$input_array = [];
		$input_array['user_email'] = $email;
		$input_array['user_password'] = sha1($password);
		$input_array['user_role'] = 'user';

		$user_info = $this->db->where($input_array)
							->get('user_login')
							->row_array();

		if($user_info == false)
		{
			$this->session->set_flashdata('error', 'Invalid Credentials');
			redirect(base_url().'user_auth');
		}	


		$this->session->set_userdata('user_data',$user_info);

		redirect(base_url().'user');

	}
}
