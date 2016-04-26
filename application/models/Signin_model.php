<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Signin_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}
	function login($email,$password)
	{
		$userQuery = $this->db->get_where('tbl_user_registration', array('user_email' => $email, 'user_password' => $password));
		if($userQuery->num_rows()>0)
		{
			foreach($userQuery->result() as $rows)
			{
				//print_r($rows); exit;
				//add all data to session
				$newdata = array(
					'user_id'  => $rows->user_id,
					'user_name'  => $rows->user_firstname,
					'user_email'    => $rows->user_email,
					'user_role'    => $rows->user_role,
					'logged_in'  => TRUE,
				);
			}
			$this->session->set_userdata($newdata);
			return true;
		}
		else
		{
			$this->session->set_flashdata('signinError', 'Invalid Email or Password.');
		}
		return false;
	}
}
?>