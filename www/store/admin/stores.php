<html>
<head><meta = charset="UTF-8" http-equiv="Content-Type" content="text/html">
<script language="JavaScript">
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
                document.getElementById("viewdiv").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("POST","viewstores.php",true);
        xmlhttp.send();
}
</script>
</head>
<style>
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
    color:lightblue;
    font-weight:bold;
    left:25%;
    right:25%;
	top:10%;
	font-family:verdana;
}
ul{
list-style-type: none;
margin: 0;
padding: 0;
overflow: hidden;
background-color: darkred;
}
button:hover{
cursor:pointer;
}
input:hover{
cursor:pointer;
}
hr{
	border-color:grey;
}
input{
	color:black; height:6%; width :100%;background-color: white; margin:auto;
 border-radius: 2px; padding:1px; border-color:white;
}
input type=radio{ width :5%; }
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
li a{
display: block;
color: lightgrey;
font-family:verdana;
text-align: center;
padding: 14px 16px;
border-size:0px;
border-color:transparent;
background-color:transparent;
text-decoration: none;
}
li button:hover {
background-color: #111;
}
li a:hover {
background-color: #111;
}
</style>
<body background="b2.jpg">
<p id="mytitle" style="font-size:20px; font-family:verdana;">Είστε Συνδεδεμένοι ως: <?php
session_start();
if (isset($_SESSION['username'])){
	
}else{
session_destroy();
header("Location:http://localhost:8080/main.html");
echo "ok";
}
echo $_SESSION['name']; echo", "; echo $_SESSION['lastname'];
?></p>
<div style="padding:25px; padding-top:6px; ">
<center>
<div style="padding:0px; border:solid; border-size:5px; border-color:grey; overflow-y:auto; border-top:0px; border-bottom:0px; background-color:white; background-image:url(maindiv.jpg); height:850px; width:920px;">
<div id="container" style ="width:100%;">
    <img id="logoimage" src="admin.jpg"/>
    <h1 id="logotext">
        Διαχείρηση Συστήματος
</div>
 <ul>
  <li><a href="stores.php">Καταστήματα</a></li>
  <li><a href="upallilos.php">Υπάλληλοι Καταστημάτων</a></li>
  <li style="float:right"><a class="active" href="logoff.php">Αποσύνδεση</a></li>
</ul>
<div id= "board" style="padding: 8px;">
<ul style="background-color:darkblue; border-radius:10px;">
  <li><a href="#create" onclick="showNewDiv()">Δημιουργία Καταστήματος</a></li>
  <li><a href="#delete" onclick="showDeleteDiv()">Διαγραφή Καταστήματος</a></li>
  <li style="float:right;"><a href="#update" onclick="showUpdateDiv()">Τροποποίηση Καταστήματος</a></li>
  <li style="float:right;"><a href="#viewall" onclick="showShowDiv()">Προβολή Όλων</a></li>
</ul>
<center>




<div id="newdiv"  style=" padding:10px; padding-top:5px; border-radius:10px; display:none; height:50%; background-color:transparent;">
<div style="padding:7px; padding-right:25%; padding-left:25%;">
<form action="createstores.php" method='post' accept-charset='UTF-8' enctype='multipart/form-data' style="text-align:left;">
Δώστε την ονομασία του καταστήματος (*Μια μοναδική ονομασία!)<input name ="onomasia" type="text"/>
Δώστε την οδό<input name ="odos" type="text"/>
Δώστε τον αριθμό της οδού<input name="arithmos" type="text"/>
Δώστε την πόλη<input name ="poli" type="text"/>
Δώστε τoν Ταχυδρομικό Κώδικα<input name ="tk" type="text"/>
Δώστε το τηλέφωνο<input name="til" type="text"/>
Δώστε τις γεωγραφικές συντεταγμένες<input name ="sintet" type="text"/>
<!--Δώστε την ονομασία του hub απο το οποίο εξυπηρετείται<input name="hub" type="text"/>-->
<hr>
HUB που θα το εξυπηρετεί <select name="hub">
<?php
$db_server["host"] = "localhost"; //database server
$db_server["username"] = "root"; // DB username
$db_server["password"] = ""; // DB password
$db_server["database"] = "projectweb";// database name
$mysql_con = mysqli_connect($db_server["host"], $db_server["username"], $db_server["password"], $db_server["database"]);
$mysql_con->query('SET CHARACTER SET utf8');
$mysql_con->query('SET COLLATION_CONNECTION=utf8_general_ci');
$query = "SELECT poli,onomasia FROM hub";
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
	echo $row['poli'];
	 echo "</option>";
}
?>
</select><hr>
<input type="submit" value="Αποθήκευση του Καταστήματος στην Βάση Δεδομένων" style="background-color:darkblue; color:white;"/>
</form>
</div>
</div>

