<?php

class Order extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
    
        $this->load->model('Order_Model'); 
        
        
    }

    
    function index(){
    //echo'here';
        $adminLoggedin      = $this->session->userdata('admin_user');
        if($adminLoggedin)
        {
            $data['data']               = $this->Order_Model->getAllOrders();
            $this->load->view('admin/order',$data);
        }
        else 
            $this->load->view('user/signin');
            
        
    }

    function deleteOrder($id){
        
        $data = array(
            
            'is_deleted' => 1,
            'updated_time'=>date('Y-m-d H:i:s')
        );
        
            $this->db->where('id',$id);
            $save= $this->db->update('orders',$data);
          
        $this->session->set_flashdata('order_delete', 'Order Deleted Successfully');
        
        redirect("/order");
    }
    
    /*get coin listing*/
    function CoinListing(){
        $adminLoggedin  = $this->session->userdata('admin_user');
        
        if($adminLoggedin){
            $data['data'] = $this->Order_Model->getAllCoins();
            $this->load->view('admin/CoinListing',$data);
        }
        else 
            $this->load->view('user/signin');
            
        
    }

    
}

?>