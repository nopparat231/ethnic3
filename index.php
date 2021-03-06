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
  <link rel="stylesheet" href="styleindex.css">
  <style>
    .hi {
      font-size: 20px;
      margin-top: 20px;
      color: white;
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

    .nav-ul ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
      overflow: hidden;
      background-color: #990000;
    }

    .nav-ul li {
      float: right;
    }

    .nav-ul li a {
      display: block;
      color: white;
      font-size: 20px;
      text-align: center;
      padding: 20px 20px;
      text-decoration: none;
    }

    .nav-ul li a:hover {
      background-color: #FFA500;
    }

    body,
    h1,
    h2,
    h3,
    h5,
    h6 {
      font-family: 'Itim', cursive
    }

    .w3-body,
    .w3-hover-body:hover {
      color: #990000 !important;
      background-color: #990000 !important
    }

    .topnav {
      overflow: hidden;
      background-color: #0000;
    }

    .topnav a {
      float: left;
      display: block;
      color: black;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
      font-size: 17px;
    }

    .topnav a:hover {
      background-color: #ddd;
      color: black;
    }

    .topnav a.active {
      background-color: #fff;
      color: white;
    }

    .topnav .search-container {
      float: right;
    }

    .topnav input[type=text] {
      padding: 6px;
      margin-top: 8px;
      font-size: 17px;
      border: none;
    }

    .topnav .search-container button {
      float: right;
      padding: 6px 10px;
      margin-top: 8px;
      margin-right: 16px;
      background: #ddd;
      font-size: 17px;
      border: none;
      cursor: pointer;
    }

    .topnav .search-container button:hover {
      background: #ccc;
    }

    body {
      background-color: #FFE4B5;
    }

    h1 {
      color: #990000;
    }

    .search {
      float: right;

      margin-top: 10px;
    }

    .btn-search {
      width: 3rem;
      height: 2.6rem;
      margin-top: 1px;
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
      margin-top: 20px;
      background-color: inherit;
      font-family: inherit;
      margin-right: 20;
    }

    .navbar a:hover,
    .dropdown:hover .dropbtn {
      background-color: #FFA500;
      /*?????????????????????????????????????????????????????????????????????*/
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
      /*???????????????????????????*/
      padding: 12px 16px;
      text-decoration: none;
      display: block;
      text-align: left;
    }

    .dropdown-content a:hover {
      background-color: red !important;
      /*????????????????????????????????????????????????????????????????????? ????????????*/
    }

    .dropdown:hover .dropdown-content {
      display: block;
    }

    .select2-selection__rendered {
      line-height: 40px !important;
    }

    .select2-container .select2-selection--single {
      height: 40px !important;

    }

    .select2-selection__arrow {
      height: 40px !important;

    }
  </style>

<body>

  </style>
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
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
        //  session_start(); 
        if (!isset($_SESSION["Email"])) {
        ?>
          <div class="nav-ul">
            <ul>
              <li><a href="login.php"><img src='login.png' width='30' height='30'>&nbsp?????????????????????????????????</a></li>
              <li><a href="contact.php"><img src='about.png' width='30' height='30'>&nbsp????????????????????????????????????</a></li>
              <li><a class="active" href="index.php"><img src='home_icon.png' width='30' height='30'>&nbsp????????????????????????</a></li>
            </ul>
          </div>
        <?php
        } else {
          $strSQL = "SELECT * FROM users where Email = '" . $_SESSION["Email"] . "'";
          $result = mysqli_query($conn, $strSQL);
          $row = $result->fetch_assoc();
          session_write_close();
        ?>
          <div class="nav-ul">
            <ul>
              <li>
                <div class="navbar">
                  <div class="dropdown">
                    <button class="dropbtn"><?php echo "<img src='profile.png' width='30' height='30'>&nbsp??????????????????????????? " . $row["Firstname"]; ?><i class="fa fa-caret-down"></i>
                    </button>
                    <div class="dropdown-content">
                      <a href="plan.php"><img src='planicon.png' width='20' height='20'>&nbsp&nbsp????????????????????????????????????????????????????????????????????????????????????????????????</a>
                      <a href="plan2.php"><img src='planicon.png' width='20' height='20'>&nbsp&nbsp?????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????</a>
                      <a href="save.php"><img src='yourlike.png' width='30' height='30'>&nbsp?????????????????????????????????????????????</a>
                      <a href="logout.php"><img src='login.png' width='25' height='25'>&nbsp??????????????????????????????</a>
                    </div>
                  </div>
                </div>
              </li>
              <li><a href="contact.php"><img src='about.png' width='30' height='30'>&nbsp????????????????????????????????????</a></li>
              <li><a class="active" href="index.php"><img src='home_icon.png' width='30' height='30'>&nbsp&nbsp????????????????????????</a></li>
            </ul>
          </div>
        <?php
        }
        ?>

        <!-- <form action="ethnicdetail.php">
