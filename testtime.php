<!DOCTYPE html>
<html>
<head>
<body>
<?php include("Connect.php");?>
<?php
$timestart = $_POST['start'];
$timeend = $_POST['end'];
settype($timestart, "double"); 
settype($timeend, "double");
$sql = "SELECT * FROM timetest WHERE start <= $timeend and $timestart <end";
$q = mysqli_query( $conn, $sql );
    while ($f = mysqli_fetch_assoc($q)){
    echo $f['place_name']."<br>";
}
?>
</body>
</head>
</html>