<?php
	
	if($_SERVER['HTTP_HOST']=='192.168.1.57'){
			mysql_connect("localhost","root","");
			mysql_select_db("co-ncall");   
		}else{
			mysql_connect("localhost","dev16web_concall","C[]gbE]=vIyG");
			mysql_select_db("dev56web_concall");   
		}
		
$hostname = '{imap.gmail.com:993/imap/ssl}INBOX';
$username = 'stocktobias.2016@gmail.com';
$password = 'tobias2016';



/* try to connect */
$inbox = imap_open($hostname,$username,$password) or die('Cannot connect to Gmail: ' . imap_last_error());

/* grab emails */
//$emails = imap_search($inbox,'SUBJECT "co-ncall-client-incoming-call" ');


//Current day mail seraching
//echo $since = date("d-M-Y", strtotime("-1 days"));
$since = date("d-M-Y");
$emails = imap_search($inbox,'SUBJECT "co-ncall-client-incoming-call" ON "'.$since.'"');

/* if emails are returned, cycle through each... */

if($emails) {
	
	/* begin output var */
	$output = '';
	
	/* put the newest emails on top */
	rsort($emails);
	
	/* for every email... */
	foreach($emails as $email_number) {
		echo "A";
		/* get information specific to this email */
		$overview = imap_fetch_overview($inbox,$email_number,0);
		$message = imap_fetchbody($inbox,$email_number,1);
		$content = iconv('UTF-8', 'UTF-8', $message);

		/* output the email header information */
		/*$output.= '<div class="toggler '.($overview[0]->seen ? 'read' : 'unread').'">';
		$output.= '<span class="subject">'.$overview[0]->subject.'</span> ';
		$output.= '<span class="from">'.$overview[0]->from.'</span>';
		$output.= '<span class="date">on '.$overview[0]->date.'</span>';
		$output.= '</div>';
		
		/* output the email body */
		//$output.= '<div class="body">'.$message.'</div>';
		//$output.= "<hr>";
		$SearchS = array('&lt;', '&gt;', '<span class="3D"im"">','</span>','=C2=A0','<br>','3D',' ');
		$ReplaceS   = array('<', '>', '','','','','','');
		
		echo "<hr>".$t=str_replace($SearchS,$ReplaceS,$content);
		
	
echo $note=<<<XML
<main>
$t
</main>
XML;

				$xml=simplexml_load_string($note);
				$ar[]=xml2array($xml); 
				
	}
	
		
}
$fs=count(@$ar);
if(isset($fs)){
	$countrer=count(@$ar);
}else{
	$countrer=0;
}
if(!empty($ar)){
	$gaaaa=0;
			foreach($ar as $ar){
				$update_data=array(
				
					'call_contactid'=>!empty($ar['contactid'])?$ar['contactid']:"",
					'call_cli_id'=>!empty($ar['clientname'])?$ar['clientname']:"",
					'call_operatorfullname'=>!empty($ar['operatorfullname'])?$ar['operatorfullname']:"",
					'call_calltime'=>!empty($ar['calltime'])?$ar['calltime']:"",
					'call_calldate'=>!empty($ar['calldate'])?date('Y-m-d',strtotime($ar['calldate'])):"",
					'call_callpriority'=>!empty($ar['callpriority'])?$ar['callpriority']:"",
					'call_calltype'=>!empty($ar['calltype'])?$ar['calltype']:"",
					'call_gender'=>!empty($ar['gender'])?$ar['gender']:"",
					'call_first'=>!empty($ar['first'])?$ar['first']:"",
					'call_last'=>!empty($ar['last'])?$ar['last']:"",
					'call_company'=>!empty($ar['company'])?$ar['company']:"",
					'call_phone1'=>!empty($ar['phone1'])?$ar['phone1']:"",
					'call_phone2'=>!empty($ar['phone2'])?$ar['phone2']:"",
					'call_message'=>!empty($ar['message'])?$ar['message']:"",
					'call_telefax'=>!empty($ar['telefax'])?$ar['telefax']:"",
					'call_email'=>!empty($ar['email'])?$ar['email']:"",
					'call_created'=>date('Y-m-d H:i:s'),
					'call_created_by'=>!empty($ar['clientname'])?$ar['clientname']:"",
					'call_active'=>1
			);
			$key=array();
			$value=array();
			foreach($update_data as $k=>$v){
				$key[]="`".$k."`";
				$value[]="'".$v."'";
				
			}
			$keyList=implode(",",$key);
			$valueList=implode(",",$value);
			
			
			//Already entry in db or not
			$contactid= !empty($ar['contactid'])?$ar['contactid']:"";
			$clientname=!empty($ar['clientname'])?$ar['clientname']:"";
			$operatorfullname=!empty($ar['operatorfullname'])?$ar['operatorfullname']:"";
			$calltime=!empty($ar['calltime'])?$ar['calltime']:"";
			$calldate=!empty($ar['calldate'])?date('Y-m-d',strtotime($ar['calldate'])):"";
			$callpriority=!empty($ar['callpriority'])?$ar['callpriority']:"";
			$calltype=!empty($ar['calltype'])?$ar['calltype']:"";
			$gender=!empty($ar['gender'])?$ar['gender']:"";
			$first=!empty($ar['first'])?$ar['first']:"";
			$last=!empty($ar['last'])?$ar['last']:"";
			$company=!empty($ar['company'])?$ar['company']:"";
			$phone1=!empty($ar['phone1'])?$ar['phone1']:"";
			$phone2=!empty($ar['phone2'])?$ar['phone2']:"";
			$message=!empty($ar['message'])?$ar['message']:"";
			
			$qssSelect="select * from tbl_call_mail where call_cli_id='".$clientname."' AND  call_contactid='".$contactid."' AND
			call_operatorfullname='".$operatorfullname."' AND call_calltime='".$calltime."' AND call_calldate='".$calldate."'
			 AND call_callpriority='".$callpriority."' AND call_calltype='".$calltype."' AND call_gender='".$gender."' AND 
			 call_first='".$first."' AND call_last='".$last."' AND call_message='".$message."'  ";
			
			$ChkRS=mysql_query($qssSelect);
			$chkRecords=mysql_fetch_assoc($ChkRS);
			//Already entry in db or not
			if(empty($chkRecords)){
				echo "<hr>";
				$gaaaa++;
				//echo $qss="INSERT INTO `tbl_call_mail` (".$keyList.") VALUES (".$valueList.")";
				//mysql_query($qss);
			}
				
		}
	}else{
		$gaaaa=0;
	}
		
		function xml2array($xmlObject,$out = array () )
		{
			foreach ( (array) $xmlObject as $index => $node ){
				$out[$index] = (is_object($node) ) ? xml2array ( $node ) : $node;
			}
			return $out;
		} 

