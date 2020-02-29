<html>
<head>
<meta charset="UTF-8">
</head>
<style type="text/css">
  html, body {height:100%}
</style>
<style>
p{
font-family:verdana;
font-size:14px;
}
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
</style>
<body background="b2.jpg">
<script>
//var timePeriodInMs = 100;

//setTimeout(function() 
//{ 
 //   document.getElementById("googleMap").style.display = "none"; 
//}, 
//timePeriodInMs);

 function showDemaDiv() {
   document.getElementById('welcomediv').style.display = "none";
   document.getElementById('infodel').style.display = "block";
   document.getElementById('shophub').style.display = "none";
   document.getElementById('anazitisi').style.display = "none";
       document.getElementById('googleMap').style.position = "absolute";
	   document.getElementById('googleMap').style.left = "-100%";
}
 function showDiktioDiv() {
   document.getElementById('welcomediv').style.display = "none";
   document.getElementById('infodel').style.display = "none";
   document.getElementById('shophub').style.display = "block";
   document.getElementById('anazitisi').style.display = "none";
      document.getElementById('googleMap').style.display = "block";
	  document.getElementById('googleMap').style.position = "relative";
	   document.getElementById('googleMap').style.left = "0%";
   //initialize();
}
 function showAnazitisiDiv() {
   document.getElementById('welcomediv').style.display = "none";
   document.getElementById('infodel').style.display = "none";
   document.getElementById('shophub').style.display = "none";
   document.getElementById('anazitisi').style.display = "block";
	   document.getElementById('googleMap').style.position = "absolute";
	   document.getElementById('googleMap').style.left = "-100%";
}


</script>
<h1 style="font-family:verdana; text-align:center; color:black; text-shadow: 3px 3px 5px darkred;">ΙΣΤΟΤΟΠΟΣ ΕΞΥΠΗΡΕΤΗΣΗΣ ΠΕΛΑΤΩΝ</h1>
<div style="padding:25px; padding-top:7px; ">
<center>
<div  style="padding:0px; border:outset; border-size:5px; border-color:grey; overflow-y:auto;  background-color:white; background-image:url(maindiv.jpg); height:850px; width:920px;">
<img src="shipping.jpg" width="100%" height="220px" align="middle"/>
<ul>
<li><a href="main.html">Αρχική Σελίδα</a></li>
<li><a href="#dema" onclick='showDemaDiv()'>Κατάσταση Δέματος</a></li>
<li><a href="#diktio" onclick='showDiktioDiv()'>Προβολή Δικτύου Καταστημάτων/Hubs</a></li>
<li style="float:right;"><a href="#anazitisi" onclick='showAnazitisiDiv()' >Αναζήτηση</a></li>
</ul>
<div id="maindiv" style="padding: 10px; padding-top:15px; height:550px; ">



<div id="welcomediv">
<h2>Καλώς ήρθατε στον ιστότοπο ενημέρωσης πελατών</h2><hr>
<p>Χρησιμοποιήστε το κουμπί 'Αρχική Σελίδα' για να επιστρέψετε στην αρχική σελίδα.</p>
<p>Χρησιμοποιήστε το κουμπί 'Κατάσταση Δέματος' για να ενημερωθείτε για την κατάσταση του δέματος σας.</p>
<p>Χρησιμοποιήστε το κουμπί 'Προβολή Δικτύου Καταστημάτων/Hubs' για να δείτε το δίκτυο καταστημάτων/αποθηκών μας.</p>
<p>Χρησιμοποιήστε το κουμπί 'Αναζήτηση' για να βρείτε το πλησιέστερο κατάστημα σε εσάς.</p>
</div>





<!-- enimerosi dematos -->
<div id="infodel" style="display:none;">
<p>Για να ενημερωθείτε για την κατάσταση του δέματος σας εισάγετε παρακάτω το tracking number</p>
<form action="costumer_katastasidematos.php" style="text-align :left;" method='post' accept-charset='UTF-8' enctype='multipart/form-data'>
<strong>TRACKING NUMBER: </strong><input type="text" id="trackingnumber" name='trackingnumber' style="width:75%;" /><hr>
<center><input type="submit" id="loadinfo"  value="Συνέχεια" style =" border-radius : 5px; display:block; background-color:darkblue; color:white;"></input></center>
</form>
<div id="displayinfo" style="display:block; width:95%; height:400px; padding:4px; ">

