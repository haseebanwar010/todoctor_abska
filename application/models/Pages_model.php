<?php
class Pages_model extends CI_Model {
     public function __construct()
    {
        $this->load->database();
    }
    public function set_page($image = false){
        $this->load->helper('url');
        $data = array();

        if($image == false){
        }
        else{
            $data['image']=$image;
        }
        if($this->input->post('title')){
            $data['title'] = $this->input->post('title');
        }
        /*if($this->input->post('video')){
            $data['video'] = $this->input->post('video');
        }*/
        if($this->input->post('description')){
            $data['description'] = $this->input->post('description');
        }
       
		
		return $this->db->insert('pages', $data);
    }
    public function get_pages( $id = FALSE){
       
        if($id === FALSE){  
            $query = $this->db->get('pages');
        return $query->result_array();
            
		  }
        else{
        $query = $this->db->where('id', $id)->get('pages');
            return $query->result_array();
    }
        }
    
    public function update_page($image = false){
          $this->load->helper('url');
        $data = array();
        
        if($image == false){
            //$data['image']="";
        }
        else{
            $data['image']=$image;
        }
   
      

		if($this->input->post('title')){
            $data['title'] = $this->input->post('title');
        }
        /*if($this->input->post('video')){
            $data['video'] = $this->input->post('video');
        }*/
        
        if($this->input->post('description')){
            $data['description'] = $this->input->post('description');
        }
		$user = $this->session->get_userdata();
		
        $this->db->where('id', $this->input->post('id'));
        return $this->db->update('pages', $data); 
    }
    public function getbannername($id = NULL){
        //echo $id;
        //exit;
        $this->load->helper('url');
		$banner=$this->db->where('id', $id)->get('pages');
        
        return $banner->result_array();
    }
   
}
?>