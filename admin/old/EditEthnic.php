<?php include("Connect.php");?>
<form action="EditEthnic.php" method="post">
<?php

echo "<link rel='stylesheet' type='text/css' href='styleAll.css'>";
echo "<script src='https://kit.fontawesome.com/a076d05399.js'></script>";
echo "<link href='https://fonts.googleapis.com/icon?family=Material+Icons' rel='stylesheet'>";

if (isset($_POST['sub'])){
$Ethnic_id= $_POST["sub"]; 

$sql = "SELECT * FROM ethnicdata where Ethnic_id like'%".$Ethnic_id."%'" ;
			
	if($result = mysqli_query($conn,$sql)){
		if(mysqli_num_rows($result)>0){
			while($row = $result -> fetch_assoc()){	
	
?>
		<br>
        <h2 align="center">แก้ไขชาติพันธุ์</h2>
	    <hr>
		<br>
		<dd><?php 
		echo "<b>รหัสชาติพันธุ์ :&nbsp;&nbsp;&nbsp; </b><textarea name='Ethnic_id' >".$row["Ethnic_id"]."</textarea>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		echo "<b>ชื่อชาติพันธุ์ภาษาไทย : </b><textarea name='Ethnic_nameth' cols='30'>".$row["Ethnic_nameth"]."</textarea>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		echo "<b> ชื่อชาติพันธุ์ภาษาอังกฤษ : </b><textarea name='Ethnic_nameen' cols='30'>".$row["Ethnic_nameen"]."</textarea><p></p>";
        echo "<b>ประชากร (คน) : </b><textarea name='Ethnic_population'cols='30'>".$row["Ethnic_population"]."</textarea>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
        echo "<b>ภาษา : </b><textarea name='Ethnic_language'cols='70'>".$row["Ethnic_language"]."</textarea><p></p>";
		
		echo "<b>ชื่อรูปภาพ :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b><textarea name='img' cols='30'>".$row["img"]."</textarea><p></p>";
		echo "<b>ข้อมูลทั่วไป : </b><textarea name='Ethnic_history' rows='10' cols='150'>".$row["Ethnic_history"]."</textarea><p></p>";
		echo "<a href='Home.php'><button style='height:30px;margin-left:45%;'> <i class='fas fa-backspace'> กลับ</i></button></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
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

if(isset($_POST['Ethnic_id'])){
	
	
$strSQL = "update ethnicdata set Ethnic_id = '".$_POST['Ethnic_id']."'
           , Ethnic_nameth =  '".$_POST['Ethnic_nameth']."'
		   , Ethnic_nameen =  '".$_POST['Ethnic_nameen']."'
		   , Ethnic_history =  '".$_POST['Ethnic_history']."'
		   , Ethnic_language =  '".$_POST['Ethnic_language']."'
		   , Ethnic_population =  '".$_POST['Ethnic_population']."'
           , img =  '".$_POST['img']."'
		   where Ethnic_id IN ('".$_POST['Ethnic_id']."')";


if (mysqli_query($conn, $strSQL)) {
	    header("location:Home.php");
         
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

