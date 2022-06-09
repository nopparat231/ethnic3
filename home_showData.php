// 10-18 2//
<?php
$sql = "SELECT * FROM ethnicdata where Ethnic_id like 'E1%'";
$q = mysqli_query( $conn, $sql );
$c= 1;
    while ($f = mysqli_fetch_assoc($q)){
    echo $f['Ethnic_nameth']." - ".$f['Ethnic_nameen']."<br/>";
    $c++;
    if($c>=10){
      return false;
    }

}
?>


// 19-27 3//
<?php
$sql = "SELECT * FROM ethnicdata where Ethnic_id like 'E19' or Ethnic_id like 'E2%'";
$q = mysqli_query( $conn, $sql );
$c= 1;
    while ($f = mysqli_fetch_assoc($q)){
    echo $f['Ethnic_nameth']." - ".$f['Ethnic_nameen']."<br/>";
    $c++;
    if($c>=10){
      return false;
    }

}
?>


// 28-36 4//
<?php
$sql = "SELECT * FROM ethnicdata where Ethnic_id like 'E28'  or Ethnic_id like 'E29'  or Ethnic_id like 'E3%'";
$q = mysqli_query( $conn, $sql );
$c= 1;
    while ($f = mysqli_fetch_assoc($q)){
    echo $f['Ethnic_nameth']." - ".$f['Ethnic_nameen']."<br/>";
    $c++;
    if($c>=10){
      return false;
    }

}
?>


// 37-45 5//
<?php
$sql = "SELECT * FROM ethnicdata where Ethnic_id like 'E37'  or Ethnic_id like 'E38' or Ethnic_id like 'E39' or Ethnic_id like 'E4%'";
$q = mysqli_query( $conn, $sql );
$c= 1;
    while ($f = mysqli_fetch_assoc($q)){
    echo $f['Ethnic_nameth']." - ".$f['Ethnic_nameen']."<br/>";
    $c++;
    if($c>=10){
      return false;
    }

}
?>


// 46-54 6//
<?php
$sql = "SELECT * FROM ethnicdata where Ethnic_id like 'E46'  or Ethnic_id like 'E47' or Ethnic_id like 'E48' or Ethnic_id like 'E49' or Ethnic_id like 'E5%'";
$q = mysqli_query( $conn, $sql );
$c= 1;
    while ($f = mysqli_fetch_assoc($q)){
    echo $f['Ethnic_nameth']." - ".$f['Ethnic_nameen']."<br/>";
    $c++;
    if($c>=10){
      return false;
    }

}
?>


// 55-63 7//
<?php
$sql = "SELECT * FROM ethnicdata where Ethnic_id like 'E55'  or Ethnic_id like 'E56' or Ethnic_id like 'E57' or Ethnic_id like 'E58' or Ethnic_id like 'E59' or Ethnic_id like 'E6%'";
$q = mysqli_query( $conn, $sql );
$c= 1;
    while ($f = mysqli_fetch_assoc($q)){
    echo $f['Ethnic_nameth']." - ".$f['Ethnic_nameen']."<br/>";
    $c++;
    if($c>=10){
      return false;
    }

}
?>


// 64-72 8//
<?php
$sql = "SELECT * FROM ethnicdata where Ethnic_id like 'E64'  or Ethnic_id like 'E65' or Ethnic_id like 'E66' or Ethnic_id like 'E67' or Ethnic_id like 'E68' or Ethnic_id like 'E69'  or Ethnic_id like 'E7%'";
$q = mysqli_query( $conn, $sql );
$c= 1;
    while ($f = mysqli_fetch_assoc($q)){
    echo $f['Ethnic_nameth']." - ".$f['Ethnic_nameen']."<br/>";
    $c++;
    if($c>=10){
      return false;
    }

}
?>



// 73-74 9//
<?php
$sql = "SELECT * FROM ethnicdata where Ethnic_id like 'E73'  or Ethnic_id like 'E74'";
$q = mysqli_query( $conn, $sql );
$c= 1;
    while ($f = mysqli_fetch_assoc($q)){
    echo $f['Ethnic_nameth']." - ".$f['Ethnic_nameen']."<br/>";
    $c++;
    if($c>=3){
      return false;
    }

}
?>
