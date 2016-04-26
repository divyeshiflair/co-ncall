<section id="content">
   <section class="main padder">
      <div class="clearfix">
         <h4><i class="fa fa-edit"></i>Sign Up</h4> 
      </div>
      <?php
      //Displayed sucess message on view page
         $returnMSG=$this->session->userdata('msg');
         if(!empty($returnMSG)){
         ?>
      <div class="alert alert-success">
         <button data-dismiss="alert" class="close" type="button"><i class="fa fa-times"></i></button>
         <i class="fa fa-check fa-lg"></i><strong>Well done!</strong> Sign up page text has been <?php echo $returnMSG;?> successfully</a>.
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
      <div class="col-sm-12">
         <section class="panel">
            <div class="panel-body configuration-panel-body right-panel-body">
               <?php echo form_open('languagemanage/update_signup', 'class=form-horizontal data-validate=parsley'); ?>
               <div class="form-group">
                  <label class="col-lg-3 control-label">Sign up title</label> 
                  <div class="col-lg-8">
                     <input type="text"  maxlength="1024" name="lan_sign_title" placeholder="Sign up title" value="<?php echo set_value('lan_sign_title'); ?><?php echo $confData[0]->lan_sign_title;?>" data-required="true"  class="form-control">
                     <input type="hidden"   name="lan_sign_id"  value="<?php echo set_value('lan_sign_id'); ?><?php echo $confData[0]->lan_sign_id;?>" data-required="true"  class="form-control">
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-lg-3 control-label">First name label</label>
                  <div class="col-lg-8">
                    <input type="text"  maxlength="1024" name="lan_firstname_label" placeholder="First name label" value="<?php echo set_value('lan_firstname_label'); ?><?php echo $confData[0]->lan_firstname_label;?>" data-required="true"  class="form-control">
                  </div>
               </div>
                <div class="form-group">
                  <label class="col-lg-3 control-label">Firstname placeholder</label>
                  <div class="col-lg-8">
                    <input type="text"  maxlength="1024" name="lan_firstname_text" placeholder="Firstname placeholder" value="<?php echo set_value('lan_firstname_text'); ?><?php echo $confData[0]->lan_firstname_text;?>" data-required="true"  class="form-control">
                  </div>
               </div>
               
                <div class="form-group">
                  <label class="col-lg-3 control-label">Lastname label</label>
                  <div class="col-lg-8">
                    <input type="text"  maxlength="1024" name="lan_lastname_label" placeholder="Lastname label" value="<?php echo set_value('lan_lastname_label'); ?><?php echo $confData[0]->lan_lastname_label;?>" data-required="true"  class="form-control">
                  </div>
               </div>
               
                <div class="form-group">
                  <label class="col-lg-3 control-label">Lastname placeholder</label>
                  <div class="col-lg-8">
                    <input type="text"  maxlength="1024" name="lan_lastname_text" placeholder="Lastname placeholder" value="<?php echo set_value('lan_lastname_text'); ?><?php echo $confData[0]->lan_lastname_text;?>" data-required="true"  class="form-control">
                  </div>
               </div>
               
               
               <div class="form-group">
                  <label class="col-lg-3 control-label">Email label</label>
                  <div class="col-lg-8">
                    <input type="text"  maxlength="1024" name="lan_email_label" placeholder="Email label" value="<?php echo set_value('lan_email_label'); ?><?php echo $confData[0]->lan_email_label;?>" data-required="true"  class="form-control">
                  </div>
               </div>
               
                <div class="form-group">
                  <label class="col-lg-3 control-label">Email placeholder</label>
                  <div class="col-lg-8">
                    <input type="text"  maxlength="1024" name="lan_email_text" placeholder="Email placeholder" value="<?php echo set_value('lan_email_text'); ?><?php echo $confData[0]->lan_email_text;?>" data-required="true"  class="form-control">
                  </div>
               </div>
               
               
               
               <div class="form-group">
                  <label class="col-lg-3 control-label">Password label</label>
                  <div class="col-lg-8">
                    <input type="text"  maxlength="1024" name="lan_pass_label" placeholder="Password label" value="<?php echo set_value('lan_pass_label'); ?><?php echo $confData[0]->lan_pass_label;?>" data-required="true"  class="form-control">
                  </div>
               </div>
               
                <div class="form-group">
                  <label class="col-lg-3 control-label">Password placeholder</label>
                  <div class="col-lg-8">
                    <input type="text"  maxlength="1024" name="lan_pass_text" placeholder="Password placeholder" value="<?php echo set_value('lan_pass_text'); ?><?php echo $confData[0]->lan_pass_text;?>" data-required="true"  class="form-control">
                  </div>
               </div>
               
                              
               
               <div class="form-group">
                  <label class="col-lg-3 control-label">Mobile label</label>
                  <div class="col-lg-8">
                    <input type="text"  maxlength="1024" name="lan_mobile_label" placeholder="Mobile label" value="<?php echo set_value('lan_mobile_label'); ?><?php echo $confData[0]->lan_mobile_label;?>" data-required="true"  class="form-control">
                  </div>
               </div>
               
                <div class="form-group">
                  <label class="col-lg-3 control-label">Mobile placeholder</label>
                  <div class="col-lg-8">
                    <input type="text"  maxlength="1024" name="lan_mobile_text" placeholder="Mobile placeholder" value="<?php echo set_value('lan_mobile_text'); ?><?php echo $confData[0]->lan_mobile_text;?>" data-required="true"  class="form-control">
                  </div>
               </div>
               
                <div class="form-group">
                  <label class="col-lg-3 control-label">Sign Up Button</label>
                  <div class="col-lg-8">
                    <input type="text"  maxlength="1024" name="lan_sign_button" placeholder="Sign up button" value="<?php echo set_value('lan_sign_button'); ?><?php echo $confData[0]->lan_sign_button;?>" data-required="true"  class="form-control">
                  </div>
               </div>
               
                <div class="form-group">
                  <label class="col-lg-3 control-label">Sign Up Text</label>
                  <div class="col-lg-8">
                    <input type="text"  maxlength="1024" name="lan_signup_text" placeholder="Sign up text" value="<?php echo set_value('lan_signup_text'); ?><?php echo $confData[0]->lan_signup_text;?>" data-required="true"  class="form-control">
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-lg-3 control-label">Sign In Button</label>
                  <div class="col-lg-8">
                    <input type="text"  maxlength="1024" name="lan_signin_button" placeholder="Sign in button text" value="<?php echo set_value('lan_signin_button'); ?><?php echo $confData[0]->lan_signin_button;?>" data-required="true"  class="form-control">
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
               <?php echo form_close(); ?>
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
