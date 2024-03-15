<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('users_model');
		$this->load->model('doctor_model');
        $this->load->helper('captcha');
	}



	public function registration()
	{
		$data=array();
        $data['countries']=$this->doctor_model->get_countries();
        $data['cities']=$this->doctor_model->get_cities();
        $data['categories']=$this->doctor_model->get_categories();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Full Name', 'required|min_length[3]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[frontend_users.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|matches[password]');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('userCaptcha', 'Captcha', 'callback_check_captcha');
        $userCaptcha = $this->input->post('userCaptcha');
        
        if ($this->input->post('userCaptcha') == "") 
		{
            
            $characters = 'QAZWSXEDCRFVTGBYHNUJMIKOLP?!@#$%*123456789';
			$random_number = "";
            $max = strlen($characters) - 1;

            for ($i = 0; $i < 7; $i++) {
                $random_number .= $characters[mt_rand(0, $max)];
            }
				$vals = array(
                    'word_length'   => 4,
                    'font_size'     => 26,
                'word' => $random_number,
                'img_path' => './assets/captcha/',
                'img_url' => base_url() . 'assets/captcha/',
                'img_width' => 140,
                'img_height' => 32,
                'expiration' => 7200,    
                'colors'        => array(
                'background' => array(255, 255, 255),
                'border' => array(255, 255, 255),
                'text' => array(0, 0, 0),
                'grid' => array(243, 243, 249)
        )
            );
            $data['captcha'] = create_captcha($vals);
			$this->session->set_userdata('captchaWord', $data['captcha']['word']);
        }
         if ($this->input->post()){
        
        if ($this->form_validation->run() === FALSE){
            
                 
                         $characters = 'QAZWSXEDCRFVTGBYHNUJMIKOLP?!@#$%*123456789';

                $random_number = "";
                $max = strlen($characters) - 1;

                for ($i = 0; $i < 7; $i++) {
                    $random_number .= $characters[mt_rand(0, $max)];
                }

               $vals = array(
                    'word_length'   => 4,
                    'font_size'     => 26,
                'word' => $random_number,
                'img_path' => './assets/captcha/',
                'img_url' => base_url() . 'assets/captcha/',
                'img_width' => 140,
                'img_height' => 32,
                'expiration' => 7200,    
                'colors'        => array(
                'background' => array(255, 255, 255),
                'border' => array(255, 255, 255),
                'text' => array(0, 0, 0),
                'grid' => array(243, 243, 249)
        )
            );
                $data['captcha'] = create_captcha($vals);
                $this->session->set_userdata('captchaWord', $data['captcha']['word']);
				
			
                $data['validation_errors_captcha'] = validation_errors("☻");
            
            $this->load->view('frontend/templates/header', $data);
            $this->load->view('frontend/templates/header_search', $data);
            $this->load->view('frontend/users/registration', $data);
		      $this->load->view('frontend/templates/footer', $data);
        }
        else{
            
            $this->users_model->set_user();
				$this->session->set_flashdata('msg', 'Your account as a user has been created successfully!');
				redirect('user/registration');	
        }
         }
        else{
            $this->load->view('frontend/templates/header', $data);
            $this->load->view('frontend/users/registration', $data);
		      $this->load->view('frontend/templates/footer', $data);
        }
	}
    public function login(){
        $data=array();
        $data['countries']=$this->doctor_model->get_countries();
        $data['cities']=$this->doctor_model->get_cities();
        $data['categories']=$this->doctor_model->get_categories();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() === FALSE){
            $this->load->view('frontend/templates/header', $data);
            $this->load->view('frontend/templates/header_search', $data);
            $this->load->view('frontend/users/login', $data);
		      $this->load->view('frontend/templates/footer', $data);
        }
        else{
            
            $userdata=$this->users_model->authenticate_user();
            if(empty($userdata)){
                $this->session->set_flashdata('login_error',"Invalid email or password.");
                $this->load->view('frontend/templates/header', $data);
                $this->load->view('frontend/users/login', $data);
		      $this->load->view('frontend/templates/footer', $data);
            }
            else{
                $_SESSION['frontuser_session']=$userdata;
                redirect('');	
            }
            
        }
		
    }
    public function forgotpassword(){
        $data=array();
        $data['countries']=$this->doctor_model->get_countries();
        $data['cities']=$this->doctor_model->get_cities();
        $data['categories']=$this->doctor_model->get_categories();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        if ($this->form_validation->run() === FALSE){
            $this->load->view('frontend/templates/header');
            $this->load->view('frontend/templates/header_search', $data);
            $this->load->view('frontend/users/forgotpassword', $data);
            $this->load->view('frontend/templates/footer');
        }
        else{
            $checkemail=$this->users_model->check_by_email($this->input->post('email'));
            if(empty($checkemail)){
                $this->session->set_flashdata('error', "Email doesn't exist!");
				    redirect('user/forgotpassword');
            }else{
                $chars = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N",
            "O","P","Q","R","S","T","U","V","W","X","Y","Z","1","2","3",
            "4","5","6","7","8","9","0");
        $max_chars = count($chars) - 1;
        srand((double)microtime()*1000000);
        $randChars='';
        $length=6;
        for ($i = 0; $i < $length; $i++) {
            $randChars .= ($i == 0) ? $chars[rand(0, $max_chars)] :$chars[rand(0, $max_chars)];
        }
        if($this->users_model->updatepassword($this->input->post('email'),$randChars)){
            $subject="Forgot Password";
            $sitesettings=getsitedata();
            $adminemail=$sitesettings->email;
            $message = "Your password has been reset!<br /><br />
				Email: ".$this->input->post('email')."
				<br />Your New password is: ".$randChars;
            send_email_custom($this->input->post('email'),$adminemail, $subject, $message);
            $this->session->set_flashdata('msg', 'New password has been sent to your email addreess successfully!');
				redirect('user/login');
        }
                
                
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
     public function check_captcha($str){
        if(!$this->session->userdata('captchaWord') || $this->input->post('userCaptcha') == "" )
        {
            return true;
        }
        $word = $this->session->userdata('captchaWord');

        /*echo $word."</br>";
        echo $str;
        exit; */

        if(strcmp(strtoupper($str),strtoupper($word)) == 0){
            return true;
        }
        else{
            $this->form_validation->set_message('check_captcha', 'Captcha is Wrong please try again!');
            return false;
        }
    }
}
