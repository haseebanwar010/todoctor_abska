<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
   
	protected $title = '';

	public function __construct()
        {
                parent::__construct();
                
				$this->load->library('session');
				$this->load->model('users_model');
				
		  }
	
	public function index( $msg = NULL)
	{
        $data=array();
        $data['page'] = 'users';
        if(! $this->session->userdata('validated')){
			redirect('auth');
		}
        else{
		$data['users'] = $this->users_model->get_frontendusers();
		
            $this->load->view('admin/templates/header', $data);
				$this->load->view('admin/templates/sidebar', $data);
				$this->load->view('admin/users/index', $data);
				$this->load->view('admin/templates/footer', $data);
        	
		}
    }
    public function detail($userid=NULL){
        $data=array();
        $data['page'] = 'userdetail';
        $data['user']=$this->users_model->get_frontendusers($userid);
        $data['appointments']=$this->users_model->get_appointments_byuserid($userid);
       
        $this->load->view('admin/templates/header', $data);
				$this->load->view('admin/templates/sidebar', $data);
				$this->load->view('admin/users/detail', $data);
				$this->load->view('admin/templates/footer', $data);
    }
    
}
?>