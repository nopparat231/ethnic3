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

input[type=checkbox] {
    display:none;
  }


   input[type=checkbox]:checked + label
    {
        margin-top: -20px ;
        background: url(like.jpg) no-repeat;
        height: 60px;
        width: 60px;
        display:inline-block;
        padding: 0 0 0 0px;
        background-size: 60%;
    }
 
    input[type=checkbox] + label
    {
        margin-top: -20px ;
        background: url(unlike.jpg) no-repeat;
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
  input[type=submit]{
  background-color: #990000;
  border: none;
  color: white;
  padding: 16px 32px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
  font-size: 16px;  
}
.button1 {background-color: #CC3333;
  border: none;
  color: white;
  padding: 16px 32px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
  font-size: 16px;  

}
  </style>
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

<script type="text/javascript" src="https://api.longdo.com/map/?key=7e3736b93742855c4af09070fffd2498"></script>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <script>
          function init() {
          map = new longdo.Map({
            placeholder: document.getElementById('map')
          });
          map.Ui.DPad.visible(true);
          map.Ui.Zoombar.visible(true);
          map.Ui.Geolocation.visible(true);
          map.Ui.Toolbar.visible(true);
          map.Ui.LayerSelector.visible(true);
          map.Ui.Fullscreen.visible(true);
          map.Ui.Crosshair.visible(true);
          map.Ui.Scale.visible(true);
          var TagPanel1 = new longdo.TagPanel();
          map.Ui.add(TagPanel1);
          var TagPanel2 = new longdo.TagPanel({ tag: ['temple', 'sizzler'] });
          map.Ui.add(TagPanel2);
          selectLocation();
        }
        function selectLocation(){
          $.ajax({
            type:"POST",
            url:"ethnicplacemap.php"
          }).done(function(text){
          var json=$.parseJSON(text);
            for(var i=0; i<json.length; i++){
              var lat1 = json[i].lat;
              var lon1 = json[i].lon;
              var detail = json[i].detail;
              var name = json[i].name;
              //  alert(lat1+" "+lon1+" "+name1);
          var marker1 = new longdo.Marker({ lon: lon1, lat: lat1 },
          {
          title: name,
          icon: {
          url: 'https://map.longdo.com/mmmap/images/pin_mark.png',
          offset: { x: 18, y: 21 }
          },
          detail: "&#128221 "+detail,
          visibleRange: { min: 0, max: 100 },
          draggable: false,
          weight: longdo.OverlayWeight.Top,
          });
          map.Overlays.add(marker1);
      }
            }
          );}

      </script>
  </head>
  
  <?php
  /*session_start();*/
   $n2=$_SESSION['varname'];
   $ti=$conn->query("SELECT Ethnic_nameth FROM ethnicdata WHERE img='$n2'");
   while ($row = $ti->fetch_assoc()) {
    $name = $row['Ethnic_nameth'];
    echo "  <h1>แหล่งที่เหลืออยู่ของชาติพันธุ์&nbsp:&nbsp$name</h1>";
   }

  
  ?>
  <body onload="init();">
  <div id="map"></div>
</script>
<?php
  $sql = "SELECT DISTINCT ep.Province_id, p.Province_name FROM ethnicplace ep join province p on ep.Province_id = p.Province_id join ethnicdata e 
  on  ep.Ethnic_id = e.Ethnic_id where e.img ='$n2' order by p.Province_name";
  $q = mysqli_query( $conn, $sql );
  while ($f = mysqli_fetch_assoc($q)){
   $pv = $f['Province_name'];
   $id = $f['Province_id'];
   echo "<br>";
   echo "<h2>".$pv."</h2><br>";


   $sql2 = "SELECT *  FROM ethnicplace ep join ethnicdata e on ep.Ethnic_id = e.Ethnic_id where ep.Province_id='$id'and e.img='$n2' order by Ethnicplace_detail";
   $q2 = mysqli_query( $conn, $sql2 );
   while ($f2 = mysqli_fetch_assoc($q2)){
    $n = $f2['Ethnicplace_name'];
    $name = $f2['Ethnicplace_detail'];
    $id2 = $f2['Ethnicplace_id'];
echo "<br>";
echo "<form action='save-ethnicplace.php' method='post' name='savelocation'>";
echo "<h5><input type='checkbox' name='like[]' value= '$id2' id='$id2'/><label for='$id2' ></label></h5><h4>📍&nbsp".$n.$name."</h4>";
}
echo "<br>";
  }
echo"<input type='submit' name='submit' value='บันทึกสถานที่'>";
?>
</form>
<button class="button button1" onclick="goBack()">ย้อนกลับ</button>
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
