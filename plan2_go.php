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
<link href="https://fonts.googleapis.com/css2?family=Mitr&family=Pridi:wght@300&family=Prompt:wght@300&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Itim&display=swap">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <title>MAP</title>
      <style type="text/css">
button{
  outline: none;
  border: none;
  background-color: inherit;
  cursor: pointer;

}
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
margin-top : 25px;
margin-left:650px;
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
margin-left:15px;
}
h6{
}

input[type=checkbox] {
    display:none;
  }


   input[type=checkbox]:checked + label
    {
        margin-top: -20px ;
        background: url(checked.png) no-repeat;
        height: 25px;
        width: 25px;
        display:inline-block;
        padding: 0 0 0 0px;
        background-size: 60%;
    }
 
    input[type=checkbox] + label
    {
        margin-top: -20px ;
        background: url(check.png) no-repeat;
        height: 20px;
        width: 20px;
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
.locat{
    float: left;
    margin-left: 20px;
}

  </style>
<body  onload = "getLocation(); init();" style="max-width:1600px">


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
  </head>
  <div class="locat"><h3><img src="icon-pin.gif" style= width:50px;height:50px;>ตำแหน่งปัจจุบันของผู้ใช้&nbsp:&nbsp<span id="demo"></h3>

<script type="text/javascript" src="https://api.longdo.com/map/?key=7e3736b93742855c4af09070fffd2498"></script>
  <!-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
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
          // getLocation();
        }
  </script>
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
//หาชื่อตำแหน่งปัจจุบัน 
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

  let data = { a: latitude1, b: longitude1 };
  $.ajax({
    url: 'testdis.php',
    type: 'POST',
    data: data,
    success: function(res){
        var json=$.parseJSON(res);
        let text = "";
        var c=1;
        if(document.getElementById("asc").checked == true && document.getElementById("asc2").checked == false){
          map.Overlays.clear();
          for(var i=0; i<json.length; i++){
              var name = json[i].id;
              var dis = json[i].dis;
              var lon1 = json[i].lon;
              var lat1 = json[i].lat;
              var dt = json[i].detail;
              var dt_map = json[i].dt;
              text+=(i+1)+". "+name+" "+dt+" <button onclick= window.open('https://www.google.com/search?q="+name+"','_blank')>&#128270;</button><br>";
              document.getElementById("demo2").innerHTML = text;
              var dis_int = parseFloat(dis);
              dis = parseInt(dis_int);
          //สร้าง marker
          var marker1 = new longdo.Marker({ lon: lon1, lat: lat1 },
          {
          title: (i+1)+". "+name+" "+dt,
          icon: {
          url: 'https://map.longdo.com/mmmap/images/pin_mark.png',
          offset: { x: 12, y: 45 }
          },
          detail: '&#128681 ระยะทาง '+dis+ ' กิโลเมตร<br>&#128221 '+dt_map,
          visibleRange: { min: 0, max: 100 },
          draggable: false,
          weight: longdo.OverlayWeight.Top,
          });
          map.Overlays.add(marker1);
        }
        document.getElementById("asc2").checked =false;
      }
      else if(document.getElementById("asc2").checked == true && document.getElementById("asc").checked == false){
        map.Overlays.clear();
        for(var i=json.length-1; i>=0; i--){
              var name = json[i].id;
              var dis = json[i].dis;
              var lon1 = json[i].lon;
              var lat1 = json[i].lat;
              var dt = json[i].detail;
              var dt_map = json[i].dt;
              text+=(c)+". "+name+" "+dt+" <button onclick= window.open('https://www.google.com/search?q="+name+"','_blank')>&#128270;</button><br>";
              document.getElementById("demo2").innerHTML = text;
              var dis_int = parseFloat(dis);
              dis = parseInt(dis_int);
          //สร้าง marker
              var marker2 = new longdo.Marker({ lon: lon1, lat: lat1 },
          {
          title: c+". "+name+" "+dt,
          icon: {
          url: 'https://map.longdo.com/mmmap/images/pin_mark.png',
          offset: { x: 12, y: 45 }
          },
          detail: '&#128681 ระยะทาง '+dis+ ' กิโลเมตร<br>&#128221 '+dt_map,
          visibleRange: { min: 0, max: 100 },
          draggable: false,
          weight: longdo.OverlayWeight.Top,
          });
          map.Overlays.add(marker2);
          c++;
        }
      }

        
        
  }
});
}
</script></h3></div>
  <br><br><br><br><h1>วางแผนการท่องเที่ยวแบบจัดลำดับการท่องเที่ยว</h1>
<div class ="locat"><h4>แสดงผลจากตำแหน่ง :&nbsp&nbsp<input type='radio' name='di' value= 'asc' id= 'asc'onclick=getLocation(); checked>&nbspใกล้-ไกล&nbsp&nbsp<input type='radio' name='di' value= 'asc2' id= 'asc2' onclick=getLocation()>&nbspไกล-ใกล้</h4></div>
<br><br><br>
<div class="locat"><h4 id="demo2"></h4></div>
<div id="map"></div>
</script>
  
  <?php
$arr=array();
if(isset($_POST['like'])){
foreach($_POST['like'] as $value){
  array_push($arr,$value);
}
session_start();
$_SESSION['idplan']=$arr;
}
else{} 
  ?>
  <!-- *คำนวนระยะทาง -->
<!-- Footer -->
<br>


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
