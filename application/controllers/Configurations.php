<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Configurations extends CI_Controller {

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
		$this->load->model('configurations_model','confModel');
		$this->load->model('employee_model','empModel');
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
		
		//Listing all configration in datatable
		$data['title']= 'Configurations';
		//$this->load->helper('url');
		$confdata=$this->confModel->getConfigrationByUserId($userId);
		$data['confData']=$confdata;
		
		
		//Data is inserted in tbl_business_hour_employee` if first time user will load the page
		$confHourData=$this->confModel->getConfigEmployeeHoursByUserId($userId);
		$data['hourData']=$confHourData;
		
		$data['pageSource']= 'edit';
			
		$this->load->helper('form');
		$this->load->view('templates/admin_header',$data);
		$this->load->view('templates/navigation',$data);
		$this->load->view('templates/configurations',$data);
		$this->load->view('templates/admin_footer',$data);
		//Get the logged in user id
		
	}
	public function tabindex($userId)
	{
		//Get the logged in user id
		//$userId=$this->session->userdata('user_id');
		
		//Listing all configration in datatable
		$data['title']= 'Configurations';
		//$this->load->helper('url');
		$confdata=$this->confModel->getConfigrationByUserId($userId);
		$data['confData']=$confdata;
		
		//get data from table tbl_business_hour_employee
		$fetchedHpurData=$this->empModel->getEmployeeHoursByUserIduser_id($userId);
		$data['hourData']=$fetchedHpurData;
				
		$this->load->helper('form');
		$this->load->view('templates/configurations_view',$data);


	}
	public function configurations_list()
	{
		//Get the logged in user id
		$userId=$this->session->userdata('user_id');
		
		//Listing all configration in datatable
		$data['title']= 'Configurations';
		//$this->load->helper('url');
		$confdata=$this->confModel->getConfigrationAllUserId($userId);
		
		$data['confData']=$confdata;
		$this->load->helper('form');
		$this->load->view('templates/admin_header',$data);
		$this->load->view('templates/navigation',$data);
		$this->load->view('templates/configurations_list',$data);
		$this->load->view('templates/admin_footer',$data);

	}
	
	//Open add configration page
	public function add_configrations()
	{
		$data['title']= 'Configrations List';
		$this->load->view('templates/admin_header',$data);
		$this->load->view('templates/navigation',$data);
		$this->load->view('templates/configurations',$data);
		$this->load->view('templates/admin_footer',$data);
	}
	
	public function update_configurations()
	{
		//echo "<pre>"; print_r($_POST); exit;
		// field name, error message, validation rules
		$this->form_validation->set_rules('greeting', 'Greeting', 'trim|required|min_length[4]');
	//	$this->form_validation->set_rules('business', 'Business Consultant', 'trim|required|min_length[4]');
		//$this->form_validation->set_rules('g_away_msg', 'Business Away Message', 'trim|required');
	//	$this->form_validation->set_rules('additional', 'Additional Information', 'trim|required|min_length[4]');
		//$this->form_validation->set_rules('con_password', 'Password Confirmation', 'trim|required|matches[password]');

		if($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('err','error');
			$this->index();
		}
		else
		{
			//$daysSelected=implode(",",$this->input->post('daysSelected'));
			$con_id=$this->input->post('con_id');
			$userId=$this->session->userdata('user_id');
			$dayFromArr = $this->input->post('day_start');
			$dayToArr = $this->input->post('day_end');
			
			$update_data=array(
				'con_greeting'=>$this->input->post('greeting'),
				'con_business'=>$this->input->post('business'),
				'con_business_hour'=>'1',
				'con_awy_msg'=>$this->input->post('g_away_msg'),
				'con_callback_msg'=>$this->input->post('callback_msg'),
				'con_way_to_office'=>$this->input->post('way_to_office'),
				'con_additional'=>$this->input->post('additional'),
				'con_contact_phone'=>$this->input->post('contact_phone'),
				'con_contact_fax'=>$this->input->post('contact_fax'),
				'con_contact_email'=>$this->input->post('contact_email'),
				'con_contact_url'=>$this->input->post('contact_url'),
				'con_notification_email'=>$this->input->post('notification_email'),
				'con_notification_email_active'=>$this->input->post('notification_email_active'),
				'con_notification_sms'=>$this->input->post('notification_sms'),
				'con_notification_sms_active'=>$this->input->post('notification_sms_active'),
				'con_calloffice_number'=>$this->input->post('con_calloffice_number'),
				'con_holiday_from'=>date('Y-m-d',strtotime($this->input->post('con_holiday_from'))),
				'con_holiday_to'=>date('Y-m-d',strtotime($this->input->post('con_holiday_to'))),
				//'con_modified'=>date('Y-m-d H:i:s'),
				'con_modified_by'=>$con_id,
				'con_active'=>'1'
			);
			
			$result=$this->confModel->updateConfigurations($con_id,$update_data);
			
			
	
			
		
			
			//This code is for update emp appintment tbl: tbl_business_hour_employee :: Start
			$just_appointment=$this->input->post('just_appointment');
			$biz_main_id_just_appoint=$this->input->post('biz_main_id_just_appoint');
//			print_r($_POST);exit;
			if(isset($just_appointment)){
					$just_appointment_Data=array(
						'biz_day'=>'',
						'biz_user_type'=>1,
						'biz_day_from'=>'',
						'biz_day_to'=>'',
						'biz_appointment'=>1,
						'biz_modified'=>date('Y-m-d H:i:s'),
						'biz_modified_by'=>$userId,
						'biz_active'=>1
						);
					$resultHour=$this->empModel->updateEmployeeHours($biz_main_id_just_appoint,$just_appointment_Data);
			}else{
				$just_appointment_Data=array(
						'biz_day'=>'',
						'biz_day_from'=>'',
						'biz_day_to'=>'',
						'biz_appointment'=>0,
						'biz_modified'=>date('Y-m-d H:i:s'),
						'biz_modified_by'=>$userId,
						'biz_active'=>1
						);
					$resultHour=$this->empModel->updateEmployeeHours($biz_main_id_just_appoint,$just_appointment_Data);
					
					//This code is for update emp hours tbl: tbl_business_hour_employee :: Start
					$checkBox=$this->input->post('checkbox_days');
					$combo1=$this->input->post('combo1');
					$combo2=$this->input->post('combo2');
					$biz_main_id=$this->input->post('biz_main_id');
					$weekdays = array("Monday", "Tuesday", "Wednesday", "Thursday","Friday","Saturday","Sunday"); 
					foreach($weekdays as $weekdays){
						if(!empty($checkBox[$weekdays])){
								$update_Sundata=array(
								'biz_day'=>$weekdays,
								'biz_day_from'=>$combo1[$weekdays],
								'biz_day_to'=>$combo2[$weekdays],
								'biz_modified'=>date('Y-m-d H:i:s'),
								'biz_modified_by'=>$userId,
								'biz_active'=>1
								);
							$result=$this->empModel->updateEmployeeHours($biz_main_id[$weekdays],$update_Sundata);
						}else{
								$update_Sundata=array(
								'biz_day'=>'',
								'biz_day_from'=>'',
								'biz_day_to'=>'',
								'biz_modified'=>date('Y-m-d H:i:s'),
								'biz_modified_by'=>$userId,
								'biz_active'=>1
								);
							$result=$this->empModel->updateEmployeeHours($biz_main_id[$weekdays],$update_Sundata);
							}
					}
					//This code is for update emp hours tbl: tbl_business_hour_employee :: End
					
					//This code is for update emp lunch hours tbl: tbl_business_hour_employee :: Start
					$lunchtimeChk=$this->input->post('lunchtimeChk');
					$lunchtimeCombo1=$this->input->post('lunchtimeCombo1');
					$lunchtimeCombo2=$this->input->post('lunchtimeCombo2');
					$biz_main_id_lunch=$this->input->post('biz_main_id_lunch');
					if(!empty($lunchtimeChk)){
								$lunch_Data=array(
								'biz_emp_id'=>$userId,
								'biz_day'=>'Lunch',
								'biz_lunch_from'=>$lunchtimeCombo1,
								'biz_lunch_to'=>$lunchtimeCombo2,
								'biz_modified'=>date('Y-m-d H:i:s'),
								'biz_modified_by'=>$userId,
								'biz_active'=>1
								);
							$resultHour=$this->empModel->updateEmployeeHours($biz_main_id_lunch,$lunch_Data);
					}else{
							$lunch_Data=array(
								'biz_emp_id'=>$userId,
								'biz_day'=>'',
								'biz_lunch_from'=>'',
								'biz_lunch_to'=>'',
								'biz_modified'=>date('Y-m-d H:i:s'),
								'biz_modified_by'=>$userId,
								'biz_active'=>1
								);
							$resultHour=$this->empModel->updateEmployeeHours($biz_main_id_lunch,$lunch_Data);
						}
						//This code is for update emp lunch hours tbl: tbl_business_hour_employee :: End
				
				
	
			}
			//This code is for update emp appintment tbl: tbl_business_hour_employee :: Start
		
		
			if($result)
			{
				$this->session->set_flashdata('msg','updated');
				redirect('configurations');
			}
			else
			{
				$this->index();
			}
			
		}
	}
	
	//Configration view
	public function config_view($userId)
	{
		
		//Listing all configration in datatable
		$data['title']= 'Configurations';
		//$this->load->helper('url');
		$confdata=$this->confModel->getConfigrationByUserId($userId);
		$data['confData']=$confdata;
		
		//get data from table tbl_business_hour_employee
		$fetchedHpurData=$this->empModel->getEmployeeHoursByUserIduser_id($userId);
		$data['hourData']=$fetchedHpurData;
				
		$this->load->helper('form');
		$this->load->view('templates/admin_header',$data);
		$this->load->view('templates/navigation',$data);
		$this->load->view('templates/configurations_view',$data);
		$this->load->view('templates/admin_footer',$data);
	

	}
	
}
