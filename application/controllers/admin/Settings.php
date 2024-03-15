<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {
   
	protected $title = ''; 

	public function __construct()
        {
                parent::__construct();
                
				$this->load->library('session');
				
				$this->load->model('config_model');
				
		  }
	
	public function index( $msg = NULL)
	{
        $data=array();
        $data['page'] = 'settings';
		$data['settings'] = $this->config_model->get_settings();
        
		if(! $this->session->userdata('validated')){
			redirect('auth');
		}
        else{
            $this->load->view('admin/templates/header', $data);
				$this->load->view('admin/templates/sidebar', $data);
				$this->load->view('admin/settings/edit', $data);
				$this->load->view('admin/templates/footer', $data);
        }
				
		}
    
    
    public function add($url = NULL){
			
			$user = $this->session->get_userdata();
			$data['page'] = 'videos';
			//$data['config'] = $this->config_model->get_config(1);
			$this->load->helper('form');
			$this->load->library('form_validation');
          
			
			$VideoData= array();
			
			if (empty($_POST))
			{
               
                
				if($url == NULL){
				$this->load->view('admin/templates/header');
				$this->load->view('admin/templates/sidebar', $data);
				$this->load->view('admin/settings/add', $data);
				$this->load->view('admin/templates/footer');
				}else{
						echo validation_errors();
				}
					
			}
			else
			{
                
		 			
					$this->config_model->set_settings();
		 		
				$this->session->set_flashdata('msg', 'Settings Added Successfully!');
				redirect('settings');
			}
			
			
		}
    public function edit($id = NULL){
			$user = $this->session->get_userdata();
			$data['page'] = 'settings';
        
        $data['settings'] = $this->config_model->get_settings();
			//var_dump($data['settings']);
        //exit;
        $this->load->helper('form');
			$this->load->library('form_validation');
         
        
        
        
        if(empty($data['settings'])){
            $this->load->view('admin/templates/header');
				$this->load->view('admin/templates/sidebar', $data);
				$this->load->view('admin/settings/add', $data);
				$this->load->view('admin/templates/footer');
        }
        else{
			
            
            
			//$this->form_validation->set_rules('description', 'Description', 'required');
			
        
			if (empty($_POST))
			{
				$this->load->view('admin/templates/header');
				$this->load->view('admin/templates/sidebar', $data);
				$this->load->view('admin/settings/edit', $data);
				$this->load->view('admin/templates/footer');
			}
			else
			{
				
				$this->config_model->update_settings();
				$this->session->set_flashdata('msg', 'Site Information is updated Successfully!');
				//$this->session->keep_flashdata('msg', 'Site Information is updated Successfully!');
               
                //echo $this->session->flashdata('msg');
                //exit;
				redirect('admin/settings');
			}
			
        }
			
			
		}
    //@unlink("./assets/uploads/news/images/$file_name");
    public function delete($id = NULL){
			$user = $this->session->get_userdata();
        $thumb=$this->services_model->getbannername($id);
        $thumbname=$thumb[0]['thumb'];
        
			if($this->services_model->delete_service($id)){
                @unlink("./uploads/$thumbname");
                @unlink("./uploads/thumb/$thumbname");
				//echo "hello";
				//exit;
				$this->session->set_flashdata('msg', 'Service is deleted Successfully!');
				redirect('service');
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