<section id="content">
   <section class="main padder">
      <div class="clearfix">
         <h4><i class="fa fa-edit"></i>Configurations Page</h4> 
      </div>
      <?php
      //Displayed sucess message on view page
         $returnMSG=$this->session->userdata('msg');
         if(!empty($returnMSG)){
         ?>
      <div class="alert alert-success">
         <button data-dismiss="alert" class="close" type="button"><i class="fa fa-times"></i></button>
         <i class="fa fa-check fa-lg"></i><strong>Well done!</strong> configurations page text has been <?php echo $returnMSG;?> successfully</a>.
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
		  <?php echo form_open('languagemanage/update_configurations', 'class=form-horizontal data-validate=parsley'); ?>
      <div class="col-sm-6">
         <section class="panel">
            <div class="panel-body configuration-panel-body right-panel-body">
               
               <div class="form-group">
                  <label class="col-lg-3 control-label">Page Title</label> 
                  <div class="col-lg-8">
                     <input type="text"  maxlength="512"   name="lan_page_title_text" placeholder="Page Title" value="<?php echo set_value('lan_page_title_text'); ?><?php echo $confData[0]->lan_page_title_text;?>" data-required="false"  class="form-control">
                     <input type="hidden"   name="lan_sign_id"  value="<?php echo set_value('lan_sign_id'); ?><?php echo $confData[0]->lan_sign_id;?>" data-required="false"  class="form-control">
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-lg-3 control-label">CallOffice Number</label>
                  <div class="col-lg-8">
                    <input type="text"  maxlength="512" name="lan_officenum_text" placeholder="CallOffice Number" value="<?php echo set_value('lan_officenum_text'); ?><?php echo $confData[0]->lan_officenum_text;?>" data-required="false"  class="form-control">
                  </div>
               </div>
                <div class="form-group">
                  <label class="col-lg-3 control-label">Greeting</label>
                  <div class="col-lg-8">
                    <input type="text"  maxlength="512"  name="lan_greeting_text" placeholder="Greeting" value="<?php echo set_value('lan_greeting_text'); ?><?php echo $confData[0]->lan_greeting_text;?>" data-required="false"  class="form-control">
                  </div>
               </div>
               
                <div class="form-group">
                  <label class="col-lg-3 control-label">Business (what kind of Business?)</label>
                  <div class="col-lg-8">
                    <input type="text"  maxlength="512" name="lan_kind_business_text" placeholder="Business (what kind of Business?)" value="<?php echo set_value('lan_kind_business_text'); ?><?php echo $confData[0]->lan_kind_business_text;?>" data-required="false"  class="form-control">
                  </div>
               </div>
               
                <div class="form-group">
                  <label class="col-lg-3 control-label">Business Hours/Global </label>
                  <div class="col-lg-8">
                    <input type="text"  maxlength="512" name="lan_business_hours_text" placeholder="Business Hours/Global" value="<?php echo set_value('lan_business_hours_text'); ?><?php echo $confData[0]->lan_business_hours_text;?>" data-required="false"  class="form-control">
                  </div>
               </div>
               
               
                <div class="form-group">
                  <label class="col-lg-3 control-label">Holiday global from</label>
                  <div class="col-lg-8">
                    <input type="text"  maxlength="512" name="lan_global_from_text" placeholder="Holiday global from"  value="<?php echo set_value('lan_global_from_text'); ?><?php echo $confData[0]->lan_global_from_text;?>" data-required="false"  class="form-control">
                  </div>
               </div>
               
                    <div class="form-group">
                  <label class="col-lg-3 control-label">Holiday global to</label>
                  <div class="col-lg-8">
                    <input type="text"  maxlength="512" name="lan_global_to_text" placeholder="Holiday global to"  value="<?php echo set_value('lan_global_to_text'); ?><?php echo $confData[0]->lan_global_to_text;?>" data-required="false"  class="form-control">
                  </div>
               </div>
               
                    <div class="form-group">
                  <label class="col-lg-3 control-label">Phone</label>
                  <div class="col-lg-8">
                    <input type="text"  maxlength="512" name="lan_phone_text" placeholder="Phone"  value="<?php echo set_value('lan_phone_text'); ?><?php echo $confData[0]->lan_phone_text;?>" data-required="false"  class="form-control">
                  </div>
               </div>
               
              <div class="form-group">
                  <label class="col-lg-3 control-label">Fax</label>
                  <div class="col-lg-8">
                    <input type="text"  maxlength="512" name="lan_fax_text" placeholder="Fax"  value="<?php echo set_value('lan_fax_text'); ?><?php echo $confData[0]->lan_fax_text;?>" data-required="false"  class="form-control">
                  </div>
               </div>
              <div class="form-group">
                  <label class="col-lg-3 control-label">Email</label>
                  <div class="col-lg-8">
                    <input type="text"  maxlength="512" name="lan_email_text" placeholder="Email"  value="<?php echo set_value('lan_email_text'); ?><?php echo $confData[0]->lan_email_text;?>" data-required="false"  class="form-control">
                  </div>
               </div>
              <div class="form-group">
                  <label class="col-lg-3 control-label">URL</label>
                  <div class="col-lg-8">
                    <input type="text"  maxlength="512" name="lan_url_text" placeholder="URL"  value="<?php echo set_value('lan_url_text'); ?><?php echo $confData[0]->lan_url_text;?>" data-required="false"  class="form-control">
                  </div>
               </div>
              <div class="form-group">
                  <label class="col-lg-3 control-label">General Away Message</label>
                  <div class="col-lg-8">
                    <input type="text"  maxlength="512" name="lan_away_message_text" placeholder="General Away Message"  value="<?php echo set_value('lan_away_message_text'); ?><?php echo $confData[0]->lan_away_message_text;?>" data-required="false"  class="form-control">
                  </div>
               </div>
              <div class="form-group">
                  <label class="col-lg-3 control-label">Global Call Back Message</label>
                  <div class="col-lg-8">
                    <input type="text"  maxlength="512" name="lan_Call_back_message_text" placeholder="Global Call Back Message"  value="<?php echo set_value('lan_Call_back_message_text'); ?><?php echo $confData[0]->lan_Call_back_message_text;?>" data-required="false"  class="form-control">
                  </div>
               </div>
              <div class="form-group">
                  <label class="col-lg-3 control-label">Explain the Way to Office</label>
                  <div class="col-lg-8">
                    <input type="text"  maxlength="512" name="lan_way_to_office_text" placeholder="Explain the Way to Office"  value="<?php echo set_value('lan_way_to_office_text'); ?><?php echo $confData[0]->lan_way_to_office_text;?>" data-required="false"  class="form-control">
                  </div>
               </div>
              <div class="form-group">
                  <label class="col-lg-3 control-label">Additional Information</label>
                  <div class="col-lg-8">
                    <input type="text"  maxlength="512" name="lan_addition_info_text" placeholder="Additional Information"  value="<?php echo set_value('lan_addition_info_text'); ?><?php echo $confData[0]->lan_addition_info_text;?>" data-required="false"  class="form-control">
                  </div>
               </div>              
               <div class="form-group">
                  <label class="col-lg-3 control-label">Email</label>
                  <div class="col-lg-8">
                    <input type="text"  maxlength="512" name="lan_email2_text" placeholder="Email"  value="<?php echo set_value('lan_email2_text'); ?><?php echo $confData[0]->lan_email2_text;?>" data-required="false"  class="form-control">
                  </div>
               </div>              
               <div class="form-group">
                  <label class="col-lg-3 control-label">SMS</label>
                  <div class="col-lg-8">
                    <input type="text"  maxlength="512" name="lan_sms_text" placeholder="SMS"  value="<?php echo set_value('lan_sms_text'); ?><?php echo $confData[0]->lan_sms_text;?>" data-required="false"  class="form-control">
                  </div>
               </div>              
               <div class="form-group">
                  <label class="col-lg-3 control-label">Button Label</label>
                  <div class="col-lg-8">
                    <input type="text"  maxlength="512" name="lan_button_label" placeholder="Button Label"  value="<?php echo set_value('lan_button_label'); ?><?php echo $confData[0]->lan_button_label;?>" data-required="false"  class="form-control">
                  </div>
               </div>
         </section>
      </div>
      <div class="col-sm-6">
         <section class="panel">
            <div class="panel-body configuration-panel-body right-panel-body">
      
               <div class="col-lg-12 ">
                  <label class="col-lg-3 control-label">CallOffice Number Placeholder</label>
                  <div class="col-lg-8">
                    <input type="text"  maxlength="512" name="lan_officenum_place" placeholder="CallOffice Number Placeholder" value="<?php echo set_value('lan_officenum_place'); ?><?php echo $confData[0]->lan_officenum_place;?>" data-required="false"  class="form-control">
                  </div>
               </div>
                <div class="col-lg-12 ">
                  <label class="col-lg-3 control-label">Greeting Placeholder</label>
                  <div class="col-lg-8">
                    <input type="text"  maxlength="512" name="lan_greeting_place" placeholder="Greeting Placeholder" value="<?php echo set_value('lan_greeting_place'); ?><?php echo $confData[0]->lan_greeting_place;?>" data-required="false"  class="form-control">
                  </div>
               </div>
               
                <div class="col-lg-12 ">
                  <label class="col-lg-3 control-label">Business (what kind of Business?) Placeholder</label>
                  <div class="col-lg-8">
                    <input type="text"  maxlength="512" name="lan_kind_business_place" placeholder="Business (what kind of Business?) Placeholder" value="<?php echo set_value('lan_kind_business_place'); ?><?php echo $confData[0]->lan_kind_business_place;?>" data-required="false"  class="form-control">
                  </div>
               </div>
               
                <div class="col-lg-12 ">
                  <label class="col-lg-3 control-label">Business Hours/Global Placeholder </label>
                  <div class="col-lg-8">
                    <input type="text"  maxlength="512" name="lan_business_hours_place" placeholder="Business Hours/Global Placeholder" value="<?php echo set_value('lan_business_hours_place'); ?><?php echo $confData[0]->lan_business_hours_place;?>" data-required="false"  class="form-control">
                  </div>
               </div>
               
               
                <div class="col-lg-12 ">
                  <label class="col-lg-3 control-label">Holiday global from Placeholder</label>
                  <div class="col-lg-8">
                    <input type="text"  maxlength="512" name="lan_global_from_place" placeholder="Holiday global from Placeholder"  value="<?php echo set_value('lan_global_from_place'); ?><?php echo $confData[0]->lan_global_from_place;?>" data-required="false"  class="form-control">
                  </div>
               </div>
               
                    <div class="col-lg-12 ">
                  <label class="col-lg-3 control-label">Holiday global to Placeholder</label>
                  <div class="col-lg-8">
                    <input type="text"  maxlength="512" name="lan_global_to_place" placeholder="Holiday global to Placeholder"  value="<?php echo set_value('lan_global_to_place'); ?><?php echo $confData[0]->lan_global_to_place;?>" data-required="false"  class="form-control">
                  </div>
               </div>
               
                    <div class="col-lg-12 ">
                  <label class="col-lg-3 control-label">Phone Placeholder</label>
                  <div class="col-lg-8">
                    <input type="text"  maxlength="512" name="lan_phone_place" placeholder="Phone Placeholder"  value="<?php echo set_value('lan_phone_place'); ?><?php echo $confData[0]->lan_phone_place;?>" data-required="false"  class="form-control">
                  </div>
               </div>
               
              <div class="col-lg-12 ">
                  <label class="col-lg-3 control-label">Fax Placeholder</label>
                  <div class="col-lg-8">
                    <input type="text"  maxlength="512" name="lan_fax_place" placeholder="Fax Placeholder"  value="<?php echo set_value('lan_fax_place'); ?><?php echo $confData[0]->lan_fax_place;?>" data-required="false"  class="form-control">
                  </div>
               </div>
              <div class="col-lg-12 ">
                  <label class="col-lg-3 control-label">Email Placeholder</label>
                  <div class="col-lg-8">
                    <input type="text"  maxlength="512" name="lan_email_place" placeholder="Email Placeholder"  value="<?php echo set_value('lan_email_place'); ?><?php echo $confData[0]->lan_email_place;?>" data-required="false"  class="form-control">
                  </div>
               </div>
              <div class="col-lg-12 ">
                  <label class="col-lg-3 control-label">URL Placeholder</label>
                  <div class="col-lg-8">
                    <input type="text"  maxlength="512" name="lan_url_place" placeholder="URL Placeholder"  value="<?php echo set_value('lan_url_place'); ?><?php echo $confData[0]->lan_url_place;?>" data-required="false"  class="form-control">
                  </div>
               </div>
              <div class="col-lg-12 ">
                  <label class="col-lg-3 control-label">General Away Message Placeholder</label>
                  <div class="col-lg-8">
                    <input type="text"  maxlength="512" name="lan_away_message_place" placeholder="General Away Message Placeholder"  value="<?php echo set_value('lan_away_message_place'); ?><?php echo $confData[0]->lan_away_message_place;?>" data-required="false"  class="form-control">
                  </div>
               </div>
              <div class="col-lg-12 ">
                  <label class="col-lg-3 control-label">Global Call Back Message</label>
                  <div class="col-lg-8">
                    <input type="text"  maxlength="512" name="lan_Call_back_message_place" placeholder="Global Call Back Message"  value="<?php echo set_value('lan_Call_back_message_place'); ?><?php echo $confData[0]->lan_Call_back_message_place;?>" data-required="false"  class="form-control">
                  </div>
               </div>
              <div class="col-lg-12 ">
                  <label class="col-lg-3 control-label">Explain the Way to Office Placeholder</label>
                  <div class="col-lg-8">
                    <input type="text"  maxlength="512" name="lan_way_to_office_place" placeholder="Explain the Way to Office Placeholder"  value="<?php echo set_value('lan_way_to_office_place'); ?><?php echo $confData[0]->lan_way_to_office_place;?>" data-required="false"  class="form-control">
                  </div>
               </div>
              <div class="col-lg-12 ">
                  <label class="col-lg-3 control-label">Additional Information Placeholder</label>
                  <div class="col-lg-8">
                    <input type="text"  maxlength="512" name="lan_addition_info_place" placeholder="Additional Information Placeholder"  value="<?php echo set_value('lan_addition_info_place'); ?><?php echo $confData[0]->lan_addition_info_place;?>" data-required="false"  class="form-control">
                  </div>
               </div>             
                <div class="col-lg-12 ">
                  <label class="col-lg-3 control-label">Email Placeholder</label>
                  <div class="col-lg-8">
                    <input type="text"  maxlength="512" name="lan_email2_place" placeholder="Email Placeholder"  value="<?php echo set_value('lan_email2_place'); ?><?php echo $confData[0]->lan_email2_place;?>" data-required="false"  class="form-control">
                  </div>
               </div>              
              <div class="col-lg-12 ">
                  <label class="col-lg-3 control-label">SMS Placeholder</label>
                  <div class="col-lg-8">
                    <input type="text"  maxlength="512" name="lan_sms_place" placeholder="SMS Placeholder"  value="<?php echo set_value('lan_sms_place'); ?><?php echo $confData[0]->lan_sms_place;?>" data-required="false"  class="form-control">
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
