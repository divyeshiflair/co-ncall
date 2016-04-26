 <section id="content">
    <section class="main padder">
      <div class="clearfix">
        <h4><i class="fa fa-table"></i>Configurations List</h4>
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
                    <th width="15%">Greeting</th>
                    <th width="15%">Business</th>
                    <th width="10%">Business Hours</th>
                    <th width="15%">Awy Message</th>
                    <th width="15%">Additional Information</th>
                                        <th width="10%">Action</th>

                  </tr>
                </thead>
                <tbody>
					<?php 
					foreach($confData as  $confData){?>
					<tr>
						<td><?php echo $confData->con_greeting;?></td>
						<td><?php echo $confData->con_business;?></td>
						<td><?php echo $confData->con_business_hour;?></td>
						<td><?php echo $confData->con_awy_msg;?></td>
						<td><?php echo $confData->con_additional;?></td>
						<td align="center">
							<!---a href="<?php echo base_url();?>payment/edit_payment/<?php echo $confData->con_user_id; ?>"><i class="fa fa-pencil"></i></a>&nbsp;-->
							<a href="<?php echo base_url();?>configurations/config_view/<?php echo $confData->con_user_id; ?>"><i class="fa fa-list-alt"></i></a> 
							<!--a href="javascript:void(0);" onclick="deleteConfig(<?php echo $confData->con_user_id; ?>);" ><i class="fa fa-times-circle"></i></a>---> 
						</td>
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
