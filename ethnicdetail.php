<!DOCTYPE html>
<?php include("Connect.php");?>
<html>
<head>
<title></title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Itim&display=swap">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="styleindex.css">
<style>
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

ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #990000;
}
.pi {
  float: left;
}

.pi a {
  display: block;
  color: white;
  font-size: 20px;
  text-align: center;
  padding: 20px 20px;
  text-decoration: none;
}

.pi a:hover {
  background-color: #FFA500;
}
.ci{
  color:#fff!important;background-color:#FFA500!important
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
body,h1,h2,h3,h4,h5,h6 {font-family: 'Itim', cursive;}
.w3-body,.w3-hover-body:hover{color:#990000!important;background-color:#990000!important}

body {background-color: #FFE4B5;
  font-family: 'Itim', cursive;}
    h1 {color: #990000;}
    .button {
  border: 15px;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  margin-top: 100px;
  cursor: pointer;
}
.button1 {background-color: #990000;} /* red */
  </style>
<body>
</style>

</head>
<body  style="max-width:1600px">


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin: center">

<!-- Header -->
<header class="w3-display-container w3-content w3-center" style="max-width:1500px">
  <img class="w3-image" src="bg.jpg" >
  <?php
   //session_start(); 
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
<?php

isset( $_GET['nameimg'] ) ? $n1 = $_GET['nameimg'] : $n1 = "";
$sql = "SELECT * FROM ethnicdata where img = '$n1'";
$q = mysqli_query( $conn, $sql );
    while ($f = mysqli_fetch_assoc($q)){
    echo '<h1>ชาติพันธุ์ : '.$f['Ethnic_nameth'].' ('.$f['Ethnic_nameen'].')</h1>';
}
if(isset($_SESSION["Email"])){
$_SESSION['varname'] = $n1;
}
else{
  //session_start();
  $_SESSION['varname'] = $n1;
}
?>
<ul>
  <div class="pi ci"><a href="ethnicdetail.php"><u><img src="title1.gif" style= width:70px;height:70px;>ข้อมูลทั่วไป</u></a></div>
  <div class="pi"><a href="language.php"><img src="title2.gif" style= width:70px;height:70px;>ภาษาที่ใช้</a></div>
  <div class="pi"><a href="population.php"><img src="title3.gif" style= width:70px;height:70px;>ประชากร</a></div>
  <div class="pi"><a class="active" href="map.php"><img src="title4.gif" style= width:70px;height:70px;>แผนที่</a></div>
  <div class="pi"><a class="active" href="image.php"><img src="title5.gif" style= width:70px;height:70px;>รูปภาพ</a></div>
</ul>
<?php
//ส่วนดึงข้อมูล
$sql = "SELECT * FROM ethnicdata WHERE img='$n1'";
$q = mysqli_query( $conn, $sql );
    while ($f = mysqli_fetch_assoc($q)){
      echo '<div class="w3-row w3-padding-64">
      <div class="w3-col m6 w3-padding-large w3-hide-small">
       <img src="images/' .$f['img']. '"class="w3-round w3-image w3-opacity-min" width="600" height="700">
      </div>';
    echo '<div class="w3-col m6 w3-padding-large">
    <h2><class="w3-center">➢&nbspข้อมูลทั่วไป<img src="book.gif" style= width:100px;height:100px;></h2>';
    echo '<h3 class="w3-large">'.$f["Ethnic_history"].'</h3></div><div>';
}
?>
<button class="button button1" onclick="goBack()">ย้อนกลับ</button>
<script>
        function goBack() {
            window.history.back();
        }
    </script>

<!-- Footer -->
<br><br><br><br>
  <div class="w3-body w3-center w3-padding-24">Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-opacity"></a></div>

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



