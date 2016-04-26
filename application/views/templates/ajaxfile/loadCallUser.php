<input type="hidden" name="parent_name" id="parent_name" value="<?php if(isset($type)){echo $type;}?>">
<?php
if(!empty($callUSer)){
foreach($callUSer as $callUSer ){
$fd= $callUSer->call_calldate ." ".$callUSer->call_calltime;
?>
<a href="javascript:void(0);" onclick="loadDatainDetails('<?php echo $callUSer->call_id;?>');" class="list-group-item">
	<small class="pull-right text-muted"><?php echo timeAgo($fd);?></small>
	<?php
	$fullName=$callUSer->user_firstname . "  " .$callUSer->user_lastname;
	?> <div id="namemail_<?php echo $callUSer->call_id;?>"  class="<?php if($callUSer->call_is_read=='no'){ echo "boldfontMail"; }?>"> <?php echo $fullName;?></div>
	<small>
		<div  id="msgmail_<?php echo $callUSer->call_id;?>" class="<?php if($callUSer->call_is_read=='no'){ echo "boldfontMail"; }?>">
		<?php echo substr($callUSer->call_message,0,40);?></div></small>
</a>
<?php
}

}else{
	?><div class="topCenter">No data found</div><?php
}
?>
 <script type="text/javascript" language="javascript">

function loadDatainDetails(id) {
	$("#loadUserDetails").html('<div class="topCenter">Please wait...</div>');
    $("#reminderSection").html('');
	$("#namemail_"+id).removeClass('boldfontMail');
	$("#msgmail_"+id).removeClass('boldfontMail');
    var parent_name = $("#parent_name").val();
	var ajax_value_file = '<?php echo base_url();?>call/loadUserDetails';
	$.ajax({
		type: "POST",
		url: ajax_value_file,
		data: "action_type=findData" + "&parent_name=" + parent_name + "&id=" + id,
		beforeSend: function () {
			$("#loading_div").show();
		},
		complete: function () {
			$("#loading_div").hide();
		},
		success: function (msg) {
			if (msg != "") {
				$("#loadUserDetails").html(msg);
				  
			}
		}
		});
	}
	
</script>
<?php
//echo $time_elapsed = timeAgo("12:11"); //The argument $time_ago is in timestamp (Y-m-d H:i:s)format.

//Function definition

function timeAgo($time_ago)
{
	if(date('Y-m-d H:i:s')<$time_ago)
	{
		echo "-";
	}else{
	
    $time_ago = strtotime($time_ago);
    $cur_time   = time();
    $time_elapsed   = $cur_time - $time_ago;
    $seconds    = $time_elapsed ;
    $minutes    = round($time_elapsed / 60 );
    $hours      = round($time_elapsed / 3600);
    $days       = round($time_elapsed / 86400 );
    $weeks      = round($time_elapsed / 604800);
    $months     = round($time_elapsed / 2600640 );
    $years      = round($time_elapsed / 31207680 );
    // Seconds
    if($seconds <= 60){
        return "just now";
    }
    //Minutes
    else if($minutes <=60){
        if($minutes==1){
            return "one minute ago";
        }
        else{
            return "$minutes minutes ago";
        }
    }
    //Hours
    else if($hours <=24){
        if($hours==1){
            return "an hour ago";
        }else{
            return "$hours hrs ago";
        }
    }
    //Days
    else if($days <= 7){
        if($days==1){
            return "yesterday";
        }else{
            return "$days days ago";
        }
    }
    //Weeks
    else if($weeks <= 4.3){
        if($weeks==1){
            return "a week ago";
        }else{
            return "$weeks weeks ago";
        }
    }
    //Months
    else if($months <=12){
        if($months==1){
            return "a month ago";
        }else{
            return "$months months ago";
        }
    }
    //Years
    else{
        if($years==1){
            return "one year ago";
        }else{
            return "$years years ago";
        }
    }
}
}
?>
