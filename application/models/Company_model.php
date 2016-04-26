<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Company_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}
	public function add_user()
	{
	
		$userQuery = $this->db->get_where('tbl_user_registration', array('user_email' => $this->input->post('email')));
		//echo $query->num_rows(); exit;
		
		if( $userQuery->num_rows() > 0)
		{
			$this->session->set_flashdata('signupError', 'Email already exist.');
			return false;
		}
		else
		{
			//echo implode(',', $this->input->post('low'));
			//print_r($this->input->post()); exit;
			$data=array(
				'user_firstname'=>$this->input->post('firstname'),
				'user_lastname'=>$this->input->post('lastname'),
				'user_email'=>$this->input->post('email'),
				'user_password'=>md5($this->input->post('password')),
				'user_mobile'=>$this->input->post('mobile'),
				'user_low'=>implode(',', $this->input->post('low')),
				'user_role'=>2,
				'user_created_by'=>1,
				'user_modified_by'=>1,
				'user_active'=>1
			);
			$this->db->insert('tbl_user_registration',$data);
		}
		return true;
		
	}
	
	//Get all confiration from tbl_configurations` table 
	public function getAllConfigration(){
		$this -> db -> select('*');
        $this -> db -> from('tbl_company');
        $this -> db -> where('com_active','1');
		$this -> db -> where('com_cname !=',' ');
        $query = $this -> db -> get();
	    if($query -> num_rows() != 0)
        {
          return $query->result();
        }
        else
        {
          return false;
        }
		//echo $query->num_rows(); exit;
		
		
	}
	
	//Get company using user id
	public function getCompanyByUserId($userId){
		$this -> db -> select('*');
        $this -> db -> from('tbl_company');
         $this -> db -> where('com_active','1');
         $this -> db -> where('com_user_id',$userId);
        $query = $this -> db -> get();
	    if($query -> num_rows() != 0)
        {
			return $query->result();
        }
        else
        {
			//if data is not exit on table then insert one row
			$con_data = array(
				'com_user_id' => $userId,
				'com_active'=>1,
				'com_created_by'=>$userId,
				'com_created'=>date('Y-m-d H:i:s')
				);
			$this->db->insert('tbl_company', $con_data);
			redirect('company');
        }
		
	}
	
	public function updateCompany($primaryId,$update_data)
	{
		$this->db->where('com_id', $primaryId);
	    $this->db->update('tbl_company', $update_data);
	    //$this->db->last_query();exit;
	    return true;
	}
	
	
	
	//Get All County
	public function getAllCountry(){
		$this -> db -> select('*');
        $this -> db -> from('tbl_country');
         $this -> db -> where('status','1');
         $query = $this -> db -> get();
	    if($query -> num_rows() != 0)
        {
			return $query->result();
        }
        else
        {
			return false;
        }
		
	}
	
	//Get country base on id
	public function getCountryById($id){
		$this -> db -> select('*');
        $this -> db -> from('tbl_country');
         $this -> db -> where('status','1');
         $this -> db -> where('country_id',$id);
         $query = $this -> db -> get();
	    if($query -> num_rows() != 0)
        {
			return $query->result();
        }
        else
        {
			return false;
        }
		
	}
	
	
}
?>
