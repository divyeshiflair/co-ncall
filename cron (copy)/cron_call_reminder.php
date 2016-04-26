<?php
/*
'hostname' => 'localhost',
	'username' => 'dev16web_concall',
	'password' => 'xz,[#iH&.*6X',
	'database' => 'dev16web_concall',
	*/
	
	if($_SERVER['HTTP_HOST']=='192.168.1.57'){
		mysql_connect("localhost","root","");
		mysql_select_db("co-ncall");   
	}else{
		mysql_connect("localhost","dev16web_concall","xz,[#iH&.*6X");
		mysql_select_db("dev16web_concall");   
	}
	$from = "admin@concall.com";
	$qss="SELECT * FROM `tbl_call_reminder` where rem_active=1";
	$queryRs=mysql_query($qss);
	while($rsSet=mysql_fetch_array($queryRs)){
		
		$to= $rsSet['rem_email'];
		$fieldArray['MailSubject']="Call Reminder";
		$q="SELECT * FROM `tbl_call_mail` JOIN `tbl_user_registration` ON `tbl_call_mail`.`call_cli_id` = `tbl_user_registration`.`user_id` WHERE `tbl_call_mail`.`call_id` = '".$rsSet['rem_call_id']."' ORDER BY `tbl_call_mail`.`call_calldate` DESC";
		$qRs=mysql_query($q);
		$dataRs=mysql_fetch_object($qRs); 
		$fieldArray['name']=$dataRs->user_firstname ." ".$dataRs->user_lastname;
		$fieldArray['call_Datetime']=$dataRs->call_calldate ." ".$dataRs->call_calltime;
		$fieldArray['call_type']=$dataRs->call_calltype;
		$fieldArray['call_message']=$dataRs->call_message;
		echo  $rsSet['rem_date']. " ".$rsSet['rem_time'];echo "<br>";
		
		echo $Nitifydatetime= strtotime($rsSet['rem_date']. " ".$rsSet['rem_time']);
		
		echo "<br>";
		echo "SYS=".date('Y-m-d H:i:s');
		echo "<br>";
		echo $systemDatetime=strtotime(date('Y-m-d H:i:s'));
		if($Nitifydatetime>=$systemDatetime){
			echo "No need to send";
		}else{
			echo "Need To send";
			//If Nofication is send then change the status
			echo $nowUPdate="UPDATE `co-ncall`.`tbl_call_reminder` SET `rem_active` = '2' WHERE `tbl_call_reminder`.`rem_call_id` =".$rsSet['rem_call_id']."";
			$nowUPdateRs=mysql_query($nowUPdate);
			//If Nofication is send then change the status
			echo sendMailToUser($from,$to,$fieldArray);

		}
		
	
		echo "<br>";
		
	}
	
	
	
function sendMailToUser($from,$to,$fieldArray)
{	
	$subject = $fieldArray["MailSubject"];
		
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
											<a href=''><img src='images/email_logo.png' alt='ICNJ' title='ICNJ' border='0'></a>
										</td>
									</tr>
									<tr>
										<td valign='top'>
										<h1 style='font-size:16px; font-weight:normal; line-height:22px; margin:0 0 11px 0;'>Dear ,</h1>                            
											<p style='font-size:12px; line-height:16px; margin:0 0 16px 0;'>
												<strong>Call reminder for following information</strong><br/>
												Client Name: ".$fieldArray["name"]."<br/>
												Call date & time: ".$fieldArray["call_Datetime"]."<br/>
												Call type: ".$fieldArray["call_type"]."<br/>
												Call Message: ".$fieldArray["call_message"]."<br/><br/>
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
	  
	  return $message;
}

?>
