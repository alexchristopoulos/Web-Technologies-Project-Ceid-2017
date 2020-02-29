<?php
session_start();
$db_server["host"] = "localhost"; //database server
$db_server["username"] = "root"; // DB username
$db_server["password"] = ""; // DB password
$db_server["database"] = "projectweb";// database name
$onoma=$_POST['onoma'];
$epitheto=$_POST['epitheto'];
$sinthimatiko=$_POST['sinthimatiko'];
$idiotita=$_POST['idiot'];
$kodikos=$_POST['kodikos'];
$taut=$_POST['tautotita'];
$per=$_POST['perioxi'];
$mysql_con = mysqli_connect($db_server["host"], $db_server["username"], $db_server["password"], $db_server["database"]);
$mysql_con->query ('SET CHARACTER SET utf8');
$mysql_con->query ('SET COLLATION_CONNECTION=utf8_general_ci');
$query = "INSERT INTO user (username,password,idiotia,name,lastname,identitycode,perioxi) VALUES ('$sinthimatiko','$kodikos','$idiotita','$onoma','$epitheto','$taut','$per');";
//$result = $mysql_con->query($query);
if ($mysql_con->query($query) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: ";
}
header('Location: upallilos.php');
?>