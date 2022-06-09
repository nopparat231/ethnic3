<?php include("Connect.php"); ?>
<html>

<head>
    <title>Monthly Travel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" charset="UTF-8">
    <link href='https://fonts.googleapis.com/icon?family=Material+Icons' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="mainStyle.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kalam:wght@300&display=swap" rel="stylesheet">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Itim&display=swap');

        div {
            font-family: 'Itim', cursive;
        }
    </style>

</head>

<body>

    <div class="hero-image">
        <div class="hero-text">
            <div style="font-size:70px">เลือกภาค</div>
        </div>
    </div>

    <?php
    if (isset($_GET['name'])) {
        $name = $_GET['name'];

        $region = $conn->query("SELECT DISTINCT r.Name from region r inner join province p
                                on r.region_id = p.region_id
                                inner join location l 
                                on p.province_id = l.province_id
                                inner join month m
                                on l.id_month = m.id_month
                                where m.Name = '" . $name . "'");

        $sql = "SELECT Name from month where Name = '" . $name . "'";

        if ($result = mysqli_query($conn, $sql)) {
            if (mysqli_num_rows($result) > 0) {
                while ($row = $result->fetch_assoc()) {
    ?>
                    <div id="borderDemo"></div>
    <?php
                    echo "<br>";
                    echo "<div class='month'> เดือนที่เลือก : " . $row["Name"] . "</div>";
                }
            }
        }
    }
    ?>
    <br>
    <div class="region">
        <form action="province.php" method="get">
            <label>เลือกภาคที่ต้องการท่องเที่ยว : </label>
            <?php echo "<select name='name' id='poll'>";
            echo '<option> -- เลือกภาค -- </option>';
            while ($row = $region->fetch_assoc()) {
                $name = $row['Name'];
                echo '<option value="' . $name . '">' . $name . '</option>';
            }
            echo "</select>";
            if ($result = mysqli_query($conn, $sql)) {
                if (mysqli_num_rows($result) > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $m = $row['Name'];
                        echo " <button style='height:30px' type='submit' name='month' value=" . $m . "><i class='fa fa-search'></i></button>";
                    }
                }
            }
            ?>
        </form>
    </div>

    <div class="flex-container">
        <div class="pic-center">
            <a href="mountain.php"><img src="images/mountain.jpg" width="230" height="230">
                <b>
                    <div class="centered" style="font-size: 50px;color: white">ภูเขา</div>
                </b>
        </div>
        </a>
        <div class="pic-center">
            <a href="sea.php"><img src="images/sea.png" width="230" height="230">
                <b>
                    <div class="centered" style="font-size: 50px;color: white">ทะเล</div>
                </b>
            </a>
        </div>
        <div class="pic-center">
            <a href="waterfall.php"><img src="images/waterfall.jpg" width="230" height="230">
                <b>
                    <div class="centered" style="font-size: 50px;color: white">น้ำตก</div>
                </b></a>
        </div>
    </div>
   
    <div style="margin-left:2%;padding:8px;">
        <input type="image" src="images/back.png" alt="Submit" width="48" height="48" onclick="goBack()">
    </div>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>

</html>