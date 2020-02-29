<html>
<head><meta = charset="UTF-8"></head>
<script>
function ajaxcall_view(){
	var xmlhttp;
	if (window.XMLHttpRequest){
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	} 
	else if (window.ActiveXObject){ // code for IE6, IE5.  
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	else {
		alert("Your browser does not support XMLHTTP!");
	}
	var url_="view.php";
	//xmlhttp.open("POST",url_,true);	
	xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("details").innerHTML = this.responseText;
            }
        };
		
        xmlhttp.open("POST","details.php",true);
        xmlhttp.send();
}
</script>
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
echo $_SESSION['name']; echo", "; echo $_SESSION['lastname']; $username = $_SESSION['username'];
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
<h2>Παράδοση Δέματος στον Πελάτη</h2>
<p>Παραδώστε το δέμα (Εφ'όσων βρίκσεται στα διαθέσιμα) στον πελάτη και στην συνέχεια ενημερώστε το σύστημα</p>
<div id= "board" style="padding: 4px; padding-left:25%; padding-right:25%; text-align:left;"><form id="updt" action="process2.php" method='post' accept-charset='UTF-8' enctype='multipart/form-data'>
Δώστε το tracking number του δέματος
<select name="koddematos">
<option></option>
<?php
$db_server["host"] = "localhost"; //database server
    $db_server["username"] = "root"; // DB username
    $db_server["password"] = ""; // DB password
    $db_server["database"] = "projectweb";// database name
    $mysql_con = mysqli_connect($db_server["host"], $db_server["username"], $db_server["password"], $db_server["database"]);
    $mysql_con->query('SET CHARACTER SET utf8');
    $mysql_con->query('SET COLLATION_CONNECTION=utf8_general_ci');
	$query1 = "SELECT perioxi FROM user WHERE username='$username';";
	$result1 = $mysql_con->query($query1);
	$i=0;
    $count=0;
    while($array1[$i] = $result1->fetch_array(MYSQLI_NUM))
    {
       $i++; $count++;
    }
	$trexon_katastima=$array1[0][0];
	//$trexon_hub=$array1[0][1];
	$query2 = "SELECT trackingnumber FROM apostoli WHERE topothesia='$trexon_katastima' AND katastasi != 'Ολοκληρώθηκε';";
	$result2 = $mysql_con->query($query2);
	$i=0;
    $count=0;
    while($array2[$i] = $result2->fetch_array(MYSQLI_NUM))
    {
       $i++; $count++;
    }
	for($i=0;$i<$count;$i++)
	{
		echo "<option value = ".$array2[$i][0].">".$array2[$i][0]."</option>";		
	}
	

?>
</select><center><hr>
<input type="submit" style="width:50%; display:block; color:white; background-color:darkblue;" value="Συνέχεια"/>

</form>

<?php

if(isset($_SESSION['paradosi'])){
	echo "<hr style='border-color:yellow; border-size:5px;'>";
	$kodikos=$_SESSION['paradosi'];
	$query = "UPDATE apostoli SET katastasi='Ολοκληρώθηκε' WHERE trackingnumber='$kodikos';";
    $result = $mysql_con->query($query);
	echo "Ολοκληρώθηκε!<br>"; unset($_SESSION['paradosi']);
}
	?>
</center>
</div>
</div>
</center>
</div>
<p style="font-size:12px;" align="right"><strong>Project web 2017</strong></p>
</body>
</html>