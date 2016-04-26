<section id="content">
   <section class="main padder">
      <div class="clearfix">
         <h4><i class="fa fa-edit"></i>View Configurations</h4>
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
         <i class="fa fa-check fa-lg"></i><strong>Well done!</strong> Configrations has been <?php echo $returnMSG;?> successfully</a>.
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
                  <label class="col-lg-3 control-label">CallOffice Number</label>
                  <div class="col-lg-8">
                     <input type="text" data-type="number" maxlength="10" name="con_calloffice_number" placeholder="CallOffice Number" value="<?php echo set_value('con_calloffice_number'); ?><?php echo $confData[0]->con_calloffice_number;?>" data-required="true"  class="form-control">
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-lg-3 control-label">Greeting</label>
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
                  <label class="col-lg-3 control-label">Business (what kind of Business?)</label>
                  <div class="col-lg-8">
                     <textarea class="form-control parsley-validated"  rows="3" placeholder="Business (what kind of Business?)" name="business"><?php echo $confData[0]->con_business;?></textarea>
                  </div>
               </div>
               <div class="form-group">
                  <div class="rows1">
                     <h3 class="big-text">Business Hours/Global</h3>
                     <div class="col-lg-11"><?php include_once('emp_business_hour.php'); ?></div>
                  </div>
               </div>
             
               <div class="form-group">
                  <div class="rows1">
                     <h3 class="big-text">Lunchtime / Global</h3>
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
                     <div class="n-b-text1">No business Hours - just appointments</div>
                     <input type="checkbox" id="just_appointment_check" name="just_appointment"  <?php if(isset($hourData[8]->biz_appointment)){ 
                        if($hourData[8]->biz_appointment!='0') { ?>checked="checked" <?php }
                        } ?>>
                     <input type="hidden" name="biz_main_id_just_appoint" value="<?php if(isset($hourData[8]->biz_id)){ echo $hourData[8]->biz_id; } ?>">
                     <i class="fa fa-check-square-o checked"></i>
                  </label>
               </div>
               </div>
               <div class="form-group">
                  <label class="col-lg-3 control-label">Holiday global from </label>
                  <div class="col-lg-8">
                     <input name="con_holiday_from" id="con_holiday_from"  type="text" data-date-format="yyyy-mm-dd" value="<?php echo set_value('con_holiday_from'); if(isset($confData)) { if($confData[0]->con_holiday_from!='0000-00-00'){ echo trim($confData[0]->con_holiday_from); }else{ echo date('Y-m-d'); } } ?> "  type="text" data-date-format="yyyy-mm-dd"size="16" class="input-sm form-control">
                     
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-lg-3 control-label">Holiday global to </label>
                  <div class="col-lg-8">
                     <input name="con_holiday_to" id="con_holiday_to"   type="text" data-date-format="yyyy-mm-dd" value="<?php echo set_value('con_holiday_to'); if(isset($confData)) { if($confData[0]->con_holiday_to!='0000-00-00'){ echo trim($confData[0]->con_holiday_to); }else{ echo date('Y-m-d'); } } ?> "  type="text" data-date-format="yyyy-mm-dd"size="16" class="input-sm form-control">
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-lg-3 control-label">Phone</label>
                  <div class="col-lg-8">
                     <input type="text" name="contact_phone"  data-type="phone" maxlength="10" placeholder="Phone" value="<?php echo set_value('contact_phone'); ?><?php echo $confData[0]->con_contact_phone;?>" data-required="true"  class="form-control">
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-lg-3 control-label">Fax </label>
                  <div class="col-lg-8">
                     <input type="text" name="contact_fax"   placeholder="Fax" value="<?php echo set_value('contact_fax'); ?><?php echo $confData[0]->con_contact_fax;?>" data-required="true"  class="form-control">
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-lg-3 control-label">Email </label>
                  <div class="col-lg-8">
                     <input type="text" name="contact_email" data-type="email" maxlength="60" placeholder="info@company.com" value="<?php echo set_value('contact_email'); ?><?php echo $confData[0]->con_contact_email;?>" data-required="true"  class="form-control parsley-validated">
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-lg-3 control-label">URL </label>
                  <div class="col-lg-8">
                     <input type="text" name="contact_url" data-type="url" maxlength="100"  placeholder="http://company.com" value="<?php echo set_value('contact_url'); ?><?php echo $confData[0]->con_contact_url;?>" data-required="true"  class="form-control">
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
                     <label class="col-lg-3 control-label">General Away Message </label>
                     <div class="col-lg-8">
                        <input type="text" name="g_away_msg"  maxlength="100"  placeholder="General Away Message" value="<?php echo set_value('g_away_msg'); ?><?php echo $confData[0]->con_awy_msg;?>" data-required="true"  class="form-control">
                     </div>
                  </div>
                  <div class="col-lg-12 ">
                     <label class="col-lg-3 control-label">Global Call Back Message </label>
                     <div class="col-lg-8">
                        <input type="text" name="callback_msg" maxlength="100" placeholder="Global Call Back Message" value="<?php echo set_value('callback_msg'); ?><?php echo $confData[0]->con_callback_msg;?>" data-required="true"  class="form-control">
                     </div>
                  </div>
                  <div class="col-lg-12 textareaBottom">
                     <label class="col-lg-3 control-label">Explain the Way to Office </label>
                     <div class="col-lg-8">
                        <textarea class="form-control parsley-validated" rows="3" placeholder="Explain the Way to Office" name="way_to_office"><?php echo $confData[0]->con_way_to_office;?></textarea>
                     </div>
                  </div>
                  <div class="col-lg-12 textareaBottom">
                     <label class="col-lg-3 control-label">Additional Information </label>
                     <div class="col-lg-8">
                        <textarea class="form-control parsley-validated" rows="3" placeholder="Additional Information" name="additional"><?php echo $confData[0]->con_additional;?></textarea>
                     </div>
                  </div>
                  <div class="col-lg-12 ">
                     <div class="checkbox">
                        <label class="col-lg-3 control-label">Email </label>
                        <div class="col-lg-8">
                           <input type="text" name="notification_email"  data-type="email" maxlength="60"  placeholder="info@company.com" value="<?php echo set_value('notification_email'); ?><?php if($confData[0]->con_notification_email_active == 1) { echo $confData[0]->con_notification_email; }?>" data-required="true"  class="form-control parsley-validated">
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
                     <label class="col-lg-3 control-label">SMS </label>
                     <div class="col-lg-8">
                        <input type="text" name="notification_sms"  maxlength="60"  placeholder="SMS" value="<?php echo set_value('notification_sms'); ?><?php  if($confData[0]->con_notification_sms_active == 1) { echo $confData[0]->con_notification_sms; }?>" data-required="true"  class="form-control">
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
