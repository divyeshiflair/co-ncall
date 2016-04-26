<section id="content">
   <section class="main padder">
      <div class="clearfix">
         <h4><i class="fa fa-edit"></i>Calls</h4> 
      </div>
      <?php
      //Displayed sucess message on view page
         $returnMSG=$this->session->userdata('msg');
         if(!empty($returnMSG)){
         ?>
      <div class="alert alert-success">
         <button data-dismiss="alert" class="close" type="button"><i class="fa fa-times"></i></button>
         <i class="fa fa-check fa-lg"></i><strong>Well done!</strong> dashboard & menu page text has been <?php echo $returnMSG;?> successfully</a>.
      </div>
      <?php 
         }
         ?>
      <?php
         $returnMSGError=$this->session->userdata('err');
         $phpErrors=validation_errors('<p class="error">'); 
         if(!empty($returnMSGError) && !empty($phpErrors)){
         ?>
      <div class="alert alert-danger">
         <button data-dismiss="alert" class="close" type="button"><i class="fa fa-times"></i></button>
         <?php 
            $phpErrors=validation_errors('<p class="error">'); 
            echo $phpErrors;
            ?>
      </div>
      <?php 
         }?>
      <div class="row">
		       <?php echo form_open('languagemanage/update_calls', 'class=form-horizontal data-validate=parsley'); ?>
      <div class="col-sm-6">
         <section class="panel">
            <div class="panel-body configuration-panel-body right-panel-body">
            <div class="form-group">
                  <label class="col-lg-3 control-label">Left button label</label> 
                  <div class="col-lg-8">
                  
                     <input type="text"  maxlength="1024" name="lan_button_text" placeholder="Left button label" value="<?php echo $lan_button_text = set_value('lan_button_text') == false ? $confData[0]->lan_button_text : set_value('lan_button_text');?>" data-required="true"  class="form-control">
                     <input type="hidden"   name="lan_sign_id"  value="<?php echo set_value('lan_sign_id'); ?><?php echo $confData[0]->lan_sign_id;?>" data-required="true"  class="form-control">
                  </div>
               </div>

               <div class="form-group">
                  <label class="col-lg-3 control-label">Incoming label</label>
                  <div class="col-lg-8">
                    <input type="text"  maxlength="1024" name="lan_incoming" placeholder="Incoming label" value="<?php echo $lan_incoming = set_value('lan_incoming') == false ? $confData[0]->lan_incoming : set_value('lan_incoming');?>" data-required="true"  class="form-control">
                  </div>
               </div>

                <div class="form-group">
                  <label class="col-lg-3 control-label">Outgoing label</label>
                  <div class="col-lg-8">
                    <input type="text"  maxlength="1024" name="lan_outgoing" placeholder="Outgoing label" value="<?php echo $lan_outgoing = set_value('lan_outgoing') == false ? $confData[0]->lan_outgoing : set_value('lan_outgoing');?>" data-required="true"  class="form-control">
                  </div>
               </div>
               
                <div class="form-group">
                  <label class="col-lg-3 control-label">Reminder label</label>
                  <div class="col-lg-8">
                    <input type="text"  maxlength="1024" name="lan_reminder" placeholder="Reminder label" value="<?php echo $lan_reminder = set_value('lan_reminder') == false ? $confData[0]->lan_reminder : set_value('lan_reminder');?>" data-required="true"  class="form-control">
                  </div>
               </div>
               
                <div class="form-group">
                  <label class="col-lg-3 control-label">Todo label</label>
                  <div class="col-lg-8">
                    <input type="text"  maxlength="1024" name="lan_todo" placeholder="Todo label" value="<?php echo $lan_todo = set_value('lan_todo') == false ? $confData[0]->lan_todo : set_value('lan_todo');?>" data-required="true"  class="form-control">
                  </div>
               </div>
               
               <div class="form-group">
                  <label class="col-lg-3 control-label">Done label</label>
                  <div class="col-lg-8">
                    <input type="text"  maxlength="1024" name="lan_done" placeholder="Done label"  value="<?php echo $lan_done = set_value('lan_done') == false ? $confData[0]->lan_done : set_value('lan_done');?>" data-required="true"  class="form-control">
                  </div>
               </div>
               
                <div class="form-group">
                  <label class="col-lg-3 control-label">Important label</label>
                  <div class="col-lg-8">
                    <input type="text"  maxlength="1024" name="lan_important" placeholder="Important label" value="<?php echo $lan_important = set_value('lan_important') == false ? $confData[0]->lan_important : set_value('lan_important');?>" data-required="true"  class="form-control">
                  </div>
               </div>

               <div class="form-group">
                  <label class="col-lg-3 control-label">Spam label</label>
                  <div class="col-lg-8">
                    <input type="text"  maxlength="1024" name="lan_spam" placeholder="Spam label" value="<?php echo $lan_spam = set_value('lan_spam') == false ? $confData[0]->lan_spam : set_value('lan_spam');?>" data-required="true"  class="form-control">
                  </div>
               </div>
               
                <div class="form-group">
                  <label class="col-lg-3 control-label">Trash label</label>
                  <div class="col-lg-8">
                    <input type="text"  maxlength="1024" name="lan_trash" placeholder="Trash label" value="<?php echo $lan_trash = set_value('lan_trash') == false ? $confData[0]->lan_trash : set_value('lan_trash');?>" data-required="true"  class="form-control">
                    <div class="line line-dashed m-t-large"></div>
                  </div>
               </div>
               
               <div class="form-group">
                  <label class="col-lg-3 control-label">Right header text </label> 
                  <div class="col-lg-8">
                     <input type="text"  maxlength="1024" name="lan_right_title" placeholder="Right header text" value="<?php echo $lan_right_title = set_value('lan_right_title') == false ? $confData[0]->lan_right_title : set_value('lan_right_title');?>" data-required="true"  class="form-control">
                     <input type="hidden"   name="lan_sign_id"  value="<?php echo set_value('lan_sign_id'); ?><?php echo $confData[0]->lan_sign_id;?>" data-required="true"  class="form-control">
                  </div>
               </div>

               <div class="form-group">
                  <label class="col-lg-3 control-label">Call For label</label>
                  <div class="col-lg-8">
                    <input type="text"  maxlength="1024" name="lan_call_for" placeholder="Call For label" value="<?php echo $lan_call_for = set_value('lan_call_for') == false ? $confData[0]->lan_call_for : set_value('lan_call_for');?>" data-required="true"  class="form-control">
                  </div>
               </div>

                <div class="form-group">
                  <label class="col-lg-3 control-label">First label</label>
                  <div class="col-lg-8">
                    <input type="text"  maxlength="1024" name="lan_first" placeholder="First label" value="<?php echo $lan_first = set_value('lan_first') == false ? $confData[0]->lan_first : set_value('lan_first');?>" data-required="true"  class="form-control">
                  </div>
               </div>
               
                <div class="form-group">
                  <label class="col-lg-3 control-label">Last label</label>
                  <div class="col-lg-8">
                    <input type="text"  maxlength="1024" name="lan_last" placeholder="Last label" value="<?php echo $lan_last = set_value('lan_last') == false ? $confData[0]->lan_last : set_value('lan_last');?>" data-required="true"  class="form-control">
                  </div>
               </div>
               
                <div class="form-group">
                  <label class="col-lg-3 control-label">Company label</label>
                  <div class="col-lg-8">
                    <input type="text"  maxlength="1024" name="lan_company" placeholder="Company label" value="<?php echo $lan_company = set_value('lan_company') == false ? $confData[0]->lan_company : set_value('lan_company');?>" data-required="true"  class="form-control">
                  </div>
               </div>
               
               <div class="form-group">
                  <label class="col-lg-3 control-label">Phone1 label</label>
                  <div class="col-lg-8">
                    <input type="text"  maxlength="1024" name="lan_phone1" placeholder="Phone1 label"  value="<?php echo $lan_phone1 = set_value('lan_phone1') == false ? $confData[0]->lan_phone1 : set_value('lan_phone1');?>" data-required="true"  class="form-control">
                  </div>
               </div>
               
               <div class="form-group">
                  <label class="col-lg-3 control-label">Phone2 label</label>
                  <div class="col-lg-8">
                    <input type="text"  maxlength="1024" name="lan_phone2" placeholder="Phone2 label"  value="<?php echo $lan_phone2 = set_value('lan_phone2') == false ? $confData[0]->lan_phone2 : set_value('lan_phone2');?>" data-required="true"  class="form-control">
                  </div>
               </div>

               <div class="form-group">
                  <label class="col-lg-3 control-label">Fax label</label>
                  <div class="col-lg-8">
                    <input type="text"  maxlength="1024" name="lan_fax" placeholder="Fax label" value="<?php echo $lan_fax = set_value('lan_fax') == false ? $confData[0]->lan_fax : set_value('lan_fax');?>" data-required="true"  class="form-control">
                  </div>
               </div>
         </section>
      </div>
       <div class="col-sm-6">
         <section class="panel">
            <div class="panel-body configuration-panel-body right-panel-body">

               <div class="form-group">
                  <label class="col-lg-3 control-label">Email label</label>
                  <div class="col-lg-8">
                    <input type="text"  maxlength="1024" name="lan_email" placeholder="Email label" value="<?php echo $lan_email = set_value('lan_email') == false ? $confData[0]->lan_email : set_value('lan_email');?>" data-required="true"  class="form-control">
                  </div>
               </div>

                <div class="form-group">
                  <label class="col-lg-3 control-label">Message label</label>
                  <div class="col-lg-8">
                    <input type="text"  maxlength="1024" name="lan_message" placeholder="Message" value="<?php echo $lan_message = set_value('lan_message') == false ? $confData[0]->lan_message : set_value('lan_message');?>" data-required="true"  class="form-control">
                  </div>
               </div>
                       
                <div class="form-group">
                  <label class="col-lg-3 control-label">Todo button label</label>
                  <div class="col-lg-8">
                    <input type="text"  maxlength="1024" name="lan_todo_button" placeholder="Todo button label" value="<?php echo $lan_todo_button = set_value('lan_todo_button') == false ? $confData[0]->lan_todo_button : set_value('lan_todo_button');?>" data-required="true"  class="form-control">
                  </div>
               </div>
                           
                <div class="form-group">
                  <label class="col-lg-3 control-label">Done button label</label>
                  <div class="col-lg-8">
                    <input type="text"  maxlength="1024" name="lan_done_button" placeholder="Done button label" value="<?php echo $lan_done_button = set_value('lan_done_button') == false ? $confData[0]->lan_done_button : set_value('lan_done_button');?>" data-required="true"  class="form-control">
                  </div>
               </div>
               
                <div class="form-group">
                  <label class="col-lg-3 control-label">Outgoing button label</label>
                  <div class="col-lg-8">
                    <input type="text"  maxlength="1024" name="lan_order_outgoing_button" placeholder="Outgoing button label" value="<?php echo $lan_order_outgoing_button = set_value('lan_order_outgoing_button') == false ? $confData[0]->lan_order_outgoing_button : set_value('lan_order_outgoing_button');?>" data-required="true"  class="form-control">
                  </div>
               </div>

                <div class="form-group">
                  <label class="col-lg-3 control-label">Tag header text</label>
                  <div class="col-lg-8">
                    <input type="text"  maxlength="1024" name="lan_tag_header" placeholder="Tag header text" value="<?php echo $lan_tag_header = set_value('lan_tag_header') == false ? $confData[0]->lan_tag_header : set_value('lan_tag_header');?>" data-required="true"  class="form-control">
                  </div>
               </div>
               
               <div class="form-group">
                  <label class="col-lg-3 control-label">Add tag text</label>
                  <div class="col-lg-8">
                    <input type="text"  maxlength="1024" name="lan_tag_place" placeholder="Add tag text" value="<?php echo $lan_tag_place = set_value('lan_tag_place') == false ? $confData[0]->lan_tag_place : set_value('lan_tag_place');?>" data-required="true"  class="form-control">
                  </div>
               </div>
               
               <div class="form-group">
                  <label class="col-lg-3 control-label">Call value text</label>
                  <div class="col-lg-8">
                    <input type="text"  maxlength="1024" name="lan_call_val_header" placeholder="Call value text" value="<?php echo $lan_call_val_header = set_value('lan_call_val_header') == false ? $confData[0]->lan_call_val_header : set_value('lan_call_val_header');?>" data-required="true"  class="form-control">
                  </div>
               </div>
               
               <div class="form-group">
                  <label class="col-lg-3 control-label">Save button text</label>
                  <div class="col-lg-8">
                    <input type="text"  maxlength="1024" name="lan_tag_save_button" placeholder="Save button text" value="<?php echo $lan_tag_save_button = set_value('lan_tag_save_button') == false ? $confData[0]->lan_tag_save_button : set_value('lan_tag_save_button');?>" data-required="true"  class="form-control">
                  </div>
               </div>
               
               <div class="form-group">
                  <label class="col-lg-3 control-label">No chat history text</label>
                  <div class="col-lg-8">
                    <input type="text"  maxlength="1024" name="lan_no_chat_found_text" placeholder="No chat history text" value="<?php echo $lan_no_chat_found_text = set_value('lan_no_chat_found_text') == false ? $confData[0]->lan_no_chat_found_text : set_value('lan_no_chat_found_text');?>" data-required="true"  class="form-control">
                  </div>
               </div> 

               <div class="form-group">
                  <label class="col-lg-3 control-label">Chat button text</label>
                  <div class="col-lg-8">
                    <input type="text"  maxlength="1024" name="lan_chat_button_text" placeholder="chat button title" value="<?php echo $lan_chat_button_text = set_value('lan_chat_button_text') == false ? $confData[0]->lan_chat_button_text : set_value('lan_chat_button_text');?>" data-required="true"  class="form-control">
                  </div>
               </div>
                                
               <div class="form-group">
                  <label class="col-lg-3 control-label">Back to incoming text</label>
                  <div class="col-lg-8">
                    <input type="text"  maxlength="1024" name="lan_back_to_imcoming_text" placeholder="Back to incoming text" value="<?php echo $lan_back_to_imcoming_text = set_value('lan_back_to_imcoming_text') == false ? $confData[0]->lan_back_to_imcoming_text : set_value('lan_back_to_imcoming_text');?>" data-required="true"  class="form-control">
                  </div>
               </div>
                 
               <div class="form-group">
                  <label class="col-lg-3 control-label">Callback caller text</label>
                  <div class="col-lg-8">
                    <input type="text"  maxlength="1024" name="lan_callback_caller_text" placeholder="Callback caller text" value="<?php echo $lan_callback_caller_text = set_value('lan_callback_caller_text') == false ? $confData[0]->lan_callback_caller_text : set_value('lan_callback_caller_text');?>" data-required="true"  class="form-control">
                  </div>
               </div>
                 
               <div class="form-group">
                  <label class="col-lg-3 control-label">Mark as important text</label>
                  <div class="col-lg-8">
                    <input type="text"  maxlength="1024" name="lan_mark_as_important_text" placeholder="Mark as important text" value="<?php echo $lan_mark_as_important_text = set_value('lan_mark_as_important_text') == false ? $confData[0]->lan_mark_as_important_text : set_value('lan_mark_as_important_text');?>" data-required="true"  class="form-control">
                  </div>
               </div>
               
               <div class="form-group">
                  <label class="col-lg-3 control-label">Delete message text</label>
                  <div class="col-lg-8">
                    <input type="text"  maxlength="1024" name="lan_delete_message_text" placeholder="Delete message text" value="<?php echo $lan_delete_message_text = set_value('lan_delete_message_text') == false ? $confData[0]->lan_delete_message_text : set_value('lan_delete_message_text');?>" data-required="true"  class="form-control">
                  </div>
               </div>
                 
               <div class="form-group">
                  <label class="col-lg-3 control-label">Report spam text</label>
                  <div class="col-lg-8">
                    <input type="text"  maxlength="1024" name="lan_report_spam_text" placeholder="Report spam text" value="<?php echo $lan_report_spam_text = set_value('lan_report_spam_text') == false ? $confData[0]->lan_report_spam_text : set_value('lan_report_spam_text');?>" data-required="true"  class="form-control">
                  </div>
               </div>
               
              <div class=" rowcol-lg-samp">&nbsp;</div> 
               <div class="form-group">
                  <div class="col-lg-9 col-lg-offset-3">                      
                     <button type="submit" class="btn btn-primary"> <?php
                     		echo "Update Label";
							 ?>
					</button>
                  </div>
               </div>
             
         </section>
      </div>
        <?php echo form_close(); ?>
   </section>
