<?php
foreach($commentUSerDetails as $commentUSerDetails){
	 $fulllNAme=$commentUSerDetails->user_firstname ." " .$commentUSerDetails->user_lastname ;
	?>
<article id="comment-id-1" class="comment-item media arrow arrow-left">
  <a class="pull-left thumb-small avatar"><img src="<?php echo base_url();?>theme/images/avatar.jpg" class="img-circle"></a>
  <section class="media-body panel">
	<header class="panel-heading clearfix">
	  <a href="javascript:void(0);"><?php echo $fulllNAme;?></a>
	  <span class="text-muted m-l-small pull-right"><i class="fa fa-clock-o"></i> <?php echo timeAgo($commentUSerDetails->com_created);?></span>
	</header>
	<div class="panel-body">
	  <div><?php echo $commentUSerDetails->com_comment;?></div>
	  
	</div>
  </section>
</article>
<?php }?>


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
