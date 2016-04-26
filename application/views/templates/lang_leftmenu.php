<section id="content">
   <section class="main padder">
      <div class="clearfix">
         <h4><i class="fa fa-edit"></i>Left Menu</h4> 
      </div>
      <?php
      //Displayed sucess message on view page
         $returnMSG=$this->session->userdata('msg');
         if(!empty($returnMSG)){
         ?>
      <div class="alert alert-success">
         <button data-dismiss="alert" class="close" type="button"><i class="fa fa-times"></i></button>
         <i class="fa fa-check fa-lg"></i><strong>Well done!</strong> left menu page text has been <?php echo $returnMSG;?> successfully</a>.
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
               <?php echo form_open('languagemanage/update_leftmenu', 'class=form-horizontal data-validate=parsley'); ?>
               <div class="form-group">
                  <label class="col-lg-3 control-label">Dashboard</label> 
                  <div class="col-lg-8">
                     <input type="text"  maxlength="1024" name="lan_dashboard" placeholder="Dashboard" value="<?php echo set_value('lan_dashboard'); ?><?php echo $confData[0]->lan_dashboard;?>" data-required="true"  class="form-control">
                     <input type="hidden"   name="lan_sign_id"  value="<?php echo set_value('lan_sign_id'); ?><?php echo $confData[0]->lan_sign_id;?>" data-required="true"  class="form-control">
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-lg-3 control-label">Call</label>
                  <div class="col-lg-8">
                    <input type="text"  maxlength="1024" name="lan_call" placeholder="Call" value="<?php echo set_value('lan_call'); ?><?php echo $confData[0]->lan_call;?>" data-required="true"  class="form-control">
                  </div>
               </div>
                <div class="form-group">
                  <label class="col-lg-3 control-label">Configurations</label>
                  <div class="col-lg-8">
                    <input type="text"  maxlength="1024" name="lan_configurations" placeholder="Configurations" value="<?php echo set_value('lan_configurations'); ?><?php echo $confData[0]->lan_configurations;?>" data-required="true"  class="form-control">
                  </div>
               </div>
               
                <div class="form-group">
                  <label class="col-lg-3 control-label">Company</label>
                  <div class="col-lg-8">
                    <input type="text"  maxlength="1024" name="lan_company" placeholder="Company" value="<?php echo set_value('lan_company'); ?><?php echo $confData[0]->lan_company;?>" data-required="true"  class="form-control">
                  </div>
               </div>
               
                <div class="form-group">
                  <label class="col-lg-3 control-label">Employee </label>
                  <div class="col-lg-8">
                    <input type="text"  maxlength="1024" name="lan_employee" placeholder="Employee" value="<?php echo set_value('lan_employee'); ?><?php echo $confData[0]->lan_employee;?>" data-required="true"  class="form-control">
                  </div>
               </div>
                     <div class="form-group">
                  <label class="col-lg-3 control-label">Contact</label>
                  <div class="col-lg-8">
                    <input type="text"  maxlength="1024" name="lan_contact" placeholder="Contact"  value="<?php echo set_value('lan_contact'); ?><?php echo $confData[0]->lan_contact;?>" data-required="true"  class="form-control">
                  </div>
               </div>
               
               <div class="form-group">
                  <label class="col-lg-3 control-label">Analytics</label>
                  <div class="col-lg-8">
                    <input type="text"  maxlength="1024" name="lan_analytics" placeholder="Analytics"  value="<?php echo set_value('lan_analytics'); ?><?php echo $confData[0]->lan_analytics;?>" data-required="true"  class="form-control">
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
