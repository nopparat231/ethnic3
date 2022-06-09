<?php include("Connect.php");?>
<?php
                $sql = "SELECT * FROM ethnicplace";
                $q = mysqli_query( $conn, $sql );
                $arr2=array();
                while ($row = mysqli_fetch_array($q)){
                  $lat = $row['Ethnicplace_latitude'];
                  $lon = $row['Ethnicplace_longitude'];
                  $lon2 = floatval($lon);
                  $lat2 = floatval($lat);
                  $arr=array();
                  $arr['lat']=$lat2;
                  $arr['lon']=$lon2;
                  array_push($arr2,$arr);
        //  echo "<script>
        //  var marker = new longdo.Marker({ lon:".$lon. ", lat:".$lat.", });
        //  map.Overlays.add(marker);
        //  </script>";
                }
        echo json_encode($arr2);
        //$_POST['arr2'];

        
        // .....................................................
        //สูตรหาระยะทาง
        // function getDistanceBetweenPointsNew($latitude1, $longitude1, $latitude2, $longitude2, $unit = 'kilometers') {
//   $theta = $longitude1 - $longitude2; 
//   $distance = (sin(deg2rad($latitude1)) * sin(deg2rad($latitude2))) + (cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * cos(deg2rad($theta))); 
//   $distance = acos($distance); 
//   $distance = rad2deg($distance); 
//   $distance = $distance * 60 * 1.1515; 
//   switch($unit) { 
//     case 'miles': 
//       break; 
//     case 'kilometers' : 
//       $distance = $distance * 1.609; 
//    } 
//   echo "ระยะทางเท่ากับ &nbsp".$distance."<br>"; 
//}
           ?>
           