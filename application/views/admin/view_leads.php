<!DOCTYPE html>
<html>
<head>
	<title>Trainers Diectory - Admin Panel</title>
</head>
<body>
	<div>
		<table>
			<tr>
				<td>Name</td>
				<td>Email</td>
				<td>Action</td>
			</tr>
			<? foreach( $arrObjLeads as $objLead ) { ?>
			<tr>
				<td><?=$objLead['first_name'] . ' ' . $objLead['first_name']?></td>
				<td><?=$objLead['email_address']?></td>
				<td><a href='#' data="<?=$objLead['id']?>" onclick="loadDetails(this)">Edit</a></td>
			</tr>	
			<? } ?>
		</table>
	</div>
	<br><br>
	<div class="lead_details">

	</div>
<script type="text/javascript" src="/public/js/jquery.min.js"></script>
<script type="text/javascript">
function loadDetails(e) {
	var leadId= $(e).attr('data');

	$.ajax ({
		type: "post",
		url: "/users/view",
		data:{lead_id: leadId},
		success: function(result) {
			if(result) {
				$('.lead_details').html(result);
			}
		}
	});
 }
</script>
</body>
</html>