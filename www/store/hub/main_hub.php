<html><head><meta charset="UTF-8"/>
</head>
<style>
html, body, #full {
  height: 100%;
}

#full {
  display: flex;
  flex-direction: column;
}

#someid {
  flex-grow: 1;
} h1{ font-size:58px;}
ul{ 
list-style-type: none;
margin: 0;
padding-top: 0px;
padding-left:5px;
padding-right:5px;
position :absolute; left:0px; right:0%;
overflow: hidden;
background-color: darkred;
}
li{ //rgba(54, 25, 25, .2);
float: left;
}
td{ width:33.33%;
}
p{ font-size:24px;}
li a{
display: block;
color: lightgrey;
font-family:verdana;
font-size:34px;
text-align: center;
padding: 28px 20px;
text-decoration: none;
}
li a:hover {
background-color: #111;
} div{ background-repeat: no-repeat;
    background-size: 100% 100%; }
</style>

<body style="padding:0; margin:0;">
<div id="full" style="top:0;">
	<div id="header" style=" background-image:url(img1.jpg);"><!--<img src="img1.jpg" width="100%" height="220px"><center>-->
<center><h1  style="text-shadow: 3px 3px 5px white; top:0px; left:25%; right:25%; color:rgba(0,0,0,.8); font-family:verdana;">ΣΤΥΣΤΗΜΑ ΑΠΟΘΗΚΩΝ</h1></center><!--style="position:absolute;-->
<table width="100%" style="padding:0px; border:2px;  border-color:darkred; height:12%; border-bottom-style:outset; background-color:rgba(145, 26, 26,.52);">
<tr style="width:100%; height:100%;  padding:0;">
<td>
<form action="scanner.php" style="height:90%; width:100%;">
<input type="submit" value="Σάρωση Εικόνας QR"
 style=" display:block; height:100%; width:100%; text-shadow: 3px 3px 5px black; background-color:rgba(145, 26, 26, .52); display:block; color:orange; font-size:30px; padding:10px; border-color:grey;"/></form></td>
<!--<td><button style="width:100%; height:100%; text-shadow: 3px 3px 5px black; background-color:rgba(145, 26, 26, .52); display:block; color:orange; font-size:30px; padding:10px; border-color:grey;">Σάρωση QR code</button></td>-->
<!--<td><button style="width:100%;  height:100%; text-shadow: 3px 3px 5px black; background-color:rgba(145, 26, 26, .52); display:block; color:orange; font-size:30px; padding:10px; border-color:grey;">Επιλογή QR εικόνας</button></td>-->

<td>
<form action="logoff.php" style="height:90%; width:100%;">
<input type="submit" value="Αποσύνδεση"
 style=" display:block; height:100%; width:100%; text-shadow: 3px 3px 5px black; background-color:rgba(145, 26, 26, .52); display:block; color:orange; font-size:30px; padding:10px; border-color:grey;"/></form></td></tr>
</table>
</div>
    <div id="someid" style="background-image: url(b2.jpg);">
	<p style="text-align:left font-size:28px;">Έχετε συνδεθεί ως
	<?php
	session_start();
if (isset($_SESSION['username'])){
	
}else{
session_destroy();
header("Location:http://localhost:8080/main.html");
//echo "ok";
}
echo " "; echo $_SESSION['name']; echo", "; echo $_SESSION['lastname'];
	?>
	</p><div style="padding-top:0px; padding-left:14px; padding-right:14px;">
	<div id="someid"style="background: rgba(255, 255, 255, .37);  padding:15px; border:2px; border-color:lightgrey; border-style:outset; padding-top:2px; height:950px; border-radius:8px;"><!--box-shadow:6px 6px 3px darkgrey;-->
	<h1 style="text-shadow: 2px 2px 4px blue; font-size:45px; color:rgb(173, 83, 31); font-family:verdana;"><center>ΟΔΗΓΙΕΣ</center></h1>
	<p>Σάρωση QR image: Μέσω της κάμερας της συσκευής σαρώστε το QR του δέματος</p>
	<p>Επιλογή QR image: Επιλέξτε μία φωτογραφία με QR που είναι αποθηκευμένη στην συκευή σας</p>
	<p>Αποσύνδεση: Για να αποσυνδεθείτε</p>
	</div><p style="text-align:right; font-size:12px;"><strong>Project Web 2017</strong></p></div>
	</div>
</div>


</body> 
</html>