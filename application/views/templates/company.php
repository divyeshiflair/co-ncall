<section id="content">
    <section class="main padder">
      <div class="clearfix">
        <h4><i class="fa fa-edit"></i>Manage Company</h4>
      </div>
      <?php
      //Displayed sucess message on view page
      $returnMSG=$this->session->userdata('msg');
      if(!empty($returnMSG)){
      ?>
      <div class="alert alert-success">
          <button data-dismiss="alert" class="close" type="button"><i class="fa fa-times"></i></button>
         <i class="fa fa-check fa-lg"></i><strong>Well done!</strong> You successfully update the company</a>.
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
            <div class="panel-body">
				<?php echo form_open('company/update_company', 'class=form-horizontal data-validate=parsley'); ?>
               
                <div class="form-group">
                  <label class="col-lg-3 control-label">Company Name</label>
                  <div class="col-lg-8">
                    <input type="hidden" name="com_id"  value="<?php echo set_value('con_id'); ?><?php echo $confData[0]->com_id;?>" >
                    <input type="text" name="com_cname" placeholder="Company Name" data-required="true" value="<?php echo set_value('com_cname'); ?><?php echo $confData[0]->com_cname;?>" class="form-control">
                  </div>
                </div>
                 <div class="form-group">
                  <label class="col-lg-3 control-label">Address</label>
                  <div class="col-lg-8">
                    <input type="text" name="com_add1" placeholder="Address" data-required="true" value="<?php echo set_value('com_add1'); ?><?php echo $confData[0]->com_add1;?>" class="form-control">
                  </div>
                </div>
                
                 <div class="form-group">
                  <label class="col-lg-3 control-label">Street Number</label>
                  <div class="col-lg-8">
                    <input type="text" name="com_street_number" placeholder="Street Number" data-required="true" value="<?php echo set_value('com_street_number'); ?><?php echo $confData[0]->com_street_number;?>" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-3 control-label">Postal Code</label>
                  <div class="col-lg-8">
                    <input type="text" name="com_add2" placeholder="Postal Code" data-required="true" value="<?php echo set_value('com_add2'); ?><?php echo $confData[0]->com_add2;?>" class="form-control">
                  </div>
                </div>
               <div class="form-group">
                  <label class="col-lg-3 control-label">City</label>
                  <div class="col-lg-8">
					  <?php
					  ?>
                    <input type="text" name="com_add3" placeholder="City" data-required="true" value="<?php echo set_value('com_add3'); ?><?php echo $confData[0]->com_add3;?>" class="form-control">
                  </div>
                </div>
                  <div class="form-group">
                  <label class="col-lg-3 control-label">Country</label>
                  <div class="col-lg-8">
                    <select  class="select2-option xman" name="com_country_id" style="width: 100%;">
                            <?php 
							foreach($countryData as $countryData){
                           ?>
                                 <option value="<?php echo $countryData->country_id;?>" <?php if($confData[0]->com_country_id==$countryData->country_id){ echo "selected=selected"; } ?>><?php echo $countryData->name;?> </option>
                                <?php 
                                }
                                ?></select>
                  </div>
                </div>
                <style>.select2-container .select2-choice div b::after {content: "";}</style>
                  <div class="form-group">
                  <label class="col-lg-3 control-label">Department</label>
                  <div class="col-lg-8">
                    <input type="text" name="com_add4" placeholder="Department" maxlength="30"  data-required="true" value="<?php echo set_value('com_add4'); ?><?php echo $confData[0]->com_add4;?>" class="form-control">
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-lg-3 control-label">Phone No </label>
                  <div class="col-lg-8">
                    <input type="text" name="com_telephone" placeholder="Phone No" maxlength="10"  value="<?php echo set_value('com_telephone'); ?><?php echo $confData[0]->com_telephone;?>" data-required="true"  class="form-control">
                  </div>
                </div>
                 <div class="form-group">
                  <label class="col-lg-3 control-label">Fax </label>
                  <div class="col-lg-8">
                    <input type="text" name="com_fax" placeholder="Fax"  maxlength="15"  value="<?php echo set_value('com_fax'); ?><?php echo $confData[0]->com_fax;?>" data-required="true"  class="form-control">
                  </div>
                </div>
                 <div class="form-group">
                  <label class="col-lg-3 control-label">E-Mail </label>
                  <div class="col-lg-8">
                    <input type="text" name="com_email" placeholder="E-Mail"  maxlength="100"  data-type="email" value="<?php echo set_value('com_email'); ?><?php echo $confData[0]->com_email;?>" data-required="true "  class="form-control" data-type="email">
                  </div>
                </div>
                
                <div class="form-group">
                  <div class="col-lg-9 col-lg-offset-3">                      
                    <button type="submit" class="btn btn-primary">Save changes</button>
                  </div>
                </div>
              <?php echo form_close(); ?>
            </div>
          </section>
          
        </div>
       
    </section>
  </section>
