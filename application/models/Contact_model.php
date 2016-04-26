<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Contact_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
	}
	
	//Get all confirmation from tbl_contact` table 
	public function getAllContact($userId){
		$this -> db -> select('*');
        $this -> db -> from('tbl_contact');
        $this -> db -> where('con_active','1');
		$this -> db -> where('con_user_id',$userId);
        $this -> db -> order_by('con_id','DESC');
        $query = $this -> db -> get();
		//echo $this->db->last_query();

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
	
	//Get employee using con_id
	public function getContactByUserId($con_id){
		$this -> db -> select('*');
        $this -> db -> from('tbl_contact');
         $this -> db -> where('con_active','1');
         $this -> db -> where('con_id',$con_id);
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
	
	public function updateContact($primaryId,$update_data)
	{
		$this->db->where('con_id', $primaryId);
	    $this->db->update('tbl_contact', $update_data);
	    //echo $this->db->last_query();exit;
	    return true;
	}
	
	//Add new contact
	public function saveContact($update_data)
	{
		$this->db->insert('tbl_contact', $update_data);
	    //$this->db->last_query();exit;
	    return $this->db->insert_id();
	}
	//Delete employee by con_id
	public function deleteContactById($con_id)
	{
		$this->db->where('con_id', $con_id);
	    $this->db->delete('tbl_contact');
	    //$this->db->last_query();exit;
	    return true;
	}
	
	
}
?>
