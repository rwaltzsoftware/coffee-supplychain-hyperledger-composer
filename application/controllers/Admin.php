<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *      http://example.com/index.php/welcome
     *  - or -
     *      http://example.com/index.php/welcome/index
     *  - or -
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
        $this->load->database();
        $this->load->model('Master_model');

        $arr_admin = $this->session->userdata('user_data');

        if($arr_admin == false )
        {
            redirect(base_url().'admin_auth');
        }

        if(isset($arr_admin['user_role']) && $arr_admin['user_role']!='admin' )
        {
            redirect(base_url().'admin_auth');
        }

    }


    public function index()
    {
            
        $this->load->view('admin/admin');
    }

    public function logout(){
        
        session_destroy();
        redirect(base_url().'admin_auth');
    }

    public function user_add(){
        // print_r($this->input->post());
        
   
    $user_password = $this->input->post('userPassword');
   
    $user_email= $this->input->post('userEmail');
    $user_password_hash= sha1($user_password);
    $user_role = 'user';

    // Check email duplication validation


    $data = array(
        'user_email'=>$user_email,
        'user_password'=>$user_password_hash,
        'user_role'=>$user_role
    );

    $this->db->insert('user_login',$data);

    $insert_id = $this->db->insert_id();

    $arr_response = [];

    if(isset($insert_id) && $insert_id>0){
        $arr_response['status'] = 'SUCCESS';
        $arr_response['userId'] = $insert_id;
    }
    else{
        $arr_response['status'] = 'ERROR';
    }

    echo json_encode($arr_response);
}






}



