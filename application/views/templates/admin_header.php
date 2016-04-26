<?php $userRole = $this->session->userdata('user_role'); ?>
<html>
        <head>
                <title><?php if(isset($title)){ echo $title; } else{ echo "CallOffice"; } ?></title>
				<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">	
				<link rel="stylesheet" href="<?php echo base_url();?>theme/css/bootstrap.css">
				<link rel="icon" type="image/png" href="<?php echo base_url();?>theme/images/favicon.png">
				<link rel="stylesheet" href="<?php echo base_url();?>theme/css/font-awesome.min.css">
				<link rel="stylesheet" href="<?php echo base_url();?>theme/css/font.css">
				<link rel="stylesheet" href="<?php echo base_url();?>theme/css/style.css">
				<link rel="stylesheet" href="<?php echo base_url();?>theme/css/plugin.css">
				<link rel="stylesheet" href="<?php echo base_url();?>theme/js/select2/select2.css">
				 <script src="<?php echo base_url();?>theme/js/jquery.min.js"></script>
				<!-- Bootstrap -->
				<script src="<?php echo base_url();?>theme/js/bootstrap.js"></script>
				<!-- app -->
				<script src="<?php echo base_url();?>theme/js/app.js"></script>
				<script src="<?php echo base_url();?>theme/js/app.plugin.js"></script>
				<script src="<?php echo base_url();?>theme/js/app.data.js"></script>


				<!-- Sparkline Chart -->
				<script src="<?php echo base_url();?>theme/js/charts/sparkline/jquery.sparkline.min.js"></script>  
				<!-- Easy Pie Chart -->
				<script src="<?php echo base_url();?>theme/js/charts/easypiechart/jquery.easy-pie-chart.js"></script>  
				<!-- datatables -->
				  <script src="<?php echo base_url();?>theme/js/datatables/jquery.dataTables.min.js"></script>

				<!-- parsley --> <!-- This is for jquery validations @Dr-->
				  <script src="<?php echo base_url();?>theme/js/parsley/parsley.min.js"></script>
				<!-- parsley --> <!-- This is for jquery validations @Dr-->


				  <!-- fuelux -->
				  <script src="<?php echo base_url();?>theme/js/fuelux/fuelux.js"></script>
				  <!-- datepicker -->
				  <script src="<?php echo base_url();?>theme/js/datepicker/bootstrap-datepicker.js"></script>
				  <!-- slider -->
				  <script src="<?php echo base_url();?>theme/js/slider/bootstrap-slider.js"></script>
				  <!-- file input -->  
				  <script src="<?php echo base_url();?>theme/js/file-input/bootstrap.file-input.js"></script>
				  <!-- combodate -->
				  <script src="<?php echo base_url();?>theme/js/combodate/moment.min.js"></script>
				  <script src="<?php echo base_url();?>theme/js/combodate/combodate.js"></script>
								  
				<!-- time picker -->
				<script src="<?php echo base_url();?>theme/js/timepicker/jquery.timepicker.js"></script>

				<!-- select2 -->
				<script src="<?php echo base_url();?>theme/js/select2/select2.min.js"></script>

				<script src="<?php echo base_url();?>theme/colorbox/jquery.colorbox.js">


				</script>

				<script src="<?php echo base_url();?>theme/js/jquery.validate.js"></script>

				<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
				<script src="<?php echo base_url();?>theme/js/charts/flot/jquery.flot.min.js"></script>
				<script src="<?php echo base_url();?>theme/js/charts/flot/jquery.flot.tooltip.min.js"></script>
				<link rel="stylesheet" href="<?php echo base_url();?>theme/colorbox/colorbox.css" />
				<!-- time picker -->
				<link rel="stylesheet" href="<?php echo base_url();?>theme/css/timepicker/jquery.timepicker.css" />			  
				<?php
				   $mid = base_url();
				?>
				<script type="text/javascript">
					var middle_folder = "<?php echo $mid ?>application/views/templates/ajaxfile/";
				</script>
				</head>
				<body>

				<header id="header" class="navbar">
					<div id="loading_div" class="overly" style="display:none;">
						<table border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td valign="middle"><img src="<?php echo base_url();?>theme/images/ajax-loader.gif"></td>
							</tr>
						</table>
					</div>
					<style>
					#loading_div.overly{ position:fixed; background:rgba(255,255,255, 0.5); left: 0; right: 0; top: 0; bottom:0; }
					#loading_div.overly table, #loading_div.overly table tr, #loading_div.overly table tr td{ height:100%; width:100%;  }
					#loading_div.overly table tr td{ vertical-align:middle; text-align:center;  }
					</style>
					<ul class="nav navbar-nav navbar-avatar pull-right">
					  <li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">            
						  <span class="hidden-xs-only"><?php echo $this->session->userdata('user_name'); ?></span>
						  <!--<span class="thumb-small avatar inline"><img src="<?php echo base_url();?>theme/images/avatar.jpg" alt="Mika Sokeil" class="img-circle"></span>-->
						  <b class="caret hidden-xs-only"></b>
						</a>
						<ul class="dropdown-menu pull-right">
							<?php
							$confdata=$this->langsModel->getDashboardData($this->session->userdata('cur_lang_code'));
								$lan_payment_menu_text= $confdata[0]->lan_payment_menu_text;
								$lan_plan_table_menu_text= $confdata[0]->lan_plan_table_menu_text;
								$lan_change_pass_menu_text= $confdata[0]->lan_change_pass_menu_text;
								$lan_logout_menu_text= $confdata[0]->lan_logout_menu_text;?>
								
							<?php if($userRole == 2): // Client 
						
								
							?>
								<li><a href="<?php echo base_url();?>payment"><?php echo $lan_payment_menu_text ;?></a></li>
								<li><a href="<?php echo base_url();?>plan/planView"><?php echo $lan_plan_table_menu_text ;?></a></li>
								<li><a href="<?php echo base_url();?>change_password"><?php echo $lan_change_pass_menu_text ;?></a></li>
								<!--<li><a href="<?php echo base_url();?>employee">Employee</a></li>-->
							<?php endif; ?>
						  <!--<li><a href="#">Settings</a></li>
						  <li><a href="#">Profile</a></li>
						  <li><a href="#"><span class="badge bg-danger pull-right">3</span>Notifications</a></li>
						  <li class="divider"></li>
						  <li><a href="docs.html">Help</a></li>-->
						  <li><a href="<?php echo base_url();?>dashboard/logout"><?php echo $lan_logout_menu_text ;?> </a></li>
						</ul>
					  </li>
					</ul>

					
					<a class="navbar-brand" href="<?php echo base_url();?>dashboard"><img src="<?php echo base_url();?>theme/images/logo.png" title="Co" alt="Co"></a>
					<button type="button" class="btn btn-link pull-left nav-toggle visible-xs" data-toggle="class:slide-nav slide-nav-left" data-target="body">
					  <i class="fa fa-bars fa-lg text-default"></i>
					</button>
</header>
		
