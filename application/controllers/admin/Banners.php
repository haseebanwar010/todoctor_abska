<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banners extends CI_Controller {
   
	protected $title = '';

	public function __construct()
        {
                parent::__construct();
				$this->load->library('session');
				$this->load->model('banners_model');
		  }
	
	public function index( $msg = NULL)
	{
        $data=array();
        $data['page'] = 'banners';
		$data['banners'] = $this->banners_model->get_banners();
		if(! $this->session->userdata('validated')){
			redirect('auth');
		}
        else{
            $this->load->view('admin/templates/header', $data);
				$this->load->view('admin/templates/sidebar', $data);
				$this->load->view('admin/banners/index', $data);
				$this->load->view('admin/templates/footer', $data);
        }
				
    }
    
    public function add($url = NULL){
        if(! $this->session->userdata('validated')){
			redirect('auth');
		}
			$data['page'] = 'addbanner';
			//$data['config'] = $this->config_model->get_config(1);
			$this->load->helper('form');
			$this->load->library('form_validation');
			$VideoData= array();
			
			if (empty($_FILES))
			{
				if($url == NULL){
				$this->load->view('admin/templates/header');
				$this->load->view('admin/templates/sidebar', $data);
				$this->load->view('admin/banners/add', $data);
				$this->load->view('admin/templates/footer');
				}else{
						echo validation_errors();
				}
					
			}
			else
			{
                
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
                    redirect('admin/banners');
		 		}
		 		else
		 		{
		 			$finfo=$this->upload->data();
		 			$this->createThumbnail($finfo['file_name']);
					$this->banners_model->set_banner($finfo['file_name']);
                    $this->session->set_flashdata('msg', 'Banner Added Successfully!');
                    redirect('admin/banners');
		 		}
				
				
			}
        
			
		}
    public function edit($id = NULL){
			$user = $this->session->get_userdata();
			$data['page'] = 'editbanner';
        
        $data['banners'] = $this->banners_model->get_banners($id);
			$image ='';
			$this->load->helper('form');
			$this->load->library('form_validation');
        
			if (empty($_FILES))
			{
				$this->load->view('admin/templates/header');
				$this->load->view('admin/templates/sidebar', $data);
				$this->load->view('admin/banners/edit', $data);
				$this->load->view('admin/templates/footer');
			}
			else
			{
				if($_FILES['image']['tmp_name']!='')
				{
					$new_name = time().$_FILES["image"]['name'];
					$config['file_name'] = $new_name;
					$config['upload_path']   =   "./uploads/";
					$config['allowed_types'] =   "gif|jpg|jpeg|png"; 
//					$config['max_size']      =   "5000";
//					$config['max_width']     =   "1907";
//					$config['max_height']    =   "1280";
					$this->load->library('upload',$config);
					if(!$this->upload->do_upload('image'))
					{
						$this->session->set_flashdata('error_msg',$this->upload->display_errors());
						redirect('admin/banners');
					}
					else
					{
						$finfo=$this->upload->data();
						$this->createThumbnail($finfo['file_name']);
						$image = $finfo['file_name'];
					}
				}
                if($image != ""){
                    $this->banners_model->update_banner($image);
				$this->session->set_flashdata('msg', 'banner Information is updated Successfully!');
                }
				else{
					$this->banners_model->update_banner($image);
					$this->session->set_flashdata('msg', 'banner Information is updated Successfully!');
				}
				
				redirect('admin/banners');
			}
			
        
			
			
		}
    //@unlink("./assets/uploads/news/images/$file_name");
    public function delete($id = NULL){
			$user = $this->session->get_userdata();
        $banner=$this->banners_model->getbannername($id);
        $bannername=$banner[0]['image'];
        
			if($this->banners_model->delete_banner($id)){
                @unlink("./uploads/$bannername");
                @unlink("./uploads/thumb/$bannername");
				$this->session->set_flashdata('msg', 'Banner is deleted Successfully!');
				redirect('admin/banners');
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