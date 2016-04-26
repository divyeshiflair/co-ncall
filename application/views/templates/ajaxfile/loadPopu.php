<?php
$popupHeader = "Outgoing Call Order";
/* echo '<pre>';
  print_r($callUSerDetails);
  echo '</pre>'; */
?>
<section id="content">
    <section class="main padder">
        <div class="clearfix">
            <h4><i class="fa fa-edit"></i><?php echo $popupHeader; ?></h4>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <div class="panel-body">
                        <div id="suc-msg" style="color: #009926; font-size: 18px; display: block; float: left;"></div>
                        <form data-validate="parsley" method="post" action="<?php echo base_url(); ?>call/callUpdate" class="form-horizontal">      
                            <input type="hidden" name="call_id" value="<?php echo $callUSerDetails[0]->call_id; ?>">
                            <div class="form-group">
                                <label class="col-lg-3 control-label">First Name</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control parsley-validated" value="<?php echo $callUSerDetails[0]->call_first; ?>" data-required="true" placeholder="First Name" name="first_name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Last Name</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control parsley-validated" value="<?php echo $callUSerDetails[0]->call_last; ?>" data-required="true" placeholder="Last Name" name="last_name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Company</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control parsley-validated" value="<?php echo $callUSerDetails[0]->call_company; ?>" data-required="true" placeholder="Company" name="company">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Phone 1</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control parsley-validated" value="<?php echo $callUSerDetails[0]->call_phone1; ?>" data-required="true" placeholder="Phone 1" name="phone1">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Phone 2</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control parsley-validated" value="<?php echo $callUSerDetails[0]->call_phone2; ?>" data-required="true" placeholder="Phone 2" name="phone2">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Email</label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control parsley-validated" value="<?php echo $callUSerDetails[0]->call_email; ?>" data-required="true" placeholder="Email" name="email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-lg-3 control-label">Notes</label>
                                <div class="col-lg-8">
                                    <textarea name="message" data-rangelength="[20,200]" data-trigger="keyup" class="form-control parsley-validated" rows="5" placeholder="Profile"><?php echo $callUSerDetails[0]->call_message; ?></textarea>
                                </div>
                            </div>

                            <!--div class="form-group">
                              <div class="col-lg-9 col-lg-offset-3">      
                              <div>
                                                      <p>Combobox</p>
                               <div class="input-group dropdown combobox m-b" id="myCombobox">
                              <input type="text" name="combobox" class="input-sm form-control">
                              <div class="input-group-btn">
                                <button data-toggle="dropdown" class="btn btn-sm btn-white dropdown-toggle" type="button" aria-expanded="false"><i class="caret"></i></button>
                                <ul class="dropdown-menu pull-right">
                                  <li data-value="1"><a href="#">9999999999</a></li>
                                  <li data-value="2"><a href="#">9999999990</a></li>
                                  
                                </ul>
                              </div>
                            </div>
                            </div>                
                              </div>
                            </div-->
                            <div class="form-group">
                                <div class="col-lg-9 col-lg-offset-3">                      
                                    <div class="checkbox">
                                        <label class="checkbox-custom">
                                            <input type="checkbox"  checked="checked" name="checkboxA">
                                            <i class="fa fa-check-square-o checked"></i>
                                            Item one checked
                                        </label>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-lg-9 col-lg-offset-3">                      
                                    <button class="btn btn-white" onClick='parent.jQuery.fn.colorbox.close();' >Cancel</button>
                                    <button class="btn btn-primary" type="submit">Save changes</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </section>

            </div>

        </div>

    </section>
</section>


