<?php
$popupHeader = "Outgoing Call Order";
/* echo '<pre>';
  print_r($callUSerDetails);
  echo '</pre>'; */
?>
<script src="<?php echo base_url();?>theme/js/jquery.validate.js"></script>
<style type="text/css">
.error{
    border:1px solid red !important;
}
</style>
<section id="contenta">
    <section class="main padder">
        <div class="clearfix">
            <h4><i class="fa fa-edit"></i><?php echo $popupHeader; ?></h4>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <div class="panel-body">
                        <div id="suc-msg" style="color: #009926; font-size: 18px; display: block; float: left;"></div>
                       <form id="form1" class="form-horizontal" method="post" data-validate="parsley">      
                <input type="hidden" value="16" name="call_id">
                    <div class="form-group">
                        <label class="col-lg-3 control-label">First Name</label>
                        <div class="col-lg-8">
                            <input type="text" name="first_name" id="first_name" placeholder="First Name" value="" class="form-control parsley-validated">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Last Name</label>
                        <div class="col-lg-8">
                            <input type="text" name="last_name" id="last_name" placeholder="Last Name"  value="" class="form-control parsley-validated">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Company</label>
                        <div class="col-lg-8">
                            <input type="text" name="company" id="company" placeholder="Company"  value="" class="form-control parsley-validated">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Phone 1</label>
                        <div class="col-lg-8">
                            <input type="text" name="phone1" id="phone1" placeholder="Phone 1"  value="" class="form-control parsley-validated">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Phone 2</label>
                        <div class="col-lg-8">
                            <input type="text" name="phone2" id="phone2" placeholder="Phone 2"  value="" class="form-control parsley-validated">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Email</label>
                        <div class="col-lg-8">
                            <input type="text" name="email" id="email" placeholder="Email" value="" class="form-control parsley-validated">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">Notes</label>
                        <div class="col-lg-8">
                            <textarea placeholder="Profile" rows="5" class="form-control parsley-validated" data-trigger="keyup" id="message"  name="message"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-9 col-lg-offset-3">                      
                            <div class="checkbox">
                                <label class="checkbox-custom">
                                    <input type="checkbox" name="checkboxA">
                                    <i class="fa fa-check-square-o "></i>
                                    Item one checked
                                </label>
                            </div>
                        </div>
                    </div>


                   

            </div>

      </div>
      <div class="modal-footer">
            <button onclick="parent.jQuery.fn.colorbox.close();" class="btn btn-white">Cancel</button>
            <button id="formsave" type="submit" class="btn btn-primary" >Save changes</button>

      </div>
                </form>
                    </div>
                </section>

            </div>

        </div>

    </section>
</section>


<script type="text/javascript" language="javascript">
    $(document).ready(function () {
   //  $(function(){
    $("#form1").validate({
         submitHandler: function(form) {
        succ_frmforgot();
      },
        rules : {
          last_name :"required",
          first_name :"required",
            company :"required",
            phone1 :{
                    required:true,
                    number:true
            },
            phone2 :{
                    required:true,
                    number:true
            },
            email:{
                    required:true,
                    email:true
                 },
            message:
                {
                    required:true,
                    minlength: 20,
                    maxlength:200
                }

         
        
        },
             errorPlacement: function(error, element){
  return false;
  }
     /* errorPlacement: function(error, element){
            error.insertBefore(element);         
      }*/
    });
    function succ_frmforgot()
{
     //alert("result");
      var ajax_value_file = '<?php echo base_url(); ?>call/calloutgoing';

        var call_first=$("#first_name").val();
        var call_last=$("#last_name").val();
        var call_company=$("#company").val();
        var call_phone1=$("#phone1").val();
        var call_phone2=$("#phone2").val();
        var call_email=$("#email").val();
        var call_message=$("#message").val();
        
            parent.jQuery.fn.colorbox.close();
                 $.ajax({
                    type: "POST",
                    url: ajax_value_file,
                    data: "call_first="+call_first + "&call_last=" + call_last+ "&call_company=" + call_company+ "&call_phone1=" + call_phone1+ "&call_phone2=" + call_phone2+ "&call_email=" + call_email+ "&call_message=" + call_message,

                  //  data: {call_first:call_first, call_last:call_last, call_company:call_company, call_phone1:call_phone1, call_phone2:call_phone2, call_email:call_email, call_message:call_message },
                    beforeSend: function () {
                        $("#loading_div").show();
                    },
                    complete: function () {
                        $("#loading_div").hide();
                    },
                    success: function (msg) {
                       // if (msg != "") {
                            parent.location.reload();

                           // $("#loadUser").html(msg);
                           
                            //loadDatainDetails('14');
                       // }
                    }
                });

}
     /*   $("#form1").submit(function(event){
            event.preventDefault();
            alert("fghdfg");
    var userinfo = $("#form1").serialize();

            $.ajax({
                    url:'<?php echo base_url(); ?>call/calloutgoing',
                    type:'POST',
                    data: userinfo,
                  //  data:$(this).serialize(),
                    success:function(result){
                        alert(result);
                        //$("#response").text(result);

                    }

            });
        });*/
  //  });
    });
       /* function callajax(){
          //  alert("Asdas");
        var ajax_value_file = '<?php echo base_url(); ?>call/calloutgoing';

        var call_first=$("#last_name").val();
        var call_last=$("#call_last").val();
        var call_company=$("#call_company").val();
        var call_phone1=$("#call_phone1").val();
        var call_phone2=$("#call_phone2").val();
        var call_email=$("#call_email").val();
        var call_message=$("#call_message").val();
        
            parent.jQuery.fn.colorbox.close();
                 $.ajax({
                    type: "POST",
                    url: ajax_value_file,
                    data: "call_first="+call_first + "&call_last=" + call_last+ "&call_company=" + call_company+ "&call_phone1=" + call_phone1+ "&call_phone2=" + call_phone2+ "&call_email=" + call_email+ "&call_message=" + call_message,

                  //  data: {call_first:call_first, call_last:call_last, call_company:call_company, call_phone1:call_phone1, call_phone2:call_phone2, call_email:call_email, call_message:call_message },
                    beforeSend: function () {
                        $("#loading_div").show();
                    },
                    complete: function () {
                        $("#loading_div").hide();
                    },
                    success: function (msg) {
                       // if (msg != "") {
                            parent.location.reload();

                           // $("#loadUser").html(msg);
                           
                            //loadDatainDetails('14');
                       // }
                    }
                });
        }*/
    //});
</script>