<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Dashboard_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
	}
	
	//Get all confirmation from tbl_user_registration table 
	public function getAllConfiguration($userId){
		$this -> db -> select('*');
        $this -> db -> from('tbl_configurations');
        $this -> db -> where('con_active','1');
		$this -> db -> where('con_greeting !=',' ');
        $this -> db -> where('con_user_id',$userId);
        $query = $this -> db -> get();
	    if($query -> num_rows() != 0)
        {
          return true;
        }
        else
        {
          return false;
        }
		//echo $query->num_rows(); exit;
	}
	public function getAllCompany($userId){
		$this -> db -> select('*');
        $this -> db -> from('tbl_company');
        $this -> db -> where('com_active','1');
		$this -> db -> where('com_cname !=',' ');
        $this -> db -> where('com_user_id',$userId);
        $query = $this -> db -> get();
	    if($query -> num_rows() != 0)
        {
          return true;
        }
        else
        {
          return false;
        }
		//echo $query->num_rows(); exit;
	}
	public function getAllPayment($userId){
		$this -> db -> select('*');
        $this -> db -> from('tbl_payment');
        $this -> db -> where('pay_active','1');
		$this -> db -> where('pay_billname !=','');
        $this -> db -> where('pay_user_id',$userId);
        $query = $this -> db -> get();
	    if($query -> num_rows() != 0)
        {
          return true;
        }
        else
        {
          return false;
        }
		//echo $query->num_rows(); exit;
	}
	public function getAllEmployee($userId){
		$this -> db -> select('*');
        $this -> db -> from('tbl_employee');
        $this -> db -> where('emp_active','1');
        $this -> db -> where('emp_user_id',$userId);
        $query = $this -> db -> get();
	    if($query -> num_rows() != 0)
        {
          return true;
        }
        else
        {
          return false;
        }
		//echo $query->num_rows(); exit;
	}

}
?>
