<?php include("Connect.php");?>
<html>
<head>
<title>Training System</title>
<meta name="viewport" content="width=device-width, initial-scale=1" charset="UTF-8">
<link href='https://fonts.googleapis.com/icon?family=Material+Icons' rel='stylesheet'>
<link rel="stylesheet" type="text/css" href="styleAll.css">
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<style>
@import url('https://fonts.googleapis.com/css2?family=Sarabun:wght@300&display=swap');
</style>
</head>
<body>
<div>
 <?php 
//      session_start(); 
// 	 if($_SESSION["id_admin"] == ""){
// 	    header("location:index.php");
// 		exit();
// 	 }
// 	 $strSQL = "SELECT * FROM admin where id_admin = '".$_SESSION["id_admin"]."'";
//      $result = mysqli_query($conn, $strSQL);
// 	 $row = $result->fetch_assoc();
// 	 session_write_close();
?>

<!-- <font class="above"><B>ฐานข้อมูลชาติพันธุ์</font></B>
<a href="logout.php"><button class="i">Logout</button></a>
<font class = "r"><i class='fas fa-chalkboard-teacher'>
   <?php 
//echo "Admin ID : ".$row["id_admin"];?>
</i></font>
</div>
<p></p>  -->

<div class="tab">
  <button class="tablinks" ><i class='fas fa-home'> ชาติพันธุ์</i></button>
  <a href="amcustom.php"><button class="tablinks"><i class='fas fa-book'>  ประเพณี</i></button></a>
  <a href="course2.php"><button class="tablinks"><i class='fas fa-book'>  อาหาร</i></button></a>
  <a href="Pluscourse.php"><button class="tablinks"><i class='fas fa-book'> เสื้อผ้า</i></button></a>
  <a href="plus.php"><button class="tablinks"><i class='fas fa-book'> สถานที่</i></button></a>
  <a href="plus.php"><button class="tablinks"><i class='fas fa-book'>  ประเพณี</i></button></a>
</div>

<div id="AddCustom" class="tabcontent" style="overflow-y:auto;">
	
<form action="AddCustom.php" method="post">
    <h1>เพิ่มประเพณี</h1>
    <p>กรุณากรอกรายละเอียดประเพณี</p>
	

	<label for="Custom_id"><b>รหัสประเพณี</b></label>
	<br></br>
    <input type="text" placeholder="C00001" name="Custom_id" required>
    <br></br>

	<label for="Custom_name"><b>ชื่อประเพณี</b></label>
	<br></br>
    <input type="text" placeholder="ประเพณีข้าวห่อกะเหรี่ยง" name="Custom_name" required>
    <br></br>

    <label for="Custom_detail"><b> รายละเอียดประเพณี</b></label>
	<br></br>
    <textarea name="Custom_detail" rows='10' cols='100'></textarea>
	<br></br>

	<label for="Custom_date"><b>ช่วงเวลา</b></label>
	<br></br>
    <textarea name="Custom_date" cols='50'></textarea>
	<br></br>

	<label for="Ethnic_id"><b>Ethnic_id</b></label>
	<br></br>
    <textarea name="Ethnic_id" placeholder="E06" cols='30'></textarea>
	<br></br>



    <label style="color:red;"><b>**กรุณาตรวจสอบข้อมูลก่อนกดบันทึก</b></label><br></br>
     <button style="height:30px; type="submit" ><i class='fas fa-save'> บันทึก</i></button>
</form>
<?php include("AddCustomphp.php");?>
</div>

<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace("active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

function my_fun(str) {

	if (window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();
	} else{
		xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
	}

	xmlhttp.onreadystatechange= function(){
		if (this.readyState==4 && this.status==200) {
			document.getElementById('poll').innerHTML = this.responseText;
		}
	}
	xmlhttp.open("GET","helper.php?value="+str, true);
	xmlhttp.send();
}

document.getElementById("defaultOpen").click();
</script>


</body>
</html>