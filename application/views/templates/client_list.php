  <section id="content">
    <section class="main padder">
      <div class="clearfix">
        <h4><i class="fa fa-table"></i>Client List</h4>
        <!--div class="addLink"><a href="<?php echo base_url();?>payment/add_payment">Add Payment</a></div-->
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
                    <th width="15%">Client Name</th>
                    <th width="15%">Email</th>
                    <th width="15%">Mobile</th>
                    <th width="15%">Created Date / Time</th>
                    <th width="10%">Action</th>
                    
                  </tr>
                </thead>
                <tbody>
					<?php 
					if(!empty($confData)){
					foreach($confData as  $confData){?>
					
					<tr id="myAjaxPayment_<?php echo $confData->user_id;?>">
                    <td><?php echo $confData->user_firstname." " .$confData->user_lastname;?></td>
                    <td><?php echo $confData->user_email;?></td>
                    <td><?php echo $confData->user_mobile;?></td>
                    <td><?php echo $confData->user_created;?></td>
                    <td align="center">
						<!---a href="<?php echo base_url();?>payment/edit_payment/<?php echo $confData->user_id; ?>"><i class="fa fa-pencil"></i></a>&nbsp;-->
						<a title="View" href="<?php echo base_url();?>client/client_view/<?php echo $confData->user_id; ?>"><i class="fa fa-list-alt"></i></a> 
						<a title="Delete"  href="javascript:void(0);" onclick="deleteClient(<?php echo $confData->user_id; ?>);" ><i class="fa fa-times-circle"></i></a> 
						
                    </td>
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

	
	function deleteClient(cl_id){	
		if(!confirm('Are you sure want to delete?'))
	{
		return false;
	}
	else
	{
		jQuery.ajax({
			type: "POST",
			url: '<?php echo base_url();?>client/delete_client/'+cl_id,
			data: {
				user_id: cl_id
			},
			beforeSend: function () {
				//$("#loading_div").show();
			},
			complete: function () {
				//$("#loading_div").hide();
			},
			success: function (msg) {
					window.location = "<?php echo base_url();?>client/";
					/*jQuery.ajax({
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
		});*/
				
			}
		});
	}
	}
	
	
	
</script>
