<!DOCTYPE html>
<?php include("Connect.php"); ?>
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
      margin-top: 20px;
      background-color: inherit;
      font-family: inherit;
      margin-right: 20;
    }

    .navbar a:hover,
    .dropdown:hover .dropbtn {
      background-color: #FFA500;
      /*พื้นหลังตอนเอาเม้าไปชี้*/
    }

    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #FFA500;
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
      z-index: 1;
    }

    .dropdown-content a {
      float: none;
      color: white;
      /*ีตัวอักษร*/
      padding: 12px 16px;
      text-decoration: none;
      display: block;
      text-align: left;
    }

    .dropdown-content a:hover {
      background-color: red;
      /*พื้นหลังตอนเอาเม้าไปชี้ ช้อย*/
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

    .button1 {
      background-color: #990000;
    }

    /* red */


    body,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
      font-family: 'Itim', cursive
    }

    .w3-body,
    .w3-hover-body:hover {
      color: #990000 !important;
      background-color: #990000 !important
    }

    body {
      background-color: #FFE4B5;
    }

    h1 {
      color: #990000;
    }

    h2 {
      font-size: 25px;
      /*margin-left: 50px;*/
    }
  </style>

  <!-- Css Dropdown และ botton ค้นหา -->
  <link rel="stylesheet" href="./select.css">

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
        <img class="w3-image" src="bg.jpg">
        <?php

        if (!isset($_SESSION["Email"])) {
        ?>
          <ul>
            <li><a href="login.php"><img src='login.png' width='30' height='30'>&nbspเข้าสู่ระบบ</a></li>
            <li><a href="contact.php"><img src='about.png' width='30' height='30'>&nbspเกี่ยวกับเรา</a></li>
            <li><a class="active" href="index.php"><img src='home_icon.png' width='30' height='30'>&nbspหน้าหลัก</a></li>
          </ul>
        <?php
        } else {
          $strSQL = "SELECT * FROM users where Email = '" . $_SESSION["Email"] . "'";
          $result = mysqli_query($conn, $strSQL);
          $row = $result->fetch_assoc();
          session_write_close();
        ?>
          <ul>
            <li>
              <div class="navbar">
                <div class="dropdown">
                  <button class="dropbtn"><?php echo "<img src='profile.png' width='30' height='30'>&nbspสวัสดีคุณ " . $row["Firstname"]; ?><i class="fa fa-caret-down"></i>
                  </button>
                  <div class="dropdown-content">
                    <a href="plan.php"><img src='planicon.png' width='20' height='20'>&nbsp&nbspวางแผนการท่องเที่ยวแบบมีเงื่อนไข</a>
                    <a href="plan2.php"><img src='planicon.png' width='20' height='20'>&nbsp&nbspวางแผนการท่องเที่ยวแบบจัดลำดับการท่องเที่ยว</a>
                    <a href="save.php"><img src='yourlike.png' width='30' height='30'>&nbspสถานที่ที่ถูกใจ</a>
                    <a href="logout.php"><img src='login.png' width='25' height='25'>&nbspออกจากระบบ</a>
                  </div>
                </div>
              </div>
            </li>
            <li><a href="contact.php"><img src='about.png' width='30' height='30'>&nbspเกี่ยวกับเรา</a></li>
            <li><a class="active" href="index.php"><img src='home_icon.png' width='30' height='30'>&nbsp&nbspหน้าหลัก</a></li>
          </ul>
        <?php
        }
        ?>


        <form action="plan_show.php" method="get">


          <?php

          $region = $conn->query("SELECT * from region");


          ?>
          <h1>วางแผนการท่องเที่ยวแบบมีเงื่อนไข <p>



            <div class="us-form">
              <div class='unwrap'>
                <h2><br> ภาค :

                  <?php echo "<select name='Region_name' id='Region_name'  onchange='Getregion(this.value)' >";
                  echo '<option>  เลือกภาค  </option>';
                  while ($row = $region->fetch_assoc()) {
                    $name = $row['Region_name'];
                    $Region_id = $row['Region_id'];
                    echo '<option value="' . $Region_id . '">' . $name . '</option>';
                  }
                  echo "</select>";
                  ?>
              </div>
            </div>

            <div class="us-form">
              <div class='unwrap'>
                <h2><br> จังหวัด :

                  <select name='Province_name' id='Province_name'>
                    <option> เลือกจังหวัด </option>
                  </select>


                  <br>
              </div>
            </div>


            <div class="us-form">
              <div class='unwrap'>
                <h2><br> สถานที่ :

                  <select name='Typelocation_name' id='Typelocation_name'>
                    <option> เลือกสถานที่ </option>
                  </select>

                  <br>

              </div>
            </div>

            <div class="us-form">
              <div class='unwrap'>

                <h2><br> ชาติพันธุ์ :

                  <select name='Ethnic_nameth' id='Ethnic_nameth'>
                    <option> เลือกชาติพันธุ์ </option>
                  </select>

                  <br>

                </h2>
              </div>
            </div>

            <div class="us-form">
              <div class='unwrap'>

                <h2><br>ช่วงเวลา :
                  <select name='start' id="start">
                    <option> เลือกเวลาเริ่มต้น </option>
                    <option value="8">08.00</option>
                    <option value="8.3">08.30</option>
                    <option value="9">09.00</option>
                    <option value="9.3">09.30</option>
                    <option value="10">10.00</option>
                    <option value="10.3">10.30</option>
                    <option value="11">11.00</option>
                    <option value="11.3">11.30</option>
                    <option value="12">12.00</option>
                    <option value="12.3">12.30</option>
                    <option value="13">13.00</option>
                    <option value="13.3">13.30</option>
                    <option value="14">14.00</option>
                    <option value="14.3">14.30</option>
                    <option value="15">15.00</option>
                    <option value="15.3">15.30</option>
                    <option value="16">16.00</option>
                    <option value="16.3">16.30</option>
                    <option value="17">17.00</option>
                    <option value="17.3">17.30</option>
                    <option value="18">18.00</option>
                    <option value="18.3">18.30</option>
                    <option value="19">19.00</option>
                    <option value="19.3">19.30</option>
                    <option value="20">20.00</option>
                    <option value="20.3">20.30</option>
                    <option value="21">21.00</option>
                    <option value="21.3">21.30</option>
                    <option value="22">22.00</option>
                    <option value="22.3">22.30</option>
                    <option value="23">23.00</option>
                    <option value="23.3">23.30</option>
                    <option value="24">24.00</option>
                  </select>

                  &nbsp;ถึง&nbsp;


                  <select name='end' id="end">
                    <option> เลือกเวลาสิ้นสุด </option>
                    <option value="8">08.00</option>
                    <option value="8.3">08.30</option>
                    <option value="9">09.00</option>
                    <option value="9.3">09.30</option>
                    <option value="10">10.00</option>
                    <option value="10.3">10.30</option>
                    <option value="11">11.00</option>
                    <option value="11.3">11.30</option>
                    <option value="12">12.00</option>
                    <option value="12.3">12.30</option>
                    <option value="13">13.00</option>
                    <option value="13.3">13.30</option>
                    <option value="14">14.00</option>
                    <option value="14.3">14.30</option>
                    <option value="15">15.00</option>
                    <option value="15.3">15.30</option>
                    <option value="16">16.00</option>
                    <option value="16.3">16.30</option>
                    <option value="17">17.00</option>
                    <option value="17.3">17.30</option>
                    <option value="18">18.00</option>
                    <option value="18.3">18.30</option>
                    <option value="19">19.00</option>
                    <option value="19.3">19.30</option>
                    <option value="20">20.00</option>
                    <option value="20.3">20.30</option>
                    <option value="21">21.00</option>
                    <option value="21.3">21.30</option>
                    <option value="22">22.00</option>
                    <option value="22.3">22.30</option>
                    <option value="23">23.00</option>
                    <option value="23.3">23.30</option>
                    <option value="24">24.00</option>
                  </select>


                  &nbsp;น.

              </div>
            </div>

            <div class="us-form">
              <div class='unwrap'>
                <h2><br> งบประมาณ :

                  <select name='costmin' id="costmin">
                    <option> เลือกงบประมาณ </option>
                    <option value="0">0&nbsp;(ฟรี)</option>
                    <option value="100">100</option>
                    <option value="200">200</option>
                    <option value="300">300</option>
                    <option value="400">400</option>
                    <option value="500">500</option>
                    <option value="600">600</option>
                    <option value="700">700</option>
                    <option value="800">800</option>
                    <option value="900">900</option>
                    <option value="1000">1000</option>
                    <option value="1001">มากกว่า 1000</option>
                  </select>



                  &nbsp;ถึง&nbsp;<select name='costmax' id="costmax">
                    <option> เลือกงบประมาณ </option>
                    <option value="0">0&nbsp;(ฟรี)</option>
                    <option value="100">100</option>
                    <option value="200">200</option>
                    <option value="300">300</option>
                    <option value="400">400</option>
                    <option value="500">500</option>
                    <option value="600">600</option>
                    <option value="700">700</option>
                    <option value="800">800</option>
                    <option value="900">900</option>
                    <option value="1000">1000</option>
                    <option value="1001">มากกว่า 1000</option>
                  </select>

                  &nbsp;บาท
              </div>
            </div>


            <button type="submit" class="button-19" role="button" value="">
              &nbsp;ค้นหา&nbsp;
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
              </svg>
            </button>

        </form>


        <br><br>
        <br><br>

        <button class="button button1" onclick="goBack()">ย้อนกลับ</button>
        <script>
          function goBack() {
            window.history.back();
          }
        </script>
        <!-- Footer -->


        <!-- End page content -->
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script>
      function Getregion(id) {

        var options = "";
        $.ajax({
          url: 'plan_api.php?Region_id=' + id,
          type: 'GET',
          success: function(res) {

            console.log(res);

            for (var i = 0; i < res.length; i++) {
              options += '<option>' + res[i].Province_name + '</option>';
            }

            document.getElementById('Province_name').innerHTML = options;

          },
          error: function(xhr, status, error) {
            console.log("Result: " + status + " " + error + " " + xhr.status + " " + xhr.statusText + " " + xhr.responseText)
          }

        })


      }






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