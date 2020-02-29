<?php
session_start();
$db_server["host"] = "localhost"; //database server
$db_server["username"] = "root"; // DB username
$db_server["password"] = ""; // DB password
$db_server["database"] = "projectweb";// database name
$mysql_con = mysqli_connect($db_server["host"], $db_server["username"], $db_server["password"], $db_server["database"]);
$mysql_con->query('SET CHARACTER SET utf8');
$mysql_con->query('SET COLLATION_CONNECTION=utf8_general_ci');
$xristis=$_POST['olds'];
$neo_sinthimatiko=$_POST['news'];
$neos_kodikos=$_POST['newp'];
$query = "UPDATE `user` SET username='$neo_sinthimatiko', password='$neos_kodikos' WHERE username='$xristis' ";
$result = $mysql_con->query($query);
header('Location: upallilos.php');
?>