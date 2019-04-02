<?php 
   defined('BASEPATH') OR exit('No direct script access allowed');
   class Batchdetails extends CI_Controller {
  
      public function index() { 
      	
      	
         	$this->load->view('user/batchdetails_view');
      		} 
   
      	
   
public function verifyBatch($a){
	
      		if(isset($a) && isset($a)!="") {
        $this->load->view('user/batchdetails_view');
      	
      	}
      	else{
      		echo"something went wrong";
      	}
      	}

   } 


   
?>

