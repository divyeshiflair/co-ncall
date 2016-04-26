<?php
ini_set('memory_limit', '-1'); 
?>

<section id="content">
    <section class="main padder">
      <div class="clearfix">
       <h4><i class="fa fa-edit"></i><?php if($pageSource=='add'){ echo "Add Callback Message";}else{ echo "Edit Callback Message";}?></h4>
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
					echo form_open_multipart('callback_message/save_callback_message', 'class=form-horizontal data-validate=parsley'); 
				 }else{ 
					 echo form_open_multipart('callback_message/update_callback_message', 'class=form-horizontal data-validate=parsley'); 
				 }
				 
				 ?>
                
                <div class="form-group">
                  <label class="col-lg-3 control-label">Callback Message</label>
                  <div class="col-lg-8">
                    <input type="hidden" name="callback_id"  value=" <?php echo set_value('callback_id'); ?> <?php if(!empty($confData[0]->callback_id)) { echo $confData[0]->callback_id; }?>" >
                    <input type="text" name="callback_value" placeholder="Callback Message" data-required="true" value="<?php  if(!empty($confData[0]->callback_value)){ echo $confData[0]->callback_value; }?>" class="form-control">
                  </div>
                </div>
              
            </div>
          </section>
          <div class="col-lg-9 col-lg-offset-3 offset-3-new">                      
                    <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </div>

          <?php echo form_close(); ?>

    </section>
  </section>
  
