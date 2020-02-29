<html>
<head><meta = charset="UTF-8"></head>
<style>
ul{
list-style-type: none;
margin: 0;
padding: 0;
overflow: hidden;
background-color: darkred;
}
.brdr {
	padding:3px;
   border: 2px solid black;
   font-family:verdana;
   font-size:12px;
}
.brda {
	padding:3px;
   border: 2px solid black;
   background-color:darkgreen;
   font-size:15px;
   color:white;
}
li{
float: left;
}
li a{
display: block;
color: lightgrey;
font-family:verdana;
text-align: center;
padding: 14px 16px;
text-decoration: none;
}
li a:hover {
background-color: #111;
}
input{
	width:100%;
}
#container
{
    position:relative;
	position:relative;
	height:200px;
	width:100%;
}
input:hover{
cursor:pointer; }
#logoimage
{    
    position:absolute;
    left:0;
    top:0;
	height:200px;
	width:100%;
}
#logotext
{
    z-index:100;
    position:absolute;    
    color:black;
    font-weight:bold;
    left:25%;
    right:25%;
	top:10%;
	font-family:verdana;
}
</style>
<body background="b2.jpg">
<p>Έχετε συνδεθεί ως <?php
session_start();
if (isset($_SESSION['username'])){
	
}else{
session_destroy();
header("Location:http://localhost:8080/main.html");
echo "ok";
}
echo $_SESSION['name']; echo", "; echo $_SESSION['lastname'];
?><br></p>
<div style="padding:25px; padding-top:5px; ">

<center>
<div style="padding:0px; border:solid; border-size:5px; border-color:grey; overflow-y:auto; border-top:0px; border-bottom:0px; background-color:white; background-image:url(maindiv.jpg); height:850px; width:920px;">
<div id="container" style ="width:100%;">
    <img id="logoimage" src="storepackage.jpg"/>
    <h1 id="logotext">
        Σύστημα Διαχείρησης Αποστολών
</div>
 <ul>
  <li><a href="createdelivery.php">Δημιουργία Αποστολής</a></li>
  <li><a href="viewdelivery.php">Παρακολούθηση Αποστολής</a></li>
  <li><a href="givedelivery.php">Παράδοση Δέματος</a></li>
  <li style="float:right"><a class="active" href="logoff.php">Αποσύνδεση</a></li>
</ul>
<h2>Παρακολούθηση Αποστολής</h2>
<div id= "board" style="padding: 4px; padding-left:25%; padding-right:25%; text-align:left;"><form id="updt" action="process.php" method='post' accept-charset='UTF-8' enctype='multipart/form-data'>
Δώστε το tracking number του δέματος
<input type="text" name="dema" /><center><hr>
<input type="submit" style="width:50%; display:block; color:white; background-color:darkblue;" value="Συνέχεια"/>

</form>
</div>
<?php

if(isset($_SESSION['dema'])){
	echo "<hr style='border-color:yellow; border-size:5px;'>";
	$kodikos=$_SESSION['dema'];
	$db_server["host"] = "localhost"; //database server
    $db_server["username"] = "root"; // DB username
    $db_server["password"] = ""; // DB password
    $db_server["database"] = "projectweb";// database name
    $mysql_con = mysqli_connect($db_server["host"], $db_server["username"], $db_server["password"], $db_server["database"]);
    $mysql_con->query('SET CHARACTER SET utf8');
    $mysql_con->query('SET COLLATION_CONNECTION=utf8_general_ci');
    $query = "SELECT * FROM apostoli WHERE trackingnumber='$kodikos';";
    $result = $mysql_con->query($query);
$i=0;
$count=0;
while($array[$i] = $result->fetch_array(MYSQLI_NUM))
 {
 $i++; $count++;
 }
 $i=0;
 $j=0;
 echo "<h2 style='font-family:verdana;'>Κατάσταση Αποστολής</h2>";
 
 echo "<table>";
 echo "<tr class='brda'>";
 echo "<th class='brda'>"; echo "Εκκίνηση"; echo "</th>";
  echo "<th class='brda'>"; echo "Τερματισμός"; echo "</th>";
   echo "<th class='brda'>"; echo "Κωδικός"; echo "</th>";
    echo "<th class='brda'>"; echo "Κατάσταση"; echo "</th>";
	 echo "<th class='brda'>"; echo "Τύπος"; echo "</th>";
 echo "</tr>";
 $diadromi;
 for($i=0;$i<$count;$i++)
 {
	 echo "<tr class='brdr'>";
	 for($j=0;$j<6;$j++)
	 {
		 
		 
		 if($j>=5){
			 $diadromi=$array[$i][$j];
			 }else{
			 echo "<th class='brdr'>"; echo $array[$i][$j]; echo "</th>"; 
		 }
		 
      }
  echo "</tr>";
	 
 }
 echo "</table>";
 echo "Διαδρομή  :".$diadromi."Κατάστημα";
	//upload successfull process qrimage and provide output as html
	echo "<h2 style='font-family:verdana;'>Τοποθεσίες που έχει περάσει</h2><br>";
	$query = "SELECT perioxi FROM topologia WHERE trackingnumber='$kodikos';";
    $result1 = $mysql_con->query($query);
		while($row = $result1->fetch_array())
{
$rows[] = $row;
}
echo "<div style='width:60%;'><p style = 'font-family:verdana; text-align:left;' >";
foreach($rows as $row)
{
	echo $row['perioxi'].", ";
}
echo "</p></div>";
}

?>
</center>

</div>
</center>
</div>
<p style="font-size:12px;" align="right"><strong></strong></p>
</body>
</html>