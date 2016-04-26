<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Company extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('company_model','companyModel');
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
		
		$data['title']= 'Company';
		//get data from table usoing user id and pass to the view page
		$confdata=$this->companyModel->getCompanyByUserId($userId);
		$data['confData']=$confdata;
		
		//Get all country
		$confdataCountry=$this->companyModel->getAllCountry();
		$data['countryData']=$confdataCountry;
		
		$this->load->helper('form');
		$this->load->view('templates/admin_header',$data);
		$this->load->view('templates/navigation',$data);
		$this->load->view('templates/company',$data);
		$this->load->view('templates/admin_footer',$data);

	}
	public function tabindex($userId)
	{
		//Get the logged in user id
		//$userId=$this->session->userdata('user_id');
		
		$data['title']= 'Company';
		//get data from table usoing user id and pass to the view page
		$confdata=$this->companyModel->getCompanyByUserId($userId);
		$data['confData']=$confdata;
		
				//Get all country
		$confdataCountry=$this->companyModel->getAllCountry();
		$data['countryData']=$confdataCountry;
		
		$this->load->helper('form');
		
		$this->load->view('templates/company',$data);
		

	}
	public function company_list()
	{
		//Get the logged in user id
		$userId=$this->session->userdata('user_id');
		
		$data['title']= 'Company';
		//get data from table usoing user id and pass to the view page
		$confdata=$this->companyModel->getAllConfigration();
		
		$data['confData']=$confdata;
		$this->load->helper('form');
		$this->load->view('templates/admin_header',$data);
		$this->load->view('templates/navigation',$data);
		$this->load->view('templates/company_list',$data);
		$this->load->view('templates/admin_footer',$data);

	}
	public function update_company()
	{
		
		// field name, error message, validation rules
		$this->form_validation->set_rules('com_cname', 'Company Name', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('com_add1', 'Address', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('com_add2', 'Postal Code', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('com_add3', 'City', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('com_add4', 'Department', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('com_telephone', 'Telephone', 'trim|required|min_length[10]');
		$this->form_validation->set_rules('com_fax', 'Fax', 'trim|required');
		$this->form_validation->set_rules('com_street_number', 'Fax', 'trim|required');
		
		$this->form_validation->set_rules('com_email', 'Email', 'trim|required|valid_email');
		
		if($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('err','error');
			$this->index();
		}
		else
		{
			$primaryId=$this->input->post('com_id');
			$update_data=array(
			'com_cname'=>$this->input->post('com_cname'),
			'com_add1'=>$this->input->post('com_add1'),
			'com_add2'=>$this->input->post('com_add2'),
			'com_street_number'=>$this->input->post('com_street_number'),
			'com_add3'=>$this->input->post('com_add3'),
			'com_add4'=>$this->input->post('com_add4'),
			'com_telephone'=>$this->input->post('com_telephone'),
			'com_fax'=>$this->input->post('com_fax'),
			'com_country_id'=>$this->input->post('com_country_id'),
			'com_email'=>$this->input->post('com_email'),
			
			'com_modified'=>date('Y-m-d H:i:s'),
			'com_modified_by'=>$primaryId
			
			);
			
			$result=$this->companyModel->updateCompany($primaryId,$update_data);
			if($result)
			{
				$this->session->set_flashdata('msg','Saved');
				redirect('company');
			}
			else
			{
				$this->index();
			}
			
		}
	}
	
	
}
