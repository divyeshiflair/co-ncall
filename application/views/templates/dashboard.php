<?php $userRole = $this->session->userdata('user_role'); ?>
<?php if($userRole == 1 || $userRole == 3): ?>
<section id="content">
    <section class="main padder">
		<div class="row">
			<div class="col-lg-12">
				<section class="toolbar clearfix m-t-large m-b">
					<a href="#" class="btn btn-white btn-circle"><i class="fa fa-envelope-o"></i>Inbox <b class="badge bg-white">5</b></a>
					<a href="#" class="btn  btn-circle active"><i class="fa fa-lightbulb-o"></i>Projects</a>
					<a href="#" class="btn btn-success btn-circle"><i class="fa fa-check"></i>Tasks</a>
					<a href="#" class="btn btn-info btn-circle active"><i class="fa fa-clock-o"></i>Timeline<b class="badge bg-info"><i class="fa fa-plus"></i></b></a>
					<a href="#" class="btn btn-inverse btn-circle"><i class="fa fa-bar-chart-o"></i>Stats</a>
					<a href="#" class="btn btn-warning btn-circle"><i class="fa fa-calendar-o"></i>Calendar</a>
					<a href="#" class="btn btn-danger btn-circle"><i class="fa fa-group"></i>Groups</a>
					<a href="#" class="btn btn-circle"><i class="fa fa-plus"></i>More</a>
				</section>
			</div>
		</div>
    </section>
</section>
<?php else : ?>
<section id="content">
    <section class="main padder">
		<div class="row">
			<div class="col-lg-12">
				<?php 
					$confdata=$this->langsModel->getDashboardData($this->session->userdata('cur_lang_code'));
					$lan_config_text= $confdata[0]->lan_config_text;
					$lan_company_text= $confdata[0]->lan_company_text;
					$lan_payment_text= $confdata[0]->lan_payment_text;
					$lan_employee_text= $confdata[0]->lan_employee_text;
				?>
					
				<section class="toolbar clearfix m-t-large m-b">
					<a href="<?php echo base_url();?>configurations" class="btn btn-success btn-circle"><i class="fa fa-cogs fa-lg"></i><?php echo $lan_config_text;?>
					<?php if($configurationData): ?>
						<div class="data-yes"><i class="fa fa-thumbs-o-up"></i></div>
					<?php else: ?>
						<div class="data-no"><i class="fa fa-times"></i></div>
					<?php endif; ?>
					</a>
					
					<a href="<?php echo base_url();?>company" class="btn btn-danger btn-circle"><i class="fa fa-building fa-lg"></i><?php echo $lan_company_text;?>
					<?php if($companyData): ?>
						<div class="data-yes"><i class="fa fa-thumbs-o-up"></i></div>
					<?php else: ?>
						<div class="data-no"><i class="fa fa-times"></i></div>
					<?php endif; ?>
					</a>

					<a href="<?php echo base_url();?>payment" class="btn btn-warning btn-circle"><i class="fa fa-cc-mastercard"></i><?php echo $lan_payment_text;?>
					<?php if($paymentData): ?>
						<div class="data-yes"><i class="fa fa-thumbs-o-up"></i></div>
					<?php else: ?>
						<div class="data-no"><i class="fa fa-times"></i></div>
					<?php endif; ?>	
					</a>				

					<a href="<?php echo base_url();?>employee" class="btn btn-gplus btn-circle"><i class="fa fa-user"></i><?php echo $lan_employee_text;?>
					
					<?php if($employeeData): ?>
						<div class="data-yes"><i class="fa fa-thumbs-o-up"></i></div>
					<?php else: ?>
						<div class="data-no"><i class="fa fa-times"></i></div>
					<?php endif; ?>		
					</a>			
				</section>
			</div>
		</div>
    </section>
</section>
<?php endif; ?>
