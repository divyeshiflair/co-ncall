<?php
   ini_set('memory_limit', '-1'); 
   ?>
<section id="content">
   <section class="main padder">
      <div class="clearfix">
         <h4><i class="fa fa-edit"></i><?php if($pageSource=='add'){ echo "Add Employee";}else{ echo "Edit Employee";}?></h4>
      </div>
      <?php
         $returnMSGError=$this->session->userdata('err');
            if(!empty($returnMSGError)){
         ?>
      <div class="alert alert-danger">
         <button data-dismiss="alert" class="close" type="button"><i class="fa fa-times"></i></button>
         <?php 
            echo $phpErrors=validation_errors('<p class="error">'); 
            ?>
      </div>
      <?php 
         }?>
      <div class="row">
         <div class="col-sm-6">
            <section class="panel">
               <div class="panel-body left-panel-body">
                  <?php
                     if($pageSource=='add'){
                     	echo form_open_multipart('employee/save_employee', 'class=form-horizontal data-validate=parsley'); 
                      }else{ 
                     	 echo form_open_multipart('employee/update_employee', 'class=form-horizontal data-validate=parsley'); 
                      }
                      
                      ?>
                  <input type="hidden" name="emp_id"  value=" <?php echo set_value('emp_id'); ?> <?php if(!empty($confData[0]->emp_id)) { echo trim($confData[0]->emp_id); }?>" >
                  <div class="form-group">
                     <label class="col-lg-3 control-label">Photo</label>
                     <div class="col-lg-9 media">
                        <?php
                           if($pageSource=='add'){
                           ?> 
								<div class="bg-light pull-left text-center media-large thumb-large">
								   <i class="fa fa-user inline fa fa-light fa fa-3x m-t-large m-b-large"></i>
								</div>
								<?php
                           }else{
							   if($confData[0]->emp_profile!=''){
									$base_pathsimg=base_url()."upload_file/employee_image/".$confData[0]->emp_id."/".$confData[0]->emp_profile;
									?>
									<div class="bg-light pull-left text-center media-large thumb-large">
									   <img src="<?php echo base_url()."upload_file/employee_image/".$confData[0]->emp_id."/".$confData[0]->emp_profile;?>">
									</div>
							<?php }else {?>
									<div class="bg-light pull-left text-center media-large thumb-large">
									   <i class="fa fa-user inline fa fa-light fa fa-3x m-t-large m-b-large"></i>
									</div>
							<?php }
                           }
                           ?>
                        <div class="media-body">
                           <input type="file" name="empprofilefile" title="Change" class="btn btn-sm btn-info m-b-small"><br>
                           <!--a>Delete</a-->
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-lg-3 control-label">Firstname</label>
                     <div class="col-lg-8">
                        <input type="hidden" name="emp_id"  value=" <?php echo set_value('emp_id'); ?> <?php if(!empty($confData[0]->emp_id)) { echo trim($confData[0]->emp_id); }?>" >
                        <input type="text" name="emp_firstname" maxlength="30" placeholder="Firstname" data-required="true" value="<?php echo set_value('emp_firstname');?><?php if(!empty($confData[0]->emp_firstname)){ echo trim($confData[0]->emp_firstname);}?>" class="form-control">
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-lg-3 control-label">Lastname</label>
                     <div class="col-lg-8">
                        <input type="text" name="emp_lastname" maxlength="30" placeholder="Lastname" data-required="true" value="<?php echo set_value('emp_lastname');?><?php if(!empty($confData[0]-> emp_lastname)){ echo trim($confData[0]-> emp_lastname);}?>" class="form-control">
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-lg-3 control-label">Job Title</label>
                     <div class="col-lg-8">
                        <div id="myCombobox" class="input-group dropdown combobox m-b">
                           <input class="input-sm form-control" maxlength="100"  value="<?php echo set_value('emp_title'); ?> <?php if(!empty($confData[0]-> emp_title )){ echo trim($confData[0]-> emp_title) ; }?>" name="emp_title" type="text">
                           <div class="input-group-btn">
                              <button type="button" class="btn btn-sm btn-white dropdown-toggle" data-toggle="dropdown"><i class="caret"></i></button>
                              <ul class="dropdown-menu pull-right">
                                 <?php 
								  foreach($jobTitleData as $jobTitleData){
									?>
									<li data-value="<?php echo $jobTitleData->job_id;?>" ><a href="#"><?php echo $jobTitleData->job_value;?></a></li>
									<?php }?>
									
                                 <li data-value="5" data-selected="true"><a href="#"><?php if(!empty($confData[0]-> emp_title )){ echo trim($confData[0]-> emp_title) ; }?></a></li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-lg-3 control-label">Responsibility</label>
                     <div class="col-lg-8">
                        <div id="myCombobox" class="input-group dropdown combobox m-b">
                           <input class="input-sm form-control"maxlength="100"  value="<?php echo trim(set_value('emp_responsibility')); if(!empty($confData[0]-> emp_responsibility)){ echo trim($confData[0]-> emp_responsibility);}?>" name="emp_responsibility" type="text">
                           <div class="input-group-btn">
                              <button type="button" class="btn btn-sm btn-white dropdown-toggle" data-toggle="dropdown"><i class="caret"></i></button>
                              <ul class="dropdown-menu pull-right">
								  <?php 
								  foreach($reponsibilityData as $reponsibilityData){
									?>
									<li data-value="<?php echo $reponsibilityData->res_id;?>"><a href="#"><?php echo trim($reponsibilityData->res_value);?></a></li>
									<?php }?>
									<li data-value="5" data-selected="true"><a href="#"><?php echo set_value('emp_responsibility'); if(!empty($confData[0]->emp_responsibility)){echo trim($confData[0]->emp_responsibility);}?></a></li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-lg-3 control-label">P Away Msg</label>
                     <div class="col-lg-8">
                        <div id="myCombobox" class="input-group dropdown combobox m-b">
                           <input class="input-sm form-control" maxlength="100"  value="<?php echo set_value('emp_away_msg'); ?> <?php if(!empty($confData[0]-> emp_away_msg )){ echo trim($confData[0]-> emp_away_msg); }?>" name="emp_away_msg" type="text">
                           <div class="input-group-btn">
                              <button type="button" class="btn btn-sm btn-white dropdown-toggle" data-toggle="dropdown"><i class="caret"></i></button>
                              <ul class="dropdown-menu pull-right">
								  <?php 
								  foreach($awayMessageData as $awayMessageData){
									?>
									<li data-value="<?php echo $awayMessageData->away_id;?>" ><a href="#"><?php echo trim($awayMessageData->away_value);?></a></li>
									<?php }?>
                                 <li data-value="5" data-selected="true"><a href="#"><?php echo set_value('emp_away_msg'); if(!empty($confData[0]-> emp_away_msg )){ echo trim($confData[0]-> emp_away_msg); }?></a></li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-lg-3 control-label">Call Back Msg</label>
                     <div class="col-lg-8">
                        <div id="myCombobox" class="input-group dropdown combobox m-b">
                           <input class="input-sm form-control" maxlength="100"  value="<?php echo set_value('emp_callback_msg');?><?php if(!empty($confData[0]-> emp_callback_msg )){ echo trim($confData[0]-> emp_callback_msg); }?>" name="emp_callback_msg" type="text">
                           <div class="input-group-btn">
                              <button type="button" class="btn btn-sm btn-white dropdown-toggle" data-toggle="dropdown"><i class="caret"></i></button>
                              <ul class="dropdown-menu pull-right">
                                 <?php 
								  foreach($callBackMsgData as $callBackMsgData){
									?>
									<li data-value="<?php echo $callBackMsgData->callback_id;?>" ><a href="#"><?php echo $callBackMsgData->callback_value;?></a></li>
									<?php }?>
                                 <li data-value="5" data-selected="true"><a href="#"><?php echo set_value('emp_callback_msg'); ?> <?php if(!empty($confData[0]-> emp_callback_msg )){ echo trim($confData[0]-> emp_callback_msg); }?></a></li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-lg-3 control-label">Telephone </label>
                     <div class="col-lg-8">
                        <input type="text" name="emp_telephone" maxlength="13" placeholder="Telephone" value="<?php echo set_value('emp_telephone');?><?php if(!empty($confData[0]->emp_telephone )){ echo trim($confData[0]->emp_telephone);}?>" data-required="true"  class="form-control">
                        <div class="checkbox" id="telShow">
							<?php
							if(isset($confData[0]->emp_telephone_show)){
									if($confData[0]->emp_telephone_show=='yes'){
									$showtel="yes";
								}else{
									$showtel="no";
								}
							}else{
								$showtel="yes";
							}
							?>
							<input type="text" value="<?php echo $showtel;?>" name="tel_eye_box" id="tel_eye_box"  style="display:none;">
							<div id="eye">
								 <i class="fa fa-eye"></i>
							</div>
							<div id="eyeslash">
								<i class="fa fa-eye-slash"></i>
							</div>
                         </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-lg-3 control-label">Mobile Phone </label>
                     <div class="col-lg-8">
                        <input type="text" name="emp_mobile" data-type="number" maxlength="10"  placeholder="Mobile Phone" value="<?php echo set_value('emp_mobile'); ?><?php if(!empty($confData[0]-> emp_mobile)){ echo trim($confData[0]-> emp_mobile);}?>" data-required="true"  class="form-control">
                        <div class="checkbox">
							<?php
							if(isset($confData[0]->emp_mobile_show)){
									if($confData[0]->emp_mobile_show=='yes'){
									$showPhone="yes";
								}else{
									$showPhone="no";
								}
							}else{
								$showPhone="yes";
							}
							?>
							<input type="text" value="<?php echo $showPhone;?>" name="pho_eye_box" id="pho_eye_box"  style="display:none;">
							<div id="eyePhone">
								 <i class="fa fa-eye"></i>
							</div>
							<div id="eyeslashPhone">
								<i class="fa fa-eye-slash"></i>
							</div>
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-lg-3 control-label">E-Mail </label>
                     <div class="col-lg-8">
                        <input type="text" name="emp_email" maxlength="60" placeholder="E-Mail" value="<?php echo set_value('emp_email'); if(!empty($confData[0]->emp_email)){ echo trim($confData[0]->emp_email); }?>" data-required="true "  class="form-control" data-type="email">
                        <div class="checkbox">
							<?php
							if(isset($confData[0]->emp_email_show)){
									if($confData[0]->emp_email_show=='yes'){
									$showEma="yes";
								}else{
									$showEma="no";
								}
							}else{
								$showEma="yes";
							}
							?>
							<input type="text" value="<?php echo $showEma;?>" name="ema_eye_box" id="ema_eye_box"  style="display:none;">
							<div id="eyeEmail">
								 <i class="fa fa-eye"></i>
							</div>
							<div id="eyeslashEmail">
								<i class="fa fa-eye-slash"></i>
							</div>
                        </div>
                        
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-lg-3 control-label">Any Other Information</label>
                     <div class="col-lg-8">
                        <textarea placeholder="Profile" rows="5" class="form-control" data-trigger="keyup" name="emp_other_info"><?php echo set_value('emp_other_info'); if(!empty($confData[0]->emp_other_info)){ echo trim($confData[0]->emp_other_info); }?> </textarea>
                     </div>
                  </div>
                  
               </div>
            </section>
         </div>
         <div class="col-sm-6">
            <div class="panel">
               <div class="clearfix panel-body right-panel-body">
                  <div>
                     <div class="col-lg-12">
                        <h3 class="big-text">Calender</h3>
                     </div>
                     <div class="col-lg-12">
                        <div id="myCombobox" class="input-group dropdown combobox m-b full-box1">
                           <div class="fi-slect">
                              <input class="input-sm form-control" name="combobox" type="text">
                              <div class="input-group-btn">
                                 <button type="button" class="btn btn-sm btn-white dropdown-toggle" data-toggle="dropdown"><i class="caret"></i></button>
                                 <ul class="dropdown-menu pull-right">
                                    <li data-value="1" data-selected="true"><a href="#">Item One</a></li>
                                    <li data-value="2"><a href="#">Item Two</a></li>
                                    <li data-value="3" data-fizz="buzz"><a href="#">Item Three</a></li>
                                    <li class="divider"></li>
                                    <li data-value="4"><a href="#">Item Four</a></li>
                                 </ul>
                              </div>
                           </div>
                           <div>
                           </div>
                        </div>
                        <h4 class="lable-small">Email</h4>
                        <div class="col-lg-12 col-lg-09">
                           <input type="text" maxlength="90" value="<?php echo set_value('emp_calender_email'); if(!empty($confData[0]->emp_calender_email)){ echo $confData[0]->emp_calender_email; }?>"  name="emp_calender_email" placeholder="test@example.com" class="bg-focus form-control" data-required="true" data-type="email">
                        </div>
                        <h4 class="lable-small">Password</h4>
                        <div class="col-lg-12 col-lg-09">
                           <input type="password" maxlength="30" value="<?php echo set_value('emp_calender_password'); if(!empty($confData[0]->emp_calender_password)){ echo $confData[0]->emp_calender_password; }?>"  name="emp_calender_password" placeholder="Password" class="bg-focus form-control">
                        </div>
                        <div class="col-lg-12 col-lg-samp">
                             <div class="checkbox">
                                 <label class="checkbox-custom">
                                 <input type="checkbox" <?php if(isset($confData)){ if($confData[0]->emp_calender_terms=='yes'){ echo "checked=checked"; } } ?> name="emp_calender_terms">
                                 <i class="fa fa-check-square-o checked"></i>
                                Terms and condition (Use your personal event and company event from calendar)
                                 </label>
                              </div>
                           </div>
                        
                        <div class="col-lg-12 col-lg-012">
                           <div class="line line-dashed m-t-large"></div>
                        </div>
                         
                        <!--- -->
                        <div>
                           <h3 class="big-text">Call Transfer</h3>
                        </div>
                        <div class="row">
                           <div class="col-lg-12 col-lg-samp">
                              <!-- checkbox -->
                              <div class="checkbox">
                                 <label class="checkbox-custom">
                                 <input type="checkbox" name="emp_call_transfer_telephone" <?php if(isset($confData)){  if($confData[0]->emp_call_transfer_telephone=='yes'){ echo "checked=checked";} } ?>>
                                 <i class="fa fa-check-square-o"></i>
                                 Transfer Incoming call's to Telephone
                                 </label>
                              </div>
                              <div class="checkbox">
                                 <label class="checkbox-custom">
                                 <input type="checkbox" name="emp_call_transfer_mobile" <?php if(isset($confData)){  if($confData[0]->emp_call_transfer_mobile=='yes'){ echo "checked=checked"; } }?>>
                                 <i class="fa fa-check-square-o"></i>
                                 Transfer Incoming call's to Mobile phone
                                 </label>
                              </div>
                           </div>
                        </div>
                        <div>
                           <h3 class="big-text">Call Notification</h3>
                        </div>
                        <div class="row">
                           <div class="col-lg-12 col-lg-samp">
                              <!-- checkbox -->
                              <div class="checkbox">
                                 <label class="checkbox-custom">
                                 <input type="checkbox" name="emp_call_notification_telephone" <?php if(isset($confData)){  if($confData[0]->emp_call_notification_telephone=='yes'){ echo "checked=checked"; } }?>>
                                 <i class="fa fa-check-square-o"></i>
                                 Transfer Incoming call's to Telephone
                                 </label>
                              </div>
                              <div class="checkbox">
                                 <label class="checkbox-custom">
                                 <input type="checkbox" name="emp_call_notification_mobile" <?php if(isset($confData)){  if($confData[0]->emp_call_notification_mobile=='yes'){ echo "checked=checked";} }?>>
                                 <i class="fa fa-check-square-o"></i>
                                 Transfer Incoming call's to Mobile phone
                                 </label>
                              </div>
                           </div>
                        </div>
                        <h3 class="big-text">Business Hours/Global</h3>
                        <div class="rows1">
                           <?php include_once('emp_business_hour.php');?>
                        </div>
                        <h3 class="big-text">Lunchtime /Global </h3>
                        <div class="row">
                           <div class="col-lg-6 ol-lg-04-new">
                              <div class="checkbox">
                                 <label class="checkbox-custom">
                                 <input type="checkbox" class="checkboxDesing"  name="lunchtimeChk" <?php if(isset($hourData[7]->biz_day)){ 
                                    if($hourData[7]->biz_day!='') { ?>checked="checked" <?php }
                                    } ?>>				
                                 <input type="hidden" name="biz_main_id_lunch" value="<?php if(isset($hourData[7]->biz_id)){ echo $hourData[7]->biz_id; } ?>">
                                 <i class="fa fa-check-square-o ebChackbox"></i>
                                 &nbsp;
                                 </label>
                              </div>
                           </div>
                           <div class="col-lg-3">
                              <select  class=" select2-option xman" name="lunchtimeCombo1">
                                 <?php 
                                    $start = '12:00AM';
                                    $end = '11:59PM';
                                    $interval = '+1 minutes';
                                    $start_str = strtotime($start);
                                    $end_str = strtotime($end);
                                    $now_str = $start_str;
                                    while($now_str <= $end_str){
                                    	?>
                                 <option value="<?php echo date('h:i A', $now_str);?>" <?php if(isset($hourData[7]->biz_lunch_from)){ 
                                    if($hourData[7]->biz_lunch_from==date('h:i A', $now_str)){ echo "selected=selected"; }  }?>><?php echo date('h:i A', $now_str);?> </option>
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
                                    $interval1 = '+1 minutes';
                                    $start_str1 = strtotime($start1);
                                    $end_str1 = strtotime($end1);
                                    $now_str1 = $start_str1;
                                    
                                    while($now_str1 <= $end_str1){
                                    	?>
                                 <option value="<?php echo date('h:i A', $now_str1);?>" <?php 
                                    if(isset($hourData[7]->biz_lunch_to)){
                                    	if($hourData[7]->biz_lunch_to==date('h:i A', $now_str1)){ echo "selected=selected"; } } ?>><?php echo date('h:i A', $now_str1);?> </option>
                                 <?php $now_str1 = strtotime($interval1, $now_str1); 
                                    }
                                    
                                    ?>
                              </select>
                           </div>
                        </div>
                           <div class="checkbox">
                              <label class="checkbox-custom custom-check-box1">
                              <i class="fa fa-check-square-o" style="float:right;margin-left: 15px;margin-top: 3px;"></i>
                              No Business Hours- just Apointments  
                              <input type="checkbox" id="just_appointment_check"  name="just_appointment"  <?php if(isset($hourData[8]->biz_appointment)){ 
                                 if($hourData[8]->biz_appointment!='0') { ?>checked="checked" <?php }
                                 } ?>>
                              <input type="hidden" name="biz_main_id_just_appoint" value="<?php if(isset($hourData[8]->biz_id)){ echo $hourData[8]->biz_id; } ?>">
                              </label>
                           </div>
                        </div>
                     </div>
                     <div class=" rowcol-lg-samp">&nbsp;</div>
                     <div class="row">
                           <div class="col-lg-12 ">
								<label class="col-lg-3 control-label">Holiday global from </label>
									<div class="col-lg-8">
										<input name="emp_holiday_from"  id="emp_holiday_from" value="<?php echo set_value('emp_holiday_from'); if(isset($confData)) { if($confData[0]->emp_holiday_from!='0000-00-00' || $confData[0]->emp_holiday_from!='1970-01-01'){ echo trim($confData[0]->emp_holiday_from); }else{ echo date('Y-m-d'); } }else{ echo date('Y-m-d'); } ?> "  type="text" data-date-format="yyyy-mm-dd"size="16" class="input-sm form-control">
									</div>
                             </div>
                           <div class="col-lg-12 ">
								<label class="col-lg-3 control-label">Holiday global to </label>
									<div class="col-lg-8">
										<input name="emp_holiday_to"  id="emp_holiday_to" value="<?php echo set_value('emp_holiday_to'); if(isset($confData)) {  if($confData[0]->emp_holiday_to!='0000-00-00' || trim($confData[0]->emp_holiday_to)!='1970-01-01'){ echo trim($confData[0]->emp_holiday_to); }else{ echo date('Y-m-d'); } }else{ echo date('Y-m-d'); }?>" type="text" data-date-format="yyyy-mm-dd"  size="16" class="input-sm form-control">
									</div>
                             </div>
                      </div>
                 <div class=" rowcol-lg-samp">&nbsp;</div> 
                     <div class="form-group">
                        <div class="col-lg-9 col-lg-offset-3 offset-3-new">                      
                           <a href="<?php echo base_url();?>employee"><button type="button" class="btn btn-white">Cancel</button></a>
                           <button type="submit" class="btn btn-primary">
							   <?php
                     if($pageSource=='add'){
						 echo "Add Employee";
						 }else{
							echo "Update Employee";
							 }
							 ?></button>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <?php echo form_close(); ?>
      </div>
   </section>
</section><script>
				$(document).ready(function(){
					//For telephone :: StartD
					var curTel= $("#tel_eye_box").val();
					if(curTel=='no'){
						$("#eye").css('display','none');
						$("#eyeslash").css('display','block');
						$("#tel_eye_box").val('no');
					}else{
						$("#eyeslash").css('display','none');
						$("#eye").css('display','block');
						$("#tel_eye_box").val('yes');
					}
					
					$("#eye").click(function(){
						$("#eye").css('display','none');
						$("#eyeslash").css('display','block');
						$("#tel_eye_box").val('no');
					});
					$("#eyeslash").click(function(){
						$("#eyeslash").css('display','none');
						$("#eye").css('display','block');
						$("#tel_eye_box").val('yes');
					});
					//For telephone :: EndD
					
					
					//For phone :: StartD
					var curPho= $("#pho_eye_box").val();
					if(curPho=='no'){
						$("#eyePhone").css('display','none');
						$("#eyeslashPhone").css('display','block');
						$("#pho_eye_box").val('no');
					}else{
						$("#eyeslashPhone").css('display','none');
						$("#eyePhone").css('display','block');
						$("#tel_eye_box").val('yes');
					}
					
					$("#eyePhone").click(function(){
						$("#eyePhone").css('display','none');
						$("#eyeslashPhone").css('display','block');
						$("#pho_eye_box").val('no');
					});
					$("#eyeslashPhone").click(function(){
						$("#eyeslashPhone").css('display','none');
						$("#eyePhone").css('display','block');
						$("#pho_eye_box").val('yes');
					});
					//For phone :: EndD
					
					//For email :: StartD
					var curEma= $("#ema_eye_box").val();
					if(curEma=='no'){
						$("#eyeEmail").css('display','none');
						$("#eyeslashEmail").css('display','block');
						$("#ema_eye_box").val('no');
					}else{
						$("#eyeslashEmail").css('display','none');
						$("#eyeEmail").css('display','block');
						$("#ema_eye_box").val('yes');
					}
					
					$("#eyeEmail").click(function(){
						$("#eyeEmail").css('display','none');
						$("#eyeslashEmail").css('display','block');
						$("#ema_eye_box").val('no');
					});
					$("#eyeslashEmail").click(function(){
						$("#eyeslashEmail").css('display','none');
						$("#eyeEmail").css('display','block');
						$("#ema_eye_box").val('yes');
					});
					//For email :: EndD
					
					
					
					$("#emp_holiday_to,#emp_holiday_from").datepicker({autoclose:true});
					$('#emp_holiday_to,#emp_holiday_from').on('changeDate', function(ev){
						$(this).datepicker('hide');
					});		
					var befVal=$("#just_appointment_check").is(':checked') ? 1 : 0;
					
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
					.fa-eye,.fa-eye-slash
					{
						cursor:pointer;
					}
					</style>
