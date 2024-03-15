<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doctoraccount extends CI_Controller {
	protected $title = ''; 

	public function __construct()
        {
                parent::__construct();
            
			if (!isset($_SESSION['doctor_session']) || empty($_SESSION['doctor_session'])){
					redirect("doctor/login");
			}
			$this->load->model('doctor_model');
		 }
		
	//MMM INdex //
	public function index( $msg = NULL){
		
			$data = array();
        $data['countries']=$this->doctor_model->get_countries();
        $data['cities']=$this->doctor_model->get_cities();
        $data['categories']=$this->doctor_model->get_categories();
        $data['userData'] = $this->doctor_model->get_doctors($_SESSION['doctor_session']['id']);
        $doctcetag=explode(",",$data['userData']['category']);
        $cattext="";
        foreach($doctcetag as $doctcetagry){
            foreach($data['categories'] as $cat){
                if($cat['id']==$doctcetagry){
                    $cattext.=$cat['name'].", ";
                }
            }
        }
        $data['userData']['cattext']=$cattext;
        
        
        $availability_array=explode(",",$data['userData']['availability']);
        $availability_text="";
        if (in_array("1", $availability_array)){
            $availability_text.="<span>Mon</span>";
        }
        if (in_array("2", $availability_array)){
            $availability_text.="<span>Tue</span>";
        }
        if (in_array("3", $availability_array)){
            $availability_text.="<span>Wed</span>";
        }
        if (in_array("4", $availability_array)){
            $availability_text.="<span>Thur</span>";
        }
        if (in_array("5", $availability_array)){
            $availability_text.="<span>Fri</span>";
        }
        if (in_array("6", $availability_array)){
            $availability_text.="<span>Sat</span>";
        }
        if (in_array("0", $availability_array)){
            $availability_text.="<span>Sun</span>";
        }
        $data['userData']['availability_text']=$availability_text;
        
			$data['header'] = $this->load->view('frontend/templates/header', $data, true); 
			$data['header_search'] = $this->load->view('frontend/templates/header_search', $data, true);
			$data['footer'] = $this->load->view('frontend/templates/footer', $data, true); 
			$data['myaccount_menu'] = $this->load->view('frontend/doctors/menu', $data, true); 
			$this->load->view('frontend/doctors/myaccount_profile', $data);
		
	}
	
	
	// Edit User Profile
	public function editProfile($id = NULL){
        
		$data['countries']=$this->doctor_model->get_countries();
        $data['cities']=$this->doctor_model->get_cities();
        $data['categories']=$this->doctor_model->get_categories();
			$data['title'] = $this->title;
			
			$this->load->helper('form');
			$this->load->library('form_validation');
			
			$data['userData'] = $this->doctor_model->get_doctors($_SESSION['doctor_session']['id']);
        $data['userData']['availability']=explode(",",$data['userData']['availability']);
        $data['userData']['category']=explode(",",$data['userData']['category']);
		
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('first_name', 'First Name', 'required|min_length[3]');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required|min_length[3]');
        $this->form_validation->set_rules('display_name', 'Display Name', 'required|min_length[3]');
        $this->form_validation->set_rules('zip_code', 'Zip Code', 'required');
        $this->form_validation->set_rules('phone', 'Phone', 'required|numeric');
        $this->form_validation->set_rules('city', 'City', 'required');
        $this->form_validation->set_rules('country', 'Country', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');    
//        $this->form_validation->set_rules('category', 'Category', 'required');
        $this->form_validation->set_rules('start_time', 'Start Time', 'required');
        $this->form_validation->set_rules('end_time', 'End Time', 'required');
			if ($this->form_validation->run() === FALSE)
			{
                $data['header_search'] = $this->load->view('frontend/templates/header_search', $data, true);
                $data['header'] = $this->load->view('frontend/templates/header', $data, true); 
			$data['footer'] = $this->load->view('frontend/templates/footer', $data, true); 
			$data['myaccount_menu'] = $this->load->view('frontend/doctors/menu', $data, true);
				$this->load->view('frontend/doctors/myaccount_edit_profile', $data);
			}
			else
			{
				$image="";
            if(isset($_FILES['image']) && $_FILES['image']['name']!=""){
                    $new_name = time().$_FILES["image"]['name'];
				$config['file_name'] = $new_name;
				$config['upload_path']   =   "./uploads/";
 				$config['allowed_types'] =   "gif|jpg|jpeg|png"; 
		 		$this->load->library('upload',$config);
                
		 		if(!$this->upload->do_upload('image'))
		 		{
                    $this->session->set_flashdata('error_msg',$this->upload->display_errors());
                    redirect('doctor/registration');
		 		}
		 		else
		 		{
		 			$finfo=$this->upload->data();
                    $this->createThumbnail($finfo['file_name']);
                    $image=$finfo['file_name'];
		 		}
            }
				$this->doctor_model->update_doctor_profile($image);
				$_SESSION['frontuser_session']['name']=$this->input->post('name');
				$_SESSION['frontuser_session']['email']=$this->input->post('email');
				$_SESSION['frontuser_session']['address']=$this->input->post('address');
				$this->session->set_flashdata('success_message', 'Profile information is updated successfully!');
				redirect('doctoraccount/editprofile');
				exit;
			}
		
	}
	
	

	public function changePassword( $msg = NULL){
		$data = array();
		$data['title'] = 'Forgot Password - '.$this->title;
		$data['countries']=$this->doctor_model->get_countries();
        $data['cities']=$this->doctor_model->get_cities();
        $data['categories']=$this->doctor_model->get_categories();
		$data['userData'] = $this->doctor_model->get_doctors($_SESSION['doctor_session']['id']);
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
			$this->load->view('frontend/doctors/myaccount_change_password', $data);
		}else{
            $email=$data['userData']['email'];
            $id=$data['userData']['id'];
			//$id = $this->session->userdata('front_user_id');
			$this->doctor_model->updateUserPassword($id);
			
			$this->session->set_flashdata('success_message','Your password has been change successfully.');
					//echo $pass;
			redirect('doctoraccount/changepassword');
			
		}
	}
	public function myappointments(){
        $data=array();
        $data['userData'] = $this->doctor_model->get_doctors($_SESSION['doctor_session']['id']);
        $data['countries']=$this->doctor_model->get_countries();
        $data['cities']=$this->doctor_model->get_cities();
        $data['categories']=$this->doctor_model->get_categories();
        $data['appointments']=$this->doctor_model->get_appointments_bydoctorid($data['userData']['id']);
        $data['header_search'] = $this->load->view('frontend/templates/header_search', $data, true);
        $data['header'] = $this->load->view('frontend/templates/header', $data, true); 
        $data['footer'] = $this->load->view('frontend/templates/footer', $data, true); 
        $data['myaccount_menu'] = $this->load->view('frontend/doctors/menu', $data, true); 
        $this->load->view('frontend/doctors/myaccount_appointments', $data);
    }
	public function logout(){
			
			unset($_SESSION['doctor_session']);
			redirect('home','refresh');  
	}
	
	public function check_password($post_pass) {
        
		$data['userData'] = $this->doctor_model->get_doctors($_SESSION['doctor_session']['id']);
         $email=$data['userData']['email'];
        
		if($this->doctor_model->checkPassword($email,$post_pass)){
			return true;	
			}else{
				$this->form_validation->set_message('check_password', 'Invalid Old Password.');
				return false;
			}
		
	}
	
}