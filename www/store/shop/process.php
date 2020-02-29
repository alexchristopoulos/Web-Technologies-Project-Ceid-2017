<?php

session_start();
$myvar=$_POST['dema'];
if($myvar != NULL){
$_SESSION['dema']=$myvar; }
header('Location:viewdelivery.php');
//$query = "SELECT poli,onomasia FROM hub";
//$result = $mysql_con->query($query);
?>