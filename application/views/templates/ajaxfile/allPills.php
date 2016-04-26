<?php
$minEC=1;
foreach($allPill as $allPill){
	if($minEC==1){
									$tagSC= "label bg-success";
									$minEC++;
								}else if($minEC==2){
									$tagSC= "label bg-default ";
									$minEC++;
								}else if($minEC==3){
									$tagSC= "label bg-warning ";
									$minEC=1;
								}
	?>
	<li  onclick="addPillValue('<?php echo $allPill->call_id;?>')" class="<?php echo $tagSC;?>"><?php echo $allPill->call_pill_title;?>&nbsp;&nbsp;&nbsp;&nbsp;<span class="removePill" id="<?php echo $allPill->call_id;?>" >X</span></li>
<?php
}?>
	
<style>
.removePill {
	height: 10px !important;
  width: 28% !important;
}
</style>
