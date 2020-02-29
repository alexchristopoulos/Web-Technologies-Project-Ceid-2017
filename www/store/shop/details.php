<style>
</style>
<?php
session_start();
header('Content-type: text/plain; charset=UTF-8');
$db_server["host"] = "localhost"; //database server
$db_server["username"] = "root"; // DB username
$db_server["password"] = ""; // DB password
$db_server["database"] = "projectweb";// database name
$mysql_con = mysqli_connect($db_server["host"], $db_server["username"], $db_server["password"], $db_server["database"]);
$mysql_con->query('SET CHARACTER SET utf8');
$mysql_con->query('SET COLLATION_CONNECTION=utf8_general_ci');
$query1 = "SELECT * FROM apostoli";
$result1 = $mysql_con->query($query1);
$i=0;
$count=0;
while($row = $result1->fetch_array())
{
$rows[] = $row;
}

foreach($rows as $row)
{
	
	echo "<option value=";
	echo $row['onomasia'];
	echo ">";
	echo $row['poli'];
	 echo "</option>";
}
?>