<?php include("Connect.php");?>
<?php 

$deleted = $_POST["submit"];
echo $deleted;
$sql = "DELETE FROM ethnicdata WHERE Ethnic_id ='$deleted'";
if (mysqli_query($conn, $sql)== TRUE) {
    echo "<script>alert('ลบสำเร็จ')</script>";
header("location:Home.php");
    
 
  } else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>

  