<!DOCTYPE html>
<html>
<head>
	<title>Trainers Diectory</title>
</head>
<body>
	<div>
		<? if( $displayMessage ) echo $displayMessage; ?>
		<form method="post" action="home/uploadImage" enctype=multipart/form-data >
			Upload Image: <input type="file" name="input_img" />
			<input type='submit' label="Search" />
		</form>
	</div>
</body>
</html>