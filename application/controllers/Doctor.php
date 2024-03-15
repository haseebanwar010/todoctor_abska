<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doctor extends CI_Controller {

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
		$this->load->model('doctor_model');
		$this->load->model('users_model');
		$this->load->model('home_model');
        $this->load->helper('captcha');
	}



	public function registration(){
		$data=array();
        $data['countries']=$this->doctor_model->get_countries();
        $data['cities']=$this->doctor_model->get_cities();
        $data['categories']=$this->doctor_model->get_categories();
        
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[doctors.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|matches[password]');
        $this->form_validation->set_rules('first_name', 'First Name', 'required|min_length[3]');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required|min_length[3]');
        $this->form_validation->set_rules('display_name', 'Display Name', 'required|min_length[3]');
        $this->form_validation->set_rules('zip_code', 'Zip Code', 'required');
        $this->form_validation->set_rules('phone', 'Phone', 'required|numeric');
        $this->form_validation->set_rules('city', 'City', 'required');
        $this->form_validation->set_rules('country', 'Country', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');    
//        $this->form_validation->set_rules('category', 'Category', 'required');
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
            $this->load->view('frontend/doctors/registration', $data);
		      $this->load->view('frontend/templates/footer', $data);
        }
        else{
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
            $this->doctor_model->set_doctor($image);
				$this->session->set_flashdata('msg', 'Your account as a doctor has been created successfully!');
				redirect('doctor/registration');	
        }
         }
        else{
            $this->load->view('frontend/templates/header', $data);
            $this->load->view('frontend/doctors/registration', $data);
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
            $this->load->view('frontend/doctors/login', $data);
		      $this->load->view('frontend/templates/footer', $data);
        }
        else{
            
            $doctordata=$this->doctor_model->authenticate_doctor();
            if(empty($doctordata)){
                $this->session->set_flashdata('login_error',"Invalid email or password.");
                $this->load->view('frontend/templates/header', $data);
                $this->load->view('frontend/doctors/login', $data);
		      $this->load->view('frontend/templates/footer', $data);
            }
            else{
                $_SESSION['doctor_session']=$doctordata;
                redirect('doctoraccount/myappointments');	
            }
            
        }
		
    }
    public function createThumbnail($filename){
 
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
    public function listing($catid=false){
        $data=array();
        $data['countries']=$this->doctor_model->get_countries();
        $data['cities']=$this->doctor_model->get_cities();
        $categories=$this->doctor_model->get_categories();
        for($i=0;$i<sizeof($categories);$i++){
            $counter=$this->doctor_model->get_cat_counter($categories[$i]['id']);
            $categories[$i]['counter']=$counter;
        }
        $data['categories']=$categories;
        $data['doctors']=$this->doctor_model->get_doctors_listing($catid);
//        echo '<pre>';
//        var_dump($data['doctors']);
//        exit;
        
        for($i=0; $i<sizeof($data['doctors']);$i++){
        $doctcetag=explode(",",$data['doctors'][$i]['category']);
        $cattext="";
        foreach($doctcetag as $doctcetagry){
            foreach($data['categories'] as $cat){
                if($cat['id']==$doctcetagry){
                    $cattext.=$cat['name'].", ";
                }
            }
        }
          $data['doctors'][$i]['cattext']=$cattext;  
        }
        
        
        
        for($k=0;$k<sizeof($data['doctors']);$k++){
            $ratings=$this->doctor_model->get_specificdoctorrating($data['doctors'][$k]['id']);
        $totalratings=sizeof($ratings);
        $avgratingval=0;
        foreach($ratings as $rating){
            $avgratingval=$avgratingval+$rating['rating_value'];
        }
        if($avgratingval!=0){
            $avgratingval=$avgratingval/$totalratings;
        }
            $data['doctors'][$k]['avgrating']=$avgratingval;
            
            $availability_array=explode(",",$data['doctors'][$k]['availability']);
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
        $data['doctors'][$k]['availability_text']=$availability_text;
            
            
        }
//            echo'<pre>';
//        var_dump($data['doctors']);
//        exit;
        $this->load->view('frontend/templates/header', $data);
        $this->load->view('frontend/templates/header_search', $data);
        $this->load->view('frontend/doctorslisting', $data);
        $this->load->view('frontend/templates/footer', $data);
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
            $this->load->view('frontend/doctors/forgotpassword', $data);
            $this->load->view('frontend/templates/footer');
        }
        else{
            $checkemail=$this->doctor_model->check_by_email($this->input->post('email'));
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
        if($this->doctor_model->updatepassword($this->input->post('email'),$randChars)){
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
    public function detail($id=false){
        $data=array();
        
        if(isset($_SESSION['frontuser_session']) && !empty($_SESSION['frontuser_session'])){
            $specificuserrating=$this->doctor_model->get_specificuserrating($_SESSION['frontuser_session']['id'],$id);
            $active_appointments=$this->doctor_model->get_active_appointments($_SESSION['frontuser_session']['id'],$id);
            if(empty($specificuserrating) && !empty($active_appointments)){
                $data['allowrating']="yes";
            }
            else{
                $data['allowrating']="no";
            }
        }
        else{
            $data['allowrating']="no";
        }
        $ratings=$this->doctor_model->get_specificdoctorrating($id);
        $totalratings=sizeof($ratings);
        $avgratingval=0;
        foreach($ratings as $rating){
            $avgratingval=$avgratingval+$rating['rating_value'];
        }
        if($avgratingval!=0){
            $avgratingval=$avgratingval/$totalratings;
        }
        
        $data['totalratings']=$totalratings;
        $data['avgratingval']=$avgratingval;
        $data['countries']=$this->doctor_model->get_countries();
        $data['cities']=$this->doctor_model->get_cities();
        $categories=$this->doctor_model->get_categories();
        for($i=0;$i<sizeof($categories);$i++){
            $counter=$this->doctor_model->get_cat_counter($categories[$i]['id']);
            $categories[$i]['counter']=$counter;
        }
        $data['categories']=$categories;
        $data['doctor']=$this->doctor_model->get_doctor_byid($id);
        
        
               
        $doctcetag=explode(",",$data['doctor']['category']);
        $cattext="";
        foreach($doctcetag as $doctcetagry){
            foreach($data['categories'] as $cat){
                if($cat['id']==$doctcetagry){
                    $cattext.=$cat['name'].", ";
                }
            }
        }
          $data['doctor']['cattext']=$cattext;  
        
        
        
//    
        
        $availability_array=explode(",",$data['doctor']['availability']);
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
        $data['doctor']['availability_text']=$availability_text;
        
        
        $this->load->view('frontend/templates/header', $data);
        $this->load->view('frontend/templates/header_search', $data);
        $this->load->view('frontend/doctordetail', $data);
        $this->load->view('frontend/templates/footer', $data);
    }
    public function booking($id){
        if(isset($_SESSION['frontuser_session']) && !empty($_SESSION['frontuser_session'])){
            $data=array();
            $data['cities']=$this->home_model->get_cities();
        $data['categories']=$this->home_model->get_categories();
            $data['doctor']=$this->doctor_model->get_doctor_byid($id);
            $data['userinfo']=$this->users_model->get_frontendusers($_SESSION['frontuser_session']['id']);
            
            $hiddendays=array();
            $availability_array=array();
            $availability_array=explode(",",$data['doctor']['availability']);
            if (!in_array("1", $availability_array)){
                $hiddendays[]=1;
            }
            if (!in_array("2", $availability_array)){
                $hiddendays[]=2;
            }
            if (!in_array("3", $availability_array)){
                $hiddendays[]=3;
            }
            if (!in_array("4", $availability_array)){
                $hiddendays[]=4;
            }
            if (!in_array("5", $availability_array)){
                $hiddendays[]=5;
            }
            if (!in_array("6", $availability_array)){
                $hiddendays[]=6;
            }
            if (!in_array("0", $availability_array)){
                $hiddendays[]=0;
            }
            $data['hiddendays']=$hiddendays;
            $data['page']="bookdoctor";
            $this->load->view('frontend/templates/header', $data);
            $this->load->view('frontend/templates/header_search', $data);
            $this->load->view('frontend/book_doctor', $data);
            $this->load->view('frontend/templates/footer', $data);
        }else{
            redirect('user/login');
        }
        
    }
    public function submitbooking(){
        if($this->doctor_model->submitbooking()){
            $this->session->set_flashdata('msg', 'Your booking request is submitted successfully!');
            redirect('doctor/booking/'.$this->input->post('doctor_id'));
        }
        else{
            $this->session->set_flashdata('error_msg', 'Something went wrong please try again later!');
            redirect('doctor/booking/'.$this->input->post('doctor_id'));
        }
    }
    public function submitrating(){
        if($this->doctor_model->submitrating($doctorid)){
            $this->session->set_flashdata('success_message', 'Your rating added successfully!');
            redirect('doctor/detail/'.$this->input->post('doctor_id'));
        }
    }
    public function doctorappointments_json($doctorid){
        $Alldata = array();
        $resultsData=$this->doctor_model->doctorappointments_json($doctorid);
        foreach ($resultsData as $data) {
        $datar = array();

        $datar['start'] = $data['start_time'];
        $datar['end'] = $data['end_time'];
        $datar['title'] = "";
        $datar['allDay'] = (int)$data['allDay'];
        $Alldata[] = $datar;
    }
        echo json_encode($Alldata);
    }
    public function approveappointment($id=false){
        if($this->doctor_model->approveappointment($id)){
            $this->session->set_flashdata('success_message', 'Appointment is approved successfully!');
            redirect('doctoraccount/myappointments');
        }
    }
    public function rejectappointment($id=false){
        if($this->doctor_model->rejectappointment($id)){
            $this->session->set_flashdata('success_message', 'Appointment is rejected successfully!');
            redirect('doctoraccount/myappointments');
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
