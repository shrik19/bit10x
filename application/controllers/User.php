<?php
//ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
class User extends CI_Controller {

	public function __construct() {
        parent::__construct();
        
    
        $this->load->model('User_Model'); 
        
		$this->load->model('Contentpage_Model'); 
		
		
		if($this->session->userdata('is_logged_in'))
		{
		    //echo $this->session->userdata('is_logged_in');
		    setcookie('blockalpha_user', $this->session->userdata('is_logged_in'), time() + (86400 * 30), "/");
			$userId						= $this->session->userdata('is_logged_in');
			$userData					= $this->User_Model->getUserDetails($userId);
			
			$this->session->set_userdata('userdata',$userData);
			
			
		}
		//$response				= $this->binance_features->orders('LINKUSDT');
       //	echo'<pre>';print_r($response);exit;
		
    }
   
   function settings(){
       $data['profile'] = $this->User_Model->getProfile($this->session->userdata('is_logged_in'));
		$data['name']   = $data['profile']->name;
            $data['policies']			    = $this->Contentpage_Model->getActivePage();
    		$this->load->view('user/settings',$data);
   }
   
   function ipn_pay()
    {
			//$_POST							= json_decode(file_get_contents("http://blockalpha.tk/abc.txt"),true);
    		$post							= $_POST;
    		file_put_contents("ipn.txt",print_r($post,true));
    		file_put_contents("ipn_json.txt",json_encode($post,true));
    		
    		if($post['payment_status'] == "COMPLETE")
    		{
    		
    			$coin			    		= $this->User_Model->getCoinDetails($post['custom_int1']);
    			
    			$data['user_id']			= strval($post['custom_int2']);
    			$data['coin_id']			= strval($post['custom_int1']);
    			$data['rand_price']			= strval($post['amount_gross']);
    			$data['package_id']			= ($post['custom_int1']);
    			$data['created_time']       = date('Y-m-d H:i:s');
				$data['updated_time']       = date('Y-m-d H:i:s');
    			$data['transaction_id']     = $post['m_payment_id'];
    			$data['payment_status']     = 'Success';
    			//print_r($data);
    			
    			file_put_contents("ipn2.txt",print_r($data,true));
    			
    			$this->db->insert('orders',$data);
    		}
    }
    
