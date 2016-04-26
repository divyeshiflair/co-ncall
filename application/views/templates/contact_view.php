<section id="content">
   <section class="main padder">
      <div class="clearfix">
         <h4><i class="fa fa-edit"></i><?php echo "View Contact" ;?></h4>
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
                     <div class="col-lg-3 control-label">
                        
                        <?php if(!empty($confData[0]->con_firstname)){ echo trim($confData[0]->con_firstname);}?>
                        
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-lg-3 control-label">Company </label>
                     <div class="col-lg-3 control-label control-label">
                        <?php if(!empty($confData[0]->con_company)){ echo trim($confData[0]->con_company); }?>
                        
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-lg-3 control-label">E-Mail </label>
                     <div class="col-lg-3 control-label">
                        <?php if(!empty($confData[0]->con_email)){ echo trim($confData[0]->con_email); }?>
                        
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-lg-3 control-label">Notes</label>
                     <div class="col-lg-3 control-label">
                        <?php if(!empty($confData[0]->con_note)){ echo trim($confData[0]->con_note); }?>
                     </div>
                  </div>
                   <div class="form-group">
                     <label class="col-lg-4 control-label"> This contact is a VIP</label>
                     <div class="col-lg-4 control-label">
                        <?php echo $confData[0]->con_is_vip; ?>
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
							<div class="col-lg-3 control-label">
								<?php if(!empty($confData[0]-> con_lastname)){ echo trim($confData[0]-> con_lastname);}?>
								<div class="checkbox">
								</div>
							</div>
						</div>
                        
						  <div class="col-lg-12 ">
							 <label class="col-lg-3 control-label">Phone1 </label>
							 <div class="col-lg-3 control-label">
								 <?php if(!empty($confData[0]-> con_phone1)){ echo trim($confData[0]-> con_phone1);}?>
								<div class="checkbox">
									
								</div>
							 </div>
						  </div>
						   <div class="col-lg-12 ">
							 <label class="col-lg-3 control-label">Phone2 </label>
							 <div class="col-lg-3 control-label">
								<?php if(!empty($confData[0]-> con_phone2)){ echo trim($confData[0]-> con_phone2);}?>
								<div class="checkbox">
									
								</div>
							 </div>
						  </div>
                      </div>
                 <div class=" rowcol-lg-samp">&nbsp;</div> 
                     <div class="form-group">
                        <div class="col-lg-9 col-lg-offset-3 offset-3-new">                      
                           <a href="<?php echo base_url();?>contact"><button type="button" class="btn btn-white">Back</button></a>
                           <a href="#"><button type="button" class="btn btn-white">Call Order Form</button></a>
                           
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

		
