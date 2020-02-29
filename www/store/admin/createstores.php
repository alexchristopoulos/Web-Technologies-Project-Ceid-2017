<?php
session_start();
$db_server["host"] = "localhost"; //database server
$db_server["username"] = "root"; // DB username
$db_server["password"] = ""; // DB password
$db_server["database"] = "projectweb";// database name
$onom=$_POST['onomasia']; echo $onom;
$odo=$_POST['odos']; echo $odo;
$arithmos=$_POST['arithmos']; echo $arithmos;
$poli=$_POST['poli']; echo $poli;
$tk=$_POST['tk']; echo $tk;
$til=$_POST['til']; echo $til;
$sintetagmenes=$_POST['sintet']; echo $sintetagmenes."|";
$hub=$_POST['hub']; echo $hub."|";
$mysql_con = mysqli_connect($db_server["host"], $db_server["username"], $db_server["password"], $db_server["database"]);
$mysql_con->query ('SET CHARACTER SET utf8');
$mysql_con->query ('SET COLLATION_CONNECTION=utf8_general_ci');
$query = "INSERT INTO katastima (onomasia,odos,arithmos,poli,tk,tilefono,sintetagmenes,hub) VALUES ('$onom','$odo','$arithmos','$poli','$tk','$til','$sintetagmenes','$hub');";
//$result = $mysql_con->query($query);
if ($mysql_con->query($query) === TRUE) {
    echo "New record created successfully";
} else {
	printf("Errormessage: %s\n", mysqli_error($mysql_con));
    echo "Error: ";
}
header('Location: stores.php');
?>