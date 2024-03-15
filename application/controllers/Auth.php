<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
        {
                parent::__construct();
				$this->load->model('user_model');
                $this->load->helper('url_helper');
				$this->load->library('session');
				//$this->check_isvalidated();
        }
		
	
	public function index( $msg = NULL)
	{
		$this->load->view('admin/login');
	}	
	
	public function login($flag = false)
	{
		// Validate the user can login
		
			 $result = $this->user_model->validate();
			//var_dump($result);
        //exit;
			// Now we verify the result
			if(! $result){
				
				//if(!$this->user_model->validate_staff()){
					
					if($flag == 'reset'){
						$data['reset'] = 'New Password Has been sent to your email address.';
						$this->load->view('admin/login', $data);
					}else{
						// If user did not validate, then show them login page again
						$data['msg'] = 'Invalid username and/or password.';
						$this->load->view('admin/login', $data);
					}
				/*}else{
					redirect('auth');
				}*/
				
			}else{
				// If user did validate, 
				// Send them to members area
				redirect('admin/dashboard');
			}
	}
	
	public function forgot_password(){
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		
		if ($this->form_validation->run() === FALSE)
		{
			//$data['msg'] = 'Invalid Email!';
			$this->load->view('admin/forgot_password');
		}
		else
		{
			if(!$this->user_model->validate_email()){
				$data['msg'] = 'Email Does not Match!';
				$this->load->view('admin/forgot_password', $data);
			}else{
				
				$pass = $this->user_model->randomPassword();
				$this->user_model->update_admin_password_by_email($pass);
				$email = $this->input->post('email');
				
				$user_info = $this->user_model->get_user_by_email($email);
				//var_dump($user_info);
                //exit;
				$master_email = $this->config->item('master_email');
				$master_name = $this->config->item('master_name');
				
				$message = "Your password has been reset!<br /><br />
				User Name: ".$user_info['name']."
				<br />Your New password is: ".$pass;
				
				$this->load->library('email');
					
					$config['protocol'] = 'sendmail';
					$config['mailpath'] = '/usr/sbin/sendmail';
					$config['charset'] = 'iso-8859-1';
					$config['mailtype'] = 'html';
					$config['wordwrap'] = TRUE;
					
					$this->email->initialize($config);

					$this->email->from($master_email, $master_name);
					$this->email->to($email); 
					
					$this->email->subject('Password Reset for Tudoctor');
					
					$this->email->message($message);	
					$this->email->send();
					redirect('auth/login/reset');
			}
			
		}
	}
	public function change_password($customer_id = NULL){
        
        //echo "there".$customer_id;
        //echo "<pre>";
        //echo $this->session->userdata['userid'];
        //var_dump($this->session->userdata);
        //exit;
			if(! $this->session->userdata('validated')){
				redirect('auth');
			}else{
				
				$data['page'] = 'password';
				$this->load->helper('form');
				$this->load->library('form_validation');
				
				
				$this->form_validation->set_rules('old_password', 'Old Password', 'required');
				$this->form_validation->set_rules('new_password', 'New Password', 'required|min_length[6]');
				$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|min_length[6]|matches[new_password]');
				
				
			
				if ($this->form_validation->run() === FALSE)
				{
						$this->load->view('admin/templates/header', $data);
						$this->load->view('admin/templates/sidebar', $data);
						$this->load->view('admin/change_password', $data);
						$this->load->view('admin/templates/footer', $data);
					
			
				}
				else
				{
					
					if($this->user_model->validate_admin_pass()){
						
						$this->user_model->update_admin_password();	
						$this->session->set_flashdata('msg', 'New password is updated Successfully!');			
						redirect('auth/change_password');
					}elseif($this->user_model->validate_password()){
						
						$this->user_model->update_password();
					
						redirect('auth/change_password');
						
					}else{
						
						$this->load->view('admin/templates/header', $data);
						$this->load->view('admin/templates/sidebar', $data);
						$this->load->view('admin/change_password', $data);
						$this->load->view('admin/templates/footer', $data);
						
					}
					
				}
			}
			
			
			
		}
	public function logout(){
			 $role = $this->session->userdata('user_role');
			$this->session->unset_userdata('user');
			$this->session->sess_destroy();
			if($role!='AGENT'){
				redirect('auth','refresh');
			}else{
				redirect('agentPanel','refresh');
				}
		}
}
