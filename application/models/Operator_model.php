<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Operator_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
	}
	
	//Get all confirmation from tbl_user_registration table 
	public function getAllOperator(){
		$this -> db -> select('*');
        $this -> db -> from('tbl_user_registration');
        $this -> db -> where('user_active','1');
		$this -> db -> where('user_role','3');
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
	
	//Get Operator using user_id
	public function getOperatorByUserId($user_id){
		$this -> db -> select('*');
        $this -> db -> from('tbl_user_registration');
        $this -> db -> where('user_active','1');
		$this -> db -> where('user_role','3');
        $this -> db -> where('user_id',$user_id);
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
	
	public function updateOperator($primaryId,$update_data)
	{
		$this->db->where('user_id', $primaryId);
	    $this->db->update('tbl_user_registration', $update_data);
	    //$this->db->last_query();exit;
	    return true;
	}
	
	//Add new Operator
	public function saveOperator($update_data)
	{
		$userQuery = $this->db->get_where('tbl_user_registration', array('user_email' => $update_data['user_email']));
		//echo $query->num_rows(); exit;
		
		if( $userQuery->num_rows() > 0)
		{
			$this->session->set_flashdata('err','Email already exist.');
			return false;
		}
		else
		{
			$this->db->insert('tbl_user_registration', $update_data);
			
			########## start email ##########
			/*$to      = $update_data['user_email'];
			$subject = 'Call Office: Registration';
			$message = "Welcome ".$update_data['user_firstname']." ".$update_data['user_lastname'].", \n \nTo start please use wizard. \nThe variables you will find on the evernote! \n \nThank you \nCall Office";
			$headers = 'From: Call Office' . "\r\n" .
			   //'Reply-To: webmaster@yourdot.com' . "\r\n" .
			   'X-Mailer: PHP/' . phpversion();
			mail($to, $subject, $message, $headers);*/
			########## end email ##########
			
			return true;
		}
	}
	//Delete Operator by emp_id
	public function deleteOperatorById($user_id)
	{
		$this->db->where('user_id', $user_id);
	    $this->db->delete('tbl_user_registration');
	    //$this->db->last_query();exit;
	    return true;
	}
}
?>
