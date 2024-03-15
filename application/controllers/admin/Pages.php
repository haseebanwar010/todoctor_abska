<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {
   
	protected $title = '';

	public function __construct()
        {
                parent::__construct();
                
				$this->load->library('session');
				$this->load->model('pages_model');
				
		  }
	
	public function index( $msg = NULL)
	{
        $data=array();
        $data['page'] = 'pages';
        if(! $this->session->userdata('validated')){
			redirect('auth');
		}
        else{
		$data['pages'] = $this->pages_model->get_pages();
		if(! $this->session->userdata('validated')){
			redirect('auth');
		}
        else{
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/templates/sidebar', $data);
            $this->load->view('admin/pages/index', $data);
            $this->load->view('admin/templates/footer', $data);
        }
				
		}
    }
    
    public function add($url = NULL){
			if(! $this->session->userdata('validated')){
			 redirect('auth');
		    }
        $image="";
			$data['page'] = 'addpage';
			$this->load->helper('form');
			$this->load->library('form_validation');
            $this->form_validation->set_rules('title', 'Title', 'required|min_length[3]');
			$this->form_validation->set_rules('description', 'Description', 'required');
			
			if ($this->form_validation->run() === FALSE)
			{
				if($url == NULL){
				    $this->load->view('admin/templates/header');
				    $this->load->view('admin/templates/sidebar', $data);
				    $this->load->view('admin/pages/add', $data);
				    $this->load->view('admin/templates/footer');
				}else{
				    echo validation_errors();
				}
			}
			else
			{
                if(isset($_FILES) && $_FILES['image']['name']!=""){
                    $new_name = time().$_FILES["image"]['name'];
				$config['file_name'] = $new_name;
				$config['upload_path']   =   "./uploads/";
 				$config['allowed_types'] =   "gif|jpg|jpeg|png"; 
		 		//$config['max_size']      =   "5000";
		 		//$config['max_width']     =   "2000";
		 		//$config['max_height']    =   "1280";
		 		$this->load->library('upload',$config);
                
		 		if(!$this->upload->do_upload('image'))
		 		{
                    $this->session->set_flashdata('error_msg',$this->upload->display_errors());
                    redirect('admin/pages');
		 		}
		 		else
		 		{
		 			$finfo=$this->upload->data();
		 			$this->createThumbnail($finfo['file_name']);
                    $image=$finfo['file_name'];
					
		 		}
                }
                $this->pages_model->set_page($image);
				$this->session->set_flashdata('msg', 'Page Added Successfully!');
				redirect('admin/pages');	
			}
			
		}
    public function edit($id = NULL){
			$user = $this->session->get_userdata();
			$data['page'] = 'editpage';
            
            $data['pages'] = $this->pages_model->get_pages($id);
			
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->form_validation->set_rules('title', 'Title', 'required|min_length[3]');
			$this->form_validation->set_rules('description', 'Description', 'required');
			if ($this->form_validation->run() === FALSE)
			{
				$this->load->view('admin/templates/header');
				$this->load->view('admin/templates/sidebar', $data);
				$this->load->view('admin/pages/edit', $data);
				$this->load->view('admin/templates/footer');
			}
			else
			{
                if(isset($_FILES) && $_FILES['image']['name']!=""){
                    $new_name = time().$_FILES["image"]['name'];
				$config['file_name'] = $new_name;
				$config['upload_path']   =   "./uploads/";
 				$config['allowed_types'] =   "gif|jpg|jpeg|png"; 
		 		//$config['max_size']      =   "5000";
		 		//$config['max_width']     =   "2000";
		 		//$config['max_height']    =   "1280";
		 		$this->load->library('upload',$config);
                
		 		if(!$this->upload->do_upload('image'))
		 		{
                    $this->session->set_flashdata('error_msg',$this->upload->display_errors());
                    redirect('admin/pages');
		 		}
		 		else
		 		{
		 			$finfo=$this->upload->data();
		 			$this->createThumbnail($finfo['file_name']);
                    $image=$finfo['file_name'];
					$this->pages_model->update_page($image);
				$this->session->set_flashdata('msg', 'Page Information is updated Successfully!');
				redirect('admin/pages');
		 		}
                }
                else{
                    $this->pages_model->update_page();
				$this->session->set_flashdata('msg', 'Page Information is updated Successfully!');
				redirect('admin/pages');
                }
				
			}
			
			
			
			
		}

    public function createThumbnail($filename)
 		{
 
        	$config['image_library']    = "gd2";      
 			$config['source_image']     = "./uploads/" .$filename;
			$config['new_image']     = "./uploads/thumb/";      
 			$config['create_thumb']     = TRUE;      
 			$config['maintain_ratio']   = TRUE;      
 			$config['width'] = "140";      
 			$config['height'] = "100";
 			$this->load->library('image_lib',$config);
 			if(!$this->image_lib->resize())
 			{
 				echo $this->image_lib->display_errors();
 			}      
 		}
}
?>