<?php
$CI = & get_instance();
$dataIcon = array(
    'incoming' => '<i class="fa fa-fw fa-inbox"></i>',
    'outgoing' => '<i class="fa fa-fw fa-envelope-o"></i>',
    'reminder' => '<i class="fa fa-fw fa-star-o"></i>',
    'todo' => '<i class="fa fa-fw fa-bookmark-o"></i>',
    'done' => '<i class="fa fa-fw fa-pencil"></i>',
    'important' => '<i class="fa fa-fw fa-pencil"></i>',
    'spam' => '<i class="fa fa-fw fa-user"></i>',
    'trash' => '<i class="fa fa-fw fa-trash-o"></i>',
);
$dataList = array(
    'incoming' => 'incoming',
    'outgoing' => 'outgoing',
    'reminder' => 'reminder',
    'todo' => 'todo',
    'done' => 'done',
    'important' => 'important',
    'spam' => 'spam',
    'trash' => 'trash'
);
?>

 <?php
	$curType=$_POST['type'];
	foreach ($dataList AS $list) {
		?>
		<a href="javascript:void(0);" id="list_<?php echo $list ?>" class="list-group-item <?php if($curType==$list){ echo "active";}?>" onclick="loadData('<?php echo $list ?>');"><?php echo $dataIcon[$list] ?>
		<span class="badge m-r">
			<?php
				$var = $CI->countMessage($list);
				echo $var[0]->COUNT;
			 ?>
		 </span> <?php echo ucfirst($list); ?></a>
	<?php
	}
	?>
