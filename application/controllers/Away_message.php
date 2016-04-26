<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Away_message extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('away_message_model','awayModel');
		$this->load->library('form_validation');
		$this->load->helper('form');
		//$this->load->helper('url');
		$this->load->model('general_model','genModel');
		$this->genModel->validateLogin();
	} 
	public function index()
	{

		$data['title']= 'Away Message';
		$fetchedData=$this->awayModel->getAllAwayMessage();
		
		$data['confData']=$fetchedData;
		$this->load->helper('form');
		$this->load->view('templates/admin_header',$data);
		$this->load->view('templates/navigation',$data);
		$this->load->view('templates/away_message_list',$data);
		$this->load->view('templates/admin_footer',$data);

	}
	
	//open new add away page
	public function add_away_message()
	{
		$data['title']= 'New Away Message';
		//get data from table tbl_greetings
		$data['pageSource']= 'add';
		$this->load->helper('form');
		$this->load->view('templates/admin_header',$data);
		$this->load->view('templates/navigation',$data);
		$this->load->view('templates/away_message',$data);
		$this->load->view('templates/admin_footer',$data);

	}
	public function save_away_message()
	{
		// field name, error message, validation rules
		$this->form_validation->set_rules('away_value', 'Away Message', 'trim|required|min_length[4]');
		if($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('err','error');
			$this->add_awayMessage();
		}
		else
		{
			$userId=$this->session->userdata('user_id');
			$update_data=array(
			'away_value'=>$this->input->post('away_value'),
			'away_created_by'=>$userId,
			'away_active'=>1
			);
			
			$resultLastEmpId=$this->awayModel->saveAwayMessage($update_data);
			if($resultLastEmpId)
			{
				$this->session->set_flashdata('msg','saved');
				redirect('away_message');
			}
			else
			{
				$this->add_awayMessage();
			}
		}
	}
	
	//Open away details in edit mode
	public function edit_away_message()
	{
		//Get the payment if from url
		$away_id = $this->uri->segment(3);
		
		$data['title']= 'Edit Away Message';
		
		//get data from table tbl_away_message
		$fetchedData=$this->awayModel->getAwayMessageById($away_id);
		$data['confData']=$fetchedData;
		
		$data['pageSource']= 'edit';
		$this->load->helper('form');
		$this->load->view('templates/admin_header',$data);
		$this->load->view('templates/navigation',$data);
		$this->load->view('templates/away_message',$data);
		$this->load->view('templates/admin_footer',$data);

	}
	public function update_away_message()
	{
		
		$userId=$this->session->userdata('user_id');
		
		// field name, error message, validation rules
		$this->form_validation->set_rules('away_value', 'Away Message', 'trim|required|min_length[4]');
		
		if($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('err','error');
			$this->edit_away_message();
		}
		else
		{
			$primaryId=$this->input->post('away_id');

			$update_data=array(
			'away_value'=>$this->input->post('away_value'),
			'away_modified'=>date('Y-m-d H:i:s'),
			'away_modified_by'=>$userId,
			
			);

			$result=$this->awayModel->updateAwayMessage($primaryId,$update_data);

			if($result)
			{
				$this->session->set_flashdata('msg','updated');
				redirect('away_message');
			}
			else
			{
				$this->edit_away_message();
			}
			
		}
	}

	//Delete away by away_id
	public function delete_away_message($away_id)
	{
		$data['title']= 'Delete Away Message';
		$this->session->set_flashdata('msg','deleted');
		echo $fetchedData=$this->awayModel->deleteAwayMessageById($away_id);
	}

}
