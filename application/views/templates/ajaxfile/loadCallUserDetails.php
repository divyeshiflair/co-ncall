<?php
	// get language title from database
    $confdata = $this->langsModel->getCallsData($this->session->userdata('cur_lang_code'));
    //echo "<pre>";print_r($confdata);die;

    $lan_right_title=$confdata[0]->lan_right_title; 
    $lan_call_for=$confdata[0]->lan_call_for;
    $lan_first=$confdata[0]->lan_first;
    $lan_last=$confdata[0]->lan_last;
    $lan_company=$confdata[0]->lan_company;
    $lan_phone1=$confdata[0]->lan_phone1;
    $lan_phone2=$confdata[0]->lan_phone2;
    $lan_fax=$confdata[0]->lan_fax;
    $lan_email=$confdata[0]->lan_email;
    $lan_message=$confdata[0]->lan_message;
    $lan_todo_button=$confdata[0]->lan_todo_button;
    $lan_done_button=$confdata[0]->lan_done_button;
    $lan_order_outgoing_button=$confdata[0]->lan_order_outgoing_button;
    $lan_tag_header=$confdata[0]->lan_tag_header;
    $lan_tag_place=$confdata[0]->lan_tag_place;
    $lan_call_val_header=$confdata[0]->lan_call_val_header;
    $lan_tag_save_button=$confdata[0]->lan_tag_save_button;
    $lan_no_chat_found_text=$confdata[0]->lan_no_chat_found_text;
    $lan_chat_button_text=$confdata[0]->lan_chat_button_text;
    $lan_back_to_imcoming_text=$confdata[0]->lan_back_to_imcoming_text;
    $lan_callback_caller_text=$confdata[0]->lan_callback_caller_text;
    $lan_mark_as_important_text=$confdata[0]->lan_mark_as_important_text;
    $lan_delete_message_text=$confdata[0]->lan_delete_message_text;
    $lan_report_spam_text=$confdata[0]->lan_report_spam_text;




    $lan_incoming=$confdata[0]->lan_incoming;
    $lan_outgoing=$confdata[0]->lan_outgoing;
    $lan_reminder=$confdata[0]->lan_reminder;
    $lan_todo=$confdata[0]->lan_todo;
    $lan_done=$confdata[0]->lan_done;
    $lan_important=$confdata[0]->lan_important;
    $lan_spam=$confdata[0]->lan_spam;
    $lan_trash=$confdata[0]->lan_trash;
    
    $dataList = array(
        'incoming' => $lan_incoming,
        'outgoing' => $lan_outgoing,
        'reminder' => $lan_reminder,
        'todo' => $lan_todo,
        'done' => $lan_done,
        'important' => $lan_important,
        'spam' => $lan_spam,
        'trash' => $lan_trash
    );
    
    
    
