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
<section id="content" class="content-sidebar bg-white">
    <aside class="sidebar bg-lighter sidebar-small">
        <div class="text-center clearfix bg-white"><button class="btn btn-sm btn-white m-t m-b">Order Outgoing Call</button></div>
        <input type="hidden" value="" id="currentSec" name="currentSec">	
        <div class="list-group list-normal m-b-none" id="listTitle">
		
            <?php
            foreach ($dataList AS $list) {
                ?>
                <a href="javascript:void(0);" class="list-group-item" id="list_<?php echo $list ?>" onclick="loadData('<?php echo $list ?>');"><?php echo $dataIcon[$list] ?>
                <span class="badge m-r">
					<?php
						$var = $CI->countMessage($list);
						echo $var[0]->COUNT;
					 ?>
                 </span> <?php echo ucfirst($list); ?></a>
            <?php
            }
            ?>

        </div>
    </aside>
    <aside class="sidebar sidebar-large">
        <div class="padder header-bar bg clearfix">
            <div class="btn-group m-t pull-right">
                <button type="button" class="btn btn-sm btn-white"><i class="fa fa-chevron-left"></i></button>
                <button type="button" class="btn btn-sm btn-white"><i class="fa fa-chevron-right"></i></button>
            </div>
            <div class="btn-group m-t m-b">
                <button class="btn btn-white btn-sm dropdown-toggle" data-toggle="dropdown">Filter <i class="fa fa-caret-down"></i></button>
                <ul class="dropdown-menu text-left text-small">
                    <li><a href="javascript:void(0);" onclick="filterBy('read');" >Read</a></li>
                    <li><a href="javascript:void(0);" onclick="filterBy('unread');"  >Unread</a></li>
                    <li><a href="javascript:void(0);" onclick="filterBy('starred');" >Starred</a></li>
                    <li><a href="javascript:void(0);" onclick="filterBy('unstarred');" >Unstarred</a></li>
                </ul>
            </div>
            <button class="btn btn-sm btn-white" data-toggle="tooltip" onclick="loadDataRefresh();" data-title="Refresh"><i class="fa fa-refresh"></i></button>
        </div>
        <div class="list-group list-normal m-t-n-xmini scroll-y scrollbar" style="max-height:400px">
            <div id="loadUser">
                Please wait...
            </div>
            <!-- Load user -->
        </div>
    </aside>
    <!-- /.sidebar -->
    <!-- .main -->
    <section class="main">
        <div id="loadUserDetails">
            <div class="topCenter">No data found</div>
        </div>
    </section>
    <!-- /.main -->
    <!-- .sidebar -->

    <aside class="sidebar bg text-small">
 <div class="reminderSection" id="reminderSection"></div>
   
    </aside>
    <!-- /.sidebar -->
</section>

<!-- For colorBox-->


<!-- For colorBox-->
<script type="text/javascript" language="javascript">
    $(document).ready(function () {
        $('#listTitle a:first').addClass('active');
        $('.list-group-item').click(function () {
            $('#listTitle a').removeClass('active');
            $(this).addClass('active');
        });
    })
    loadData('incoming');
    function loadData(type) {
		$(".list-group-item ").removeClass("active");
		$("#list_"+type).addClass("active");
		$("#currentSec").val(type);
        $("#reminderSection").html('');
		 $("#loadUserDetails").html('<div class="topCenter">No data found</div>');
        var ajax_value_file = '<?php echo base_url(); ?>call/loadUser';
        
        $.ajax({
            type: "POST",
            url: ajax_value_file,
            data: "action_type=findData" + "&type=" + type,
            beforeSend: function () {
                $("#loading_div").show();
            },
            complete: function () {
                $("#loading_div").hide();
            },
            success: function (msg) {
                if (msg != "") {
                    $("#loadUser").html(msg);
                   
                    //loadDatainDetails('14');
                }
            }
        });
    }
    function loadDataRefresh() {
		var curretsec= $("#currentSec").val();
		 $("#loadUserDetails").html('<div class="topCenter">No data found</div>');
        var ajax_value_file = '<?php echo base_url(); ?>call/loadUser';
        
        $.ajax({
            type: "POST",
            url: ajax_value_file,
            data: "action_type=findData" + "&type=" + curretsec,
            beforeSend: function () {
                $("#loading_div").show();
            },
            complete: function () {
                $("#loading_div").hide();
            },
            success: function (msg) {
                if (msg != "") {
                    $("#loadUser").html(msg);
                     loadOptionRefresh();
                    //loadDatainDetails('14');
                }
            }
        });
    }
    
     function loadOptionRefresh() {
		var curretsec= $("#currentSec").val();
        var ajax_value_file = '<?php echo base_url(); ?>call/loadOption';
        $.ajax({
            type: "POST",
            url: ajax_value_file,
            data: "action_type=findData" + "&type=" + curretsec,
            beforeSend: function () {
                $("#loading_div").show();
            },
            complete: function () {
                $("#loading_div").hide();
            },
            success: function (msg) {
                if (msg != "") {
                    $("#listTitle").html(msg);
                     
                    //loadDatainDetails('14');
                }
            }
        });
    }
    
      function filterBy(type) {
  		var curretsec= $("#currentSec").val();
		var ajax_value_file = '<?php echo base_url(); ?>call/loadUserByFilter';
        $.ajax({
            type: "POST",
            url: ajax_value_file,
            data: "action_type=findData" + "&type=" + type+"&currentOption="+curretsec,
            beforeSend: function () {
                $("#loading_div").show();
            },
            complete: function () {
                $("#loading_div").hide();
            },
            success: function (msg) {
                if (msg != "") {
					$("#loadUser").html(msg);
                }
            }
        });
    }
     function markAs(type,id) {
  		var ajax_value_file = '<?php echo base_url(); ?>call/markAs';
        $.ajax({
            type: "POST",
            url: ajax_value_file,
            data: "action_type=findData" + "&type=" + type+"&callid="+id,
            beforeSend: function () {
                $("#loading_div").show();
            },
            complete: function () {
                $("#loading_div").hide();
            },
            success: function (msg) {
                if (msg != "") {
					$("#currentSec").val(type);
					$("#loadUser").html(msg);
					$("#loadUserDetails").html('<div class="topCenter">No data found</div>');
					
					loadOptionRefresh();
                }
            }
        });
    }
    
    
	function backtoincoming(type) {
  		var ajax_value_file = '<?php echo base_url(); ?>call/markAs';
        $.ajax({
            type: "POST",
            url: ajax_value_file,
            data: "action_type=findData" + "&type=" + type+"&callid="+id,
            beforeSend: function () {
                $("#loading_div").show();
            },
            complete: function () {
                $("#loading_div").hide();
            },
            success: function (msg) {
                if (msg != "") {
					$("#currentSec").val(type);
					$("#loadUser").html(msg);
					$("#loadUserDetails").html('<div class="topCenter">No data found</div>');
					
					loadOptionRefresh();
                }
            }
        });
    }
	

</script>

