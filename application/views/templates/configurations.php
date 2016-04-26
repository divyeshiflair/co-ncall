<?php 
	$confdata=$this->langsModel->getConfigurationsData($this->session->userdata('cur_lang_code'));
	
	$lan_page_title_text=$confdata[0]->lan_page_title_text;
    $lan_officenum_text=$confdata[0]->lan_officenum_text; 
    $lan_greeting_text=$confdata[0]->lan_greeting_text;
    $lan_kind_business_text=$confdata[0]->lan_kind_business_text;
	$lan_business_hours_text=$confdata[0]->lan_business_hours_text;
	$lan_global_from_text=$confdata[0]->lan_global_from_text;
	$lan_global_to_text=$confdata[0]->lan_global_to_text;
	$lan_phone_text=$confdata[0]->lan_phone_text;
	$lan_fax_text=$confdata[0]->lan_fax_text;
	$lan_email_text=$confdata[0]->lan_email_text;
	$lan_url_text=$confdata[0]->lan_url_text;
	$lan_away_message_text=$confdata[0]->lan_away_message_text;
	$lan_Call_back_message_text=$confdata[0]->lan_Call_back_message_text;
	$lan_way_to_office_text=$confdata[0]->lan_way_to_office_text;
	$lan_addition_info_text=$confdata[0]->lan_addition_info_text;
	$lan_email2_text=$confdata[0]->lan_email2_text;
	$lan_sms_text=$confdata[0]->lan_sms_text;
	$lan_button_label=$confdata[0]->lan_button_label;
	$lan_officenum_place=$confdata[0]->lan_officenum_place;
	$lan_greeting_place=$confdata[0]->lan_greeting_place;
	$lan_kind_business_place=$confdata[0]->lan_kind_business_place;
	$lan_business_hours_place=$confdata[0]->lan_business_hours_place;
	$lan_global_from_place=$confdata[0]->lan_global_from_place;
	$lan_global_to_place=$confdata[0]->lan_global_to_place;
	$lan_phone_place=$confdata[0]->lan_phone_place;
	$lan_fax_place=$confdata[0]->lan_fax_place;
	$lan_email_place=$confdata[0]->lan_email_place;
	$lan_url_place=$confdata[0]->lan_url_place;
	$lan_away_message_place=$confdata[0]->lan_away_message_place;
	$lan_Call_back_message_place=$confdata[0]->lan_Call_back_message_place;
	$lan_way_to_office_place=$confdata[0]->lan_way_to_office_place;
	$lan_addition_info_place=$confdata[0]->lan_addition_info_place;
	$lan_email2_place=$confdata[0]->lan_email2_place;
	$lan_sms_place=$confdata[0]->lan_sms_place;
	
	
	
	$confdata=$this->langsModel->getDaysData($this->session->userdata('cur_lang_code'));
	$lan_days_title =$confdata[0]->lan_days_title; 
	$lan_other_title =$confdata[0]->lan_other_title; 
	$lan_just_appointments =$confdata[0]->lan_just_appointments;
