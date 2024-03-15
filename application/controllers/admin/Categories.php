<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categories extends CI_Controller {
   
	protected $title = '';

	public function __construct()
        {
                parent::__construct();
                
				$this->load->library('session');
				$this->load->model('categories_model');
				
		  }
	
	public function index( $msg = NULL)
	{
        $data=array();
        $data['page'] = 'categories';
        if(! $this->session->userdata('validated')){
			redirect('auth');
		}
        else{
		$data['categories'] = $this->categories_model->get_categories();
		if(! $this->session->userdata('validated')){
			redirect('auth');
		}
        else{
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/templates/sidebar', $data);
            $this->load->view('admin/categories/index', $data);
            $this->load->view('admin/templates/footer', $data);
        }
				
		}
    }
    
    public function add($url = NULL){
			if(! $this->session->userdata('validated')){
			 redirect('auth');
		    }
        $image="";
			$data['page'] = 'addcategory';
			$this->load->helper('form');
			$this->load->library('form_validation');
            $this->form_validation->set_rules('name', 'Name', 'required|min_length[3]');
			
			if ($this->form_validation->run() === FALSE)
			{
				if($url == NULL){
				    $this->load->view('admin/templates/header');
				    $this->load->view('admin/templates/sidebar', $data);
				    $this->load->view('admin/categories/add', $data);
				    $this->load->view('admin/templates/footer');
				}else{
				    echo validation_errors();
				}
			}
			else
			{
               
                $this->categories_model->set_category();
				$this->session->set_flashdata('msg', 'Category Added Successfully!');
				redirect('admin/categories');	
			}
			
		}
    public function edit($id = NULL){
			$user = $this->session->get_userdata();
			$data['page'] = 'editcategory';
            
            $data['categories'] = $this->categories_model->get_categories($id);
			
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->form_validation->set_rules('name', 'Name', 'required|min_length[3]');
			if ($this->form_validation->run() === FALSE)
			{
				$this->load->view('admin/templates/header');
				$this->load->view('admin/templates/sidebar', $data);
				$this->load->view('admin/categories/edit', $data);
				$this->load->view('admin/templates/footer');
			}
			else
			{
                
                    $this->categories_model->update_category();
				$this->session->set_flashdata('msg', 'Category Information is updated Successfully!');
				redirect('admin/categories');
                
				
			}
			
			
			
			
		}
 public function delete($id = NULL){
			$user = $this->session->get_userdata();
        
			if($this->categories_model->delete_category($id)){
				$this->session->set_flashdata('msg', 'Category is deleted Successfully!');
				redirect('admin/categories');
			}
			
		}
}
?>