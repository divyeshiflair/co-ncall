<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Signup_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}
	public function add_user()
	{
	
		$userQuery = $this->db->get_where('tbl_user_registration', array('user_email' => $this->input->post('email')));
		//echo $query->num_rows(); exit;
		
		if( $userQuery->num_rows() > 0)
		{
			$this->session->set_flashdata('signupError', 'Email already exist.');
			return false;
		}
		else
		{
			//echo implode(',', $this->input->post('low'));
			//print_r($this->input->post()); exit;
			$data=array(
				'user_firstname'=>$this->input->post('firstname'),
				'user_lastname'=>$this->input->post('lastname'),
				'user_email'=>$this->input->post('email'),
				'user_password'=>md5($this->input->post('password')),
				'user_mobile'=>$this->input->post('mobile'),
				'user_low'=>implode(',', $this->input->post('low')),
				'user_role'=>2,
				'user_created_by'=>1,
				'user_modified_by'=>1,
				'user_active'=>1
			);
			$this->db->insert('tbl_user_registration',$data);
			########## start email ##########
			$to      = $this->input->post('email');
			$subject = 'Call Office: Registration';
			$message = "Welcome ".$this->input->post('firstname')." ".$this->input->post('lastname').", \n \nTo start please use wizard. \nThe variables you will find on the evernote! \n \nThank you \nCall Office";
			$headers = 'From: Call Office' . "\r\n" .
			   //'Reply-To: webmaster@yourdot.com' . "\r\n" .
			   'X-Mailer: PHP/' . phpversion();
			mail($to, $subject, $message, $headers);

			########## end email ##########
		}
		return true;
		
	}
}
?>