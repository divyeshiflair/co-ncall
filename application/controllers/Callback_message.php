<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Callback_message extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('callback_message_model','callbackModel');
		$this->load->library('form_validation');
		$this->load->helper('form');
		//$this->load->helper('url');
		$this->load->model('general_model','genModel');
		$this->genModel->validateLogin();
	} 
	public function index()
	{

		$data['title']= 'Callback Message';
		$fetchedData=$this->callbackModel->getAllCallbackMessage();
		
		$data['confData']=$fetchedData;
		$this->load->helper('form');
		$this->load->view('templates/admin_header',$data);
		$this->load->view('templates/navigation',$data);
		$this->load->view('templates/callback_message_list',$data);
		$this->load->view('templates/admin_footer',$data);

	}
	
	//open new add callback page
	public function add_callback_message()
	{
		$data['title']= 'New Callback Message';
		//get data from table tbl_callback
		$data['pageSource']= 'add';
		$this->load->helper('form');
		$this->load->view('templates/admin_header',$data);
		$this->load->view('templates/navigation',$data);
		$this->load->view('templates/callback_message',$data);
		$this->load->view('templates/admin_footer',$data);

	}
	public function save_callback_message()
	{
		// field name, error message, validation rules
		$this->form_validation->set_rules('callback_value', 'Callback Message', 'trim|required|min_length[4]');
		if($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('err','error');
			$this->add_callbackMessage();
		}
		else
		{
			$userId=$this->session->userdata('user_id');
			$update_data=array(
			'callback_value'=>$this->input->post('callback_value'),
			'callback_created_by'=>$userId,
			'callback_active'=>1
			);
			
			$resultLastEmpId=$this->callbackModel->saveCallbackMessage($update_data);
			if($resultLastEmpId)
			{
				$this->session->set_flashdata('msg','saved');
				redirect('callback_message');
			}
			else
			{
				$this->add_callbackMessage();
			}
		}
	}
	
	//Open callback details in edit mode
	public function edit_callback_message()
	{
		$callback_id = $this->uri->segment(3);
		
		$data['title']= 'Edit Callback Message';
		
		//get data from table tbl_callback_message
		$fetchedData=$this->callbackModel->getCallbackMessageById($callback_id);
		$data['confData']=$fetchedData;
		
		$data['pageSource']= 'edit';
		$this->load->helper('form');
		$this->load->view('templates/admin_header',$data);
		$this->load->view('templates/navigation',$data);
		$this->load->view('templates/callback_message',$data);
		$this->load->view('templates/admin_footer',$data);

	}
	public function update_callback_message()
	{
		
		$userId=$this->session->userdata('user_id');
		
		// field name, error message, validation rules
		$this->form_validation->set_rules('callback_value', 'Callback Message', 'trim|required|min_length[4]');
		
		if($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('err','error');
			$this->edit_callback_message();
		}
		else
		{
			$primaryId=$this->input->post('callback_id');

			$update_data=array(
			'callback_value'=>$this->input->post('callback_value'),
			'callback_modified'=>date('Y-m-d H:i:s'),
			'callback_modified_by'=>$userId,
			
			);

			$result=$this->callbackModel->updateCallbackMessage($primaryId,$update_data);

			if($result)
			{
				$this->session->set_flashdata('msg','updated');
				redirect('callback_message');
			}
			else
			{
				$this->edit_callback_message();
			}
			
		}
	}

	//Delete callback by away_id
	public function delete_callback_message($callback_id)
	{
		$data['title']= 'Delete Callback Message';
		$this->session->set_flashdata('msg','deleted');
		echo $fetchedData=$this->callbackModel->deleteCallbackMessageById($callback_id);
	}

}
