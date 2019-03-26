<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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
        $this->load->library('session');

        $arr_user = $this->session->userdata('user_data');

        if($arr_user == false )
        {
            redirect(base_url().'user_auth');
        }

        if(isset($arr_user['user_role']) && $arr_user['user_role']!='user' )
        {
            redirect(base_url().'user_auth');
        }

    }




	public function index()
	{

		$this->load->view('user/user');
	}

   public function logout(){
   	session_destroy();
   	redirect(base_url().'user_auth');
   	
   }
}

