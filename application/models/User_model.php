<?php
class User_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
				$this->load->library('session');
        }
		public function get_users($user_id = FALSE)
		{
				if ($user_id === FALSE)
				{
					$this->db->select('*');
					$this->db->from('users');
					
					$query = $this->db->get();
					return $query->result_array();
				}
				
				$this->db->select('*');
				
				$query = $this->db->get_where('users', array('users.id' => $user_id));			
				
				return $query->row_array();
		}
	public function set_adminuser(){
		$this->load->helper('url');
		$data = array();




		if($this->input->post('name')){
			$data['name'] = $this->input->post('name');
		}
		if($this->input->post('email')){
			$data['email'] = $this->input->post('email');
		}
		if($this->input->post('phone')){
			$data['phone'] = $this->input->post('phone');
		}
		if($this->input->post('password')){
			$data['pass'] = md5($this->input->post('password'));
		}
		if($this->input->post('address')){
			$data['address'] = $this->input->post('address');
		}
		if($this->input->post('role')){
			$data['role'] = $this->input->post('role');
		}
		$authorization=array();
		if($this->input->post('pages')){
			$authorization['pages'] = 1;
		}
		else{
			$authorization['pages'] = 0;
		}

		if($this->input->post('banners')){
			$authorization['banners'] = 1;
		}
		else{
			$authorization['banners'] = 0;
		}
		if($this->input->post('services')){
			$authorization['services'] = 1;
		}
		else{
			$authorization['services'] = 0;
		}

		if($this->input->post('cservices')){
			$authorization['cservices'] = 1;
		}
		else{
			$authorization['cservices'] = 0;
		}
		if($this->input->post('customers')){
			$authorization['customers'] = 1;
		}
		else{
			$authorization['customers'] = 0;
		}

		

		$data['status']=1;
		$data['city']="Lahore";
		$data['authorization']=serialize($authorization);




		return $this->db->insert('users', $data);
	}


	public function update_adminuser(){
		$this->load->helper('url');
		$data = array();




		if($this->input->post('name')){
			$data['name'] = $this->input->post('name');
		}
		if($this->input->post('email')){
			$data['email'] = $this->input->post('email');
		}
		if($this->input->post('phone')){
			$data['phone'] = $this->input->post('phone');
		}
		if($this->input->post('password') && $this->input->post('password')!=""){
			$data['pass'] = md5($this->input->post('password'));
		}
		if($this->input->post('address')){
			$data['address'] = $this->input->post('address');
		}
		if($this->input->post('role')){
			$data['role'] = $this->input->post('role');
		}
		$authorization=array();
		if($this->input->post('pages')){
			$authorization['pages'] = 1;
		}
		else{
			$authorization['pages'] = 0;
		}

		if($this->input->post('banners')){
			$authorization['banners'] = 1;
		}
		else{
			$authorization['banners'] = 0;
		}
		if($this->input->post('services')){
			$authorization['services'] = 1;
		}
		else{
			$authorization['services'] = 0;
		}

		if($this->input->post('cservices')){
			$authorization['cservices'] = 1;
		}
		else{
			$authorization['cservices'] = 0;
		}
		if($this->input->post('customers')){
			$authorization['customers'] = 1;
		}
		else{
			$authorization['customers'] = 0;
		}

		//$data['status']=1;
		//$data['city']="Lahore";
		$data['authorization']=serialize($authorization);



		$this->db->where('id',$this->input->post('id'));
		return $this->db->update('users',$data);

	}
	
	public function get_admin_users($user_id = FALSE)
		{
			if($user_id==FALSE) {
				$this->db->select('*');
				$this->db->from('users');
				$this->db->where('status', 1);
				$query = $this->db->get();
				return $query->result_array();
			}
			else{
				$this->db->select('*');
				$this->db->from('users');
				$this->db->where('status', 1);
				$this->db->where('id',$user_id);
				$query = $this->db->get();
				return $query->result_array();
			}
		}
  
		public function get_user_by_email($email)
		{
				
				$this->db->select('*');
				
				$query = $this->db->get_where('users', array('users.email' => $email));			
				
				return $query->row_array();
		}
		public function validate(){
			// grab user input
			 $username = $this->security->xss_clean($this->input->post('username'));
			 $password = $this->security->xss_clean(md5($this->input->post('password')));
			
			// Prep the query
			$this->db->where('name', $username);
			$this->db->where('pass', $password);
			
			
			// Run the query
			//echo $querytext = "SELECT * FROM users WHERE name = '".$username."' AND pass = '".$password."'";
			//$query = $this->db->query($querytext);

			$query = $this->db->get('users');
			$res = $query->row_array();
			//var_dump($res); 
            //exit;
			// Let's check if there are any results
			if(!empty($res))
			{

				
				// If there is a user, then create session data
				$row = $query->row();
				//$authorization=unserialize($row->authorization);

				$this->db->select('*');
				$query = $this->db->get_where('users', array('id' => $res['id']));
				$pers = $query->row_array();
				if(isset($authorization) && !empty($authorization)){
					$data = array(
						'userid' => $row->id,
						'username' => $row->name,
						'user_role' => $row->role,
						'user_city' => $row->city,
						'user_commision' => $row->commision,
						'branch_id' => 0,
						'type' => 1,
						'per' => $pers,
						'validated' => true,
						'auth_pages'=> $authorization['pages'],
						'auth_banners'=> $authorization['banners'],
						'auth_services'=> $authorization['services'],
						'auth_cservices'=> $authorization['cservices'],
						'auth_customers'=> $authorization['customers']
					);
				}
				else{
					$data = array(
						'userid' => $row->id,
						'username' => $row->name,
						'user_role' => $row->role,
						'user_city' => $row->city,
						'user_commision' => $row->commision,
						'branch_id' => 0,
						'type' => 1,
						'per' => $pers,
						'validated' => true
					);
				}

				$this->session->set_userdata($data);
				
				return true;
			}
			return false;
		}
		public function validate_admin_pass(){
			// grab user input
			 $id = $this->security->xss_clean($this->input->post('staff_id'));
			  $password = $this->security->xss_clean(md5($this->input->post('old_password')));
			
			// Prep the query
			$this->db->where('id', $id);
			$this->db->where('pass', $password);
			
			
			 $query = $this->db->get('users');
			$res = $query->row_array();
						
			// Let's check if there are any results
			if(!empty($res))
			{
				return true;
			}
		}
		public function validate_email(){
			// grab user input
			 $email = $this->security->xss_clean($this->input->post('email'));
			
			// Prep the query
			
			$this->db->where('email', $email);
			
			
			 $query = $this->db->get('users');
			$res = $query->row_array();
						
			// Let's check if there are any results
			if(!empty($res))
			{				
				return true;
			}
		}
		public function randomPassword() {
			$alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
			$pass = array(); //remember to declare $pass as an array
			$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
			for ($i = 0; $i < 8; $i++) {
				$n = rand(0, $alphaLength);
				$pass[] = $alphabet[$n];
			}
			return implode($pass); //turn the array into a string
		}
		public function update_admin_password_by_email($pass)
		{
			$this->load->helper('url');
			$data = array();
			$data['pass'] = md5($pass);
			$this->db->where('email', $this->input->post('email'));
			return $this->db->update('users', $data); 
		}
		public function update_admin_password()
		{
			$this->load->helper('url');
			$data = array();
			
			
			if($this->input->post('new_password')){
				$data['pass'] = md5($this->input->post('new_password'));
			}			
			
			
			$this->db->where('id', $this->input->post('staff_id'));
			return $this->db->update('users', $data); 
		}
	
	public function delete_adminuser($id = NULL)
    {
        $this->load->helper('url');
		$this->db->where('id', $id);
		return $this->db->delete('users');
    }
}