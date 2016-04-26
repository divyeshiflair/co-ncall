<?php
ini_set('memory_limit', '-1'); 
?>

<section id="content">
    <section class="main padder">
      <div class="clearfix">
       <h4><i class="fa fa-edit"></i><?php if($pageSource=='add'){ echo "Add Plan";}else{ echo "View Plan";}?></h4>
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
			<?php
			  //Displayed sucess message on view page
			  $returnMSG=$this->session->userdata('msg');
			  if(!empty($returnMSG)){
			  ?>
				  <div class="alert alert-success">
					  <button data-dismiss="alert" class="close" type="button"><i class="fa fa-times"></i></button>
					 <!--i class="fa fa-check fa-lg"></i><strong>Well done!</strong> You successfully <?php echo $returnMSG;?> the employee</a>-->
   		             <i class="fa fa-check fa-lg"></i><strong>Well done!</strong> Plan has been <?php echo $returnMSG;?> successfully</a>.

				  </div>
			<?php } ?>
			
          <section class="panel">
            <div class="panel-body left-panel-body">
					<?php
					
				if($pageSource=='add'){
					echo form_open_multipart('plan/saveSelectedPlan', 'class=form-horizontal data-validate=parsley'); 
				 }else{ 
					 echo form_open_multipart('plan/updateSelectedPlan', 'class=form-horizontal data-validate=parsley'); 
					 ?><input type="hidden" id="cplan_id" value="<?php if(!empty($savedplanData[0]->cplan_id)){ echo $savedplanData[0]->cplan_id; } ?>" name="cplan_id"><?php
				 }
				 
				 ?>
				 <div class="col-sm-6">
                
				<section class="panel panelPointer" onclick="toggleCheckbox('plan1'); return false;">
					<div id="form-wizard" class="wizard clearfix" > 
					  <ul class="steps">
						<li class="active" data-target="#step1"><span class="badge badge-info">1</span>Plan 1</li> 
						<?php if(!empty($plan1Data[0]->plan_type_text)){ ?><li class="active" data-target="#step1"> <?php echo $plan1Data[0]->plan_type_text;?></li><?php }?>					  </ul>
					
					  <div class="media" style="text-align:right;">
						<span class="badge bg-info" title="Plan Price">&euro; <?php echo $plan1Data[0]->plan_price;?></span>
					  </div>
					  <input style="display:none;" type="checkbox" id="plan1" <?php if(!empty($savedplanData[0]->cplan_plan_id)){  if($savedplanData[0]->cplan_plan_id==$plan1Data[0]->plan_id){ echo "checked=checked";} } ?> name="planSelect[<?php echo $plan1Data[0]->plan_id;?>]">
					</div>
					<ul class="list-group">
						 <?php
						   foreach($plan1Data as $plan1Data){
							   ?>
					  <li data-target="#todo-1"  class="list-group-item" id="plan1_feature" style="<?php if(!empty($savedplanData[0]->cplan_plan_id)){ if($savedplanData[0]->cplan_plan_id==$plan1Data->plan_id){ ?> background-color:#f7f8f9; <?php  } }?>">
						<div class="media">
						  <div class="media-body">
							<div class="media">
								<a class="h5" href="javascript:void(0);" title="Plan Feartures"><?php echo $plan1Data->plan_features;?></a>
							</div>
							<?php /* ?>
							<div class="media"><span class="badge bg-info" title="Plan Price"><?php echo $plan1Data->plan_price;?></span></div>
							<?php */ ?>
						  </div>
						<?php /* ?>
						<div class="col-lg-13 col-lg-samp">
                             <div class="checkbox">
                                 <label class="checkbox-custom">
                                 <input type="checkbox" name="planSelect[<?php echo $plan1Data->plan_id;?>]">
                                 <i class="fa fa-check-square-o"></i>
                                </label>
                              </div>
                           </div>
						   <?php */ ?>
                           </div>
					  </li>
					  <?php }?>
					</ul>
				  </section>
				</div>
				 <div class="col-sm-6" >
				 <section class="panel panelPointer" onclick="toggleCheckbox('plan2'); return false;">
					<div id="form-wizard" class="wizard clearfix" >
					  <ul class="steps">
						<li class="active" data-target="#step1"><span class="badge badge-info">2</span>Plan 2</li>
						<?php if(!empty($plan2Data[0]->plan_type_text)){ ?><li class="active" data-target="#step1"> <?php echo $plan2Data[0]->plan_type_text;?></li><?php }?>
					  </ul>
					  <div class="media" style="text-align:right;">
						<span class="badge bg-info" title="Plan Price">&euro; <?php echo $plan2Data[0]->plan_price;?></span>
					  </div>
					  <input style="display:none;" type="checkbox" id="plan2"  <?php if(!empty($savedplanData[0]->cplan_plan_id)){  if($savedplanData[0]->cplan_plan_id==$plan2Data[0]->plan_id){ echo "checked=checked";} } ?> name="planSelect[<?php echo $plan2Data[0]->plan_id;?>]">
					</div>
					<ul class="list-group">
						 <?php
						   foreach($plan2Data as $plan2Data){
							   ?>
					  <li data-target="#todo-1"  class="list-group-item" id="plan2_feature"  style="<?php if(!empty($savedplanData[0]->cplan_plan_id)){  if($savedplanData[0]->cplan_plan_id==$plan2Data->plan_id){ ?> background-color:#f7f8f9; <?php  } }?>" >
						<div class="media">
						  <div class="media-body">
							<div class="media">
								<a class="h5" href="javascript:void(0);" title="Plan Feartures"><?php echo $plan2Data->plan_features;?></a>
							</div>
							<?php /* ?>
							<div class="media">
								<span class="badge bg-info" title="Plan Price"><?php echo $plan2Data->plan_price;?></span>
						    </div>
							<?php */ ?>
						</div>
						<?php /* ?>
						<div class="col-lg-13 col-lg-samp">
                             <div class="checkbox">
                                 <label class="checkbox-custom">
                                 <input type="checkbox" name="planSelect[<?php echo $plan2Data->plan_id;?>]">
                                 <i class="fa fa-check-square-o"></i>
                                </label>
                              </div>
                           </div>
						   <?php */ ?>
                           </div>
					  </li>
					  <?php }?>
					</ul>
				  </section>
				</div>
				 <!--div class="col-sm-4">
				 <section class="panel" onclick="toggleCheckbox('plan3'); return false;">
					<div id="form-wizard" class="wizard clearfix" >
					  <ul class="steps">
						<li class="active" data-target="#step1"><span class="badge badge-info">3</span>Plan 3</li>
						<?php if(!empty($plan3Data[0]->plan_type_text)){ ?><li class="active" data-target="#step1"> <?php echo $plan3Data[0]->plan_type_text;?></li><?php }?>
					  </ul>
					   <div class="media" style="text-align:right;">
						<span class="badge bg-info" title="Plan Price">&euro; <?php echo $plan3Data[0]->plan_price;?></span>
					  </div>
					  <input style="display:none;" type="checkbox"  id="plan3" name="planSelect[<?php echo $plan3Data[0]->plan_id;?>]">
					</div>
					
					<ul class="list-group">
						 <?php
						   foreach($plan3Data as $plan3Data){
							   ?>
					  <li data-target="#todo-1"  class="list-group-item" id="plan3_feature">
						<div class="media">
						  <div class="media-body">
							<div class="media">
								<a class="h5" href="javascript:void(0);" title="Plan Feartures"><?php echo $plan3Data->plan_features;?></a>
							</div>
							<?php /* ?>
							<div class="media">
							<span class="badge bg-info" title="Plan Price"><?php echo $plan3Data->plan_price;?></span>
							</div>
							<?php */ ?>
						  </div>
						<?php /* ?>
						<div class="col-lg-13 col-lg-samp">
                             <div class="checkbox">
                                 <label class="checkbox-custom">
                                 <input type="checkbox" name="planSelect[<?php echo $plan3Data->plan_id;?>]">
                                 <i class="fa fa-check-square-o"></i>
                                </label>
                              </div>
                           </div>
						   <?php */ ?>
                           </div>
					  </li>
					  <?php }?>
					</ul>
				  </section>
				</div-->
                
               <div class="col-lg-9 col-lg-offset-5 offset-3-new">                      
                    <button type="submit" class="btn btn-primary"><?php
					
				if($pageSource=='add'){ ?> Save Plan <?php }else { ?><?php }?> Update Plan</button>
            </div>
            </div>
          </section>
         
        </div>

          <?php echo form_close(); ?>

    </section>
  </section>
  
<script>
function toggleCheckbox(id) {

	//document.getElementById("plan3").checked = false;
	document.getElementById("plan2").checked = false;
	document.getElementById("plan1").checked = false;
	document.getElementById(id).checked = !document.getElementById(id).checked;
	document.getElementById('plan1_feature').style.background='#FFF';
	document.getElementById('plan2_feature').style.background='#FFF';
//	document.getElementById('plan3_feature').style.background='#FFF';
	document.getElementById(id+'_feature').style.background='#f7f8f9';
	
}
</script>
<style>
.col-sm-4,.panelPointer
{
	cursor:pointer;
	}</style>
