<!DOCTYPE html>
<html>
<head>
	<title>Trainers Diectory</title>
	<base href="<?=base_url()?>" />
</head>
<body>
	<div>
		<div align="right"><a href="register">Login/Signup</a></div>
		<table>
			<tr>
				<td>
					<form action="register/signup">
						<table>
							<tr>
								<td><input type="radio" onclick="show_form(1)" name="signup_usertype" value="1" checked="true">Student</td>
								<td><input type="radio" onclick="show_form(2)" name="signup_usertype" value="2">Trainer</td>
							</tr>
						</table>
						<table>
							<tr id="trainer_types" style="display:none;">
								<td><input type="radio" name="signup_trainertype" value="1" checked="true">I am a teacher</td>
								<td><input type="radio" name="signup_trainertype" value="2">I run an institute </td>
							</tr>
							<tr>
								<td>First Name:</td>
								<td><input type="text" name="signup_firstname"></td>
								<td>Last Name:</td>
								<td><input type="text" name="signup_lastname"></td>
							</tr>
							<tr>
								<td>Contact:</td>
								<td><input type="text" name="signup_contact"></td>
								<td>Email:</td>
								<td><input type="text" name="signup_email"></td>
							</tr>
							<tr>
								<td>Password:</td>
								<td><input type="password" name="signup_password"></td>
								<td>Confirm Password:</td>
								<td><input type="password" name="signup_cpassword"></td>
							</tr>
							<tr>
								<td colspan="2">
									<select name="signup_state">
										<option value="">Select State</option>
										<? foreach( $arrStrStates as $strState ) { ?>
											<option value="<?=$strState?>"><?=$strState?></option>
										<? } ?>
									</select>
								</td>
								<td>
									<select name="signup_city">
										<option value="">Select City</option>
										<? foreach( $arrStrCities as $strCity ) { ?>
											<option value="<?=$strCity?>"><?=$strCity?></option>
										<? } ?>
									</select>
								</td>
							</tr>
							<tr>
								<td><input type="submit" name="signup_register" value="Register"></td>
							</tr>
						</table>
					</form>	
				</td>
			</tr>
		</table>
	</div>
<script type="text/javascript">
	function show_form(val) {
		if( val == 1) {
			document.getElementById("trainer_types").style.display = "none";
		} else {
			document.getElementById("trainer_types").style.display = "block";
		}
	}
show_form(1);
</script>
</body>
</html>