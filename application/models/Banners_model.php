<?php
class Banners_model extends CI_Model {
     public function __construct()
    {
        $this->load->database();
    }
    public function set_banner($image = false)
    {
        $data = array();
		$data['image'] = $image;
//		$data['title'] = $this->input->post('title');
//		$data['sub_title'] = $this->input->post('sub_title');
//		$data['video'] = $this->input->post('video');
//		$data['description'] = $this->input->post('description');
		return $this->db->insert('banners', $data);
    }
    public function get_banners( $id = FALSE)
    {
        if($id === FALSE){  
            $query = $this->db->get('banners');
            return $query->result_array(); 
        }
        else{
        $query = $this->db->where('id', $id)->get('banners');
            return $query->result_array();
        }
    }
    public function update_banner($image = false)
    {
        $data = array();
		if($image!='')
		{
			$data['image'] = $image;
		}
        $this->db->where('id', $this->input->post('id'));
        return $this->db->update('banners', $data); 
    }
    public function getbannername($id = NULL){
		$banner=$this->db->where('id', $id)->get('banners');
        return $banner->result_array();
    }
    public function delete_banner($id = NULL)
    {
        $this->load->helper('url');
		$this->db->where('id', $id);
		return $this->db->delete('banners'); 
    }
}
?>