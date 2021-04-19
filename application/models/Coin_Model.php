<?php

class Coin_Model extends CI_Model {
    
     function getAllCoins()
	{
			$this->db->from('coins');
    		$this->db->where(" is_deleted!='1' ");
    		 $query 	= $this->db->get();	
    		 return $query->result();
	}
	function getActiveCoin($id='')
	{
			$this->db->from('coins');
    		$this->db->where(" is_deleted='0' ");
    		if($id!='')
    		    $this->db->where(" id='$id' ");
    		
    		 $query 	= $this->db->get();	
    		 return $query->result();
	}
}