</section>
<script>
$(document).ready(function(){
var befVal=$("#just_appointment_check").is(':checked') ? 1 : 0;
$("#con_holiday_from,#con_holiday_to").datepicker({autoclose:true});
$('#con_holiday_from,#con_holiday_to').on('changeDate', function(ev){
	$(this).datepicker('hide');
});			
if(befVal=="1"){
		$('.xman').each(function(index) {
				$(this).attr("disabled","disabled");
				$(".xman").addClass("select2-container-disabled");
			});	
			$('.checkboxDesing').each(function(index) {
				$(this).attr("disabled","disabled");
				$(".ebChackbox").addClass("disabled");
				
			});
}
$("#just_appointment_check").on('click',function(){
	var cyrVal=$("#just_appointment_check").is(':checked') ? 1 : 0;
	if(cyrVal=="1"){
			$('.xman').each(function(index) {
				$(this).attr("disabled","disabled");
				$(".xman").addClass("select2-container-disabled");
			});	
			$('.checkboxDesing').each(function(index) {
				$(this).attr("disabled","disabled");
				$(".ebChackbox").addClass("disabled");
				
			});
	}else{
			$('.xman').each(function(index) {
				$(this).attr("disabled",false);
				$(".xman").removeClass("select2-container-disabled");
			});	
			$('.checkboxDesing').each(function(index) {
				$(this).attr("disabled",false);
				$(".ebChackbox").removeClass("disabled");
			});
	}
});
});
</script>
<style>
.type{
color:red;
}
</style>
