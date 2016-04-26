<?php 
$confdata=$this->langsModel->getDaysData($this->session->userdata('cur_lang_code'));
$lan_days_title =$confdata[0]->lan_days_title; 
$lan_sunday =  $confdata[0]->lan_sunday; 
$lan_monday =$confdata[0]->lan_monday; 
$lan_tuesday =   $confdata[0]->lan_tuesday;
$lan_wednesday =$confdata[0]->lan_wednesday; 
$lan_thursday =$confdata[0]->lan_thursday; 
$lan_friday =$confdata[0]->lan_friday; 
$lan_saturday =$confdata[0]->lan_saturday; 
$lan_other_title =$confdata[0]->lan_other_title; 
$lan_just_appointments =$confdata[0]->lan_just_appointments; 


$weekdays = array($lan_monday,$lan_tuesday,$lan_wednesday,$lan_thursday,$lan_friday,$lan_saturday,$lan_sunday); 
$counter=0;

foreach($weekdays as $weekdays){
	
?>
<div class="row">
	<div class="col-lg-6 ol-lg-04-new">
		<div class="checkbox">
			<label class="checkbox-custom">
				<input type="checkbox"  class="checkboxDesing" name="checkbox_days[<?php echo $weekdays;?>]" <?php if(isset($hourData[$counter]->biz_day)){ 
					if($hourData[$counter]->biz_day!='') { ?>checked="checked" <?php }
					} ?>>
				<input type="hidden" name="biz_main_id[<?php echo $weekdays;?>]" value="<?php if(isset($hourData[$counter]->biz_id)){ echo $hourData[$counter]->biz_id; } ?>">
				<i class="fa fa-check-square-o ebChackbox"></i>
				<?php echo $weekdays;?>
			</label>
		</div>
	</div>
	<div class="col-lg-3">     
		<select  class="xman select2-option " name="combo1[<?php echo $weekdays;?>]">
			<?php 
			$start = '12:00AM';
			$end = '11:59PM';
			$interval = '+15 minutes';
			$start_str = strtotime($start);
			$end_str = strtotime($end);
			$now_str = $start_str;
			while($now_str <= $end_str){
				?>
				<option value="<?php echo date('H:i A', $now_str);?>" <?php if(isset($hourData[$counter]->biz_day)){ 
					if($hourData[$counter]->biz_day_from==date('H:i A', $now_str)){ echo "selected=selected"; } }?>><?php echo date('H:i A', $now_str);?> </option>
								<?php $now_str = strtotime($interval, $now_str); 
			}
			?>
		</select>
	</div>
	<div class="col-lg-3">     
		<select  class="select2-option xman"  name="combo2[<?php echo $weekdays;?>]">
			<?php 
			$start = '12:00AM';
			$end = '11:59PM';
			$interval = '+15 minutes';
			$start_str = strtotime($start);
			$end_str = strtotime($end);
			$now_str = $start_str;

			while($now_str <= $end_str){
				?>
				<option value="<?php echo date('H:i A', $now_str);?>" <?php 
				if(isset($hourData[$counter]->biz_day)){ 
					 if($hourData[$counter]->biz_day_to==date('H:i A', $now_str)){ echo "selected=selected"; } } ?>><?php echo date('H:i A', $now_str);?> </option>
								<?php $now_str = strtotime($interval, $now_str); 
			}

			?>
		</select>
	</div>
</div>
<?php 
$counter++;
}
?>

