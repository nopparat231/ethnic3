<?php
require_once "Connect.php";
//กำหนดค่า Access-Control-Allow-Origin ให้ เครื่อง อื่น ๆ สามารถเรียกใช้งานหน้านี้ได้
header("Access-Control-Allow-Origin: *");

header("Content-Type: application/json; charset=UTF-8");

header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");

header("Access-Control-Max-Age: 3600");

header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

//ตั้งค่าการเชื่อมต่อฐานข้อมูล

$requestMethod = $_SERVER["REQUEST_METHOD"];

//ตรวจสอบหากใช้ Method GET
if ($requestMethod == 'GET') {

    $arr = array();

    if (isset($_GET['Region_id'])) {

        $Region_id = $_GET['Region_id'];

        $res = $conn->query("SELECT * from Province WHERE Region_id = '$Region_id' ");

        while ($row = $res->fetch_assoc()) {

            $arr[] = $row;
        }
    } elseif (isset($_GET['Province_id'])) {

        $res = $_GET['Province_id'];

        $res = $conn->query("SELECT Ethnic_nameth from ethnicdata WHERE '$Province_id' ");

        while ($row = $res->fetch_assoc()) {

            $arr[] = $row;
        }
    } elseif (isset($_GET['Ethnic_id'])) {

        $Ethnic_id = $_GET['Ethnic_id'];

        $res = $conn->query("SELECT Typelocation_name from typelocation WHERE '$Ethnic_id' ");

        while ($row = $res->fetch_assoc()) {

            $arr[] = $row;
        }
    } else {
        $arr[] = ['status' => 'Error', 'message' => 'Error Not Found Data'];
    }

    echo json_encode($arr);
}
