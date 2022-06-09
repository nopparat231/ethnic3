<?php include("Connect.php");?>
<html>
<title>Map Title</Title></title>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Itim&display=swap">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
body {
  margin: 0;
  /*font-family: 'Roboto Mono', monospace;*/
  font-family: 'Itim', cursive;
}
.box{   
      width: auto; 
      height: auto;
	  object-fit:cover;
	  
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

.mySlides {display:none}

p.b {
  font-family: 'Roboto Mono', monospace;
}

#container {
  display: flex;
  justify-content: center;
  height: 100%;
}
#container2 {
  display: flex;
  justify-content: center;
  height: 100%;
}
.img0 {
  width: 350px; 
  height: 330px;
}
.img1 {
  width: 360px; 
  height: 340px;
}
.box {
  width: 50%;
  height: 70%;
  line-height: 50px;
  text-align: center;
  margin: auto;
  justify-content: space-around;
}
.box2 {
  width: 50%;
  height: 70%;
  line-height: 50px;
  text-align: center;
  margin-top: -200;
  margin-left: auto;
  justify-content: space-around;
}
body {background-color: #FFE4B5;}
    h1 {color: #990000;
      font-family: 'Itim', cursive;}
    .w3-body,.w3-hover-body:hover{color:#990000!important;background-color:#990000!important}
    
  .button {
  border: 15px;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  margin-top:-400;
  cursor: pointer;
}
.button1 {background-color: #990000;} /* red */
</style>
</head>
<body>
<div class = "box1" >
<body  >
</div>
<!-- Header -->
<header class="w3-display-container w3-content w3-center" style="max-width:1500px">
  <img class="w3-image" src="bg.jpg" >
  <?php
  //  session_start(); 
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

<?php
//session_start();
$n2=$_SESSION['varname'];
$sql = "SELECT * FROM ethnicdata WHERE img='$n2'";
$q = mysqli_query( $conn, $sql );
    while ($f = mysqli_fetch_assoc($q)){
    echo '<h1>แผนที่ชาติพันธุ์ : '.$f['Ethnic_nameth'].' ('.$f['Ethnic_nameen'].')</h1>';
}
?>

<div id="container">
<div class="box"><a href = "ethnicplace.php" ><img class = "img0" src="icon1.png"></a>
</div>
<div class="box"><a href = "place.php" ><img class = "img0" src="icon2.png" ></a>
</div>
<div class="box"><a href = "food.php" ><img class = "img0" src="icon3.png" ></a>
</div>
</div>
<div id="container2">
<div class="box2"><a href = "clothes.php" ><img class = "img1" src="icon4.png" ></a>
</div>
<div class="box2"><a href = "custom.php" ><img class = "img1" src="icon5.png" ></a>
</div>
</div>
<button class="button button1" onclick="goBack()">ย้อนกลับ</button>
<script>
        function goBack() {
            window.history.back();
        }
    </script>
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


