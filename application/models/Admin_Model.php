<?php

class Admin_model extends CI_Model {


	
    
	function homePage()
	{
			
    		return 1;
	
	}
	

	
	/////////////////////////// END FUNCTIONS ///////////////////////////
	
	
	
	
	
	function deleteUser($id)
	{
		
		$data['is_deleted']		= 1;
		 
		$this->db->where('id', $id);
		$this->db->update('users', $data);
	}
	
	
	function login($email , $password)
	{
		$this->db->where('is_deleted', '0');
		$this->db->where('email', $email);
		$this->db->where('password',  md5($password));
		$query 						= $this->db->get('users');
		$res						= $query->result();
		return intval($res[0]->id);
	}
	
	function getUserDetails($id)
	{
		$this->db->where('id', $id);
		$this->db->where('is_deleted', '0');
		$query 						= $this->db->get('users');
		$res						= $query->result();
		return $res[0];
	}
	
	
	
	function getCoins()
	{
		$this->db->from('coins');
		$this->db->where('status','1');
		$this->db->where('is_deleted', '0');
		$query 					= $this->db->get();
		$res					= $query->result();
		return $res;
	}
	
	
   
    
}

