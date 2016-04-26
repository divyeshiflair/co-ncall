<h4>Call Value : <?php echo $pillDetails[0]->call_pill_title;?></h4>
	<div class="input-group">
		<input type="text" class="form-control parsley-validated parsley-success" data-type="number"  data-required="true" id="callPillPrice" value="<?php echo $pillDetails[0]->call_pill_price;?>" placeholder="">
		<input type="hidden" id="callPillId" value="<?php echo $pillDetails[0]->call_id;?>">
		<span class="input-group-btn">
			<button type="button" onclick="submitPrice();" class="btn btn-white">SAVE</button>
		</span>
	</div>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Success</h4>
      </div>
      <div class="modal-body">
        <p>Well done! You successfully saved call rate price. </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
      </div>
    </div>

  </div>
</div>
<script type="text/javascript">
function submitPrice() {
		
		var callPillPrice=$("#callPillPrice").val();
		var callPillId=$("#callPillId").val();
		var ajax_value_file = '<?php echo base_url();?>call/savePricePill';
		$.ajax({
			type: "POST",
			url: ajax_value_file,
			data: "callPillId=" + callPillId+"&callPillPrice="+callPillPrice,
			beforeSend: function () {
			$("#loading_div").show();
			},
			complete: function () {
				$("#loading_div").hide();
			},
			success: function (msg) {
				if (msg != "") {
					//$("#saveMsg").html(msg);
					$("#myModal").modal('show');

				}
			}
		});
	}
</script>
		
