<?php
session_start();
$db_server["host"] = "localhost"; //database server
$db_server["username"] = "root"; // DB username
$db_server["password"] = ""; // DB password
$db_server["database"] = "projectweb";// database name
$onomasia=$_POST['onomasia'];
$mysql_con = mysqli_connect($db_server["host"], $db_server["username"], $db_server["password"], $db_server["database"]);
$mysql_con->query ('SET CHARACTER SET utf8');
$mysql_con->query ('SET COLLATION_CONNECTION=utf8_general_ci');
$query = "DELETE FROM katastima WHERE onomasia='$onomasia';";
//$result = $mysql_con->query($query);
if ($mysql_con->query($query) === TRUE) {
    echo "New record deleted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
header('Location: stores.php');
?>