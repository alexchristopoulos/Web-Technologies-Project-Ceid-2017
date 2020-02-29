<?php
session_start();
$db_server["host"] = "localhost"; //database server
$db_server["username"] = "root"; // DB username
$db_server["password"] = ""; // DB password
$db_server["database"] = "projectweb";// database name
$mysql_con = mysqli_connect($db_server["host"], $db_server["username"], $db_server["password"], $db_server["database"]);
$mysql_con->query('SET CHARACTER SET utf8');
$mysql_con->query('SET COLLATION_CONNECTION=utf8_general_ci');
$oldonomasia=$_POST['oldonomasia'];
$onomasia=$_POST['onomasia'];
$odos=$_POST['odos'];
$arithmos=$_POST['arithmos'];
$poli=$_POST['poli'];
$tk=$_POST['tk'];
$tilefono=$_POST['til'];
$sintetagmenes=$_POST['sintet'];
$hub=$_POST['hub'];
$query = "UPDATE `katastima` SET onomasia='$onomasia', odos='$odos' , arithmos='$arithmos' , poli='$poli' , tk='$tk' , tilefono='$tilefono' , sintetagmenes='$sintetagmenes' , hub='$hub' WHERE onomasia='$oldonomasia' ";
//$result = $mysql_con->query($query);
if ($mysql_con->query($query) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: ";
}
header('Location: stores.php');
?>