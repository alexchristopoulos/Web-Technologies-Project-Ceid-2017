<style>
.brdr {
	padding:3px;
   border: 2px solid black;
   font-family:verdana;
}
.brda {
	padding:3px;
   border: 2px solid black;
   background-color:darkgreen;
   font-size:16px;
   color:white;
}
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
$query = "SELECT * FROM user";
$result = $mysql_con->query($query);
$i=0;
$count=0;
while($array[$i] = $result->fetch_array(MYSQLI_NUM))
 {
 $i++; $count++;
 }
 $i=0;
 $j=0;
 echo "<h2 style='font-family:verdana;'>Λίστα Λογαριασμών</h2>";
 echo "<hr style='border-color:yellow; border-size:5px;'>";
 echo "<table>";
 echo "<tr class='brda'>";
 echo "<th class='brda'>"; echo "Συνθηματικό"; echo "</th>";
  echo "<th class='brda'>"; echo "Κωδικός"; echo "</th>";
   echo "<th class='brda'>"; echo "Ιδιότητα"; echo "</th>";
    echo "<th class='brda'>"; echo "Όνομα"; echo "</th>";
	 echo "<th class='brda'>"; echo "Επώνυμο"; echo "</th>";
	  echo "<th class='brda'>"; echo "Αριθμός Ταυτότητας"; echo "</th>";
	  echo "<th class='brda'>"; echo "Περιοχή"; echo "</th>";
 echo "</tr>";
 for($i=0;$i<$count;$i++)
 {
	 echo "<tr class='brdr'>";
	 for($j=0;$j<7;$j++)
	 {
		 echo "<th class='brdr'>"; echo $array[$i][$j]; echo "</th>";
	 }
	 echo "</tr>";
 }
 echo "</table>";
 //print_r($array);
 //echo "ok";
//echo json_encode(array("result"=>$res));
//sleep(1);
?>