<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Call extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('operator_model', 'optModel');
        $this->load->model('general_model', 'genModel');
        $this->load->model('call_model', 'callModel');
        $this->load->library('form_validation');
        $this->load->helper('form');
        //$this->load->helper('url');
        $this->genModel->validateLogin();
    }

    public function countMessage($type = null) {
        $count = $this->callModel->countUserByCallType($type);
        return $count;
    }

    public function index() {
        //Get the logged in user id
        $userId = $this->session->userdata('user_id');
        $data['title'] = 'Call';
        $data['counts'] = $this->callModel->countUserByCallType();
        $this->load->helper('form');
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/navigation', $data);

        $this->load->view('templates/call', $data);
        $this->load->view('templates/admin_footer', $data);
    }

    public function loadUser($type = NULL) {
        //Get the logged in user id
        $type = $this->input->post('type');
        if ($type == NULL) {
            $type = 'Incoming';
        }
        $userId = $this->session->userdata('user_id');
        $data['title'] = 'Call';
        $data['type'] = $type;
        //$data['callUSer'] = $this->callModel->getUSerByCallType("Incoming");
        $data['callUSer'] = $this->callModel->getUSerByCallType($type);
        //echo "<pre>";print_r($data['callUSer']);die();
        $this->load->helper('form');
        $this->load->view('templates/ajaxfile/loadCallUser', $data);
        
    }

    public function loadUserDetails($callID = NULL) {
        //Get the logged in user id
        if ($callID != NULL) {
            die('in');
        }
        $userId = $this->session->userdata('user_id');
        $callID = $this->input->post('id');
        $data['parent_name'] = $this->input->post('parent_name');

        $data['callUSerDetails'] = $this->callModel->getUSerByCallTypeByCallID($callID);


        $data['commentUSerDetails'] = $this->callModel->getCommentByCall($callID,$userId);

		//Update statuts to read if user click on mail list.
        $dataState = array(
            'call_is_read' => 'yes'
            );
        $data['callUpdateStatus'] = $this->callModel->updateUSerByCallID($dataState, $callID);
        //Update statuts to read if user click on mail list.

   		$data['allPill'] = $this->callModel->allPillByCallid($callID);

        $data['title'] = 'Call';
        $this->load->helper('form');
        $this->load->view('templates/ajaxfile/loadCallUserDetails', $data);
    }

    public function loadPopup($callID = NULL) 
    {

        //Get the logged in user id
        $userId = $this->session->userdata('user_id');
        $data['callUSerDetails'] = $this->callModel->getUSerByCallTypeByCallID($callID);
        $data['title'] = 'Call';
        $this->load->helper('form');
        $this->load->view('templates/onlycssscript', $data);
        $this->load->view('templates/ajaxfile/loadPopu', $data);
    }
    public function loadPopupouting() 
    {

        //Get the logged in user id
        $userId = $this->session->userdata('user_id');
        //$data['callUSerDetails'] = $this->callModel->getUSerByCallTypeByCallID($callID);
        $data['title'] = 'Call';
        $this->load->helper('form');
        $this->load->view('templates/onlycssscript', $data);
        $this->load->view('templates/ajaxfile/loadPopuout', $data);
    }


    public function callUpdate() {
        $callID = $this->input->post('call_id');
        $data = array(
            'call_first' => $this->input->post('first_name'),
            'call_last' => $this->input->post('last_name'),
            'call_company' => $this->input->post('company'),
            'call_phone1' => $this->input->post('phone1'),
            'call_phone2' => $this->input->post('phone2'),
            'call_email' => $this->input->post('email'),
            'call_message' => $this->input->post('message')
            );
        $data['callUpdateStatus'] = $this->callModel->updateUSerByCallID($data, $callID);
        //$this->index();         
        //redirect(base_url() . 'call/');
        if (!empty($data['callUpdateStatus']) || $data['callUpdateStatus'] != NULL) {
            ?> 
            <script type="text/javascript">
                var id = '<?php echo $callID; ?>';
                //alert('Successfully Updated')
                parent.location.reload();
            </script>
            <?php
        }
    }


    //Save comment for each call
    public function saveComment() {

		//Get the logged in user id
        $userId = $this->session->userdata('user_id');
        $comment=$this->input->post('comment');
        $callid=$this->input->post('callid');
        $dataSet = array(
            'com_call_id' => $callid,
            'com_cli_id' => $userId,
            'com_comment' => $comment,
            'com_created' => date('Y-m-d H:i:s'),
            'com_created_by' => !empty($userId) ? $userId : "",
            'com_active' => 1
            );
        $this->callModel->saveCommentByCall($dataSet);
        $data['commentUSerDetails'] = $this->callModel->getCommentByCall($callid,$userId);
        $this->load->view('templates/ajaxfile/reloadComment', $data);
    }


	//Reload the option Eg: incoming,outgoing,todo etc
    public function loadOption() {
        $this->load->view('templates/ajaxfile/optionReload');
    }


    public function loadUserByFilter($type = NULL) {
        //Get the logged in user id
        $type = $this->input->post('type');
        if ($type == NULL) {
            $type = 'Incoming';
        }
        $userId = $this->session->userdata('user_id');
        $data['title'] = 'Call';
        //$data['callUSer'] = $this->callModel->getUSerByCallType("Incoming");
        $data['callUSer'] = $this->callModel->getUSerByFilter($type);
        //print_r($data['callUSer']);
        // die();
        $this->load->helper('form');
        $this->load->view('templates/ajaxfile/loadCallUser', $data);
        
    }
    
    
    
    //Set stared and unstared 
    public function changeStar() {

        $userId = $this->session->userdata('user_id');
        $type=$this->input->post('curtype');
        $callID = $this->input->post('callid');
        $data = array(
            'call_is_stared' => $type,
            );
        $data['callUSer'] = $this->callModel->setStarCall($data,$callID);
    }


    //Call marked as :: important , todo, done 
    public function markAs() {

        $userId = $this->session->userdata('user_id');
        $type=$this->input->post('type');
        $callID = $this->input->post('callid');
        $data = array(
            'call_calltype' => $type,
            );
        $this->callModel->updateUSerByCallID($data,$callID);
        $this->loadUser($type);
    }
    public function ajaxReminder(){
        $this->load->model('call_model', 'callModel');
        $callId = $_POST['callid'];
        $data['callId'] = $callId;
        $data['reminders'] = $this->callModel->remiderCall($callId);
        //die('model');
        //$this->load->view('templates/onlycssscript');
        $this->load->view('templates/ajaxfile/reminder',$data);
    }
    public function callReminder(){

        $cur = $date = date('Y-m-d', time());
        $userId = $this->session->userdata('user_id');
        

        $data = array(
            'rem_call_id'=>$_POST['call_id'],
            'rem_email'=>$this->input->post('remEmail'),
            'rem_time'=>$this->input->post('remTime'),
            'rem_date'=>$this->input->post('remDate'),
            'rem_active'=>1,
            'rem_created_by' =>$userId,
            'rem_created'=>$cur
            );

        $data['record'] = $this->callModel->setReminderCall($data);
        echo 'Reminder set successfully';
        //redirect(base_url() . 'call/');

    }

	 public function addPillCall(){

		$userId = $this->session->userdata('user_id');
		$data = array(
            'call_call_id' => $this->input->post('callid'),
            'call_pill_title' => $this->input->post('pillname'),
            'call_pill_price' => "",
            'call_created' => date('Y-m-d H:i:s'),
            'call_created_by' => !empty($userId) ? $userId : "",
            'call_active' => 1
            );
		$this->callModel->savePill($data);
		$data['allPill'] = $this->callModel->allPillByCallid($this->input->post('callid'));
		$this->load->view('templates/ajaxfile/allPills',$data);

	}
	
	 public function addPillValue(){

		$userId = $this->session->userdata('user_id');
		$pillId=$this->input->post('pillID');
		$data['pillDetails'] = $this->callModel->getPillByPillId($pillId);
		$this->load->view('templates/ajaxfile/pillValue',$data);

	}
	 public function savePricePill(){

		$callPillId=$this->input->post('callPillId');
		$callPillPrice=$this->input->post('callPillPrice');
		$userId = $this->session->userdata('user_id');
		$data = array(
            'call_pill_price' => $callPillPrice,
         );
		$this->callModel->updatePill($data,$callPillId);
		echo "Call value has been saved";
	}
	
	 public function deletePill(){

		$callPillId=$this->input->post('pillID');
		$this->callModel->deletePill($callPillId);
		echo "deleted";
	}
	

      public function calloutgoing() {
        /*echo $_POST['call_first'];    
        print_r($_POST);
        exit();*/
       // $callID = $this->input->post('call_id');

        $userId = $this->session->userdata('user_id');
        $data = array(
            'call_cli_id' => $userId,
            'call_first' => $_POST['first_name'],
            'call_last' => $_POST['last_name'],
            'call_company' => $_POST['company'],
            'call_phone1' => $_POST['phone1'],
            'call_phone2' => $_POST['phone2'],
            'call_email' => $_POST['email'],
            'call_calltype' => 'outgoing',
            'call_calldate' => date("Y-m-d"),
            'call_calltime' => date("h:i"),
            'call_message' => $_POST['message']
            );
        //print_r($data);exit();
        $data['callUpdateStatus'] = $this->callModel->saveCallFromMail($data);
          //      redirect($_SERVER['REQUEST_URI'], 'refresh'); 
                       redirect('Call/index');
           
        
    }

    public function analytics() {
        $userId = $this->session->userdata('user_id');
        $data['allPilllist'] = $this->callModel->allPillByCallcreatedbylist($userId);
        $data1 = $this->callModel->allPillByCallcreatedby($userId);
        $newArray = array();
        $newArraymy = array();
        if(!empty($data1)){
        foreach ($data1 as $key => $value) {
            
            $newArray[] = $value->call_pill_price;
        }
			foreach ($data1 as $key => $value) {
				
				$newArraymy[] = $value->call_pill_title;
			}
		}
        $data['allPill']= $newArray;
        $data['allPillmy']= $newArraymy;
        $data['cntallPill'] =  count($data['allPill']);
        $data['title'] = 'Analytics';
        $data['counts'] = $this->callModel->countUserByCallType();
        $this->load->helper('form');
        $this->load->view('templates/admin_header', $data);
        $this->load->view('templates/navigation', $data);
        $this->load->view('templates/analytics', $data);
        $this->load->view('templates/admin_footer', $data);
        
    }
    public function analuyticsdate() {
        /*print_r($_POST);
        exit();*/
         $from=$_POST['fromdate'];
         $to=$_POST['todate'];
        $from=date('Y-m-d H:i:s',strtotime($from)); 
        $to=date('Y-m-d H:i:s',strtotime($to)); 
        $userId = $this->session->userdata('user_id');
        $data['allPilllist'] = $this->callModel->allPillByCallcreatedbylistdate($userId,$from,$to);
        $data1 = $this->callModel->allPillByCallcreatedbydate($userId,$from,$to);
        /*print_r($data1);
        exit();
        exit();*/
        $newArray = array();
        $newArraymy = array();
        if($data1){

            foreach ($data1 as $key => $value) {
                
                $newArray[] = $value->call_pill_price;
            }
            foreach ($data1 as $key => $value) {
                
                $newArraymy[] = $value->call_pill_title;
            }
        }
        else{
            $newArray[]="";
            $newArraymy[]="";
        }
        $data['allPill']= $newArray;
        $data['allPillmy']= $newArraymy;
        $data['cntallPill'] =  count($data['allPill']);
        $data['title'] = 'Analytics';
        $data['counts'] = $this->callModel->countUserByCallType();
        $this->load->helper('form');

       
        $this->load->view('templates/analytics', $data);
    }
}
