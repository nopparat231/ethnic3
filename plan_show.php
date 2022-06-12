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


        .card {
            background: rgb(75, 160, 107);
            color: #FFE4B5;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            transition: 0.3s;
            width: 40%;
            border-radius: 12px;
        }

        .card:hover {
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
        }

        .container {
            padding: 2px 16px;
        }
    </style>

<body>

    </head>

    <body style="max-width:1600px">


        <!-- Overlay effect when opening sidebar on small screens -->
        <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

        <!-- !PAGE CONTENT! -->
        <div class="w3-main" style="margin: center">

            <!-- Header -->
            <div class="w3-display-container w3-content w3-center" style="max-width:1500px">
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

            </div>

            <?php

            $Region_id = $_GET['Region_name'];
            $Province_id = $_GET['Province_name'];

            ?>

            <div style="margin-left: 20rem;">

                <br>
                <br>

                <h1>ผลการค้นหา</h1>

                <?php
                $strSQL4 = "SELECT * from region WHERE Region_id = '$Region_id' ";
                $result4 = mysqli_query($conn, $strSQL4);
                $row4 = $result4->fetch_assoc();
                ?>

                <div class="card">
                    <div class="container">
                        <p style="text-align: center; font-size: 2.5rem; color:#FFE4B5;margin: 0.5rem;">ภาค</p>
                        <h2 style="text-align: center;"><?php echo $row4['Region_name'] ?></h2>
                    </div>
                </div>
                <br>

                <?php
                $strSQL5 = "SELECT * from province WHERE Province_id = '$Province_id' ";
                $result5 = mysqli_query($conn, $strSQL5);
                $row5 = $result5->fetch_assoc();

                ?>

                <div class="card">
                    <div class="container">
                        <p style="text-align: center; font-size: 2.5rem; color:#FFE4B5;margin: 0.5rem;">จังหวัด</p>
                        <h2 style="text-align: center;"><?php echo $row5['Province_name'] ?></h2>
                    </div>
                </div>
                <br>

                <div class="card">
                    <div class="container">
                        <p style="text-align: center; font-size: 2.5rem; color:#FFE4B5;margin: 0.5rem;">ร้านอาหาร ทั้งหมมด</p>

                        <?php

                        $strSQL11 = "SELECT * FROM ethnicdata INNER JOIN foodplace WHERE foodplace.Ethnic_id = ethnicdata.Ethnic_id AND foodplace.Province_id = '$Province_id' GROUP BY ethnicdata.Ethnic_id ";
                        $result11 = mysqli_query($conn, $strSQL11);

                        if (mysqli_num_rows($result11) > 0) {

                            while ($row11 = $result11->fetch_assoc()) {

                                echo "<h2>" . $row11['Ethnic_nameth'] . "</h2>";

                                $Ethnic_id = $row11['Ethnic_id'];

                                $strSQL = "SELECT * FROM foodplace WHERE Province_id = '$Province_id' AND Ethnic_id = '$Ethnic_id' ";
                                $result = mysqli_query($conn, $strSQL);

                                if (mysqli_num_rows($result) > 0) {

                                    while ($row = $result->fetch_assoc()) {

                                        echo "<h4>&nbsp; &nbsp; &nbsp; - &nbsp;" . $row['Foodplace_name'] . "<br></h4> ";
                                    }
                                } else {
                                    echo " ไม่มี <br>";
                                }
                            }
                        } else {
                            echo " ไม่มี <br>";
                        }
                        ?>

                    </div>
                </div>
                <br>

                <div class="card">
                    <div class="container">
                        <p style="text-align: center; font-size: 2.5rem; color:#FFE4B5;margin: 0.5rem;">ร้านเสื้อผ้า ทั้งหมมด</p>

                        <?php

                        $strSQL11 = "SELECT * FROM ethnicdata INNER JOIN clothesplace WHERE clothesplace.Ethnic_id = ethnicdata.Ethnic_id AND clothesplace.Province_id = '$Province_id' GROUP BY ethnicdata.Ethnic_id ";
                        $result11 = mysqli_query($conn, $strSQL11);

                        if (mysqli_num_rows($result11) > 0) {

                            while ($row11 = $result11->fetch_assoc()) {

                                echo "<h2>" . $row11['Ethnic_nameth'] . "</h2>";

                                $Ethnic_id = $row11['Ethnic_id'];

                                $strSQL = "SELECT * FROM clothesplace WHERE Province_id = '$Province_id' AND Ethnic_id = '$Ethnic_id' ";
                                $result = mysqli_query($conn, $strSQL);

                                if (mysqli_num_rows($result) > 0) {

                                    while ($row = $result->fetch_assoc()) {

                                        echo "<h4>&nbsp; &nbsp; &nbsp; - &nbsp;" . $row['Clothesplace_name'] . "<br></h4> ";
                                    }
                                } else {
                                    echo " ไม่มี <br>";
                                }
                            }
                        } else {
                            echo " ไม่มี <br>";
                        }
                        ?>

                    </div>
                </div>
                <br>

                <div class="card">
                    <div class="container">
                        <p style="text-align: center; font-size: 2.5rem; color:#FFE4B5;margin: 0.5rem;">สถานที่ท่องเที่ยว/พิพิธภัณฑ์ </p>

                        <?php

                        $strSQL11 = "SELECT * FROM ethnicdata INNER JOIN place WHERE place.Ethnic_id = ethnicdata.Ethnic_id AND place.Province_id = '$Province_id' GROUP BY ethnicdata.Ethnic_id ";
                        $result11 = mysqli_query($conn, $strSQL11);

                        if (mysqli_num_rows($result11) > 0) {

                            while ($row11 = $result11->fetch_assoc()) {

                                echo "<h2>" . $row11['Ethnic_nameth'] . "</h2>";

                                $Ethnic_id = $row11['Ethnic_id'];

                                $strSQL = "SELECT * FROM place WHERE Province_id = '$Province_id' AND Ethnic_id = '$Ethnic_id' ";
                                $result = mysqli_query($conn, $strSQL);

                                if (mysqli_num_rows($result) > 0) {

                                    while ($row = $result->fetch_assoc()) {

                                        echo "<h4>&nbsp; &nbsp; &nbsp; - &nbsp;" . $row['Location_name'] . "<br></h4> ";
                                    }
                                } else {
                                    echo " ไม่มี <br>";
                                }
                            }
                        } else {
                            echo " ไม่มี <br>";
                        }
                        ?>

                    </div>
                </div>
                <br>

                <div class="card">
                    <div class="container">
                        <p style="text-align: center; font-size: 2.5rem; color:#FFE4B5;margin: 0.5rem;">แหล่งที่เหลืออยู่ ทั้งหมมด</p>

                        <?php

                        $strSQL11 = "SELECT * FROM ethnicdata INNER JOIN ethnicplace WHERE ethnicplace.Ethnic_id = ethnicdata.Ethnic_id AND ethnicplace.Province_id = '$Province_id' GROUP BY ethnicdata.Ethnic_id ";
                        $result11 = mysqli_query($conn, $strSQL11);

                        if (mysqli_num_rows($result11) > 0) {

                            while ($row11 = $result11->fetch_assoc()) {

                                echo "<h2>" . $row11['Ethnic_nameth'] . "</h2>";

                                $Ethnic_id = $row11['Ethnic_id'];

                                $strSQL = "SELECT * FROM ethnicplace WHERE Province_id = '$Province_id' AND Ethnic_id = '$Ethnic_id' ";
                                $result = mysqli_query($conn, $strSQL);

                                if (mysqli_num_rows($result) > 0) {

                                    while ($row = $result->fetch_assoc()) {

                                        echo "<h4>&nbsp; &nbsp; &nbsp; - &nbsp;" . $row['Ethnicplace_name'] . "<br></h4> ";
                                    }
                                } else {
                                    echo " ไม่มี <br>";
                                }
                            }
                        } else {
                            echo " ไม่มี <br>";
                        }
                        ?>

                    </div>
                </div>
                <br>

                <div class="card">
                    <div class="container">
                        <p style="text-align: center; font-size: 2.5rem; color:#FFE4B5;margin: 0.5rem;">ประเพณี ทั้งหมมด</p>

                        <?php

                        $strSQL11 = "SELECT * FROM ethnicdata INNER JOIN custom INNER JOIN customplace WHERE customplace.Custom_id = custom.Custom_id AND custom.Ethnic_id = ethnicdata.Ethnic_id AND customplace.Province_id = '$Province_id' GROUP BY ethnicdata.Ethnic_id ";
                        $result11 = mysqli_query($conn, $strSQL11);

                        if (mysqli_num_rows($result11) > 0) {

                            while ($row11 = $result11->fetch_assoc()) {

                                echo "<h2>" . $row11['Ethnic_nameth'] . "</h2>";

                                $Ethnic_id = $row11['Ethnic_id'];

                                $strSQL = "SELECT * FROM customplace INNER JOIN custom WHERE customplace.Custom_id = custom.Custom_id AND customplace.Province_id = '$Province_id' AND custom.Ethnic_id = '$Ethnic_id' GROUP BY custom.Ethnic_id  ";
                                $result = mysqli_query($conn, $strSQL);

                                if (mysqli_num_rows($result) > 0) {

                                    while ($row = $result->fetch_assoc()) {

                                        echo "<h4>&nbsp; &nbsp; &nbsp; - &nbsp;" . $row['Custom_name'] . "<br></h4> ";
                                    }
                                } else {
                                    echo " ไม่มี <br>";
                                }
                            }
                        } else {
                            echo " ไม่มี <br>";
                        }
                        ?>

                    </div>
                </div>
                <br>



                <div class="card">
                    <div class="container">
                        <p style="text-align: center; font-size: 2.5rem; color:#FFE4B5;margin: 0.5rem;">ช่วงเวลา</p>
                        <h2 style="text-align: center;"><?php echo $_GET['start'] ?>&nbsp;น. &nbsp;ถึง &nbsp;<?php echo $_GET['end'] ?>&nbsp;น.</h2>
                    </div>
                </div>
                <br>

                <div class="card">
                    <div class="container">
                        <p style="text-align: center; font-size: 2.5rem; color:#FFE4B5;margin: 0.5rem;">งบประมาณ</p>
                        <h2 style="text-align: center;"><?php echo $_GET['costmin'] ?>&nbsp;บาท &nbsp;ถึง &nbsp;<?php echo $_GET['costmax'] ?>&nbsp;บาท</h2>
                    </div>
                </div>
                <br>

                <div id="Typelocation_name"></div>

                <br>

                <table>
                    <td><button class="button button1" onclick="goBack()"><< ย้อนกลับ</button></td>
                    <td style="padding-left: 16rem;"><button class="button button1" >บันทึก >></button></td>
                </table>



                <script>
                    function goBack() {
                        window.history.back();
                    }
                </script>

                <br>
                <br>
                <br>

            </div>

        </div>


        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script>
            //สถานที่

            var Province_id = "<?php echo $_GET['Province_name'] ?>";
            //GetProvince(Province_id);

            function GetProvince(id) {

                var options = "";
                $.ajax({
                    url: 'plan_api.php?Province_id=' + id,
                    type: 'GET',
                    success: function(res) {

                        console.log(res);

                        for (var i = 0; i < res.length; i++) {
                            options += '<span>ร้านอาหาร : ' + res[i].Foodplace_name + '</span><br>';
                            options += '<span>ร้านเสื้อผ้า : ' + res[i].Clothesplace_name + '</span><br>';
                            //options += '<span>'+ res[i].Typelocation_name + '</span><br>';
                        }

                        document.getElementById('Typelocation_name').innerHTML = options;

                    },
                    error: function(xhr, status, error) {
                        console.log("Result: " + status + " " + error + " " + xhr.status + " " + xhr.statusText + " " + xhr.responseText)
                    }

                })

            }

            //ชาติพันธ์
            function GetTypelocation(id) {

                var options = "";
                $.ajax({
                    url: 'plan_api.php?Ethnic_id=' + id,
                    type: 'GET',
                    success: function(res) {

                        console.log(res);

                        for (var i = 0; i < res.length; i++) {
                            options += '<option value=' + res[i].Ethnic_id + '>' + res[i].Ethnic_nameth + '</option>';
                        }

                        document.getElementById('Ethnic_nameth').innerHTML = options;

                    },
                    error: function(xhr, status, error) {
                        console.log("Result: " + status + " " + error + " " + xhr.status + " " + xhr.statusText + " " + xhr.responseText)
                    }

                })

            }
        </script>

    </body>

</html>