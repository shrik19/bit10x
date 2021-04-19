<?php

class Contentpage_Model extends CI_Model {
    
     function getAllPages()
	{
			$this->db->from('content_pages');
    		$this->db->where(" is_deleted!='1' ");
    		 $query 	= $this->db->get();	
    		 return $query->result();
	}
	function getActivePage($id='')
	{
			$this->db->from('content_pages');
    		$this->db->where(" is_deleted='0' ");
    		if($id!='')
    		    $this->db->where(" id='$id' ");
    		
    		 $query 	= $this->db->get();	
    		 return $query->result();
	}
}