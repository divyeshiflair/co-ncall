<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {

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
		
		$data['title']= 'Employee';
		//get data from table tbl_employee
		$fetchedData=$this->empModel->getAllEmployees($userId);
		
		$data['confData']=$fetchedData;
		$this->load->helper('form');
		$this->load->view('templates/admin_header',$data);
		$this->load->view('templates/navigation',$data);
		$this->load->view('templates/employee_list',$data);
		$this->load->view('templates/admin_footer',$data);

	}
	public function tabindex($userId)
	{
		//Get the logged in user id
		//$userId=$this->session->userdata('user_id');
		
		$data['title']= 'Employee';
		//get data from table tbl_employee
		$fetchedData=$this->empModel->getAllEmployees($userId);
		
		$data['confData']=$fetchedData;
		$this->load->helper('form');
		$this->load->view('templates/employee_list',$data);

	}
	//open new add Employee page
	public function add_employee()
	{
		$data['title']= 'New Employee';
		//get data from table tbl_employee
		$data['pageSource']= 'add';
			//Get all aCtIvE Responsibility from  tbl_responsibility 
		$fetchedReponsibilityData=$this->empModel->getAllResponsibility();
		$data['reponsibilityData']=$fetchedReponsibilityData;
		
		//Get all aCtIvE Away Message from  tbl_away_message 
		$fetchedAwayMessageData=$this->empModel->getAllAwayMessage();
		$data['awayMessageData']=$fetchedAwayMessageData;
		
		//Get all aCtIvE Job Title from  tbl_jobtitle 
		$fetchedJobTitleData=$this->empModel->getAllJobTitle();
		$data['jobTitleData']=$fetchedJobTitleData;
		
			
		//Get all aCtIvE Call Back Msg from  tbl_callback_message 
		$fetchedCallBackMsgData=$this->empModel->getAllCallBackMsg();
		$data['callBackMsgData']=$fetchedCallBackMsgData;
		
		$this->load->helper('form');
		$this->load->view('templates/admin_header',$data);
		$this->load->view('templates/navigation',$data);
		$this->load->view('templates/employee',$data);
		$this->load->view('templates/admin_footer',$data);

	}
	public function save_employee()
	{
		
		
		// field name, error message, validation rules
		$this->form_validation->set_rules('emp_firstname', 'Firstname', 'trim|required|min_length[1]');
		//$this->form_validation->set_rules('emp_lastname', 'Lastname', 'trim|required|min_length[4]');
		/*$this->form_validation->set_rules('emp_title', 'Job Title', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('emp_responsibility', 'Responsibility', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('emp_away_msg', 'Away Msg', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('emp_business_hour', 'Business Hour', 'trim|required|min_length[1]');
		$this->form_validation->set_rules('emp_telephone', 'Telephone', 'trim|required|min_length[10]');
		$this->form_validation->set_rules('emp_mobile', 'Mobile', 'trim|required|min_length[10]');
		$this->form_validation->set_rules('emp_email', 'Email', 'trim|required|valid_email');
		*/
		if($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('err','error');
			$this->add_employee();
		}
		else
		{
			
			
			$userId=$this->session->userdata('user_id');
		
			$ectt=$this->input->post('emp_call_transfer_telephone');
			if(isset($ectt)){
				$emp_call_transfer_telephone="yes";
			}else{
				$emp_call_transfer_telephone="no";
			}
			
			$ectm=$this->input->post('emp_call_transfer_mobile');
			if(isset($ectm)){
				$emp_call_transfer_mobile="yes";
			}else{
				$emp_call_transfer_mobile="no";
			}
			
			$ecnm=$this->input->post('emp_call_notification_mobile');
			if(isset($ecnm)){
				$emp_call_notification_mobile="yes";
			}else{
				$emp_call_notification_mobile="no";
			}
			
			$ecnt=$this->input->post('emp_call_notification_telephone');
			if(isset($ecnt)){
				$emp_call_notification_telephone="yes";
			}else{
				$emp_call_notification_telephone="no";
			}
			
			//For term and condition
			$ect=$this->input->post('emp_calender_terms');
			if(isset($ect)){
				$emp_calender_terms="yes";
			}else{
				$emp_calender_terms="no";
			}
			
			
			//For telephone number is show or not to other
			$tel_eye_boxVisible=$this->input->post('tel_eye_box');
			if($tel_eye_boxVisible=='yes'){
				$tel_eye_box="yes";
			}else{
				$tel_eye_box="no";
			}
			//For Mobile phone number is show or not to other
			$pho_eye_boxVisible=$this->input->post('pho_eye_box');
			if($pho_eye_boxVisible=='yes'){
				$pho_eye_box="yes";
			}else{
				$pho_eye_box="no";
			}
			
			//For Email is show or not to other
			$ema_eye_boxVisible=$this->input->post('ema_eye_box');
			if($ema_eye_boxVisible=='yes'){
				$ema_eye_box="yes";
			}else{
				$ema_eye_box="no";
			}
			
			$update_data=array(
			'emp_user_id'=>$userId,
			'emp_firstname'=>$this->input->post('emp_firstname'),
			'emp_lastname'=>$this->input->post('emp_lastname'),
			'emp_title'=>$this->input->post('emp_title'),
			'emp_responsibility'=>$this->input->post('emp_responsibility'),
			'emp_away_msg'=>$this->input->post('emp_away_msg'),
			'emp_callback_msg'=>$this->input->post('emp_callback_msg'),
			//'emp_business_hour'=>$this->input->post('emp_business_hour'),
			'emp_telephone'=>$this->input->post('emp_telephone'),
			'emp_telephone_show'=>$tel_eye_box,
			'emp_mobile'=>$this->input->post('emp_mobile'),
			'emp_mobile_show'=>$pho_eye_box,
			'emp_email'=>$this->input->post('emp_email'),
			'emp_email_show'=>$ema_eye_box,
			'emp_other_info'=>$this->input->post('emp_other_info'),
			'emp_call_transfer_telephone'=>$emp_call_transfer_telephone,
			'emp_call_transfer_mobile'=>$emp_call_transfer_mobile,
			'emp_call_notification_mobile'=>$emp_call_notification_mobile,
			'emp_call_notification_telephone'=>$emp_call_notification_telephone,
			'emp_calender_email'=>$this->input->post('emp_calender_email'),
			'emp_calender_password'=>$this->input->post('emp_calender_password'),
			'emp_calender_terms'=>$emp_calender_terms,
			'emp_holiday_from'=>date('Y-m-d',strtotime($this->input->post('emp_holiday_from'))),
			'emp_holiday_to'=>date('Y-m-d',strtotime($this->input->post('emp_holiday_to'))),
			'emp_created'=>date('Y-m-d H:i:s'),
			'emp_created_by'=>$userId,
			'emp_active'=>1
			
			);
			
			$resultLastEmpId=$this->empModel->saveEmployee($update_data);
			$primaryId= str_replace(' ','',$resultLastEmpId);
		
			if(!empty($_FILES['empprofilefile']['name'])){
				$base_PATH="upload_file/employee_image/";
				if ((($_FILES["empprofilefile"]["type"] == "image/gif") || ($_FILES["empprofilefile"]["type"] == "image/jpeg") || ($_FILES["empprofilefile"]["type"] == "image/pjpeg") || ($_FILES["empprofilefile"]["type"] == "image/png")))
				{
					if(!is_dir($base_PATH.$primaryId))
					{
						 mkdir(trim($base_PATH.$primaryId));
					}
					$target_path = $base_PATH.$primaryId."/". basename( $_FILES['empprofilefile']['name']); 
					move_uploaded_file($_FILES['empprofilefile']['tmp_name'], $target_path);
				}
				$update_dataImage=array(
				'emp_profile'=>$_FILES['empprofilefile']['name'],
				);
				$resultImage=$this->empModel->updateEmployee($primaryId,$update_dataImage);

			}
		
		
			
			//Code for just appointment row :: End//Code for normal hour :: Start
			$checkBox=$this->input->post('checkbox_days');
			$combo1=$this->input->post('combo1');
			$combo2=$this->input->post('combo2');
			$weekdays = array("Monday", "Tuesday", "Wednesday", "Thursday","Friday","Saturday","Sunday"); 
			foreach($weekdays as $weekdays){
				if(!empty($checkBox[$weekdays])){
						$update_Sundata=array(
						'biz_emp_id'=>$resultLastEmpId,
						'biz_user_type'=>2,
						'biz_day'=>$weekdays,
						'biz_day_from'=>$combo1[$weekdays],
						'biz_day_to'=>$combo2[$weekdays],
						'biz_created'=>date('Y-m-d H:i:s'),
						'biz_created_by'=>$userId,
						'biz_active'=>1
						);
					$result=$this->empModel->saveEmployeeHours($update_Sundata);
				}else{
						$update_Sundata=array(
						'biz_emp_id'=>$resultLastEmpId,
						'biz_user_type'=>2,
						'biz_day'=>'',
						'biz_day_from'=>'',
						'biz_day_to'=>'',
						'biz_created'=>date('Y-m-d H:i:s'),
						'biz_created_by'=>$userId,
						'biz_active'=>1
						);
					$result=$this->empModel->saveEmployeeHours($update_Sundata);
					}
			}
			//Code for normal hour :: Start
			
			
			
			//Code for lunch hour :: Start
			$lunchtimeChk=$this->input->post('lunchtimeChk');
			$lunchtimeCombo1=$this->input->post('lunchtimeCombo1');
			$lunchtimeCombo2=$this->input->post('lunchtimeCombo2');
			if(!empty($lunchtimeChk)){
						$lunch_Data=array(
						'biz_emp_id'=>$resultLastEmpId,
						'biz_day'=>'Lunch',
						'biz_user_type'=>2,
						'biz_lunch_from'=>$lunchtimeCombo1,
						'biz_lunch_to'=>$lunchtimeCombo2,
						'biz_created'=>date('Y-m-d H:i:s'),
						'biz_created_by'=>$userId,
						'biz_active'=>1
						);
					$resultLunch=$this->empModel->saveEmployeeHours($lunch_Data);
			}else{
				$lunch_Data=array(
						'biz_emp_id'=>$resultLastEmpId,
						'biz_day'=>'',
						'biz_user_type'=>2,
						'biz_lunch_from'=>'',
						'biz_lunch_to'=>'',
						'biz_created'=>date('Y-m-d H:i:s'),
						'biz_created_by'=>$userId,
						'biz_active'=>1
						);
					$resultLunch=$this->empModel->saveEmployeeHours($lunch_Data);
			}
			//Code for lunch hour :: End
			
			
			//Code for just appointment row :: Start
			$just_appointment=$this->input->post('just_appointment');
			$add_Appint=array(
						'biz_emp_id'=>$resultLastEmpId,
						'biz_day'=>'',
						'biz_day_from'=>'',
						'biz_user_type'=>2,
						'biz_day_to'=>'',
						'biz_appointment'=>1,
						'biz_created'=>date('Y-m-d H:i:s'),
						'biz_created_by'=>$userId,
						'biz_active'=>1
						);
			$resultJusAppoint=$this->empModel->saveEmployeeHours($add_Appint);
			
			
			
			if($resultLastEmpId)
			{
				$this->session->set_flashdata('msg','saved');
				redirect('employee');
			}
			else
			{
				$this->add_employee();
			}
			
		}
	}
	
	//Open employee details in edit mode
	public function edit_employee()
	{
		//Get the payment if from url
		$emp_id = $this->uri->segment(3);
		
		$data['title']= 'Edit Employee';
		
		//get data from table tbl_payment
		$fetchedData=$this->empModel->getEmployeeByUserId($emp_id);
		$data['confData']=$fetchedData;
		
		//get data from table tbl_business_hour_employee
		$fetchedHpurData=$this->empModel->getEmployeeHoursByUserId($emp_id);
		$data['hourData']=$fetchedHpurData;
		
		//Get all aCtIvE Responsibility from  tbl_responsibility 
		$fetchedReponsibilityData=$this->empModel->getAllResponsibility();
		$data['reponsibilityData']=$fetchedReponsibilityData;
		
		//Get all aCtIvE Away Message from  tbl_away_message 
		$fetchedAwayMessageData=$this->empModel->getAllAwayMessage();
		$data['awayMessageData']=$fetchedAwayMessageData;
		
		//Get all aCtIvE Job Title from  tbl_jobtitle 
		$fetchedJobTitleData=$this->empModel->getAllJobTitle();
		$data['jobTitleData']=$fetchedJobTitleData;
		
			
		//Get all aCtIvE Call Back Msg from  tbl_callback_message 
		$fetchedCallBackMsgData=$this->empModel->getAllCallBackMsg();
		$data['callBackMsgData']=$fetchedCallBackMsgData;
		
		
		
		$data['pageSource']= 'edit';
		$this->load->helper('form');
		$this->load->view('templates/admin_header',$data);
		$this->load->view('templates/navigation',$data);
		$this->load->view('templates/employee',$data);
		$this->load->view('templates/admin_footer',$data);

	}
	public function update_employee()
	{
		//print_r($_POST);
		//exit;
		
		$userId=$this->session->userdata('user_id');
		
		// field name, error message, validation rules
		$this->form_validation->set_rules('emp_firstname', 'Firstname', 'trim|required|min_length[1]');
		//$this->form_validation->set_rules('emp_lastname', 'Lastname', 'trim|required|min_length[4]');
		/*$this->form_validation->set_rules('emp_title', 'Job Title', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('emp_responsibility', 'Responsibility', 'trim|required|min_length[4]');
		$this->form_validation->set_rules('emp_away_msg', 'Away Msg', 'trim|required|min_length[4]');
	//	$this->form_validation->set_rules('emp_business_hour', 'Business Hour', 'trim|required|min_length[1]');
		$this->form_validation->set_rules('emp_telephone', 'Telephone', 'trim|required|min_length[10]');
		$this->form_validation->set_rules('emp_mobile', 'Mobile', 'trim|required|min_length[10]');
		$this->form_validation->set_rules('emp_email', 'Email', 'trim|required|valid_email');*/
		
		if($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('err','error');
			$this->edit_employee();
		}
		else
		{
			
			$primaryId= str_replace(' ','',$this->input->post('emp_id'));
			$userId=$this->session->userdata('user_id');
			
			$ectt=$this->input->post('emp_call_transfer_telephone');
			if(isset($ectt)){
				$emp_call_transfer_telephone="yes";
			}else{
				$emp_call_transfer_telephone="no";
			}
			
			$ectm=$this->input->post('emp_call_transfer_mobile');
			if(isset($ectm)){
				$emp_call_transfer_mobile="yes";
			}else{
				$emp_call_transfer_mobile="no";
			}
			
			$ecnm=$this->input->post('emp_call_notification_mobile');
			if(isset($ecnm)){
				$emp_call_notification_mobile="yes";
			}else{
				$emp_call_notification_mobile="no";
			}
			
			$ecnt=$this->input->post('emp_call_notification_telephone');
			if(isset($ecnt)){
				$emp_call_notification_telephone="yes";
			}else{
				$emp_call_notification_telephone="no";
			}
			
			//For term and condition
			$ecnt=$this->input->post('emp_calender_terms');
			if(isset($ecnt)){
				$emp_calender_terms="yes";
			}else{
				$emp_calender_terms="no";
			}
			
			//For telephone number is show or not to other
			$tel_eye_boxVisible=$this->input->post('tel_eye_box');
			if($tel_eye_boxVisible=='yes'){
				$tel_eye_box="yes";
			}else{
				$tel_eye_box="no";
			}
			//For Mobile phone number is show or not to other
			$pho_eye_boxVisible=$this->input->post('pho_eye_box');
			if($pho_eye_boxVisible=='yes'){
				$pho_eye_box="yes";
			}else{
				$pho_eye_box="no";
			}
			
			//For Email is show or not to other
			$ema_eye_boxVisible=$this->input->post('ema_eye_box');
			if($ema_eye_boxVisible=='yes'){
				$ema_eye_box="yes";
			}else{
				$ema_eye_box="no";
			}
			
			
		if(!empty($_FILES['empprofilefile']['name'])){
			$base_PATH="upload_file/employee_image/";
			if ((($_FILES["empprofilefile"]["type"] == "image/gif") || ($_FILES["empprofilefile"]["type"] == "image/jpeg") || ($_FILES["empprofilefile"]["type"] == "image/pjpeg") || ($_FILES["empprofilefile"]["type"] == "image/png")) )
			{
				if(!is_dir($base_PATH.$primaryId))
				{
					 mkdir($base_PATH.$primaryId);
				}
				$target_path = $base_PATH.$primaryId."/". basename( $_FILES['empprofilefile']['name']); 
				move_uploaded_file($_FILES['empprofilefile']['tmp_name'], $target_path);
				$update_data=array(
					'emp_user_id'=>$userId,
					'emp_firstname'=>$this->input->post('emp_firstname'),
					'emp_lastname'=>$this->input->post('emp_lastname'),
					'emp_title'=>$this->input->post('emp_title'),
					'emp_responsibility'=>$this->input->post('emp_responsibility'),
					'emp_away_msg'=>$this->input->post('emp_away_msg'),
					'emp_callback_msg'=>$this->input->post('emp_callback_msg'),
					'emp_business_hour'=>$this->input->post('emp_business_hour'),
					'emp_telephone'=>$this->input->post('emp_telephone'),
					'emp_telephone_show'=>$tel_eye_box,
					'emp_mobile'=>$this->input->post('emp_mobile'),
					'emp_mobile_show'=>$pho_eye_box,
					'emp_email'=>$this->input->post('emp_email'),
					'emp_email_show'=>$ema_eye_box,
					'emp_profile'=>$_FILES['empprofilefile']['name'],
					'emp_other_info'=>$this->input->post('emp_other_info'),
					'emp_call_transfer_telephone'=>$emp_call_transfer_telephone,
					'emp_call_transfer_mobile'=>$emp_call_transfer_mobile,
					'emp_call_notification_mobile'=>$emp_call_notification_mobile,
					'emp_call_notification_telephone'=>$emp_call_notification_telephone,
					'emp_calender_email'=>$this->input->post('emp_calender_email'),
					'emp_calender_password'=>$this->input->post('emp_calender_password'),
					'emp_calender_terms'=>$emp_calender_terms,
					'emp_holiday_from'=>date('Y-m-d',strtotime($this->input->post('emp_holiday_from'))),
					'emp_holiday_to'=>date('Y-m-d',strtotime($this->input->post('emp_holiday_to'))),
					'emp_modified'=>date('Y-m-d H:i:s'),
					'emp_modified_by'=>$userId,
					'emp_active'=>1
				);
			}else{
				$update_data=array(
					'emp_user_id'=>$userId,
					'emp_firstname'=>$this->input->post('emp_firstname'),
					'emp_lastname'=>$this->input->post('emp_lastname'),
					'emp_title'=>$this->input->post('emp_title'),
					'emp_responsibility'=>$this->input->post('emp_responsibility'),
					'emp_away_msg'=>$this->input->post('emp_away_msg'),
					'emp_callback_msg'=>$this->input->post('emp_callback_msg'),
					'emp_business_hour'=>$this->input->post('emp_business_hour'),
					'emp_telephone'=>$this->input->post('emp_telephone'),
					'emp_telephone_show'=>$tel_eye_box,
					'emp_mobile'=>$this->input->post('emp_mobile'),
					'emp_mobile_show'=>$pho_eye_box,
					'emp_email'=>$this->input->post('emp_email'),
					'emp_email_show'=>$ema_eye_box,
					'emp_other_info'=>$this->input->post('emp_other_info'),
					'emp_call_transfer_telephone'=>$emp_call_transfer_telephone,
					'emp_call_transfer_mobile'=>$emp_call_transfer_mobile,
					'emp_call_notification_mobile'=>$emp_call_notification_mobile,
					'emp_call_notification_telephone'=>$emp_call_notification_telephone,
					'emp_calender_email'=>$this->input->post('emp_calender_email'),
					'emp_calender_password'=>$this->input->post('emp_calender_password'),
					'emp_calender_terms'=>$emp_calender_terms,
					'emp_holiday_from'=>date('Y-m-d',strtotime($this->input->post('emp_holiday_from'))),
					'emp_holiday_to'=>date('Y-m-d',strtotime($this->input->post('emp_holiday_to'))),
					'emp_modified'=>date('Y-m-d H:i:s'),
					'emp_modified_by'=>$userId,
					'emp_active'=>1
				);
			}
			
			
			
			
		}else{
			$update_data=array(
			'emp_user_id'=>$userId,
			'emp_firstname'=>$this->input->post('emp_firstname'),
			'emp_lastname'=>$this->input->post('emp_lastname'),
			'emp_title'=>$this->input->post('emp_title'),
			'emp_responsibility'=>$this->input->post('emp_responsibility'),
			'emp_away_msg'=>$this->input->post('emp_away_msg'),
			'emp_callback_msg'=>$this->input->post('emp_callback_msg'),
			'emp_business_hour'=>$this->input->post('emp_business_hour'),
			'emp_telephone'=>$this->input->post('emp_telephone'),
			'emp_telephone_show'=>$tel_eye_box,
			'emp_mobile'=>$this->input->post('emp_mobile'),
			'emp_mobile_show'=>$pho_eye_box,
			'emp_email'=>$this->input->post('emp_email'),
			'emp_email_show'=>$ema_eye_box,
			'emp_other_info'=>$this->input->post('emp_other_info'),
			'emp_call_transfer_telephone'=>$emp_call_transfer_telephone,
			'emp_call_transfer_mobile'=>$emp_call_transfer_mobile,
			'emp_call_notification_mobile'=>$emp_call_notification_mobile,
			'emp_call_notification_telephone'=>$emp_call_notification_telephone,
			'emp_calender_email'=>$this->input->post('emp_calender_email'),
			'emp_calender_password'=>$this->input->post('emp_calender_password'),
			'emp_calender_terms'=>$emp_calender_terms,
			'emp_holiday_from'=>date('Y-m-d',strtotime($this->input->post('emp_holiday_from'))),
			'emp_holiday_to'=>date('Y-m-d',strtotime($this->input->post('emp_holiday_to'))),
			'emp_modified'=>date('Y-m-d H:i:s'),
			'emp_modified_by'=>$userId,
			'emp_active'=>1
			
			);
			
		}
		$result=$this->empModel->updateEmployee($primaryId,$update_data);
			
			
			
			//This code is for update emp appintment tbl: tbl_business_hour_employee :: Start
			$just_appointment=$this->input->post('just_appointment');
			$biz_main_id_just_appoint=$this->input->post('biz_main_id_just_appoint');
			if(!empty($just_appointment)){
						$lunch_Data=array(
						'biz_day'=>'',
						'biz_user_type'=>2,
						'biz_day_from'=>'',
						'biz_day_to'=>'',
						'biz_appointment'=>1,
						'biz_modified'=>date('Y-m-d H:i:s'),
						'biz_modified_by'=>$userId,
						'biz_active'=>1
						);
					$resultHour=$this->empModel->updateEmployeeHours($biz_main_id_just_appoint,$lunch_Data);
			}else{
				$lunch_Data=array(
						'biz_day'=>'',
						'biz_day_from'=>'',
						'biz_day_to'=>'',
						'biz_appointment'=>0,
						'biz_modified'=>date('Y-m-d H:i:s'),
						'biz_modified_by'=>$userId,
						'biz_active'=>1
						);
					$resultHour=$this->empModel->updateEmployeeHours($biz_main_id_just_appoint,$lunch_Data);
					
					
					//This code is for update emp hours tbl: tbl_business_hour_employee :: Start
					$checkBox=$this->input->post('checkbox_days');
					$combo1=$this->input->post('combo1');
					$combo2=$this->input->post('combo2');
					$biz_main_id=$this->input->post('biz_main_id');
					$weekdays = array("Monday", "Tuesday", "Wednesday", "Thursday","Friday","Saturday","Sunday"); 
					foreach($weekdays as $weekdays){
						if(!empty($checkBox[$weekdays])){
								$update_SundataDays=array(
								'biz_day'=>$weekdays,
								'biz_day_from'=>$combo1[$weekdays],
								'biz_day_to'=>$combo2[$weekdays],
								'biz_modified'=>date('Y-m-d H:i:s'),
								'biz_modified_by'=>$userId,
								'biz_active'=>1
								);
							$result=$this->empModel->updateEmployeeHours($biz_main_id[$weekdays],$update_SundataDays);
						}else{
								$update_SundataDays=array(
								'biz_day'=>'',
								'biz_day_from'=>'',
								'biz_day_to'=>'',
								'biz_modified'=>date('Y-m-d H:i:s'),
								'biz_modified_by'=>$userId,
								'biz_active'=>1
								);
							$result=$this->empModel->updateEmployeeHours($biz_main_id[$weekdays],$update_SundataDays);
							}
					}
					//This code is for update emp hours tbl: tbl_business_hour_employee :: End
			
			
					//This code is for update emp lunch hours tbl: tbl_business_hour_employee :: Start
					$lunchtimeChk=$this->input->post('lunchtimeChk');
					$lunchtimeCombo1=$this->input->post('lunchtimeCombo1');
					$lunchtimeCombo2=$this->input->post('lunchtimeCombo2');
					$biz_main_id_lunch=$this->input->post('biz_main_id_lunch');
					if(!empty($lunchtimeChk)){
								$lunch_DataArya=array(
								'biz_day'=>'Lunch',
								'biz_lunch_from'=>$lunchtimeCombo1,
								'biz_lunch_to'=>$lunchtimeCombo2,
								'biz_modified'=>date('Y-m-d H:i:s'),
								'biz_modified_by'=>$userId,
								'biz_active'=>1
								);
							$resultHour=$this->empModel->updateEmployeeHours($biz_main_id_lunch,$lunch_DataArya);
					}else{
							$lunch_DataArya=array(
								'biz_day'=>'',
								'biz_lunch_from'=>'',
								'biz_lunch_to'=>'',
								'biz_modified'=>date('Y-m-d H:i:s'),
								'biz_modified_by'=>$userId,
								'biz_active'=>1
								);
							$resultHour=$this->empModel->updateEmployeeHours($biz_main_id_lunch,$lunch_DataArya);
						}
						//This code is for update emp lunch hours tbl: tbl_business_hour_employee :: End
		
		
		
			}
			//This code is for update emp appintment tbl: tbl_business_hour_employee :: Start
		
		
			if($result)
			{
				$this->session->set_flashdata('msg','updated');
				redirect('employee');
			}
			else
			{
				$this->edit_employee();
			}
			
		}
	}
	
	//Delete payment by pay_id
	public function delete_employee($pay_id)
	{
		$data['title']= 'Delete Employee';
		$this->session->set_flashdata('msg','deleted');
		echo $fetchedData=$this->empModel->deletePaymentById($pay_id);
	}
	
	
	//After delete load all data using ajax
	public function afterDeleteEmployeeList()
	{
		//Get the logged in user id
		$userId=$this->session->userdata('user_id');
		
		//get data from table tbl_payment
		$fetchedData=$this->empModel->getAllEmployees();
		
		$data['confData']=$fetchedData;
		$this->load->helper('form');
		$this->load->view('templates/employee_list_after_Delete',$data);
		
	}
	//Configration view
	public function employee_view($empId)
	{
		
		//Get the payment if from url
		$emp_id = $this->uri->segment(3);
		
		$data['title']= 'View Employee';
		
		//get data from table tbl_payment
		$fetchedData=$this->empModel->getEmployeeByUserId($emp_id);
		$data['confData']=$fetchedData;
		
		//get data from table tbl_business_hour_employee
		$fetchedHpurData=$this->empModel->getEmployeeHoursByUserId($emp_id);
		$data['hourData']=$fetchedHpurData;
		
		//Get all aCtIvE Responsibility from  tbl_responsibility 
		$fetchedReponsibilityData=$this->empModel->getAllResponsibility();
		$data['reponsibilityData']=$fetchedReponsibilityData;
		
		//Get all aCtIvE Away Message from  tbl_away_message 
		$fetchedAwayMessageData=$this->empModel->getAllAwayMessage();
		$data['awayMessageData']=$fetchedAwayMessageData;
		
		//Get all aCtIvE Job Title from  tbl_jobtitle 
		$fetchedJobTitleData=$this->empModel->getAllJobTitle();
		$data['jobTitleData']=$fetchedJobTitleData;
		
			
		//Get all aCtIvE Call Back Msg from  tbl_callback_message 
		$fetchedCallBackMsgData=$this->empModel->getAllCallBackMsg();
		$data['callBackMsgData']=$fetchedCallBackMsgData;
		
		
		
		$data['pageSource']= 'edit';
		$this->load->helper('form');
		$this->load->view('templates/admin_header',$data);
		$this->load->view('templates/navigation',$data);
		$this->load->view('templates/employee_view',$data);
		$this->load->view('templates/admin_footer',$data);
	

	}
	
	//Get employee list base on user id for view purpose :: @d
	public function employee_list()
	{
		//Get the logged in user id
		$userId=$this->session->userdata('user_id');
		
		$data['title']= 'Employee';
		//get data from table tbl_employee
		$fetchedData=$this->empModel->getAllEmployees($userId);
		
		$data['confData']=$fetchedData;
		$this->load->helper('form');
		$this->load->view('templates/admin_header',$data);
		$this->load->view('templates/navigation',$data);
		$this->load->view('templates/employee_list_view',$data);
		$this->load->view('templates/admin_footer',$data);


	}
}
