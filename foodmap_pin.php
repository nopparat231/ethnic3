<?php include("Connect.php");?>
<?php
session_start();
$n2=$_SESSION['varname'];
$ti=$conn->query("SELECT * FROM ethnicdata WHERE img='$n2'");
   while ($row = $ti->fetch_assoc()) {
    $check = $row['Ethnic_id'];
   }
$sql = "SELECT DISTINCT fp.Foodplace_name,Foodplace_latitude,Foodplace_longitude,Foodplace_detail,fp.Foodplace_latitude,
fp.Foodplace_id,Foodplace_open,Foodplace_clo,Foodplace_detail FROM foodplace fp 
join food f on fp.Foodtype_id = f.Foodtype_id join ethnicdata e on e.Ethnic_id=f.Ethnic_id where e.img='$n2' and fp.Ethnic_id='$check'";
                $q = mysqli_query( $conn, $sql );
                $arr2=array();
                while ($row = mysqli_fetch_array($q)){
                  $lat = $row['Foodplace_latitude'];
                  $lon = $row['Foodplace_longitude'];
                  $open0 = $row['Foodplace_open'];
                  $close0 = $row['Foodplace_clo'];
                  $name = $row['Foodplace_name'];
                  $detail = $row['Foodplace_detail'];
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