<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Operator extends CI_Controller {

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
		$this->load->model('operator_model','optModel');
		$this->load->model('general_model','genModel');
		$this->load->library('form_validation');
		$this->load->helper('form');
		//$this->load->helper('url');
		$this->genModel->validateLogin();

	} 
	public function index()
	{
		//Get the logged in user id
		$userId=$this->session->userdata('user_id');
		
		$data['title']= 'Operator';
		//get data from table tbl_employee
		$fetchedData=$this->optModel->getAllOperator();
			
		$data['confData']=$fetchedData;
		$this->load->helper('form');
		$this->load->view('templates/admin_header',$data);
		$this->load->view('templates/navigation',$data);
		$this->load->view('templates/operator_list',$data);
		$this->load->view('templates/admin_footer',$data);

	}
	//open new add Operator page
	public function add_operator()
	{
		$data['title']= 'New Operator';
		//get data from table tbl_user_registration
		$data['pageSource']= 'add';
		$this->load->helper('form');
		$this->load->view('templates/admin_header',$data);
		$this->load->view('templates/navigation',$data);
		$this->load->view('templates/operator',$data);
		$this->load->view('templates/admin_footer',$data);

	}
	public function save_operator()
	{
		
		// field name, error message, validation rules
		$this->form_validation->set_rules('opt_firstname', 'Firstname', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('opt_lastname', 'Lastname', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('opt_email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('opt_password', 'Password', 'trim|required|min_length[4]|max_length[32]');
		$this->form_validation->set_rules('opt_mobile', 'Mobile', 'trim|required|min_length[10]');
		
		
		if($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('err','error');
			$this->add_operator();
		}
		else
		{
			$userId=$this->session->userdata('user_id');
			$update_data=array(
				'user_firstname'=>$this->input->post('opt_firstname'),
				'user_lastname'=>$this->input->post('opt_lastname'),
				'user_email'=>$this->input->post('opt_email'),
				'user_password'=>md5($this->input->post('opt_password')),
				'user_mobile'=>$this->input->post('opt_mobile'),
				//'user_low'=>implode(',', $this->input->post('low')),
				'user_role'=>3,
				'user_created_by'=>1,
				'user_modified_by'=>1,
				'user_active'=>1
			);
			
			$result=$this->optModel->saveOperator($update_data);
			if($result)
			{
				$this->session->set_flashdata('msg','saved');
				redirect('operator');
			}
			else
			{
				$this->add_operator();
			}
			
		}
	}
	
	//Open Operator details in edit mode
	public function edit_operator()
	{
		//Get the user if from url
		$user_id = $this->uri->segment(3);
		
		$data['title']= 'Edit Operator';
		
		//get data from table tbl_user_registration
		$fetchedData=$this->optModel->getOperatorByUserId($user_id);
		$data['confData']=$fetchedData;
		
		$data['pageSource']= 'edit';
		$this->load->helper('form');
		$this->load->view('templates/admin_header',$data);
		$this->load->view('templates/navigation',$data);
		$this->load->view('templates/operator',$data);
		$this->load->view('templates/admin_footer',$data);

	}
	public function update_operator()
	{
		
		// field name, error message, validation rules
		$this->form_validation->set_rules('opt_firstname', 'Firstname', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('opt_lastname', 'Lastname', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('opt_mobile', 'Mobile', 'trim|required|min_length[10]');
		
		
		if($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('err','error');
			$this->edit_operator();
		}
		else
		{
			$primaryId=$this->input->post('opt_id');
			//$userId=$this->session->userdata('user_id');
			$update_data=array(
				
				'user_firstname'=>$this->input->post('opt_firstname'),
				'user_lastname'=>$this->input->post('opt_lastname'),
				'user_mobile'=>$this->input->post('opt_mobile'),
			);
			
			$result=$this->optModel->updateOperator($primaryId,$update_data);
			if($result)
			{
				$this->session->set_flashdata('msg','updated');
				redirect('operator');
			}
			else
			{
				$this->edit_operator();
			}
			
		}
	}
	
	//Delete user by user_id
	public function delete_operator($user_id)
	{
		$data['title']= 'Delete Operator';
		$this->session->set_flashdata('msg','deleted');
		echo $fetchedData=$this->optModel->deleteOperatorById($user_id);
	}

}
