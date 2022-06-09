<?php include("Connect.php");?>
<html>
<head>
<meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <title>เว็บไซต์วางแผนการท่องเที่ยวเชิงวัฒนธรรมจากฐานความรู้ชาติพันธุ์ในประเทศไทย</title>
<meta name="viewport" content="width=device-width, initial-scale=1" charset="UTF-8">
<link href='https://fonts.googleapis.com/icon?family=Material+Icons' rel='stylesheet'>
<link rel="stylesheet" type="text/css" href="styleAll.css">
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<style>
@import url('https://fonts.googleapis.com/css2?family=Sarabun:wght@300&display=swap');

.search{
  float: right;
}
</style>
</head>
<body>
<div>
<?php 
  //    session_start(); 
	//  if($_SESSION["id_admin"] == ""){
	//     header("location:index.php");
	// 	exit();
	//  }
	//  $strSQL = "SELECT * FROM admin where id_admin = '".$_SESSION["id_admin"]."'";
  //    $result = mysqli_query($conn, $strSQL);
	//  $row = $result->fetch_assoc();
	//  session_write_close();
?>

<!-- <font class="above"><B>ฐานข้อมูลชาติพันธุ์</font></B>
<a href="logout.php"><button class="i">Logout</button></a>
<font class = "r"><i class='fas fa-chalkboard-teacher'> <?php echo "Admin ID : ".$row["id_admin"];?></i></font>
</div>
<p></p> -->


<font class="above"><B>ฐานข้อมูลชาติพันธุ์</font></B>
</div>
<p></p>

<div class="tab">
  
<a href="Home.php"><button class="tablinks"><i class='fas fa-home'> ชาติพันธุ์</i></button>
<button class="tablinks"><i class='fas fa-book'>  ประเพณี</i></button></a>
  <a href="amfood.php"><button class="tablinks"><i class='fas fa-book'>  อาหาร</i></button></a>
  <a href="amclothes.php"><button class="tablinks"><i class='fas fa-book'> เสื้อผ้า</i></button></a>
  <a href="amallplace.php"><button class="tablinks"><i class='fas fa-book'> สถานที่</i></button></a>
  <button class="tablinks" id="defaultOpen"><i class='fas fa-book'>  ประเพณี</i></button>
</div>

<div id="amcustom" class="tabcontent" > 
<div class="container">
            <div class="row">
                <div class="col-md-12"> <br>
                    <h3>รายการประเพณี <a href="AddCustom.php" class="btn btn-info">+เพิ่มข้อมูล</a> </h3>
          <div class="search"><form action="emp.php" method="post">
ค้นหา <input type="text"  name="text"  >
<button style='height:30px' type='submit' name='submit' value='ค้นหา' ><i class="fa fa-search"> ค้นหา</i></button></div>
</form>
                    <table class="table table-striped  table-hover table-responsive table-bordered">
                        <thead>
                            <tr>
                                <th width="5%">Custom_id</th>
                                <th width="20%">ชื่อประเพณี</th>
                                <th width="45%">รายละเอียด</th>
                                <th width="45%">ช่วงเวลา</th>
                                <th width="10%">Ethnic_id</th>                            
                                <th width="5%">แก้ไข</th>
                                <th width="5%">ลบ</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $sql1 = "SELECT * FROM custom";
                        $q1 = mysqli_query( $conn, $sql1 );          
                         while($row = mysqli_fetch_array($q1)) {
                            echo"<tr>";
                                echo"<td>".$row['Custom_id']."</td>";
                                echo "<td>".$row['Custom_name']."</td>";
                                echo "<td>".$row['Custom_detail']."</td>";
                                echo "<td>".$row['Custom_date']."</td>";
                                echo"<td>".$row['Ethnic_id']."</td>";
                                echo'<td><form action="EditCustom.php" method="post"><button type ="submit" name="sub" value ='.$row['Custom_id'].'>แก้ไข</form></td>';
                                echo'<form action="del_custom.php" method="post"><td><button type="submit" onClick=onclick = "myFunction()" name="submit" value ='.$row['Custom_id'].'>ลบ</td></form>';
                            echo"</tr>";
                          }
            echo"</tbody>";
                    echo "</table>";
            echo"</div>";
            echo"</div>";
        echo"</div>";
        ?>  
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