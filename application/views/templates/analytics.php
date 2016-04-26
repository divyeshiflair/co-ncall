  <!-- / nav -->
 
  <section id="content">
<style type="text/css">

.error{
    border:1px solid red !important;
}
</style>

        <!--<script src="<?php echo base_url();?>theme/js/mychart.js"></script>-->
    <section class="main padder">
      <div class="clearfix">
        <h4>Analytics</h4>
      </div>
      <section class="panel">
        <header class="panel-heading font-bold ">CallOffice Analytics
          <div class="CallOffice" >
            <form name="daterange" method="POST" id="daterange">

              <label class="col-lg-2 control-label">From </label>
              <div class="col-lg-2">
                 <input name="confrom" id="confrom" type="text" data-date-format="yyyy-mm-dd" size="16" class="input-sm form-control" readony/>
                 
              </div>
          
              <label class="col-lg-2 control-label">To </label>
              <div class="col-lg-2">
                 <input name="conto" id="conto"  type="text" data-date-format="yyyy-mm-dd" size="16" class="input-sm form-control" readony/>
                 
              </div>
               <div class="col-lg-2">                      
        <button id="formsave" type="submit" class="btn btn-primary" >Search</button>
                         <!--   <button class="btn btn-primary" type="submit"> Search</button> -->
                  </div>
            </form>

           </div>             
        </header>
        <div class="panel-body">
          <div id="flot-color" style="height:250px"></div>
        </div>
        <footer class="panel-footer">
          <div class="row text-center">
              <div class="col-xs-3 b-r">
                <p class="h3 font-bold m-t">5,860</p>
                <p class="text-muted">Orders</p>
                <p class="text-muted">
                  <select class="form-control selectaction bg-color-one" name="ser_city[]" id="ser_city[]">
                    <option value="" >Action</option>
                      <?php
                      if($allPilllist){
                       foreach ($allPilllist as  $city) { 
                      ?>
                      <option value="<?php echo $city->call_pill_title?>" ><?php echo  $city->call_pill_title?></option>
                      <?php } }?>
                  </select> </p> 
                 
              </div>
            <div class="col-xs-3 b-r">
              <p class="h3 font-bold m-t">10,450</p>
              <?php
                                             // print_r($call_pill_title[0]->call_pill_title);

              ?>
              <p class="text-muted">Selling Items</p>
              <p class="text-muted">
                <select class="form-control selectaction bg-color-two" name="ser_city[]" id="ser_city[]">
                  <option value="" >Action</option>
                    <?php
                      if($allPilllist){
                       foreach ($allPilllist as  $city) { 
                      ?>
                      <option value="<?php echo $city->call_pill_title?>" ><?php echo  $city->call_pill_title?></option>
                      <?php } }?>
                </select> </p> 
            </div>
            <div class="col-xs-3 b-r">
              <p class="h3 font-bold m-t">21,230</p>
              <p class="text-muted">Items</p>
              <p class="text-muted">
                <select class="form-control selectaction bg-color-three" name="ser_city[]" id="ser_city[]">
                  <option value="" >Action</option>
                    <?php
                      if($allPilllist){
                       foreach ($allPilllist as  $city) { 
                      ?>
                      <option value="<?php echo $city->call_pill_title?>" ><?php echo  $city->call_pill_title?></option>
                      <?php } }?>
                </select> </p> 
            </div>
            <div class="col-xs-3">
              <p class="h3 font-bold m-t">7,230</p>
              <p class="text-muted">Customers</p>
              <p class="text-muted">
                <select class="form-control selectaction bg-color-four" name="ser_city[]" id="ser_city[]">
                  <option value="" >Action</option>
                   <?php
                      if($allPilllist){
                       foreach ($allPilllist as  $city) { 
                      ?>
                      <option value="<?php echo $city->call_pill_title?>" ><?php echo  $city->call_pill_title?></option>
                      <?php } }?>
                </select> </p> 
            </div>
          </div>
        </footer>
      </section>

    </section>
  <!-- footer -->
<script type="text/javascript">
    $(document).ready(function () {

  $("#daterange").validate({
         submitHandler: function(form) {
        succ_frmforgot();
      },
        rules : {
          confrom :"required",
          conto :"required",
        },
             errorPlacement: function(error, element){
  return false;
  }
    });
    function succ_frmforgot()
{
  var fromdate=$("#confrom").val();
  var todate=$("#conto").val();
  var ajax_value_file = '<?php echo base_url(); ?>call/analuyticsdate';

   $.ajax({
        type: "POST",
        url: ajax_value_file,
        data: "fromdate="+fromdate + "&todate=" + todate,

        beforeSend: function () {
            $("#loading_div").show();
        },
        complete: function () {
            $("#loading_div").hide();
          
        },
        success: function (msg) {
            $("#loading_div").hide();
            
            $("#content").html(msg);
           // alert(fromdate);
            $("#confrom").val(fromdate);
            $("#conto").val(todate);

        }
    });
}
    });

  $(function() {
    $( "#confrom" ).datepicker({
      defaultDate: "+1w",
      changeMonth: true,
      numberOfMonths: 1,
      onClose: function( selectedDate ) {
        $( "#conto" ).datepicker( "option", "minDate", selectedDate );
      }
    });
    $( "#conto" ).datepicker({
      defaultDate: "+1w",
      changeMonth: true,
      numberOfMonths: 1,
      onClose: function( selectedDate ) {
        $( "#confrom" ).datepicker( "option", "maxDate", selectedDate );
      }
    });
  });
       //   });   
$(function(){
<?php
if($allPill){
  ?>
   var js_array = [<?php echo '"'.implode('","', $allPill).'"' ?>];
 

console.log(js_array);
  var d1 = [];
  for (var i = 0; i < js_array.length; i++) {
    d1.push([ i, js_array[i]]);
  };

  var plot = $.plot($("#flot-color"), [{
          data: d1,
      }], 
      {
        series: {
            lines: {
                show: true,
                lineWidth: 1,
                fill: true,
                fillColor: {
                    colors: [{
                        opacity: 0.0
                    }, {
                        opacity: 0.2
                    }]
                }
            },
            points: {
                radius: 5,
                show: true
            },
            shadowSize: 2
        },
        grid: {
            color: "#fff",
            hoverable: true,
            clickable: true,
            tickColor: "#f0f0f0",
            borderWidth: 0
        },
        colors: ["#3fcf7f"],
        xaxis: {
            mode: "categories",
            tickDecimals: 0 ,
            ticks: 10

        },
        yaxis: {
            ticks: 5,
            tickDecimals: 0,            
        },
        tooltip: true,
        tooltipOpts: {
          content: getTooltip,
          defaultTheme: false,
          shifts: {
            x: 0,
            y: 20
          }
        }
      }
  );


<?php
}
?>
 });
 
function getTooltip(label, x, y) {
    var obj=[];
    var obj = <?php echo json_encode($allPillmy); ?>;
    for (var key in obj) {
     // console.log("key " + key + " has value " + obj[key]);
      if(key==x)
      {
        x=obj[key];
      }
    }
    return  x; 
}
</script>
  </section>
