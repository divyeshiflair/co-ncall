<?php
    error_reporting(0);
    // get language title from database
    $confdata = $this->langsModel->getCallsData($this->session->userdata('cur_lang_code'));
    //echo "<pre>";print_r($confdata);die;

    $lan_button_text=$confdata[0]->lan_button_text; 
    $lan_incoming=$confdata[0]->lan_incoming;
    $lan_outgoing=$confdata[0]->lan_outgoing;
    $lan_reminder=$confdata[0]->lan_reminder;
    $lan_todo=$confdata[0]->lan_todo;
    $lan_done=$confdata[0]->lan_done;
    $lan_important=$confdata[0]->lan_important;
    $lan_spam=$confdata[0]->lan_spam;
    $lan_trash=$confdata[0]->lan_trash;
    $lan_right_title=$confdata[0]->lan_right_title;
    $lan_call_for=$confdata[0]->lan_call_for;
    $lan_first=$confdata[0]->lan_first;
    $lan_last=$confdata[0]->lan_last;
    
    /*$lan_page_title_text=$confdata[0]->lan_page_title_text;


    $lan_company=$confdata[0]->lan_addition_info_text;
    $lan_email2_text=$confdata[0]->lan_email2_text;
    $lan_sms_text=$confdata[0]->lan_sms_text;
    $lan_button_label=$confdata[0]->lan_button_label;
    $lan_officenum_place=$confdata[0]->lan_officenum_place;
    $lan_greeting_place=$confdata[0]->lan_greeting_place;
    $lan_kind_business_place=$confdata[0]->lan_kind_business_place;
    $lan_business_hours_place=$confdata[0]->lan_business_hours_place;
    $lan_global_from_place=$confdata[0]->lan_global_from_place;
    $lan_global_to_place=$confdata[0]->lan_global_to_place;
    $lan_phone_place=$confdata[0]->lan_phone_place;
    $lan_fax_place=$confdata[0]->lan_fax_place;
    $lan_email_place=$confdata[0]->lan_email_place;
    $lan_url_place=$confdata[0]->lan_url_place;
    $lan_away_message_place=$confdata[0]->lan_away_message_place;
    $lan_Call_back_message_place=$confdata[0]->lan_Call_back_message_place;
    $lan_way_to_office_place=$confdata[0]->lan_way_to_office_place;
    $lan_addition_info_place=$confdata[0]->lan_addition_info_place;
    $lan_email2_place=$confdata[0]->lan_email2_place;
    $lan_sms_place=$confdata[0]->lan_sms_place;
    
    
    
    $confdata=$this->langsModel->getDaysData($this->session->userdata('cur_lang_code'));
    $lan_days_title =$confdata[0]->lan_days_title; 
    $lan_other_title =$confdata[0]->lan_other_title; 
    $lan_just_appointments =$confdata[0]->lan_just_appointments;*/

    $CI = & get_instance();
    $dataIcon = array(
        $lan_incoming => '<i class="fa fa-fw fa-inbox"></i>',
        $lan_outgoing => '<i class="fa fa-fw fa-envelope-o"></i>',
        $lan_reminder => '<i class="fa fa-fw fa-star-o"></i>',
        $lan_todo => '<i class="fa fa-fw fa-bookmark-o"></i>',
        $lan_done => '<i class="fa fa-fw fa-pencil"></i>',
        $lan_important => '<i class="fa fa-fw fa-pencil"></i>',
        $lan_spam => '<i class="fa fa-fw fa-user"></i>',
        $lan_trash => '<i class="fa fa-fw fa-trash-o"></i>',
    );
    //echo "<pre>";print_r($dataIcon);die;
    $dataList = array(
        'incoming' => $lan_incoming,
        'outgoing' => $lan_outgoing,
        'reminder' => $lan_reminder,
        'todo' => $lan_todo,
        'done' => $lan_done,
        'important' => $lan_important,
        'spam' => $lan_spam,
        'trash' => $lan_trash
    );
    //echo "<pre>";print_r($dataList);die;
?>
<section id="content" class="content-sidebar bg-white">
    <aside class="sidebar bg-lighter sidebar-small">
        <div class="text-center clearfix bg-white">
            <!-- <button class="btn btn-sm btn-white m-t m-b" data-toggle="modal" data-target="#myModal">Order Outgoing Call</button> -->
            <a href="<?php echo base_url();?>call/loadPopupouting"  class=" btn-sm btn-white m-b iframe pull-right btn">
                   <?php echo $lan_button_text;?></a>
            </div>
        <input type="hidden" value="" id="currentSec" name="currentSec">	
        <div class="list-group list-normal m-b-none" id="listTitle">
		
            <?php
            foreach ($dataList AS $key => $list) {
                ?>  
                <a href="javascript:void(0);" class="list-group-item" id="list_<?php echo $list ?>" onclick="loadData('<?php echo $key ?>');">
                <?php echo $dataIcon[$list]; ?>
                <span class="badge m-r">
					<?php
						$var = $CI->countMessage($key);
						echo $var[0]->COUNT;
					 ?>
                </span> <?php echo ucfirst($list); ?></a>
            <?php
            }
            ?>

        </div>
    </aside>
    <aside class="sidebar sidebar-large sidebar-large-in">
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
    <aside class="sidebar sidebar-large sidebar-large-main">
        <section class="main">
            <div id="loadUserDetails">
                <div class="topCenter">No data found</div>
            </div>
        </section>
    </aside>
    <!-- /.main -->
    <!-- .sidebar -->

    <aside class="sidebar bg text-small text-small-in">
 <div class="reminderSection" id="reminderSection"></div>
   
    </aside>
    <!-- /.sidebar -->
</section>

<!-- For colorBox-->


<!-- For colorBox-->
<script type="text/javascript" language="javascript">
    $(document).ready(function () {
        $(".iframe").colorbox({iframe:true, fastIframe:false, width:"50%", height:"600px", top:"10px", transition:"fade", scrolling   : true });
        
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
