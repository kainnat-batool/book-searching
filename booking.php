<?php
if (isset($_POST['SEARCH']))
{
	$booktitle=$_POST['booktitle'];
	$asc_query="SELECT *FROM data ORDER by booktitle ASC";
	$binarydata=array(executeQuery($asc_query));
	$low=0;
	$high=count($binarydata)-1;
	$result=binarysearch($binarydata,$booktitle,$low,$high);

}
function excuteQuery($query)
{
	$connect= mysqli_connect("localhost","root","","bookdata");
	$result=mysqli_query($connect,$query);
	return $result;
}
function binarysearch($binarydata,$booktitle,$low,$high)
{
	$connect=mysqli_connect("localhost","root","","bookdata");
	if($high<$low)
	{
	return false;
	}
	$middle=ceil((($low+$high)/2));
	if($binarydata[$middle]>$booktitle)
	{
		return binarysearch($binarydata,$booktitle,$low,($middle-1));
	}
	else if($binarydata[$middle]<$booktitle)
	{
		return binarysearch($binarydata,$booktitle,($middle+1),$high);
	}
	else
	{
		return $binarydata[$middle];
	}
}
?>
<!DOCTYPE>
<html>

<head>
	<title> SEARCHING </title>
</head>

<body>
	<form action="" method="POST">
		Booktitle:<input type="text" name="booktitle"><br><br>
		<button type="submit" name="submit" value="submit">search</button>
	</form>
	<?php
	$dbHost = 'localhost';
	$dbUsername = 'root';
	$dbPassword = '';
	$dbName = 'bookdata';
	//Create connection and select DB
	$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
	if ($conn->connect_error) {
		die("Unable to connect database: " . $db->connect_error);
	}
	if (isset($_POST['submit'])) {
		$title = $_POST['booktitle'];
		$sql = "SELECT * FROM data WHERE booktitle = '$title'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			echo "<table> <tr>
			<br>
			<th>rack-no</th>
			<th>author_name</th>
			<th>pages</th>
			<tr>";
			while ($row = $result->fetch_assoc()) {
				//echo "<tr><td>" . $row["id"] . "</td><td>" . $row["rank_no"] . "</td><td>" . $row["author_name"] . "</td><td> ";
				// echo $row["id"] . "<br>" . $row["rank_no"] . "<br>" . $row["author_name"] . "<br>";
			}
		} else {
			echo "0 results found";
		}
	}
	$conn->close()
	?>
</body>

</html>
