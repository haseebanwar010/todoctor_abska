<?php
class Users_model extends CI_Model {
     public function __construct()
    {
        $this->load->database();
    }
    public function set_user(){
        $data=array();
        
        if($this->input->post('email')){
            $data['email']=$this->input->post('email');
        }
        if($this->input->post('password')){
            $data['password']=md5($this->input->post('password'));
        }
        if($this->input->post('name')){
            $data['name']=$this->input->post('name');
        }
        if($this->input->post('address')){
            $data['address']=$this->input->post('address');
        }
        return $this->db->insert('frontend_users', $data);
        
    }
    public function authenticate_user(){
        $this->db->from('frontend_users');
        $this->db->where('status', 1);
        $this->db->where('email', $this->input->post('email'));
        $this->db->where('password', md5($this->input->post('password')));
        $query = $this->db->get();
        return $query->row_array();
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
    public function update_users_profile(){
        $data=array();
        if($this->input->post('email')){
            $data['email']=$this->input->post('email');
        }
        if($this->input->post('name')){
            $data['name']=$this->input->post('name');
        }
        if($this->input->post('address')){
            $data['address']=$this->input->post('address');
        }
        $this->db->where('id',  $this->input->post('id'));
        return $this->db->update('frontend_users', $data); 
    }
    public function check_by_email($email){
        $query = $this->db->get_where('frontend_users', array('frontend_users.email' => $email));		
        return $query->row_array();
    }
    public function get_frontendusers($id=false){
        if($id==false){
            $query = $this->db->get('frontend_users');
        return $query->result_array();
        }else{
            
        
            $query = $this->db->where('frontend_users.id', $id)->get('frontend_users');
        return $query->row_array();
        }
    }
    public function get_appointments_byuserid($userid=false){
        $this->db->where('user_id', $userid);
        $query = $this->db->get('doc_appointments');
        return $query->result_array();
    }
    public function updatepassword($email,$password){
        $data=array();
        $data['password']=md5($password);
        $this->db->where('email', $email);
        return $this->db->update('frontend_users', $data); 
    }
    public function updateUserPassword($id)
	{
		$this->load->helper('url');
		$data = array();
		if($this->input->post('new_password'))
		{
			$data['password'] = md5($this->input->post('new_password'));
		}			
			$this->db->where('id', $id);
			return $this->db->update('frontend_users', $data); 
    }
    public function checkPassword($email=FALSE,$pass=FALSE)
 	{
	   $this -> db -> select('*');
	   $this -> db -> from('frontend_users');
	   $this -> db -> where('email', $email);
	   $this -> db -> where('password', md5($pass));
	   $this -> db -> where('status', 1);
	   $this -> db -> limit(1);
	   $query = $this -> db -> get();
 		if($query -> num_rows() == 1)
   		{
     		return true;
   		}
   		else
   		{
     		return false;
   		}
 	}
}
?>
