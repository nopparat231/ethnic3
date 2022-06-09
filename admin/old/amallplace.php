<?php include("Connect.php");?>
<html>
<head>
<title>Training System</title>
<meta name="viewport" content="width=device-width, initial-scale=1" charset="UTF-8">
<link href='https://fonts.googleapis.com/icon?family=Material+Icons' rel='stylesheet'>
<link rel="stylesheet" type="text/css" href="styleAll.css">
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<style>
@import url('https://fonts.googleapis.com/css2?family=Sarabun:wght@300&display=swap');
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

<div class="tab">
   
<a href="Home.php"><button class="tablinks" ><i class='fas fa-home'> ชาติพันธุ์</i></button>
  <a href="amcustom.php"><button class="tablinks"><i class='fas fa-book'>  ประเพณี</i></button></a>
  <a href="amfood.php"><button class="tablinks"><i class='fas fa-book'>  อาหาร</i></button></a>
  <a href="amclothes.php"><button class="tablinks"><i class='fas fa-book'> เสื้อผ้า</i></button></a>
 <button class="tablinks" onclick="openCity(event, 'amallplace')" id="defaultOpen"><i class='fas fa-book'> สถานที่</i></button></a>
  <button class="tablinks" id="defaultOpen"><i class='fas fa-book'>  ประเพณี</i></button>
</div>

<div id="amallplace" style="height:120%;" class="tabcontent">
<?php
	$sum = $conn -> query("select Typelocation_name from typelocation");
?>
<div class="c">
<h2><font>สถานที่</font></h2>
<form action="#" method="get">
<label>ประเภทสถานที่ : </label>
<?php echo"<select id='SelectA' onchange='my_fun(this.value);'>";
		echo '<option> -- เลือกประเภท -- </option>';
		echo '<option value="TL01" > ร้านอาหาร</option>';
		echo '<option value="TL02" >วัฒนธรรมและประเพณี</option>';
		echo '<option value="TL03" >แหล่งที่เหลืออยู่</option>';
		echo '<option value="TL04" >ร้านเครื่องแต่งกาย</option>';
		echo '<option value="TL05" >สถานที่ท่องเที่ยว/พิพิธพันธุ์</option>';
    
echo "</select>";
?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<br></br>
<label>ชื่อหลักสูตร :</label> 
<?php echo"<select name='w' id='poll'>";
while($row = $sum -> fetch_assoc()) {
        $n = $row['name'];
		echo '<option value="'.$n.'">'.$n.'</option>';
    }
echo "</select>";
?>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<button style='height:30px' type='submit' name='submit' value='ค้นหา' ><i class="fa fa-search"> ค้นหา</i></button>
</form>
</div>
<form action="editcourse.php" method="post">
<?php
    if (isset($_GET['w'])){
	$n = $_GET['w'];

	$sql = "SELECT c.id_course,c.name,c.amount,c.main,c.objective,c.target,c.pattern,c.benefits,t.name as ty
	        from course c inner join type_course t
	        on c.id_type = t.id_type
			where c.name = '". $n."'";
			
	if($result = mysqli_query($conn,$sql)){
		if(mysqli_num_rows($result)>0){
			while($row = $result -> fetch_assoc()){	
	
?>
		<br>
	    <hr>
		<br>
		<dd><?php 
		echo "<b>รหัส : </b>".$row["id_course"]."<p></p>";
		echo "<b>ชื่อ : </b>".$row["name"]."<p></p>";
		echo "<b>จำนวน : </b>".$row["amount"]." คน<p></p>";
		echo "<b>หลักการและเหตุผล : </b>".$row["main"]."<p></p>";
		echo "<b>จุดประสงค์ : </b>".$row["objective"]."<p></p>";
		echo "<b>กลุ่มเป้าหมาย: </b>".$row["target"]."<p></p>";
		echo "<b>รูปแบบ : </b>".$row["pattern"]."<p></p>";
		echo "<b>ประโยชน์ : </b>".$row["benefits"]."<p></p>";
		echo "<b>ประเภทหลักสูตร : </b>".$row["ty"]."<p></p>";
		echo "<div class='c'><button style='height:30px' type='submit' name='edit' value=".$row["id_course"]." ><i class='fas fa-edit'> แก้ไขหลักสูตร</i></button>&nbsp;&nbsp;&nbsp; 
		<button style='height:30px' onclick = 'myFunction()' type='submit' name='delete' value=".$row["id_course"]."><i class='fas fa-trash-alt'> ลบหลักสูตร</i></button></div>";
		?>
<?php 	
			}
?>
<?php
	}}}
?>
</form> 
</div>

<script>
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

function myFunction() {
   confirm("ยืนยันการลบหลักสูตร");
}

document.getElementById("defaultOpen").click();
</script>

</body>
</html>