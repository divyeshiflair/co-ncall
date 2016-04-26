 <section id="content">
    <section class="main padder">
      <div class="clearfix">
        <h4><i class="fa fa-table"></i>Employee List</h4>
        <div class="addLink"><a href="<?php echo base_url();?>employee/add_employee">Manage Employee</a></div>
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
					 <i class="fa fa-check fa-lg"></i><strong>Well done!</strong> You successfully <?php echo $returnMSG;?> the employee</a>.
				  </div>
			<?php } ?>
			
          <section class="panel">
            <!-- <header class="panel-heading"> <i class="fa fa-info-sign text-muted" data-toggle="popover" data-html="true" data-placement="top" data-content="The datatables use ajax to load the data. please put this file on a server to preview." title="" data-trigger="hover" data-original-title="Help"></i> 
            <div class="addLink"><a href="<?php echo base_url();?>configurations/add_configrations">Add Configurations</a></div></header> -->
            <div class="table-responsive">
              <table class="table table-striped m-b-none datatablessasdAjax" >
                <thead>
                  <tr>
                    <th width="10%">Firstname</th>
                    <th width="15%">Lastname</th>
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
                    <td>
						<a href="<?php echo base_url();?>employee/edit_employee/<?php echo $confData->emp_id; ?>"><i class="fa fa-pencil"></i></a>&nbsp;
						<a href="javascript:void(0);" onclick="deleteEmplyee(<?php echo $confData->emp_id; ?>);" ><i class="fa fa-times-circle"></i></a> 
						
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
        <script>
    $('.datatablessasdAjax').dataTable({"sDom": "<'row'<'col-sm-6'l><'col-sm-6'f>r>t<'row'<'col-sm-6'i><'col col-sm-6'p>>",
			"sPaginationType": "full_numbers"
	});</script>
  </section>
  </section>
