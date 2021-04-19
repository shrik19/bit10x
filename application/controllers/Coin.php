<?php

class Coin extends CI_Controller {

	public function __construct() {
        parent::__construct();
        
    
        $this->load->model('Coin_Model'); 
		
		
    }

    function getpagedetails(){
        $coins=$this->Coin_Model->getActiveCoin($_POST['id']);
        //echo'<pre>';print_r($coins);
        	$response['coin'] 	= $coins[0]->coin;
        	$response['content'] 	= $coins[0]->content;
        	echo json_encode($response);
    }
     function index()
	{
	//echo'here';
		$adminLoggedin		= $this->session->userdata('admin_user');
		if($adminLoggedin)
		{
			$data['data']				= $this->Coin_Model->getAllCoins();
			$this->load->view('admin/coin',$data);
		}
		else 
			$this->load->view('user/signin');
			
		
	}
	function delete($id){
        
        $data = array(
            
            'is_deleted' => 1,
            'updated_at'=>date('Y-m-d H:i:s')
        );
        
            $this->db->where('id',$id);
            $save= $this->db->update('coins',$data);
          
        $this->session->set_flashdata('coin_save', 'Content Coin Deleted Successfully');
        
        redirect("/coin");
    }
  
    function save(){
        
        $status=1;
        if($this->input->post('status')) 
        $status=$this->input->post('status');
        
        $this->load->library('form_validation');
        
        if($this->input->post('coin') != $this->input->post('old_coin')) {
           $is_unique =  '|is_unique[coins.coin]';
        } else {
           $is_unique =  '';
        }
        
        $this->form_validation->set_rules('coin', 'Coin', 'required|trim'.$is_unique);
         
       if ($this->form_validation->run() == FALSE)
            {
                    $this->load->view('admin/coinform');
            }
            else
            { 
                $data = array(
                    'coin' => trim($this->input->post('coin')),
                   // 'content' => $this->input->post('content'),
                    'status' => $status,
                    'created_at'=>date('Y-m-d H:i:s'),
					'updated_at'=>date('Y-m-d H:i:s')
                );
                if($this->input->post('id')==0){  
                    $save= $this->db->insert('coins',$data);
                }else{
                    $this->db->where('id',$this->input->post('id'));
                    $save= $this->db->update('coins',$data);
                }  
                $this->session->set_flashdata('coin_save', 'Content Coin Saved Successfully');
                // After that you need to used redirect function instead of load view such as 
                redirect("/coin");
            }
    }
	function edit($id)
   {
       $coin['coin'] = $this->db->get_where('coins', array('id' => $id))->row();
       
       $this->load->view('admin/coinform',$coin);
        
   }
   function add()
   {
       //$this->load->helper(array('form', 'url'));
       $this->load->view('admin/coinform');
        
   }
	
}

?>