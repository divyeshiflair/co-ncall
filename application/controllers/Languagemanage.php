<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Languagemanage extends CI_Controller {

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
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->model('languagemanage_model','langsModel');
		$this->load->helper('url');
		
		$this->load->model('general_model','genModel');
		$this->genModel->validateLogin();
	} 
	public function change_lang()
	{
		$this->session->set_userdata('cur_lang_code',$_POST['langNames']);
		redirect('languagemanage/signin');
	}
	
	public function change_lang_front()
	{
		$this->session->set_userdata('cur_lang_code',$_POST['langNames']);
		redirect($_POST['curr_page']);
	}
	
	
	public function signin()
	{
		$data['title']= 'Sign In ';
		
		$curLAng=$this->session->userdata('cur_lang_code');
		if(!isset($curLAng)){
			$this->session->set_userdata('cur_lang_code','1');
		}
		$confdata=$this->langsModel->getSigninData($this->session->userdata('cur_lang_code'));
		$data['confData']=$confdata;
		
		$confdata=$this->langsModel->getActiveLanguage();
		$data['langData']=$confdata;
		
		
		$this->load->view('templates/admin_header',$data);
		$this->load->view('templates/navigation',$data);
		$this->load->view('templates/lang_signin',$data);
		$this->load->view('templates/admin_footer',$data);
		
	}
	
	public function update_signin()
	{
		
		// field name, error message, validation rules
		$this->form_validation->set_rules('lan_sign_title', 'Title', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('lan_email_label', 'Email label', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('lan_email_text', 'Email placeholder', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('lan_pass_label', 'Password label', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('lan_pass_text', 'Passwprd placeholder', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('lan_sign_button', 'Signup button', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('lan_signup_text', 'Signup text', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('lan_signup_button', 'Registration button', 'trim|required|min_length[4]');
		
		if($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('err','error');
			$this->signin();
		}
		else
		{
			$lan_sign_id=$this->input->post('lan_sign_id');
			$update_data=array(
				'lan_sign_title'=>$this->input->post('lan_sign_title'),
				'lan_email_label'=>$this->input->post('lan_email_label'),
				'lan_email_text'=>$this->input->post('lan_email_text'),
				'lan_pass_label'=>$this->input->post('lan_pass_label'),
				'lan_pass_text'=>$this->input->post('lan_pass_text'),
				'lan_sign_button'=>$this->input->post('lan_sign_button'),
				'lan_signup_text'=>$this->input->post('lan_signup_text'),
				'lan_signup_button'=>$this->input->post('lan_signup_button'),
				'lan_modified'=>date('Y-m-d H:i:s'),
				'lan_modified_by'=>$this->session->userdata('user_id')			
			);
			
			$result=$this->langsModel->updateSignup($lan_sign_id,$update_data);
			if($result)
			{
				$this->session->set_flashdata('msg','updated');
				redirect('languagemanage/signin');
			}
			else
			{
				$this->signin();
			}
			
		}
	}
	
	
	
	///Sigmup section
	
	public function signup()
	{
		$data['title']= 'Sign Up ';
		
		$curLAng=$this->session->userdata('cur_lang_code');
		if(!isset($curLAng)){
			$this->session->set_userdata('cur_lang_code','1');
		}
		$confdata=$this->langsModel->getSignupData($this->session->userdata('cur_lang_code'));
		$data['confData']=$confdata;
		
		$confdata=$this->langsModel->getActiveLanguage();
		$data['langData']=$confdata;
		
		
		$this->load->view('templates/admin_header',$data);
		$this->load->view('templates/navigation',$data);
		$this->load->view('templates/lang_signup',$data);
		$this->load->view('templates/admin_footer',$data);
		
	}
	
	
	public function update_signup()
	{
		//print_r($_POST);exit;
		// field name, error message, validation rules
		$this->form_validation->set_rules('lan_sign_title', 'Title', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('lan_firstname_label', 'Firstname label', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('lan_firstname_text', 'Firstname placeholder', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('lan_lastname_label', 'Lastname label', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('lan_lastname_text', 'Lastname placeholder', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('lan_email_label', 'Email label', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('lan_email_text', 'Email  placeholder', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('lan_pass_label', 'Password label', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('lan_pass_text', 'Password placeholder', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('lan_mobile_label', 'Mobile label', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('lan_mobile_text', 'Mobile placeholder', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('lan_sign_button', 'Signup button', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('lan_signup_text', 'Signup text', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('lan_signin_button', 'Signin button', 'trim|required|min_length[4]');
		
		
		if($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('err','error');
			$this->signup();
		}
		else
		{
			$lan_sign_id=$this->input->post('lan_sign_id');
			$update_data=array(
				'lan_sign_title' => $this->input->post('lan_sign_title'),
				'lan_firstname_label' => $this->input->post('lan_firstname_label'),
				'lan_firstname_text' => $this->input->post('lan_firstname_text'),
				'lan_lastname_label' => $this->input->post('lan_lastname_label'),
				'lan_lastname_text' => $this->input->post('lan_lastname_text'),
				'lan_email_label' => $this->input->post('lan_email_label'),
				'lan_email_text' => $this->input->post('lan_email_text'),
				'lan_pass_label' => $this->input->post('lan_pass_label'),
				'lan_pass_text' => $this->input->post('lan_pass_text'),
				'lan_mobile_label' => $this->input->post('lan_mobile_label'),
				'lan_mobile_text' => $this->input->post('lan_mobile_text'),
				'lan_sign_button' => $this->input->post('lan_sign_button'),
				'lan_signup_text' => $this->input->post('lan_signup_text'),
				'lan_signin_button' => $this->input->post('lan_signin_button'),
				'lan_modified'=>date('Y-m-d H:i:s'),
				'lan_modified_by'=>$this->session->userdata('user_id')	
    	
			);
			
			$result=$this->langsModel->updateSignuppage($lan_sign_id,$update_data);
			if($result)
			{
				$this->session->set_flashdata('msg','updated');
				redirect('languagemanage/signup');
			}
			else
			{
				$this->signup();
			}
			
		}
	}
	
	
	
	///dashboard and header menu  section
	
	public function dashboard()
	{
		$data['title']= 'Dashboard & Header Menu ';
		
		$curLAng=$this->session->userdata('cur_lang_code');
		if(!isset($curLAng)){
			$this->session->set_userdata('cur_lang_code','1');
		}
		$confdata=$this->langsModel->getDashboardData($this->session->userdata('cur_lang_code'));
		$data['confData']=$confdata;
		
		$confdata=$this->langsModel->getActiveLanguage();
		$data['langData']=$confdata;
		
		
		$this->load->view('templates/admin_header',$data);
		$this->load->view('templates/navigation',$data);
		$this->load->view('templates/lang_dashboard',$data);
		$this->load->view('templates/admin_footer',$data);
		
	}
	public function update_dashboard()
	{
		//print_r($_POST);exit;
		// field name, error message, validation rules
		$this->form_validation->set_rules('lan_config_text', 'Configurations label', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('lan_company_text', 'Company label', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('lan_payment_text', 'Payment label', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('lan_employee_text', 'Employee label', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('lan_payment_menu_text', 'Payment menu label', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('lan_plan_table_menu_text', 'Plan table menu label', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('lan_change_pass_menu_text', 'Change password menu label', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('lan_logout_menu_text', 'Logout menu label', 'trim|required|min_length[4]');

		
		if($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('err','error');
			$this->dashboard();
		}
		else
		{
			$lan_sign_id=$this->input->post('lan_sign_id');
			$update_data=array(
				'lan_config_text' => $this->input->post('lan_config_text'),
				'lan_company_text' => $this->input->post('lan_company_text'),
				'lan_payment_text' => $this->input->post('lan_payment_text'),
				'lan_employee_text' => $this->input->post('lan_employee_text'),
				'lan_payment_menu_text' => $this->input->post('lan_payment_menu_text'),
				'lan_plan_table_menu_text' => $this->input->post('lan_plan_table_menu_text'),
				'lan_change_pass_menu_text' => $this->input->post('lan_change_pass_menu_text'),
				'lan_logout_menu_text' => $this->input->post('lan_logout_menu_text'),
				'lan_modified'=>date('Y-m-d H:i:s'),
				'lan_modified_by'=>$this->session->userdata('user_id')	
    		);
			
			$result=$this->langsModel->updateDashboardpage($lan_sign_id,$update_data);
			if($result)
			{
				$this->session->set_flashdata('msg','updated');
				redirect('languagemanage/dashboard');
			}
			else
			{
				$this->dashboard();
			}
			
		}
	}
	
	
	///Left side menu section
	
	public function leftmenu()
	{
		$data['title']= 'Left Menu ';
		
		$curLAng=$this->session->userdata('cur_lang_code');
		if(!isset($curLAng)){
			$this->session->set_userdata('cur_lang_code','1');
		}
		$confdata=$this->langsModel->getLeftmenuData($this->session->userdata('cur_lang_code'));
		$data['confData']=$confdata;
		
		$confdata=$this->langsModel->getActiveLanguage();
		$data['langData']=$confdata;
		
		
		$this->load->view('templates/admin_header',$data);
		$this->load->view('templates/navigation',$data);
		$this->load->view('templates/lang_leftmenu',$data);
		$this->load->view('templates/admin_footer',$data);
		
	}
	
	public function update_leftmenu()
	{
		//print_r($_POST);exit;
		// field name, error message, validation rules
		$this->form_validation->set_rules('lan_dashboard', 'Dashboard', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('lan_call', 'Call', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('lan_configurations', 'Configurations', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('lan_company', 'Company', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('lan_employee', 'Employee', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('lan_analytics', 'Analytics', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('lan_contact', 'Contact', 'trim|required|min_length[4]');
		

		
		if($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('err','error');
			$this->leftmenu();
		}
		else
		{
			$lan_sign_id=$this->input->post('lan_sign_id');
			$update_data=array(
				'lan_dashboard' => $this->input->post('lan_dashboard'),
				'lan_call' => $this->input->post('lan_call'),
				'lan_configurations' => $this->input->post('lan_configurations'),
				'lan_company' => $this->input->post('lan_company'),
				'lan_employee' => $this->input->post('lan_employee'),
				'lan_analytics' => $this->input->post('lan_analytics'),
				'lan_contact' => $this->input->post('lan_contact'),
				'lan_modified'=>date('Y-m-d H:i:s'),
				'lan_modified_by'=>$this->session->userdata('user_id')	
    		);
			
			$result=$this->langsModel->updateLeftmenupage($lan_sign_id,$update_data);
			if($result)
			{
				$this->session->set_flashdata('msg','updated');
				redirect('languagemanage/leftmenu');
			}
			else
			{
				$this->leftmenu();
			}
			
		}
	}
	
	
	
	///configurationspage section
	
	public function configurations()
	{
		$data['title']= 'Configurations ';
		
		$curLAng=$this->session->userdata('cur_lang_code');
		if(!isset($curLAng)){
			$this->session->set_userdata('cur_lang_code','1');
		}
		$confdata=$this->langsModel->getConfigurationsData($this->session->userdata('cur_lang_code'));
		$data['confData']=$confdata;
		
		$confdata=$this->langsModel->getActiveLanguage();
		$data['langData']=$confdata;
		
		
		$this->load->view('templates/admin_header',$data);
		$this->load->view('templates/navigation',$data);
		$this->load->view('templates/lang_configurations',$data);
		$this->load->view('templates/admin_footer',$data);
		
	}
	
	public function update_configurations()
	{
		//print_r($_POST);exit;
		// field name, error message, validation rules
		$this->form_validation->set_rules('lan_page_title_text','Page Title','trim|required|min_length[4]');
		$this->form_validation->set_rules('lan_officenum_text','CallOffice Number','trim|required|min_length[4]'); 
		$this->form_validation->set_rules('lan_greeting_text','Greeting','trim|required|min_length[4]'); 
		$this->form_validation->set_rules('lan_kind_business_text','Business (what kind of Business?)','trim|required|min_length[4]'); 
		$this->form_validation->set_rules('lan_business_hours_text','Business Hours/Global ','trim|required|min_length[4]'); 
		$this->form_validation->set_rules('lan_global_from_text','Holiday global from','trim|required|min_length[4]'); 
		$this->form_validation->set_rules('lan_global_to_text','Holiday global to','trim|required|min_length[4]'); 
		$this->form_validation->set_rules('lan_phone_text','Phone','trim|required|min_length[2]'); 
		$this->form_validation->set_rules('lan_fax_text','Fax','trim|required|min_length[2]'); 
		$this->form_validation->set_rules('lan_email_text','Email','trim|required|min_length[2]'); 
		$this->form_validation->set_rules('lan_url_text','URL','trim|required|min_length[2]'); 
		$this->form_validation->set_rules('lan_away_message_text','General Away Message','trim|required|min_length[4]'); 
		$this->form_validation->set_rules('lan_Call_back_message_text','Global Call Back Message','trim|required|min_length[4]'); 
		$this->form_validation->set_rules('lan_way_to_office_text','Explain the Way to Office','trim|required|min_length[4]'); 
		$this->form_validation->set_rules('lan_addition_info_text','Additional Information','trim|required|min_length[4]'); 
		$this->form_validation->set_rules('lan_email2_text','Email','trim|required|min_length[4]'); 
		$this->form_validation->set_rules('lan_sms_text','SMS','trim|required|min_length[2]'); 
		$this->form_validation->set_rules('lan_button_label','Button Label','trim|required|min_length[4]'); 
		$this->form_validation->set_rules('lan_officenum_place','CallOffice Number Placeholder','trim|required|min_length[4]'); 
		$this->form_validation->set_rules('lan_greeting_place','Greeting Placeholder','trim|required|min_length[4]'); 
		$this->form_validation->set_rules('lan_kind_business_place','Business (what kind of Business?) Placeholder','trim|required|min_length[4]');  
		$this->form_validation->set_rules('lan_business_hours_place','Business Hours/Global Placeholder ','trim|required|min_length[4]'); 
		$this->form_validation->set_rules('lan_global_from_place','Holiday global from Placeholder','trim|required|min_length[4]'); 
		$this->form_validation->set_rules('lan_global_to_place','Holiday global to Placeholder','trim|required|min_length[4]'); 
		$this->form_validation->set_rules('lan_phone_place','Phone Placeholder','trim|required|min_length[4]'); 
		$this->form_validation->set_rules('lan_fax_place','Fax Placeholder','trim|required|min_length[2]'); 	
		$this->form_validation->set_rules('lan_email_place','Email Placeholder','trim|required|min_length[2]'); 
		$this->form_validation->set_rules('lan_url_place','URL Placeholder','trim|required|min_length[2]'); 
		$this->form_validation->set_rules('lan_away_message_place','General Away Message Placeholder','trim|required|min_length[4]'); 
		$this->form_validation->set_rules('lan_Call_back_message_place','Global Call Back Message','trim|required|min_length[4]'); 
		$this->form_validation->set_rules('lan_way_to_office_place','Explain the Way to Office Placeholder','trim|required|min_length[4]'); 
		$this->form_validation->set_rules('lan_addition_info_place','Additional Information Placeholder','trim|required|min_length[4]'); 
		$this->form_validation->set_rules('lan_email2_place','Email Placeholder','trim|required|min_length[4]'); 
		$this->form_validation->set_rules('lan_sms_place','SMS Placeholder','trim|required|min_length[2]'); 
		

		
		if($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('err','error');
			$this->configurations();
		}
		else
		{
			$lan_sign_id=$this->input->post('lan_sign_id');
			$update_data=array(
			    'lan_page_title_text'=> $this->input->post('lan_page_title_text'),
			   'lan_officenum_text'=> $this->input->post('lan_officenum_text'),
			   'lan_greeting_text'=> $this->input->post('lan_greeting_text'),
			   'lan_kind_business_text'=> $this->input->post('lan_kind_business_text'),
			   'lan_business_hours_text'=> $this->input->post('lan_business_hours_text'),
			   'lan_global_from_text'=> $this->input->post('lan_global_from_text'),
			   'lan_global_to_text'=> $this->input->post('lan_global_to_text'),
			   'lan_phone_text'=> $this->input->post('lan_phone_text'),
			   'lan_fax_text'=> $this->input->post('lan_fax_text'),
			   'lan_email_text'=> $this->input->post('lan_email_text'),
			   'lan_url_text'=> $this->input->post('lan_url_text'),
			   'lan_away_message_text'=> $this->input->post('lan_away_message_text'),
			   'lan_Call_back_message_text'=> $this->input->post('lan_Call_back_message_text'),
			   'lan_way_to_office_text'=> $this->input->post('lan_way_to_office_text'),
			   'lan_addition_info_text'=> $this->input->post('lan_addition_info_text'),
			   'lan_email2_text'=> $this->input->post('lan_email2_text'),
			   'lan_sms_text'=> $this->input->post('lan_sms_text'),
			   'lan_button_label'=> $this->input->post('lan_button_label'),
			   'lan_officenum_place'=> $this->input->post('lan_officenum_place'),
			   'lan_greeting_place'=> $this->input->post('lan_greeting_place'),
			   'lan_kind_business_place'=> $this->input->post('lan_kind_business_place'), 
			   'lan_business_hours_place'=> $this->input->post('lan_business_hours_place'),
			   'lan_global_from_place'=> $this->input->post('lan_global_from_place'),
			   'lan_global_to_place'=> $this->input->post('lan_global_to_place'),
			   'lan_phone_place'=> $this->input->post('lan_phone_place'),
			   'lan_fax_place'=> $this->input->post('lan_fax_place'),	
			   'lan_email_place'=> $this->input->post('lan_email_place'),
			   'lan_url_place'=> $this->input->post('lan_url_place'),
			   'lan_away_message_place'=> $this->input->post('lan_away_message_place'),
			   'lan_Call_back_message_place'=> $this->input->post('lan_Call_back_message_place'),
			   'lan_way_to_office_place'=> $this->input->post('lan_way_to_office_place'),
			   'lan_addition_info_place'=> $this->input->post('lan_addition_info_place'),
			   'lan_email2_place'=> $this->input->post('lan_email2_place'),
			   'lan_sms_place'=> $this->input->post('lan_sms_place'),
				'lan_modified'=>date('Y-m-d H:i:s'),
				'lan_modified_by'=>$this->session->userdata('user_id')	
    		);
			
			$result=$this->langsModel->updateConfigurationspage($lan_sign_id,$update_data);
			if($result)
			{
				$this->session->set_flashdata('msg','updated');
				redirect('languagemanage/configurations');
			}
			else
			{
				$this->configurations();
			}
			
		}
	}
	
	
	
	///Days section
	
	public function days()
	{
		$data['title']= 'Days ';
		
		$curLAng=$this->session->userdata('cur_lang_code');
		if(!isset($curLAng)){
			$this->session->set_userdata('cur_lang_code','1');
		}
		$confdata=$this->langsModel->getDaysData($this->session->userdata('cur_lang_code'));
		$data['confData']=$confdata;
		
		$confdata=$this->langsModel->getActiveLanguage();
		$data['langData']=$confdata;
		
		
		$this->load->view('templates/admin_header',$data);
		$this->load->view('templates/navigation',$data);
		$this->load->view('templates/lang_days',$data);
		$this->load->view('templates/admin_footer',$data);
		
	}
	
	public function update_days()
	{

	    $this->form_validation->set_rules('lan_days_title','','trim|required|min_length[4]');
	    $this->form_validation->set_rules('lan_sunday','','trim|required|min_length[4]');
	    $this->form_validation->set_rules('lan_monday','','trim|required|min_length[4]');
	    $this->form_validation->set_rules('lan_tuesday','','trim|required|min_length[4]');
	    $this->form_validation->set_rules('lan_wednesday','','trim|required|min_length[4]');
	    $this->form_validation->set_rules('lan_thursday','','trim|required|min_length[4]');
	    $this->form_validation->set_rules('lan_friday','','trim|required|min_length[4]');
	    $this->form_validation->set_rules('lan_saturday','','trim|required|min_length[4]');
	    $this->form_validation->set_rules('lan_other_title','','trim|required|min_length[4]');
	    $this->form_validation->set_rules('lan_just_appointments','','trim|required|min_length[4]');
		
		if($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('err','error');
			$this->days();
		}
		else
		{
			$lan_sign_id=$this->input->post('lan_sign_id');
			$update_data=array(
				'lan_days_title'=> $this->input->post('lan_days_title'),
				'lan_sign_id'=> $this->input->post('lan_sign_id'),
				'lan_sunday'=> $this->input->post('lan_sunday'),
				'lan_monday'=> $this->input->post('lan_monday'),
				'lan_tuesday'=>$this->input->post('lan_tuesday'),
				'lan_wednesday'=> $this->input->post('lan_wednesday'),
				'lan_thursday'=> $this->input->post('lan_thursday'),
				'lan_friday'=> $this->input->post('lan_friday'),
				'lan_saturday'=> $this->input->post('lan_saturday'),
				'lan_other_title'=> $this->input->post('lan_other_title'),
				'lan_just_appointments'=> $this->input->post('lan_just_appointments'),
				'lan_modified'=>date('Y-m-d H:i:s'),
				'lan_modified_by'=>$this->session->userdata('user_id')	
    		);
			
			$result=$this->langsModel->updateDayspage($lan_sign_id,$update_data);
			if($result)
			{
				$this->session->set_flashdata('msg','updated');
				redirect('languagemanage/days');
			}
			else
			{
				$this->days();
			}
			
		}
	}
	
	
	///Call section
	
	public function calls()
	{
		$data['title']= 'Calls';
		
		$curLAng=$this->session->userdata('cur_lang_code');
		if(!isset($curLAng)){
			$this->session->set_userdata('cur_lang_code','1');
		}
		$confdata=$this->langsModel->getCallsData($this->session->userdata('cur_lang_code'));
		$data['confData']=$confdata;
		
		$confdata=$this->langsModel->getActiveLanguage();
		$data['langData']=$confdata;
		
		
		$this->load->view('templates/admin_header',$data);
		$this->load->view('templates/navigation',$data);
		$this->load->view('templates/lang_calls',$data);
		$this->load->view('templates/admin_footer',$data);
		
	}
	
	public function update_calls()
	{
		//echo "<pre>";print_r($_POST);die;
		$curLAng=$this->session->userdata('cur_lang_code');

		// form validation
	    $this->form_validation->set_rules('lan_button_text','Left button label','trim|required|min_length[4]');
	    $this->form_validation->set_rules('lan_incoming','Incoming Label','trim|required|min_length[4]');
	    $this->form_validation->set_rules('lan_outgoing','Outgoing label','trim|required|min_length[4]');
	    $this->form_validation->set_rules('lan_reminder','Reminder label','trim|required|min_length[4]');
	    $this->form_validation->set_rules('lan_todo','Todo label','trim|required|min_length[4]');
	    $this->form_validation->set_rules('lan_done','Done label','trim|required|min_length[4]');
	    $this->form_validation->set_rules('lan_important','Important label','trim|required|min_length[4]');
	    $this->form_validation->set_rules('lan_spam','Spam label','trim|required|min_length[4]');
	    $this->form_validation->set_rules('lan_trash','Trash label','trim|required|min_length[4]');
	    $this->form_validation->set_rules('lan_right_title','Right header text','trim|required|min_length[4]');
	    $this->form_validation->set_rules('lan_call_for','Call For label','trim|required|min_length[4]');
	    $this->form_validation->set_rules('lan_first','First label','trim|required|min_length[4]');
	    $this->form_validation->set_rules('lan_last','Last label','trim|required|min_length[4]');
	    $this->form_validation->set_rules('lan_company','Company label','trim|required|min_length[4]');
	    $this->form_validation->set_rules('lan_phone1','Phone1 label','trim|required|min_length[4]');
	    $this->form_validation->set_rules('lan_phone2','Phone2 label','trim|required|min_length[4]');
	    $this->form_validation->set_rules('lan_fax','Fax label','trim|required|min_length[4]');
	    $this->form_validation->set_rules('lan_email','Email label','trim|required|min_length[4]');
	    $this->form_validation->set_rules('lan_message','Message Label','trim|required|min_length[4]');
	    $this->form_validation->set_rules('lan_todo_button','Todo button label','trim|required|min_length[4]');
	    $this->form_validation->set_rules('lan_done_button','Done button label','trim|required|min_length[4]');
	    $this->form_validation->set_rules('lan_order_outgoing_button','Outgoing button label','trim|required|min_length[4]');
	    $this->form_validation->set_rules('lan_tag_header','Tag header text','trim|required|min_length[4]');
	    $this->form_validation->set_rules('lan_tag_place','Add tag text','trim|required|min_length[4]');
	    $this->form_validation->set_rules('lan_call_val_header','Call value text','trim|required|min_length[4]');
	    $this->form_validation->set_rules('lan_tag_save_button','Save button text','trim|required|min_length[4]');
	    $this->form_validation->set_rules('lan_no_chat_found_text','No chat history text','trim|required|min_length[4]');
	    $this->form_validation->set_rules('lan_chat_button_text','Chat button title','trim|required|min_length[4]');
	    $this->form_validation->set_rules('lan_back_to_imcoming_text','Back to incoming text','trim|required|min_length[4]');
	    $this->form_validation->set_rules('lan_callback_caller_text','Callback caller text','trim|required|min_length[4]');
	    $this->form_validation->set_rules('lan_mark_as_important_text','Mark as important text','trim|required|min_length[4]');
	    $this->form_validation->set_rules('lan_delete_message_text','Delete message text','trim|required|min_length[4]');
	    $this->form_validation->set_rules('lan_report_spam_text','Report spam text','trim|required|min_length[4]');
			
		if($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('err','error');
			$this->calls();
		}
		else
		{
			$lan_sign_id=$this->input->post('lan_sign_id');
			// array of data
			$update_data=array(
				'lan_button_text'=> $this->input->post('lan_button_text'),
				'lan_incoming'=> $this->input->post('lan_incoming'),
				'lan_outgoing'=> $this->input->post('lan_outgoing'),
				'lan_reminder'=> $this->input->post('lan_reminder'),
				'lan_todo'=>$this->input->post('lan_todo'),
				'lan_done'=> $this->input->post('lan_done'),
				'lan_important'=> $this->input->post('lan_important'),
				'lan_spam'=> $this->input->post('lan_spam'),
				'lan_trash'=> $this->input->post('lan_trash'),
				'lan_right_title'=> $this->input->post('lan_right_title'),
				'lan_call_for'=> $this->input->post('lan_call_for'),
				'lan_first'=> $this->input->post('lan_first'),
				'lan_last'=> $this->input->post('lan_last'),
				'lan_company'=> $this->input->post('lan_company'),
				'lan_phone1'=> $this->input->post('lan_phone1'),
				'lan_phone2'=>$this->input->post('lan_phone2'),
				'lan_fax'=> $this->input->post('lan_fax'),
				'lan_email'=> $this->input->post('lan_email'),
				'lan_message'=> $this->input->post('lan_message'),
				'lan_todo_button'=> $this->input->post('lan_todo_button'),
				'lan_done_button'=> $this->input->post('lan_done_button'),
				'lan_order_outgoing_button'=> $this->input->post('lan_order_outgoing_button'),
				'lan_tag_header'=> $this->input->post('lan_tag_header'),
				'lan_tag_place'=> $this->input->post('lan_tag_place'),
				'lan_call_val_header'=> $this->input->post('lan_call_val_header'),
				'lan_tag_save_button'=> $this->input->post('lan_tag_save_button'),
				'lan_no_chat_found_text'=> $this->input->post('lan_no_chat_found_text'),
				'lan_chat_button_text'=> $this->input->post('lan_chat_button_text'),
				'lan_back_to_imcoming_text'=>$this->input->post('lan_back_to_imcoming_text'),
				'lan_callback_caller_text'=> $this->input->post('lan_callback_caller_text'),
				'lan_mark_as_important_text'=> $this->input->post('lan_mark_as_important_text'),
				'lan_delete_message_text'=> $this->input->post('lan_delete_message_text'),
				'lan_delete_message_text'=> $this->input->post('lan_delete_message_text'),
				'lan_report_spam_text'=> $this->input->post('lan_report_spam_text'),
				'lan_lang_id'=> $curLAng,
				'lan_modified'=>date('Y-m-d H:i:s'),
				'lan_modified_by'=>$this->session->userdata('user_id')	
    		);
			
			$result=$this->langsModel->updateCallspage($lan_sign_id,$update_data);
			if($result)
			{
				$this->session->set_flashdata('msg','updated');
				redirect('languagemanage/calls');
			}
			else
			{
				$this->calls();
			}
			
		}
	}

	///Days section
	
	public function company()
	{
		$data['title']= 'Company';
		
		$curLAng=$this->session->userdata('cur_lang_code');
		if(!isset($curLAng)){
			$this->session->set_userdata('cur_lang_code','1');
		}
		$confdata=$this->langsModel->getDaysData($this->session->userdata('cur_lang_code'));
		$data['confData']=$confdata;
		
		$confdata=$this->langsModel->getActiveLanguage();
		$data['langData']=$confdata;
		
		
		$this->load->view('templates/admin_header',$data);
		$this->load->view('templates/navigation',$data);
		$this->load->view('templates/lang_days',$data);
		$this->load->view('templates/admin_footer',$data);
		
	}
	
	public function update_company()
	{

	    $this->form_validation->set_rules('lan_days_title','','trim|required|min_length[4]');
	    $this->form_validation->set_rules('lan_sunday','','trim|required|min_length[4]');
	    $this->form_validation->set_rules('lan_monday','','trim|required|min_length[4]');
	    $this->form_validation->set_rules('lan_tuesday','','trim|required|min_length[4]');
	    $this->form_validation->set_rules('lan_wednesday','','trim|required|min_length[4]');
	    $this->form_validation->set_rules('lan_thursday','','trim|required|min_length[4]');
	    $this->form_validation->set_rules('lan_friday','','trim|required|min_length[4]');
	    $this->form_validation->set_rules('lan_saturday','','trim|required|min_length[4]');
	    $this->form_validation->set_rules('lan_other_title','','trim|required|min_length[4]');
	    $this->form_validation->set_rules('lan_just_appointments','','trim|required|min_length[4]');
		
		if($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('err','error');
			$this->days();
		}
		else
		{
			$lan_sign_id=$this->input->post('lan_sign_id');
			$update_data=array(
				'lan_days_title'=> $this->input->post('lan_days_title'),
				'lan_sign_id'=> $this->input->post('lan_sign_id'),
				'lan_sunday'=> $this->input->post('lan_sunday'),
				'lan_monday'=> $this->input->post('lan_monday'),
				'lan_tuesday'=>$this->input->post('lan_tuesday'),
				'lan_wednesday'=> $this->input->post('lan_wednesday'),
				'lan_thursday'=> $this->input->post('lan_thursday'),
				'lan_friday'=> $this->input->post('lan_friday'),
				'lan_saturday'=> $this->input->post('lan_saturday'),
				'lan_other_title'=> $this->input->post('lan_other_title'),
				'lan_just_appointments'=> $this->input->post('lan_just_appointments'),
				'lan_modified'=>date('Y-m-d H:i:s'),
				'lan_modified_by'=>$this->session->userdata('user_id')	
    		);
			
			$result=$this->langsModel->updateDayspage($lan_sign_id,$update_data);
			if($result)
			{
				$this->session->set_flashdata('msg','updated');
				redirect('languagemanage/days');
			}
			else
			{
				$this->days();
			}
			
		}
	}

}
