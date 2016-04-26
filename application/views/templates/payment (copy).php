<section id="content">
    <section class="main padder">
      <div class="clearfix">
        <h4><i class="fa fa-edit"></i><?php if($pageSource=='add'){ echo "Add Payment";}else{ echo "Edit Payment";}?></h4>
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
            <div class="panel-body">
				<?php
				if($pageSource=='add'){
					echo form_open('payment/save_payment', 'class=form-horizontal data-validate=parsley'); 
				 }else{ 
					 echo form_open('payment/update_payment', 'class=form-horizontal data-validate=parsley'); 
				 }
				 ?>
				<div class="form-group">
                  <label class="col-lg-3 control-label">Company Name</label>
                  <div class="col-lg-8">
                    <input type="hidden" name="pay_id"  value="<?php echo set_value('pay_id'); ?><?php if(!empty($confData[0]->pay_id)) { echo $confData[0]->pay_id; }?>" >
                    <input type="text" name="pay_billname" placeholder="Company Name" data-required="true" value="<?php echo set_value('pay_billname'); ?><?php if(!empty($confData[0]->pay_billname)){ echo $confData[0]->pay_billname; }?>" class="form-control">
                  </div>
                </div>
                 <div class="form-group">
                  <label class="col-lg-3 control-label">Address</label>
                  <div class="col-lg-8">
                    <input type="text" name="pay_billaddress1" placeholder="Address" data-required="true" value="<?php echo set_value('pay_billaddress1'); ?><?php if(!empty($confData[0]-> pay_billaddress1 )){ echo $confData[0]-> pay_billaddress1 ; }?>" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-3 control-label">Postal Code</label>
                  <div class="col-lg-8">
                    <input type="text" name="pay_billaddress2" placeholder="Postal Code" data-required="true" value="<?php echo set_value('pay_billaddress2'); ?><?php if(!empty($confData[0]-> pay_billaddress2 )){ echo $confData[0]-> pay_billaddress2 ; }?>"  class="form-control">
                  </div>
                </div>
               <div class="form-group">
                  <label class="col-lg-3 control-label">City</label>
                  <div class="col-lg-8">
                    <input type="text" name="pay_billaddress3" placeholder="City" data-required="true" value="<?php echo set_value('pay_billaddress3'); ?><?php if(!empty($confData[0]-> pay_billaddress3 )){ echo $confData[0]-> pay_billaddress3 ; }?>" class="form-control">
                  </div>
                </div>
                  <div class="form-group">
                  <label class="col-lg-3 control-label">Department</label>
                  <div class="col-lg-8">
                    <input type="text" name="pay_billaddress4" placeholder="Department" data-required="true" value="<?php echo set_value('pay_billaddress4'); ?><?php if(!empty($confData[0]-> pay_billaddress4 )){ echo $confData[0]-> pay_billaddress4; }?>" class="form-control">
                  </div>
                </div>
                 <div class="form-group">
                  <label class="col-lg-3 control-label">E-Mail </label>
                  <div class="col-lg-8">
                    <input type="text" name="pay_billemail" placeholder="E-Mail" value="<?php echo set_value('pay_billemail'); ?><?php if(!empty($confData[0]->pay_billemail)){ echo $confData[0]->pay_billemail; }?>" data-required="true "  class="form-control" data-type="email">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-3 control-label">Bank Account Name </label>
                  <div class="col-lg-8">
                    <input type="text" name="pay_bankaccount" placeholder="Name of the Owner" value="<?php echo set_value('pay_bankaccount'); ?><?php if(!empty($confData[0]->pay_bankaccount)){ echo $confData[0]->pay_bankaccount; }?>" data-required="true"  class="form-control">
                  </div>
                </div>
                 <div class="form-group">
                  <label class="col-lg-3 control-label">IBAN </label>
                  <div class="col-lg-8">
                    <input type="text" name="pay_iban" placeholder="IBAN" value="<?php echo set_value('pay_iban'); ?><?php if(!empty($confData[0]->pay_iban )){ echo $confData[0]->pay_iban ; }?>" data-required="true"  class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-3 control-label">BIC </label>
                  <div class="col-lg-8">
                    <input type="text" name="pay_bic" placeholder="BIC" value="<?php echo set_value('pay_bic'); ?><?php if(!empty($confData[0]-> pay_bic )){ echo $confData[0]-> pay_bic ; }?>" data-required="true"  class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-3 control-label">Bank Name </label>
                  <div class="col-lg-8">
                    <input type="text" name="pay_bankname" placeholder="Bank Name" value="<?php echo set_value('pay_bankname'); ?><?php if(!empty($confData[0]->pay_bankname  )){ echo $confData[0]->pay_bankname  ; }?>" data-required="true"  class="form-control">
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
