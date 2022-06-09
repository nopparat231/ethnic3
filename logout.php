<?php
session_start();
unset ( $_SESSION["Email"] );
unset ( $_SESSION["Password"] );
session_destroy();
session_start();
/*$_SESSION["Email"]="";*/
/*if($_SESSION["Email"]=="")*/ if(!isset($_SESSION["Email"])){ 

    Header("Location: index.php");
  }
?>