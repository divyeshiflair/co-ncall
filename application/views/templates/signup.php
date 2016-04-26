<section id="content">
    <div class="main padder">
      <div class="row">
        <div class="col-lg-4 col-lg-offset-4 m-t-large">
          <section class="panel">
            <header class="panel-heading text-center">
               <?php 
				$lan_sign_title= $signUpLangTitle[0]->lan_sign_title;
				$lan_firstname_label= $signUpLangTitle[0]->lan_firstname_label;
				$lan_firstname_text= $signUpLangTitle[0]->lan_firstname_text;
				$lan_lastname_label= $signUpLangTitle[0]->lan_lastname_label;
				$lan_lastname_text= $signUpLangTitle[0]->lan_lastname_text;
				$lan_email_label= $signUpLangTitle[0]->lan_email_label;
				$lan_email_text= $signUpLangTitle[0]->lan_email_text;
				$lan_pass_label= $signUpLangTitle[0]->lan_pass_label;
				$lan_pass_text= $signUpLangTitle[0]->lan_pass_text;
				$lan_mobile_label= $signUpLangTitle[0]->lan_mobile_label;
				$lan_mobile_text= $signUpLangTitle[0]->lan_mobile_text;
				$lan_sign_button= $signUpLangTitle[0]->lan_sign_button;
				$lan_signup_text= $signUpLangTitle[0]->lan_signup_text;
				$lan_signin_button= $signUpLangTitle[0]->lan_signin_button;
            ?>
           <?php echo $lan_sign_title;?>
            </header>
			<?php echo validation_errors('<p class="error">'); ?>
			<div class="error_message">
			<?php echo $this->session->flashdata('signupError'); ?>
			</div>
			<?php echo form_open('signup/registration', 'class=panel-body data-validate=parsley'); ?>
            <!--<form action="index.html" class="panel-body">-->
            <div class="block">
				<label class="control-label"><?php echo $lan_firstname_label;?></label>
                <input type="text" placeholder="<?php echo $lan_firstname_text;?>" class="form-control" data-required="true" name="firstname" value="<?php echo set_value('firstname'); ?>">
            </div>
			<div class="block">
                <label class="control-label"><?php echo $lan_lastname_label;?></label>
                <input type="text" placeholder="<?php echo $lan_lastname_text;?>" class="form-control" data-required="true" name="lastname" value="<?php echo set_value('lastname'); ?>">
            </div>
            <div class="block">
                <label class="control-label"><?php echo $lan_email_label;?></label>
                <input type="email" placeholder="<?php echo $lan_email_text;?>" class="form-control" data-required="true" name="email" value="<?php echo set_value('email'); ?>">
            </div>
			<div class="block">
                <label class="control-label"><?php echo $lan_pass_label;?></label>
                <input type="password" placeholder="<?php echo $lan_pass_text;?>" class="form-control" data-required="true" name="password" value="<?php echo set_value('password'); ?>">
            </div>
			<div class="block">
                <label class="control-label"><?php echo $lan_mobile_label;?></label>
                <input type="text" placeholder="<?php echo $lan_mobile_text;?>" class="form-control" data-required="true" data-type="number"  maxlength="10" name="mobile" value="<?php echo set_value('mobile'); ?>">
            </div>
            <!--<div class="block">
                <label class="control-label">Type a password</label>
                <input type="password" id="inputPassword" placeholder="Password" class="form-control">
            </div>-->
			
            <div class="checkbox">
                <label>
                  <input type="checkbox" name="low[]" value="1" <?php echo set_value('mobile'); ?> <?php if(set_value('low')) if(in_array('1',set_value('low')))echo 'checked'; ?>> Low1
                </label>
            </div>
			<div class="checkbox">
                <label>
                  <input type="checkbox" name="low[]" value="2" data-required="true" <?php if(set_value('low')) if(in_array('2',set_value('low')))echo 'checked'; ?> > Low2
                </label>
            </div>
            <button type="submit" class="btn btn-primary"><?php echo $lan_sign_button;?></button>
            <!--<div class="line line-dashed"></div>
            <div class="row">
                <div class="col-sm-6 text-center">
                   <a href="#" class="btn btn-facebook btn-circle btn-sm"><i class="fa fa-facebook"></i>Sign up with Facebook</a>
                </div>
                <div class="col-sm-6 text-center">
                  <a href="#" class="btn btn-twitter btn-circle btn-sm"><i class="fa fa-twitter"></i>Sign up with Twitter</a>
                </div>
            </div>-->
            <div class="line line-dashed"></div>
            <p class="text-muted text-center"><small><?php echo $lan_signup_text;?></small></p>
            <a href="<?php echo base_url();?>signin" class="btn btn-primary btn-block"><?php echo $lan_signin_button;?></a>
            <!--</form>-->
			<?php echo form_close(); ?>
          </section>
        </div>
      </div>
    </div>
</section>
				<style>
				.type{
					color:red;
					}
					</style>
