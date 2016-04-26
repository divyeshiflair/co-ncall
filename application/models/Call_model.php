<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Call_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}
	
	//:: Get All plan from tbl_plan table and display in list page ::DX:: :://
	public function getAllPlan1(){
		$this -> db -> select('*');
		$this -> db -> from('tbl_plan_table');
		$this -> db -> where('plan_active','1');
		$this -> db -> order_by('plan_id','DESC');
		$query = $this -> db -> get();
	    //echo $query->num_rows(); exit;
		if($query -> num_rows() != 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}
	
	//:: Get all user details of call from tbl_call_mail which is enter using cron job ::DX:: :://
	public function getUSerByCallType($type){
		$this -> db -> select('*');
		$this -> db -> from('tbl_call_mail');
		$this->db->join('tbl_user_registration', 'tbl_call_mail.call_cli_id = tbl_user_registration.user_id');
		$this -> db -> where('tbl_call_mail.call_calltype',$type);
		$this -> db -> where('tbl_call_mail.call_cli_id',$this->session->userdata('user_id'));
		$this -> db -> order_by('tbl_call_mail.call_calldate','DESC');
		$query = $this -> db -> get();
        //echo $this->db->last_query();

       
	    //echo $query->num_rows(); exit;
		if($query -> num_rows() != 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}
	
	
	//:: Get all user details of call from tbl_call_mail base on call id ::DX:: :://
	public function getUSerByCallTypeByCallID($id){
		$this -> db -> select('*');
		$this -> db -> from('tbl_call_mail');
		$this->db->join('tbl_user_registration', 'tbl_call_mail.call_cli_id = tbl_user_registration.user_id');
		$this -> db -> where('tbl_call_mail.call_id',$id);
		$this -> db -> order_by('tbl_call_mail.call_calldate','DESC');
		$this -> db -> where('tbl_call_mail.call_cli_id',$this->session->userdata('user_id'));
		$query = $this -> db -> get();
	    //echo $query->num_rows(); exit;
	    
		if($query -> num_rows() != 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}
	
	
	public function xml2array($xmlObject,$out = array () )
	{
		
		foreach ( (array) $xmlObject as $index => $node ){
			
			$out[$index] = (is_object($node) ) ? $this->xml2array ( $node ) : $node;
		}

		return $out;
	}
	
	//Add new call
	public function saveCallFromMail($update_data)
	{
		$this->db->insert('tbl_call_mail', $update_data);
	    //$this->db->last_query();exit;
		return true;
	}
	
	public function updateUSerByCallID($data,$callID){
		$this->db->where('call_id',$callID);
		$records = $this->db->update('tbl_call_mail',$data);
		   //echo $this->db->last_query();
		return $records;
	}
	public function countUserByCallType($type=NULL){
		$this->db->select('COUNT(`call_id`) AS `COUNT`');
		$this->db->where('call_calltype',$type);
		$this -> db -> where('call_cli_id',$this->session->userdata('user_id'));
		$row = $this->db->get('tbl_call_mail');
		return $row->result();
	}
	
	
	//:: Get all comment details of call from tbl_call_commnet base on call id ::DX:: :://
	public function getCommentByCall($id,$userId){
		$this -> db -> select('*');
		$this -> db -> from('tbl_call_comment');
		$this->db->join('tbl_user_registration', 'tbl_call_comment.com_cli_id = tbl_user_registration.user_id');
		$this -> db -> where('tbl_call_comment.com_call_id',$id);
		$this -> db -> order_by('tbl_call_comment.com_created','DESC');
		$query = $this -> db -> get();
        //echo $this->db->last_query();
	    //echo $query->num_rows(); exit;
		if($query -> num_rows() != 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}
	//:: Get all comment details of call from tbl_call_commnet base on call id ::DX:: :://
	
	//Add new comment for call
	public function saveCommentByCall($update_data)
	{
		$this->db->insert('tbl_call_comment', $update_data);
	    //echo $this->db->last_query();exit;
		return true;
	}
	
	
	//:: Get all user details base on filter option :: read-unread-stared-unstared ::DX:: :://
	public function getUSerByFilter($type){
		
		$this -> db -> select('*');
		$this -> db -> from('tbl_call_mail');
		$this->db->join('tbl_user_registration', 'tbl_call_mail.call_cli_id = tbl_user_registration.user_id');
		if($type=="read" ||$type=="unread" ){
			if($type=="read"){
				$isRead="yes";
			}else{
				$isRead="no";
			}
			
			$this -> db -> where('tbl_call_mail.call_is_read',$isRead);
		}else{
			if($type=="starred"){
				$isStar="yes";
			}else{
				$isStar="no";
			}
			$this -> db -> where('tbl_call_mail.call_is_stared',$isStar);
		}
		$this -> db -> where('tbl_call_mail.call_cli_id',$this->session->userdata('user_id'));
		$this -> db -> order_by('tbl_call_mail.call_calldate','DESC');
		$query = $this -> db -> get();
        //echo $this->db->last_query();
	    //echo $query->num_rows(); exit;
		if($query -> num_rows() != 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}
	
	//Set stared an unstared to call details
	public function setStarCall($data,$callID){
		$this->db->where('call_id',$callID);
		$records = $this->db->update('tbl_call_mail',$data);
		return $records;
	}
	
	public function remiderCall($callID = NULL){
		
		$this -> db ->where('rem_active','1');
		$this -> db ->where('rem_call_id',$callID);
		$query = $this -> db ->get('tbl_call_reminder');
		
		if($query -> num_rows() != 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}

	}
	public function setReminderCall($data=NULL){
		$callID = $data['rem_call_id'];
		$this->db->where('rem_call_id',$callID);
		$query = $this->db->get('tbl_call_reminder');
		if($query -> num_rows() != 0)
		{
			$this->db->where('rem_call_id',$callID);
		$record = $this->db->update('tbl_call_reminder',$data);
		return $record;
		}
		else
		{
		$record = $this->db->insert('tbl_call_reminder',$data);	
			return $record;
		}
	}
	
	//Add new pill
	public function savePill($update_data)
	{
		$this->db->insert('tbl_call_mail_pill', $update_data);
	    //echo $this->db->last_query();exit;
		return true;
	}
	//Uppdate new pill
	public function updatePill($data,$pillID)
	{
		$this->db->where('call_id',$pillID);
		$records = $this->db->update('tbl_call_mail_pill',$data);
		//echo $this->db->last_query();
		return $records;
	}
	//Delete pill
	public function deletePill($id)
	{
		 $this->db->where('call_id', $id);
		$this->db->delete('tbl_call_mail_pill');
		echo $this->db->last_query();
		return true;
	}
	//Select all pill by call id
	public function allPillByCallid($id){
		$this -> db -> select('*');
		$this -> db -> from('tbl_call_mail_pill');
		$this -> db -> where('call_active','1');
		$this -> db -> where('call_call_id',$id);
		$this -> db -> order_by('call_pill_title','ASC');
		$query = $this -> db -> get();
	    //echo $query->num_rows(); exit;
		if($query -> num_rows() != 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}
	
	//Select pill by pill id
	public function getPillByPillId($id){
		$this -> db -> select('*');
		$this -> db -> from('tbl_call_mail_pill');
		$this -> db -> where('call_active','1');
		$this -> db -> where('call_id',$id);
		$query = $this -> db -> get();
	    //echo $query->num_rows(); exit;
		if($query -> num_rows() != 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}
	
	//Select all pill by call created by
	public function allPillByCallcreatedby($id){
		$this -> db -> select('call_pill_price,call_pill_title');
		$this -> db -> from('tbl_call_mail_pill');
		$this -> db -> where('call_active','1');
		$this -> db -> where('call_created_by',$id);
		$this -> db -> order_by('call_id','ASC');
		$query = $this -> db -> get();
	    //echo $query->num_rows(); exit;
		if($query -> num_rows() != 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}
	public function allPillByCallcreatedbylist($id){
		$this -> db -> select('*');
		$this -> db -> from('tbl_call_mail_pill');
		$this -> db -> where('call_active','1');
		$this -> db -> where('call_created_by',$id);
		$this -> db -> order_by('call_id','ASC');
		$query = $this -> db -> get();
	    //echo $query->num_rows(); exit;
		if($query -> num_rows() != 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}
	public function allPillByCallcreatedbylistdate($id,$from,$to){
		/*echo $id;
		echo $from;
		echo $to;*/
		$this -> db -> select('*');
		$this -> db -> from('tbl_call_mail_pill');
		$this -> db -> where('call_active','1');
		$this -> db -> where('call_created_by',$id);
		$this->db->where('call_created >=', $from);
		$this->db->where('call_created <=', $to);
		$this -> db -> order_by('call_id','ASC');
		$query = $this -> db -> get();
		/*echo $this->db->last_query();exit;
	    echo $query; exit;*/
		if($query -> num_rows() != 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}
	public function allPillByCallcreatedbydate($id,$from,$to){
		$this -> db -> select('call_pill_price,call_pill_title');
		$this -> db -> from('tbl_call_mail_pill');
		$this -> db -> where('call_active','1');
		$this->db->where('call_created >=', $from);
		$this->db->where('call_created <=', $to);
		$this -> db -> where('call_created_by',$id);
		$this -> db -> order_by('call_id','ASC');
		$query = $this -> db -> get();
	    //echo $query->num_rows(); exit;
		if($query -> num_rows() != 0)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}
}
?>
