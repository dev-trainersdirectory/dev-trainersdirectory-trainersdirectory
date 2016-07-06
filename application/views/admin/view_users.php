<div>
	<form name="user_filter" method="post" action="<?=base_url() . 'admin_users'?>">
		<input type="text" name="filter[name]" value="<?php echo $filter['name']?>" placeholder="Name">
		<input type="text" name="filter[email_id]" value="<?php echo $filter['email_id']?>" placeholder="Email Id">
		<input type="text" name="filter[contact_number]" value="<?php echo $filter['contact_number']?>" placeholder="Contact Number">
		<select name=filter[status_id] palceholder="Status">
			<option>Status</option>
			<?php foreach( $statuses AS $status ) { ?>
				<option value="<?php echo $status->getId()?>" <?php if( $status->getId() == $filter['status_id'] ) { ?> selected <?php } ?>><?php echo $status->getName()?></option>
			<?php } ?>
		<input type="hidden" name="filter[reset]" vaue="0" id="filter_reset">
		<input type="submit" value="Filter">
		<input type="submit" value="Reset" onclick="document.getElementById('filter_reset').value = 1;" >
	</form>
</div>
<table class="stdtable" border="1">
	<tr>
		<th>Name</th>
		<th>Email Address</th>
		<th>Contact No</th>
		<th>Address</th>
		<th>Status</th>
		<th>Actions</th>
	</tr>
	<?php foreach( $users as $user ) {?>
		<?php $lead = $leads[$user->getId()]?>
		<tr>
			<td><?php echo $lead->getFullName()?></td>
			<td><?php echo $user->getEmailId() ?></td>
			<td><?php echo $user->getContactNumber()?></td>
			<td><?php echo $lead->getAddress()?></td>
			<td><?php echo $statuses[$user->getStatusId()]->getName()?></td>
			<td><a href='' class='js-edit_user'>Edit</a></td>
		</tr>
	<?php } ?>
</table>

<script type="text/javascript">
	
</script>