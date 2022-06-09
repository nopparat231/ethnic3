<?php

include('Connect.php');
echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

$errors = array();
$sql = "";
$status = 1;

$Email = mysqli_real_escape_string($conn, $_POST["Email"]);
$Firstname = mysqli_real_escape_string($conn, $_POST["Firstname"]);
$Lastname = mysqli_real_escape_string($conn, $_POST["Lastname"]);
$Password = mysqli_real_escape_string($conn, $_POST["Password"]);
$ConfirmPassword = mysqli_real_escape_string($conn, $_POST["ConfirmPassword"]);

if (empty($Email) === true) {
    echo '<script>
              setTimeout(function() {
              swal({
                  title: "เกิดข้อผิดพลาด",
                  text: "Email is empty, Please try again",
                  type: "error"
              }, 
              function() {
                  window.location = "Register.php"; //หน้าที่ต้องการให้กระโดดไป
              });
              }, 1000);
              </script>';
    return false;
}

if (empty($Firstname) === true) {
    echo '<script>
              setTimeout(function() {
              swal({
                  title: "เกิดข้อผิดพลาด",
                  text: "Firstname is empty, Please try again",
                  type: "error"
              }, 
              function() {
                  window.location = "Register.php"; //หน้าที่ต้องการให้กระโดดไป
              });
              }, 1000);
              </script>';
    return false;
}

if (empty($Lastname) === true) {
    echo '<script>
              setTimeout(function() {
              swal({
                  title: "เกิดข้อผิดพลาด",
                  text: "Lastname is empty, Please try again",
                  type: "error"
              }, 
              function() {
                  window.location = "Register.php"; //หน้าที่ต้องการให้กระโดดไป
              });
              }, 1000);
              </script>';
    return false;
}

if (empty($Password) === true) {
    echo '<script>
              setTimeout(function() {
              swal({
                  title: "เกิดข้อผิดพลาด",
                  text: "Password is empty, Please try again",
                  type: "error"
              }, 
              function() {
                  window.location = "Register.php"; //หน้าที่ต้องการให้กระโดดไป
              });
              }, 1000);
              </script>';
    return false;
}

if (empty($ConfirmPassword) === true) {
    echo '<script>
              setTimeout(function() {
              swal({
                  title: "เกิดข้อผิดพลาด",
                  text: "Confirm Password is empty, Please try again",
                  type: "error"
              }, 
              function() {
                  window.location = "Register.php"; //หน้าที่ต้องการให้กระโดดไป
              });
              }, 1000);
              </script>';
    return false;
}
if ($Password != $ConfirmPassword) {
    echo '<script>
              setTimeout(function() {
              swal({
                  title: "เกิดข้อผิดพลาด",
                  text: "The Two Password not do match, Please try again",
                  type: "error"
              }, 
              function() {
                  window.location = "Register.php"; //หน้าที่ต้องการให้กระโดดไป
              });
              }, 1000);
              </script>';
    return false;
} elseif (empty($Email) != 1 and empty($Firstname) != 1 and empty($Lastname) != 1 and empty($Password) != 1 and empty($ConfirmPassword) != 1) {
    if ($Password === $ConfirmPassword) {
        $sql = "INSERT INTO users (Email, Firstname, Lastname, Password) VALUES ('$Email', '$Firstname', '$Lastname', '$Password')";
    }
} else {
}

$user_check_query = "SELECT * FROM users WHERE Email = '$Email' ";
$query = mysqli_query($conn, $user_check_query);
$result = mysqli_fetch_assoc($query);


if (mysqli_query($conn, $sql) > 0) {

    $mailto = $Email;
    $mailSub = "EthnicTH Activate Email";
    $mailMsg = " กดลิงค์ ด่านล่างเพื่อยืนยันตัวตน \r\n ";
    $link = "http://localhost/ethnic3/register_db_email.php?email=" . $Email;
    require './phpmailer/PHPMailer/PHPMailerAutoload.php';
    $mail = new PHPMailer();
    $mail->IsSmtp();

    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 587; // or 587
    //$mail ->IsHTML(true);
    $mail->Username = "EthnicTH66@gmail.com";
    $mail->Password = "uzjcpragmjzofsrg";
    $mail->SetFrom("EthnicTH66@gmail.com", "Activate Email");
    $mail->Subject = $mailSub;
    $mail->Body = $mailMsg.$link;
    $mail->AddAddress($mailto);

    if ($mail->Send()) {
        echo '<script>
        setTimeout(function() {
        swal({
            title: "สมัครสมาชิกสำเร็จ",
            text: "กรุณากดลิ้งค์ยืนยัน Email ที่ของท่าน",
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
            title: "ส่งเมล์ไม่สำเร็จ",
            text: "ระบบส่งเมล์ Error",
            type: "error" 
        }, 
        function() {
            window.location = "Register.php"; //หน้าที่ต้องการให้กระโดดไป
        });
        }, 1000);
        </script>';
    }
} else {

    echo '<script>
              setTimeout(function() {
              swal({
                  title: "เกิดข้อผิดพลาด",
                  text: "Email already exists, Please try again",
                  type: "error"
              }, 
              function() {
                  window.location = "Register.php"; //หน้าที่ต้องการให้กระโดดไป
              });
              }, 1000);
              </script>';
}
$conn->close();
