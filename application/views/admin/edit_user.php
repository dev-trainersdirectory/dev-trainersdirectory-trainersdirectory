<div class="row">
    <div class="col-lg-12">
        <form id="edit_user" method="post" enctype="multipart/form-data" class="form">
        <?php if( $user->getId() ) {?>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <image src="<?=base_url() . $lead->getProfilePic()?>" height="42" width="42" class="js-profile_img">
                </div>
            </div>
        </div>
        <?php } ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <label>User Type: </label>
                    <input type="checkbox" name=user_type_associations[admin] value="1"
                    <?php if( true == array_key_exists( 1, $user_type_associations ) ) { ?> checked <?php } ?> > Admin

                    <input type="checkbox" name=user_type_associations[student] value="2"
                    <?php if( true == array_key_exists( 2, $user_type_associations ) ) { ?> checked <?php } ?> > Student

                    <input type="checkbox" name=user_type_associations[trainer] value="3"
                    <?php if( true == array_key_exists( 3, $user_type_associations ) ) { ?> checked <?php } ?> > Trainer

                    <input type="checkbox" name=user_type_associations[institute] value="4"
                    <?php if( true == array_key_exists( 4, $user_type_associations ) ) { ?> checked <?php } ?> > Institute
                </div>
            </div>
        </div>
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
                    <label>Preferences: </label><br>
                    <input type="checkbox" name=lead[is_number_verified] value="1" <?php if( 1 == $lead->getIsNumberVerified()) { ?> checked<?php } ?> > Is mobile number verified<br/>
                    <input type="checkbox" name=lead[is_number_private] value="1" <?php if( true == $lead->getIsNumberPrivate()) { ?> checked<?php } ?> > Is mobile number private<br/>
                    <input type="checkbox" name=lead[allow_sms_alert] value="1" <?php if( true == $lead->getAllowSmsAlert()) { ?> checked<?php } ?> > Allow SMS alert<br/>
                </div>
            </div>
        </div>
        <input type="hidden" name=user[id] value="<?php echo $user->getId()?>"> 
        <input type="hidden" name=lead[id] value="<?php echo $lead->getId()?>">
        </form>
        <form id="frm_profile_image" style="display:none" enctype="multipart/form-data"> 
            <input type="hidden" name=user[id] id="js-user_id" value="<?php echo $user->getId()?>">
            <input type="file" name="lead[profile_image]" id="lead_profile_img">
            <input type="submit" id="frm_profile_image_submit">
        </form>
    </div>
</div>
<script type="text/javascript">
    
</script>