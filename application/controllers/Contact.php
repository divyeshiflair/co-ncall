<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('contact_model','contactModel');
		$this->load->library('form_validation');
		$this->load->helper('form');
		//$this->load->helper('url');
		$this->load->model('general_model','genModel');
		$this->genModel->validateLogin();
	} 
	public function index()
	{
		//Get the logged in user id
		$userId=$this->session->userdata('user_id');
		
		$data['title']= 'Contact';
		//get data from table tbl_employee
		$fetchedData=$this->contactModel->getAllContact($userId);
		
		$data['confData']=$fetchedData;
		$this->load->helper('form');
		$this->load->view('templates/admin_header',$data);
		$this->load->view('templates/navigation',$data);
		$this->load->view('templates/contact_list',$data);
		$this->load->view('templates/admin_footer',$data);

	}
	public function contact_list()
	{
		//Get the logged in user id
		$userId=$this->session->userdata('user_id');
		
		$data['title']= 'Contact';
		//get data from table tbl_employee
		$fetchedData=$this->contactModel->getAllContact($userId);
		
		$data['confData']=$fetchedData;
		$this->load->helper('form');
		$this->load->view('templates/admin_header',$data);
		$this->load->view('templates/navigation',$data);
		$this->load->view('templates/contact_list',$data);
		$this->load->view('templates/admin_footer',$data);

	}
	
	//open new add Employee page
	public function add_contact()
	{
		$data['title']= 'New Contact';
		//get data from table tbl_employee
		$data['pageSource']= 'add';
		
		$this->load->helper('form');
		$this->load->view('templates/admin_header',$data);
		$this->load->view('templates/navigation',$data);
		$this->load->view('templates/contact',$data);
		$this->load->view('templates/admin_footer',$data);

	}
	public function save_contact()
	{
		
		
		// field name, error message, validation rules
		$this->form_validation->set_rules('con_firstname', 'Firstname', 'trim|required|min_length[1]');
		$this->form_validation->set_rules('con_lastname', 'Lastname', 'trim|required|min_length[1]');
		$this->form_validation->set_rules('con_email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('con_phone1', 'Phone', 'trim|required|min_length[10]');
		if($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('err','error');
			$this->add_contact();
		}
		else
		{
			
			
			$userId=$this->session->userdata('user_id');
		
			$ectt=$this->input->post('con_vip');
			if(isset($ectt)){
				$con_vip="yes";
			}else{
				$con_vip="no";
			}
			
			$con_firstname=$this->input->post('con_firstname');
			$con_lastname=$this->input->post('con_lastname');
			$con_email=$this->input->post('con_email');
			$con_phone1=$this->input->post('con_phone1');
			$con_phone2=$this->input->post('con_phone2');
			$con_note=$this->input->post('con_note');
			$con_company=$this->input->post('con_company');
			$update_data=array(
			'con_user_id'=>$userId,
			'con_firstname'=>isset($con_firstname)?$con_firstname:"",
			'con_lastname'=>isset($con_lastname)?$con_lastname:"",
			'con_email'=>isset($con_email)?$con_email:"",
			'con_company'=>isset($con_company)?$con_company:"",
			'con_phone1'=>isset($con_phone1)?$con_phone1:"",
			'con_phone2'=>isset($con_phone2)?$con_phone2:"",
			'con_note'=>isset($con_note)?$con_note:"",
			'con_is_vip'=>$con_vip,
			'con_created'=>date('Y-m-d H:i:s'),
			'con_created_by'=>$userId,
			'con_active'=>1
			
			);
			
			$resultLastEmpId=$this->contactModel->saveContact($update_data);
			if($resultLastEmpId)
			{
				$this->session->set_flashdata('msg','saved');
				redirect('contact');
			}
			else
			{
				$this->add_contact();
			}
			
		}
	}
	
	//Open employee details in edit mode
	public function edit_contact()
	{
		//Get the payment if from url
		$emp_id = $this->uri->segment(3);
		
		$data['title']= 'Edit Conact';
		
		//get data from table tbl_payment
		$fetchedData=$this->contactModel->getContactByUserId($emp_id);
		$data['confData']=$fetchedData;
		
		
		$data['pageSource']= 'edit';
		$this->load->helper('form');
		$this->load->view('templates/admin_header',$data);
		$this->load->view('templates/navigation',$data);
		$this->load->view('templates/contact',$data);
		$this->load->view('templates/admin_footer',$data);

	}
	
	public function update_contact()
	{
		
		echo $primaryId= str_replace(' ','',$this->input->post('con_id'));
		
		// field name, error message, validation rules
		$this->form_validation->set_rules('con_firstname', 'Firstname', 'trim|required|min_length[1]');
		$this->form_validation->set_rules('con_lastname', 'Lastname', 'trim|required|min_length[1]');
		$this->form_validation->set_rules('con_email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('con_phone1', 'Phone', 'trim|required|min_length[10]');
		if($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('err','error');
			$this->add_contact();
		}
		else
		{
			
			
			$userId=$this->session->userdata('user_id');
		
			$ectt=$this->input->post('con_vip');
			if(isset($ectt)){
				$con_vip="yes";
			}else{
				$con_vip="no";
			}
			$company=$this->input->post('con_company');
			$con_firstname=$this->input->post('con_firstname');
			$con_lastname=$this->input->post('con_lastname');
			$con_email=$this->input->post('con_email');
			$con_company=$this->input->post('con_company');
			$con_phone1=$this->input->post('con_phone1');
			$con_phone2=$this->input->post('con_phone2');
			$con_note=$this->input->post('con_note');

			$update_data=array(
			'con_firstname'=>isset($con_firstname)?$con_firstname:"",
			'con_lastname'=>isset($con_lastname)?$con_lastname:"",
			'con_email'=>isset($con_email)?$con_email:"",
			'con_company'=>isset($con_company)?$company:"",
			'con_phone1'=>isset($con_phone1)?$con_phone1:"",
			'con_phone2'=>isset($con_phone2)?$con_phone2:"",
			'con_note'=>isset($con_note)?$con_note:"",
			'con_is_vip'=>$con_vip,
			'con_modified'=>date('Y-m-d H:i:s'),
			'con_modified_by'=>$userId,
			'con_active'=>1
			
			);
			
			$resultLastEmpId=$this->contactModel->updateContact($primaryId,$update_data);
			
			if($resultLastEmpId)
			{
				$this->session->set_flashdata('msg','saved');
				redirect('contact');
			}
			else
			{
				$this->add_contact();
			}
			
		}
	}
	
	//Delete payment by pay_id
	public function delete_contact($pay_id)
	{
		$data['title']= 'Delete Contact';
		$this->session->set_flashdata('msg','deleted');
		echo $fetchedData=$this->contactModel->deleteContactById($pay_id);
	}
	
	
	//After delete load all data using ajax
	public function afterDeleteEmployeeList()
	{
		//Get the logged in user id
		$userId=$this->session->userdata('user_id');
		
		//get data from table tbl_payment
		$fetchedData=$this->contactModel->getAllEmployees();
		
		$data['confData']=$fetchedData;
		$this->load->helper('form');
		$this->load->view('templates/employee_list_after_Delete',$data);
		
	}
	//Configration view
	public function contact_view($empId)
	{
		
		//Get the payment if from url
		$emp_id = $this->uri->segment(3);
		
		$data['title']= 'View Employee';
		
		//get data from table tbl_payment
		$fetchedData=$this->contactModel->getEmployeeByUserId($emp_id);
		$data['confData']=$fetchedData;
		
		//get data from table tbl_business_hour_employee
		$fetchedHpurData=$this->contactModel->getEmployeeHoursByUserId($emp_id);
		$data['hourData']=$fetchedHpurData;
		
		//Get all aCtIvE Responsibility from  tbl_responsibility 
		$fetchedReponsibilityData=$this->contactModel->getAllResponsibility();
		$data['reponsibilityData']=$fetchedReponsibilityData;
		
		//Get all aCtIvE Away Message from  tbl_away_message 
		$fetchedAwayMessageData=$this->contactModel->getAllAwayMessage();
		$data['awayMessageData']=$fetchedAwayMessageData;
		
		//Get all aCtIvE Job Title from  tbl_jobtitle 
		$fetchedJobTitleData=$this->contactModel->getAllJobTitle();
		$data['jobTitleData']=$fetchedJobTitleData;
		
			
		//Get all aCtIvE Call Back Msg from  tbl_callback_message 
		$fetchedCallBackMsgData=$this->contactModel->getAllCallBackMsg();
		$data['callBackMsgData']=$fetchedCallBackMsgData;
		
		
		
		$data['pageSource']= 'edit';
		$this->load->helper('form');
		$this->load->view('templates/admin_header',$data);
		$this->load->view('templates/navigation',$data);
		$this->load->view('templates/employee_view',$data);
		$this->load->view('templates/admin_footer',$data);
	

	}
	//Open employee details in edit mode
	public function view_contact()
	{
		//Get the payment if from url
		$emp_id = $this->uri->segment(3);
		
		$data['title']= 'View Conact';
		
		//get data from table tbl_payment
		$fetchedData=$this->contactModel->getContactByUserId($emp_id);
		$data['confData']=$fetchedData;
		
		
		$data['pageSource']= 'edit';
		$this->load->helper('form');
		$this->load->view('templates/admin_header',$data);
		$this->load->view('templates/navigation',$data);
		$this->load->view('templates/contact_view',$data);
		$this->load->view('templates/admin_footer',$data);

	}
}
