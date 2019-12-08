<?php
$datas = array();
$a = 0;

$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'bookdata';
//Create connection and select DB
$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
if ($conn->connect_error) {
    die("Unable to connect database: " . $db->connect_error);
}
$query = "SELECT * FROM bookdt";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $datas[] = $row['booktitle'];
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
        echo $se . " Exists";
    }
      else {
        echo $se . " Doesnt Exist";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>SEARCH PAGE</title>
    <link rel="stylesheet" href="style11.css">

<body text="white">
    <div class="login-box">
    <h1>Book Searching</h1>
    <form action="" method="POST">
        <div class="textbox">
            <i class="fa fa-book" aria-hidden="true"></i>   
        Booktitle:<input type="text" name="booktitle"><br><br>
        </div>
        <input class="btn" type="submit" name="SEARCH" value="SEARCH"><br><br>
        <table align="left" border="1px" style="width=50%;">
            <tr>
            <th>Id</th>
            <th>rackno</th>
            <th>booktitle</th>
            <th>bookauthor</th>
            <th>pages</th>
        </tr>
        <?php
           $query = "SELECT * FROM bookdt where booktitle = '$se' ";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            while ($rows = mysqli_fetch_assoc($result)) {
               ?>
            <tr>
            <td><?php echo $rows['id']?></td>
            <td><?php echo $rows['rackno']?></td>
            <td><?php echo $rows['booktitle']?></td>
            <td><?php echo $rows['bookauthor']?></td>
            <td><?php echo $rows['pages']?></td>
            </tr>
            <?php
            }
        }
        ?>
    </table>
    </div>
    </form>
</body>
</head>
</html>