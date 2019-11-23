<?php
if(isset($_POST['Search']))
{
$booktitle=$_POST['booktitle'];
$asc_query="SELECT * FROM data ORDER by booktitle ASC";
$binarydata=array(executeQuery($asc_query));	
$low=0;
$high=count($binarydata)-1;
$result=binarysearch($binarydata,$booktitle,$low,$high); 
}
function executeQuery($query)
{
	$connect=mysqli_connect("localhost","root","","bookdata");
	$result=mysqli_query($connect,$query);
	return $result;
}
function binarysearch($binarydata,$booktitle,$low,$high)
{
    $connect=mysqli_connect("localhost","root","","bookdata");
	if ($high < $low) {
		return false;
	}
	$middle = ceil((($low + $high) / 2));
	if ($binarydata[$middle] > $booktitle) {
		return binarysearch($binarydata, $booktitle, $low, ($middle - 1));
	}
	else if ($binarydata[$middle] < $booktitle) {	
		return binarysearch($binarydata, $booktitle, ($middle + 1), $high);
	}
	else {
		return $binarydata[$middle];
}
?>

<!DOCTYPE html>
<html>

<head>
	<title>SEARCH PAGE</title>
	
</head>

<body>

		<form action="http://localhost/booki/book.php" method="POST">
			Booktitle:<input type="text" name="booktitle"><br><br>
<input type="submit" name="Search" value="Find"><br><br>
	<?php while($row=mysqli_fetch_array($result)):?>
	<tr>
		<td><?php echo $row[0];?><br></td>
		<td><?php echo $row[1];?><br></td>
		<td><?php echo $row[2];?><br></td>
		<td><?php echo $row[3];?><br></td>
		<td><?php echo $row[4];?><br></td>
	</tr>
	<?php endwhile; ?>	
		</form>
</body>

</html>