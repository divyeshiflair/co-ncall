 <section id="content">
    <section class="main padder">
      <div class="clearfix">
        <h4><i class="fa fa-table"></i>Employee List</h4>
       </div>
      
      <div class="row">
        <div class="col-lg-12">
          <section class="panel">
            <div class="table-responsive">
              <table class="table table-striped m-b-none datatablessasd" >
                <thead>
                  <tr>
                    <th width="10%">First Name</th>
                    <th width="15%">Last Name</th>
                    <th width="15%">Job Title</th>
                    <th width="15%">Responsibility</th>
                    <th width="15%">Email</th>
                    <th width="10%">Action</th>
                    
                  </tr>
                </thead>
                <tbody>
					<?php 
					if(!empty($confData)){
					foreach($confData as  $confData){?>
					
					<tr>
                    <td><?php echo $confData->emp_firstname;?></td>
                    <td><?php echo $confData->emp_lastname?></td>
                    <td><?php echo $confData->emp_title;?></td>
                    <td><?php echo $confData->emp_responsibility;?></td>
                    <td><?php echo $confData->emp_email;?></td>
                    <td align="center">
						<a href="<?php echo base_url();?>employee/employee_view/<?php echo $confData->emp_id; ?>"><i class="fa fa-list-alt"></i></a> 
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

	
	function deleteEmplyee(mainId){	
		if(!confirm('Are you sure want to delete?'))
	{
		return false;
	}
	else
	{
		jQuery.ajax({
			type: "POST",
			url: '<?php echo base_url();?>employee/delete_employee/'+mainId,
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
					window.location = "<?php echo base_url();?>employee/";
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
