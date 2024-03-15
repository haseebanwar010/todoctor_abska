<?php
class Config_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
    public function get_settings($config_id = FALSE)
    {
        $this->db->select('*');
					$this->db->from('site_settings');
					
					$query = $this->db->get();
					return $query->result_array();
    }
    public function set_settings($image = false)
    {
       
        $this->load->helper('url');
        $data = array();

        if($this->input->post('email')){
            $data['email'] = $this->input->post('email');
        }
        
        if($this->input->post('phone')){
            $data['phone'] = $this->input->post('phone');
        }
        if($this->input->post('address')){
            $data['address'] = $this->input->post('address');
        }
        if($this->input->post('facebook')){
            $data['facebook'] = $this->input->post('facebook');
        }
        if($this->input->post('twitter')){
            $data['twitter'] = $this->input->post('twitter');
        }
        if($this->input->post('google_plus')){
            $data['google_plus'] = $this->input->post('google_plus');
        }
        if($this->input->post('instagram')){
            $data['instagram'] = $this->input->post('instagram');
        }
        if($this->input->post('linkedin')){
            $data['linkedin'] = $this->input->post('linkedin');
        } 
       
		
		
		return $this->db->insert('site_settings', $data);
    }
    public function update_settings(){
        $data = array();

        if($this->input->post('email')){
            $data['email'] = $this->input->post('email');
        }
        
        
        if($this->input->post('phone')){
            $data['phone'] = $this->input->post('phone');
        }
        if($this->input->post('address')){
            $data['address'] = $this->input->post('address');
        }
        if($this->input->post('facebook')){
            $data['facebook'] = $this->input->post('facebook');
        }
        if($this->input->post('twitter')){
            $data['twitter'] = $this->input->post('twitter');
        }
        if($this->input->post('google_plus')){
            $data['google_plus'] = $this->input->post('google_plus');
        }
        if($this->input->post('youtube')){
            $data['youtube'] = $this->input->post('youtube');
        }
        if($this->input->post('linkedin')){
            $data['linkedin'] = $this->input->post('linkedin');
        }
        if($this->input->post('skype')){
            $data['skype'] = $this->input->post('skype');
        }
      
		
		return $this->db->update('site_settings', $data);
    }
   
	 
}