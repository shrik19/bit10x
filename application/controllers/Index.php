<?php
class Index extends CI_Controller {

    /**
    * load the public home page
    * @return void
    */	
	function home()
	{
		$loggedIn				= $this->session->userdata('is_logged_in');
		$data['loggedin'] 		= $loggedIn;
		
		$this->load->model('Contentpage_Model'); 
		$data['policies']	    = $this->Contentpage_Model->getActivePage();
		$this->load->view('index' , $data);
		
	}              
	
	
}

?>