?>
<section id="content">
   <section class="main padder">
      <div class="clearfix">
         <h4><i class="fa fa-edit"></i><?php echo $lan_page_title_text;?></h4>
      </div>
      <?php
      
         if(isset($confData[0]->con_selected_days)){
         $selDays=explode(",",$confData[0]->con_selected_days);
         }
         
         //If php validation is fired, then already selcted checkbox must be selected...
         $daysSelected=set_value('daysSelected');
         if(!empty($daysSelected)){
         $selDays=set_value('daysSelected'); 
         }
         //If php validation is fired, then already selcted checkbox must be selected...
         
         
         //Displayed sucess message on view page
         $returnMSG=$this->session->userdata('msg');
         if(!empty($returnMSG)){
         ?>
      <div class="alert alert-success">
         <button data-dismiss="alert" class="close" type="button"><i class="fa fa-times"></i></button>
         <i class="fa fa-check fa-lg"></i><strong>Well done!</strong> Configuration has been <?php echo $returnMSG;?> successfully</a>.
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
      <div class="col-sm-6">
         <section class="panel">
            <div class="panel-body configuration-panel-body right-panel-body">
               <?php echo form_open('configurations/update_configurations', 'class=form-horizontal data-validate=parsley'); ?>
               <div class="form-group">
                  <label class="col-lg-3 control-label"><?php echo $lan_officenum_text;?></label>
                  <div class="col-lg-8">
                     <input type="text" data-type="number" maxlength="10" name="con_calloffice_number" placeholder="<?php echo $lan_officenum_place;?>" value="<?php echo set_value('con_calloffice_number'); ?><?php echo $confData[0]->con_calloffice_number;?>" data-required="true"  class="form-control">
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-lg-3 control-label"><?php echo $lan_greeting_text;?></label>
                  <div class="col-lg-8">
                     <input type="hidden" name="con_id"  value="<?php echo $confData[0]->con_id;?>" >
                     <div id="myCombobox" class="input-group dropdown combobox m-b">
                        <input class="input-sm form-control"  maxlength="100" name="greeting" type="text">
                        <div class="input-group-btn">
                           <button type="button" class="btn btn-sm btn-white dropdown-toggle" data-toggle="dropdown"><i class="caret"></i></button>
                           <ul class="dropdown-menu pull-right">
                              <li data-value="1" <?php if($confData[0]->con_greeting=="Greeting 1") echo "data-selected='true'";?> ><a href="#">Greeting 1</a></li>
                              <li data-value="2" <?php if($confData[0]->con_greeting=="Greeting 2") echo "data-selected='true'";?>><a href="#">Greeting 2</a></li>
                              <li data-value="3" <?php if($confData[0]->con_greeting=="Greeting 3") echo "data-selected='true'";?>><a href="#">Greeting 3</a></li>
                              <li data-value="3" <?php if($confData[0]->con_greeting!="") echo "data-selected='true'";?>><a href="#"><?php echo $confData[0]->con_greeting;?></a></li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-lg-3 control-label"><?php echo $lan_kind_business_text;?> </label>
                  <div class="col-lg-8">
                     <textarea class="form-control parsley-validated"  rows="3" placeholder="<?php echo $lan_kind_business_place;?>" name="business"><?php echo $confData[0]->con_business;?></textarea>
                  </div>
               </div>
               <div class="form-group">
                  <div class="rows1">
                     <h3 class="big-text"> <?php echo $lan_days_title;?></h3>
                     <div class="col-lg-11"><?php include_once('emp_business_hour.php'); ?></div>
                  </div>
               </div>
             
               <div class="form-group">
                  <div class="rows1">
                     <h3 class="big-text"><?php echo $lan_other_title;?></h3>
                     <div class="col-lg-11">
                        <div class="row">
                           <div class="col-lg-6 ol-lg-04-new">
                              <div class="checkbox">
                                 <label class="checkbox-custom">
                                 <input type="checkbox" class="checkboxDesing" name="lunchtimeChk" <?php if(isset($hourData[7]->biz_day)){ 
                                    if($hourData[7]->biz_day!='') { ?>checked="checked" <?php }
                                    } ?>>				
                                 <input type="hidden" name="biz_main_id_lunch" value="<?php if(isset($hourData[7]->biz_id)){ echo $hourData[7]->biz_id; } ?>">
                                 <i class="fa fa-check-square-o ebChackbox"></i>
                                 &nbsp;
                                 </label>
                              </div>
                           </div>
                           <div class="col-lg-3">
                              <select  class=" select2-option xman"  name="lunchtimeCombo1">
                                 <?php 
                                    $start = '12:00AM';
                                    $end = '11:59PM';
                                    $interval = '+15 minutes';
                                    $start_str = strtotime($start);
                                    $end_str = strtotime($end);
                                    $now_str = $start_str;
                                    while($now_str <= $end_str){
                                    	?>
                                 <option value="<?php echo date('H:i A', $now_str);?>" <?php if(isset($hourData[7]->biz_lunch_from)){ 
                                    if($hourData[7]->biz_lunch_from==date('H:i A', $now_str)){ echo "selected=selected"; }  }?>><?php echo date('H:i A', $now_str);?> </option>
                                 <?php $now_str = strtotime($interval, $now_str); 
                                    }
                                    ?>
                              </select>
                           </div>
                           <div class="col-lg-3">
                              <select  class="select2-option xman"  name="lunchtimeCombo2">
                                 <?php 
                                    $start1 = '12:00AM';
                                    $end1 = '11:59PM';
                                    $interval1 = '+15 minutes';
                                    $start_str1 = strtotime($start1);
                                    $end_str1 = strtotime($end1);
                                    $now_str1 = $start_str1;
                                    
                                    while($now_str1 <= $end_str1){
                                    	?>
                                 <option value="<?php echo date('H:i A', $now_str1);?>" <?php 
                                    if(isset($hourData[7]->biz_lunch_to)){
                                    	if($hourData[7]->biz_lunch_to==date('H:i A', $now_str1)){ echo "selected=selected"; } } ?>><?php echo date('H:i A', $now_str1);?> </option>
                                 <?php $now_str1 = strtotime($interval1, $now_str1); 
                                    }
                                    
                                    ?>
                              </select>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
              <div class="form-group">
               <div class="checkbox">
                  <label class="checkbox-custom">
                     <div class="n-b-text1"><?php echo $lan_just_appointments;?></div>
                     <input type="checkbox" id="just_appointment_check" name="just_appointment"  <?php if(isset($hourData[8]->biz_appointment)){ 
                        if($hourData[8]->biz_appointment!='0') { ?>checked="checked" <?php }
                        } ?>>
                     <input type="hidden" name="biz_main_id_just_appoint" value="<?php if(isset($hourData[8]->biz_id)){ echo $hourData[8]->biz_id; } ?>">
                     <i class="fa fa-check-square-o checked"></i>
                  </label>
               </div>
               </div>
               <div class="form-group">
                  <label class="col-lg-3 control-label"><?php echo $lan_global_from_text;?></label>
                  <div class="col-lg-8">
                     <input name="con_holiday_from" id="con_holiday_from"  type="text" data-date-format="yyyy-mm-dd" value="<?php echo set_value('con_holiday_from'); if(isset($confData)) { if($confData[0]->con_holiday_from!='0000-00-00'){ echo trim($confData[0]->con_holiday_from); }else{ echo date('Y-m-d'); } } ?> "  type="text" data-date-format="yyyy-mm-dd"size="16" class="input-sm form-control">
                     
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-lg-3 control-label"><?php echo $lan_global_to_text;?> </label>
                  <div class="col-lg-8">
                     <input name="con_holiday_to" id="con_holiday_to"   type="text" data-date-format="yyyy-mm-dd" value="<?php echo set_value('con_holiday_to'); if(isset($confData)) { if($confData[0]->con_holiday_to!='0000-00-00'){ echo trim($confData[0]->con_holiday_to); }else{ echo date('Y-m-d'); } } ?> "  type="text" data-date-format="yyyy-mm-dd"size="16" class="input-sm form-control">
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-lg-3 control-label"><?php echo $lan_phone_text;?></label>
                  <div class="col-lg-8">
                     <input type="text" name="contact_phone"  data-type="phone" maxlength="10" placeholder="<?php echo $lan_phone_place;?>" value="<?php echo set_value('contact_phone'); ?><?php echo $confData[0]->con_contact_phone;?>" data-required="true"  class="form-control">
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-lg-3 control-label"><?php echo $lan_fax_text;?> </label>
                  <div class="col-lg-8">
                     <input type="text" name="contact_fax"   placeholder="<?php echo $lan_fax_place;?>" value="<?php echo set_value('contact_fax'); ?><?php echo $confData[0]->con_contact_fax;?>" data-required="true"  class="form-control">
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-lg-3 control-label"><?php echo $lan_email_text;?> </label>
                  <div class="col-lg-8">
                     <input type="text" name="contact_email" data-type="email" maxlength="60" placeholder="<?php echo $lan_email_place;?>" value="<?php echo set_value('contact_email'); ?><?php echo $confData[0]->con_contact_email;?>" data-required="true"  class="form-control parsley-validated">
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-lg-3 control-label"><?php echo $lan_url_text;?> </label>
                  <div class="col-lg-8">
                     <input type="text" name="contact_url" data-type="url" maxlength="100"  placeholder="<?php echo $lan_url_place;?>" value="<?php echo set_value('contact_url'); ?><?php echo $confData[0]->con_contact_url;?>" data-required="true"  class="form-control">
                  </div>
               </div>
            </div>
         </section>
      </div>
      <div class="col-sm-6">
         <section class="panel">
            <div class="clearfix panel-body right-panel-body">
               <div class="row">
                  <div class="col-lg-12 ">
                     <label class="col-lg-3 control-label"><?php echo $lan_away_message_text;?> </label>
                     <div class="col-lg-8">
                        <input type="text" name="g_away_msg"  maxlength="100"  placeholder="<?php echo $lan_away_message_place;?>" value="<?php echo set_value('g_away_msg'); ?><?php echo $confData[0]->con_awy_msg;?>" data-required="true"  class="form-control">
                     </div>
                  </div>
                  <div class="col-lg-12 ">
                     <label class="col-lg-3 control-label"><?php echo $lan_Call_back_message_text;?> </label>
                     <div class="col-lg-8">
                        <input type="text" name="callback_msg" maxlength="100" placeholder="<?php echo $lan_Call_back_message_place;?>" value="<?php echo set_value('callback_msg'); ?><?php echo $confData[0]->con_callback_msg;?>" data-required="true"  class="form-control">
                     </div>
                  </div>
                  <div class="col-lg-12 textareaBottom">
                     <label class="col-lg-3 control-label"><?php echo $lan_way_to_office_text;?> </label>
                     <div class="col-lg-8">
                        <textarea class="form-control parsley-validated" rows="3" placeholder="<?php echo $lan_way_to_office_text;?>" name="way_to_office"><?php echo $confData[0]->con_way_to_office;?></textarea>
                     </div>
                  </div>
                  <div class="col-lg-12 textareaBottom">
                     <label class="col-lg-3 control-label"><?php echo $lan_addition_info_text;?> </label>
                     <div class="col-lg-8">
                        <textarea class="form-control parsley-validated" rows="3" placeholder="<?php echo $lan_addition_info_place;?>" name="additional"><?php echo $confData[0]->con_additional;?></textarea>
                     </div>
                  </div>
                  <div class="col-lg-12 ">
                     <div class="checkbox">
                        <label class="col-lg-3 control-label"><?php echo $lan_email2_text;?> </label>
                        <div class="col-lg-8">
                           <input type="text" name="notification_email"  data-type="email" maxlength="60"  placeholder="<?php echo $lan_email2_place;?>" value="<?php echo set_value('notification_email'); ?><?php echo $confData[0]->con_notification_email;?>" data-required="true"  class="form-control parsley-validated">
                           <div class="checkbox c-new">
                              <label class="checkbox-custom">
                              <input type="checkbox"  name="notification_email_active"  value="1" <?php if($confData[0]->con_notification_email_active == 1) echo "checked='checked'"; ?>>
                              <i class="fa fa-check-square-o checked"></i>
                              </label>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-12 ">
                     <label class="col-lg-3 control-label"><?php echo $lan_sms_text;?> </label>
                     <div class="col-lg-8">
                        <input type="text" name="notification_sms"  maxlength="60"  placeholder="<?php echo $lan_sms_place;?>" value="<?php echo set_value('notification_sms'); ?><?php echo $confData[0]->con_notification_sms;?>" data-required="true"  class="form-control">
                        <div class="checkbox c-new">
                           <label class="checkbox-custom">
                           <input type="checkbox"  name="notification_sms_active"  value="1" <?php if($confData[0]->con_notification_sms_active == 1) echo "checked='checked'"; ?>>
                           <i class="fa fa-check-square-o checked"></i>
                           </label>
                        </div>
                     </div>
                  </div>
               </div>
                    <div class=" rowcol-lg-samp">&nbsp;</div> 
               <div class="form-group">
                  <div class="col-lg-9 col-lg-offset-3">                      
                     <button type="submit" class="btn btn-primary"> <?php
                     if($pageSource=='add'){
						 echo "Add Configuration";
						 }else{
							echo "Update Configuration";
							 }
							 ?>
					</button>
                  </div>
               </div>
               <?php echo form_close(); ?>
            </div>
         </section>
      </div>
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
