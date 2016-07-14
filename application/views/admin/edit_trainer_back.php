<form name="edit_trainer" method="post">
<strong>Personal Details</strong><br>
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
Alternate Contact Number : <input type="text" name=lead[alternate_contact_number] value="<?php echo $lead->getAlternateContactNumber()?>">
<br/><br/>
Gender : <select name=lead[gender_id]>
			<?php foreach( $genders AS $gender ) { ?>
				<option value="<?php echo $gender->getId()?>" <?php if( $gender->getId() == $lead->getGenderId() ) { ?> selected <?php } ?>>
				<?php echo $gender->getName()?></option>
			<?php } ?>
		</select>
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
<strong>Trainers Details</strong><br>
Description : <textarea name="trainer[description]"><?php echo $trainer->getDescription()?></textarea>
Experience : <input type="text" name=trainer[experience] value="<?php echo $trainer->getExperience()?>">
Qualities : <textarea name="trainer[qualities]"><?php echo $trainer->getQualities()?></textarea>
<br/><br/>
Min Rate : <input type="text" name="trainer[min_rate]" value="<?php echo $trainer->getMinRate()?>">
Max Rate : <input type="text" name="trainer[max_rate]" value="<?php echo $trainer->getMaxRate()?>">
<br/><br/>
Is Paid Profile : 
<input type="radio" name="trainer[is_paid_profile]" value="1" <?php if( 1==$trainer->getIsPaidProfile() ) { ?> checked <?php } ?> > Yes 
<input type="radio" name="trainer[is_paid_profile]" value="0" <?php if( 0==$trainer->getIsPaidProfile() ) { ?> checked <?php } ?> > No
Completed On: <input type="text" name="trainer[completed_on]" value="<?php echo $trainer->getCompletedOn()?>">
Has Taught In School Colleges : 
<input type="radio" name="trainer[has_taught_in_school_colleges]" value="1" <?php if( 1==$trainer->getHasTaughtInSchoolColleges() ) { ?> checked <?php } ?> > Yes 
<input type="radio" name="trainer[has_taught_in_school_colleges]" value="0" <?php if( 0==$trainer->getHasTaughtInSchoolColleges() ) { ?> checked <?php } ?> > No
<br/><br/>
Has Vehicle : 
<input type="radio" name="trainer[has_vehicle]" value="1" <?php if( 1==$trainer->getHasVehicle() ) { ?> checked <?php } ?> > Yes 
<input type="radio" name="trainer[has_vehicle]" value="0" <?php if( 0==$trainer->getHasVehicle() ) { ?> checked <?php } ?> > No
Views : <input type="text" name="trainer[views]" value="<?php echo $trainer->getViews()?>">
<br/><br/>
Available Days : 
<select name=trainer[available_day_id]>
	<?php foreach( $days AS $day ) { ?>
		<option value="<?php echo $day->getId()?>" <?php if( $day->getId() == $trainer->getAvailableDayId() ) { ?> selected <?php } ?>><?php echo $day->getName()?></option>
	<?php } ?>
</select>
Available Start Time : 
<select name=trainer[available_start_time_id]>
	<?php foreach( $times AS $time ) { ?>
		<option value="<?php echo $time->getId()?>" <?php if( $time->getId() == $trainer->getAvailableStartTimeId() ) { ?> selected <?php } ?>><?php echo $time->getName()?></option>
	<?php } ?>
</select>
Available End Time : 
<select name=trainer[available_end_time_id]>
	<?php foreach( $times AS $time ) { ?>
		<option value="<?php echo $time->getId()?>" <?php if( $time->getId() == $trainer->getAvailableEndTimeId() ) { ?> selected <?php } ?>><?php echo $time->getName()?></option>
	<?php } ?>
</select>
<br/><br/>
Trainer's Locations: 
<div class="btn-group">
  <button data-toggle="dropdown" class="btn dropdown-toggle"  data-placeholder="Please select">Checked option <span class="caret"></span></button>
    <ul class="dropdown-menu">
    <?php foreach( $locations AS $location ) { ?>
      <li>
      <input type="checkbox" id="<?=$location->getId()?>" value="<?=$location->getId()?>" name="trainer_location[location_id][<?=$location->getId()?>]">
      <label for="<?=$location->getId()?>" name="trainer_location[location_id][<?=$location->getId()?>]"><?=$location->getName()?></label>
      </li>
    <?php } ?>
    </ul>
</div>
<br/><br/>
Preferences : <br/>
<input type="checkbox" name="lead[is_number_verified]" value="1" <?php if( true == $lead->getIsNumberVerified()) { ?> checked<?php } ?> > 
Is mobile number verified<br/>
<input type="checkbox" name="lead[is_number_private]" value="1" <?php if( true == $lead->getIsNumberPrivate()) { ?> checked<?php } ?> > 
Is mobile number private<br/>
<input type="checkbox" name="lead[allow_sms_alert]" value="1" <?php if( true == $lead->getAllowSmsAlert()) { ?> checked<?php } ?> > 
Allow SMS alert<br/>
<br/><br/>
<input type="hidden" name=user[id] value="<?php echo $user->getId()?>"> 
<input type="hidden" name=lead[id] value="<?php echo $lead->getId()?>">
<input class="js-update_trainer" type="button" value="Update"></input><?php echo $user->getId()?>
<a href="">cancel</a>