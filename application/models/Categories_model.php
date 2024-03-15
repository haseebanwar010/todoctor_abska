<?php
class Categories_model extends CI_Model {
     public function __construct()
    {
        $this->load->database();
    }
    public function set_category($image = false){
        $this->load->helper('url');
        $data = array();

        if($this->input->post('name')){
            $data['name'] = $this->input->post('name');
        }
       
		return $this->db->insert('categories', $data);
    }
    public function get_categories( $id = FALSE){
       
        if($id === FALSE){  
            $query = $this->db->get('categories');
        return $query->result_array();
            
		  }
        else{
        $query = $this->db->where('id', $id)->get('categories');
            return $query->result_array();
    }
        }
    
    public function update_category($image = false){
          $this->load->helper('url');
        $data = array();
        
   
      

		if($this->input->post('name')){
            $data['name'] = $this->input->post('name');
        }
        $this->db->where('id', $this->input->post('id'));
        return $this->db->update('categories', $data); 
    }
    public function delete_category($id = NULL)
    {
        $this->load->helper('url');
		$this->db->where('id', $id);
		return $this->db->delete('categories'); 
    }
   
}
?>