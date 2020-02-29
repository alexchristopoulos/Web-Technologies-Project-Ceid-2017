<?php

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
$i++;
}
$count=$i; $i=0; //$a[];
for($i=0;$i<$count;$i++)
{
	$poli[]=$rows[$i]['poli'];
	$onomasia[]=$rows[$i]['onomasia'];
	$tilefono[]=$rows[$i]['tilefono'];
	$odos[]=$rows[$i]['odos'];
	$arithmos[]=$rows[$i]['arithmos'];
	$tk[]=$rows[$i]['tk'];
}
// get the q parameter from URL
$q = $_REQUEST["q"];

$hint = "";
// lookup all hints from array if $q is different from "" 
if ($q !== "") {
    $q = strtolower($q);
    $len=strlen($q);
	$j=0; $l=1;
    foreach($poli as $name) {
        if (stristr($q, substr($name, 0, $len))) {
            /*if ($hint === "") {
			$hint = $name.$onomasia[$j];
            } else {
                $hint .= ", $name";
            }*/
			echo "<div style='border:2px; width:55%; background-color:rgba(255,255,255,.7); border-color:darkred; border-style:inset; border-radius:8px; border-color:black'><strong style='color:darkred'>".$l.") Πόλη: ".$name."</strong><hr>Ονομασία Καταστήματος: ".$onomasia[$j]."<br>Οδός: ".$odos[$j]." ".$arithmos[$j]."<br>Τηλέφωνο: ".$tilefono[$j]."<br>TK: ".$tk[$j]."</div><br>";
$l++;       
	   }
		$j++;
    }
}

// Output "no suggestion" if no hint was found or output correct values 
echo $hint === "" ? "" : $hint;
?>