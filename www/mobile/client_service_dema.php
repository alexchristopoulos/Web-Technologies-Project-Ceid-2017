<html>
<head><meta charset='UTF-8'/></head>

<body style="background-image:url(background.jpg); padding:0px; margin:0; height: 50%;  background-position: center;  background-repeat: no-repeat;  background-size: cover;" >

<div style="width:100%;  background-color:darkred; padding:0px;">
<table style="width:100%;">
<tr><center>
<td style="width:200px; text-align:center; font-size:68px;"><button style="background:url(menu.png) no-repeat; background-size:200px; display:block; width:200px; height:200px; border: none;" onclick='menu();'/></td>
<td style="font-size:90px; font-family:verdana">ΕΞΥΠΗΡΕΤΗΣΗ ΠΕΛΑΤΩΝ</td></center>
</tr>
</table>
</div>
<center>



<div id="welcomediv" style="padding:8px; display:none; padding-top:15px;"><strong>
<h1 style="font-size:120px;
text-shadow:7px 5px 5px black;
color:darkred; font-family:verdana;">ΚΑΛΩΣ ΗΡΘΑΤΕ</h1></strong>
</div>
<!-- _________________________________________________________________________________________________________________________ -->






<!-- _________________________________________________________________________________________________________________________ -->
<div id="anazitisi" style="display:none;"><table style="width:100%"><tr><td
 style="font-size:46px; font-family:verdana; width:82%; display:inline;">Επιλέξτε τον τρόπο Αναζήτησης:</td><td style="text-align:left; width:18%;"> <button  style=" no-repeat; background-color:darkred; font-size:36px; color:white; display:block; width:60px; height:60px; border: none;" onclick='anazitisimenu();'>+</button> </td><tr></table><hr>
<div id="anazitisimenu" style="padding:5px; background-color:rgba(0,0,0,.52); position:absolute; top:350px; display:none;">
<center>
<table style="width:100%; padding:20px">
<center>
<tr >
<td align='center' height="200" style="padding:10px "><input type='button' value="Με ΤΚ" onclick='showtk();' style=" height:95%;  font-size:60px; padding:5px; color:white; border:none; border-radius:7px; text-shadow:3px 1px 1px black; background-color:darkred; width:100%;"></td>
</tr>
<tr>
<td align='center' height="200" style="padding:10px "><input type='submit' value="Με πληκτρολόγηση πόλης" onclick='showpoli();' style="height:95%;width:100%; color:white; padding:5px;  border-radius:7px; text-shadow:3px 1px 1px black; border:none; background-color:darkred; font-size:60px;"></td>
</tr>
</table>
</center>
</div>



<div id="tk" style="display:none; padding:5px;">
<table style="width:100%"><tr><td
 style="font-size:46px; font-family:verdana; width:15%; display:inline;">ΤΚ :</td><td style="text-align:left; width:75%;"><input type="text" name="address" id="address" placeholder="Ταχυδρομικός Κωδικός" style="padding:10px; width:100%; font-size:46px; display:block"/></td>
 <td style="width:10%; font-size:46px"><button style="height:100%; font-size:64px; border:none; background-color:darkred; color:white;" onclick='codeAddress();'>OK</button></td>
 </tr></table>
<div id="nearest_shop" style="font-size:46px; font-family:verdana;background-color:rgba(255,255,255,.75);"></div>
 </div>



<div id="poli" style="display:none">
<div id="ajaxpoli" style="height:200px; padding:10px; font-size:38px; width:90%; display:block;">
<table style="width:100%"><tr><td
 style="font-size:46px; font-family:verdana; width:20%; display:inline;">Ονομασία</td><td style="text-align:left; width:80%;"><form><input type="text" onkeyup="showHint(this.value)" name="address" id="address" 
 placeholder="Κατάστημα/Πόλη" style="padding:10px; width:100%; font-size:46px; display:block"/></form></td>
 </tr></table>

<hr> <span id="txtHint" ></span></p>
	</div>
</div>


</div>








<!-- _________________________________________________________________________________________________________________________ -->

