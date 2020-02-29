<html>
<head><meta = charset="UTF-8"></head>
 <title>QR CODE READER SYSTEM</title>
	<meta http-equiv="Content-Type" content="text/html charset=utf-8" />
	<script type="text/javascript" src="grid.js"></script>
	<script type="text/javascript" src="version.js"></script>
	<script type="text/javascript" src="detector.js"></script>
	<script type="text/javascript" src="formatinf.js"></script>
	<script type="text/javascript" src="errorlevel.js"></script>
	<script type="text/javascript" src="bitmat.js"></script>
	<script type="text/javascript" src="datablock.js"></script>
	<script type="text/javascript" src="bmparser.js"></script>
	<script type="text/javascript" src="datamask.js"></script>
	<script type="text/javascript" src="rsdecoder.js"></script>
	<script type="text/javascript" src="gf256poly.js"></script>
	<script type="text/javascript" src="gf256.js"></script>
	<script type="text/javascript" src="decoder.js"></script>
	<script type="text/javascript" src="qrcode.js"></script>
	<script type="text/javascript" src="findpat.js"></script>
	<script type="text/javascript" src="alignpat.js"></script>
	<script type="text/javascript" src="databr.js"></script>
	<script type="text/javascript" src="qrinit.js"></script>
 </head>
<style>
ul{
list-style-type: none;
margin: 0;
padding-top: 0px;
padding-left:5px;
padding-right:5px;
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
p{
text-shadow:2px 2px 4px grey;
font-size:16px;
font-family:verdana;
}
</style>
<body background="b2.jpg" onload="load()">
		<?php
session_start();
$db_server["host"] = "localhost"; //database server
$db_server["username"] = "root"; // DB username
$db_server["password"] = ""; // DB password
$db_server["database"] = "projectweb";// database name
$mysql_con = mysqli_connect($db_server["host"], $db_server["username"], $db_server["password"], $db_server["database"]);
$mysql_con->query ('SET CHARACTER SET utf8');
$mysql_con->query ('SET COLLATION_CONNECTION=utf8_general_ci');
//db init ok

$dema=$_GET['QR'];
$username=$_SESSION['username'];

$query1 = "SELECT * FROM apostoli WHERE trackingnumber='$dema';";
$result1 = $mysql_con->query($query1); $count=0;
$count = mysqli_num_rows($result1);
if ($count >= 1){ //uparxei antistixi paragkeleia
 $i = 0;

 while($array[$i] = $result1->fetch_array(MYSQLI_NUM))
 {
 $i++;
 }
 //print_r($array);
  $termatismos=$array['0']['1']; //pou theloume na paei

 //echo $termatismos;
 
//katastima
$query2 = "SELECT perioxi FROM user WHERE username='$username';";
$result2 = $mysql_con->query($query2); $count=0;
$count = mysqli_num_rows($result2);
 $i = 0;
 while($array1[$i] = $result2->fetch_array(MYSQLI_NUM))
 {
 $i++;
 }
$hub=$array1['0']['0'];
$query3 = "SELECT * FROM katastima WHERE hub='$hub' AND onomasia='$termatismos';"; //theloume na doume an o termatismos eksipireteitai apo auto to hub
$result3 = $mysql_con->query($query3); $count=0;
$count = mysqli_num_rows($result3);
if($count>=1)
{
	//paradosi sto katastima kai enimerosi (hub p eksipiretei ton termatismo)
 $i = 0;
 while($array2[$i] = $result3->fetch_array(MYSQLI_NUM))
 {
 $i++;
 }
 $query4 = "UPDATE apostoli SET topothesia='$termatismos' WHERE trackingnumber='$dema';";
$query5="INSERT INTO topologia (trackingnumber,perioxi) VALUES( '$dema' , '$hub' );";
$mysql_con->query($query4);
$mysql_con->query($query5);

//$hub=$array2['0']['0'];
}else{
	$query4 = "UPDATE apostoli SET topothesia='$hub' WHERE trackingnumber='$dema';";
$query5="INSERT INTO topologia (trackingnumber,perioxi) VALUES ( '$dema' , '$hub' );";
$mysql_con->query($query4);
$mysql_con->query($query5);
	//enimerosi topologias
}
 echo '<p style="font-size: 14px;  color:darkred;">Επιτυχής Ενημέρωση της: '.$dema."</p>";
}else{ //den uparxei tetia paragkeleia sto sistima
   echo '<p style="font-size: 14px;  color:darkred;">Αποτυχία (λανθασμένος QR)'."</p>";
 }

?><CENTER>
<h1 style="font-family:verdana;">ΣΥΣΤΗΜΑ ΑΠΟΘΗΚΩΝ</h1></center>
<div style="padding:25px; padding-top:3px; ">
<center>
<div style="padding:0px; border:solid; border-size:5px; border-color:grey; overflow-y:auto; border-top:0px; border-bottom:0px; background-color:white; background-image:url(maindiv.jpg); height:850px; width:920px;">
<img src="top.jpg" width="100%" height="185px" align="middle"/>
 <ul>
  <li><a href="scannerpc.php">Σάρωση QR codes</a></li>
  <li style="float:right;"><a href="logoff.php" >Έξοδος</a></li>
 
</ul>
<p style="text-align:left font-size:28px;">Έχετε συνδεθεί ως
	<?php

if (isset($_SESSION['username'])){
	
}else{
session_destroy();
header("Location:http://localhost:8080/main.html");
//echo "ok";
}
echo " "; echo $_SESSION['name']; echo", "; echo $_SESSION['lastname'];
	?>
	<canvas id="qr-canvas" width="640" height="480" style=" display:none"></canvas>
	<div id="outdiv" style="border:4px; border-style:outset; width:640px; border-color:grey; border-radius:10px;">
	</div>
		<div id="result" style="font-size:12px; color:black;">Αποτέλεσμα Σάρωσης</div>
		
			<button type="button"  onclick="UpdateDema()" style="font-size:20px; display:block; color:white; border-color:grey; border-size:0px; border-radius:7px; background-color:darkred;">ΕΝΗΜΕΡΩΣΗ</button></div>
</div>


</div>
<p style="font-size:12px;" align="right"><strong>Project web 2017</strong></p>
	<script type="text/javascript">
	function UpdateDema() { 
		var tnscan = document.getElementById("result").innerText;
		//alert(tnscan);
/*	var xmlhttp;
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
	var url_="update.php";
	//xmlhttp.open("POST",url_,true);	
	xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("result").innerHTML = this.responseText;
				tnscan='';
            }
        };
        xmlhttp.open("POST","update.php",true);
		xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send("trackid="+tnscan);
	}*/
   	window.location.href = "updatepc.php?QR=" + tnscan}
	</script>
</body>
</html>