<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Employee_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
	}
	
	//Get all confirmation from tbl_employee` table 
	public function getAllEmployees($userId){
		$this -> db -> select('*');
        $this -> db -> from('tbl_employee');
        $this -> db -> where('emp_active','1');
		$this -> db -> where('emp_user_id',$userId);
        $this -> db -> order_by('emp_id','DESC');
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
	
	//Get employee using emp_id
	public function getEmployeeByUserId($emp_id){
		$this -> db -> select('*');
        $this -> db -> from('tbl_employee');
         $this -> db -> where('emp_active','1');
         $this -> db -> where('emp_id',$emp_id);
        $query = $this -> db -> get();
	    if($query -> num_rows() != 0)
        {
			//	$this->db->last_query();exit;
			return $query->result();
        }
        else
        {
			return false;
        }
		
	}
	
	public function updateEmployee($primaryId,$update_data)
	{
		$this->db->where('emp_id', $primaryId);
	    $this->db->update('tbl_employee', $update_data);
	    return true;
	}
	
	//Add new employee
	public function saveEmployee($update_data)
	{
		$this->db->insert('tbl_employee', $update_data);
	    //$this->db->last_query();exit;
	    return $this->db->insert_id();
	}
	//Delete employee by emp_id
	public function deletePaymentById($emp_id)
	{
		$this->db->where('emp_id', $emp_id);
	    $this->db->delete('tbl_employee');
	    //$this->db->last_query();exit;
	    return true;
	}
	
	//update employee hpurs
	public function updateEmployeeHours($primaryId,$update_data)
	{
		//echo  $primaryId;
		$this->db->where('biz_id', $primaryId);
	    $this->db->update('tbl_business_hour_employee', $update_data);
	    //echo $this->db->last_query();
	    return true;
	}
	
	//Add new employee hours
	public function saveEmployeeHours($update_data)
	{
		$this->db->insert('tbl_business_hour_employee', $update_data);
	    //$this->db->last_query();
	    return true;
	}
	
	//Get employee Hours using emp_id
	public function getEmployeeHoursByUserId($emp_id){
		$this -> db -> select('*');
        $this -> db -> from('tbl_business_hour_employee');
         $this -> db -> where('biz_active','1');
         $this -> db -> where('biz_emp_id',$emp_id);
        $query = $this -> db -> get();
        ///echo $this->db->last_query();exit;
	    if($query -> num_rows() != 0)
        {
			return $query->result();
        }
        else
        {
			return false;
        }
		
	}
	
	
	//Get all aCtIvE Responsibility from  tbl_responsibility 
	public function getAllResponsibility(){
		$this -> db -> select('*');
        $this -> db -> from('tbl_responsibility');
        $this -> db -> where('res_active','1');
        $query = $this -> db -> get();
	    if($query -> num_rows() != 0)
        {
			//	$this->db->last_query();exit;
			return $query->result();
        }
        else
        {
			return false;
        }
		
	}
	
	//Get all aCtIvE Away Message from  tbl_away_message 
	public function getAllAwayMessage(){
		$this -> db -> select('*');
        $this -> db -> from('tbl_away_message');
        $this -> db -> where('away_active','1');
        $query = $this -> db -> get();
	    if($query -> num_rows() != 0)
        {
			//	$this->db->last_query();exit;
			return $query->result();
        }
        else
        {
			return false;
        }
		
	}
	
	//Get all aCtIvE Job Title from  tbl_jobtitle 
	public function getAllJobTitle(){
		$this -> db -> select('*');
        $this -> db -> from('tbl_jobtitle');
        $this -> db -> where('job_active','1');
        $query = $this -> db -> get();
	    if($query -> num_rows() != 0)
        {
			//	$this->db->last_query();exit;
			return $query->result();
        }
        else
        {
			return false;
        }
		
	}
	
	
	//Get all aCtIvE Call Back Msg from  tbl_callback_message 
	public function getAllCallBackMsg(){
		$this -> db -> select('*');
        $this -> db -> from('tbl_callback_message');
        $this -> db -> where('callback_active','1');
        $query = $this -> db -> get();
	    if($query -> num_rows() != 0)
        {
			//	$this->db->last_query();exit;
			return $query->result();
        }
        else
        {
			return false;
        }
		
	}
	
	//Get employee Hours using user_id
	public function getEmployeeHoursByUserIduser_id($user_id){
		$this -> db -> select('*');
        $this -> db -> from('tbl_business_hour_employee');
         $this -> db -> where('biz_active','1');
         $this -> db -> where('biz_user_id',$user_id);
        $query = $this -> db -> get();
        //echo $this->db->last_query();exit;
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
