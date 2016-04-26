<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Away_message_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
	}
	
	//Get all confirmation from tbl_away_message table 
	public function getAllAwayMessage(){
		$this -> db -> select('*');
        $this -> db -> from('tbl_away_message');
        $this -> db -> where('away_active','1');
        $this -> db -> order_by('away_id','DESC');
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
	
	//Get employee using away_message_id
	public function getAwayMessageById($away_id){
		$this -> db -> select('*');
        $this -> db -> from('tbl_away_message');
         $this -> db -> where('away_active','1');
         $this -> db -> where('away_id',$away_id);
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
	
	public function updateAwayMessage($primaryId,$update_data)
	{
		$this->db->where('away_id', $primaryId);
	    $this->db->update('tbl_away_message', $update_data);
	    //$this->db->last_query();exit;
	    return true;
	}
	
	//Add new away
	public function saveAwayMessage($update_data)
	{
		$this->db->insert('tbl_away_message', $update_data);
	    //$this->db->last_query();exit;
	    return $this->db->insert_id();
	}
	//Delete away by tbl_away_message
	public function deleteAwayMessageById($away_id)
	{
		$this->db->where('away_id', $away_id);
	    $this->db->delete('tbl_away_message');
	    //$this->db->last_query();exit;
	    return true;
	}

}
?>
