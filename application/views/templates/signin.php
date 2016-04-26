
	<section id="content">
    <div class="main padder">
      <div class="row">
        <div class="col-lg-4 col-lg-offset-4 m-t-large">
          <section class="panel">
            <header class="panel-heading text-center">
            <?php 
            $lan_sign_title= $signLangTitle[0]->lan_sign_title;
            $lan_email_label= $signLangTitle[0]->lan_email_label;
            $lan_email_text= $signLangTitle[0]->lan_email_text;
            $lan_pass_label= $signLangTitle[0]->lan_pass_label;
            $lan_pass_text= $signLangTitle[0]->lan_pass_text;
            $lan_sign_button= $signLangTitle[0]->lan_sign_button;
            $lan_signup_text= $signLangTitle[0]->lan_signup_text;
            $lan_signup_button= $signLangTitle[0]->lan_signup_button;
            
            ?>
            
            <?php echo $lan_sign_title;?>
            
            </header>
			<?php //echo validation_errors('<p class="error">'); ?>
			<div class="error_message">
			<?php echo $this->session->flashdata('signinError'); ?>
			</div>
			<?php echo form_open('signin/login', 'class=panel-body data-validate=parsley'); ?>
            <!--<form action="<?php echo base_url();?>dashboard" class="panel-body">-->
              <div class="block">
                <label class="control-label"><?php echo $lan_email_label;?></label>
                <input type="email" placeholder="<?php echo $lan_email_text;?>" class="form-control" data-required="true" name="email">
              </div>
              <div class="block">
                <label class="control-label"><?php echo $lan_pass_label;?></label>
                <input type="password" id="inputPassword" placeholder="<?php echo $lan_pass_text;?>" class="form-control" data-required="true" name="password">
              </div>
              <!--<div class="checkbox">
                <label>
                  <input type="checkbox"> Keep me logged in
                </label>
              </div>
              <a href="#" class="pull-right m-t-mini"><small>Forgot password?</small></a>-->
              <button type="submit" class="btn btn-primary"><?php echo $lan_sign_button;?></button>
              <!--<div class="line line-dashed"></div>
              <a href="#" class="btn btn-facebook btn-block m-b-small"><i class="fa fa-facebook pull-left"></i>Sign in with Facebook</a>
              <a href="#" class="btn btn-twitter btn-block"><i class="fa fa-twitter pull-left"></i>Sign in with Twitter</a>-->
              <div class="line line-dashed"></div>
              <p class="text-muted text-center"><small><?php echo $lan_signup_text;?></small></p>
              <a href="<?php echo base_url();?>signup" class="btn btn-white btn-block"><?php echo $lan_signup_button;?></a>
            </form>
          </section>
        </div>
      </div>
    </div>
</section>
