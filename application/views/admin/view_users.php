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