<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class General_model extends CI_Model {

	public function validateLogin(){
		
		if(($this->session->userdata('user_name')!=""))
		{
			return true;
		}
		else
		{
			redirect('signin');
		}
		
	}

}
?>
