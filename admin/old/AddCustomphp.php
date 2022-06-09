<?php include("Connect.php");?>
<?php
if (isset($_POST['Custom_id'])){
$Custom_id = $_POST["Custom_id"]; 
$Custom_name = $_POST["Custom_name"]; 
$Custom_detail = $_POST["Custom_detail"]; 
$Custom_date = $_POST["Custom_date"]; 
$Ethnic_id = $_POST["Ethnic_id"]; 



$strSQL = "INSERT INTO custom
		   values ('".$Custom_id."','".$Custom_name."','".$Custom_detail."',
		           '".$Custom_date."','".$Ethnic_id."')";

if (mysqli_query($conn, $strSQL)) {
?>
<script>
  alert("เพิ่มประเพณี\nบันทึกเรียบร้อย");
</script>
<?php     
  
    } else {
         echo "Error: " . $strSQL . "<br>" . mysqli_error($conn);
    }
}
?>