<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Responsibility extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Responsibility_model','resModel');
		$this->load->library('form_validation');
		$this->load->helper('form');
		//$this->load->helper('url');
		$this->load->model('general_model','genModel');
		$this->genModel->validateLogin();
	} 
	public function index()
	{

		$data['title']= 'Responsibility';
		$fetchedData=$this->resModel->getAllResponsibility();
		
		$data['confData']=$fetchedData;
		$this->load->helper('form');
		$this->load->view('templates/admin_header',$data);
		$this->load->view('templates/navigation',$data);
		$this->load->view('templates/responsibility_list',$data);
		$this->load->view('templates/admin_footer',$data);

	}
	
	//open new add Greetings page
	public function add_responsibility()
	{
		$data['title']= 'New Responsibility';
		//get data from table tbl_Responsibility
		$data['pageSource']= 'add';
		$this->load->helper('form');
		$this->load->view('templates/admin_header',$data);
		$this->load->view('templates/navigation',$data);
		$this->load->view('templates/responsibility',$data);
		$this->load->view('templates/admin_footer',$data);

	}
	public function save_responsibility()
	{
		// field name, error message, validation rules
		$this->form_validation->set_rules('res_value', 'Responsibility', 'trim|required|min_length[4]');
		if($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('err','error');
			$this->add_responsibility();
		}
		else
		{
			$userId=$this->session->userdata('user_id');
			$update_data=array(
			'res_value'=>$this->input->post('res_value'),
			'res_created_by'=>$userId,
			'res_active'=>1
			);
			
			$resultLastEmpId=$this->resModel->saveResponsibility($update_data);
			if($resultLastEmpId)
			{
				$this->session->set_flashdata('msg','saved');
				redirect('responsibility');
			}
			else
			{
				$this->add_responsibility();
			}
		}
	}
	
	//Open Responsibility details in edit mode
	public function edit_responsibility()
	{
		//Get the payment if from url
		$Responsibility_id = $this->uri->segment(3);
		
		$data['title']= 'Edit Job Title';
		
		//get data from table tbl_greetings
		$fetchedData=$this->resModel->getResponsibilityById($Responsibility_id);
		$data['confData']=$fetchedData;
		
		$data['pageSource']= 'edit';
		$this->load->helper('form');
		$this->load->view('templates/admin_header',$data);
		$this->load->view('templates/navigation',$data);
		$this->load->view('templates/responsibility',$data);
		$this->load->view('templates/admin_footer',$data);

	}
	public function update_responsibility()
	{
		
		$userId=$this->session->userdata('user_id');
		
		// field name, error message, validation rules
		$this->form_validation->set_rules('res_value', 'responsibility', 'trim|required|min_length[4]');
		
		if($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('err','error');
			$this->edit_responsibility();
		}
		else
		{
			$primaryId=$this->input->post('res_id');

			$update_data=array(
			'res_value'=>$this->input->post('res_value'),
			'res_modified'=>date('Y-m-d H:i:s'),
			'res_modified_by'=>$userId,
			
			);

			$result=$this->resModel->updateResponsibility($primaryId,$update_data);

			if($result)
			{
				$this->session->set_flashdata('msg','updated');
				redirect('responsibility');
			}
			else
			{
				$this->edit_responsibility();
			}
			
		}
	}

	//Delete Responsibility by job_id
	public function delete_responsibility($res_id)
	{
		$data['title']= 'Delete Responsibility';
		$this->session->set_flashdata('msg','deleted');
		echo $fetchedData=$this->resModel->deleteResponsibilityById($res_id);
	}

}
