<html>
<?php include("Connect.php");?>
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
body {background-color: #FFE4B5;}
    h1,h2,h3,h4,h5 {color: #990000;
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
  cursor: pointer;
}
.button1 {background-color: #990000;} /* red */
.button2 {background-color: #CC3333;}
</style>
</head>
<body>
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
session_start();
$c=0;
if(isset($_POST['submit'])){
if(!isset($_SESSION["Email"])){
    Header("Location: Login.php");
}
else{
  if(isset($_POST['like'])){
    foreach($_POST['like'] as $value){
        $Email = $_SESSION['Email'];
        $check_query = "SELECT * FROM keeplocation k join ethnicplace ep on k.Ethnicplace_id = ep.Ethnicplace_id WHERE k.Ethnicplace_id = '$value'and k.Email='$Email' ";
        $query = mysqli_query($conn, $check_query);
        $result = mysqli_fetch_assoc($query);

        $Email = mysqli_real_escape_string($conn, $_SESSION["Email"]);
        $data = mysqli_real_escape_string($conn,$value);
          if (isset($result['Ethnicplace_id'])){
            $message = $result['Ethnicplace_detail'].'มีอยู่ในรายการบันทึกสถานที่ที่สนใจของคุณอยู่แล้ว';
            echo "<script type='text/javascript'>alert('$message');</script>";
              }
          else{
        $sql = "INSERT INTO keeplocation (Email, Ethnicplace_id) VALUES ('$Email', '$data')";
       $result2 = mysqli_query($conn, $sql) or die ("Error in query: $sql " . mysqli_error());
       
       }
    }
    echo"<br><br>";
    $all = "SELECT k.Ethnicplace_id, ep.Ethnicplace_detail FROM keeplocation k join ethnicplace ep
    on k.Ethnicplace_id = ep.Ethnicplace_id where k.Email='$Email'";
    $q = mysqli_query( $conn, $all);
    echo "<h2>รายการแหล่งที่เหลืออยู่ที่คุณสนใจ :</h2><br>";
    while ($f = mysqli_fetch_assoc($q)){
    echo '<h3><img class="img" src="heart.gif" style=width:40px;height:40px; >&nbsp'.$f['Ethnicplace_detail']."</h3><br>";
}

    
//echo $_SESSION["Email"];*/
}
else{
  echo "<h2>รายการแหล่งที่เหลืออยู่ที่คุณสนใจ :</h2><br>คุณยังไม่ได้เลือกสถานที่ที่คุณสนใจ";
}
}
}
?>
<br><br>
<button class="button button1" onclick="goBack()">ย้อนกลับ</button>
<a href="save.php"><input class ="button button2" type="button" name= "saveall" value="สถานที่ที่ถูกใจทั้งหมด"></a>
<script>
        function goBack() {
            window.history.back();
        }
    </script>
<br><br>   
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