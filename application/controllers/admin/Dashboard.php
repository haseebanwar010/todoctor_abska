<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	protected $title = ''; 

	public function __construct()
        {
                parent::__construct();
                
				
				$this->load->model('dashboard_model');
				
		  }
	
	public function index( $msg = NULL)
	{
        
     
        
        $data=array();
        $data['page'] = 'dashboard';
		
		if(! $this->session->userdata('validated')){
			redirect('auth');
		}
        else{
            
            $this->load->view('admin/templates/header', $data);
				$this->load->view('admin/templates/sidebar', $data);
				$this->load->view('admin/dashboard', $data);
				$this->load->view('admin/templates/footer', $data);
        }
				
    }
	
}
