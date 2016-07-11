<link href="<?=base_url()?>public/admin/css/dropdown-css.css" rel="stylesheet">
<div class="row">
    <div class="col-lg-12">
    <form id="edit_trainer" method="post" enctype="multipart/form-data" class="form">
    	<div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label>First Name: </label>
                    <input class="form-control" type="text" name=lead[first_name] value="<?php echo $lead->getFirstName()?>" >
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Last Name: </label>
                    <input class="form-control" type="text" name=lead[last_name] value="<?php echo $lead->getLastName()?>" >
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Status: </label>
                    <select class="form-control" name=user[status_id]>
                        <?php foreach( $statuses AS $status ) { ?>
                            <option value="<?php echo $status->getId()?>" <?php if( $status->getId() == $user->getStatusId() ) { ?> selected <?php } ?>><?php echo $status->getName()?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Email Address: </label>
                    <input class="form-control" type="text" name=user[email_id] value="<?php echo $user->getEmailId()?>">
                </div>
            </div>
        </div>
		<div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Contact Number: </label>
                    <input class="form-control" type="text" name=user[contact_number] value="<?php echo $user->getContactNumber()?>">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Alternate Contact Number: </label>
                    <input class="form-control" type="text" name=lead[alternate_contact_number] value="<?php echo $lead->getAlternateContactNumber()?>">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <label>Address: </label>
                    <input class="form-control" type="text" name=lead[address] value="<?php echo $lead->getAddress()?>">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label>City: </label>
                    <select class="form-control" name=lead[city_id]>
                        <?php foreach( $cities AS $city ) { ?>
                            <option value="<?php echo $city->getId()?>" <?php if( $city->getId() == $lead->getCityId() ) { ?> selected <?php } ?>><?php echo $city->getName()?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label>State: </label>
                    <select class="form-control" name=lead[state_id]>
                        <?php foreach( $states AS $state ) { ?>
                            <option value="<?php echo $state->getId()?>" <?php if( $state->getId() == $lead->getStateId() ) { ?> selected <?php } ?>><?php echo $state->getName()?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Pincode: </label>
                    <input class="form-control" type="text" name=lead[pin_code] value="<?php echo $lead->getPinCode()?>">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Gender: </label>
                    <select name=lead[gender_id] class="form-control">
                    <?php foreach( $genders AS $gender ) { ?>
                        <option value="<?php echo $gender->getId()?>" <?php if( $gender->getId() == $lead->getGenderId() ) { ?> selected <?php } ?>>
                        <?php echo $gender->getName()?></option>
                    <?php } ?>
                    </select>
                </div>
            </div>
        </div>

		<div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Description: </label>
                    <textarea class="form-control" name="trainer[description]"><?php echo $trainer->getDescription()?></textarea>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Experience: </label>
                    <input class="form-control" type="text" name=trainer[experience] value="<?php echo $trainer->getExperience()?>">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Min Rate: </label>
                    <input class="form-control" type="text" name="trainer[min_rate]" value="<?php echo $trainer->getMinRate()?>">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Max Rate: </label>
                    <input class="form-control" type="text" name="trainer[max_rate]" value="<?php echo $trainer->getMaxRate()?>">
                </div>
            </div>
        </div>        
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Is Paid Profile: </label>
                    <input type="radio" name="trainer[is_paid_profile]" value="1" <?php if( 1==$trainer->getIsPaidProfile() ) { ?> checked <?php } ?> > Yes
					<input type="radio" name="trainer[is_paid_profile]" value="0" <?php if( 0==$trainer->getIsPaidProfile() ) { ?> checked <?php } ?> > No
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Completed On: </label>
                    <input class="form-control" type="text" name="trainer[completed_on]" value="<?php echo $trainer->getCompletedOn()?>">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Has Taught In School Colleges: </label><br>
                    <input type="radio" name="trainer[has_taught_in_school_colleges]" value="1" <?php if( 1==$trainer->getHasTaughtInSchoolColleges() ) { ?> checked <?php } ?> > Yes 
					<input type="radio" name="trainer[has_taught_in_school_colleges]" value="0" <?php if( 0==$trainer->getHasTaughtInSchoolColleges() ) { ?> checked <?php } ?> > No
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Has Vehicle: </label>
                    <input type="radio" name="trainer[has_vehicle]" value="1" <?php if( 1==$trainer->getHasVehicle() ) { ?> checked <?php } ?> > Yes 
					<input type="radio" name="trainer[has_vehicle]" value="0" <?php if( 0==$trainer->getHasVehicle() ) { ?> checked <?php } ?> > No
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Available Days: </label>
                    <select class="form-control" name=trainer[available_day_id]>
						<?php foreach( $days AS $day ) { ?>
							<option value="<?php echo $day->getId()?>" <?php if( $day->getId() == $trainer->getAvailableDayId() ) { ?> selected <?php } ?>><?php echo $day->getName()?></option>
						<?php } ?>
					</select>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Available Start Time: </label>
                    <select class="form-control" name=trainer[available_start_time_id]>
						<?php foreach( $times AS $time ) { ?>
							<option value="<?php echo $time->getId()?>" <?php if( $time->getId() == $trainer->getAvailableStartTimeId() ) { ?> selected <?php } ?>><?php echo $time->getName()?></option>
						<?php } ?>
					</select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Available End Time: </label>
                    <select class="form-control" name=trainer[available_end_time_id]>
						<?php foreach( $times AS $time ) { ?>
							<option value="<?php echo $time->getId()?>" <?php if( $time->getId() == $trainer->getAvailableEndTimeId() ) { ?> selected <?php } ?>><?php echo $time->getName()?></option>
						<?php } ?>
					</select>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Trainer's Locations: </label>
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
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Preferences: </label><br>
                    <input type="checkbox" name=trainer_preferences[home] value="1"
                    <?php if( true == array_key_exists( 1, $trainer_preferences ) ) { ?> checked <?php } ?> > Teach at my Home
                    <br>
                    <input type="checkbox" name=trainer_preferences[student_home] value="2"
                    <?php if( true == array_key_exists( 2, $trainer_preferences ) ) { ?> checked <?php } ?> > Teach at students Home
                    <br>
                    <input type="checkbox" name=trainer_preferences[online] value="3"
                    <?php if( true == array_key_exists( 3, $trainer_preferences ) ) { ?> checked <?php } ?> > Teach online
                    <br>
                    <input type="checkbox" name=trainer_preferences[institute] value="4"
                    <?php if( true == array_key_exists( 4, $trainer_preferences ) ) { ?> checked <?php } ?> > Teach at an institute
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <input type="checkbox" name=lead[is_number_verified] value="1" <?php if( 1 == $lead->getIsNumberVerified()) { ?> checked<?php } ?> > Is mobile number verified<br/>
                    <input type="checkbox" name=lead[is_number_private] value="1" <?php if( true == $lead->getIsNumberPrivate()) { ?> checked<?php } ?> > Is mobile number private<br/>
                    <input type="checkbox" name=lead[allow_sms_alert] value="1" <?php if( true == $lead->getAllowSmsAlert()) { ?> checked<?php } ?> > Allow SMS alert<br/>
                </div>
            </div>
        </div>
        <input type="hidden" name=user[id] value="<?php echo $user->getId()?>"> 
        <input type="hidden" name=lead[id] value="<?php echo $lead->getId()?>">
    </div>
</div>
<script type="text/javascript" src="/public/admin/js/dropdown-js.js"></script>
