<?php

session_start();
$myvar=$_POST['koddematos'];
if($myvar != NULL){
$_SESSION['paradosi']=$myvar; }
header('Location: givedelivery.php');
//$query = "SELECT poli,onomasia FROM hub";
//$result = $mysql_con->query($query);
?>