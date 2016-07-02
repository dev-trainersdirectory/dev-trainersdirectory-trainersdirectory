<form name="edit_user" method="post" action="<?=base_url()?>admin_users/updateUser">
Name : <input type="text" name=lead[first_name] value="<?php echo $lead->getFirstName()?>" >
Contact Number : <input type="text" name=user[contact_number] value="<?php echo $user->getContactNumber()?>">
<input type="hidden" name=user[id] value="<?php echo $user->getId()?>"> 
<input type="hidden" name=lead[id] value="<?php echo $lead->getId()?>">
<input type="Submit" value="Update"></input>
