 <html>
 <head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
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

<body onload="load()" style="background-image:url(b2.jpg); ">

 <!--<div class="container">
 		<div class="jumbotron jumbotron-new">
		<h2>Αναμονή για QR Code</h2>
		</div></div>-->

 <!--<div class="container">
		<div class="row">
  		<div class="col-md-4">
-->

<div style="width:100%; height:100%; padding:15px; ">

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
 echo '<p style="font-size: 37px; text-shadow: 3px 2px 2px black; color:darkred;">Επιτυχής Ενημέρωση της: '.$dema."</p>";
}else{ //den uparxei tetia paragkeleia sto sistima
   echo '<p style="font-size: 37px; text-shadow: 3px 2px 2px black; color:darkred;">Αποτυχία (λανθασμένος QR)'."</p>";
 }

?>
<strong><p style="font-size:64px; font-family:verdana; text-shadow: 4px 2px 2px darkred; text-align:center;">ΣΥΣΤΗΜΑ ΑΠΟΘΗΚΩΝ</p></strong>
	 <center>
	<canvas id="qr-canvas" width="640" height="480" style=" display:none"></canvas>
	<div style="width:100%; height:825px; padding:5px; border:4px; border-style:outset; border-color:darkred; border-radius:10px; background-image:url(fordiv.jpg); ">
	<br><table style="width:100%; ">
    <tr >
	<td style="width:50%; font-size:38px; color:white;">Χρήστης: <?php
	
	//session_start();
if (isset($_SESSION['username'])){
	
}else{
session_destroy();
header("Location:http://localhost:8080/main.html");
//echo "ok";
}
echo " "; echo $_SESSION['name']; echo", "; echo $_SESSION['lastname'];
	?></td>
	<td style="width:50%; font-size:38px; font-color:white; text-align:right;"><a href="logoff.php" style="color: orange;">Έξοδος</a></td>
	</tr>
	</table>
	<h1 style="color:grey; font-family:verdana; text-shadow:5px 3px 3px darkred;"><strong>ΣΑΡΩΣΗ QR ΚΩΔΙΚΩΝ</strong></h1>
	
	<div id="outdiv" style="border:4px; border-style:outset; width:647px; border-color:darkred; border-radius:10px;">
	</div>
		<div id="result" style="font-size:20px; color:yellow;">Αποτέλεσμα Σάρωσης


</div>
		
			<button type="button"  onclick="UpdateDema()" style="font-size:46px; display:block; color:white; border-color:grey; border-size:0px; border-radius:7px; background-color:darkred;">ΕΝΗΜΕΡΩΣΗ</button></div>
</center>
</div>
	
 <!--</div></div></div>-->
		
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
   	window.location.href = "update.php?QR=" + tnscan}
	</script>

</body>
</html>
