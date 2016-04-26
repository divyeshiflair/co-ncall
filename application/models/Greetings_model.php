<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Greetings_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
	}
	
	//Get all confirmation from tbl_greetings table 
	public function getAllGreetings(){
		$this -> db -> select('*');
        $this -> db -> from('tbl_greetings');
        $this -> db -> where('greetings_active','1');
        $this -> db -> order_by('greetings_id','DESC');
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
	
	//Get employee using greetings_id
	public function getGreetingsById($greetings_id){
		$this -> db -> select('*');
        $this -> db -> from('tbl_greetings');
         $this -> db -> where('greetings_active','1');
         $this -> db -> where('greetings_id',$greetings_id);
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
	
	public function updateGreetings($primaryId,$update_data)
	{
		$this->db->where('greetings_id', $primaryId);
	    $this->db->update('tbl_greetings', $update_data);
	    //$this->db->last_query();exit;
	    return true;
	}
	
	//Add new greetings
	public function saveGreetings($update_data)
	{
		$this->db->insert('tbl_greetings', $update_data);
	    //$this->db->last_query();exit;
	    return $this->db->insert_id();
	}
	//Delete greetings by tbl_greetings
	public function deleteGreetingsById($greetings_id)
	{
		$this->db->where('greetings_id', $greetings_id);
	    $this->db->delete('tbl_greetings');
	    //$this->db->last_query();exit;
	    return true;
	}

}
?>
