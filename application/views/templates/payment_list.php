  <section id="content">
    <section class="main padder">
      <div class="clearfix">
        <h4><i class="fa fa-table"></i>Payment List</h4>
        <!--<div class="addLink"><a href="<?php echo base_url();?>payment/add_payment">Add Payment</a></div>-->
      </div>
      
      <div class="row">
        <div class="col-lg-12">
			 <?php
			  //Displayed sucess message on view page
			  $returnMSG=$this->session->userdata('msg');
			  if(!empty($returnMSG)){
			  ?>
				  <div class="alert alert-success">
					  <button data-dismiss="alert" class="close" type="button"><i class="fa fa-times"></i></button>
					 <i class="fa fa-check fa-lg"></i><strong>Well done!</strong> You successfully <?php echo $returnMSG;?> the payment</a>.
				  </div>
			<?php } ?>
			<!--<div class="alert alert-success" id="deletePay" style="display:none;">
				<button data-dismiss="alert" class="close" type="button"><i class="fa fa-times"></i></button>
				 <i class="fa fa-check fa-lg"></i><strong>Well done!</strong> You successfully deleted the payment</a>.
			</div>-->
			
          <section class="panel">
            <!-- <header class="panel-heading"> <i class="fa fa-info-sign text-muted" data-toggle="popover" data-html="true" data-placement="top" data-content="The datatables use ajax to load the data. please put this file on a server to preview." title="" data-trigger="hover" data-original-title="Help"></i> 
            <div class="addLink"><a href="<?php echo base_url();?>configurations/add_configrations">Add Configurations</a></div></header> -->
            <div class="table-responsive">
              <table class="table table-striped m-b-none datatablessasd"  >
                <thead>
                  <tr>
                    <th width="10%">Company Name</th>
                    <th width="15%">Address</th>
                    <th width="15%">Postal Code</th>
                    <th width="15%">City</th>
                    <th width="15%">Department</th>
                    <th width="10%">Email</th>
                    
                  </tr>
                </thead>
                <tbody>
					<?php 
					if(!empty($confData)){
					foreach($confData as  $confData){?>
					
					<tr id="myAjaxPayment_<?php echo $confData->pay_id;?>">
                    <td><?php echo $confData->pay_billname;?></td>
                    <td><?php echo $confData->pay_billaddress1;?></td>
                    <td><?php echo $confData->pay_billaddress2;?></td>
                    <td><?php echo $confData->pay_billaddress3;?></td>
					<td><?php echo $confData->pay_billaddress4;?></td>
                    <td><?php echo $confData->pay_billemail;?></td>

				</tr>
				<?php 
					}
				}
				?>
                </tbody>
              </table>
            </div>
          </section>
        </div>
      </div>
    </section>
  </section>
  
<style>
.addLink
{
	float:right;
}
</style>
<script type="text/javascript" >

	
	function deletePayment(pay_id){	
		if(!confirm('Are you sure want to delete?'))
	{
		return false;
	}
	else
	{
		jQuery.ajax({
			type: "POST",
			url: '<?php echo base_url();?>payment/delete_payment/'+pay_id,
			data: {
				payment_id: pay_id
			},
			beforeSend: function () {
				//$("#loading_div").show();
			},
			complete: function () {
				//$("#loading_div").hide();
			},
			success: function (msg) {
					//window.location = "<?php echo base_url();?>payment/";
					jQuery.ajax({
						type: "POST",
						url: '<?php echo base_url();?>payment/afterDeletePaymentList',
						data: {
							payment_id: pay_id
						},
						beforeSend: function () {
							//$("#loading_div").show();
						},
						complete: function () {
							//$("#loading_div").hide();
						},
						success: function (msg) {
								$('#content').html(msg);
								//window.location = "<?php echo base_url();?>payment/";
							
						}
		});
				
			}
		});
	}
	}
	
	
	
</script>
