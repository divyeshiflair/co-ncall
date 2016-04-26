 <section id="content">
    <section class="main padder">
      <div class="clearfix">
        <h4><i class="fa fa-table"></i>Responsibility List</h4>
        <div class="addLink"><a href="<?php echo base_url();?>responsibility/add_responsibility">Add Responsibility</a></div>
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
					 <i class="fa fa-check fa-lg"></i><strong>Well done!</strong> You successfully <?php echo $returnMSG;?> the responsibility</a>.
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
                    <th width="60%">Responsibility</th>
					<th width="15%">Action</th>
                    
                  </tr>
                </thead>
                <tbody>
					<?php 
					if(!empty($confData)){
					$i=1;
					foreach($confData as  $confData){?>
					
					<tr>
					<td><?php echo $i; ?></td>
                    <td><?php echo $confData->res_value;?></td>
                    <td align="center">
						<a href="<?php echo base_url();?>responsibility/edit_responsibility/<?php echo $confData->res_id; ?>"><i class="fa fa-pencil"></i></a>&nbsp;
						<a href="javascript:void(0);" onclick="deleteResponsibility(<?php echo $confData->res_id; ?>);" ><i class="fa fa-times-circle"></i></a> 
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

	
	function deleteResponsibility(mainId){	
		if(!confirm('Are you sure want to delete?'))
	{
		return false;
	}
	else
	{
		jQuery.ajax({
			type: "POST",
			url: '<?php echo base_url();?>responsibility/delete_responsibility/'+mainId,
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
					window.location = "<?php echo base_url();?>responsibility/";
					
				
			}
		});
	}
	}
	
	
	
</script>
