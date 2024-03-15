<?php
class Doctor_model extends CI_Model {
     public function __construct()
    {
        $this->load->database();
    }
    public function set_doctor($image=false){
        $data=array();
        if($image != false){
            $data['image']=$image;
        }
        if($this->input->post('email')){
            $data['email']=$this->input->post('email');
        }
        if($this->input->post('password')){
            $data['password']=md5($this->input->post('password'));
        }
        if($this->input->post('first_name')){
            $data['first_name']=$this->input->post('first_name');
        }
        if($this->input->post('last_name')){
            $data['last_name']=$this->input->post('last_name');
        }
        if($this->input->post('display_name')){
            $data['display_name']=$this->input->post('display_name');
        }
        if($this->input->post('zip_code')){
            $data['zip_code']=$this->input->post('zip_code');
        }
        if($this->input->post('phone')){
            $data['phone']=$this->input->post('phone');
        }
        if($this->input->post('city')){
            $data['city']=$this->input->post('city');
        }
        if($this->input->post('country')){
            $data['country']=$this->input->post('country');
        }
        if($this->input->post('address')){
            $data['address']=$this->input->post('address');
        }
        if($this->input->post('category')){
            $data['category']=implode(",",$this->input->post('category'));
        }
        if($this->input->post('description')){
            $data['description']=$this->input->post('description');
        }
        if($this->input->post('aboutus')){
            $data['aboutus']=$this->input->post('aboutus');
        }
        if($this->input->post('education')){
            $data['education']=$this->input->post('education');
        }
        if($this->input->post('biography')){
            $data['biography']=$this->input->post('biography');
        }
        if($this->input->post('website')){
            $data['website']=$this->input->post('website');
        }
        if($this->input->post('availability') && !empty($this->input->post('availability'))){
            $data['availability']=implode(",",$this->input->post('availability'));
        }
        if($this->input->post('payments') && !empty($this->input->post('payments'))){
            $data['payments']=implode(", ",$this->input->post('payments'));
        }
        if($this->input->post('facebook')){
            $data['facebook']=$this->input->post('facebook');
        }
        if($this->input->post('twitter')){
            $data['twitter']=$this->input->post('twitter');
        }
        if($this->input->post('google_plus')){
            $data['google_plus']=$this->input->post('google_plus');
        }
        return $this->db->insert('doctors', $data);
        
    }
    public function approve_doctor($doctorid){
            $data['status']=1;
        $this->db->where('id', $doctorid);
			return $this->db->update('doctors', $data); 
    }
    public function update_doctor_profile($image){
        $data=array();
        if($image != ""){
            $data['image']=$image;
        }
        if($this->input->post('email')){
            $data['email']=$this->input->post('email');
        }
        if($this->input->post('first_name')){
            $data['first_name']=$this->input->post('first_name');
        }
        if($this->input->post('last_name')){
            $data['last_name']=$this->input->post('last_name');
        }
        if($this->input->post('display_name')){
            $data['display_name']=$this->input->post('display_name');
        }
        if($this->input->post('zip_code')){
            $data['zip_code']=$this->input->post('zip_code');
        }
        if($this->input->post('phone')){
            $data['phone']=$this->input->post('phone');
        }
        if($this->input->post('city')){
            $data['city']=$this->input->post('city');
        }
        if($this->input->post('country')){
            $data['country']=$this->input->post('country');
        }
        if($this->input->post('address')){
            $data['address']=$this->input->post('address');
        }
        if($this->input->post('category') && !empty($this->input->post('category'))){
            $data['category']=implode(",",$this->input->post('category'));
        }
        if($this->input->post('description')){
            $data['description']=$this->input->post('description');
        }
        if($this->input->post('aboutus')){
            $data['aboutus']=$this->input->post('aboutus');
        }
        if($this->input->post('education')){
            $data['education']=$this->input->post('education');
        }
        if($this->input->post('biography')){
            $data['biography']=$this->input->post('biography');
        }
        if($this->input->post('website')){
            $data['website']=$this->input->post('website');
        }
        if($this->input->post('availability') && !empty($this->input->post('availability'))){
            $data['availability']=implode(",",$this->input->post('availability'));
        }
        if($this->input->post('facebook')){
            $data['facebook']=$this->input->post('facebook');
        }
        if($this->input->post('twitter')){
            $data['twitter']=$this->input->post('twitter');
        }
        if($this->input->post('google_plus')){
            $data['google_plus']=$this->input->post('google_plus');
        }
        if($this->input->post('start_time')){
            $data['start_time']=$this->input->post('start_time');
        }
        if($this->input->post('end_time')){
            $data['end_time']=$this->input->post('end_time');
        }
        if($this->input->post('weekend_open')){
            $data['weekend_open']=$this->input->post('weekend_open');
        }
        $this->db->where('id', $this->input->post('id'));
			return $this->db->update('doctors', $data); 
        
    }
    public function authenticate_doctor(){
        $this->db->from('doctors');
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
    public function get_doctors($id=false){
        if($id==false){
            $query = $this->db->get('doctors');
        return $query->result_array();
        }else{
            
            $this->db->select('doctors.* , countries.name as country_name, cities.name as city_name, categories.name as category_name');
        $this->db->join('countries', 'doctors.country = countries.id', 'LEFT');
        $this->db->join('cities', 'doctors.city = cities.id', 'LEFT');
        $this->db->join('categories', 'doctors.category = categories.id', 'LEFT');
            $query = $this->db->where('doctors.id', $id)->get('doctors');
        return $query->row_array();
        }
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
			return $this->db->update('doctors', $data); 
    }
    public function checkPassword($email=FALSE,$pass=FALSE)
 	{
	   $this -> db -> select('*');
	   $this -> db -> from('doctors');
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
    public function get_doctors_listing($catid){
         $this->db->select('doctors.* , countries.name as country_name, cities.name as city_name, categories.name as category_name');
        $this->db->join('countries', 'doctors.country = countries.id', 'LEFT');
        $this->db->join('cities', 'doctors.city = cities.id', 'LEFT');
        $this->db->join('categories', 'doctors.category = categories.id', 'LEFT');
        if($this->input->post('zip_code')){
            $this->db->where('doctors.zip_code', $this->input->post('zip_code'));
        }
        if($this->input->post('city')){
            $this->db->where('doctors.city', $this->input->post('city'));
        }
        if($this->input->post('category')){
            $this->db->like('doctors.category', $this->input->post('category'));
        }
        $this->db->where('doctors.status', 1);
//        if($catid!=false){
//            $this->db->where('doctors.category', $catid);
//        }
        $query = $this->db->get('doctors');
        return $query->result_array();
    }
    public function get_cat_counter($catid){
        $this->db->where('category', $catid);
        $query = $this->db->get('doctors');
        return $query->num_rows();
    }
    public function get_doctor_byid($id=false){
        $this->db->select('doctors.* , countries.name as country_name, cities.name as city_name, categories.name as category_name');
        $this->db->join('countries', 'doctors.country = countries.id', 'LEFT');
        $this->db->join('cities', 'doctors.city = cities.id', 'LEFT');
        $this->db->join('categories', 'doctors.category = categories.id', 'LEFT');
        $this->db->where('doctors.id', $id);
        $query = $this->db->get('doctors');
        return $query->row_array();
    }
    public function get_appointments_bydoctorid($id=false){
        $this->db->where('doctor_id', $id);
        $query = $this->db->get('doc_appointments');
        return $query->result_array();
    }
    public function check_by_email($email){
        $query = $this->db->get_where('doctors', array('doctors.email' => $email));		
        return $query->row_array();
    }
    public function updatepassword($email,$password){
        $data=array();
        $data['password']=md5($password);
        $this->db->where('email', $email);
        return $this->db->update('doctors', $data); 
    }
    public function submitbooking(){
        $data=array();
        
        $data['doctor_id']=$this->input->post('doctor_id');
        $data['user_id']=$_SESSION['frontuser_session']['id'];
        $data['user_name']=$this->input->post('patient_name');
        $data['start_time']=$this->input->post('start_time');
        $data['end_time']=$this->input->post('end_time');
//        $data['about_disease']=$this->input->post('about_disease');
        $data['patient_email']=$this->input->post('patient_email');
        $data['patient_phone']=$this->input->post('patient_phone');
        $data['patient_name']=$this->input->post('patient_name');
        if($this->input->post('office_visit_bit')){
            $data['office_visit_bit']=$this->input->post('office_visit_bit');
        }
        if($this->input->post('office_visit_detail')){
            $data['office_visit_detail']=$this->input->post('office_visit_detail');
        }
        if($this->input->post('procedure_bit')){
            $data['procedure_bit']=$this->input->post('procedure_bit');
        }
        if($this->input->post('procedure_detail')){
            $data['procedure_detail']=$this->input->post('procedure_detail');
        }
        
        if($this->input->post('labwork_bit')){
            $data['labwork_bit']=$this->input->post('labwork_bit');
        }
        if($this->input->post('labwork_detail')){
            $data['labwork_detail']=$this->input->post('labwork_detail');
        }
        if($this->input->post('medicine_bit')){
            $data['medicine_bit']=$this->input->post('medicine_bit');
        }
        if($this->input->post('medicine_detail')){
            $data['medicine_detail']=$this->input->post('medicine_detail');
        }
        if($this->input->post('immunization_bit')){
            $data['immunization_bit']=$this->input->post('immunization_bit');
        }
        if($this->input->post('immunization_detail')){
            $data['immunization_detail']=$this->input->post('immunization_detail');
        }
        
        return $this->db->insert('doc_appointments', $data);
    }
    public function doctorappointments_json($doctorid){
        $this->db->where('doctor_id', $doctorid);
        $query = $this->db->get('doc_appointments');
        return $query->result_array();
    }
    public function approveappointment($id){
        $data['status']=1;
        $this->db->where('id', $id);
        return $this->db->update('doc_appointments', $data);
    }
    public function rejectappointment($id){
       $this->db->where('id', $id);
		return $this->db->delete('doc_appointments'); 
    }
    public function get_specificuserrating($userid,$doctorid){
        $this->db->where('doctor_id', $doctorid);
        $this->db->where('user_id', $userid);
        $query = $this->db->get('doctor_ratings');
        return $query->row_array();
    }
    public function get_active_appointments($userid,$doctorid){
        $this->db->where('doctor_id', $doctorid);
        $this->db->where('user_id', $userid);
        $this->db->where('status', 1);
        $query = $this->db->get('doc_appointments');
        return $query->result_array();
    }
    public function get_specificdoctorrating($doctorid){
        $this->db->where('doctor_id', $doctorid);
        $query = $this->db->get('doctor_ratings');
        return $query->result_array();
    }
    public function submitrating(){
        $data=array();
        $data['user_id']=$_SESSION['frontuser_session']['id'];
        $data['doctor_id']=$this->input->post('doctor_id');
        $data['rating_value']=$this->input->post('rating_value');
        return $this->db->insert('doctor_ratings', $data);
    }
}
?>
