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
</style>
<body background="b2.jpg">
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
<div id= "board" style="padding: 4px;">
<h1 id="mytitle" style="font-family:verdana;">Καλώς ήρθατε!</h1><p style="font-size:16px;"> Έχετε συνδεθεί ως <?php
session_start();
if (isset($_SESSION['username'])){
	
}else{
session_destroy();
header("Location:http://localhost:8080/main.html");
echo "ok";
}
echo $_SESSION['name']; echo", "; echo $_SESSION['lastname'];
?><br></p>

</div>
</div>
</center>
</div>
<p style="font-size:12px;" align="right"><strong>Project web 2017</strong></p>
</body>
</html>