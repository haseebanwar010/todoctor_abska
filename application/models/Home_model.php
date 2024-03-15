<?php
class Home_model extends CI_Model {
     public function __construct()
    {
        $this->load->database();
    }
    public function get_banners(){
        $query = $this->db->get('banners');
        return $query->result_array();
    }
    public function get_countries(){
        $query = $this->db->get('countries');
        return $query->result_array();
    }
    public function get_cities(){
        $query = $this->db->get('cities');
        return $query->result_array();
    }
    public function get_categories(){
        $query = $this->db->get('categories');
        return $query->result_array();
    }
    

}
?>
