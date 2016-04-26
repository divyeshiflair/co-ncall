<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Configurations_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('employee_model','empModel');
	}
	
	//Get all confiration from tbl_configurations` table 
	public function getAllConfigration(){
		$this -> db -> select('*');
        $this -> db -> from('tbl_configurations');
         $this -> db -> where('con_active','1');
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
	
	//Get configuration from tbl_configurations` table 
	public function getConfigrationByUserId($userId){
		$this -> db -> select('*');
        $this -> db -> from('tbl_configurations');
         $this -> db -> where('con_active','1');
         $this -> db -> where('con_user_id',$userId);
        $query = $this -> db -> get();
        //echo	$this->db->last_query();exit;
	    if($query -> num_rows() != 0)
        {
          return $query->result();
              
        }
        else
        {
			//if data is not exit on table then insert one row
			$con_data = array(
				'con_user_id' => $userId,
				'con_active'=>1,
				'con_created_by'=>$userId,
				'con_created'=>date('Y-m-d H:i:s')
				);
			$this->db->insert('tbl_configurations', $con_data);
			
            redirect('configurations');
        }
    
		//echo $query->num_rows(); exit;
		
		
	}
	//Get employee Hours using emp_id
	public function getConfigEmployeeHoursByUserId($userId){
		$this -> db -> select('*');
        $this -> db -> from('tbl_business_hour_employee');
         $this -> db -> where('biz_active','1');
         $this -> db -> where('biz_user_id',$userId);
        $query = $this -> db -> get();
	    if($query -> num_rows() != 0)
        {
			//	$this->db->last_query();exit;
			return $query->result();
        }
        else
        {
			//Code for normal hour :: Start
			$weekdays = array("Monday", "Tuesday", "Wednesday", "Thursday","Friday","Saturday","Sunday"); 
			foreach($weekdays as $weekdays){
					$update_Sundata=array(
						'biz_user_id'=>$userId,
						'biz_user_type'=>1,
						'biz_day'=>'',
						'biz_day_from'=>'',
						'biz_day_to'=>'',
						'biz_created'=>date('Y-m-d H:i:s'),
						'biz_created_by'=>$userId,
						'biz_active'=>1
						);
					$result=$this->empModel->saveEmployeeHours($update_Sundata);
				
			}
			//Code for normal hour :: Start
			
			
			//Code for lunch hour :: Start
			$lunch_Data=array(
						'biz_user_id'=>$userId,
						'biz_day'=>'',
						'biz_user_type'=>1,
						'biz_lunch_from'=>'',
						'biz_lunch_to'=>'',
						'biz_created'=>date('Y-m-d H:i:s'),
						'biz_created_by'=>$userId,
						'biz_active'=>1
						);
					$resultLunch=$this->empModel->saveEmployeeHours($lunch_Data);
			//Code for lunch hour :: End
			
			
			//Code for just appointment row :: Start
			$add_Appint=array(
						'biz_user_id'=>$userId,
						'biz_day'=>'',
						'biz_day_from'=>'',
						'biz_user_type'=>1,
						'biz_day_to'=>'',
						'biz_appointment'=>0,
						'biz_created'=>date('Y-m-d H:i:s'),
						'biz_created_by'=>$userId,
						'biz_active'=>1
						);
			$resultJusAppoint=$this->empModel->saveEmployeeHours($add_Appint);
			//Code for just appointment row :: End
			$this -> db -> select('*');
			$this -> db -> from('tbl_business_hour_employee');
			 $this -> db -> where('biz_active','1');
			 $this -> db -> where('biz_user_id',$userId);
			$query = $this -> db -> get();
			if($query -> num_rows() != 0)
			{
				//	$this->db->last_query();exit;
				return $query->result();
			}
        }
		
	}
	
	public function getConfigrationAllUserId($userId){
		$this -> db -> select('*');
        $this -> db -> from('tbl_configurations');
        $this -> db -> where('con_active','1');
		$this -> db -> where('con_greeting !=','');
        $query = $this -> db -> get();
	    if($query -> num_rows() != 0)
        {
          return $query->result();
              
        }
        else
        {
			//if data is not exit on table then insert one row
			$con_data = array(
				'con_user_id' => $userId,
				'con_active'=>1,
				'con_created_by'=>$userId,
				'con_created'=>date('Y-m-d H:i:s')
				);
			$this->db->insert('tbl_configurations', $con_data);
              redirect('configurations');
        }
    
		//echo $query->num_rows(); exit;
		
		
	}
	public function updateConfigurations($con_id,$update_data)
	{
		//print_r($this->input->post()); exit;
		$this->db->where('con_id', $con_id);
	    $this->db->update('tbl_configurations', $update_data);
	    return true;
	}
	
	public function insertBusinessHourDetail($userId,$insert_data)
	{
	    $this->db->insert('tbl_business_hour', $insert_data);
	    return true;
	}
	
	
}
?>
