<?php include("Connect.php");?>
<?php
if (isset($_POST['Ethnic_id'])){
$Ethnic_id = $_POST["Ethnic_id"]; 
$Ethnic_nameth = $_POST["Ethnic_nameth"]; 
$Ethnic_nameen = $_POST["Ethnic_nameen"]; 
$Ethnic_history = $_POST["Ethnic_history"]; 
$Ethnic_language = $_POST["Ethnic_language"]; 
$Ethnic_population = $_POST["Ethnic_population"]; 
$img = $_POST["img"]; 



$strSQL = "INSERT INTO ethnicdata 
		   values ('".$Ethnic_id."','".$Ethnic_nameth."','".$Ethnic_nameen."',
		           '".$Ethnic_history."','".$Ethnic_language."','".$Ethnic_population."','".$img."')";

if (mysqli_query($conn, $strSQL)) {
?>
<script>
  alert("เพิ่มชาติพันธุ์\nบันทึกเรียบร้อย");
</script>
<?php     
  
    } else {
         echo "Error: " . $strSQL . "<br>" . mysqli_error($conn);
    }
}
?>