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
					<form action="register/login" method="post">
						<table>
							<tr>
								<td>Username:</td>
								<td><input type="text" name="login_email"></td>
							</tr>
							<tr>
								<td>Password:</td>
								<td><input type="password" name="login_password"></td>
							</tr>
							<tr>
								<td></td>
								<td><input type="submit" name="login_submit" value="Login"></td>
							</tr>
						</table>
					</form>	
				</td>
			</tr>
		</table>
	</div>

</body>
</html>