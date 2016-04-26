<?php


$dns = "{imap.gmail.com:993/imap/ssl/novalidate-cert}INBOX";
    
    
    $email= "stocktobias.2016@gmail.com";
	$password = "tobias2016";
   

    $openmail = imap_open($dns,$email,$password ) or die("Cannot Connect ".imap_last_error());
    if ($openmail) {

        echo  "You have ".imap_num_msg($openmail). " messages in your inbox";

        for($i=1; $i <= 100; $i++) {

            $header = imap_header($openmail,$i);
           /// echo "";
            //echo $header->Subject." (".$header->Date.")";
            $msg = imap_fetchbody($openmail,$i,2);
			echo $msg;
			echo "-------------------------------------------------------------------------<br>";
			$SearchS = array('=C2=A0');
			$ReplaceS   = array('');
			$t=str_replace($SearchS,$ReplaceS,$msg);
			
	echo $t;	
$note=<<<XML
<main>
$t
</main>
XML;

				$xml=simplexml_load_string($note);
				$ar[]=xml2array($xml); 
				
        }

	print_r($ar);

exit;
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
				echo $qss="INSERT INTO `tbl_call_mail` (".$keyList.") VALUES (".$valueList.")";
				mysql_query($qss);
			}
				
		}
        /*
        $msgBody = imap_fetchbody ($openmail, $i, "2.1");
        if ($msgBody == "") {
           $portNo = "2.1";
           $msgBody = imap_fetchbody ($openmail, $i, $portNo);
        }

        $msgBody = trim(substr(quoted_printable_decode($msgBody), 0, 200));

        */
        
		$msg = imap_fetchbody($inbox,$email_number,2);
        echo $msg;
        echo "<br>";
        imap_close($openmail);
        
    } else {

        echo "Failed reading messages!!";

    }
    
    	function xml2array($xmlObject,$out = array () )
		{
			foreach ( (array) $xmlObject as $index => $node ){
				$out[$index] = (is_object($node) ) ? xml2array ( $node ) : $node;
			}
			return $out;
		}
    ?>
