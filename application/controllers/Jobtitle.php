<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jobtitle extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('jobtitle_model','jobModel');
		$this->load->library('form_validation');
		$this->load->helper('form');
		//$this->load->helper('url');
		$this->load->model('general_model','genModel');
		$this->genModel->validateLogin();
	} 
	public function index()
	{

		$data['title']= 'Jobtitle';
		$fetchedData=$this->jobModel->getAllJobtitle();
		
		$data['confData']=$fetchedData;
		$this->load->helper('form');
		$this->load->view('templates/admin_header',$data);
		$this->load->view('templates/navigation',$data);
		$this->load->view('templates/jobtitle_list',$data);
		$this->load->view('templates/admin_footer',$data);

	}
	
	//open new add Greetings page
	public function add_jobtitle()
	{
		$data['title']= 'New Job Title';
		//get data from table tbl_jobtitle
		$data['pageSource']= 'add';
		$this->load->helper('form');
		$this->load->view('templates/admin_header',$data);
		$this->load->view('templates/navigation',$data);
		$this->load->view('templates/jobtitle',$data);
		$this->load->view('templates/admin_footer',$data);

	}
	public function save_jobtitle()
	{
		// field name, error message, validation rules
		$this->form_validation->set_rules('job_value', 'Jobtitle', 'trim|required|min_length[4]');
		if($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('err','error');
			$this->add_jobtitle();
		}
		else
		{
			$userId=$this->session->userdata('user_id');
			$update_data=array(
			'job_value'=>$this->input->post('job_value'),
			'job_created_by'=>$userId,
			'job_active'=>1
			);
			
			$resultLastEmpId=$this->jobModel->saveJobtitle($update_data);
			if($resultLastEmpId)
			{
				$this->session->set_flashdata('msg','saved');
				redirect('jobtitle');
			}
			else
			{
				$this->add_jobtitle();
			}
		}
	}
	
	//Open greetings details in edit mode
	public function edit_jobtitle()
	{
		//Get the payment if from url
		$Jobtitle_id = $this->uri->segment(3);
		
		$data['title']= 'Edit Job Title';
		
		//get data from table tbl_greetings
		$fetchedData=$this->jobModel->getJobtitleById($Jobtitle_id);
		$data['confData']=$fetchedData;
		
		$data['pageSource']= 'edit';
		$this->load->helper('form');
		$this->load->view('templates/admin_header',$data);
		$this->load->view('templates/navigation',$data);
		$this->load->view('templates/jobtitle',$data);
		$this->load->view('templates/admin_footer',$data);

	}
	public function update_jobtitle()
	{
		
		$userId=$this->session->userdata('user_id');
		
		// field name, error message, validation rules
		$this->form_validation->set_rules('job_value', 'Jobtitle', 'trim|required|min_length[4]');
		
		if($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('err','error');
			$this->edit_jobtitle();
		}
		else
		{
			$primaryId=$this->input->post('job_id');

			$update_data=array(
			'job_value'=>$this->input->post('job_value'),
			'job_modified'=>date('Y-m-d H:i:s'),
			'job_modified_by'=>$userId,
			
			);

			$result=$this->jobModel->updateJobtitle($primaryId,$update_data);

			if($result)
			{
				$this->session->set_flashdata('msg','updated');
				redirect('jobtitle');
			}
			else
			{
				$this->edit_jobtitle();
			}
			
		}
	}

	//Delete jobtitle by job_id
	public function delete_jobtitle($job_id)
	{
		$data['title']= 'Delete Job Title';
		$this->session->set_flashdata('msg','deleted');
		echo $fetchedData=$this->jobModel->deletejobtitleById($job_id);
	}

}
