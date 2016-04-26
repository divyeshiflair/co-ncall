<?php
   ini_set('memory_limit', '-1'); 
   ?>
<section id="content">
   <section class="main padder">
      <div class="clearfix">
         <h4><i class="fa fa-edit"></i><?php if($pageSource=='add'){ echo "Add Contact";}else{ echo "Edit Contact";}?></h4>
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
                <?php
                     if($pageSource=='add'){
                     	echo form_open_multipart('contact/save_contact', 'class=form-horizontal data-validate=parsley'); 
                      }else{ 
                     	 echo form_open_multipart('contact/update_contact', 'class=form-horizontal data-validate=parsley'); 
                      }
                      
                      ?>
      <div class="row">
         <div class="col-sm-6">
            <section class="panel">
               <div class="panel-body left-panel-body">
           
                  <input type="hidden" name="con_id"  value=" <?php echo set_value('con_id'); ?> <?php if(!empty($confData[0]->con_id)) { echo trim($confData[0]->con_id); }?>" >
                  <div class="form-group">
                     <label class="col-lg-3 control-label">Firstname</label>
                     <div class="col-lg-8">
                        <input type="hidden" name="con_id"  value=" <?php echo set_value('con_id'); ?> <?php if(!empty($confData[0]->con_id)) { echo trim($confData[0]->con_id); }?>" >
                        <input type="text" name="con_firstname" maxlength="30" placeholder="Firstname" data-required="true" value="<?php echo set_value('con_firstname');?><?php if(!empty($confData[0]->con_firstname)){ echo trim($confData[0]->con_firstname);}?>" class="form-control">
                        
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-lg-3 control-label">Company </label>
                     <div class="col-lg-8">
                        <input type="text" name="con_company" maxlength="60" placeholder="Company" value="<?php echo set_value('con_company'); if(!empty($confData[0]->con_company)){ echo trim($confData[0]->con_company); }?>" data-required="true "  class="form-control">
                        
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-lg-3 control-label">E-Mail </label>
                     <div class="col-lg-8">
                        <input type="text" name="con_email" maxlength="60" placeholder="E-Mail" value="<?php echo set_value('con_email'); if(!empty($confData[0]->con_email)){ echo trim($confData[0]->con_email); }?>" data-required="true "  class="form-control" data-type="email">
                        
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-lg-3 control-label">Notes</label>
                     <div class="col-lg-8">
                        <textarea placeholder="Profile" rows="5" class="form-control" data-trigger="keyup" name="con_note"><?php echo set_value('con_note'); if(!empty($confData[0]->con_note)){ echo trim($confData[0]->con_note); }?> </textarea>
                     </div>
                  </div>
                  <div class="col-lg-12 col-lg-samp">
                             <div class="checkbox">
                                 <label class="checkbox-custom">
                                 <input type="checkbox" name="con_vip" <?php if(isset($confData[0]->con_is_vip)){ 
					if($confData[0]->con_is_vip=='yes') { ?>checked="checked" <?php }
					} ?>>
                                 <i class="fa fa-check-square-o"></i>
                                This contact is a VIP
                                 </label>
                              </div>
                           </div>
               </div>
            </section>
         </div>
         <div class="col-sm-6">
            <div class="panel">
               <div class="clearfix panel-body right-panel-body">
                  <div>
                     <div class=" rowcol-lg-samp">&nbsp;</div>
                     <div class="row">
						 
						<div class="col-lg-12 ">
							<label class="col-lg-3 control-label">Lastname</label>
							<div class="col-lg-8">
								<input type="text" name="con_lastname" maxlength="30"  placeholder="Lastname" data-required="true" value="<?php echo set_value('con_lastname');?><?php if(!empty($confData[0]-> con_lastname)){ echo trim($confData[0]-> con_lastname);}?>" class="form-control">
								<div class="checkbox">
								</div>
							</div>
						</div>
                        
						  <div class="col-lg-12 ">
							 <label class="col-lg-3 control-label">Phone1 </label>
							 <div class="col-lg-8">
								<input type="text" name="con_phone1" data-type="number" maxlength="13"  data-required="true" placeholder="Mobile Phone" value="<?php echo set_value('con_phone1'); ?><?php if(!empty($confData[0]-> con_phone1)){ echo trim($confData[0]-> con_phone1);}?>" data-required="true"  class="form-control">
								<div class="checkbox">
									
								</div>
							 </div>
						  </div>
						   <div class="col-lg-12 ">
							 <label class="col-lg-3 control-label">Phone2 </label>
							 <div class="col-lg-8">
								<input type="text" name="con_phone2" data-type="number" maxlength="13"  placeholder="Mobile Phone" value="<?php echo set_value('con_phone2'); ?><?php if(!empty($confData[0]-> con_phone2)){ echo trim($confData[0]-> con_phone2);}?>"   class="form-control">
								<div class="checkbox">
									
								</div>
							 </div>
						  </div>
                      </div>
                 <div class=" rowcol-lg-samp">&nbsp;</div> 
                     <div class="form-group">
                        <div class="col-lg-9 col-lg-offset-3 offset-3-new">                      
                           <a href="<?php echo base_url();?>contact"><button type="button" class="btn btn-white">Cancel</button></a>
                           <button type="submit" class="btn btn-primary">
							   <?php
                     if($pageSource=='add'){
						 echo "Add Contact";
						 }else{
							echo "Update Contact";
							 }
							 ?></button>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <?php echo form_close(); ?>
      </div>
   </section>
</section>

		
