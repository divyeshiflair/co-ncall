<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Change_password_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}
	
	function getUserPswd($userId)
	{
		$this -> db -> select('*');
		$this -> db -> from('tbl_user_registration');
		$this -> db -> where('user_active','1');
		$this -> db -> where('user_id',$userId);
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
	function checkExistingPswd($userId, $existingPswd)
	{
		$this -> db -> select('*');
		$this -> db -> from('tbl_user_registration');
		$this -> db -> where('user_active','1');
		$this -> db -> where('user_password',$existingPswd);
		$this -> db -> where('user_id',$userId);
		$query = $this -> db -> get();
		if($query -> num_rows() != 1)
		{	
			return false;
		}
		else
		{ 
			return true;
		}
	}
	
	function getUpdatePswd($primaryId,$update_data)
	{
		$this->db->where('user_id', $primaryId);
	    $this->db->update('tbl_user_registration', $update_data);
	    return true;
	}
}
?>
