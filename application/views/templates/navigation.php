<?php $userRole = $this->session->userdata('user_role'); ?>
<?php if($userRole == 1): // Super Admin ?>
	<nav id="nav" class="nav-primary hidden-xs nav-vertical">
		<ul class="nav" data-spy="affix" data-offset-top="50">
			<li class="<?php if($this->uri->segment(1)=='dashboard') echo 'active'; ?>"><a href="<?php echo base_url();?>dashboard"><i class="fa fa-dashboard fa-lg"></i><span>Dashboard</span></a></li>
			<li class="<?php if($this->uri->segment(1)=='client') echo 'active'; ?>" ><a href="<?php echo base_url();?>client"><i class="fa fa-briefcase"></i><span>Clients</span></a></li>
			<li class="<?php if($this->uri->segment(1)=='operator') echo 'active'; ?>" ><a href="<?php echo base_url();?>operator"><i class="fa fa-user"></i><span>Operators</span></a></li>
			<li class="dropdown-submenu <?php if($this->uri->segment(1)=='greetings' || $this->uri->segment(1)=='jobtitle' || $this->uri->segment(1)=='plan' || $this->uri->segment(1)=='responsibility' || $this->uri->segment(1)=='away_message' || $this->uri->segment(1)=='callback_message') echo 'active'; ?>">
			<a href="#"><i class="fa fa-th fa-lg"></i><span>Elements</span></a>
			<ul class="dropdown-menu">
			  <li><a href="<?php echo base_url();?>greetings">Greetings</a></li>
			  <li><a href="<?php echo base_url();?>jobtitle">Job Title</a></li>
			  <li><a href="<?php echo base_url();?>responsibility">Responsibility</a></li>
			  <li><a href="<?php echo base_url();?>away_message">Away Message</a></li>			  
			  <li><a href="<?php echo base_url();?>callback_message">Call Back Message</a></li>
			  <li><a href="<?php echo base_url();?>plan">Plan Table</a></li>

			</ul>
		  </li>
		  
		  <li class="dropdown-submenu <?php if($this->uri->segment(1)=='languagemanage') echo 'active'; ?>">
			<a href="#"><i class="fa fa-edit fa-lg"></i><span>Language</span></a>
			<ul class="dropdown-menu">
			  <li><a href="<?php echo base_url();?>languagemanage/signin">Sign In</a></li>
			  <li><a href="<?php echo base_url();?>languagemanage/signup">Sign Up</a></li>
			  <li><a href="<?php echo base_url();?>languagemanage/dashboard">Dashboard / Menu</a></li>
			  <li><a href="<?php echo base_url();?>languagemanage/leftmenu">Left Menu</a></li>
			  <li><a href="<?php echo base_url();?>languagemanage/days">Days</a></li>
			  <li><a href="<?php echo base_url();?>languagemanage/calls">Call Page</a></li>
			  <li><a href="<?php echo base_url();?>languagemanage/configurations">Configurations Page</a></li>
			</ul>
		  </li>
		</ul>
	</nav>
<?php elseif($userRole == 3): // Operator ?>
	<nav id="nav" class="nav-primary hidden-xs nav-vertical">
		<ul class="nav" data-spy="affix" data-offset-top="50">
			<li class="<?php if($this->uri->segment(1)=='dashboard') echo 'active'; ?>"><a href="<?php echo base_url();?>dashboard"><i class="fa fa-dashboard fa-lg"></i><span>Dashboard</span></a></li>
			<li><a href="#"><i class="fa fa-phone fa-lg"></i><span>Calls</span></a></li>
			<li class="<?php if($this->uri->segment(1)=='configurations') echo 'active'; ?>" ><a href="<?php echo base_url();?>configurations/configurations_list"><i class="fa fa-cogs fa-lg"></i><span>Configurations</span></a></li>
			<li class="<?php if($this->uri->segment(1)=='company') echo 'active'; ?> " ><a href="<?php echo base_url();?>company/company_list"><i class="fa fa-building fa-lg"></i><span>Company</span></a></li>
			<li class="<?php if($this->uri->segment(1)=='payment') echo 'active'; ?> " ><a href="<?php echo base_url();?>payment/payment_list"><i class="fa fa-cc-mastercard fa-lg"></i><span>Payment</span></a></li>
			<li class="<?php if($this->uri->segment(1)=='employee') echo 'active'; ?> " ><a href="<?php echo base_url();?>employee/employee_list"><i class="fa fa-user fa-lg"></i><span>Employees</span></a></li>
			
		</ul>
	</nav>	
<?php else : ?>
	<nav id="nav" class="nav-primary hidden-xs nav-vertical">
		<ul class="nav" data-spy="affix" data-offset-top="50">
			<?php 
					$confdata=$this->langsModel->getLeftmenuData($this->session->userdata('cur_lang_code'));
					$lan_dashboard= $confdata[0]->lan_dashboard;
					$lan_call= $confdata[0]->lan_call;
					$lan_configurations= $confdata[0]->lan_configurations;
					$lan_company= $confdata[0]->lan_company;
					$lan_employee= $confdata[0]->lan_employee;
					$lan_analytics= $confdata[0]->lan_analytics;
					$lan_contact= $confdata[0]->lan_contact;
					
				?>
			<li class="<?php if($this->uri->segment(1)=='dashboard') echo 'active'; ?>"><a href="<?php echo base_url();?>dashboard"><i class="fa fa-dashboard fa-lg"></i><span><?php echo $lan_dashboard;?></span></a></li>
			<li class="<?php if($this->uri->segment(1)=='call') echo 'active'; ?>"  ><a href="<?php echo base_url();?>call"><i class="fa fa-phone fa-lg"></i><span><?php echo $lan_call;?></span></a></li>
			<li class="<?php if($this->uri->segment(1)=='configurations') echo 'active'; ?>" ><a href="<?php echo base_url();?>configurations"><i class="fa fa-cogs fa-lg"></i><span><?php echo $lan_configurations;?></span></a></li>
			<li class="<?php if($this->uri->segment(1)=='company') echo 'active'; ?> " ><a href="<?php echo base_url();?>company"><i class="fa fa-building fa-lg"></i><span><?php echo $lan_company;?></span></a></li>
			<!--<li class="<?php if($this->uri->segment(1)=='payment') echo 'active'; ?> " ><a href="<?php echo base_url();?>payment"><i class="fa fa-cc-mastercard fa-lg"></i><span>Payment</span></a></li>-->
			<li class="<?php if($this->uri->segment(1)=='employee') echo 'active'; ?> " ><a href="<?php echo base_url();?>employee"><i class="fa fa-user fa-lg"></i><span><?php echo $lan_employee;?></span></a></li>
			<li class="<?php if($this->uri->segment(1)=='contact') echo 'active'; ?> " ><a href="<?php echo base_url();?>contact/contact_list"><i class="fa fa-user fa-lg"></i><span><?php echo $lan_contact;?></span></a></li>
			<li class="<?php if($this->uri->segment(1)=='analytics') echo 'active'; ?> " ><a href="<?php echo base_url();?>call/analytics"><i class="fa fa-user fa-bar-chart-o"></i><span><?php echo $lan_analytics;?></span></a></li>
		</ul>
	</nav>
<?php endif; ?>