</div>
</div>
<!-- enimerosi dema telos -->




<div id="shophub" style="display:none;">
<h2 style="font-family:verdana;">ΔΙΚΤΥΟ ΚΑΤΑΣΤΗΜΑΤΩΝ/ΑΠΟΘΗΚΩΝ</h2><hr style="border-color:darkblue;">
<p style="font-family:verdana">Στον παρακάτω χάρτη επισημαίνονται τα υπάρχοντα καταστήματα(K)/Αποθήκες(Α)</p></div>
<div id="googleMap" style="display:block; width:700px; height:400px; position: absolute; left: -100%;"></div>
<script>
var geocoder;
function myMap() {
	geocoder = new google.maps.Geocoder();
 var myLatLng= { lat: 39.549536 , lng: 22.090007};
  var mapProp= {
    center:new google.maps.LatLng(39.549536, 22.090007),
    zoom:6,
};
var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

<?php
$indx;
$db_server["host"] = "localhost"; //database server
$db_server["username"] = "root"; // DB username
$db_server["password"] = ""; // DB password
$db_server["database"] = "projectweb";// database name
$mysql_con = mysqli_connect($db_server["host"], $db_server["username"], $db_server["password"], $db_server["database"]);
$mysql_con->query('SET CHARACTER SET utf8');
$mysql_con->query('SET COLLATION_CONNECTION=utf8_general_ci');
$query = "SELECT * FROM katastima;";
$result = $mysql_con->query($query);
$count = mysqli_num_rows($result);
if ($count >= 1){
 $i = 0;
 while($array[$i] = $result->fetch_array(MYSQLI_NUM))
 {
 $i++;
 }
 $row=0; 
 for($row=0;$row<$i;$row++)
 {
	 $info; settype($info, "string");
	 $info = "<div id='content'><h3>Πληροφορίες Καταστήματος</h3><hr><p>Ονομασία:  {$array[$row]['0']} <br>Οδός: {$array[$row]['1']}  {$array[$row]['2']} <br> Πόλη: {$array[$row]['3']} <br>ΤΚ: {$array[$row]['4']} <br>Τηλέφωνο: {$array[$row]['5']} <br>Hub που το εξυπηρετεί: {$array[$row]['7']} </p></div>";	 
	 echo 'var contentString = "'; echo $info; echo '"; var infowindow'; echo $row;	 echo " = new google.maps.InfoWindow"; echo"({ content: contentString });";
	 $current_sintet=$array[$row]['6'];
	 $myString = $current_sintet;
     $ltlng = explode(',', $myString); 
     echo "var myLatLng= { lat: "; echo $ltlng['0']; echo " , lng: "; echo $ltlng['1']; echo " }; var marker"; echo $row; echo "= new google.maps.Marker({ label:'K', position: "; echo "myLatLng"; echo " , map: map, title: 'Κατάστημα' });";
     echo " marker"; echo $row; echo ".addListener('click', function() { infowindow"; echo $row; echo".open(map, marker"; echo $row; echo " ); }); ";
 }
 $indx=$row;
 $indx++;
}
 $query2 = "SELECT * FROM hub;";
$result2 = $mysql_con->query($query2);
$count = mysqli_num_rows($result2);
if ($count >= 1){
 $i = 0;
 while($array2[$i] = $result2->fetch_array(MYSQLI_NUM))
 {
 $i++;
 }
 $row=0; 
 for($row=0;$row<$i;$row++)
 {
	 $num=$indx+$row; $info; settype($info, "string");
	 $info = "<div id='content'><h3>Πληροφορίες Αποθήκης</h3><hr><p>Ονομασία:  {$array2[$row]['0']} <br>Πόλη: {$array2[$row]['1']} <br>Τηλέφωνο: {$array2[$row]['3']}</p></div>";	 
	 echo 'var contentString = "'; echo $info; echo '"; var infowindow'; echo $num;	 echo " = new google.maps.InfoWindow"; echo"({ content: contentString });";
	 $current_sintet=$array2[$row]['2'];
	 $myString = $current_sintet;
     $ltlng = explode(',', $myString); 
     echo "var myLatLng= { lat: "; echo $ltlng['0']; echo " , lng: "; echo $ltlng['1']; echo " }; var marker"; echo $num; echo "= new google.maps.Marker({ label:'A', position: "; echo "myLatLng"; echo " , map: map, title: 'Αποθήκη' });";
     echo " marker"; echo $num; echo ".addListener('click', function() { infowindow"; echo $num; echo".open(map, marker"; echo $num; echo " ); }); ";
 }
}
?>
		

        
        
  
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCvBusx7yZr0c0UH6mBeRn5kihBvw_yR6E&callback=myMap"></script>







<div id="anazitisi" style="display:none;">
<h2 style="font-family:verdana; text-shadow: 2px 2px 4px white;">ΑΝΑΖΗΤΗΣΗ ΠΛΗΣΙΕΣΤΕΡΟΥ ΚΑΤΑΣΤΗΜΑΤΟΣ</h2><hr style="border-color:darkblue;">
<p>Επιλέξτε με ποιον τρόπο θέλετε να αναζητήσετε κάπιοι κατάστημα</p>
<button style ="width:40%; padding:10px; border-color:white; border-radius:10px; background-color:darkblue; color:white;" onclick='showtk();'>Πλησιέστερο Κατάστημα με πληκτρολόγηση ΤΚ</button><button onclick ='showspoli();' style ="width:40%; padding:10px; border-color:white; border-radius:10px; background-color:darkblue; color:white;">Πληκτρολόγηση Πόλης Καταστήματος</button><br>
<script>
function showtk(){
        document.getElementById('divtk').style.display = "block";
   document.getElementById('ajaxpoli').style.display = "none";
}
function showspoli(){
             document.getElementById('divtk').style.display = "none";
   document.getElementById('ajaxpoli').style.display = "block";
}
</script>
<div style="padding-left:15%; padding-right:15%;"><hr style="border-color:transparent;"></div>
<div  id="divtk" style="display:none;">
    <strong style="font-family:verdana; color:darkred; text-shadow: 2px 2px 4px white;">Eισάγετε τον Ταχυδρομικό Κωδικό του τόπου διαμονής σας: </strong><input id="address" type="textbox" style="width:10%"><br>
    <div style="padding-left:25%; padding-right:25%;"><hr style="border-color:transparent;"><input type="button" value="Εύρεση Πλησιέστερου καταστήματος" onclick="codeAddress()" style="display:block; padding:10px; border-color:white; border-radius:10px; background-color:darkblue; color:white;"></div>
    <script>
	function codeAddress() {
    var address = document.getElementById('address').value;
	address = address + ' Greece';
    geocoder.geocode( { 'address': address}, function(results, status) {
      if (status == 'OK') {
		  var currpos=results[0].geometry.location;
		  //alert(currpos);
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
                document.getElementById("nearest_shop").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("POST","find_near.php",true);
		xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send("latlng="+currpos);

      } else {
        alert('Ίσως δεν υπάρχει ο ΤΚ:' + status);
      }
    });
  }

    </script><div id="nearest_shop"></div></div>
	<div id="ajaxpoli" style="height:200px; padding:10px; width:80%; display:none;">
<script>
function showHint(str) {
    if (str.length == 0) { 
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "suggestions.php?q=" + str, true);
        xmlhttp.send();
    }
}
</script>
<p><b>Πληκτρολογίστε εδώ το όνομα πόλης</b></p>
<form> 
Πόλη: <input type="text" onkeyup="showHint(this.value)">
</form>
<p>Αποτελέσματα:<hr> <span id="txtHint"></span></p>
	</div>
</div>






</div>
</center> 
</div>
</div>
<p style = "text-align:right; font-size:11px;"><strong>Project Web 2017</strong></p>
</body>
</html>