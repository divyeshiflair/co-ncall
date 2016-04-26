<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller {

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
		$this->load->model('signup_model');
		
	} 
	public function index()
	{
		$data['title']= 'Home';
		//$this->load->helper('url');
		$this->load->helper('form');
		
		$curLAng=$this->session->userdata('cur_lang_code');
		if(!isset($curLAng)){
			$this->session->set_userdata('cur_lang_code','2');
		}
		$confdata=$this->langsModel->getSignupData($this->session->userdata('cur_lang_code'));
		$data['signUpLangTitle']=$confdata;
		
		
		$this->load->view('templates/front_header',$data);
		$this->load->view('templates/signup',$data);
		$this->load->view('templates/front_footer',$data);

	}
	public function registration()
	{
		$this->load->library('form_validation');
		// field name, error message, validation rules
		$this->form_validation->set_rules('firstname', 'Firstame', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('lastname', 'Lastame', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('mobile', 'Mobile', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
		//$this->form_validation->set_rules('con_password', 'Password Confirmation', 'trim|required|matches[password]');

		if($this->form_validation->run() == FALSE)
		{
			$this->index();
		}
		else
		{
			$result=$this->signup_model->add_user();
			if($result)
			{
				redirect('signin/index');
			}
			else
			{
				$this->index();
			}
			
		}
	}
		/*##########################################
		$this->load->helper('url');
		$this->load->view('templates/front_header');
		$this->load->view('templates/signup');
		$this->load->view('templates/front_footer');*/
	
}
