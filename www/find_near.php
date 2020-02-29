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
$query = "SELECT * FROM katastima;";

$result = $mysql_con->query($query);
$i=0;
$count=0;
while($row = $result->fetch_array())
{
$rows[] = $row;
}

foreach($rows as $row)
{
	
}
$tmp = $_POST['latlng'];
$tmp=trim($tmp,"()");
$temp=explode(",",$tmp);
$ref = array(floatval($temp['0']),floatval($temp['1'])); 
//print_r($ref);
$items = $rows;
$distances = array_map(function($item) use($ref) {
	$tmprow=$item['sintetagmenes'];
	$latlongs = explode(",",$tmprow);
    $a = array(floatval($latlongs[0]),floatval($latlongs[1]));
    return distance($a, $ref);
}, $items);

asort($distances);

echo '<h3>Το Πλησιέστερο Κατάστημα σε εσάς:</h3>' .'Ονομασία Καταστήματος: '.$items[key($distances)]['onomasia']."<br> Οδός: ".$items[key($distances)]['odos']." ".$items[key($distances)]['arithmos']."<br>Πόλη: ".$items[key($distances)]['poli']."<br> Ταχυδρομικός Κωδικός: ".$items[key($distances)]['tk']."<br>Τηλέφωνο: ".$items[key($distances)]['tilefono'];

function distance($a, $b)
{
    list($lat1, $lon1) = $a;
    list($lat2, $lon2) = $b;

    $theta = $lon1 - $lon2;
    $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
    $dist = acos($dist);
    $dist = rad2deg($dist);
    $miles = $dist * 60 * 1.1515;
    return $miles;
}
?>