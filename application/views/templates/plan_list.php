 <section id="content">
    <section class="main padder">
      <div class="clearfix">
        <h4><i class="fa fa-table"></i>Plan List</h4>
        <div class="addLink"><a href="<?php echo base_url();?>plan/add_plan">Add Plan</a></div>
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
					 <i class="fa fa-check fa-lg"></i><strong>Well done!</strong> You successfully <?php echo $returnMSG;?> the plan</a>.
				  </div>
			<?php } ?>
			
          <section class="panel">
            <!-- <header class="panel-heading"> <i class="fa fa-info-sign text-muted" data-toggle="popover" data-html="true" data-placement="top" data-content="The datatables use ajax to load the data. please put this file on a server to preview." title="" data-trigger="hover" data-original-title="Help"></i> 
            <div class="addLink"><a href="<?php echo base_url();?>configurations/add_configrations">Add Configurations</a></div></header> -->
            <div class="table-responsive">
              <table class="table table-striped m-b-none datatablessasd" >
                <thead>
                  <tr>
                    <th width="15%">Sr Number</th>
                    <th width="25%">Plan Name</th>
                    <th width="30%">Features</th>
                    <th width="20%">Price</th>
					<th width="10%">Action</th>
                    
                  </tr>
                </thead>
                <tbody>
					<?php 
					if(!empty($planData)){
					$i=1;
					foreach($planData as  $planData){?>
					
					<tr>
					<td><?php echo $i; ?></td>
                    <td><?php echo $planData->plan_type;?></td>
                    <td><?php echo $planData->plan_features;?></td>
                    <td><?php echo $planData->plan_price;?></td>                    
                    <td>
						<a href="<?php echo base_url();?>plan/edit_plan/<?php echo $planData->plan_id; ?>"><i class="fa fa-pencil"></i></a>&nbsp;
						<a href="javascript:void(0);" onclick="deletePlan(<?php echo $planData->plan_id; ?>);" ><i class="fa fa-times-circle"></i></a> 
                    </td>
				</tr>
				<?php 
					$i++;
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

	
	function deletePlan(mainId){	
		if(!confirm('Are you sure want to delete?'))
	{
		return false;
	}
	else
	{
		jQuery.ajax({
			type: "POST",
			url: '<?php echo base_url();?>plan/delete_plan/'+mainId,
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
					window.location = "<?php echo base_url();?>plan/";
					
				
			}
		});
	}
	}
	
	
	
</script>
