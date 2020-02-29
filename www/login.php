<html>
<meta charset = "UTF-8">
<body background="b2.jpg">
<?php
session_start();
$db_server["host"] = "localhost"; //database server
$db_server["username"] = "root"; // DB username
$db_server["password"] = ""; // DB password
$db_server["database"] = "projectweb";// database name
$mysql_con = mysqli_connect($db_server["host"], $db_server["username"], $db_server["password"], $db_server["database"]);
$mysql_con->query ('SET CHARACTER SET utf8');
$mysql_con->query ('SET COLLATION_CONNECTION=utf8_general_ci');
if (isset($_POST['username']) and isset($_POST['password'])){
$username = $_POST['username'];
$password = $_POST['password'];
$query = "SELECT idiotia,name,lastname FROM `user` WHERE username='$username' AND password='$password'";
$result = $mysql_con->query($query);
$count = mysqli_num_rows($result);
if ($count >= 1){
 $_SESSION['username'] = $username;
 $i = 0;
 $idiotita;// an einai o admin i o katastimatarxis i o hub
 $admin_name;
 $admin_lastname;
 while($array[$i] = $result->fetch_array(MYSQLI_NUM))
 {
 $i++;
 }
 //print_r($array);
 $idiotita=$array['0']['0'];
 $name=$array['0']['1'];
 $lastname=$array['0']['2'];
 switch($idiotita){
	 case "admin":{ $_SESSION['name']=$name; $_SESSION['lastname']=$lastname;
	 header('Location: /store/admin/main_admin.php'); break;}
	 case "store":{ $_SESSION['name']=$name; $_SESSION['lastname']=$lastname; header('Location: /store/shop/main_shop.php'); break;}
	 case "hub":{ $_SESSION['name']=$name; $_SESSION['lastname']=$lastname; header('Location: /store/hub/main.php'); break; break;}
	 default:{ break;}
 }
}else{
 session_destroy();
 header('Location: logon.html');
 }
 
 }
if (isset($_SESSION['username'])){
$username = $_SESSION['username'];

//echo "<a href='logoff.php'>Logout</a>"; 
}else{}
$mysql_con->close();
?>
</body>
</html>