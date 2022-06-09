<?php include("Connect.php");?>
<form action="EditCustom.php" method="post">
<?php

echo "<link rel='stylesheet' type='text/css' href='styleAll.css'>";
echo "<script src='https://kit.fontawesome.com/a076d05399.js'></script>";
echo "<link href='https://fonts.googleapis.com/icon?family=Material+Icons' rel='stylesheet'>";

if (isset($_POST['sub'])){
$Custom_id= $_POST["sub"]; 

$sql = "SELECT * FROM custom where Custom_id like'%".$Custom_id."%'" ;
			
	if($result = mysqli_query($conn,$sql)){
		if(mysqli_num_rows($result)>0){
			while($row = $result -> fetch_assoc()){	
	
?>
		<br>
        <h2 align="center">แก้ไขประเพณี</h2>
	    <hr>
		<br>
		<dd><?php 
		echo "<b>รหัสประเพณี :&nbsp;&nbsp;&nbsp; </b><textarea name='Custom_id' >".$row["Custom_id"]."</textarea>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		echo "<b>ชื่อประเพณีภาษาไทย : </b><textarea name='Custom_name' cols='30'>".$row["Custom_name"]."</textarea>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	    echo "<p></p>";
        echo "<b>รหัสชาติพันธุ์ : </b><textarea name='Custom_detail'cols='30'>".$row["Custom_detail"]."</textarea>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
        echo "<b>ช่วงเวลา: </b><textarea name='Custom_date'cols='70'>".$row["Custom_date"]."</textarea><p></p>";
		echo "<b>รายละเอียด : </b><textarea name='Ethnic_id' rows='10' cols='150'>".$row["Ethnic_id"]."</textarea><p></p>";
		echo "<a href='amcustom.php'><button style='height:30px;margin-left:45%;'> <i class='fas fa-backspace'> กลับ</i></button></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		echo "<button style='height:30px;' onclick = 'myFunction()' type='submit'><i class='fas fa-save'> บันทึก</i></button>";

		?>
<?php 	
			}
?>
<?php
	}}}
?>
</form>
<?php

if(isset($_POST['Custom_id'])){
	
	
$strSQL = "update custom set Custom_id = '".$_POST['Custom_id']."'
           , Custom_name =  '".$_POST['Custom_name']."'
		   , Custom_detail =  '".$_POST['Custom_detail']."'
		   , Custom_date =  '".$_POST['Custom_date']."'
		   , Ethnic_id =  '".$_POST['Ethnic_id']."'
		   where Custom_id IN ('".$_POST['Custom_id']."')";


if (mysqli_query($conn, $strSQL)) {
	    header("location:amcustom.php");
         
    } else {
         echo "Error: " . $strSQL . "<br>" . mysqli_error($conn);
    }
}

?>
<script>
function myFunction() {
   confirm("บันทึก\nแก้ไขเรียบร้อย");
}
</script>

