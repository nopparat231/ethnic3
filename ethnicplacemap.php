<?php include("Connect.php");?>
<?php
session_start();
$n2=$_SESSION['varname'];
                $sql = "SELECT * FROM ethnicplace ep 
                join ethnicdata e on e.Ethnic_id = ep.Ethnic_id where e.img='$n2'";
                $q = mysqli_query( $conn, $sql );
                $arr2=array();
                while ($row = mysqli_fetch_array($q)){
                  $lat = $row['Ethnicplace_latitude'];
                  $lon = $row['Ethnicplace_longitude'];
                  $detail = $row['Ethnicplace_detail'];
                  $name = $row['Ethnicplace_name'];
                  $lon2 = floatval($lon);
                  $lat2 = floatval($lat);
                  $arr=array();
                  $arr['lat']=$lat2;
                  $arr['lon']=$lon2;
                  $arr['detail']=$detail;
                  $arr['name']=$name;
                  array_push($arr2,$arr);
        //  echo "<script>
        //  var marker = new longdo.Marker({ lon:".$lon. ", lat:".$lat.", });
        //  map.Overlays.add(marker);
        //  </script>";
                }
        echo json_encode($arr2);
        //$_POST['arr2'];
           ?>