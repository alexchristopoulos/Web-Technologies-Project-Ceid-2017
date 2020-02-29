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
li{
float: left;
}
input{
	width:100%;
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
#container
{
    position:relative;
	position:relative;
	height:200px;
	width:100%;
}

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
input:hover{
cursor:pointer;
}
</style>
<body background="b2.jpg">
<p id="mytitle" style="font-family:verdana;">Έχετε συνδεθεί ως <?php
session_start();
if (isset($_SESSION['username'])){
	
}else{
session_destroy();
header("Location:http://localhost:8080/main.html");
}
echo $_SESSION['name']; echo", "; echo $_SESSION['lastname'];
?><br></p>
<div style="padding:25px; padding-top:10px; ">


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
<div id= "board" style="padding: 3px; padding-right:25%; padding-left:25%;">
<form action="find_path.php" method='post' accept-charset='UTF-8' enctype='multipart/form-data' style="text-align:left;">
<center><h1>ΔΗΜΙΟΥΡΓΙΑ ΑΠΟΣΤΟΛΗΣ</h1>
Πόλη Εκκίνησης(Πλησιέστερο HUB): <select name="ekkinisi">
<?php
$db_server["host"] = "localhost"; //database server
$db_server["username"] = "root"; // DB username
$db_server["password"] = ""; // DB password
$db_server["database"] = "projectweb";// database name
$mysql_con = mysqli_connect($db_server["host"], $db_server["username"], $db_server["password"], $db_server["database"]);
$mysql_con->query('SET CHARACTER SET utf8');
$mysql_con->query('SET COLLATION_CONNECTION=utf8_general_ci');
$query = "SELECT poli,onomasia FROM katastima";
$result = $mysql_con->query($query);
$i=0;
$count=0;
while($row = $result->fetch_array())
{
$rows[] = $row;
}

foreach($rows as $row)
{
	
	echo "<option value=";
	echo $row['onomasia'];
	echo ">";
	echo $row['onomasia'];
	 echo "</option>";
}
?>
</select><hr>
Προορισμός: <select name="termatismos">

<?php
foreach($rows as $row)
{
	
	echo "<option value=";
	echo $row['onomasia'];
	echo ">";
	echo $row['onomasia'];
	 echo "</option>";
}
?>

</select><hr>
<h3>ΤΥΠΟΣ ΔΕΜΑΤΟΣ:</h3><hr>
Είναι  express |<input type="radio" style="width:5%;" name="type" value="express">| Είναι απλό δέμα |<input type="radio"  style="width:5%;" name="type" value="aplo">|
</center><div style="padding-top:20px;"><input type="submit" value="Καταχώρηση Αποστολής" style=" border-radius:8px; background-color:darkblue; font-size:20px; color:white;"/></div>
</form>
</div>
</div>
</center>
</div>
<p style="font-size:12px;" align="right"><strong>Project web 2017</strong></p>
</body>
</html>