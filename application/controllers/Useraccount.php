<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Useraccount extends CI_Controller {
	protected $title = ''; 

	public function __construct()
        {
                parent::__construct();
            
			if (!isset($_SESSION['frontuser_session']) || empty($_SESSION['frontuser_session'])){
					redirect("user/login");
			}
			$this->load->model('users_model');
        $this->load->model('doctor_model');
		 }
		
	//MMM INdex //
	public function index( $msg = NULL)
	{
		
			$data = array();
			$data['title'] = "sample title";
			$data['userData'] = $this->users_model->get_frontendusers($_SESSION['frontuser_session']['id']);
        $data['countries']=$this->doctor_model->get_countries();
        $data['cities']=$this->doctor_model->get_cities();
        $data['categories']=$this->doctor_model->get_categories();
			$data['header'] = $this->load->view('frontend/templates/header', $data, true); 
			$data['header_search'] = $this->load->view('frontend/templates/header_search', $data, true);
			$data['footer'] = $this->load->view('frontend/templates/footer', $data, true); 
			$data['myaccount_menu'] = $this->load->view('frontend/users/menu', $data, true); 
			$this->load->view('frontend/users/myaccount_profile', $data);
		
	}
	
	public function myappointments(){
        $data=array();
        $data['userData'] = $this->users_model->get_frontendusers($_SESSION['frontuser_session']['id']);
        $data['countries']=$this->doctor_model->get_countries();
        $data['cities']=$this->doctor_model->get_cities();
        $data['categories']=$this->doctor_model->get_categories();
        $data['appointments']=$this->users_model->get_appointments_byuserid($data['userData']['id']);
        $data['header_search'] = $this->load->view('frontend/templates/header_search', $data, true);
        $data['header'] = $this->load->view('frontend/templates/header', $data, true); 
        $data['footer'] = $this->load->view('frontend/templates/footer', $data, true); 
        $data['myaccount_menu'] = $this->load->view('frontend/users/menu', $data, true); 
        $this->load->view('frontend/users/myaccount_appointments', $data);
    }
	// Edit User Profile
	public function editProfile($id = NULL){
        
		
			$data['title'] = $this->title;
			
			$this->load->helper('form');
			$this->load->library('form_validation');
			
			$data['userData'] = $this->users_model->get_frontendusers($_SESSION['frontuser_session']['id']);
			$data['countries']=$this->doctor_model->get_countries();
        $data['cities']=$this->doctor_model->get_cities();
        $data['categories']=$this->doctor_model->get_categories();
			$this->form_validation->set_rules('name', 'Full Name', 'required|min_length[3]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('address', 'Address', 'required');
				
			if ($this->form_validation->run() === FALSE)
			{
                $data['header_search'] = $this->load->view('frontend/templates/header_search', $data, true);
                $data['header'] = $this->load->view('frontend/templates/header', $data, true); 
			     $data['footer'] = $this->load->view('frontend/templates/footer', $data, true); 
			     $data['myaccount_menu'] = $this->load->view('frontend/users/menu', $data, true); 
				$this->load->view('frontend/users/myaccount_edit_profile', $data);
			}
			else
			{
				//echo "dsfjskld";
				//exit;
				$this->users_model->update_users_profile();
				$this->session->set_flashdata('success_message', 'Profile information is updated successfully!');
				redirect('useraccount/editprofile');
				exit;
			}
		
	}
	
	

	public function changePassword( $msg = NULL){
		$data = array();
		$data['title'] = 'Forgot Password - '.$this->title;
		$data['countries']=$this->doctor_model->get_countries();
        $data['cities']=$this->doctor_model->get_cities();
        $data['categories']=$this->doctor_model->get_categories();
		$data['userData'] = $this->users_model->get_frontendusers($_SESSION['frontuser_session']['id']);
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('old_password', 'Old Password', 'required|callback_check_password');
		$this->form_validation->set_rules('new_password', 'New Password', 'required|min_length[6]');
		$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|min_length[6]|matches[new_password]');
				
		if ($this->form_validation->run() == FALSE)
        {
            $data['header_search'] = $this->load->view('frontend/templates/header_search', $data, true);
			  $data['header'] = $this->load->view('frontend/templates/header', $data, true); 
			$data['footer'] = $this->load->view('frontend/templates/footer', $data, true); 
			$data['myaccount_menu'] = $this->load->view('frontend/users/menu', $data, true); 
			$this->load->view('frontend/users/myaccount_change_password', $data);
		}else{
            $email=$_SESSION['frontuser_session']['email'];
            $id=$_SESSION['frontuser_session']['id'];
			//$id = $this->session->userdata('front_user_id');
			$this->users_model->updateUserPassword($id);
			
			$this->session->set_flashdata('success_message','Your password has been change successfully.');
					//echo $pass;
			redirect('useraccount/changepassword');
			
		}
	}
	
	public function logout(){
			
			unset($_SESSION['frontuser_session']);
			redirect('home','refresh');  
	}
	
	public function check_password($post_pass){
        
		$data['userData'] = $this->users_model->get_frontendusers($_SESSION['frontuser_session']['id']);
         $email=$data['userData']['email'];
        
		if($this->users_model->checkPassword($email,$post_pass)){
			return true;	
			}else{
				$this->form_validation->set_message('check_password', 'Invalid Old Password.');
				return false;
			}
		
	}
	
}