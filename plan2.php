<!DOCTYPE HTML>
<?php // line 1
ob_start();
session_start();
include("Connect.php");?>
<html>
  <head>
      <meta charset="UTF-8">
      <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Itim&display=swap">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <title>MAP</title>
      <style type="text/css">
.navbar {
  overflow: hidden;
}

.navbar a {
  float: left;
  color: white;
  text-decoration: none;
}

.dropdown {
  float: right;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 19px;  
  border: none;
  outline: none;
  color: white;
  padding: 0px 22px;
  margin-top: 20px ;
  background-color: inherit;
  font-family: inherit;
  margin-right: 20;
}

.navbar a:hover, .dropdown:hover .dropbtn {
  background-color: #FFA500;/*พื้นหลังตอนเอาเม้าไปชี้*/
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #FFA500;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: white; /*ีตัวอักษร*/
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: red; /*พื้นหลังตอนเอาเม้าไปชี้ ช้อย*/
}

.dropdown:hover .dropdown-content {
  display: block;
}
.column {
float: left;
width: 33%;
padding: 10px;
  
}

.row:after {
content: "";
display: table;
clear: both;
}

.hi{
font-size: 20px;
margin-top: 20px;
color: white;
}

html{
height:100%; 
}

body{ 
margin:0px;
height:100%; 
}

#map {
height: 600px;
width: 800px;
margin-top : 45px;
margin-left:352px;
}

ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #990000;
}

li {
  float: right;
}

li a {
  display: block;
  color: white;
  font-size: 20px;
  text-align: center;
  padding: 20px 20px;
  text-decoration: none;
}

li a:hover {
  background-color: #FFA500;
}

body,h1,h2,h3,h4,h5,h6 {
font-family: 'Itim', cursive;
}

