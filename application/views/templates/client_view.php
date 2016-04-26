<?php
// Get client Id from URL
$arr = explode("/", $_SERVER['REQUEST_URI']);
$clientId = $arr[count($arr)-1];
?>
<!-- .nav-justified -->
<section id="content">
    <section class="main padder">
	<div class="clearfix">
        <h4><i class="fa fa-edit"></i>Manage Client</h4>
    </div>
	<div class="row">
        <div class="col-lg-12">
		
          <section class="panel">
            <header class="panel-heading">
              <ul class="nav nav-tabs nav-justified">
                <li class="active"><a href="#configurations" onclick="viewConfigurations();" data-toggle="tab">Configurations</a></li>
                <li><a href="#company" onclick="viewCompany();" data-toggle="tab">Company</a></li>
                <li><a href="#payment" onclick="viewPayment();" data-toggle="tab">Payment</a></li>
                <li><a href="#employee" onclick="viewEmployee();" data-toggle="tab">Employee</a></li>
              </ul>
            </header>
            <div class="panel-body">
              <div class="tab-content">
                <div class="tab-pane active" id="configurations"></div>
                <div class="tab-pane" id="company">Company</div>
                <div class="tab-pane" id="payment">Payment</div>
                <div class="tab-pane" id="employee">Employee</div>
              </div>
            </div>
          </section>
		  
		</div>
	</div>
	</section>
</section>
<!-- / .nav-justified -->

<script type="text/javascript" >
	viewConfigurations();
	
	function viewConfigurations(){	
		jQuery('#configurations').html('<div style="text-align:center;">Please wait...</div>');	
		jQuery('#configurations').load('<?php echo base_url();?>configurations/tabindex/<?php echo $clientId;?>');
	}
	function viewCompany(){	
		jQuery('#configurations').html('<div style="text-align:center;">Please wait...</div>');	
		jQuery('#company').load('<?php echo base_url();?>company/tabindex/<?php echo $clientId;?>');
	}
	function viewPayment(){	
		jQuery('#configurations').html('<div style="text-align:center;">Please wait...</div>');	
		jQuery('#payment').load('<?php echo base_url();?>payment/tabindex/<?php echo $clientId;?>');
	}
	function viewEmployee(){	
		jQuery('#configurations').html('<div style="text-align:center;">Please wait...</div>');	
		jQuery('#employee').load('<?php echo base_url();?>employee/tabindex/<?php echo $clientId;?>');
	}
	
</script>
