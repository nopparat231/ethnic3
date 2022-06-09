<?php include("Connect.php");?>
<?php
$arr_min = array();
$arr_all = array();
if (isset($_POST['a'])){
    $latitude1 = $_POST['a']; 
}
if (isset($_POST['b'])){
    $longitude1= $_POST['b'];
}
session_start();
if(isset($_SESSION['idplan'])){
for($i=0;$i<count($_SESSION["idplan"]);$i++)
	{
    $value= $_SESSION["idplan"][$i];
    // echo $value."<br>";

//สถานที่ท่องเที่ยว
    $sql1 = "SELECT * FROM place p join province pr on p.Province_id = pr.Province_id where Location_id = '$value'";
    $q1 = mysqli_query( $conn, $sql1 );
    if(mysqli_num_rows($q1)){
    while ($f1 = mysqli_fetch_assoc($q1)){
    $lat1 = $f1['Location_latitude'];
    $lon1 = $f1['Location_longitude'];
    $id1 = $f1['Location_name'];
    $latitude2 = floatval($lat1);
    $longitude2 = floatval($lon1);
    $arr_min['id']=$id1;
    $arr_min['lon']=$longitude2;
    $arr_min['lat']=$latitude2;
    $arr_min['detail']=$f1['Province_name'];
    $arr_min['dt']=$f1['Location_detail'];
    // echo $latitude2."<br>";
    // echo $longitude2."<br>";
    list($dis)=getDistanceBetweenPointsNew($latitude1, $longitude1, $latitude2, $longitude2);
    $arr_min['dis']=$dis;
    array_push($arr_all,$arr_min);
    // echo $id1." ".$dis."<br>";
    }
}
else{

}
//ร้านเสื้อผ้า
    $sql2 = "SELECT * FROM Clothesplace p join province pr on p.Province_id = pr.Province_id where Clothesplace_id = '$value'";
    $q2 = mysqli_query( $conn, $sql2 );
    if(mysqli_num_rows($q2)){
    while ($f2 = mysqli_fetch_assoc($q2)){
    $lat2 = $f2['Clothesplace_latitude'];
    $lon2 = $f2['Clothesplace_longitude'];
    $id2 = $f2['Clothesplace_name'];
    $latitude2 = floatval($lat2);
    $longitude2 = floatval($lon2);
    $arr_min['id']=$id2;
    $arr_min['lon']=$longitude2;
    $arr_min['lat']=$latitude2;
    $arr_min['detail']=$f2['Province_name'];
    $arr_min['dt']=$f2['Clothesplace_detail'];
    // echo $latitude2."<br>";
    // echo $longitude2."<br>";
    list($dis)=getDistanceBetweenPointsNew($latitude1, $longitude1, $latitude2, $longitude2);
    $arr_min['dis']=$dis;
    array_push($arr_all,$arr_min);
    // echo$id2." ".$dis."<br>";
    }
}
else{

}

// ร้านอาหาร
$sql3 = "SELECT * FROM foodplace p join province pr on p.Province_id = pr.Province_id where Foodplace_id ='$value'";
  $q3 = mysqli_query( $conn, $sql3 );
  if(mysqli_num_rows($q3)){
  while ($f3 = mysqli_fetch_assoc($q3)){
    $lat3 = $f3['Foodplace_latitude'];
    $lon3 = $f3['Foodplace_longitude'];
    $id3 = $f3['Foodplace_name'];
    $latitude2 = floatval($lat3);
    $longitude2 = floatval($lon3);
    $arr_min['id']=$id3;
    $arr_min['lon']=$longitude2;
    $arr_min['lat']=$latitude2;
    $arr_min['detail']=$f3['Province_name'];
    $arr_min['dt']=$f3['Foodplace_detail'];
    // echo $latitude2."<br>";
    // echo $longitude2."<br>";
    list($dis)=getDistanceBetweenPointsNew($latitude1, $longitude1, $latitude2, $longitude2);
    $arr_min['dis']=$dis;
    array_push($arr_all,$arr_min);
    // echo $id3." ".$dis."<br>";
    }
}
  else{

    }
// save วัฒนธรรม
    $sql4 = "SELECT * FROM customplace cpp join custom c on cpp.Custom_id=c.Custom_id join province pr on cpp.Province_id = pr.Province_id where Customplace_id='$value'";
    $q4 = mysqli_query( $conn, $sql4 );
    if(mysqli_num_rows($q4)){
    while ($f4 = mysqli_fetch_assoc($q4)){
        $lat4 = $f4['Customplace_latitude'];
        $lon4 = $f4['Customplace_longitude'];
        $id4 = $f4['Custom_name'];
        $latitude2 = floatval($lat4);
        $longitude2 = floatval($lon4);
        $arr_min['id']=$id4;
        $arr_min['lon']=$longitude2;
        $arr_min['lat']=$latitude2;
        $arr_min['detail']=$f4['Province_name'];
        $arr_min['dt']=$f4['Customplace_detail'];
        // echo $latitude2."<br>";
        // echo $longitude2."<br>";
        list($dis)=getDistanceBetweenPointsNew($latitude1, $longitude1, $latitude2, $longitude2);
        $arr_min['dis']=$dis;
        array_push($arr_all,$arr_min);
        // echo $id4." ".$dis."<br>";
    }
  }
  
    else{
  
      }
// save แหล่งที่เหลืออยู่
$sql5 = "SELECT * FROM ethnicplace ep join province pr on ep.Province_id = pr.Province_id where Ethnicplace_id='$value'";
$q5 = mysqli_query( $conn, $sql5 );
if(mysqli_num_rows($q5)){
while ($f5 = mysqli_fetch_assoc($q5)){
    $lat5 = $f5['Ethnicplace_latitude'];
    $lon5 = $f5['Ethnicplace_longitude'];
    $id5 = $f5['Ethnicplace_name'];
    $latitude2 = floatval($lat5);
    $longitude2 = floatval($lon5);
    $arr_min['id']=$id5;
    $arr_min['lon']=$longitude2;
    $arr_min['lat']=$latitude2;
    $arr_min['detail']=$f5['Province_name'];
    $arr_min['dt']=$f5['Ethnicplace_detail'];
    // echo $latitude2."<br>";
    // echo $longitude2."<br>";
    list($dis)=getDistanceBetweenPointsNew($latitude1, $longitude1, $latitude2, $longitude2);
    $arr_min['dis']=$dis;
    array_push($arr_all,$arr_min);
    // echo $dis."<br>";
}
}
else{

  }
}
}
else{
    echo "data is null";
}
function getDistanceBetweenPointsNew($latitude1, $longitude1, $latitude2, $longitude2) {
    $long1 = deg2rad($longitude1);
    $long2 = deg2rad($longitude2);
    $lat1 = deg2rad($latitude1);
    $lat2 = deg2rad($latitude2);
      
    //Haversine Formula
    $dlong = $long2 - $long1;
    $dlati = $lat2 - $lat1;
      
    $val = pow(sin($dlati/2),2)+cos($lat1)*cos($lat2)*pow(sin($dlong/2),2);
      
    $res = 2 * atan2(sqrt($val),sqrt(1-$val));
      
    $radius = 6371;
      
    $dist=($res*$radius);
    $meterConversion = 1.609;
    $geopointDistance = $dist * $meterConversion;
    return array($geopointDistance);
}
// เรียงค่าระยะทางจากน้อยไปมาก
for( $i=0; $i<count( $arr_all); $i++ ) {
  for($j=0; $j<count($arr_all);$j++){
      if($i<count($arr_all) &$arr_all[$j]['dis']>$arr_all[$i]['dis']){
       //id
        $temp = $arr_all[$j]['id'];
        $arr_all[$j]['id']=$arr_all[$i]['id'];
        $arr_all[$i]['id'] = $temp;

        //dis
        $tem = $arr_all[$j]['dis'];
        $arr_all[$j]['dis']=$arr_all[$i]['dis'];
        $arr_all[$i]['dis']=$tem;

        //lat
        $tem = $arr_all[$j]['lat'];
        $arr_all[$j]['lat']=$arr_all[$i]['lat'];
        $arr_all[$i]['lat']=$tem;

        //lon
        $tem = $arr_all[$j]['lon'];
        $arr_all[$j]['lon']=$arr_all[$i]['lon'];
        $arr_all[$i]['lon']=$tem;

        //detail
        $tem = $arr_all[$j]['detail'];
        $arr_all[$j]['detail']=$arr_all[$i]['detail'];
        $arr_all[$i]['detail']=$tem;

        //dt on map
        $tem = $arr_all[$j]['dt'];
        $arr_all[$j]['dt']=$arr_all[$i]['dt'];
        $arr_all[$i]['dt']=$tem;
    }
    else{

    }
  }
}
echo json_encode($arr_all, JSON_UNESCAPED_UNICODE);

?>
