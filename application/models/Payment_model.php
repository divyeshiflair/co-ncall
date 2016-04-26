<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Payment_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}
	
	//Get all payment from tbl_payment` table 
	public function getAllPayments($userId){
		$this -> db -> select('*');
        $this -> db -> from('tbl_payment');
        $this -> db -> where('pay_active','1');
		$this -> db -> where('pay_user_id',$userId);
        $this -> db -> order_by('pay_id','DESC');
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
	
	public function getPaymentsList($userId){
		$this -> db -> select('*');
        $this -> db -> from('tbl_payment');
        $this -> db -> where('pay_active','1');
		$this -> db -> where('pay_billname !=','');
        $this -> db -> order_by('pay_id','DESC');
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
	
	//Delete Payment by pay_id
	public function deletePaymentById($pay_id)
	{
		$this->db->where('pay_id', $pay_id);
	    $this->db->delete('tbl_payment');
	    //$this->db->last_query();exit;
	    return true;
	}
	
	public function checkIBAN($iban) {
 
	  // Normalize input (remove spaces and make upcase)
	  $iban = strtoupper(str_replace(' ', '', $iban));
	 
	  if (preg_match('/^[A-Z]{2}[0-9]{2}[A-Z0-9]{1,30}$/', $iban)) {
		$country = substr($iban, 0, 2);
		$check = intval(substr($iban, 2, 2));
		$account = substr($iban, 4);
	 
		// To numeric representation
		$search = range('A','Z');
		foreach (range(10,35) as $tmp)
		  $replace[]=strval($tmp);
		$numstr=str_replace($search, $replace, $account.$country.'00');
	 
		// Calculate checksum
		$checksum = intval(substr($numstr, 0, 1));
		for ($pos = 1; $pos < strlen($numstr); $pos++) {
		  $checksum *= 10;
		  $checksum += intval(substr($numstr, $pos,1));
		  $checksum %= 97;
		}
	 
		return ((98-$checksum) == $check);
		} else
		return false;
	}
}
?>
