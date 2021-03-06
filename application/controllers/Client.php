<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Controller {

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
		$this->load->model('client_model','clientModel');
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
		
		$data['title']= 'Clients';
		//get data from table tbl_user_registration
		$fetchedData=$this->clientModel->getAllClient();
		
		$data['confData']=$fetchedData;
		$this->load->helper('form');
		$this->load->view('templates/admin_header',$data);
		$this->load->view('templates/navigation',$data);
		$this->load->view('templates/client_list',$data);
		$this->load->view('templates/admin_footer',$data);

	}
	
	public function client_view()
	{
		//Get the logged in user id
		$userId=$this->session->userdata('user_id');
		
		$data['title']= 'Clients';
		//get data from table tbl_user_registration
		$fetchedData=$this->clientModel->getAllClient();
		
		$data['confData']=$fetchedData;
		$this->load->helper('form');
		$this->load->view('templates/admin_header',$data);
		$this->load->view('templates/navigation',$data);
		$this->load->view('templates/client_view',$data);
		$this->load->view('templates/admin_footer',$data);

	}
	
	//open new add payment page
	public function add_payment()
	{
		$data['title']= 'Add Payment';
		//get data from table tbl_payment
		$data['pageSource']= 'add';
		$this->load->helper('form');
		$this->load->view('templates/admin_header',$data);
		$this->load->view('templates/navigation',$data);
		$this->load->view('templates/payment',$data);
		$this->load->view('templates/admin_footer',$data);

	}
	public function save_payment()
	{
		
		// field name, error message, validation rules
		$this->form_validation->set_rules('pay_billname', 'Company Name', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('pay_billaddress1', 'Address', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('pay_billaddress2', 'Postal Code', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('pay_billaddress3', 'City', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('pay_billaddress4', 'Department', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('pay_bankaccount', 'Telephone', 'trim|required|min_length[10]');
		$this->form_validation->set_rules('pay_bankname', 'Bank Name', 'trim|required|min_length[10]');
		$this->form_validation->set_rules('pay_iban', 'IBAN', 'trim|required');
		$this->form_validation->set_rules('pay_bic', 'BIC', 'trim|required');
		$this->form_validation->set_rules('pay_billemail', 'Email', 'trim|required|valid_email');
		
		if($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('err','error');
			$this->add_payment();
		}
		else
		{
			$userId=$this->session->userdata('user_id');
			$update_data=array(
			'pay_billname'=>$this->input->post('pay_billname'),
			'pay_user_id'=>$userId,
			'pay_billaddress1'=>$this->input->post('pay_billaddress1'),
			'pay_billaddress2'=>$this->input->post('pay_billaddress2'),
			'pay_billaddress3'=>$this->input->post('pay_billaddress3'),
			'pay_billaddress4'=>$this->input->post('pay_billaddress4'),
			'pay_bankaccount'=>$this->input->post('pay_bankaccount'),
			'pay_bankname'=>$this->input->post('pay_bankname'),
			'pay_iban'=>$this->input->post('pay_iban'),
			'pay_bic'=>$this->input->post('pay_bic'),
			'pay_billemail'=>$this->input->post('pay_billemail'),
			'pay_created'=>date('Y-m-d H:i:s'),
			'pay_created_by'=>$userId,
			'pay_active'=>1
			
			);
			
			$result=$this->payModel->savePayment($update_data);
			if($result)
			{
				$this->session->set_flashdata('msg','saved');
				redirect('payment');
			}
			else
			{
				$this->index();
			}
			
		}
	}
	
	//Open payment details in edit mode
	public function edit_payment()
	{
		//Get the payment if from url
		$pay_id = $this->uri->segment(3);
		
		$data['title']= 'Edit Payment';
		
		//get data from table tbl_payment
		$fetchedData=$this->payModel->getPaymentByUserId($pay_id);
		$data['confData']=$fetchedData;
		
		$data['pageSource']= 'edit';
		$this->load->helper('form');
		$this->load->view('templates/admin_header',$data);
		$this->load->view('templates/navigation',$data);
		$this->load->view('templates/payment',$data);
		$this->load->view('templates/admin_footer',$data);

	}
	
	public function update_payment()
	{
		
		// field name, error message, validation rules
		$this->form_validation->set_rules('pay_billname', 'Company Name', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('pay_billaddress1', 'Address', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('pay_billaddress2', 'Postal Code', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('pay_billaddress3', 'City', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('pay_billaddress4', 'Department', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('pay_bankaccount', 'Bank account name', 'trim|required|min_length[10]');
		$this->form_validation->set_rules('pay_bankname', 'Bank Name', 'trim|required|min_length[10]');
		$this->form_validation->set_rules('pay_iban', 'IBAN', 'trim|required');
		$this->form_validation->set_rules('pay_bic', 'BIC', 'trim|required');
		$this->form_validation->set_rules('pay_billemail', 'Email', 'trim|required|valid_email');
		
		if($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('err','error');
			$this->edit_payment();
		}
		else
		{
			
			$primaryId=$this->input->post('pay_id');
			$userId=$this->session->userdata('user_id');
			$update_data=array(
			'pay_billname'=>$this->input->post('pay_billname'),
			'pay_user_id'=>$userId,
			'pay_billaddress1'=>$this->input->post('pay_billaddress1'),
			'pay_billaddress2'=>$this->input->post('pay_billaddress2'),
			'pay_billaddress3'=>$this->input->post('pay_billaddress3'),
			'pay_billaddress4'=>$this->input->post('pay_billaddress4'),
			'pay_bankaccount'=>$this->input->post('pay_bankaccount'),
			'pay_bankname'=>$this->input->post('pay_bankname'),
			'pay_iban'=>$this->input->post('pay_iban'),
			'pay_bic'=>$this->input->post('pay_bic'),
			'pay_billemail'=>$this->input->post('pay_billemail'),
			'pay_modified'=>date('Y-m-d H:i:s'),
			'pay_modified_by'=>$userId,
			'pay_active'=>1
			
			);
			$result=$this->payModel->updatePayment($primaryId,$update_data);
			if($result)
			{
				$this->session->set_flashdata('msg','saved');
				redirect('payment');
			}
			else
			{
				$this->index();
			}
			
		}
	}
	
	//Delete Client by pay_id
	public function delete_client($cl_id)
	{
		$data['title']= 'Delete Client';
		$this->session->set_flashdata('msg','deleted');
		echo $fetchedData=$this->clientModel->deleteClientById($cl_id);
	}
	
	//After delete load all data using ajax
	public function afterDeletePaymentList()
	{
		//Get the logged in user id
		$userId=$this->session->userdata('user_id');
		
		//get data from table tbl_payment
		$fetchedData=$this->payModel->getAllPayments();
		
		$data['confData']=$fetchedData;
		$this->load->helper('form');
		$this->load->view('templates/payment_list_after_delete',$data);
		
	}
	
}
