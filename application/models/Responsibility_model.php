<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Responsibility_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
	}
	
	//Get all confirmation from tbl_Responsibility table 
	public function getAllResponsibility(){
		$this -> db -> select('*');
        $this -> db -> from('tbl_responsibility');
        $this -> db -> where('res_active','1');
        $this -> db -> order_by('res_id','DESC');
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
	
	//Get employee using Responsibility_id
	public function getResponsibilityById($res_id){
		$this -> db -> select('*');
        $this -> db -> from('tbl_responsibility');
         $this -> db -> where('res_active','1');
         $this -> db -> where('res_id',$res_id);
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
	
	public function updateResponsibility($primaryId,$update_data)
	{
		$this->db->where('res_id', $primaryId);
	    $this->db->update('tbl_responsibility', $update_data);
	    //$this->db->last_query();exit;
	    return true;
	}
	
	//Add new greetings
	public function saveResponsibility($update_data)
	{
		$this->db->insert('tbl_responsibility', $update_data);
	    //$this->db->last_query();exit;
	    return $this->db->insert_id();
	}
	//Delete greetings by tbl_Responsibility
	public function deleteResponsibilityById($res_id)
	{
		$this->db->where('res_id', $res_id);
	    $this->db->delete('tbl_responsibility');
	    //$this->db->last_query();exit;
	    return true;
	}

}
?>
