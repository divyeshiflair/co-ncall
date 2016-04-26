<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('plan_model','planModel');
		$this->load->model('general_model','genModel');
		$this->load->library('form_validation');
		$this->load->helper('form');
		//$this->load->helper('url');
		$this->genModel->validateLogin();

	} 
	public function index()
	{
		//get data from table tbl_plan
		$fetchedData=$this->planModel->getAllPlan();
		$data['planData']=$fetchedData;
		
		$this->load->helper('form');
		$this->load->view('templates/admin_header',$data);
		$this->load->view('templates/navigation',$data);
		$this->load->view('templates/plan_list',$data);
		$this->load->view('templates/admin_footer',$data);

	}
	//open new add Plan page
	public function add_plan()
	{
		$data['title']= 'New Plan';
		//get data from table tbl_plan
		$data['pageSource']= 'add';
		$this->load->helper('form');
		$this->load->view('templates/admin_header',$data);
		$this->load->view('templates/navigation',$data);
		$this->load->view('templates/plan',$data);
		$this->load->view('templates/admin_footer',$data);

	}
	public function save_plan()
	{
		// field name, error message, validation rules
		$this->form_validation->set_rules('plan_features', 'Plan Features', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('plan_price', 'Plan Price', 'trim|required|min_length[1]');
		if($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('err','error');
			$this->add_plan();
		}
		else
		{
			
			$userId=$this->session->userdata('user_id');
			$update_data=array(
			'plan_type'=>$this->input->post('plan_type'),
			'plan_type_text'=>$this->input->post('plan_type_text'),
			'plan_features'=>$this->input->post('plan_features'),
			'plan_price'=>$this->input->post('plan_price'),
			'plan_created_by'=>$userId,
			'plan_active'=>1
			);
			
			$resultLastEmpId=$this->planModel->savePlan($update_data);
			if($resultLastEmpId)
			{
				$this->session->set_flashdata('msg','saved');
				redirect('plan');
			}
			else
			{
				$this->add_plan();
			}
		}
	}
	
	//Open plan details in edit mode
	public function edit_plan()
	{
		//Get the payment if from url
		$plan_id = $this->uri->segment(3);
		
		$data['title']= 'Edit Plan';
		
		//get data from table tbl_plan
		$fetchedData=$this->planModel->getPlanById($plan_id);
		$data['confData']=$fetchedData;
		
		$data['pageSource']= 'edit';
		$this->load->helper('form');
		$this->load->view('templates/admin_header',$data);
		$this->load->view('templates/navigation',$data);
		$this->load->view('templates/plan',$data);
		$this->load->view('templates/admin_footer',$data);

	}
	public function update_plan()
	{
		$userId=$this->session->userdata('user_id');
		
		// field name, error message, validation rules
		$this->form_validation->set_rules('plan_features', 'Plan Features', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('plan_price', 'Plan Price', 'trim|required|min_length[1]');
		
		if($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('err','error');
			$this->edit_employee();
		}
		else
		{
			$primaryId=$this->input->post('plan_id');

			$update_data=array(
			'plan_type'=>$this->input->post('plan_type'),
			'plan_features'=>$this->input->post('plan_features'),
			'plan_type_text'=>$this->input->post('plan_type_text'),
			'plan_price'=>$this->input->post('plan_price'),
			'plan_modified'=>date('Y-m-d H:i:s'),
			'plan_modified_by'=>$userId,
			
			);

			$result=$this->planModel->updatePlan($primaryId,$update_data);

			if($result)
			{
				$this->session->set_flashdata('msg','updated');
				redirect('plan');
			}
			else
			{
				$this->edit_plan();
			}
			
		}
	}

	//Delete plan by plan_id
	public function delete_plan($plan_id)
	{
		$data['title']= 'Delete Plan';
		$this->session->set_flashdata('msg','deleted');
		echo $fetchedData=$this->planModel->deletePlanById($plan_id);
	}



	// *** For Client section***// 
	
	//View each plan in client section
	public function planView()
	{
		//get data from table tbl_plan
		$fetched1Data=$this->planModel->getPlanByType("plan1");
		$data['plan1Data']=$fetched1Data;
		
		$fetched2Data=$this->planModel->getPlanByType("plan2");
		$data['plan2Data']=$fetched2Data;
		
		$fetched3Data=$this->planModel->getPlanByType("plan3");
		$data['plan3Data']=$fetched3Data;
		
		$getPlanByUserid=$this->planModel->getPlanByUserid($this->session->userdata('user_id'));
		$data['savedplanData']=$getPlanByUserid;
		
		$data['pageSource']= 'edit';
		
		$this->load->helper('form');
		$this->load->view('templates/admin_header',$data);
		$this->load->view('templates/navigation',$data);
		$this->load->view('templates/plan_view_client',$data);
		$this->load->view('templates/admin_footer',$data);

	}
	
	
	//Save selected plan in table in client sections
	public function saveSelectedPlan()
	{
	
		$userId=$this->session->userdata('user_id');
		$selectedPlanChkbox=$this->input->post('planSelect');
		foreach($selectedPlanChkbox as $key=>$val){
			$update_data=array(
			'cplan_plan_id'=>$key,
			'cplan_user_id'=>$userId,
			'cplan_created'=>date('Y-m-d H:i:s'),
			'cplan_created_by'=>$userId,
			'cplan_active'=>'1'
			);
		$result=$this->planModel->saveClientPlan($update_data);
		}
		if($result)
		{
			$this->session->set_flashdata('msg','selected');
			redirect('plan/planView');
		}
		else
		{
			$this->edit_plan();
		}
			
	}
	
	//update selected plan in table in client sections
	public function updateSelectedPlan()
	{
		$selectedPlanChkbox=$this->input->post('planSelect');
		foreach($selectedPlanChkbox as $key=>$val){
			$update_data=array(
			'cplan_plan_id'=>$key,
			);
			$result=$this->planModel->updatesaveClientPlan($this->input->post('cplan_id'),$update_data);
		}
		if($result)
		{
			$this->session->set_flashdata('msg','selected');
			redirect('plan/planView');
		}
		else
		{
			$this->edit_plan();
		}
			
	}
	
	// *** For Client section***// 
}
