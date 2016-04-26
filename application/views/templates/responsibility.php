<?php
ini_set('memory_limit', '-1'); 
?>

<section id="content">
    <section class="main padder">
      <div class="clearfix">
       <h4><i class="fa fa-edit"></i><?php if($pageSource=='add'){ echo "Add Responsibility";}else{ echo "Edit Responsibility";}?></h4>
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
					echo form_open_multipart('responsibility/save_responsibility', 'class=form-horizontal data-validate=parsley'); 
				 }else{ 
					 echo form_open_multipart('responsibility/update_responsibility', 'class=form-horizontal data-validate=parsley'); 
				 }
				 
				 ?>
                
                <div class="form-group">
                  <label class="col-lg-3 control-label">Responsibility</label>
                  <div class="col-lg-8">
                    <input type="hidden" name="res_id"  value=" <?php echo set_value('res_id'); ?> <?php if(!empty($confData[0]->res_id)) { echo $confData[0]->res_id; }?>" >
                    <input type="text" name="res_value" placeholder="Responsibility" data-required="true" value="<?php  if(!empty($confData[0]->res_value)){ echo $confData[0]->res_value; }?>" class="form-control">
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
  
