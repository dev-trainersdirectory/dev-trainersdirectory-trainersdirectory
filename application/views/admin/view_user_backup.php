<form id="edit_user" method="post" enctype="multipart/form-data">
<image src="<?=base_url() . $lead->getProfilePic()?>" height="42" width="42" class="js-profile_img">

First Name : <input type="text" name=lead[first_name] value="<?php echo $lead->getFirstName()?>" >
Last Name : <input type="text" name=lead[last_name] value="<?php echo $lead->getLastName()?>" >
Status : <select name=user[status_id]>
			<?php foreach( $statuses AS $status ) { ?>
				<option value="<?php echo $status->getId()?>" <?php if( $status->getId() == $user->getStatusId() ) { ?> selected <?php } ?>><?php echo $status->getName()?></option>
			<?php } ?>
		</select>
Coins : <?php echo $lead->getCoins()?>

<br/><br/>
Email Address : <input type="text" name=user[email_id] value="<?php echo $user->getEmailId()?>">
Contact Number : <input type="text" name=user[contact_number] value="<?php echo $user->getContactNumber()?>">
Alternate Contact Number : <input type="text" name=user[alternate_contact_number] value="<?php echo $lead->getAlternateContactNumber()?>">
<br/><br/>
Address : <input type="text" name=lead[address] value="<?php echo $lead->getAddress()?>">
City : <select name=lead[city_id]>
			<?php foreach( $cities AS $city ) { ?>
				<option value="<?php echo $city->getId()?>" <?php if( $city->getId() == $lead->getCityId() ) { ?> selected <?php } ?>><?php echo $city->getName()?></option>
			<?php } ?>
		</select>
State : <select name=lead[state_id]>
			<?php foreach( $states AS $state ) { ?>
				<option value="<?php echo $state->getId()?>" <?php if( $state->getId() == $lead->getStateId() ) { ?> selected <?php } ?>><?php echo $state->getName()?></option>
			<?php } ?>
		</select>
Pincode : <input type="text" name=lead[pin_code] value="<?php echo $lead->getPinCode()?>">
<br/><br/>
Preferences :<br/>
<input type="checkbox" name=lead[is_number_verified] value="1" <?php if( 1 == $lead->getIsNumberVerified()) { ?> checked<?php } ?> > Is mobile number verified<br/>
<input type="checkbox" name=lead[is_number_private] value="1" <?php if( true == $lead->getIsNumberPrivate()) { ?> checked<?php } ?> > Is mobile number private<br/>
<input type="checkbox" name=lead[allow_sms_alert] value="1" <?php if( true == $lead->getAllowSmsAlert()) { ?> checked<?php } ?> > Allow SMS alert<br/>
<br/>
<input type="hidden" name=user[id] value="<?php echo $user->getId()?>"> 
<input type="hidden" name=lead[id] value="<?php echo $lead->getId()?>">
<input class="js-update_user" type="button" value="Update"></input>
<a href="">cancel</a>
</form>
<form id="frm_profile_image" style="display:none" enctype="multipart/form-data"> 
	 <input type="hidden" name=user[id] value="<?php echo $user->getId()?>">
	<input type="file" name="lead[profile_image]" id="lead_profile_img">
	<input type="submit" id="frm_profile_image_submit">
</form>