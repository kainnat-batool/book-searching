
<?php
$servername = "localhost";
$username = "root";
$password1 = "";
$dbname = "db";
$conn = mysqli_connect($servername, $username, $password1, $dbname);
if (!$conn) {
	die("connection failed:" . mysqli_connect());
} else {
	if (isset($_POST['submit'])) {
		$username = $_POST['username'];
		$password1 = $_POST['password1'];
		$sql ="SELECT * FROM data WHERE userName='$username' AND password='$password1' ";
		$result = $conn->query($sql);
        if ($result->num_rows > 0){
			header("Location: search.php");
			
		}
		else
		{
			echo"not login";
		}
	}
}

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">

		<title>Login Form</title>
		<link rel="stylesheet" href="style11.css">
		<body>
			<div class="wrapper">

<ul>
	<li><a href="start.html"> HOME</a></li>
	<li><a href="signin.php"> SIGN-UP</a></li>
	<li><a href="login.php"> LOGIN</a></li>
	<li><a href="search.php"> SEARCH</a></li>
	
</ul>
<br>
</div>
			<div class="login-box">
				<h1>Login</h1>
				<form action="http://localhost/searching/login.php" method="POST">
				<div class="textbox">
					<i class="fa fa-user" aria-hidden="true"></i>
					<input type="text" placeholder="username" name="username" value="">
				</div>
				<div class="textbox">
					<i class="fa fa-lock" aria-hidden="true"></i>
					<input type="password" placeholder="passsword" name="password1" value="">
				</div>
				<input class="btn" type="button" name="submit" value="Login">
			</form>
			</div>
		</body>
	</head>
</html>

