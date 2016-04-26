<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Client_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}
	
	//Get all client from tbl_user_registration` table  which user_role =2
	public function getAllClient(){
		$this -> db -> select('*');
        $this -> db -> from('tbl_user_registration');
         $this -> db -> where('user_active','1');
         $this -> db -> where('user_role','2');
         $this -> db -> order_by('user_id','DESC');
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
	
	//Get payment using pay_id
	public function getPaymentByUserId($pay_id){
		$this -> db -> select('*');
        $this -> db -> from('tbl_payment');
         $this -> db -> where('pay_active','1');
         $this -> db -> where('pay_id',$pay_id);
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
	//Update the existing payment 
	public function updatePayment($primaryId,$update_data)
	{
		$this->db->where('pay_id', $primaryId);
	    $this->db->update('tbl_payment', $update_data);
	    //$this->db->last_query();exit;
	    return true;
	}
	
	//Add new payments
	public function savePayment($update_data)
	{
		$this->db->insert('tbl_payment', $update_data);
	    //$this->db->last_query();exit;
	    return true;
	}
	
	//Delete Client by id
	public function deleteClientById($cl_id)
	{
		$this->db->where('user_id', $cl_id);
	    $this->db->delete('tbl_user_registration');
	    //$this->db->last_query();exit;
	    return true;
	}
}
?>
