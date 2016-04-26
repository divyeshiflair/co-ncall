<?php

class Dashboard extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('dashboard_model','dashModel');
		$this->load->library('form_validation');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->model('general_model','genModel');
		$this->genModel->validateLogin();
	} 
	public function index()
	{
		//echo "reach";die;
		//get data to display in dashboard - Configuration, Company, Payment, Employee
		$configurationData=$this->dashModel->getAllConfiguration($this->session->userdata('user_id'));
		$companyData=$this->dashModel->getAllCompany($this->session->userdata('user_id'));
		$paymentData=$this->dashModel->getAllPayment($this->session->userdata('user_id'));
		$employeeData=$this->dashModel->getAllEmployee($this->session->userdata('user_id'));
		
		$data['configurationData']=$configurationData;
		$data['companyData']=$companyData;
		$data['paymentData']=$paymentData;
		$data['employeeData']=$employeeData;
			
		$this->load->view('templates/admin_header');
		$this->load->view('templates/navigation');
		$this->load->view('templates/dashboard',$data);
		$this->load->view('templates/admin_footer');

	}
	
    public function logout()
	{
		$newdata = array(
			'user_id'   =>'',
			'user_name'  =>'',
			'user_email'     => '',
			'logged_in' => FALSE,
		);
		$this->session->unset_userdata($newdata );
		$this->session->sess_destroy();
		//$this->index();
		redirect('signin/index');
	}
}