   function index()
	{
	    
		$loggedIn						= $this->session->userdata('is_logged_in');
		$adminLoggedin					= $this->session->userdata('admin_user');
		$coins							= $this->User_Model->getCoins();
		if($loggedIn)
		{
		
		   // $balance					= $this->binance_features->exchangeInfo();echo'<pre>';print_r($balance);exit;
			$userdata					= $this->User_Model->getUserData($loggedIn);
			
			if(empty($userdata) || $userdata->status=='0') {
			    redirect("/user/logout");
			}
			
			
			$data['profile'] = $this->User_Model->getProfile($this->session->userdata('is_logged_in'));
			$data['name']   = $data['profile']->name;
			$this->load->view('user/dashboard',$data);
		
			
		}
		else if($adminLoggedin)
		{
			$this->load->view('admin/dashboard');
		}
		else 
			$this->load->view('user/signin');
			
		
	}
	
	
	function login()
	{
	
		if($this->session->userdata('is_logged_in'))
		{
			redirect('/user/dashboard');   
        }
        else
        {
        	if($_POST['login'] == "1")
        	{
        		$email 						= $_POST['email'];
        		$password 					= $_POST['password'];
        		$response					= array();
        		$msgArray					= array();
        		$response['success'] 		= "0";
        		$response['message'] 		= "Invalid credentials";
        		
        		$userId						= $this->User_Model->login($email , $password);
        		if($userId > 0)
        		{
        			$this->session->set_userdata('is_logged_in',$userId);
        			$response['success'] 	= "1";
        			$response['message'] 	= "Login successful";
        		}
        		else
        		{
        			$userId					= $this->User_Model->loginAdmin($email , $password);
        			if($userId > 0)
					{
						$this->session->set_userdata('admin_user',$userId);
						$this->session->userdata('admin_user');
						
						$response['success'] = "1";
        				$response['isadmin'] = "1";
        				$response['message'] = "Login successful";
					}        			
        		}
        		
        		echo json_encode($response);
        	}
        	else
        		$this->load->view('user/signin');
        }
		
	}
	function resetpassword($string){
		$string1=base64_decode($string);
		$parts=explode('==',$string1);
		$id=$parts[0];
		if($_POST['resetpassword'] == "1"){
			
			$password 					= $_POST['password'];
        	$cpassword 					= $_POST['cpassword'];
			
			$uppercase 					= preg_match('@[A-Z]@', $password);
			$lowercase 					= preg_match('@[a-z]@', $password);
			$number    					= preg_match('@[0-9]@', $password);
			$specialChars 				= preg_match('@[^\w]@', $password);
				
			$response					= array();
        		$msgArray					= array();
        		$response['success'] 		= "1";
				
			if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8)
			{
				$response['success'] 	= "0";
				$msgArray[] 			= "Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.";
			}
			if($password!=$cpassword)
			{
				$response['success'] 	= "0";
				$msgArray[] 			= "Password not matched";
			}
			if($response['success'] == "0")
			{
				$response['message'] 	= implode("<br>",$msgArray);
			}
			if($response['success'] == "1")
        	{
				
				$this->updatepassword($parts[1],$_POST['password'],$id,$parts[2]);
				
				$response['message']="Password Updated Successfully.";
			}
			echo json_encode($response);
		}
		else
        		$this->load->view('user/resetpassword',array('string'=>$string));
	}
	function updatepassword($userType='user',$password,$id,$email)
	{
		$data['password']	=md5($password);
				
		$this->db->where('id', $id);
		$this->db->where('email', $email);
		if($userType=='admin')
			$this->db->update('admin', $data);
		else
			$this->db->update('users', $data);
	}
	function forgot()
	{
		if($this->session->userdata('is_logged_in'))
		{
			redirect('/user/dashboard');   
        }
        else
        {
        	
			if($_POST['forgotpassword'] == "1"){
				$email 						= $_POST['email'];
        		
        		$response					= array();
        		$msgArray					= array();
        		$response['success'] 		= "0";
        		$response['message'] 		= " Email address Not Found";
        		
        		$user						= $this->User_Model->forgotpassword($email);
        		if($user > 0)
        		{
        			
        			$response['success'] 	= "1";
        			$response['message'] 	= "Reset Password link sent to your mail id.";
					$string=$user->id.'=='.'user=='.$email;
					
        		}
        		else
        		{
        			$user					= $this->User_Model->forgotpasswordAdmin($email);
        			if($user > 0)
					{
						
						
						$response['success'] = "1";
        				$response['isadmin'] = "1";
        				
						$string=$user->id.'=='.'admin=='.$email;
					
					}        			
        		}
        		if($response['success']==1){
        		    $from_email='priyanka.techbee@gmail.com';
        		   
					$subject = 'Reset Password At Blockalpha';
                             $message='Dear '.$user->name.',<br/>
                                You have requested a password reset on your block alpha account.
                               <br/> Please click on the below link.
                               <br/><br/> <a target="_blank" href="'.base_url().'user/resetpassword/'.base64_encode($string).'"> Click Here</a>
                              <br/><br/>  Thank you for your continued support 
                                <br/>tap ,tap,trade 

                                ';
                                $html='<html lang="en"><head>
                                    	  
                                      <style>
                                    	  .logo {
                                    		width: 100px;
                                    		border-radius: 5px;
                                    		margin-left: 40%;
                                    	}
                                    	img {
                                    		vertical-align: middle;
                                    		border-style: none;
                                    	}
                                      html {
                                    		position: relative;
                                    		min-height: 100%;
                                    		font-family: sans-serif;
                                    		line-height: 1.15;
                                    		}
                                    		.bg-gradient-primary {
                                    		background: rgb(61,50,205);
                                    		background: linear-gradient(39deg, rgba(61,50,205,1) 0%, rgba(61,50,205,1) 35%, rgba(48,204,171,1) 100%);
                                    			background-size: auto;
                                    		background-size: cover;
                                    	}
                                    	body {
                                    		margin: 0;
                                    	font-family: "Nunito", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
                                    	font-size: 1rem;
                                    	font-weight: 300;
                                    	line-height: 1.5;
                                    	color: #858796;
                                    	text-align: left;
                                    	}
                                    	.container, .container-fluid {
                                    		padding: 10px;
                                    		
                                    	}
                                    	.o-hidden {
                                    		overflow: hidden !important;
                                    	}
                                    	.mb-5, .my-5 {
                                    		margin-bottom: 3rem !important;
                                    	}
                                    	.mt-5, .my-5 {
                                    		margin-top: 3rem !important;
                                    	}
                                    	.shadow-lg {
                                    		box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.175) !important;
                                    	}
                                    	.border-0 {
                                    		border: 0 !important;
                                    	}
                                    	.card {
                                    		position: relative;
                                    		display: flex;
                                    		flex-direction: column;
                                    		min-width: 0;
                                    		word-wrap: break-word;
                                    		background-color: #fff;
                                    		background-clip: border-box;
                                    		border: 1px solid #e3e6f0;
                                    		border-radius: 0.35rem;
                                    		width: 70%;
                                    		margin-left: 17%;
                                    		padding-left:50px;
                                    	}
                                    	.row {
                                    		display: flex;
                                    		flex-wrap: wrap;
                                    		margin-right: -0.75rem;
                                    		margin-left: -0.75rem;
                                    	}
                                    	.p-5 {
                                    		padding: 3rem !important;
                                    	}
                                      </style>
                                    <body class="bg-gradient-primary" cz-shortcut-listen="true">
                                    
                                      <div class="container">
                                    
                                        <div class="card o-hidden border-0 shadow-lg my-5">
                                          <div class="card-body p-0">
                                            <!-- Nested Row within Card Body -->
                                            <div class="row">
                                              <div class="col-lg-3">&nbsp;</div>
                                              <div class="col-lg-6">
                                              	<div class="col-lg-12">
                                                <div class="p-5">
                                                  <div class="text-center">
                                                        <h1 class="h4 text-gray-900 mb-4"><a href="'.base_url().'"><img src="'.base_url().'assets/img/logo.png" class="logo"></a></h1>
                                                  </div>
                                                 
                                                  <center>
                                    			  <h1 class="h4  mb-4" style="color:gray;font-size: 12px;">Dear '.$user->name.',<br/>
                                                                    You have requested a password reset on your block alpha account.
                                                                   <br/> Please click on the below link.
                                                                   <br/><br/></h1>
                                    			  <h1 class="h4 text-red-900 mb-4" style="color: #f55; font-weight: bold; font-size: 15px;">
                                    			  <a target="_blank" href="'.base_url().'user/resetpassword/'.base64_encode($string).'"> Click Here</a></h1>
                                    			  <h1 class="h4  mb-4" style="color:gray; font-size: 12px;"><br/><br/>  Thank you for your continued support 
                                                                    <br/><span style="color:#3C3FCA;" class="bluecolor">tap,tap,trade</span> </h1>
                                    			  </center>
                                                  
                                                 
                                                </div>
                                              </div>
                                              </div>
                                            </div>
                                    
                                          </div>
                                        </div>
                                    
                                      </div>
                                    
                                     
                                    
                                    
                                    </body></html>';
                                $message=$html;
                             //$message.='<a target="_blank" href="'.base_url().'user/resetpassword/'.base64_encode($string).'"> Click Here</a>';;
                             
                            // To send HTML mail, the Content-type header must be set
                            $headers  = 'MIME-Version: 1.0' . "\r\n";
                            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                             
                            // Create email headers
                            $headers .= 'From: '.$from_email."\r\n".
                                'Reply-To: '.$from_email."\r\n" .
                                'X-Mailer: PHP/' . phpversion();
                           // $this->email->set_mailtype("html");
                           if(mail($email, $subject, $message, $headers)) $response['message'] = "Reset Password link sent to your mail id.";
				}
        		echo json_encode($response);
			}
			else
				$this->load->view('user/forgot');
        }
		
	}
	
	
	function get_city_by_province() {
		$results		=	$this->User_Model->getCityByProvince($_POST['province_id']);
		$cities			=	'<option  value="">City</option>';
		foreach($results as $r) {
			$cities		.=	'<option  value="'.$r->id.'">'.$r->city.'</option>';
		}
		echo $cities;
	}
	function get_suburb_by_city() {
		$results		=	$this->User_Model->getSuburbByCity($_POST['city_id']);
		$suburbs		=	'<option  value="">Suburb</option>';
		foreach($results as $r) {
			$suburbs	.=	'<option  value="'.$r->id.'">'.$r->suburb.'</option>';
		}
		echo $suburbs;
	}
	function register()
	{
		if($this->session->userdata('is_logged_in'))
		{
			redirect('/user/dashboard');   
        }
        else
        {
            $viewdata['contentpages']	=	$this->Contentpage_Model->getActivePage();
			$viewdata['provinces']		=	$this->User_Model->getProvinces();
            if($_POST['register'] == "1")
        	{
        		$name 						= $_POST['name'];
        		$surname 					= $_POST['surname'];
        		$email 						= $_POST['email'];
        		$password 					= $_POST['password'];
        		$cpassword 					= $_POST['cpassword'];
        		$phone 				    	= $_POST['phone'];
        		$province_id			   	= $_POST['province_id'];
        		$city_id 				    = $_POST['city_id'];
        		$suburb_id			        = $_POST['suburb_id'];
        		$address			        = $_POST['address'];
        		$account_id			        = $_POST['account_id'];
				$account_holder_name        = $_POST['account_holder_name'];
				$ifsc_code			        = $_POST['ifsc_code'];
        		$accept_policy 				= $_POST['accept_policy'];
        		
        		
        		$uppercase 					= preg_match('@[A-Z]@', $password);
				$lowercase 					= preg_match('@[a-z]@', $password);
				$number    					= preg_match('@[0-9]@', $password);
				$specialChars 				= preg_match('@[^\w]@', $password);
        		
        		$response					= array();
        		$msgArray					= array();
        		$response['success'] 		= "1";
        		
        		if(!preg_match("/^[a-zA-Z ]*$/",$name) || strlen($name) < 4)
        		{
        			$response['success'] 	= "0";
        			$msgArray[] 			= "Name can be only letters and space";
        		}
        		if(!preg_match("/^[a-zA-Z ]*$/",$surname) || strlen($surname) < 4)
        		{
        			$response['success'] 	= "0";
        			$msgArray[] 			= "Surname can be only letters and space";
        		}
        		
        		if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        		{
        			$response['success'] 	= "0";
        			$msgArray[] 			= "Invalid email address";
        		}
        		if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8)
        		{
        			$response['success'] 	= "0";
        			$msgArray[] 			= "Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.";
        		}
        		if($password!=$cpassword)
        		{
        			$response['success'] 	= "0";
        			$msgArray[] 			= "Password not matched";
        		}
        		if(!preg_match("/^[0-9]*$/",$phone) || strlen($phone) !=10)
        		{
        			$response['success'] 	= "0";
        			$msgArray[] 			= " Enter Correct Phone Number";
        		}
        		if(!$_POST['province_id'])	
        		{
        		    $response['success'] 	= "0";
        			$msgArray[] 			= "Please select your Province";
        		}
				
        		if(!$_POST['city_id'])	
        		{
        		    $response['success'] 	= "0";
        			$msgArray[] 			= "Please select City";
        		}
        		if(!$_POST['suburb_id'])	
        		{
        		    $response['success'] 	= "0";
        			$msgArray[] 			= "Please select your Suburb";
        		}
				if(!$_POST['address'])	
        		{
        		    $response['success'] 	= "0";
        			$msgArray[] 			= "Please Enter your Address";
        		}
				if(!$_POST['account_id'])	
        		{
        		    $response['success'] 	= "0";
        			$msgArray[] 			= "Please Enter Account Number";
        		}
				if(!preg_match("/^[0-9]*$/",$account_id))
        		{
        			$response['success'] 	= "0";
        			$msgArray[] 			= " Enter Correct Account Number";
        		}
				if(!$_POST['account_holder_name'])	
        		{
        		    $response['success'] 	= "0";
        			$msgArray[] 			= "Please Enter Account Holder Name";
        		}
				if(!$_POST['ifsc_code'])	
        		{
        		    $response['success'] 	= "0";
        			$msgArray[] 			= "Please Enter IFSC Code";
        		}
        		
        		if(!$accept_policy){
        		    	$response['success'] 	= "0";
        			$msgArray[] 			= "Must accept Policies";
        		}
        		
        		
                            
        		if($response['success'] == "1")
        		{
					unset($_POST['register']);
					unset($_POST['accept_policy']);
					unset($_POST['cpassword']);
					$_POST['password']=md5($_POST['password']);
        			$modelReponse				= $this->User_Model->registerUser($_POST);
        			if($modelReponse['success'] == "1")
        			{
        					$response['success']= "1";
        					
        				    $from_email = "priyanka.techbee@gmail.com";
                             $to_email = $this->input->post('email'); 
                       
                             //Load email library 
                            
                             
                            $subject = 'Verification At BIT10X';
                            
                            $html='<html lang="en"><head>
                            	  
                              <style>
                              .logo {
                                    		width: 100px;
                                    		border-radius: 5px;
                                    		margin-left: 40%;
                                    	}
                                    	img {
                                    		vertical-align: middle;
                                    		border-style: none;
                                    	}
                                      html {
                                    		position: relative;
                                    		min-height: 100%;
                                    		font-family: sans-serif;
                                    		line-height: 1.15;
                                    		}
                                    		.bg-gradient-primary {
                                    		background: rgb(61,50,205);
                                    		background: linear-gradient(39deg, rgba(61,50,205,1) 0%, rgba(61,50,205,1) 35%, rgba(48,204,171,1) 100%);
                                    			background-size: auto;
                                    		background-size: cover;
                                    	}
                                    	body {
                                    		margin: 0;
                                    	font-family: "Nunito", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
                                    	font-size: 1rem;
                                    	font-weight: 300;
                                    	line-height: 1.5;
                                    	color: #858796;
                                    	text-align: left;
                                    	}
                                    	.container, .container-fluid {
                                    		padding: 10px;
                                    		
                                    	}
                                    	.o-hidden {
                                    		overflow: hidden !important;
                                    	}
                                    	.mb-5, .my-5 {
                                    		margin-bottom: 3rem !important;
                                    	}
                                    	.mt-5, .my-5 {
                                    		margin-top: 3rem !important;
                                    	}
                                    	.shadow-lg {
                                    		box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.175) !important;
                                    	}
                                    	.border-0 {
                                    		border: 0 !important;
                                    	}
                                    	.card {
                                    		position: relative;
                                    		display: flex;
                                    		flex-direction: column;
                                    		min-width: 0;
                                    		word-wrap: break-word;
                                    		background-color: #fff;
                                    		background-clip: border-box;
                                    		border: 1px solid #e3e6f0;
                                    		border-radius: 0.35rem;
                                    		width: 70%;
                                    		margin-left: 17%;
                                    		padding-left:50px;
                                    	}
                                    	.row {
                                    		display: flex;
                                    		flex-wrap: wrap;
                                    		margin-right: -0.75rem;
                                    		margin-left: -0.75rem;
                                    	}
                                    	.p-5 {
                                    		padding: 3rem !important;
                                    	}
                              </style>
                            <body class="bg-gradient-primary" cz-shortcut-listen="true">
                            
                              <div class="container">
                            
                                <div class="card o-hidden border-0 shadow-lg my-5">
                                  <div class="card-body p-0">
                                    <!-- Nested Row within Card Body -->
                                    <div class="row">
                                      <div class="col-lg-3">&nbsp;</div>
                                      <div class="col-lg-6">
                                      	<div class="col-lg-12">
                                        <div class="p-5">
                                          <div class="text-center">
                                                <h1 class="h4 text-gray-900 mb-4"><a href="'.base_url().'"><img src="'.base_url().'assets/img/logo.png" class="logo"></a></h1>
                                          </div>
                                         
                                          <center>
                            			  <h1 class="h4  mb-4" style="color:gray; font-size: 12px;">Welcome to BIT10X.
                            			  <br/>
                                                            To validate your registration and activate your account please click on the below link. 
                                                           <br/><br/></h1>
                            			  <h1 class="h4 text-red-900 mb-4" style="color: #f55; font-weight: bold; font-size: 15px;">
                            			  <a target="_blank" href="'.base_url().'user/verification/'.base64_encode($this->input->post('email')).'"> 
                            			  Click Here</a></h1>
                            			  <h1 class="h4  mb-4" style=" color:gray; font-size: 12px;"><br/> <br/>Thank you for your support
                                                            <br/><span style="color:#3C3FCA;" class="bluecolor">tap,tap,trade</span>
                                                            <br/></h1>
                            			  </center>
                                          
                                         
                                        </div>
                                      </div>
                                      </div>
                                    </div>
                            
                                  </div>
                                </div>
                            
                              </div>
                            
                             
                            
                            
                            </body></html>';
                             
                             $message=$html;
                          
                            // To send HTML mail, the Content-type header must be set
                            $headers  = 'MIME-Version: 1.0' . "\r\n";
                            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                             
                            // Create email headers
                            $headers .= 'From: '.$from_email."\r\n".
                                'Reply-To: '.$from_email."\r\n" .
                                'X-Mailer: PHP/' . phpversion();
                           // $this->email->set_mailtype("html");
                            if(mail($to_email, $subject, $message, $headers)){//$this->email->send()
                            
        					$response['message']="Mail sent to your email id for verification.";
        					
                            }
                            else $response['message']='Something went wrong.';
        					
        			}
        			else
        				$response				= $modelReponse;		
        		}
        		else
        		{
        			$response['message'] 	= implode("<br>",$msgArray);
        		}
        		
        		echo json_encode($response);
        	}
        	else
        		$this->load->view('user/register',$viewdata);
        }
		
	}
	
	
	function verification($string){
	    $user	= $this->User_Model->verify_account($string);
	    $response['success'] 	= 0;
	    $response['message'] ='Something went wrong. Please contact Admin.';
	    if($user)
        		{
        		    if($user->is_verified==1){
        		        $response['message'] ='Your account is already verified.';
        		    }
        		    else
        		    {
            		    $data['is_verified']='1';
            		    $this->db->where('email', base64_decode($string));
    		            $this->db->update('users', $data);
    		          
    		            $registeredUserData					= $this->User_Model->getUserDetailsByEmail(base64_decode($string));
    		          
    		            $from_email = "priyanka.techbee@gmail.com";
                        $to_email = 'admin@blockalpha.net'; 
                       
                            $subject = 'New Registration At Blockalpha';
                            
                            $html='<html lang="en"><head>
                            	  
                              <style>
                              .logo {
                                    		width: 100px;
                                    		border-radius: 5px;
                                    		margin-left: 40%;
                                    	}
                                    	img {
                                    		vertical-align: middle;
                                    		border-style: none;
                                    	}
                                      html {
                                    		position: relative;
                                    		min-height: 100%;
                                    		font-family: sans-serif;
                                    		line-height: 1.15;
                                    		}
                                    		.bg-gradient-primary {
                                    		background: rgb(61,50,205);
                                    		background: linear-gradient(39deg, rgba(61,50,205,1) 0%, rgba(61,50,205,1) 35%, rgba(48,204,171,1) 100%);
                                    			background-size: auto;
                                    		background-size: cover;
                                    	}
                                    	body {
                                    		margin: 0;
                                    	font-family: "Nunito", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
                                    	font-size: 1rem;
                                    	font-weight: 300;
                                    	line-height: 1.5;
                                    	color: #858796;
                                    	text-align: left;
                                    	}
                                    	.container, .container-fluid {
                                    		padding: 10px;
                                    		
                                    	}
                                    	.o-hidden {
                                    		overflow: hidden !important;
                                    	}
                                    	.mb-5, .my-5 {
                                    		margin-bottom: 3rem !important;
                                    	}
                                    	.mt-5, .my-5 {
                                    		margin-top: 3rem !important;
                                    	}
                                    	.shadow-lg {
                                    		box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.175) !important;
                                    	}
                                    	.border-0 {
                                    		border: 0 !important;
                                    	}
                                    	.card {
                                    		position: relative;
                                    		display: flex;
                                    		flex-direction: column;
                                    		min-width: 0;
                                    		word-wrap: break-word;
                                    		background-color: #fff;
                                    		background-clip: border-box;
                                    		border: 1px solid #e3e6f0;
                                    		border-radius: 0.35rem;
                                    		width: 70%;
                                    		margin-left: 17%;
                                    		padding-left:50px;
                                    	}
                                    	.row {
                                    		display: flex;
                                    		flex-wrap: wrap;
                                    		margin-right: -0.75rem;
                                    		margin-left: -0.75rem;
                                    	}
                                    	.p-5 {
                                    		padding: 3rem !important;
                                    	}
                              </style>
                            <body class="bg-gradient-primary" cz-shortcut-listen="true">
                            
                              <div class="container">
                            
                                <div class="card o-hidden border-0 shadow-lg my-5">
                                  <div class="card-body p-0">
                                    <!-- Nested Row within Card Body -->
                                    <div class="row">
                                      <div class="col-lg-3">&nbsp;</div>
                                      <div class="col-lg-6">
                                      	<div class="col-lg-12">
                                        <div class="p-5">
                                          <div class="text-center">
                                                <h1 class="h4 text-gray-900 mb-4"><a href="'.base_url().'"><img src="'.base_url().'assets/img/logo.png" class="logo"></a></h1>
                                          </div>
                                         
                                          <center>
                            			  <h1 class="h4  mb-4" style="color:gray; font-size: 12px;"Hello Admin,
                            			  <br/>
                                                           New Registration at blockalpha. Please find below details
                                                           <br/><br/></h1>
                            			  <h1 class="h4  mb-4" style=" font-weight: bold; font-size: 15px;">
                            			 <b>Name: </b>  '.$registeredUserData->name.' '.$registeredUserData->surname.'<br>
                            			 <b>Email Id: </b>  '.$registeredUserData->email.'<br>
                            			 <b>Phone Number: </b> '.$registeredUserData->phone.'
                            			  </h1>
                            			  <h1 class="h4  mb-4" style=" color:gray; font-size: 12px;"><br/> <br/>Thank you for your support
                                                            <br/><span style="color:#3C3FCA;" class="bluecolor">tap,tap,trade</span>
                                                            <br/></h1>
                            			  </center>
                                          
                                         
                                        </div>
                                      </div>
                                      </div>
                                    </div>
                            
                                  </div>
                                </div>
                            
                              </div>
                            
                             
                            
                            
                            </body></html>';
                           
                                $message=$html;
                            
                            // To send HTML mail, the Content-type header must be set
                            $headers  = 'MIME-Version: 1.0' . "\r\n";
                            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                             
                            // Create email headers
                            $headers .= 'From: '.$from_email."\r\n".
                                'Reply-To: '.$from_email."\r\n" .
                                'X-Mailer: PHP/' . phpversion();
                           mail($to_email, $subject, $message, $headers);
            		    $response['success'] 	= 1;
            			$response['message'] 	= "Verification successful. Redirecting to login";
        		    }
        		}
        $this->load->view('user/verification',array('response'=>$response));
	}
	
	/**
    * show the dashboard
    * send him to the login page
    * @return void
    */	
	function dashboard()
	{
			
			if($this->session->userdata('is_logged_in'))
			{
				$data 				= $this->session->userdata('userdata');
				
				$data->finance		= $this->User_Model->homePage($this->session->userdata('is_logged_in'));
				
				
				$this->load->view('user/dashboard',$data);
			}
			else
			{
				redirect('/user/login');
			}
			
					
	}
	
	function logout()
	{
			session_destroy();
			$this->session->sess_destroy();
			setcookie('blockalpha_user');
			redirect('/user/');					
	}
	
	
	function profile()
	{	
	    //print_r($this->session->userdata('userdata'));exit;
	    
		$data['profile'] = $this->User_Model->getProfile($this->session->userdata('is_logged_in'));
		$data['name']   = $data['profile']->name;
		$data['profile_pic']   = $data['profile']->profile_pic;
		$data['provinces']		=	$this->User_Model->getProvinces();
		if(isset($_POST['name']))
		{
			$json['success'] 	= 0;
			$json['message'] 	= "Error in updating the profile...";
			
			$picture='';$error=0;
			if($_POST['avatar']){
			        $image_64=$avatar=$_POST['avatar'];
                    $extension = explode('/', explode(':', substr($image_64, 0, strpos($image_64, ';')))[1])[1];   // .jpg .png .pdf
                    if($extension!='jpg' && $extension!='png') $error=1;
					  $replace = substr($image_64, 0, strpos($image_64, ',')+1); 

					// find substring fro replace here eg: data:image/png;base64,

					 $image = str_replace($replace, '', $image_64); 

					 $image = str_replace(' ', '+', $image); 

					 $imageName = date('ymdhis').$i.'.'.$extension;
        
                    list($type, $avatar) = explode(';', $avatar);
                    list(, $avatar)      = explode(',', $avatar);
                    $avatar = base64_decode($avatar);
                    $dir= BASEPATH .'/assets/profiles/';
                    $dir=str_replace('system//','/',$dir);
                    file_put_contents($dir.$imageName, $avatar);
                    $picture=$imageName;
            }
            
			
			    $name 						= $_POST['name'];
        		$surname 					= $_POST['surname'];
        		$email 						= $_POST['email'];
        		
        		$phone 				    	= $_POST['phone'];
        		$province_id			   	= $_POST['province_id'];
        		$city_id 				    = $_POST['city_id'];
        		$suburb_id			        = $_POST['suburb_id'];
        		$address			        = $_POST['address'];
        		$account_id			        = $_POST['account_id'];
				$account_holder_name        = $_POST['account_holder_name'];
				$ifsc_code			        = $_POST['ifsc_code'];
        		
        		
        	
        		$response					= array();
        		$msgArray					= array();
        		$response['success'] 		= "1";
        		
        		if(!preg_match("/^[a-zA-Z ]*$/",$name) || strlen($name) < 4)
        		{
        			$response['success'] 	= "0";
        				$json['message']	= "Name can be only letters and space";
        		}
        		if(!preg_match("/^[a-zA-Z ]*$/",$surname) || strlen($surname) < 4)
        		{
        			$response['success'] 	= "0";
        				$json['message']	= "Surname can be only letters and space";
        		}
        		
        	
        		if(!preg_match("/^[0-9]*$/",$phone) || strlen($phone) !=10 )
        		{
        			$response['success'] 	= "0";
        				$json['message']	= " Enter Correct Phone Number ";
        		}
        		if(!$_POST['province_id'])	
        		{
        		    $response['success'] 	= "0";
        			$msgArray[] 			= "Please select your Province";
        		}
				
        		if(!$_POST['city_id'])	
        		{
        		    $response['success'] 	= "0";
        			$msgArray[] 			= "Please select City";
        		}
        		if(!$_POST['suburb_id'])	
        		{
        		    $response['success'] 	= "0";
        			$msgArray[] 			= "Please select your Suburb";
        		}
				if(!$_POST['address'])	
        		{
        		    $response['success'] 	= "0";
        			$msgArray[] 			= "Please Enter your Address";
        		}
				if(!$_POST['account_id'])	
        		{
        		    $response['success'] 	= "0";
        			$msgArray[] 			= "Please Enter Account Number";
        		}
				if(!preg_match("/^[0-9]*$/",$account_id))
        		{
        			$response['success'] 	= "0";
        			$msgArray[] 			= " Enter Correct Account Number";
        		}
				if(!$_POST['account_holder_name'])	
        		{
        		    $response['success'] 	= "0";
        			$msgArray[] 			= "Please Enter Account Holder Name";
        		}
				if(!$_POST['ifsc_code'])	
        		{
        		    $response['success'] 	= "0";
        			$msgArray[] 			= "Please Enter IFSC Code";
        		}
        
				if($response['success'] ==1){
					
				
					$affected 			= $this->User_Model->setProfile($_POST,$this->session->userdata('is_logged_in'),$picture);
				
					if($affected)
					{
						$json['success'] = 1;
						$json['message'] = "Profile updated successfully...";
					}
				}
			echo json_encode($json);	
		}
		else
		{
			
			$this->load->view('user/profile',$data);
		}
		
	}

	function change_password()
	{	
		$data['profile'] = $this->User_Model->getProfile($this->session->userdata('is_logged_in'));
		$data['name']   = $data['profile']->name;
		$data['countries']=$this->User_Model->getCountries();
		if(isset($_POST['change_password']))
		{
			$json['success'] 	= 0;
			$json['message'] 	= "Error in updating the password...";
			
			$picture='';$error=0;
			
        		$old_password 				= $_POST['old_password'];
        		$password 					= $_POST['password'];
        		$cpassword 					= $_POST['cpassword'];
        	
        		$uppercase 					= preg_match('@[A-Z]@', $password);
				$lowercase 					= preg_match('@[a-z]@', $password);
				$number    					= preg_match('@[0-9]@', $password);
				$specialChars 				= preg_match('@[^\w]@', $password);
        		
        		$response					= array();
        		$msgArray					= array();
        		$response['success'] 		= "1";
        		
        		
        	    
        	    if($password=='' || $cpassword=='' || $old_password=='') {
        	         $response['success'] 	= "0";
            			$json['message']	= "All fields are required";
        	    }
        	    
        	    if(!empty($old_password)) {
        	        $checkUserByPassword = $this->User_Model->checkUserByPassword($old_password,$this->session->userdata('is_logged_in'));
        	        if(empty($checkUserByPassword)) {
        	            $response['success'] 	= "0";
            			$json['message']	= "Password Doesn't matched";
        	        }
            	
        	    }
        	    
        		if($password || $cpassword) {
            		if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8)
            		{
            			$response['success'] 	= "0";
            			$json['message']	= "Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.";
            		}
            		if($password!=$cpassword)
            		{
            			$response['success'] 	= "0";
            				$json['message']	= "Password not matched";
            		}
        		}
        		
        
        	if($response['success'] ==1){
                
            
			    $affected 			= $this->User_Model->change_password($_POST,$this->session->userdata('is_logged_in'));
			
			
    			if($affected)
    			{
    				$json['success'] = 1;
    				$json['message'] = "Password updated successfully...";
    			}
        	}
			echo json_encode($json);	
		}
		else
		{
			
			$this->load->view('user/change_password',$data);
		}
		
	}


