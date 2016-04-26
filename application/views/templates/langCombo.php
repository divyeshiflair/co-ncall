<?php
$langData=$this->langsModel->getActiveLanguage();
$currPage= $this->uri->uri_string();
echo form_open('languagemanage/change_lang_front', 'class=form-horizontal data-validate=parsley name=changelang'); ?>
<input type="hidden" name="curr_page" value="<?php echo $currPage;?>">
<select id="change_lang" name="langNames" onchange="changelang.submit();">
	<?php 
	foreach($langData as $langData){
	  ?> 
	  <option <?php if($this->session->userdata('cur_lang_code')== $langData->lan_id){ echo "selected=selected";}?> value="<?php echo $langData->lan_id;?>"> <?php echo $langData->lan_title;?></option>
	  <?php 
	}?>
</select>
<?php echo form_close(); ?>
