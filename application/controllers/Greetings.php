<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Greetings extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('greetings_model','greetingModel');
		$this->load->library('form_validation');
		$this->load->helper('form');
		//$this->load->helper('url');
		$this->load->model('general_model','genModel');
		$this->genModel->validateLogin();
	} 
	public function index()
	{

		$data['title']= 'Greetings';
		$fetchedData=$this->greetingModel->getAllGreetings();
		
		$data['confData']=$fetchedData;
		$this->load->helper('form');
		$this->load->view('templates/admin_header',$data);
		$this->load->view('templates/navigation',$data);
		$this->load->view('templates/greetings_list',$data);
		$this->load->view('templates/admin_footer',$data);

	}
	
	//open new add Greetings page
	public function add_greetings()
	{
		$data['title']= 'New Greetings';
		//get data from table tbl_greetings
		$data['pageSource']= 'add';
		$this->load->helper('form');
		$this->load->view('templates/admin_header',$data);
		$this->load->view('templates/navigation',$data);
		$this->load->view('templates/greetings',$data);
		$this->load->view('templates/admin_footer',$data);

	}
	public function save_greetings()
	{
		// field name, error message, validation rules
		$this->form_validation->set_rules('greetings_value', 'Greetings', 'trim|required|min_length[4]');
		if($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('err','error');
			$this->add_greetings();
		}
		else
		{
			$userId=$this->session->userdata('user_id');
			$update_data=array(
			'greetings_value'=>$this->input->post('greetings_value'),
			'greetings_created_by'=>$userId,
			'greetings_active'=>1
			);
			
			$resultLastEmpId=$this->greetingModel->saveGreetings($update_data);
			if($resultLastEmpId)
			{
				$this->session->set_flashdata('msg','saved');
				redirect('greetings');
			}
			else
			{
				$this->add_greetings();
			}
		}
	}
	
	//Open greetings details in edit mode
	public function edit_greetings()
	{
		//Get the payment if from url
		$greetings_id = $this->uri->segment(3);
		
		$data['title']= 'Edit Greetings';
		
		//get data from table tbl_greetings
		$fetchedData=$this->greetingModel->getGreetingsById($greetings_id);
		$data['confData']=$fetchedData;
		
		$data['pageSource']= 'edit';
		$this->load->helper('form');
		$this->load->view('templates/admin_header',$data);
		$this->load->view('templates/navigation',$data);
		$this->load->view('templates/greetings',$data);
		$this->load->view('templates/admin_footer',$data);

	}
	public function update_greetings()
	{
		
		$userId=$this->session->userdata('user_id');
		
		// field name, error message, validation rules
		$this->form_validation->set_rules('greetings_value', 'Greetings', 'trim|required|min_length[4]');
		
		if($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('err','error');
			$this->edit_employee();
		}
		else
		{
			$primaryId=$this->input->post('greetings_id');

			$update_data=array(
			'greetings_value'=>$this->input->post('greetings_value'),
			'greetings_modified'=>date('Y-m-d H:i:s'),
			'greetings_modified_by'=>$userId,
			
			);

			$result=$this->greetingModel->updateGreetings($primaryId,$update_data);

			if($result)
			{
				$this->session->set_flashdata('msg','updated');
				redirect('greetings');
			}
			else
			{
				$this->edit_greetings();
			}
			
		}
	}

	//Delete greetings by greetings_id
	public function delete_greetings($greetings_id)
	{
		$data['title']= 'Delete Greetings';
		$this->session->set_flashdata('msg','deleted');
		echo $fetchedData=$this->greetingModel->deleteGreetingsById($greetings_id);
	}

}