<div id="deletediv"  style=" padding:10px; padding-top:5px; border-radius:10px; display:none; height:50%; background-color:transparent;">
<div style="padding:7px; padding-right:25%; padding-left:25%;">
<form action="deletestore.php" method='post' accept-charset='UTF-8' enctype='multipart/form-data' style="text-align:left;">
Δώστε την ονομασία του καταστήματος (*Προσοχή!)<input name ="onomasia" type="text"/>
<hr><input type="submit" value="Διαγραφή του Καταστήματος από την Βάση Δεδομένων" style="background-color:darkblue; color:white;"/>
</form>
</div>
</div>


<div id="updatediv"  style=" padding:10px; padding-top:5px; border-radius:10px; display:none; height:50%; background-color:transparent;">
<h2>Αλλαγή στοιχείων καταστήματος</h2>
<div style="padding:7px; padding-right:25%; padding-left:25%;">
<form action="updatestore.php" method='post' accept-charset='UTF-8' enctype='multipart/form-data' style="text-align:left;">
Δώσε την ονομασία του καταστήματος<input name ="oldonomasia" type="text"/>
Δώσε την νέα ονομασία του καταστήματος<input name ="onomasia" type="text"/>
Δώστε την νέα οδό<input name ="odos" type="text"/>
Δώστε τον νέο αριθμό της οδού<input name="arithmos" type="text"/>
Δώστε την νέα πόλη<input name ="poli" type="text"/>
Δώστε τoν νέο Ταχυδρομικό Κώδικα<input name ="tk" type="text"/>
Δώστε το νέο τηλέφωνο<input name="til" type="text"/>
Δώστε τις νέες γεωγραφικές συντεταγμένες<input name ="sintet" type="text"/>
Δώστε την ονομασία του hub απο το οποίο θα εξυπηρετείται<input name="hub" type="text"/>
<hr><input type="submit" value="Αλλαγή Στοιχείων" style="background-color:darkblue; color:white;"/>
</form>
</div>
</div>

<div id="showdiv"  style=" padding:10px; padding-top:5px; border-radius:10px; display:none; height:50%; background-color:transparent;">
<input type="button" onclick="ajaxcall_view()" value="Κάντε Κλικ εδώ για να δείτε τα Καταστήματα ή για ανανέωση της λίστας" style="color:white; background-color:darkblue;"/>
<div id="viewdiv">
</div>
</div>


</center>
</div>
</div>
</center>
</div>
<p style="font-size:12px;" align="right"><strong>Project web 2017</strong></p>
<?php
if (isset($_SESSION['username'])){
	
}else{
//header('Location: http://localhost:8080/main.html');
}
?>
<script>
 function showNewDiv() {
   document.getElementById('newdiv').style.display = "block";
   document.getElementById('deletediv').style.display = "none";
   document.getElementById('updatediv').style.display = "none";
   document.getElementById('showdiv').style.display = "none";
}
function showUpdateDiv() {
   document.getElementById('updatediv').style.display = "block";
         document.getElementById('newdiv').style.display = "none";
   document.getElementById('deletediv').style.display = "none";
   document.getElementById('showdiv').style.display = "none";
}
function showDeleteDiv() {
   document.getElementById('deletediv').style.display = "block";
      document.getElementById('newdiv').style.display = "none";
   document.getElementById('updatediv').style.display = "none";
   document.getElementById('showdiv').style.display = "none";
}
function showShowDiv() {
   document.getElementById('showdiv').style.display = "block";
      document.getElementById('newdiv').style.display = "none";
   document.getElementById('deletediv').style.display = "none";
   document.getElementById('updatediv').style.display = "none";
}

</script>
</body>
</html>