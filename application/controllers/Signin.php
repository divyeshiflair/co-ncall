<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signin extends CI_Controller {

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
		$this->load->model('languagemanage_model','langsModel');
		$this->load->model('signin_model');
	} 
	public function index()
	{
		// Show all information, defaults to INFO_ALL
		//phpinfo();
		//echo "<pre>";print_r(apache_get_modules());
		  /*if ($_SERVER['HTTP_MOD_REWRITE'] == 'On') {
		    echo  TRUE;
		  } else {
		    echo  FALSE;
		  }*/
		/*if(!function_exists('apache_get_modules') ){ phpinfo(); exit; }
			 echo $res = 'Module Unavailable';
		if(in_array('mod_rewrite',apache_get_modules())) 
			 echo $res = 'Module Available';
		//in_array('mod_rewrite', apache_get_modules());*/
		//die;
		$data['title']= 'Home';
		//$this->load->helper('url');
		$this->load->helper('form');
		
		
		$curLAng=$this->session->userdata('cur_lang_code');
		if(!isset($curLAng)){
			$this->session->set_userdata('cur_lang_code','2');
		}
		$confdata=$this->langsModel->getSigninData($this->session->userdata('cur_lang_code'));
		$data['signLangTitle']=$confdata;
		
		
		if(($this->session->userdata('user_name')!=""))
		{
			//echo "bypass";die;
			$this->welcome();
		}
		else
		{
			$this->load->view('templates/front_header',$data);
			$this->load->view('templates/signin',$data);
			$this->load->view('templates/front_footer',$data);
		}

	}
	public function welcome()
	{
		$data['title']= 'Welcome';
		$this->load->helper('url');
		/*$this->load->view('templates/admin_header');
		$this->load->view('templates/navigation');
		$this->load->view('templates/dashboard');
		$this->load->view('templates/admin_footer');*/
		redirect('dashboard');
	}
	public function login()
	{	

		$email=$this->input->post('email');
		$password=md5($this->input->post('password'));
		//die;
		$result=$this->signin_model->login($email,$password);
		if($result)
		{
			$this->welcome();
		}
		else
		{
			$this->index();
		}
	}
	
	
}
