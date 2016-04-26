<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Callback_message_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
	}
	
	//Get all confirmation from tbl_callback_message table 
	public function getAllCallbackMessage(){
		$this -> db -> select('*');
        $this -> db -> from('tbl_callback_message');
        $this -> db -> where('callback_active','1');
        $this -> db -> order_by('callback_id','DESC');
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
	
	//Get employee using callback_message_id
	public function getCallbackMessageById($callback_id){
		$this -> db -> select('*');
        $this -> db -> from('tbl_callback_message');
         $this -> db -> where('callback_active','1');
         $this -> db -> where('callback_id',$callback_id);
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
	
	public function updateCallbackMessage($primaryId,$update_data)
	{
		$this->db->where('callback_id', $primaryId);
	    $this->db->update('tbl_callback_message', $update_data);
	    //$this->db->last_query();exit;
	    return true;
	}
	
	//Add new callback
	public function saveCallbackMessage($update_data)
	{
		$this->db->insert('tbl_callback_message', $update_data);
	    //$this->db->last_query();exit;
	    return $this->db->insert_id();
	}
	//Delete callback by tbl_callback_message
	public function deleteCallbackMessageById($callback_id)
	{
		$this->db->where('callback_id', $callback_id);
	    $this->db->delete('tbl_callback_message');
	    //$this->db->last_query();exit;
	    return true;
	}

}
?>