?>
<script src="<?php echo base_url();?>theme/js/app.plugin.js"></script>
 
 <div class="clearfix padder">
         <h4><i class="fa fa-phone"></i>&nbsp;&nbsp;<?php echo ucfirst($dataList[$parent_name]); ?> Call</h4>
      </div>
 <div class="text-small padder">
 	<div class="block clearfix">
 		<a href="javascript:void(0);" class="thumb-mini inline"><img src="<?php echo base_url();?>theme/images/avatar.jpg" class="img-circle"></a> 
 		<?php echo $lan_call_for;?>
 		<?php echo $callUSerDetails[0]->user_firstname;?>  <?php echo $callUSerDetails[0]->user_lastname;?>
 		<div class="pull-right inline"><?php
 			$fd= $callUSerDetails[0]->call_calldate ." ".$callUSerDetails[0]->call_calltime;
 			echo date('M y',strtotime($callUSerDetails[0]->call_calldate));?> (<em><?php echo timeAgo($fd);?></em>) 
 			<a href="javascript:void(0);" data-toggle="class">
 				<?php
 				if($callUSerDetails[0]->call_is_stared=='no'){?>
 				<a class="doFav mou_poin" ><i class="fa fa-star-o text-muted fa-lg text"></i></a>
 				<?php }else{ ?>
 				<a class="doNotFav mou_poin" ><i class="fa fa-star text-warning fa-lg"></i></a><?php }?>
 				<a href="javascript:void(0);" onclick="setRem('<?php echo $callUSerDetails[0]->call_id;?>');" ><i class="fa fa-clock-o fa-lg"></i></a>
 				<div class="btn-group">
 					<button class="btn btn-white btn-xs" data-toggle="tooltip" data-title="Reply"><i class="fa fa-reply"></i></button>
 					<button class="btn btn-white btn-xs dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-down"></i></button>
 					<ul class="dropdown-menu pull-right">
 					<?php 
 					if($callUSerDetails[0]->call_calltype=='incoming' || $callUSerDetails[0]->call_calltype=='Incoming'){}else{?>	
						<li><a href="javascript:void(0);" onclick="markAs('incoming','<?php echo $callUSerDetails[0]->call_id;?>');" ><i class="fa fa-reply"></i> <?php echo $lan_back_to_imcoming_text;?></a></li>
					<?php }?>
 						<li><a href="javascript:void(0);"><i class="fa fa-sign-out"></i> <?php echo $lan_callback_caller_text;?></a></li>
 						<li><a href="javascript:void(0);" onclick="markAs('important','<?php echo $callUSerDetails[0]->call_id;?>');" ><?php echo $lan_mark_as_important_text;?></a></li>
 						<li class="divider"></li>
 						<li><a href="javascript:void(0);" onclick="markAs('trash','<?php echo $callUSerDetails[0]->call_id;?>');" ><?php echo $lan_delete_message_text;?></a></li>
 						<li><a href="javascript:void(0);" onclick="markAs('spam','<?php echo $callUSerDetails[0]->call_id;?>');" ><?php echo $lan_report_spam_text;?></a></li>
 					</ul>
 				</div>
 			</div>
 		</div>
 		<div class="msg_p"><p><?php echo $lan_first;?> : <?php echo $callUSerDetails[0]->call_first;?></p>
 			<p><?php echo $lan_last;?> : <?php echo $callUSerDetails[0]->call_last;?></p>
 			<p><?php echo $lan_company;?> : <?php echo $callUSerDetails[0]->call_company;?></p>
 			<br>
 			<p><?php echo $lan_phone1;?> : <?php echo $callUSerDetails[0]->call_phone1;?></p>   
 			<p><?php echo $lan_phone2;?> : <a href="tel:<?php echo $callUSerDetails[0]->call_phone2;?>"><?php echo $callUSerDetails[0]->call_phone2;?></a></p>   
 			<br>
 			<p><?php echo $lan_fax;?> : </p>   
 			<p><?php echo $lan_email;?> : 
 			<a href="mailto:<?php echo $callUSerDetails[0]->call_email;?>" target="_blank"><?php echo $callUSerDetails[0]->call_email;?></a>
 			</p>   
 			<br>
 			<p><?php echo $lan_message;?> : <?php echo $callUSerDetails[0]->call_message;?></p> </div>
 			<div class="row">
 				<div class="col-sm-6">
 					<div class="btn-group " data-toggle="buttons">
 						<label class="btn btn-sm btn-white <?php if($callUSerDetails[0]->call_calltype=="todo"){ echo "active";} ?>">
 							<input type="radio" name="options" id="option1" onchange="markAs('todo','<?php echo $callUSerDetails[0]->call_id;?>');" value="todo"> <?php echo $lan_todo_button;?>
 						</label>
 						<label class="greenBg  btn btn-sm btn-white  <?php if($callUSerDetails[0]->call_calltype=="done"){ echo "active";} ?>">
 							<input type="radio" name="options" id="option2" onchange="markAs('done','<?php echo $callUSerDetails[0]->call_id;?>');" value="done"> <?php echo $lan_done_button;?>
 						</label>
 					</div>
 				</div>
 				<div class="col-sm-6 ">
 					<a href="<?php echo base_url();?>call/loadPopup/<?php echo $callUSerDetails[0]->call_id;?>"  class=" thisishover btn-sm btn-white m-b iframe pull-right ">
 					<?php echo $lan_order_outgoing_button;?></a>
 				</div>
 			</div>
 			<p></p>
				<h4><?php echo $lan_tag_header;?></h4>
				<div id="MyPillbox" class="pillbox clearfix m-b">
                  <ul>
                    <div id="loadPillAread">
						<?php
						if(!empty($allPill)){
							$minEC=1;
							foreach($allPill as $allPill){
								if($minEC==1){
									$tagSC= "label bg-success";
									$minEC++;
								}else if($minEC==2){
									$tagSC= "label bg-default ";
									$minEC++;
								}else if($minEC==3){
									$tagSC= "label bg-warning ";
									$minEC=1;
								}
								?>
								<li onclick="addPillValue('<?php echo $allPill->call_id;?>')" class="<?php echo $tagSC;?>"><?php echo $allPill->call_pill_title;?>&nbsp;&nbsp;&nbsp;&nbsp;<span class="removePill" id="<?php echo $allPill->call_id;?>">X</span></li>
							<?php
							}
						}
					?>
                    </div>
                    <input type="text" id="addNEwPill" placeHolder="<?php echo $lan_tag_place;?>">
                    <input type="hidden" id="callIdPill"  value="<?php echo $callUSerDetails[0]->call_id;?>">
                  </ul>
                </div>
				<p></p>
 				<div id="pillValueDiv">
					<h4><?php echo $lan_call_val_header;?></h4>
						<div class="input-group">
						  <input type="text" class="form-control" placeholder="1000">
						  <span class="input-group-btn">
							<button type="button" class="btn btn-white"><?php echo $lan_tag_save_button;?></button>
						  </span>
						</div>
				
                 </div>
               <p></p>
 			<!-- .comment-list -->

 			<section class="comment-list block">
 				<div class="loadAllcomment">
 					<?php
 					if(!empty($commentUSerDetails)){
 						foreach($commentUSerDetails as $commentUSerDetails){
 							$fulllNAme=$commentUSerDetails->user_firstname ." " .$commentUSerDetails->user_lastname ;
 							?>
 							<article id="comment-id-1" class="comment-item media arrow arrow-left">
 								<a class="pull-left thumb-small avatar"><img src="<?php echo base_url();?>theme/images/avatar.jpg" class="img-circle"></a>
 								<section class="media-body panel">
 									<header class="panel-heading clearfix">
 										<a href="javascript:void(0);"><?php echo $fulllNAme;?></a>
 										<span class="text-muted m-l-small pull-right"><i class="fa fa-clock-o"></i> <?php echo timeAgo($commentUSerDetails->com_created);?></span>
 									</header>
 									<div class="panel-body">
 										<div><?php echo $commentUSerDetails->com_comment;?></div>

 									</div>
 								</section>
 							</article>
 							<?php }
 						}else{
 							?><div class="topCenter">
 							<div class="panel-body">
 								<div><?php echo $lan_no_chat_found_text;?></div>
 							</div>
 						</div>
 						<?php
 					}?>
 				</div>
 				<!-- comment form -->
 				<article class="comment-item media" id="comment-form">
 					<a class="pull-left thumb-small avatar"><img src="<?php echo base_url();?>theme/images/avatar.jpg" class="img-circle"></a>
 					<section class="media-body">
 						<form action="#" class="m-b-none" name="submitCommentForm" >
 							<input type="hidden" name="call_curCallID" id="call_curCallID"  value="<?php echo $callUSerDetails[0]->call_id;?>" class="form-control">
 							<div class="input-group">
 								<input type="text" name="call_comments" id="call_comments"  placeholder="Your message to a operator" class="form-control">
 								<span class="input-group-btn">
 									<button class="btn post_com_btn btn-primary" id="sumitComment" type="submit">
 										<?php echo ucfirst($lan_chat_button_text);?>
 									</button>
 								</span>
 							</div>
 						</form>
 					</section>
 				</article>
 			</section>

 			<!-- / .comment-list -->
 		</div>
