<?php

class Contentpage extends CI_Controller {

	public function __construct() {
        parent::__construct();
        
    
        $this->load->model('Contentpage_Model'); 
		
		
    }

    function getpagedetails(){
        $contentpages=$this->Contentpage_Model->getActivePage($_POST['id']);
        //echo'<pre>';print_r($contentpages);
        	$response['title'] 	= $contentpages[0]->title;
        	$response['content'] 	= $contentpages[0]->content;
        	echo json_encode($response);
    }
     function index()
	{
	//echo'here';
		$adminLoggedin		= $this->session->userdata('admin_user');
		if($adminLoggedin)
		{
			$data['data']				= $this->Contentpage_Model->getAllPages();
			$this->load->view('admin/contentpage',$data);
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
            $save= $this->db->update('content_pages',$data);
          
        $this->session->set_flashdata('content_page_save', 'Content Page Deleted Successfully');
        
        redirect("/contentpage");
    }
    function file_check($str){
        $allowed_mime_type_arr = array('pdf');
        
        if(isset($_FILES['policyfile']['name']) && $_FILES['policyfile']['name']!=""){
            $ext = pathinfo($_FILES['policyfile']['name'], PATHINFO_EXTENSION);
         //   echo $ext;exit;
            if(in_array($ext, $allowed_mime_type_arr)){
                return true;
            }else{
                $this->form_validation->set_message('file_check', 'Please select only pdf file.');
                return false;
            }
        }
    }
    function save(){
        
        $status=1;
        if($this->input->post('status')) 
        $status=$this->input->post('status');
        
        $this->load->library('form_validation');
        
        if($this->input->post('title') != $this->input->post('old_title')) {
           $is_unique =  '|is_unique[content_pages.title]';
        } else {
           $is_unique =  '';
        }
        
        $this->form_validation->set_rules('title', 'Title', 'required|trim'.$is_unique);
         
       // $this->form_validation->set_rules('content', 'Page Content', 'required');
       $this->form_validation->set_rules('policyfile', '', 'callback_file_check');
        if ($this->form_validation->run() == FALSE)
            {
                    $this->load->view('admin/contentpageform');
            }
            else
            {
                $data = array(
                    'title' => trim($this->input->post('title')),
                   // 'content' => $this->input->post('content'),
                    'status' => $status,
                    'created_at'=>date('Y-m-d H:i:s'),
					'updated_at'=>date('Y-m-d H:i:s')
                );
                if(isset($_FILES["policyfile"]["name"])) {
                        
                        $target_dir = BASEPATH .'/assets/policies/';
                        $target_dir=str_replace('system//','/',$target_dir);
                        $file=date('ymdhis').basename($_FILES["policyfile"]["name"]);
                        $target_file = $target_dir . $file; 
                        $uploadOk = 1;
                        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                        move_uploaded_file($_FILES["policyfile"]["tmp_name"], $target_file);
                          
                          $data['policyfile']=$file;
                    }
                if($this->input->post('id')==0){
                    $save= $this->db->insert('content_pages',$data);
                }else{
                    $this->db->where('id',$this->input->post('id'));
                    $save= $this->db->update('content_pages',$data);
                }  
                $this->session->set_flashdata('content_page_save', 'Content Page Saved Successfully');
                // After that you need to used redirect function instead of load view such as 
                redirect("/contentpage");
            }
    }
	function edit($id)
   {
       $contentpage['contentpage'] = $this->db->get_where('content_pages', array('id' => $id))->row();
       
       $this->load->view('admin/contentpageform',$contentpage);
        
   }
   function add()
   {
       //$this->load->helper(array('form', 'url'));
       $this->load->view('admin/contentpageform');
        
   }
	
}

?>