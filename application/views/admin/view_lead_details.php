<!DOCTYPE html>
<html>
<head>
	<title>Trainers Diectory - Admin Panel</title>
</head>
<body>
	<div>
	<form id="update_lead" method="post">
		<table>
			<tr>
				<td>First Name</td>
				<td><input type="text" name="lead_firstname" value="<?=$objLead['first_name']?>" ></td>
			</tr>
			<tr>
				<td>Last Name</td>
				<td><input type="text" name="lead_lastname" value="<?=$objLead['last_name']?>" ></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input type="text" name="lead_email_adress" value="<?=$objLead['email_address']?>"></td>
			</tr>
			<tr>
				<td></td>
				<td>
				<input type="hidden" name="lead_id" value="<?=$objLead['id']?>" >
				<a href="#" onclick="updateDetails(this)" >SAVE</a> 
				</td>
			</tr>
		</table>
	</form>
	</div>
	<div class="update_details"></div>
<script type="text/javascript">
function updateDetails(e) {
	var leadId= $(e).attr('data');

	$.ajax ({
		type: "post",
		url: "/users/updateUser",
		data: $('#updateLead').serializeArray(),
		success: function(result) {
			if(result) {
				$('.update_details').html(result);
			}
		}
	});

 }
</script>
</body>
</html>