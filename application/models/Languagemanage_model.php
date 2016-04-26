<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Languagemanage_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		
	}
	
	//Get all Sign in label/text data  from tbl_lang_signin` table 
	public function getSigninData($lang){
		$this -> db -> select('*');
        $this -> db -> from('tbl_lang_signin');
        $this -> db -> where('lan_status','Active');
        $this -> db -> where('lan_lang_id',$lang);
        $query = $this -> db -> get();
		//echo	$this->db->last_query();exit;
	    if($query -> num_rows() != 0)
        {
          return $query->result();
        }
        else
        {
          return false;
        }
	}
	//Get all Sign in label/text data  from tbl_lang_signin` table 
	
	//Update the data for singin and signup page
	public function updateSignup($con_id,$update_data)
	{
		//print_r($this->input->post()); exit;
		$this->db->where('lan_sign_id', $con_id);
	    $this->db->update('tbl_lang_signin', $update_data);
	    return true;
	}
	//Update the data for singin and signup page
	
	
	//Get all active language 
	public function getActiveLanguage(){
		$this -> db -> select('*');
        $this -> db -> from('tbl_language');
         $this -> db -> where('lan_status','Active');
        $query = $this -> db -> get();
           //echo	$this->db->last_query();exit;
	    if($query -> num_rows() != 0)
        {
          return $query->result();
        }
        else
        {
          return false;
        }
	}
	//Get all active language	
	
	
	public function insertBusinessHourDetail($userId,$insert_data)
	{
	    $this->db->insert('tbl_business_hour', $insert_data);
	    return true;
	}
	
	
	
	//Sign Up page/////////////////////////////////////////////////
	//Get all Sign Up label/text data  from tbl_lang_signin` table 
	public function getSignupData($lang){
		$this -> db -> select('*');
        $this -> db -> from('tbl_lang_signup');
        $this -> db -> where('lan_status','Active');
        $this -> db -> where('lan_lang_id',$lang);
        $query = $this -> db -> get();
		//echo	$this->db->last_query();exit;
	    if($query -> num_rows() != 0)
        {
          return $query->result();
        }
        else
        {
          return false;
        }
	}
	
	//Get all Sign Up label/text data  from tbl_lang_signup` table 
	//Update the data for signup page
	public function updateSignuppage($con_id,$update_data)
	{
		//print_r($this->input->post()); exit;
		$this->db->where('lan_sign_id', $con_id);
	    $this->db->update('tbl_lang_signup', $update_data);
	    return true;
	}
	//Update the data for signup page
	
	
	
	//Dashboard & Menu page/////////////////////////////////////////////////
	//Get all Sign Up label/text data  from tbl_lang_dashboard` table 
	public function getDashboardData($lang){
		$this -> db -> select('*');
        $this -> db -> from('tbl_lang_dashboard');
        $this -> db -> where('lan_status','Active');
        $this -> db -> where('lan_lang_id',$lang);
        $query = $this -> db -> get();
		//echo	$this->db->last_query();exit;
	    if($query -> num_rows() != 0)
        {
          return $query->result();
        }
        else
        {
          return false;
        }
	}
	
	//Get all Dashboard & Menu page label/text data  from tbl_lang_dashboard` table 
	//Update the data for  Dashboard & Menu page
	public function updateDashboardpage($con_id,$update_data)
	{
		//print_r($this->input->post()); exit;
		$this->db->where('lan_sign_id', $con_id);
	    $this->db->update('tbl_lang_dashboard', $update_data);
	    return true;
	}
	//Update the data for  Dashboard & Menu page
	
	
	
	//Left Menu page/////////////////////////////////////////////////
	//Get all Sign Up label/text data  from tbl_lang_dashboard` table 
	public function getLeftmenuData($lang){
		$this -> db -> select('*');
        $this -> db -> from('tbl_lang_leftmenu');
        $this -> db -> where('lan_status','Active');
        $this -> db -> where('lan_lang_id',$lang);
        $query = $this -> db -> get();
		//echo	$this->db->last_query();exit;
	    if($query -> num_rows() != 0)
        {
          return $query->result();
        }
        else
        {
          return false;
        }
	}
	
	//Get all Dashboard & Menu page label/text data  from tbl_lang_dashboard` table 
	//Update the data for  Dashboard & Menu page
	public function updateLeftmenupage($con_id,$update_data)
	{
		//print_r($this->input->post()); exit;
		$this->db->where('lan_sign_id', $con_id);
	    $this->db->update('tbl_lang_leftmenu', $update_data);
	    return true;
	}
	//Update the data for  Left Menu
	
	
	
	//configurations page/////////////////////////////////////////////////
	//Get all configurations label/text data  from tbl_lang_configurations` table 
	public function getConfigurationsData($lang){
		$this -> db -> select('*');
        $this -> db -> from('tbl_lang_configurations');
        $this -> db -> where('lan_status','Active');
        $this -> db -> where('lan_lang_id',$lang);
        $query = $this -> db -> get();
		//echo	$this->db->last_query();exit;
	    if($query -> num_rows() != 0)
        {
          return $query->result();
        }
        else
        {
          return false;
        }
	}
	
	//Get all configurations label/text data  from tbl_lang_configurations` table 
	//Update the data for  configurations page
	public function updateConfigurationspage($con_id,$update_data)
	{
		//print_r($this->input->post()); exit;
		$this->db->where('lan_sign_id', $con_id);
	    $this->db->update('tbl_lang_configurations', $update_data);
	    return true;
	}
	//Update the data for configurations page
	
	
	
	
	
	//Days page/////////////////////////////////////////////////
	//Get all days label/text data  from tbl_lang_days` table 
	public function getDaysData($lang){
		$this -> db -> select('*');
        $this -> db -> from('tbl_lang_days');
        $this -> db -> where('lan_status','Active');
        $this -> db -> where('lan_lang_id',$lang);
        $query = $this -> db -> get();
		//echo	$this->db->last_query();exit;
	    if($query -> num_rows() != 0)
        {
          return $query->result();
        }
        else
        {
          return false;
        }
	}
	
	//Get all configurations label/text data  from tbl_lang_configurations` table 
	//Update the data for  configurations page
	public function updateDayspage($con_id,$update_data)
	{
		//print_r($this->input->post()); exit;
		$this->db->where('lan_sign_id', $con_id);
	    $this->db->update('tbl_lang_days', $update_data);
	    return true;
	}
	//Update the data for configurations page
	
	
	//Calls page/////////////////////////////////////////////////
	//Get all call label/text data  from tbl_lang_call_section` table 
	public function getCallsData($lang){
		$this -> db -> select('*');
        $this -> db -> from('tbl_lang_call_section');
        $this -> db -> where('lan_status','Active');
        $this -> db -> where('lan_lang_id',$lang);
        $query = $this -> db -> get();
		//echo	$this->db->last_query();exit;
	    if($query -> num_rows() != 0)
        {
          return $query->result();
        }
        else
        {
          return false;
        }
	}
	
	//Get all call label/text data  from tbl_lang_call_section` table 
	//Update the data for  call page
	public function updateCallspage($con_id,$update_data)
	{
		//print_r($this->input->post()); exit;
		$this->db->where('lan_sign_id', $con_id);
	    $this->db->update('tbl_lang_call_section', $update_data);
	    //echo $this->db->last_query();exit;
	    return true;
	}
	//Update the data for  call page	



	//Company page/////////////////////////////////////////////////
	//Get all days label/text data  from tbl_lang_company` table 
	public function getCompanyData($lang)
	{
		$this -> db -> select('*');
        $this -> db -> from('tbl_lang_days');
        $this -> db -> where('lan_status','Active');
        $this -> db -> where('lan_lang_id',$lang);
        $query = $this -> db -> get();
		//echo	$this->db->last_query();exit;
	    if($query -> num_rows() != 0)
        {
          return $query->result();
        }
        else
        {
          return false;
        }
	}
	
	//Get all configurations label/text data  from tbl_lang_configurations` table 
	//Update the data for  configurations page
	public function updateCompanypage($con_id,$update_data)
	{
		//print_r($this->input->post()); exit;
		$this->db->where('lan_sign_id', $con_id);
	    $this->db->update('tbl_lang_days', $update_data);
	    return true;
	}
	//Update the data for configurations page
}
?>
