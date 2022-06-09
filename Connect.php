<?php
session_start();
// session_start ควรอยู่บนสุด
$hostname_db = "localhost";
$userid_db = "root";
$userpwd_db = "2411";
$db_name = "ethnics";
$conn = mysqli_connect($hostname_db, $userid_db, $userpwd_db, $db_name);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} 
else {echo "";}
?>