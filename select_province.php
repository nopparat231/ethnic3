<?php include("Connect.php");?>
<?php  
	$Reg_Id =$_REQUEST["Reg_Id"];
	
 	$sql2= "SELECT * FROM  Province WHERE Region_id = '$Reg_Id' "; 
	
 	$result2 = mysqli_query($con, $sql2); 
	
	while($row2 = mysqli_fetch_array($result2)) { 
	
	echo"<option value='$row2[Province_id]'>" .$row2["Province_name"]." </option>";
	}
 
 
 ?>