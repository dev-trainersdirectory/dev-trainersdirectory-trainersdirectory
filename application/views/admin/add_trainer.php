<link href="<?=base_url()?>public/admin/css/dropdown-css.css" rel="stylesheet">
<form name="edit_trainer" method="post">
<strong>Personal Details</strong><br>
First Name : <input type="text" name=lead[first_name]  >
Last Name : <input type="text" name=lead[last_name] >
Status : <select name=user[status_id]>
			<?php foreach( $statuses AS $status ) { ?>
				<option value="<?php echo $status->getId()?>"><?php echo $status->getName()?></option>
			<?php } ?>
		</select>

<br/><br/>
Email Address : <input type="text" name=user[email_id]>
Contact Number : <input type="text" name=user[contact_number]>
Alternate Contact Number : <input type="text" name=user[alternate_contact_number]>
<br/><br/>
Address : <input type="text" name=lead[address]>
City : <select name=lead[city_id]>
			<?php foreach( $cities AS $city ) { ?>
				<option value="<?php echo $city->getId()?>"><?php echo $city->getName()?></option>
			<?php } ?>
		</select>
State : <select name=lead[state_id]>
			<?php foreach( $states AS $state ) { ?>
				<option value="<?php echo $state->getId()?>"><?php echo $state->getName()?></option>
			<?php } ?>
		</select>
Pincode : <input type="text" name=lead[pin_code] >
<br/><br/>
<strong>Trainers Details</strong><br>
Description : <textarea name="trainer[description]"></textarea>
Experience : <input type="text" name=trainer[experience] >
Qualities : <textarea name="trainer[qualities]"></textarea>
<br/><br/>
Min Rate : <input type="text" name="trainer[min_rate]" >
Max Rate : <input type="text" name="trainer[max_rate]" >
<br/><br/>
Is Paid Profile : 
<input type="radio" name="trainer[is_paid_profile]" value="1" > Yes 
<input type="radio" name="trainer[is_paid_profile]" value="0" > No
Completed On: <input type="text" name="trainer[completed_on]" >
Has Taught In School Colleges : 
<input type="radio" name="trainer[has_taught_in_school_colleges]" value="1" > Yes 
<input type="radio" name="trainer[has_taught_in_school_colleges]" value="0" > No
<br/><br/>
Has Vehicle : 
<input type="radio" name="trainer[has_vehicle]" value="1" > Yes 
<input type="radio" name="trainer[has_vehicle]" value="0" > No
Views : <input type="text" name="trainer[views]">
<br/><br/>
Available Days : 
<select name=trainer[available_day_id]>
	<?php foreach( $days AS $day ) { ?>
		<option value="<?php echo $day->getId()?>" ><?php echo $day->getName()?></option>
	<?php } ?>
</select>
Available Start Time : 
<select name=trainer[available_start_time_id]>
	<?php foreach( $times AS $time ) { ?>
		<option value="<?php echo $time->getId()?>" ><?php echo $time->getName()?></option>
	<?php } ?>
</select>
Available End Time : 
<select name=trainer[available_end_time_id]>
	<?php foreach( $times AS $time ) { ?>
		<option value="<?php echo $time->getId()?>" ><?php echo $time->getName()?></option>
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
<input type="checkbox" value="1" > Is mobile number verified<br/>
<input type="checkbox" value="1" > Is mobile number private<br/>
<input type="checkbox" value="1" > Allow SMS alert<br/>
<br/><br/>
<input class="js-insert_trainer" type="button" value="Save"></input>
<a href="">cancel</a>
<script type="text/javascript" src="/public/admin/js/dropdown-js.js"></script>
<script type="text/javascript">

    $(".js-insert_trainer").click(function(){
        $.ajax ({
            type: "post",
            data: $( "form" ).serialize(),
            url: '<?=base_url()?>admin_trainers/addTrainer',
            success: function(result) {
                //if(result) {
                    $('.container-fluid').html(result);
                //}
            }
        })
    });

</script>