<script type="text/javascript">
	function setRem(id) {
			//alert(id);
			var ajax_value_file = '<?php echo base_url();?>call/ajaxReminder';
			$.ajax({
				type: "POST",
				url: ajax_value_file,
				data: "callid=" + id,
				beforeSend: function () {
			$("#loading_div").show();
			},
			complete: function () {
				$("#loading_div").hide();
			},
			success: function (msg) {
					if (msg != "") {
						$("#reminderSection").html(msg);

					}
				}
			});
		}
		
		function minePillAdd(pillname)
		{
			var call_id=$("#callIdPill").val();
			var ajax_value_file = '<?php echo base_url();?>call/addPillCall';
			$.ajax({
				type: "POST",
				url: ajax_value_file,
				data: "callid=" + call_id+"&pillname="+pillname,
				beforeSend: function () {
			$("#loading_div").show();
			},
			complete: function () {
				$("#loading_div").hide();
			},
			success: function (msg) {
						$("#loadPillAread").html("");
						$("#loadPillAread").html(msg);

					
				}
			});
		}
		
		function addPillValue(pillID)
		{
			var ajax_value_file = '<?php echo base_url();?>call/addPillValue';
			$.ajax({
				type: "POST",
				url: ajax_value_file,
				data: "pillID=" + pillID,
				beforeSend: function () {
			$("#loading_div").show();
			},
			complete: function () {
				$("#loading_div").hide();
			},
			success: function (msg) {
					if (msg != "") {
						$("#pillValueDiv").html(msg);

					}
				}
			});
		}
		function deletePill(pillID)
		{
			var ajax_value_file = '<?php echo base_url();?>call/deletePill';
			$.ajax({
				type: "POST",
				url: ajax_value_file,
				data: "pillID=" + pillID,
				beforeSend: function () {
			$("#loading_div").show();
			},
			complete: function () {
				$("#loading_div").hide();
			},
			success: function (msg) {
					if (msg != "") {
						//$("#pillValueDiv").html(msg);
					$("#myModalDelete").modal('show');
					}
				}
			});
		}
		
		
		function submitPrice() {
		
		var callPillPrice=$("#callPillPrice").val();
		var callPillId=$("#callPillId").val();
		var ajax_value_file = '<?php echo base_url();?>call/savePricePill';
		$.ajax({
			type: "POST",
			url: ajax_value_file,
			data: "callPillId=" + callPillId+"&callPillPrice="+callPillPrice,
			beforeSend: function () {
			$("#loading_div").show();
			},
			complete: function () {
				$("#loading_div").hide();
			},
			success: function (msg) {
				if (msg != "") {
					//$("#saveMsg").html(msg);
					$("#myModal").modal('show');

				}
			}
		});
	}


