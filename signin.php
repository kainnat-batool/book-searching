<?php
$dbHost="localhost";
$dbUsername='root';
$dbPassword='';
$dbName="db";

$db=new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);
if($db->connect_error)
{
    die("unable to connect database:".$db->connect_error);
}
if(isset($_POST['submit']))
{
    $username=$_POST['username'];
    $password1=$_POST['password1'];
    $email=$_POST['email'];
    $gender=$_POST['gender'];
   
    $sql="INSERT INTO data (username,password,email,gender) VALUES('$username','$password1','$email','$gender')";
    if($db->query($sql)===TRUE)
    {
       header("Location: login.php");
    }
    else
    {
        echo"not registered".$db->error;
    }
}
$db->close();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Sign in Form</title>
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
				<h1>Sign up</h1>
				<form action="http://localhost/searching/signin.php" method="POST">
				<div class="textbox">
					<i class="fa fa-user" aria-hidden="true"></i>
					<input type="text" placeholder="username" name="username" value="">
				</div>
				<div class="textbox">
					<i class="fa fa-lock" aria-hidden="true"></i>
					<input type="password" placeholder="passsword" name="passsword1" value="">
				</div>
				<div class="textbox">
					<i class="fa fa-envelope" aria-hidden="true"></i>
					<input type="email" placeholder="email" name="email" value="">
				</div>
				<div class="textbox">

					<p>GENDER</p>
					<select name="gender">
                          <option value="MALE">
                                  Male
                                  </option>
                       <option value="FEMALE">
                             Female
                               </option>
                        <option value="OTHER">
                              other
                              </option>
                                </select>
				</div>
				
				<input class="btn" type="submit" name="submit" value="Sign up">
				</form>
			</div>

		</body>
	</head>
</html>