<?php

class Order_Model extends CI_Model {
    
     function getAllOrders(){ 
        $this->db->select('orders.*,users.id,users.name,coins.id,coins.coin');    
        $this->db->from('orders');
        $this->db->join('users', 'orders.user_id = users.id');
        $this->db->join('coins', 'orders.coin_id = coins.id');
        $this->db->where("orders.is_deleted!='1' ");
        $query = $this->db->get();
    	return $query->result();
	}

    /*function to get all coins*/
    function getAllCoins(){
       $sql = "SELECT coins.coin, coins.id,(select sum(rand_price) FROM orders WHERE orders.coin_id = coins.id ) as total_amount, (select count(id) FROM orders WHERE orders.coin_id = coins.id ) as total_order FROM coins WHERE coins.status = '1' AND coins.is_deleted != '1' ";

        $query = $this->db->query($sql); 
       
   
        return $query->result();
    }

   
    
}