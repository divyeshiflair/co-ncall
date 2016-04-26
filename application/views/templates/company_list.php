 <section id="content">
    <section class="main padder">
      <div class="clearfix">
        <h4><i class="fa fa-table"></i>Company List</h4>
        <!--<div class="addLink"><a href="<?php echo base_url();?>configurations/add_configrations">Add Configurations</a></div>-->
      </div>
      
      <div class="row">
        <div class="col-lg-12">
          <section class="panel">
            <!-- <header class="panel-heading"> <i class="fa fa-info-sign text-muted" data-toggle="popover" data-html="true" data-placement="top" data-content="The datatables use ajax to load the data. please put this file on a server to preview." title="" data-trigger="hover" data-original-title="Help"></i> 
            <div class="addLink"><a href="<?php echo base_url();?>configurations/add_configrations">Add Configurations</a></div></header> -->
            <div class="table-responsive">
              <table class="table table-striped m-b-none"  data-ride="datatables">
                <thead>
                  <tr>
                    <th width="15%">Company Name</th>
                    <th width="15%">Address</th>
                    <th width="10%">Postal Code</th>
                    <th width="10%">City</th>
                    <th width="15%">Department</th>
                    <th width="10%">Phone Number</th>
					<th width="10%">Fax</th>
					<th width="15%">Email</th>
                  </tr>
                </thead>
                <tbody>
					<?php 
					foreach($confData as  $confData){?>
					
					<tr>
                    <td><?php echo $confData->com_cname;?></td>
                    <td><?php echo $confData->com_add1;?></td>
                    <td><?php echo $confData->com_add2;?></td>
                    <td><?php echo $confData->com_add3;?></td>
                    <td><?php echo $confData->com_add4;?></td>
					<td><?php echo $confData->com_telephone;?></td>
					<td><?php echo $confData->com_fax;?></td>
					<td><?php echo $confData->com_email;?></td>
                    
					</tr>
					<?php 
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
	}</style>