/* close the connection */
imap_close($inbox);


$from="stocktobias.2016@gmail.com";
$to="kinjal.patel@iflair.com,divyesh.patoriya@iflair.com";
echo sendMailToUser($from,$to,$countrer,@$gaaaa);



function sendMailToUser($from,$to,$countrer,$countrerNEWInsert)
{	
	$subject = "Cron :: Co-ncall";
		
	$headers = "MIME-Version: 1.0\n";
	$headers .= "Content-type: text/html; charset=iso-8859-1\n";
	$headers .= "Content-Transfer-Encoding: 8bit\n";
	$headers .= "From: ".$from."\n";
	//$headers .= "Cc: ".$cc."\r\n";
	//$headers .= "Bcc: ".$bcc."\r\n";
	$headers .= "X-Priority: 1\n";
	$headers .= "X-MSMail-Priority: High\n";
	$headers .= "X-Mailer: PHP/" . phpversion()."\n";
					
	 $message="<body style='background:#F6F6F6; font-family:Calibri; font-size:12px; margin:0; padding:0;'>
				<div style='background:#F6F6F6; font-family:Calibri; font-size:12px; margin:0; padding:0;'>
				<table cellspacing='0' cellpadding='0' border='0' height='100%' width='100%'>
						<tr>
							<td align='center' valign='top' style='padding:20px 0 20px 0'>
								<table bgcolor='FFFFFF' cellspacing='0' cellpadding='10' border='0' width='650' style='border:1px solid #E0E0E0;'>
									<tr>
										<td valign='top' bgcolor='#003600'>
										</td>
									</tr>
									<tr>
										<td valign='top'>
										<h1 style='font-size:16px; font-weight:normal; line-height:22px; margin:0 0 11px 0;'>Dear,</h1>                            
											<p style='font-size:12px; line-height:16px; margin:0 0 16px 0;'>
												<strong>Cron job information</strong><br/>
												Total New mail : ".$countrer."<br/>
												New Record Inserted : ".$countrerNEWInsert."<br/>
												Date Time :". date('Y-m-d h:i:s')."<br/>
												Thanks, <br/>
												Team Co-Ncall 
											</p>                            
										</td>
									</tr>                    
								</table>
							</td>
						</tr>
					</table>
				</div>
			</body>";
		
	  if(@mail($to,$subject,$message,$headers))
	  {			
			return 1;
	  }
	  else
	  {
			return 0;
	  }
	  
	  
}

?>
