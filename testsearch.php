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
<style>

.search{
  float: right;
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
body,h1,h2,h3,h4,h5,h6 {font-family: 'Itim', cursive}
.w3-body,.w3-hover-body:hover{color:#990000!important;background-color:#990000!important}

.topnav {
  overflow: hidden;
  background-color: #0000;
}

.topnav a {
  float: left;
  display: block;
  color: black;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #;
  color: white;
}

.topnav .search-container {
  float: right;
}

.topnav input[type=text] {
  padding: 6px;
  margin-top: 8px;
  font-size: 17px;
  border: none;
}

.topnav .search-container button {
  float: right;
  padding: 6px 10px;
  margin-top: 8px;
  margin-right: 16px;
  background: #ddd;
  font-size: 17px;
  border: none;
  cursor: pointer;
}
.topnav .search-container button:hover {
  background: #ccc;
}
body {background-color: #FFE4B5;}
    h1 {color: #990000;}

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
  </style>
<body>

</style>

</head>
<body style="max-width:1600px">


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin: center">

<!-- Header -->
<header class="w3-display-container w3-content w3-center" style="max-width:1500px">
  <img class="w3-image" src="bg.jpg" >
  <?php
  //  session_start(); 
   if(!isset($_SESSION["Email"])){?>
   <ul>
    <li><a href="login.php">เข้าสู่ระบบ</a></li>
    <li><a href="contact.php">เกี่ยวกับเรา</a></li>
     <li><a class="active" href="index.php">หน้าหลัก</a></li>
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
    <button class="dropbtn"><?php echo "สวัสดีคุณ ".$row["Firstname"];?><i class="fa fa-caret-down"></i>
    </button><div class="dropdown-content">
      <a href="plan.php">วางแผนการท่องเที่ยวแบบมีเงื่อนไข</a>
      <a href="#">วางแผนการท่องเที่ยวแบบจัดลำดับการท่องเที่ยว</a>
      <a href="logout.php">ออกจากระบบ</a>
  </div> 
</div></div></li>
    <li><a href="contact.php">เกี่ยวกับเรา</a></li>
     <li><a class="active" href="index.php">หน้าหลัก</a></li>
  </ul>
<?php
}
  ?>

<form action="<?=$_SERVER['SCRIPT_NAME'];?>" method="post">
<?php 
$ethnic = $conn->query("SELECT * from ethnicdata"); 
echo '<div class="search">ค้นหา:&nbsp&nbsp<input type="text" name="search" placeholder="Search..">';
    ?>
    <button style='height:32px' type='submit'><i class="search fa fa-search"></i></button></div>
</form>

<br>
<br><br>
<h1><b>กลุ่มชาติพันธุ์</b></h1>
  <!-- First Photo Grid-->
<?php
if(isset($_POST['search'])){
$keyword = ($_POST['search']);
$sql0 = "SELECT distinct e.Ethnic_nameth,e.Ethnic_nameen,e.img,e.Ethnic_id FROM ethnicdata e left join ethnicplace ep on e.Ethnic_id = ep.Ethnic_id left join province p on p.Province_id = ep.Province_id where e.Ethnic_nameth like '%".$keyword."%' or p.Province_name like '%".$keyword."%' or e.Ethnic_nameen like '%".$keyword."%'";
$q0 = mysqli_query( $conn, $sql0 );
$c= 1;
    while ($f0 = mysqli_fetch_assoc($q0)){
          $img0 = $f0['img'];
          
        echo '<div class="row">
        <div class="column">
        <a href="ethnicdetail.php?nameimg='.$img0.'"><img src="images/' . $f0['img'] . '" style="height:300px;width:400px;padding:8px;" style="width:100%"></a>
          <div class="w3-container w3-white">
            <h4><b>'.$f0['Ethnic_nameth'].'</b></h4>
            <p>'.$f0['Ethnic_nameen'].'</p>
          </div>
        </div>';
}
  }
  else{
  $sql = "SELECT * FROM ethnicdata where Ethnic_id like 'E1%'";
  $q = mysqli_query( $conn, $sql );
  $c= 1;
      while ($f = mysqli_fetch_assoc($q)){
        $img = $f['img'];
        
      echo '<div class="row">
      <div class="column">
      <a href="ethnicdetail.php?nameimg='.$img.'"><img src="images/' . $f['img'] . '" style="height:300px;width:400px;padding:8px;" style="width:100%"></a>
        <div class="w3-container w3-white">
          <h4><b>'.$f['Ethnic_nameth'].'</b></h4>
          <p>'.$f['Ethnic_nameen'].'</p>
        </div>
      </div>';
      $c++;
      if($c>=10){
        break;
      }
    } 
  }
?>


<!-- Pagination -->
<div class="w3-center w3-padding-32">
    <div class="w3-bar" style="margin-left: 990px">
      <a href="index.php" class="w3-bar-item w3-button w3-hover-black">«</a>
      <a href="index.php" class="w3-bar-item w3-button w3-hover-black">1</a>
      <a href="index2.php" class="w3-bar-item w3-black w3-button">2</a>
      <a href="index3.php" class="w3-bar-item w3-button w3-hover-black">3</a>
      <a href="index4.php" class="w3-bar-item w3-button w3-hover-black">4</a>
      <a href="index5.php" class="w3-bar-item w3-button w3-hover-black">5</a>
      <a href="index6.php" class="w3-bar-item w3-button w3-hover-black">6</a>
      <a href="index7.php" class="w3-bar-item w3-button w3-hover-black">7</a>
      <a href="index8.php" class="w3-bar-item w3-button w3-hover-black">8</a>
      <a href="index9.php" class="w3-bar-item w3-button w3-hover-black">9</a>
      <a href="index9.php" class="w3-bar-item w3-button w3-hover-black">»</a>
    </div>
  </div>

<!-- Footer -->
  

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

