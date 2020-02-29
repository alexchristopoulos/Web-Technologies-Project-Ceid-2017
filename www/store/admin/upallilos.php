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
        xmlhttp.open("POST","view.php",true);
        xmlhttp.send();
}

function ajaxcall_options(){
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
	var radios = document.getElementsByName('idiot');

    for (var i = 0, length = radios.length; i < length; i++) {
    if (radios[i].checked) {
        var storetype=radios[i].value;
        break;
      }
     }
	
	
		if(storetype=='store')
		{
			//show store options
			var url_="storeoptions.php";
		}else
		{
			//show hub options
			var url_="huboptions.php";
		}
		xmlhttp.open("POST",url_,true);	
	xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("selectoption").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("POST",url_,true);
        xmlhttp.send();
		document.getElementById("loadstores").style.display= "none";
		document.getElementById("enroll").style.display= "block";
}
</script>
</head>
<style>
button:hover{
	background-color:black;
cursor:pointer;
}
input:hover{
cursor:pointer;

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
#container
{
    position:relative;
	position:relative;
	height:200px;
	width:100%;
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
	<center>
    <h1 id="logotext">
        Διαχείρηση Συστήματος
    </h1></center>
</div>
 <ul>
  <li><a href="stores.php">Καταστήματα</a></li>
  <li><a href="upallilos.php">Υπάλληλοι Καταστημάτων</a></li>
  <li style="float:right"><a class="active" href="logoff.php">Αποσύνδεση</a></li>
</ul>
<div id= "board" style="padding: 8px;">
<ul style="background-color:darkblue; border-radius:10px;">
  <li><a href="#create" onclick="showNewDiv()">Δημιουργία Υπαλλήλου</a></li>
  <li><a href="#create" onclick="showDeleteDiv()">Διαγραφή Υπαλλήλου</a></li>
  <li><a href="#create" onclick="showUpdateDiv()">Τροποποίηση Υπαλλήλου</a></li>
  <li style="float:right;"><a href="#create" onclick="showShowDiv()">Προβολή Υπαλλήλων</a></li>
</ul>
<center>




<div id="newdiv"  style=" padding:10px; padding-top:5px; border-radius:10px; display:none; height:50%; background-color:transparent;">
<h2>Δημιουργία Λογαριασμού Για Υπάλληλο</h2><hr>
<div style="padding:7px; padding-right:25%; padding-left:25%;">
<form action="create.php" method='post' accept-charset='UTF-8' enctype='multipart/form-data' style="text-align:left;">
Όνομα <input type="text" name="onoma"></input><br>
Επώνυμο <input type="text" name="epitheto"></input><br>
Συνθηματικό <input type="text" name="sinthimatiko"></input><br>
Κωδικός <input type="password" name="kodikos"></input><br>
Αριθμός Ταυτότητας <input type="text" name="tautotita"></input><br>
Εργάζεται σε Transit Hub |<input type="radio" style="width:5%;" name="idiot" value="hub">| Σε Κατάστημα |<input type="radio"  style="width:5%;" name="idiot" value="store">|<hr>
<input type="button" id="loadstores" onclick="ajaxcall_options()" value="Συνέχεια" style =" border-radius : 5px; display:block; background-color:darkblue; color:white;"></input>
<div id="enroll" style="display:none;">Κατάστημα Εργασίας :<select name='perioxi' id="selectoption">
</select><hr>
<input type="submit" value="Εγγραφή" style="border-radius : 5px; background-color:darkblue; color:white;"/>
</div>
</form>
</div>
</div>


<div id="deletediv"  style=" padding:10px; padding-top:5px; border-radius:10px; display:none; height:50%; background-color:transparent;">
<h2>Διαγραφή Λογαριασμού Υπαλλήλου</h2><hr>
<div style="padding:7px; padding-right:25%; padding-left:25%;">
<form action="delete.php" method='post' accept-charset='UTF-8' enctype='multipart/form-data' style="text-align:left;">
Συνθηματικό <input type="text" name="sinth"/><hr>
<input type="submit" value="Διαγραφή Υπαλλήλου" style="background-color:darkblue; color:white;"/><br>
*Προσοχή κατά την διαγραφή! Δεν υπάρχει Επιστροφή!
</form>
</div>
</div>


<div id="updatediv"  style=" padding:10px; padding-top:5px; border-radius:10px; display:none; height:50%; background-color:transparent;">
<h2>Αλλαγή στοιχείων υπαλλήλου</h2>
<div style="padding:7px; padding-right:25%; padding-left:25%;">
<form action="update.php" method='post' accept-charset='UTF-8' enctype='multipart/form-data' style="text-align:left;">
Δώσε το συνθηματικό του υπαλλήλου<input name ="olds" type="text"/>
Δώσε το νέο συνθηματικό του υπαλλήλου<input name ="news" type="text"/>
Δώσε το νέο κωδικό του υπαλλήλου<input name="newp" type="text"/>
<hr><input type="submit" value="Αλλαγή Στοιχείων" style="background-color:darkblue; color:white;"/>
</form>
</div>
</div>

<div id="showdiv"  style=" padding:10px; padding-top:5px; border-radius:10px; display:none; height:50%; background-color:transparent;">
<input type="button" onclick="ajaxcall_view()" value="Κάντε Κλικ εδώ για να δείτε τους υπαλλήλους ή για ανανέωση της λίστας" style="color:white; background-color:darkblue;"/>
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
//header('Location: http://localhost:81/main.html');
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