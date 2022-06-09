<?php include("Connect.php");?>
<?php
session_start();
$n2=$_SESSION['varname'];
$sql = "SELECT * FROM clothesplace cp
join ethnicdata e on cp.Ethnic_id = e.Ethnic_id where e.img='$n2'";
                $q = mysqli_query( $conn, $sql );
                $arr2=array();
                while ($row = mysqli_fetch_array($q)){
                  $lat = $row['Clothesplace_latitude'];
                  $lon = $row['Clothesplace_longitude'];
                  $open0 = $row['Clothesplace_open'];
                  $close0 = $row['Clothesplace_clo'];
                  $name = $row['Clothesplace_name'];
                  $detail = $row['Clothesplace_detail'];
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
                  $arr['detail']=$detail;
                  array_push($arr2,$arr);
        //  echo "<script>
        //  var marker = new longdo.Marker({ lon:".$lon. ", lat:".$lat.", });
        //  map.Overlays.add(marker);
        //  </script>";
                }
        echo json_encode($arr2);
        //$_POST['arr2'];
           ?>