<section id="content">
    <section class="main padder">
      <div class="clearfix">
        <h4><i class="fa fa-edit"></i>Change Password</h4>
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
	}
	$returnPSWDError=$this->session->userdata('pswdErr');
     if(!empty($returnPSWDError)){
	 ?>
		<div class="alert alert-danger">
          <button data-dismiss="alert" class="close" type="button"><i class="fa fa-times"></i></button>
			<?php 
				echo $this->session->flashdata('pswdErr');
			?>
		</div>	
		<?php 
	}?>
      <div class="row">
        <div class="col-sm-12">
			<?php
			  //Displayed sucess message on view page
			  $returnMSG=$this->session->userdata('msg');
			  if(!empty($returnMSG)){
			  ?>
				  <div class="alert alert-success">
					  <button data-dismiss="alert" class="close" type="button"><i class="fa fa-times"></i></button>
					 <i class="fa fa-check fa-lg"></i><strong>Well done!</strong> <?php echo $returnMSG;?>.
				  </div>
			<?php } ?>
          <section class="panel">
            <div class="panel-body">
				<?php if(!empty($confData[0]->user_id)) {
					echo form_open('change_password/update_password', 'class=form-horizontal data-validate=parsley'); 
				}
				
				?>
				<div class="form-group">
                  <label class="col-lg-3 control-label">Password</label>
                  <div class="col-lg-8">
                    <input type="hidden" name="user_id"  value="<?php echo set_value('user_id'); ?><?php if(!empty($confData[0]->user_id)) { echo $confData[0]->user_id; }?>" >
                    <input type="password" name="user_password" placeholder="Existing Password" data-required="true" value="<?php echo set_value('user_password'); ?>" class="form-control">
					<input type="password" name="user_password1" placeholder="Existing Password" value="" style="display:none;">
                  </div>
                </div>
				
				<div class="form-group">
                  <label class="col-lg-3 control-label">New Password</label>
                  <div class="col-lg-8">
                    <input type="password" name="user_new_password" placeholder="New Password" data-required="true" value="<?php echo set_value('user_new_password'); ?>" class="form-control">
                  </div>
                </div>
				<div class="form-group">
                  <label class="col-lg-3 control-label">Confirm Password</label>
                  <div class="col-lg-8">
                    <input type="password" name="user_confirm_password" placeholder="Confirm Password" data-required="true" value="<?php echo set_value('user_confirm_password'); ?>" class="form-control">
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