<div id="xartis" style="display:none;">
<h2 style="font-family:verdana; font-size:64px;">ΔΙΚΤΥΟ ΚΑΤΑΣΤΗΜΑΤΩΝ/ΑΠΟΘΗΚΩΝ</h2><hr style="border-color:darkblue;">
<p style="font-family:verdana; font-size:36px;">Kαταστήματα(K)/Αποθήκες(Α)</p></div>
<div id="googleMap" style="display:block; width:95%; height:52%; position: absolute; left: -100%;"></div>
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
	 $info = "<div id='content'><h3 style='font-size:48px;'>Πληροφορίες Καταστήματος</h3 ><hr><p style='font-size:32px;'>Ονομασία:  {$array[$row]['0']} <br>Οδός: {$array[$row]['1']}  {$array[$row]['2']} <br> Πόλη: {$array[$row]['3']} <br>ΤΚ: {$array[$row]['4']} <br>Τηλέφωνο: {$array[$row]['5']} <br>Hub που το εξυπηρετεί: {$array[$row]['7']} </p></div>";	 
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
	 $info = "<div id='content'><h3 style='font-size:48px;'>Πληροφορίες Αποθήκης</h3><hr><p style='font-size:32px;'>Ονομασία:  {$array2[$row]['0']} <br>Πόλη: {$array2[$row]['1']} <br>Τηλέφωνο: {$array2[$row]['3']}</p></div>";	 
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









<!-- _________________________________________________________________________________________________________________________ -->
<div id="apostoli" style="display:block font-size:38px;">

<table style="width:100%"><tr><form action="client_service_dema.php" method='post' accept-charset='UTF-8' enctype='multipart/form-data'><td
 style="font-size:46px; font-family:verdana; width:25%; display:inline;">TRACKING NUMBER:</td><td style="width:70%"><input type="text" id="trackingnumber" name='trackingnumber'   style="width:100%; font-size:62px; height:100%;"/></td>
 <td><input type="submit" id="loadinfo"  value="OK" style =" border-radius : 5px; font-size:60px; display:block; background-color:darkred; color:white;"></input></td>
 </tr></form></table><hr>
 <?php
$db_server["host"] = "localhost"; //database server
$db_server["username"] = "root"; // DB username
$db_server["password"] = ""; // DB password
$db_server["database"] = "projectweb";// database name
$mysql_con = mysqli_connect($db_server["host"], $db_server["username"], $db_server["password"], $db_server["database"]);
$mysql_con->query('SET CHARACTER SET utf8');
$mysql_con->query('SET COLLATION_CONNECTION=utf8_general_ci');
$trackingnumber=$_POST['trackingnumber'];
$querytopologia = "SELECT * FROM topologia WHERE trackingnumber = '$trackingnumber'";
$resulttopologia = $mysql_con->query($querytopologia);
$count = mysqli_num_rows($resulttopologia);
if($count>0){
while($rowtop = $resulttopologia->fetch_array())
{
$rowst[] = $rowtop;
}
echo "<p style='font-size:38px;'>Τοποθεσίες Που Έχει Περάσει(Ονομασίες Καταστημάτων/Hubs): ";
foreach($rowst as $rowtop)
{
	
	echo $rowtop['perioxi'] . " ";
}
echo "</p>";}
?>
<div id="map_canvas" style="display:block; width:95%;  height:90%; position: relative; left: 10px;"></div><script>
<?php
$indx;
$db_server["host"] = "localhost"; //database server
$db_server["username"] = "root"; // DB username
$db_server["password"] = ""; // DB password
$db_server["database"] = "projectweb";// database name
$mysql_con = mysqli_connect($db_server["host"], $db_server["username"], $db_server["password"], $db_server["database"]);
$mysql_con->query('SET CHARACTER SET utf8');
$mysql_con->query('SET COLLATION_CONNECTION=utf8_general_ci');
$trackingnumber=$_POST['trackingnumber'];
$query1 = "SELECT topothesia FROM apostoli  WHERE trackingnumber = '$trackingnumber' ;";
$result1 = $mysql_con->query($query1);
$tmp=""; $sintetagmenes;
$count = mysqli_num_rows($result1);
if ($count >= 1){
$i=0;
 while($array1[$i] = $result1->fetch_array(MYSQLI_NUM))
 {
 $i++;
 }
 $tmp = $array1['0']['0'];
}
$loc=$tmp;
$query2 = "SELECT sintetagmenes FROM hub  WHERE onomasia = '$loc';";
$result2 = $mysql_con->query($query2);
$count = mysqli_num_rows($result2);
$not_exists='0';
if ($count >= 1){
	$not_exists= '1';
$i=0;
 while($array2[$i] = $result2->fetch_array(MYSQLI_NUM))
 {
 $i++;
 }
 $sintetagmenes = $array2['0']['0'];
}else{
//not hub
$query3 = "SELECT sintetagmenes FROM katastima  WHERE onomasia = '$loc';";
$result3 = $mysql_con->query($query3);
$count = mysqli_num_rows($result3);
if ($count >= 1){
$i=0;
$not_exists = '1';
 while($array3[$i] = $result3->fetch_array(MYSQLI_NUM))
 {
 $i++;
 }
 $sintetagmenes = $array3['0']['0']; $not_exists=1;
}else{
	$not_exists = '0';
}
}
$zoom;
if($not_exists=='1'){
//___________________________________________________________
$ltlng = explode(",", $sintetagmenes);
echo "
var myLatLngcn= { lat: {$ltlng['0']} , lng: {$ltlng['1']} }; "; 
$zoom=12;
}else{
     //center of greece
	 echo "var myLatLngcn= { lat: 39.549536 , lng: 22.090007};";
	 $zoom=6;
}
  echo"
  var mapProp= {
    center:new google.maps.LatLng(myLatLngcn),
    zoom:{$zoom},
};
var map2;
    map2 = new google.maps.Map(document.getElementById('map_canvas'), mapProp);"; 
	echo "var marker100 = new google.maps.Marker({
		  label:'!',
          position: myLatLngcn,
          map: map2,
          title: 'Εδώ Βρίσκεται αυτήν την στιγμή το δέμα σας!'
        });";
	echo "</script>";