</script>


 		<script>
 			$(document).ready(function(){
 				$(".iframe").colorbox({iframe:true, fastIframe:false, width:"50%", height:"600px", top:"10px", transition:"fade", scrolling   : true });

		//Submit comments
		
		$("#sumitComment").click(function(){
			var ajax_value_file_path = '<?php echo base_url();?>call/saveComment';
			var callId=$("#call_curCallID").val();	
			var comment=$("#call_comments").val();	
			var str = $.trim(comment);
			//alert(str);
			if(str==""){
			}	
			else{
				
				$.ajax({
					type: "POST",
					url: ajax_value_file_path,
					data: "comment="+comment+"&callid="+callId,
					beforeSend: function () {
						$("#loading_div").show();
					},
					complete: function () {
						$("#loading_div").hide();
					},
					success: function (msg) {
						
						$("#call_comments").val('');
						$(".loadAllcomment").html(msg);
					}
				});
			}
			return false;
		});
		//Submit comments
		
		$(".doFav").click(function(){
			var callId=$("#call_curCallID").val();	
			var ajax_value_file_path = '<?php echo base_url();?>call/changeStar';
			$.ajax({
				type: "POST",
				url: ajax_value_file_path,
				data: "curtype=yes"+"&callid="+callId,
				beforeSend: function () {
					$("#loading_div").show();
				},
				complete: function () {
					$("#loading_div").hide();
				},
				success: function (msg) {
					loadDatainDetails(callId);

				}
			});
			return false;
		});
		$(".doNotFav").click(function(){
			var callId=$("#call_curCallID").val();	
			var ajax_value_file_path = '<?php echo base_url();?>call/changeStar';
			$.ajax({
				type: "POST",
				url: ajax_value_file_path,
				data: "curtype=no"+"&callid="+callId,
				beforeSend: function () {
					$("#loading_div").show();
				},
				complete: function () {
					$("#loading_div").hide();
				},
				success: function (msg) {
					
					loadDatainDetails(callId);
				}
			});
			return false;
		});


		

	});
</script>
<style>
	#cboxClose
	{
		border:none !important
	}</style>



	<?php
//echo $time_elapsed = timeAgo("12:11"); //The argument $time_ago is in timestamp (Y-m-d H:i:s)format.

//Function definition

	function timeAgo($time_ago)
	{
		if(date('Y-m-d H:i:s')<$time_ago)
		{
			echo "-";
		}else{

			$time_ago = strtotime($time_ago);
			$cur_time   = time();
			$time_elapsed   = $cur_time - $time_ago;
			$seconds    = $time_elapsed ;
			$minutes    = round($time_elapsed / 60 );
			$hours      = round($time_elapsed / 3600);
			$days       = round($time_elapsed / 86400 );
			$weeks      = round($time_elapsed / 604800);
			$months     = round($time_elapsed / 2600640 );
			$years      = round($time_elapsed / 31207680 );
    // Seconds
			if($seconds <= 60){
				return "just now";
			}
    //Minutes
			else if($minutes <=60){
				if($minutes==1){
					return "one minute ago";
				}
				else{
					return "$minutes minutes ago";
				}
			}
    //Hours
			else if($hours <=24){
				if($hours==1){
					return "an hour ago";
				}else{
					return "$hours hrs ago";
				}
			}
    //Days
			else if($days <= 7){
				if($days==1){
					return "yesterday";
				}else{
					return "$days days ago";
				}
			}
    //Weeks
			else if($weeks <= 4.3){
				if($weeks==1){
					return "a week ago";
				}else{
					return "$weeks weeks ago";
				}
			}
    //Months
			else if($months <=12){
				if($months==1){
					return "a month ago";
				}else{
					return "$months months ago";
				}
			}
    //Years
			else{
				if($years==1){
					return "one year ago";
				}else{
					return "$years years ago";
				}
			}
		}
	}
	?>
	
	
<div id="myModalDelete" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Success</h4>
      </div>
      <div class="modal-body">
        <p>Well done! You successfully deleted the tag. </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
      </div>
    </div>

  </div>
</div>
