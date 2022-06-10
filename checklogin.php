<?php
include("Connect.php");
if (isset($_POST['Submit'])) {
  $Email =  mysqli_real_escape_string($conn, $_POST['Email']);
  $Password =  mysqli_real_escape_string($conn, $_POST['Password']);

  $sqlck = "SELECT * FROM users 
  WHERE  Email='" . $Email . "' AND user_status = 1 ";
  $resultck = mysqli_query($conn, $sqlck);

  if (mysqli_num_rows($resultck) == 1) {

    $sql = "SELECT * FROM users 
                  WHERE  Email='" . $Email . "' 
                  AND  Password='" . $Password . "' ";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
      $row = mysqli_fetch_array($result);

      $_SESSION["Email"] = $row["Email"];
      $_SESSION["Firstname"] = $row["Firstname"];
      $_SESSION["Status"] = $row["Status"];

      if ($_SESSION["Status"] == "User") {

        Header("Location: index.php");

        // echo "<script>";

        // echo "window.history.back(-1) ";
        // echo "</script>";

      }
      if ($_SESSION["Status"] == "Admin") {

        Header("Location: ./admin");
      }
    } else {
      echo "<script>";
      echo "alert(\" Email หรือ  Password ไม่ถูกต้อง\");";
      echo "window.history.back()";
      echo "</script>";
    }


  } else {
    echo "<script>";
    echo "alert(\" Email ที่สมัครยังไม่ได้ยืนยัน กรุณากดยืนยันที่อีเมล์ของคุณ \");";
    echo "window.location.href = 'login.php' ";
    echo "</script>";
  }
} else {

  Header("Location: Login.php"); //user & password incorrect back to login again

}
