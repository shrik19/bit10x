<?php
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
class Admin extends CI_Controller {

	public function __construct() {
        parent::__construct();
        $this->load->model('Admin_Model');
    }


	function index()
	{
		$loggedIn						= $this->session->userdata('admin_user');
		if($loggedIn)
		{
			redirect("/admin/users");
			$this->load->view('admin/dashboard');
		}
		else 
			$this->load->view('user/signin');
			
		
	}
	
	function logout()
	{
			$this->session->sess_destroy();
			redirect('/user/');					
	}
	
	
	
}

?>