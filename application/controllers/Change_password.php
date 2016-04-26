<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Change_password extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('change_password_model','pswdModel');
		$this->load->library('form_validation');
		$this->load->helper('form');
		//$this->load->helper('url');
		$this->load->model('general_model','genModel');
		$this->genModel->validateLogin();
	} 
	public function index()
	{
		if(($this->session->userdata('user_name')!=""))
		{
			$data['title']= 'Change Password';
			//Get the logged in user id
			$userId=$this->session->userdata('user_id');
			$fetchedData=$this->pswdModel->getUserPswd($userId);
			
			
			$data['confData']=$fetchedData;
			
			$this->load->helper('form');
			$this->load->view('templates/admin_header',$data);
			$this->load->view('templates/navigation',$data);
			$this->load->view('templates/change_password',$data);
			$this->load->view('templates/admin_footer',$data);
		}

	}
	public function update_password()
	{
		
		$this->load->library('form_validation');
		
		// field name, error message, validation rules
		$this->form_validation->set_rules('user_password', 'Password', 'trim|required|min_length[4]|max_length[32]');
		$this->form_validation->set_rules('user_new_password', 'New Password', 'trim|required|min_length[4]|max_length[32]');
		$this->form_validation->set_rules('user_confirm_password', 'Confirm Password', 'trim|required|matches[user_new_password]');
		
		
		if($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('err','error');
			$this->index();
		}
		else
		{
			$primaryId=$this->input->post('user_id');
			
			$existingPswd = $this->pswdModel->checkExistingPswd($primaryId, md5($this->input->post('user_password')));
			if($existingPswd)
			{
				if(md5($this->input->post('user_password'))==md5($this->input->post('user_new_password')))
				{
					$this->session->set_flashdata('pswdErr', 'New password and Existing password can not be same');
					redirect('change_password');				
				}
				else
				{
					$update_data=array(
					'user_password'=>md5($this->input->post('user_new_password')),
					'user_modified'=>date('Y-m-d H:i:s'),
					'user_modified_by'=>$primaryId,
					);
					//echo "<pre>"; print_r($update_data); exit;
					$result=$this->pswdModel->getUpdatePswd($primaryId,$update_data);
					if($result)
					{
						$this->session->set_flashdata('msg','You successfully saved the password.');
						redirect('change_password');
					}
					else
					{
						$this->index();
					}
				}
			}
			else
			{
				$this->session->set_flashdata('pswdErr', 'Invalid existing password.');
				redirect('change_password');
			}
			
			
			
		}
	}
	
}
