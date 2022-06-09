<?php include("Connect.php");?>
<?php
if(isset($_GET['search'])){
$name = $_GET['search'];
echo $name;
$sqlsearch =$conn->query( "SELECT * FROM ethnicdata where Ethnic_nameth = '".$name."'");
  //if($result=mysqli_query($conn,$sqlsearch)){
    //if(mysqli_num_row($result)>0){
      while($row=$sqlsearch->fetch_assoc()){
        echo $row["Ethnic_nameth"];
          }
    //}
  //}
/*$search = isset($_GET['search']) ? $_GET['search']: '';
$sqlsearch = "SELECT * FROM ethnicdata where Ethnic_nameth like '%search%'";
$resultsearch = $conn->query($sqlsearch);
if($resultsearch->num_rows>0){
while($row=$resultsearch->fetch_assoc()){
echo $row["Ethnic_nameth"];
  }
}*/
}
?>