if($not_exists=='0')
{
	echo "</script><h3 style='color:red;'><strong>Δυστηχώς Δεν βρέθηκε! Δώστε το σωστό tracking number!</strong></h3>";
}
?>


</div>





<!-- _________________________________________________________________________________________________________________________ -->
</center>
<div id="menu" style="padding:5px; background-color:rgba(0,0,0,.52); position:absolute; top:250px; display:none;">
<center>
<table style="width:100%; padding:20px">
<center>
<tr >
<td align='center' height="200" style="padding:10px "><input type='button' value="Αρχική Σελίδα" onclick='arxiki();' style=" height:95%;  font-size:60px; padding:5px; color:white; border:none; border-radius:7px; text-shadow:3px 1px 1px black; background-color:darkred; width:100%;"></td>
</tr>
<tr>
<td align='center' height="200" style="padding:10px "><input type='submit' value="Δίκυτο Καταστημάτων/hubs" onclick='xartis();' style="height:95%;width:100%; color:white; padding:5px;  border-radius:7px; text-shadow:3px 1px 1px black; border:none; background-color:darkred; font-size:60px;"></td>
</tr>
<tr>
<td align='center' height="200" style="padding:10px "><input type='submit' value="Παρακολούθηση Αποστολής" onclick='apostoli();' style="height:95%;width:100%; color:white; padding:5px; border-radius:7px; border:none; text-shadow:3px 1px 1px black; background-color:darkred; font-size:60px;"></td>
</tr>
<tr>
<td align='center' height="200" style="padding:10px "><input type='submit' value="Αναζήτηση" onclick='anazitisi();' style="height:95%;width:100%; border:none; color:white; padding:5px; border-radius:7px; text-shadow:3px 1px 1px black; background-color:darkred; font-size:60px;"></td>
</tr>
</table>
</center>
</div>




<script>
function arxiki(){
window.location.href='main_mobile.html';
}
function anazitisimenu(){
	
	
	
	if(document.getElementById('anazitisimenu').style.display=='block'){
document.getElementById('anazitisimenu').style.display='none';
}else{
document.getElementById('anazitisimenu').style.display='block';
document.getElementById('anazitisimenu').style.right='0';
}

	
}



function showtk(){
	
			document.getElementById('poli').style.display='none';
			document.getElementById('anazitisimenu').style.display='none';
		document.getElementById('tk').style.display='block';
	
}
function showpoli(){
		document.getElementById('poli').style.display='block';
		document.getElementById('tk').style.display='none';
		document.getElementById('anazitisimenu').style.display='none';
	
	
}
function xartis(){
		document.getElementById('anazitisi').style.display='none';
	document.getElementById('xartis').style.display='block';
	document.getElementById('welcomediv').style.display='none';
		document.getElementById('apostoli').style.display='none';
		document.getElementById('menu').style.display='none';
			 document.getElementById('map_canvas').style.left = "-100%";
	 document.getElementById('googleMap').style.left = "15px";
}
function apostoli(){
	document.getElementById('anazitisi').style.display='none';
	document.getElementById('welcomediv').style.display='none';
	document.getElementById('xartis').style.display='none';
	document.getElementById('apostoli').style.display='block';
		 document.getElementById('map_canvas').style.left = "15px";
	 document.getElementById('googleMap').style.left = "-100%";
	 	document.getElementById('menu').style.display='none';
}
function anazitisi(){
	document.getElementById('anazitisi').style.display='block';
	document.getElementById('welcomediv').style.display='none';
	document.getElementById('xartis').style.display='none';
	document.getElementById('apostoli').style.display='none';
	 document.getElementById('googleMap').style.left = "-100%";
	 document.getElementById('map_canvas').style.left = "-100%";
	 	document.getElementById('menu').style.display='none';
}
function menu(){
if(document.getElementById('menu').style.display=='block'){
document.getElementById('menu').style.display='none';
}else{
document.getElementById('menu').style.display='block';
}

}

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

</script>
</body>
</html>