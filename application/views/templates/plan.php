<?php
ini_set('memory_limit', '-1'); 
?>

<section id="content">
    <section class="main padder">
      <div class="clearfix">
       <h4><i class="fa fa-edit"></i><?php if($pageSource=='add'){ echo "Add Plan";}else{ echo "Edit Plan";}?></h4>
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
        <div class="col-sm-12">
          <section class="panel">
            <div class="panel-body left-panel-body">
					<?php
				if($pageSource=='add'){
					echo form_open_multipart('plan/save_plan', 'class=form-horizontal data-validate=parsley'); 
				 }else{ 
					 echo form_open_multipart('plan/update_plan', 'class=form-horizontal data-validate=parsley'); 
				 }
				 
				 ?>
                
                <div class="form-group">
                  <label class="col-lg-3 control-label">Plan Name</label>
                  <div class="col-lg-8">
                    <input type="hidden" name="plan_id"  value=" <?php echo set_value('plan_id'); ?> <?php if(!empty($confData[0]->plan_id)){echo $confData[0]->plan_id; }?>" >
					
					<input type="text" class="form-control plan_type" name="plan_type" id="plan_type" value="<?php if(!empty($confData[0]->plan_type)){ echo $confData[0]->plan_type; } ?>" readonly="">
					
					
					<?php /* ?>
                    <select name="plan_type" id="plan_type" class="plan_type form-control">
						<option value="plan1" <?php if(isset($confData[0]->plan_type)){ if($confData[0]->plan_type="plan1"){  echo "selected";}}?>>Plan One</option>
						<option value="plan2" <?php if(isset($confData[0]->plan_type)){ if($confData[0]->plan_type="plan2"){  echo "selected";}}?>>Plan Two</option>
						<option value="plan3" <?php if(isset($confData[0]->plan_type)){ if($confData[0]->plan_type="plan3"){  echo "selected";}}?> >Plan Three</option>
                    </select>
					<?php */ ?>
                  </div>
                </div>
                 <div class="form-group">
                  <label class="col-lg-3 control-label">Plan Features</label>
                  <div class="col-lg-8">
                    <?php /*?>
					<input type="textarea" name="plan_features" maxlength="100" placeholder="Plan Features" data-required="true" value="<?php echo set_value('plan_features'); ?><?php if(!empty($confData[0]->plan_features)){ echo $confData[0]->plan_features; }?>" class="form-control">
					<?php */ ?>
					<textarea class="form-control parsley-validated" rows="3" placeholder="Plan Features" name="plan_features"><?php echo set_value('plan_features'); ?><?php if(!empty($confData[0]->plan_features)){ echo $confData[0]->plan_features; }?></textarea>
                  </div>
                </div>
                 <div class="form-group">
                  <label class="col-lg-3 control-label">Plan Type</label>
                  <div class="col-lg-8">
                    <input type="text" name="plan_type_text" maxlength="50"  placeholder="Plan Type" data-required="true" value="<?php echo set_value('plan_type_text'); ?><?php  if(!empty($confData[0]->plan_type_text)){ echo $confData[0]->plan_type_text; }?>" class="form-control">

                  </div>
                </div>
                 <div class="form-group">
                  <label class="col-lg-3 control-label">Plan Price</label>
                  <div class="col-lg-8">
                    <input type="text" name="plan_price" maxlength="7" data-type="number" step="0.01" placeholder="Plan Price" data-required="true" value="<?php echo set_value('plan_price'); ?><?php  if(!empty($confData[0]->plan_price)){ echo $confData[0]->plan_price; }?>" class="form-control">
                  </div>
                </div>
               <div class="col-lg-9 col-lg-offset-3 offset-3-new">                      
                    <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </div>
          </section>
         
        </div>

          <?php echo form_close(); ?>

    </section>
  </section>
  
