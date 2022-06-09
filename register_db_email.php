<?php
include('Connect.php');
echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';


$Email = mysqli_real_escape_string($conn, $_GET['email']);

$sql = "UPDATE users SET user_status = 1 WHERE Email = '$Email' ";
mysqli_query($conn, $sql);
if (mysqli_affected_rows($conn)) {
    echo '<script>
    setTimeout(function() {
    swal({
        title: "ยืนยัน Email สำเร็จ",
        text: "กรุณาเข้าสู่ระบบ",
        type: "success" 
    }, 
    function() {
        window.location = "Login.php"; //หน้าที่ต้องการให้กระโดดไป
    });
    }, 1000);
    </script>';
} else {
    echo '<script>
    setTimeout(function() {
    swal({
        title: "ยืนยัน Email เมล์ไม่สำเร็จ",
        text: "Error",
        type: "error" 
    }, 
    function() {
        window.location = "Register.php"; //หน้าที่ต้องการให้กระโดดไป
    });
    }, 1000);
    </script>';
}
