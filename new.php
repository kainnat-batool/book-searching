<?php
$datas = array();
$a = 0;

$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'db';
//Create connection and select DB
$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
if ($conn->connect_error) {
    die("Unable to connect database: " . $db->connect_error);
}
$query = "SELECT * FROM db";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $datas[] = $row['title'];
    }
    // echo "data stored\n";
}

if (isset($_POST['SEARCH'])) {
    // echo "into search section";
    $se = $_POST['booktitle'];
    function binarySearch($arr, $x)
    {
        if (count($arr) === 0) return false;
        $low = 0;
        $high = count($arr) - 1;

        while ($low <= $high) {
            // compute middle index 
            $mid = floor(($low + $high) / 2);
            // element found at mid 
            if (($arr[$mid]) == $x) {
                $a = $mid;
                return true;
            }

            if ($x < ($arr[$mid])) {
                // search the left side of the array 
                $high = $mid - 1;
            } else {
                // search the right side of the array 
                $low = $mid + 1;
            }
        }
        if (($high) == $x) {
            $a = $mid;
            return true;
        }
        return false;
    }
    if (binarySearch($datas, $se) == true) {
        echo $se . " Exists";?> <br> <?php
        $query = "SELECT * FROM db where title = '$se' ";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                print_r($row);
            }
        }
    } else {
        echo $se . " Doesnt Exist";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>SEARCH PAGE</title>
</head>

<body>
    <form action="" method="POST">
        Booktitle:<input type="text" name="booktitle"><br><br>
        <input type="submit" name="SEARCH" value="SEARCH"><br><br>
    </form>
</body>

</html>