<section id="content">
    <section class="main padder">
      <div class="clearfix">
        <h4><i class="fa fa-edit"></i><?php if($pageSource=='add'){ echo "Add Operator";}else{ echo "Edit Operator";}?></h4>
      </div>
      <?php
	 $returnMSGError=$this->session->userdata('err');
     if(!empty($returnMSGError)){
	 ?>
		<div class="alert alert-danger">
          <button data-dismiss="alert" class="close" type="button"><i class="fa fa-times"></i></button>
			<?php 
				//echo $phpErrors=validation_errors('<p class="error">'); 
				echo '<i class="fa fa-check fa-lg"></i>'.$returnMSGError;
			?>
		</div>	
		<?php 
	}?>
      <div class="row">
        <div class="col-sm-12">
          <section class="panel">
            <div class="panel-body">
				<?php
				if($pageSource=='add'){
					echo form_open('operator/save_operator', 'class=form-horizontal data-validate=parsley'); 
				 }else{ 
					 echo form_open('operator/update_operator', 'class=form-horizontal data-validate=parsley'); 
				 }
				 ?>
				<div class="form-group">
                  <label class="col-lg-3 control-label">Firstname</label>
                  <div class="col-lg-8">
                    <input type="hidden" name="opt_id"  value=" <?php echo set_value('opt_id'); ?> <?php if(!empty($confData[0]->user_id)) { echo $confData[0]->user_id; }?>" >
                    <input type="text" name="opt_firstname" placeholder="Firstname" data-required="true" value="<?php echo set_value('opt_firstname'); ?> <?php  if(!empty($confData[0]->user_firstname)){ echo $confData[0]->user_firstname; }?>" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-3 control-label">Lastname</label>
                  <div class="col-lg-8">
                    <input type="text" name="opt_lastname" placeholder="Lastname" data-required="true" value="<?php echo set_value('opt_lastname'); ?> <?php if(!empty($confData[0]-> user_lastname )){ echo $confData[0]-> user_lastname ; }?>" class="form-control">
                  </div>
                </div>
				<div class="form-group">
                <label class="col-lg-3 control-label">Email address</label>
				<div class="col-lg-8">
					<input type="email" placeholder="test@example.com" class="form-control" data-required="true" name="opt_email" value="<?php echo set_value('opt_email'); ?> <?php if(!empty($confData[0]-> user_email )){ echo $confData[0]-> user_email ; }?>" <?php if(!empty($confData[0]-> user_password )) { echo "readonly"; }?>>
				</div>
				</div>
				<?php if(empty($confData[0]-> user_password )) :?>
				<div class="form-group">
					<label class="col-lg-3 control-label">Password</label>
					<div class="col-lg-8">
					<input type="password" placeholder="password" class="form-control" data-required="true" name="opt_password" value="<?php echo set_value('opt_password'); ?>">
					</div>
				</div>
				
				<?php endif; ?>
                <div class="form-group">
                  <label class="col-lg-3 control-label">Mobile Number </label>
                  <div class="col-lg-8">
                    <input type="text" name="opt_mobile" maxlength="10" placeholder="Mobile Phone" value="<?php echo set_value('opt_mobile'); ?> <?php if(!empty($confData[0]-> user_mobile )){ echo $confData[0]-> user_mobile ; }?>" data-required="true"  data-type="number"  class="form-control">
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
