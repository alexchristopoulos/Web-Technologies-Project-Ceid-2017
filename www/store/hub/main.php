<html>
<head><meta = charset="UTF-8"></head>
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
<body background="b2.jpg"><CENTER>
<h1 style="font-family:verdana;">ΣΥΣΤΗΜΑ ΑΠΟΘΗΚΩΝ</h1></center>
<div style="padding:25px; padding-top:3px; ">
<center>
<div style="padding:0px; border:solid; border-size:5px; border-color:grey; overflow-y:auto; border-top:0px; border-bottom:0px; background-color:white; background-image:url(maindiv.jpg); height:850px; width:920px;">
<img src="top.jpg" width="100%" height="185px" align="middle"/>
 <ul>
  <li><a href="scannerpc.php">Σάρωση QR codes</a></li>
  <li style="float:right;"><a href="logoff.php" >Έξοδος</a></li>
 
</ul>
<CENTER>
<h1 style="font-family:verdana;">ΚΑΛΩΣ ΗΡΘΑΤΕ</h1></center>
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
</div>


</div>
<p style="font-size:12px;" align="right"><strong>Project web 2017</strong></p>
</body>
</html>