<?php
$ethnic = $conn->query("SELECT * from ethnicdata");
echo "<div class='search'><h3>???????????????: &nbsp<select name = 'nameimg' ethnic_id= 'list'>";
echo '<option> -- ????????????????????????????????????????????? -- </option>';
while ($row = $ethnic->fetch_assoc()) {
  $name = $row['Ethnic_nameth'];
  $img = $row['img'];
  echo '<option value="' . $img . '">' . $name . '</option>';
}
echo "</select>";
?> 
    <button style='height:39px' type='submit'><i class="fa fa-search"></i></button></h3></div>
</form>-->
        <form action="<?= $_SERVER['SCRIPT_NAME']; ?>" method="get">
          <?php
          $search = $conn->query("SELECT * from ethnicdata INNER JOIN ethnicplace INNER JOIN province WHERE ethnicplace.Ethnic_id = ethnicdata.Ethnic_id AND province.Province_id = ethnicplace.Province_id GROUP BY province.Province_id ");
          //echo '<div class="search"><h3>???????????????:&nbsp&nbsp<input type="text" name="search" placeholder="Search..">';
          ?>
          <div class="search">
            <!-- <h3>???????????????:&nbsp&nbsp</h3> -->
            <select class="js-example-basic-single" name="search">
              <option></option>
              <?php

              while ($rowsearch = $search->fetch_assoc()) {
                $name = $rowsearch['Ethnic_nameth'];
                $Province_name = $rowsearch['Province_name'];
                echo '<option value="' . $name . '">' . $name . '</option>';
                echo '<option value="' . $Province_name . '">' . $Province_name . '</option>';
              }

              ?>
            </select>
            <button class="search btn-search" type='submit'><i class="fa fa-search"></i></button>
          </div>
        </form>

        <?php

        ?>
        <br>
        <br>
        <br>
        <h1><b>?????????????????????????????????????????????</b></h1>
        <!-- First Photo Grid-->

        <?php
        if (isset($_GET['search'])) {
          $keyword = ($_GET['search']);

          if ($keyword != "") {
            echo "<h1><b> ?????????????????????????????? : " . $keyword . " </b></h1>";
          }


          if (isset($_GET['page'])) {
            $pageno = mysqli_real_escape_string($conn, $_GET['page']);
          } else {
            $pageno = 1;
          }
          $no_of_records_per_page = 12;
          $offset = ($pageno - 1) * $no_of_records_per_page;

          $total_pages_sql = "SELECT COUNT(distinct e.Ethnic_nameth,e.Ethnic_nameen,e.img,e.Ethnic_id) FROM ethnicdata e left join ethnicplace ep on e.Ethnic_id = ep.Ethnic_id left join province p on p.Province_id = ep.Province_id where e.Ethnic_nameth like '%" . $keyword . "%' or p.Province_name like '%" . $keyword . "%' or e.Ethnic_nameen like '%" . $keyword . "%' order by Ethnic_nameth";
          $resultc = mysqli_query($conn, $total_pages_sql);
          $total_rows = mysqli_fetch_array($resultc)[0];
          $total_pages = ceil($total_rows / $no_of_records_per_page);

          $sql = "SELECT * FROM ethnicdata LIMIT $offset, $no_of_records_per_page";
          $q = mysqli_query($conn, $sql);

          $sql0 = "SELECT distinct e.Ethnic_nameth,e.Ethnic_nameen,e.img,e.Ethnic_id FROM ethnicdata e left join ethnicplace ep on e.Ethnic_id = ep.Ethnic_id left join province p on p.Province_id = ep.Province_id where e.Ethnic_nameth like '%" . $keyword . "%' or p.Province_name like '%" . $keyword . "%' or e.Ethnic_nameen like '%" . $keyword . "%' order by Ethnic_nameth LIMIT $offset, $no_of_records_per_page";
          $q0 = mysqli_query($conn, $sql0);
          $rowcount = mysqli_num_rows($q0);
          $c = 1;

          if ($rowcount == 0) {
            echo "<h1><b> ?????????????????????????????? </b></h1>";
          }

          while ($f0 = mysqli_fetch_assoc($q0)) {
            $img0 = $f0['img'];

            echo '
          <div class="column"><figure class="snip">
          <img src="images/' . $f0['img'] . '" style="height:300px;width:400px;padding:8px;" style="width:100%">
            <figcaption>
              <h3>' . $f0['Ethnic_nameth'] . '</h3>
              <h5>' . $f0['Ethnic_nameen'] . '</h5>
              </figcaption>
              <a href="ethnicdetail.php?nameimg=' . $img . '"></a>
              </figure>
              </div>';
          }
        } else {


          if (isset($_GET['page'])) {
            $pageno = mysqli_real_escape_string($conn, $_GET['page']);
          } else {
            $pageno = 1;
          }
          $no_of_records_per_page = 12;
          $offset = ($pageno - 1) * $no_of_records_per_page;

          $total_pages_sql = "SELECT COUNT(*) FROM ethnicdata";
          $resultc = mysqli_query($conn, $total_pages_sql);
          $total_rows = mysqli_fetch_array($resultc)[0];
          $total_pages = ceil($total_rows / $no_of_records_per_page);

          $sql = "SELECT * FROM ethnicdata LIMIT $offset, $no_of_records_per_page";
          $q = mysqli_query($conn, $sql);

          while ($f = mysqli_fetch_assoc($q)) {
            $img = $f['img'];

            echo '
      <div class="column"><figure class="snip">
      <img src="images/' . $f['img'] . '" style="height:300px;width:400px;padding:8px;" style="width:100%">
        <figcaption>
          <h3>' . $f['Ethnic_nameth'] . '</h3>
          <h5>' . $f['Ethnic_nameen'] . '</h5>
          </figcaption>
          <a href="ethnicdetail.php?nameimg=' . $img . '"></a>
          </figure>
          </div>';
          }
        }

        $pa = 1;
        if (isset($_GET['page'])) {
          $pa = $_GET['page'];
        }

        if (isset($_GET['search'])) {
          $search = "&search=" . ($_GET['search']);
        } else {
          $search = "";
        }

        ?>

        <!-- Pagination -->
        <div class="w3-center w3-padding-32">
          <div class="w3-bar" style="margin-left: 990px">

            <?php if ($pa != 1) { ?>
              <a href="index.php?page=<?php echo $pa - 1 . $search  ?>" class="w3-bar-item w3-button ">??</a>
            <?php } ?>

            <?php

            $hov = "";
            for ($p = 1; $p <= $total_pages; $p++) {

              if ($pa == $p) {
                $hov = "w3-bar-item w3-black w3-button";
              } else {
                $hov = "w3-bar-item w3-button w3-hover-black";
              }



            ?>

              <a href="index.php?page=<?php echo $p . $search ?>" class="<?php echo $hov ?>"><?php echo $p ?></a>

            <?php
            }
            ?>

            <?php if ($pa != 1) { ?>
              <a href="index.php?page=<?php echo $pa + 1 . $search ?>" class="w3-bar-item w3-button">??</a>
            <?php } ?>

          </div>
        </div>


        <!-- Footer -->


        <!-- End page content -->
    </div>

    <script>
      $(document).ready(function() {
        $('.js-example-basic-single').select2({
          tags: true
        });
      });

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