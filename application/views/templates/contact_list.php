 <section id="content">
    <section class="main padder">
      <div class="clearfix">
        <h4><i class="fa fa-table"></i>Contact List</h4>
        <div class="addLink"><a href="<?php echo base_url();?>contact/add_contact">Add Contact</a></div>
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
					 <!--i class="fa fa-check fa-lg"></i><strong>Well done!</strong> You successfully <?php echo $returnMSG;?> the employee</a>-->
   		             <i class="fa fa-check fa-lg"></i><strong>Well done!</strong> Contact has been <?php echo $returnMSG;?> successfully</a>.

				  </div>
			<?php } ?>
			
          <section class="panel">
            <!-- <header class="panel-heading"> <i class="fa fa-info-sign text-muted" data-toggle="popover" data-html="true" data-placement="top" data-content="The datatables use ajax to load the data. please put this file on a server to preview." title="" data-trigger="hover" data-original-title="Help"></i> 
            <div class="addLink"><a href="<?php echo base_url();?>configurations/add_configrations">Add Configurations</a></div></header> -->
            <div class="table-responsive">
              <table class="table table-striped m-b-none datatablessasd" >
                <thead>
                  <tr>
                    <th width="10%">Firstname</th>
                    <th width="15%">Lastname</th>
                    <th width="15%">Phone</th>
                    <th width="15%">Company</th>
                    <th width="15%">Email</th>
                    <th width="10%">Action</th>
                    
                  </tr>
                </thead>
                <tbody>
					<?php 
					if(!empty($confData)){
					foreach($confData as  $confData){?>
					
					<tr>
                    <td><?php echo $confData->con_firstname;?></td>
                    <td><?php echo $confData->con_lastname?></td>
                    <td><?php echo $confData->con_phone1;?></td>
                    <td><?php echo $confData->con_company;?></td>
                    <td><?php echo $confData->con_email;?></td>
                    <td>
						<a href="<?php echo base_url();?>contact/edit_contact/<?php echo $confData->con_id; ?>"><i class="fa fa-pencil"></i></a>&nbsp;
						<a href="<?php echo base_url();?>contact/view_contact/<?php echo $confData->con_id; ?>"><i class="fa fa-eye"></i></i></a>&nbsp;
						<a href="javascript:void(0);" onclick="deleteContact(<?php echo $confData->con_id; ?>);" ><i class="fa fa-times-circle"></i></a> 
						
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

	
	function deleteContact(mainId){	
		if(!confirm('Are you sure want to delete?'))
	{
		return false;
	}
	else
	{
		jQuery.ajax({
			type: "POST",
			url: '<?php echo base_url();?>contact/delete_contact/'+mainId,
			data: {
				payment_id: mainId
			},
			beforeSend: function () {
				//$("#loading_div").show();
			},
			complete: function () {
				//$("#loading_div").hide();
			},
			success: function (msg) {
					window.location = "<?php echo base_url();?>contact/";
					/*jQuery.ajax({
						type: "POST",
						url: '<?php echo base_url();?>employee/afterDeleteEmployeeList',
						data: {
							payment_id: mainId
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
