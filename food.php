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
  width: 30%;
  padding: 10px;
  height: 500px; 
  margin-left: 30px;
  overflow: auto;
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
body,h1,h2,h3,h4,h5,h6 {font-family: 'Itim', cursive;}
.w3-body,.w3-hover-body:hover{color:#990000!important;background-color:#990000!important}

body {background-color: #FFE4B5; }
    h1 {color: #990000; text-align: center;}
    h2 {color: #990000; text-align: left; margin-left: 60px; margin-top: 40px; border:}
    h3 {color: #990000; text-align: left; margin-left: 60px;}
    * {
  box-sizing: border-box;
}
.button {
  border: 15px;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  height: 60px;
  width: 120px;
  margin-top: 20px;
}
.button1 {background-color: #990000;} /* red */
.button2 {background-color: #CC3333;}
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
<div class="row">
<?php
//session_start();
$n2=$_SESSION['varname'];
$sql = "SELECT * FROM ethnicdata WHERE img='$n2'";
$q = mysqli_query( $conn, $sql );
    while ($f = mysqli_fetch_assoc($q)){
    echo '<h1>อาหาร : '.$f['Ethnic_nameth'].' ( '.$f['Ethnic_nameen'].')'.'</h1><br>';
}

$sql2 = "SELECT * FROM food f join foodtype ft on f.Foodtype_id = ft.Foodtype_id 
join ethnicdata e on e.Ethnic_id = f.Ethnic_id WHERE img='$n2' and f.Foodtype_id = 'FT1'";
$q2 = mysqli_query( $conn, $sql2 );
    echo '<div class="column" style = "background-color:#FFCFCF;"><h1>&nbspอาหาร&nbsp<img src="fo.png" width="80" height="80"></h1>';
if(mysqli_num_rows($q2)){
while ($f = mysqli_fetch_assoc($q2)){
    echo '<h3>🍲&nbsp'.$f['Food_name'].'</h3>';
    }
    // echo '</div>'; //<img src="fo.png" width="250" height="250">
  }
  else{
    echo'<h3>ไม่มีรายการแสดง</h3>';
  } 
  echo '</div>';
$sql2 = "SELECT * FROM food f join foodtype ft on f.Foodtype_id = ft.Foodtype_id 
join ethnicdata e on e.Ethnic_id = f.Ethnic_id WHERE img='$n2' and f.Foodtype_id = 'FT2'";
    $q2 = mysqli_query( $conn, $sql2 );
        echo '<div class="column" style = "background-color:#FFC77A;"><h1>&nbspขนมหวาน&nbsp<img src="de.png" width="80" height="80"></h1>';
        if(mysqli_num_rows($q2)){
        while ($f = mysqli_fetch_assoc($q2)){
        echo '<h3>🍮&nbsp'.$f['Food_name'].'</h3>';
        }
        // echo '</div>'; //<br><br><img src="de.png" width="250" height="250">
      }
      else{
        echo'<h3>ไม่มีรายการแสดง</h3>';
      } 
      echo '</div>';
        $sql2 = "SELECT * FROM food f join foodtype ft on f.Foodtype_id = ft.Foodtype_id 
        join ethnicdata e on e.Ethnic_id = f.Ethnic_id WHERE img='$n2' and f.Foodtype_id = 'FT3'";
        $q2 = mysqli_query( $conn, $sql2 );
                echo '<div class="column" style = "background-color:#D0E7A3;"><h1>&nbspเครื่องดื่ม&nbsp<img src="dr.png" width="80" height="80"></h1>';
                if(mysqli_num_rows($q2)){
                while ($f = mysqli_fetch_assoc($q2)){
                echo '<h3>☕️&nbsp'.$f['Food_name'].'</h3>';
                }
        // echo '</div>'; //<br><br><br><img src="dr.png" width="250" height="250">
      }
      else{
        echo'<h3>ไม่มีรายการแสดง</h3>';
      }
      echo '</div>'; 
?>
</div>
<br><br><br>
<button class="button button1" onclick="goBack()">ย้อนกลับ</button>
<a href="foodmap.php"><input class ="button button2" type="button" name= "foodmap" value="แผนที่"></a>
<script>
        function goBack() {
            window.history.back();
        }
    </script>
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

