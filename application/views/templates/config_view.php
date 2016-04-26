<?php
// Get User Id from URL
$arr = explode("/", $_SERVER['REQUEST_URI']);
$userId = $arr[count($arr)-1];
?>
<!-- .nav-justified -->
<section id="content">
	<div class="tab-pane active" id="configurations"></div>
    
</section>
<!-- / .nav-justified -->

<script type="text/javascript" >
	viewConfigurations();
	
	function viewConfigurations(){
		jQuery('#configurations').html('<div style="text-align:center;">Please wait...</div>');	
		jQuery('#configurations').load('<?php echo base_url();?>configurations/tabindex/<?php echo $userId;?>');
	}
	function viewCompany(){	
		jQuery('#configurations').html('<div style="text-align:center;">Please wait...</div>');	
		jQuery('#company').load('<?php echo base_url();?>company/tabindex/<?php echo $userId;?>');
	}
	function viewPayment(){	
		jQuery('#configurations').html('<div style="text-align:center;">Please wait...</div>');	
		jQuery('#payment').load('<?php echo base_url();?>payment/tabindex/<?php echo $userId;?>');
	}
	function viewEmployee(){	
		jQuery('#configurations').html('<div style="text-align:center;">Please wait...</div>');	
		jQuery('#employee').load('<?php echo base_url();?>employee/tabindex/<?php echo $userId;?>');
	}
	
</script>