.w3-body,.w3-hover-body:hover{
color:#990000!important;background-color:#990000!important}

body {
background-color: #FFE4B5;
}

h1 {
color: #990000;
}
h4{
text-align:left;
margin-top:-75px ;
margin-left:580px ;
}
.locat{
    float: left;
}

input[type=checkbox] {
    display:none;
  }


   input[type=checkbox]:checked + label
    {
        margin-top: -20px ;
        background: url(checked.png) no-repeat;
        height: 60px;
        width: 60px;
        display:inline-block;
        padding: 0 0 0 0px;
        background-size: 60%;
    }
 
    input[type=checkbox] + label
    {
        margin-top: -20px ;
        background: url(check.png) no-repeat;
        height: 60px;
        width: 60px;
        display:inline-block;
        padding: 20px;
        background-size: 60%;
    }
    h5{
      margin-left:-400px ;
    }
    h2{
      padding: 0.5em;
      display: inline-block;
      line-height: 1.3;
      background: #FFC778;
      vertical-align: middle;
      border-radius: 25px 25px 25px 25px;
    }
    h2:before {
      content: '●';
      color: #fff;
      margin-right: 8px;
    }
 .me1 {
    list-style-type: none;
    margin: 0;
    padding: 0;
    width: 200px;
    background-color: #f1f1f1;
}

.me2 a {
    display: block;
    color: #000;
    padding: 8px 0 8px 16px;
    text-decoration: none;
}

/* Change the link color on hover */
.me2 a:hover {
    background-color: #555;
    color: white;
}
input[type=submit]{
  background-color: #04AA6D;
  border: none;
  color: white;
  padding: 16px 32px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
  font-size: 19px;  
}
  </style>
<body  onload = "getLocation()"style="max-width:1600px">


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin: center">

<!-- Header -->
<header class="w3-display-container w3-content w3-center" style="max-width:1500px">
  <img class="w3-image" src="bg.jpg" >
  <?php
  // session_start(); 
   if(!isset($_SESSION["Email"])){
	 ?>
   <ul>
    <li><a href="login.php"><img src='login.png' width='30' height='30'>&nbspเข้าสู่ระบบ</a></li>
    <li><a href="contact.php"><img src='about.png' width='30' height='30'>&nbspเกี่ยวกับเรา</a></li>
     <li><a class="active" href="index.php"><img src='home_icon.png' width='30' height='30'>&nbspหน้าหลัก</a></li>
  </ul>
  <?php
	 }
  else{
    $strSQL = "SELECT * FROM users where Email = '".$_SESSION["Email"]."'";
    $result = mysqli_query($conn, $strSQL);
  $row = $result->fetch_assoc();
  session_write_close();
  ?>
   <ul>
   <li><div class="navbar">
    <div class="dropdown">
    <button class="dropbtn"><?php echo "<img src='profile.png' width='30' height='30'>&nbspสวัสดีคุณ ".$row["Firstname"];?><i class="fa fa-caret-down"></i>
    </button><div class="dropdown-content">
      <a href="plan.php"><img src='planicon.png' width='20' height='20'>&nbsp&nbspวางแผนการท่องเที่ยวแบบมีเงื่อนไข</a>
      <a href="plan2.php"><img src='planicon.png' width='20' height='20'>&nbsp&nbspวางแผนการท่องเที่ยวแบบจัดลำดับการท่องเที่ยว</a>
      <a href="save.php"><img src='yourlike.png' width='30' height='30'>&nbspสถานที่ที่ถูกใจ</a>
      <a href="logout.php"><img src='login.png' width='25' height='25'>&nbspออกจากระบบ</a>
  </div> 
</div></div></li>
    <li><a href="contact.php"><img src='about.png' width='30' height='30'>&nbspเกี่ยวกับเรา</a></li>
     <li><a class="active" href="index.php"><img src='home_icon.png' width='30' height='30'>&nbsp&nbspหน้าหลัก</a></li>
  </ul>
<?php
}
  ?>
  </head>
  <div class="locat"><h3><img src="icon-pin.gif" style= width:50px;height:50px;>ตำแหน่งปัจจุบันของผู้ใช้&nbsp:&nbsp<span id="demo"></span></div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
var x = document.getElementById("demo");

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {
  var latitude1 = position.coords.latitude;
  var longitude1 = position.coords.longitude;
  $.ajax({ 
                    url: "https://api.longdo.com/POIService/json/search?", 
                    dataType: "jsonp", 
                    type: "GET", 
                    contentType: "application/json", 
                    data: {
                        key: "7e3736b93742855c4af09070fffd2498",
                        lon: longitude1,
                        lat: latitude1,
                },
                success: function (results)
                {

                  var location = results.data[0].name;
                  console.log(location);
                  x.innerHTML = location;
                },
            });
}
</script>
  <?php
  /*session_start();*/
  // $n2=$_SESSION['varname'];
   $ti=$conn->query("SELECT * FROM users where Email = '".$_SESSION["Email"]."'");
   while ($row = $ti->fetch_assoc()) {
    echo "<br><br><br><br><br><h1>วางแผนการท่องเที่ยวแบบจัดลำดับการท่องเที่ยว</h1>";
    echo "  <h1>สถานที่ที่บันทึกของคุณ&nbsp".$row['Firstname']."</h1><br>";
   }

  ?>
<?php
  // save พิพิธภัณฑ์หรือสถานที่่ท่องเที่ยว

  $sql1 = "SELECT * FROM keeplocation kl join place p on kl.Location_id = p.Location_id
  where kl.Email = '".$_SESSION["Email"]."'order by p.Location_name";
  $q1 = mysqli_query( $conn, $sql1 );
  if(mysqli_num_rows($q1)){
  echo"<h2>สถานที่ท่องเที่ยวและพิพิธภัณฑ์</h2><br><br>";
  while ($f1 = mysqli_fetch_assoc($q1)){
   $nameplace1 = $f1['Location_name'];
   $id1=$f1['Location_id'];
   echo "<form action=plan2_go.php method='post' name='plandis'>";
   echo "<h5><input type='checkbox' name='like[]' value= '$id1' id= '$id1'/><label for='$id1' ></label></h5><h4>📍&nbsp".$nameplace1."</h4><br>";
  }
}
  else{

  }
// save ร้านอาหาร
  $sql2 = "SELECT * FROM keeplocation kl join foodplace fp on kl.Foodplace_id = fp.Foodplace_id
  where kl.Email = '".$_SESSION["Email"]."'order by fp.Foodplace_name";
  $q2 = mysqli_query( $conn, $sql2 );
  if(mysqli_num_rows($q2)){
    echo"<h2>ร้านอาหาร</h2><br><br>";
  while ($f2 = mysqli_fetch_assoc($q2)){
   $nameplace2 = $f2['Foodplace_name'];
   $id2= $f2['Foodplace_id'];
   echo "<form action='plan2_go.php' method='post' name='plandis'>";
   echo "<h5><input type='checkbox' name='like[]' value= '$id2' id= '$id2'/><label for='$id2' ></label></h5><h4>📍&nbsp".$nameplace2."</h4><br>";
}
}
  else{

    }
// save ร้านเสื้อผ้า
$sql3 = "SELECT * FROM keeplocation kl join clothesplace cp on kl.Clothesplace_id = cp.Clothesplace_id
  where kl.Email = '".$_SESSION["Email"]."'order by cp.Clothesplace_name";
  $q3 = mysqli_query( $conn, $sql3 );
  if(mysqli_num_rows($q3)){
    echo"<h2>ร้านเสื้อผ้า</h2><br><br>";
  while ($f3 = mysqli_fetch_assoc($q3)){
   $nameplace3 = $f3['Clothesplace_name'];
   $id3 = $f3['Clothesplace_id'];
   echo "<form action='plan2_go.php' method='post' name='plandis'>";
   echo "<h5><input type='checkbox' name='like[]' value= '$id3' id= '$id3'/><label for='$id3' ></label></h5><h4>📍&nbsp".$nameplace3."</h4><br>";
  }
}
  else{

    }
// save วัฒนธรรม
    $sql4 = "SELECT * FROM keeplocation kl join customplace cu on kl.Customplace_id = cu.Customplace_id
    join custom c on c.Custom_id = cu.Custom_id where kl.Email = '".$_SESSION["Email"]."' order by c.Custom_name";
    $q4 = mysqli_query( $conn, $sql4 );
    if(mysqli_num_rows($q4)){
    echo"<h2>ประเพณี</h2><br><br>";
    while ($f4 = mysqli_fetch_assoc($q4)){
     $nameplace4 = $f4['Custom_name'];
     $id4= $f4['Customplace_id'];
     echo "<form action='plan2_go.php' method='post' name='plandis'>";
     echo "<h5><input type='checkbox' name='like[]' value= '$id4' id= '$id4'/><label for='$id4' ></label></h5><h4>📍&nbsp".$nameplace4."</h4><br>";
    }
  }
  
    else{
  
      }
// save แหล่งที่เหลืออยู่
$sql5 = "SELECT * FROM keeplocation kl join ethnicplace ep on kl.Ethnicplace_id = ep.Ethnicplace_id
where kl.Email = '".$_SESSION["Email"]."'order by ep.Ethnicplace_name";
$q5 = mysqli_query( $conn, $sql5 );
if(mysqli_num_rows($q5)){
echo"<h2>แหล่งที่เหลืออยู่</h2><br><br>";
while ($f5 = mysqli_fetch_assoc($q5)){
 $nameplace5 = $f5['Ethnicplace_name'];
 $id5= $f5['Ethnicplace_id'];
echo "<form action='plan2_go.php' method='post' name='plandis'>";
echo "<h5><input type='checkbox' name='like[]' value= '$id5' id= '$id5'/><label for='$id5' ></label></h5><h4>📍&nbsp".$nameplace5."</h4><br>";
}
}
else{

  }
echo"<input type='submit' name='submit' value='เริ่มวางแผนการเดินทาง'>";
?>
</form>
<!-- Footer -->
<br></br>


<!-- End page content -->
</div>

<script>
// Script to open and close sidebar
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("myOverlay").style.display = "block";
}
 
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("myOverlay").style.display = "none";
}
</script>
  </body>
</html>
