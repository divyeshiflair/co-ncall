<section id="content">
   <section class="main padder">
      <div class="clearfix">
         <h4><i class="fa fa-edit"></i>Days</h4> 
      </div>
      <?php
      //Displayed sucess message on view page
         $returnMSG=$this->session->userdata('msg');
         if(!empty($returnMSG)){
         ?>
      <div class="alert alert-success">
         <button data-dismiss="alert" class="close" type="button"><i class="fa fa-times"></i></button>
         <i class="fa fa-check fa-lg"></i><strong>Well done!</strong> day page text has been <?php echo $returnMSG;?> successfully</a>.
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
		  <?php echo form_open('languagemanage/update_days', 'class=form-horizontal data-validate=parsley'); ?>
      <div class="col-sm-12">
         <section class="panel">
            <div class="panel-body configuration-panel-body right-panel-body">
               
               <div class="form-group">
                  <label class="col-lg-3 control-label">Days Title</label> 
                  <div class="col-lg-8">
                     <input type="text"  maxlength="512"   name="lan_days_title" placeholder="Days Title" value="<?php echo set_value('lan_days_title'); ?><?php echo $confData[0]->lan_days_title;?>" data-required="false"  class="form-control">
                     <input type="hidden"   name="lan_sign_id"  value="<?php echo set_value('lan_sign_id'); ?><?php echo $confData[0]->lan_sign_id;?>" data-required="false"  class="form-control">
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-lg-3 control-label">Sunday</label>
                  <div class="col-lg-8">
                    <input type="text"  maxlength="512" name="lan_sunday" placeholder="Sunday" value="<?php echo set_value('lan_sunday'); ?><?php echo $confData[0]->lan_sunday;?>" data-required="false"  class="form-control">
                  </div>
               </div>
                <div class="form-group">
                  <label class="col-lg-3 control-label">Monday</label>
                  <div class="col-lg-8">
                    <input type="text"  maxlength="512"  name="lan_monday" placeholder="Monday" value="<?php echo set_value('lan_monday'); ?><?php echo $confData[0]->lan_monday;?>" data-required="false"  class="form-control">
                  </div>
               </div>
               
                <div class="form-group">
                  <label class="col-lg-3 control-label">Tuesday</label>
                  <div class="col-lg-8">
                    <input type="text"  maxlength="512" name="lan_tuesday" placeholder="Tuesday" value="<?php echo set_value('lan_tuesday'); ?><?php echo $confData[0]->lan_tuesday;?>" data-required="false"  class="form-control">
                  </div>
               </div>
               
                <div class="form-group">
                  <label class="col-lg-3 control-label">Wednesday </label>
                  <div class="col-lg-8">
                    <input type="text"  maxlength="512" name="lan_wednesday" placeholder="Wednesday" value="<?php echo set_value('lan_wednesday'); ?><?php echo $confData[0]->lan_wednesday;?>" data-required="false"  class="form-control">
                  </div>
               </div>
               
               
                <div class="form-group">
                  <label class="col-lg-3 control-label">Thursday</label>
                  <div class="col-lg-8">
                    <input type="text"  maxlength="512" name="lan_thursday" placeholder="Thursday"  value="<?php echo set_value('lan_thursday'); ?><?php echo $confData[0]->lan_thursday;?>" data-required="false"  class="form-control">
                  </div>
               </div>
               
                    <div class="form-group">
                  <label class="col-lg-3 control-label"> Friday</label>
                  <div class="col-lg-8">
                    <input type="text"  maxlength="512" name="lan_friday" placeholder="Friday"  value="<?php echo set_value('lan_friday'); ?><?php echo $confData[0]->lan_friday;?>" data-required="false"  class="form-control">
                  </div>
               </div>
               
              <div class="form-group">
                  <label class="col-lg-3 control-label">Saturday</label>
                  <div class="col-lg-8">
                    <input type="text"  maxlength="512" name="lan_saturday" placeholder="Saturday"  value="<?php echo set_value('lan_saturday'); ?><?php echo $confData[0]->lan_saturday;?>" data-required="false"  class="form-control">
                  </div>
               </div>
              <div class="form-group">
                  <label class="col-lg-3 control-label">Other Title</label>
                  <div class="col-lg-8">
                    <input type="text"  maxlength="512" name="lan_other_title" placeholder="Other Title"  value="<?php echo set_value('lan_other_title'); ?><?php echo $confData[0]->lan_other_title;?>" data-required="false"  class="form-control">
                  </div>
               </div>
              <div class="form-group">
                  <label class="col-lg-3 control-label">Just Appointments title</label>
                  <div class="col-lg-8">
                    <input type="text"  maxlength="512" name="lan_just_appointments" placeholder="Just Appointments title"  value="<?php echo set_value('lan_just_appointments'); ?><?php echo $confData[0]->lan_just_appointments;?>" data-required="false"  class="form-control">
                  </div>
               </div>
           
                <div class=" rowcol-lg-samp">&nbsp;</div> 
               <div class="col-lg-12 ">
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
<style>
.type{
color:red;
}
</style>
