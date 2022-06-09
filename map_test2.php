<!DOCTYPE HTML>
<?php include("Connect.php");?>
<html>
  <head>
      <meta charset="UTF-8">
      <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Itim&display=swap">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <title>MAP</title>
</head>
      <style type="text/css">
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
margin-left:  600px;
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
body {background-color: #FFE4B5;}
    h1 {color: #990000;}

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

<script type="text/javascript" src="https://api.longdo.com/map/?key=48c3c84eaee6591b3147c3ef98591814"></script>
        <script>
          var map;
          var marker = new longdo.Marker({ lon: 100.643005, lat: 14.525007 });
          function init() {
              map = new longdo.Map({
                placeholder: document.getElementById('map')
              });
              map.Tags.add(function(tile, zoom) {
                var bound = longdo.Util.boundOfTile(map.projection(), tile);
                mockAjaxFromServer(bound, function(locationList) {
                  for (var i = 0; i < locationList.length; ++i) {
                    map.Overlays.add(new longdo.Marker(locationList[i], { visibleRange: { min: zoom, max: zoom } }));
                  }
                });
              });
          }
          
          function mockAjaxFromServer(/*bound, callback*/) {
            var locationList = [];
            //var count = Math.random() * 5;
            <?php
            $sql = "SELECT * FROM ethnicplace";
            while ($row = $sql->fetch_assoc()) {
                  $lat = $row['Ethnic_latitude'];
                  $lon = $row['Ethnic_longitude'];
              echo "locationList.push({ lon:" .$lon.",
                lat:".$lat."});";
            }
            ?>
            callback(locationList);
          }
        </script>
        </head>
    <body onload="init();">
        <div id="map"></div>
    </body>
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