//for admin pages
    
    function userlising(){
        $adminLoggedin		= $this->session->userdata('admin_user');
		if($adminLoggedin)
		{
			
			$data = array();
                if ($this->input->is_ajax_request()) {
                    /** this will handle datatable js ajax call * */
                    /** get all datatable parameters * */
                    $search = $this->input->get('search');/** search value for datatable  * */
                    $offset = $this->input->get('start');/** offset value * */
                    $limit = $this->input->get('length');/** limits for datatable (show entries) * */
                    $order = $this->input->get('order');/** order by (column sorted ) * */
                    $column = array( 'users.name', 'users.email','users.phone','users.created_at','users.status');/**  set your data base column name here for sorting* */
                    $orderColumn = isset($order[0]['column']) ? $column[$order[0]['column']] : 'name';
                    $orderDirection = isset($order[0]['dir']) ? $order[0]['dir'] : 'asc';
                    $ordrBy = $orderColumn . " " . $orderDirection;
         
                    $usereDetails=$this->User_Model->getAllUsers($offset,$limit,$order,$ordrBy,$search);
                    $userDetailsCount=$this->User_Model->getAllUsersCount($offset,$limit,$order,$ordrBy,$search);
                    /** create data to display in dataTable as you want **/    
        
                    $data = array();
                    if (!empty($usereDetails)) {
                        foreach ($usereDetails as $k => $v) {
                            $v=(array) $v;
                            if($v['status']==1) $status='Active'; else if($v['status']==0) $status='Pending'; else $status='Block';
                            
                            
                            {
                                $data[] = array(
                                /** you can add what ever anchor link or dynamic data here **/
                                 
                                  'name' =>  $v['name'].' '.$v['surname'],
                                  'email' =>  $v['email'],
                                  'phone' =>  $v['phone'],
                                  'created_at' =>  date('d M Y',strtotime($v['created_at'])),
                                  
                                  'status' =>	$status,
                                  'action' =>"
                                  
									<a class='btn btn-xs' href=".base_url().'admin/useredit/'.$v['id']."><strong><i class='fa fa-edit'></i></strong></a>
										<a id='".$v['id']."' class='btn btn-xs deletecontentbtn' href='javascript:void(0);' data-toggle='modal' data-target='#deletecontentModal'>
									  <i class='fas fa-trash'></i>
									  
									</a>
								  " 
                                    
                            );
                            }
                        }
                    }
                    /**
                     * draw,recordTotal,recordsFiltered is required for pagination and info.
                     */
                    $results = array(
                        "draw" => $this->input->get('draw'),
                        "recordsTotal" => count($data),
                        "recordsFiltered" => $userDetailsCount,
                        "data" => $data 
                    );
        
                    echo json_encode($results);
                } else {
                    /** this will load by default with no data for datatable
                     *  we will load data in table through datatable ajax call
                     */
                    
                        $this->load->view('admin/users',$data);
                }
                
		}
		else 
			$this->load->view('user/signin');
    }
	
	function userdelete($id){
        
        $data = array(
            
            'is_deleted' => 1,
            'updated_at'=>date('Y-m-d H:i:s')
        );
        
            $this->db->where('id',$id);
            $save= $this->db->update('users',$data);
            
           
        $this->session->set_flashdata('user_save', 'User Deleted Successfully');
        
        redirect("/admin/users");
    }
    
    function useredit($id)
   {
       $user['profile'] 	= $this->db->get_where('users', array('id' => $id))->row();
       $user['provinces']	= $this->User_Model->getProvinces();
       $this->load->view('admin/userform',$user);
        
   }
   function usersave(){
        
                $name 						= $_POST['name'];
        		$surname 					= $_POST['surname'];
        		$email 						= $_POST['email'];
        		
        		$phone 				    	= $_POST['phone'];
        		$province_id			   	= $_POST['province_id'];
        		$city_id 				    = $_POST['city_id'];
        		$suburb_id			        = $_POST['suburb_id'];
        		$address			        = $_POST['address'];
        		$account_id			        = $_POST['account_id'];
				$account_holder_name        = $_POST['account_holder_name'];
				$ifsc_code			        = $_POST['ifsc_code'];
        		
        		
        		$response					= array();
        		$msgArray					= array();
        		$response['success'] 		= "1";
        		
        		$original_email             = '';
        		$original_phone             = '';
        		$original_code             = '';
        		//print_r($_POST);exit;
        		if($this->input->post('id')) {
        		    $userDetails=$this->User_Model->getUserDetailsrow($this->input->post('id'));
        		   // print_r($affiliateDetails);exit;
        		    $original_email=$userDetails->email;
        		    $original_phone=$userDetails->phone;
        		}
        		$this->load->library('form_validation');
                
                $this->form_validation->set_rules('name', ' Name', 'required|trim|callback_check_name');
                
             //   $this->form_validation->set_rules('phone_prefix', 'Phone Prefix', 'required|trim');
                $this->form_validation->set_rules('province_id', 'Province', 'required|trim');
                $this->form_validation->set_rules('city_id', 'City', 'required|trim');
                $this->form_validation->set_rules('suburb_id', 'Suburb', 'required|trim');
				$this->form_validation->set_rules('address', 'Address', 'required|trim');
				$this->form_validation->set_rules('account_id', 'Account Number', 'required|trim');
				$this->form_validation->set_rules('account_holder_name', 'Account holder name', 'required|trim');
				$this->form_validation->set_rules('ifsc_code', 'IFSC Code', 'required|trim');
                //$this->form_validation->set_rules('email', 'Email Address', 'required|trim|callback_valid_email'.$is_unique);
                
                if($phone != $original_phone) {
                   $is_unique =  '|is_unique[users.phone]';
                } else {
                   $is_unique =  '';
                }
                
                $this->form_validation->set_rules('phone', 'Phone Number', 'required|trim|callback_valid_phone_number|numeric'.$is_unique);
                
                
                if ($this->form_validation->run() == FALSE)
                    {
							$user['profile'] 	= $this->db->get_where('users', array('id' => $this->input->post('id')))->row();
                            $user['provinces']	= $this->User_Model->getProvinces();
                            $this->load->view('admin/userform',$user);
                    }
            
        		else { 
        		     
        		     $this->User_Model->setProfile($_POST,$this->input->post('id'),'');
                    $this->session->set_flashdata('user_save', 'User Details Saved Successfully');
                    // After that you need to used redirect function instead of load view such as 
                    redirect("/admin/users");
                }
                
    }
	
	function check_age($dob){
	     $from = new DateTime(date('Y-m-d',strtotime($dob)));
                    $to   = new DateTime('today');
                    $age= $from->diff($to)->y;
                    if($age<18){
                        
                        $this->form_validation->set_message('check_age', 'Age should be equal to or greater than 18yrs');
                        return false;
                    }
	}
   function valid_phone_number($phone)
    {
        if(!preg_match("/^[0-9]*$/",$phone) || strlen($phone) !=10 ){
            $this->form_validation->set_message('valid_phone_number', 'Enter Valid Phone Number');
        return false;
        }
        else return true;
    }
    function valid_email($email){
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            
        $this->form_validation->set_message('valid_email', 'Enter Valid Email Address');
            return FALSE;
        } else {
            return TRUE;
        }
    }
    function check_name($name){
        if (! preg_match('/^[a-zA-Z\s]+$/', $name) && $name!='') {
            $this->form_validation->set_message('check_name', 'The %s field may only contain alpha characters & White spaces');
            return FALSE;
        } else {
            return TRUE;
        }
    }
    function site()
	{
			$data['coins']	= $this->User_Model->getCoins();
			$this->load->view('index',$data);		
	}
    function buycoin() {
		$data['amount']		= $_POST['coinamount'];
		$data['user']		= $this->User_Model->getUserData($this->session->userdata('is_logged_in'));
		$data['coin']		= $this->User_Model->getCoinDetails($_POST['coin']);
		$this->load->view('user/buycoin',$data);		
	}
 }

?>