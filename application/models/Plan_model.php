<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Plan_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}
	
	//:: Get All plan from tbl_plan table and display in list page ::DX:: :://
	public function getAllPlan(){
		$this -> db -> select('*');
        $this -> db -> from('tbl_plan_table');
        $this -> db -> where('plan_active','1');
        $this -> db -> order_by('plan_id','DESC');
        $query = $this -> db -> get();
	    //echo $query->num_rows(); exit;
		if($query -> num_rows() != 0)
        {
          return $query->result();
        }
        else
        {
          return false;
        }
	}
	
	//Get employee using plan_id
	public function getPlanById($plan_id){
		$this -> db -> select('*');
        $this -> db -> from('tbl_plan_table');
         $this -> db -> where('plan_active','1');
         $this -> db -> where('plan_id',$plan_id);
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
	
	public function updatePlan($primaryId,$update_data)
	{
		$this->db->where('plan_id', $primaryId);
	    $this->db->update('tbl_plan_table', $update_data);
	    //$this->db->last_query();exit;
	    return true;
	}
	
	//Add new greetings
	public function savePlan($update_data)
	{
		$this->db->insert('tbl_plan_table', $update_data);
	    //$this->db->last_query();exit;
	    return $this->db->insert_id();
	}
	//Delete greetings by tbl_plan_table
	public function deletePlanById($plan_id)
	{
		$this->db->where('plan_id', $plan_id);
	    $this->db->delete('tbl_plan_table');
	    //$this->db->last_query();exit;
	    return true;
	}
	
	
	
	// *** For Client section***// 
	//Get plan by plan type
	public function getPlanByType($plan_type){
		$this -> db -> select('*');
        $this -> db -> from('tbl_plan_table');
         $this -> db -> where('plan_active','1');
         $this -> db -> where('plan_type',$plan_type);
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
	
	//Add new plan selectd by client
	public function saveClientPlan($update_data)
	{
		$this->db->insert('tbl_plan_by_client', $update_data);
	    //$this->db->last_query();exit;
	    return $this->db->insert_id();
	}
	
	//Get plan by user id
	public function getPlanByUserid($userida){
		
		$this -> db -> select('*');
        $this -> db -> from('tbl_plan_by_client');
         $this -> db -> where('cplan_active','1');
         $this -> db -> where('cplan_user_id',$userida);
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
	
	
	public function updatesaveClientPlan($primaryId,$update_data)
	{
		$this->db->where('cplan_id', $primaryId);
	    $this->db->update('tbl_plan_by_client', $update_data);
	    //echo $this->db->last_query();exit;
	    return true;
	}
	// *** For Client section***// 
	
}
?>
