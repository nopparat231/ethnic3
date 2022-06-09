<meta charset="utf-8">
<script type="text/javascript" src="jquery.min.js"> </script>

<script>
    $(document).ready(function(){  //
    $("#region").change(function(){  //
		 
    $.ajax({
    url: "select_province.php", //ทำงานกับไฟล์นี้
    data: "Reg_Id=" + $("#region").val(),  //ส่งตัวแปร
    type: "POST",
    async:false,
    success: function(data, status) {
		$("#province").html(data);
		 
	},
	
    error: function(xhr, status, exception) { alert(status); }
	
    });
	//return flag;
    });
    });
</script>
<?php
	//1. conection: 
include("Connect.php");
$sql= "SELECT * FROM  region" or die("Error:" . mysqli_error()); 
//3. execute the query. 
$result = mysqli_query($con, $sql); 
	echo"ภาค : <select id='region'>";
	while($row = mysqli_fetch_array($result)){
		echo"<option value='$row['Region_id']'>".$row["Region_name"]."</option>";
	}
	echo"</select>";
	
	//จังหวัด 
	$sql= "SELECT * FROM  province WHERE Region_id='1'" or die("Error:" . mysqli_error()); 
//3. execute the query. 

$result = mysqli_query($con, $sql); 
	echo"จังหวัด : <select id='province'>";
	while($row = mysqli_fetch_array($result)){
		echo"<option value='$row['Province_id']>" .$row["Province_name"]." </option>";
	}
	echo"</select>";
	
	mysqli_close($con);
	
	
	
?>