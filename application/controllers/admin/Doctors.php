<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Doctors extends CI_Controller {
   
	protected $title = '';

	public function __construct()
        {
                parent::__construct();
                
				$this->load->library('session');
				$this->load->model('doctor_model');
				
		  }
	
	public function index( $msg = NULL)
	{
        $data=array();
        $data['page'] = 'doctors';
        if(! $this->session->userdata('validated')){
			redirect('auth');
		}
        else{
		$data['doctors'] = $this->doctor_model->get_doctors();
		
            $this->load->view('admin/templates/header', $data);
				$this->load->view('admin/templates/sidebar', $data);
				$this->load->view('admin/doctors/index', $data);
				$this->load->view('admin/templates/footer', $data);
        	
		}
    }
    public function approve($doctorid){
        $this->doctor_model->approve_doctor($doctorid);
				$this->session->set_flashdata('msg', 'Doctor Approved Successfully!');
				redirect('admin/doctors');	
    }
    public function detail($doctorid=NULL){
        $data=array();
        $data['page'] = 'doctordetail';
        
        
        $categories=$this->doctor_model->get_categories();
        for($i=0;$i<sizeof($categories);$i++){
            $counter=$this->doctor_model->get_cat_counter($categories[$i]['id']);
            $categories[$i]['counter']=$counter;
        }
        $data['categories']=$categories;
        
        
        
        $data['doctor']=$this->doctor_model->get_doctor_byid($doctorid);
        
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
        
        
        
        
        $data['appointments']=$this->doctor_model->get_appointments_bydoctorid($doctorid);
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
        $this->load->view('admin/templates/header', $data);
				$this->load->view('admin/templates/sidebar', $data);
				$this->load->view('admin/doctors/detail', $data);
				$this->load->view('admin/templates/footer', $data);
    }
    
}
?>