<section id="content">
    <section class="main padder">
        <div class="row">
            <div class="col-sm-12">
                <section class="panel call_remi">
                    <div class="main_header">
 	<h3 class="m-b">Call Reminder</h3>
 </div>
                        <div id="suc-msg" style="color: #009926; font-size: 18px; display: block; float: left;"></div>
                    <!-- <form data-validate="parsley"  class="form-horizontal"> -->
                        <input type="hidden" name="call_id" id="callId" value="<?php echo $callId; ?>"> 
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Date</label>
                            <div class="col-lg-12">
                                <input type="text" id="remDate"  type="text" data-date-format="yyyy-mm-dd"  class="form-control parsley-validated" value="<?php echo (!empty($reminders[0]->rem_date))?$reminders[0]->rem_date:''; ?>" data-required="true" placeholder="Enter Date" id="remDate" name="remDate" required>
                            </div>
                            <div class="clearb"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Time</label>
                            <div class="col-lg-12">
                                <input type="text" class="form-control timepicker parsley-validated" value="<?php echo (!empty($reminders[0]->rem_time))?$reminders[0]->rem_time:'';?>" data-required="true" placeholder="Enter Time" id='remTime' name="remTime" required>
                            </div>
                            <div class="clearb"></div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Email</label>
                            <div class="col-lg-12">
                                <input type="email" class="form-control parsley-validated" value="<?php echo (!empty($reminders[0]->rem_email))?$reminders[0]->rem_email:''; ?>" data-required="true" placeholder="Enter Email" id='remEmail' name="remEmail" required>
                            </div>
                            <div class="clearb"></div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-12">                      
                                <div class="checkbox">
                                    <label class="checkbox-custom">
                                        <input type="checkbox"  checked="checked" name="checkboxA">
                                        <i class="fa fa-check-square-o checked"></i>
                                        Active
                                    </label>
                                </div>
                            </div>
                            <div class="clearb"></div>
                        </div>


                        <div class="form-group">
                            <div class="col-lg-12">                      
                                <!-- <button class="btn btn-white" onClick='parent.jQuery.fn.colorbox.close();' >Cancel</button> -->
                                <button class="btn btn-success btn-sm" id="submit">Set</button>
                            </div>
                            <div class="clearb"></div>
                        </div>

                        <!-- </form>  -->
                    <div class="clearb"></div>
                </section>

            </div>

        </div>

    </section>
</section>
<script type="text/javascript">
    $(document).ready(function(){
        $("#remDate").datepicker({autoclose:true});
        $('.timepicker').timepicker({
            timeFormat: 'HH:mm:ss',
        //minTime: '11:45:00', // 11:45:00 AM,
        //maxHour: 20,
        //maxMinutes: 30,
        //startTime: new Date(0,0,0,15,0,0), // 3:00:00 PM - noon
        interval: 15 // 15 minutes
    });
    /*form submit using ajax 
    */
    $('#submit').click(function(){
     var callId = $('#callId').val();
     var remDate = $('#remDate').val();
     if(remDate == ''){
        alert('Please fill date');
        return false;
    }
    var remTime = $('#remTime').val();
    if(remTime == ''){
        alert('Please fill time');
        return false;
    }
    var remEmail = $('#remEmail').val(); 
    if(remEmail == ''){
        alert('Please fill email');
        return false;
    }

    var dataString = "call_id="+callId+"&remEmail="+remEmail+"&remTime="+remTime+"&remDate="+remDate;
   //alert(dataString);
    var ajax_value_file = '<?php echo base_url();?>call/callReminder';
    $.ajax({
        type: "POST",
        url: ajax_value_file,
        data: dataString,
        //cache: false,
        success: function(result){
            alert(result);
        }
    });

});

});
</script>
<style>
.datepicker {
  left: 1100px !important;
}
</style>
