<?php include("Connect.php");?>
<?php
session_start();
$n2=$_SESSION['varname'];
                $sql = "SELECT * FROM place p 
                join ethnicdata e on e.Ethnic_id = p.Ethnic_id where e.img='$n2'";
                $q = mysqli_query( $conn, $sql );
                $arr2=array();
                while ($row = mysqli_fetch_array($q)){
                  $lat = $row['Location_latitude'];
                  $lon = $row['Location_longitude'];
                  $open0 = $row['Place_open'];
                  $close0 = $row['Place_clo'];
                  $name = $row['Location_name'];
                  $lon2 = floatval($lon);
                  $lat2 = floatval($lat);
                  $open = number_format($open0,2);
                  $close= number_format($close0,2);
                  $arr=array();
                  $arr['lat']=$lat2;
                  $arr['lon']=$lon2;
                  $arr['open']=$open;
                  $arr['close']=$close;
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