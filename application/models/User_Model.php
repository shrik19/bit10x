<?php

// both ini set added by techbee
ini_set('mysql.connect_timeout', 600);
ini_set('default_socket_timeout', 600); 

//ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);

class User_model extends CI_Model {

   
    function getAllUsers($offset,$limit,$order,$ordrBy,$search=array(),$subscribed_package='',$month='')
	{
			         
             $sql = "SELECT * FROM users WHERE users.is_deleted!='1'";
                    
              if (isset($search['value']) && !empty($search['value'])) {
                        
                        $sql.= " and (users.name  like '%" . $search['value'] . "%'   or
                         users.surname  like '%" . $search['value'] . "%'   or 
                        users.email  like '%" . $search['value'] . "%' or  users.phone  like '%" . $search['value'] . "%')";
                    
              }
               
                   $sql.=" order by " . $ordrBy . " limit $offset,$limit";
		
			$result = $this->db->query($sql);
			return $result->result();
	}
	function getAllUsersCount($offset,$limit,$order,$ordrBy,$search=array())
	{
			
                        
              $sql = "SELECT users.id FROM users WHERE users.is_deleted!='1'";
                    
                    
              
              if (isset($search['value']) && !empty($search['value'])) {
                        
                        $sql.= " and (users.name  like '%" . $search['value'] . "%'   or
                         users.surname  like '%" . $search['value'] . "%'   or 
                        users.email  like '%" . $search['value'] . "%' or  users.phone  like '%" . $search['value'] . "%')";
                    
                    }
                        
			$result2 = $this->db->query($sql);
            $count = $result2->num_rows();
			return $count;
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
	function getCoinDetails($id)
	{
		$this->db->from('coins');
		$this->db->where('status','1');
		$this->db->where('is_deleted', '0');
		$this->db->where('id', $id);
		$query 					= $this->db->get();
		$res					= $query->row();
		return $res;
	}
	function getProvinces()
	{
		$this->db->from('province');
		$this->db->where('status','1');
		$this->db->where('is_deleted', '0');
		$query 					= $this->db->get();
		$res					= $query->result();
		return $res;
	}
	function getCityByProvince($province_id)
	{
		$this->db->from('city');
		$this->db->where('status','1');
		$this->db->where('province_id',$province_id);
		$this->db->where('is_deleted', '0');
		$query 					= $this->db->get();
		$res					= $query->result();
		return $res;
	}
	function getSuburbByCity($city_id)
	{
		$this->db->from('suburb');
		$this->db->where('status','1');
		$this->db->where('city_id',$city_id);
		$this->db->where('is_deleted', '0');
		$query 					= $this->db->get();
		$res					= $query->result();
		return $res;
	}
	
    function getUserDetailsrow($id)
	{
			$this->db->from('users');
    		$this->db->where("id='".$id."' ");
			$this->db->where("is_deleted='0' ");
    		 $query 	= $this->db->get();	
    		 return $query->row();
	}
   
    /**
    * Store the new user's data into the database
    * @return boolean - check the insert
    */	
	function registerUser($postvar)
	{
		$this->db->where('email', $this->input->post('email'));
		$query 						= $this->db->get('users');
		$res						= $query->result();
		$response					= array();
		$msgArray					= array();
		$response['success'] 		= "0";
		$response['message'] 		= "Error in trying to register";
		
        if($res[0]->id > 0)
        {
        	$response['success'] 	= "0";
        	$response['message'] 	= "Email already taken";
		}
		else
		{
		  foreach($postvar as $key=>$v) {
			  $new_member_insert_data[$key]=$v;
		  }
			$new_member_insert_data['created_at']	=	$new_member_insert_data['updated_at']	=date('Y-m-d H:i:s');
			
			$insert 					= $this->db->insert('users', $new_member_insert_data);
			$id 						= $this->db->insert_id();
		    if($insert)
		    {
		    	$response['success'] 	= "1";
        		$response['id'] 		= $id ;
        		$response['message'] 	= 'Registration successful';
		    }
		}
		
		return $response;
	      
	}
	
	function verify_account($string)
	{
	//	$this->db->where('is_verified', '0');
		$this->db->where('email', base64_decode($string));
		
		$query 						= $this->db->get('users');
		$res						= $query->result();
	
		
		return ($res[0]);
	}
	
	function forgotpassword($email )
	{
		
		$this->db->where('email', $email);
		$this->db->where('is_deleted', '0');
		$query 						= $this->db->get('users');
		$res						= $query->row();
		return $res;
	}
	
	function forgotpasswordAdmin($email )
	{
		$this->db->where('email', $email);
		$query 						= $this->db->get('admin');
		$res						= $query->row();
		return $res;
	}
	
	function login($email , $password)
	{
		$this->db->where('is_verified', '1');
		$this->db->where('email', $email);
		$this->db->where('password',  md5($password));
		$this->db->where('is_deleted', '0');
		$query 						= $this->db->get('users');
		$res						= $query->result();
		return intval($res[0]->id);
	}
	
	function loginAdmin($email , $password)
	{
		$this->db->where('email', $email);
		$this->db->where('password',  md5($password));
		$query 						= $this->db->get('admin');
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
	function getUserDetailsByEmail($email)
	{
		$this->db->where('email', $email);
		$this->db->where('is_deleted', '0');
		$query 						= $this->db->get('users');
		$res						= $query->result();
		return $res[0];
	}
	function checkUserByPassword($password,$id)
	{
		$this->db->where('password', md5($password));
		$this->db->where('id', $id);
		$this->db->where('is_deleted', '0');
		$query 						= $this->db->get('users');
		$res						= $query->result();
		return $res[0];
	}
	
	
	function homePage($userId,$showAll='')
	{
    		
    		return 1;
	}
	
	function getUserData($id)
	{
			$this->db->from('users');
    		$this->db->where("id",$id);
    		$this->db->where('is_deleted', '0');
    		$query 				= $this->db->get();
    		$result				= $query->result();
    		
    		return $result[0];
	}
	
	
	function getProfile($id)
	{
		$this->db->from('users');
		$this->db->where("id",$id);
		$this->db->where('is_deleted', '0');
		$query 						= $this->db->get();
		
		$result						= $query->result();
		return $result[0];
	}
	
	function change_password($postvar , $id)
	{
	    $data['password']	= md5($postvar['password']);
	    $this->db->where('id', $id);
		$this->db->where('is_deleted', '0');
	    $return						= $this->db->update('users', $data);	
			
		return $return;
	}
	
	function setProfile($postvar , $id,$picture='')
	{
		if($postvar['password'] == "")
			unset($postvar['password']);
		else
			$postvar['password']	= md5($postvar['password']);
		if($picture!='')
		    $postvar['profile_pic']=$picture;
		unset($postvar['avatar']);	
		unset($postvar['cpassword']);	
		unset($postvar['email']);
		
		$this->db->where('id', $id);
		
		$return						= $this->db->update('users', $postvar);	
			
		return $return;
	}
	
	
	
	
	
	///////////////////////////////////////////////////////////
	
	function deleteUser($id)
	{
		$response['success'] 		= "0";
		$response['message'] 		= "Error trying to get Bitcoin Address";
		
		$data 						= array();
		$data['is_deleted']	= 1;
		 
		$this->db->where('id', $id);
		$this->db->update('users',$data);	
	}
	
	
	
	function getMyDesktop($userId)
	{
			
			return '';
		
	}
	
	/**
    * Serialize the session data stored in the database, 
    * store it in a new array and return it to the controller 
    * @return array
    */
	function get_db_session_data()
	{
		$query = $this->db->select('user_data')->get('ci_sessions');
		$user = array(); /* array to store the user data we fetch */
		foreach ($query->result() as $row)
		{
		    $udata = unserialize($row->user_data);
		    /* put data in array using username as key */
		    $user['user_name'] = $udata['user_name']; 
		    $user['is_logged_in'] = $udata['is_logged_in']; 
		}
		return $user;
	}
	
    
}

