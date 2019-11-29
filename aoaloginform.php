<?php
if(isset($_POST['submit']))
{
header("Location:booki.php");
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Login Form</title>
		<link rel="stylesheet" href="style11.css">
		<body>
			<div class="login-box">
				<h1>Login</h1>
				<div class="textbox">
					<i class="fa fa-user" aria-hidden="true"></i>
					<input type="text" placeholder="username" name="" value="">
				</div>
				<div class="textbox">
					<i class="fa fa-lock" aria-hidden="true"></i>
					<input type="password" placeholder="passsword" name="" value="">
				</div>
				<input class="btn" type="button" OnClick=location.href="booki.php" name="" value="Login">
			</div>
		</body>
	</head>
</html>

