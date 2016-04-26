<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Jobtitle_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
	}
	
	//Get all confirmation from tbl_Jobtitle table 
	public function getAllJobtitle(){
		$this -> db -> select('*');
        $this -> db -> from('tbl_jobtitle');
        $this -> db -> where('job_active','1');
        $this -> db -> order_by('job_id','DESC');
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
	
	//Get employee using Jobtitle_id
	public function getJobtitleById($job_id){
		$this -> db -> select('*');
        $this -> db -> from('tbl_jobtitle');
         $this -> db -> where('job_active','1');
         $this -> db -> where('job_id',$job_id);
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
	
	public function updateJobtitle($primaryId,$update_data)
	{
		$this->db->where('job_id', $primaryId);
	    $this->db->update('tbl_jobtitle', $update_data);
	    //$this->db->last_query();exit;
	    return true;
	}
	
	//Add new greetings
	public function saveJobtitle($update_data)
	{
		$this->db->insert('tbl_jobtitle', $update_data);
	    //$this->db->last_query();exit;
	    return $this->db->insert_id();
	}
	//Delete greetings by tbl_Jobtitle
	public function deletejobtitleById($job_id)
	{
		$this->db->where('job_id', $job_id);
	    $this->db->delete('tbl_jobtitle');
	    //$this->db->last_query();exit;
	    return true;
	}

}
?>
