<html>
<body>
<h1>SCAN</h1>
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
<input type="file" accept="image/*" capture="camera"/>
</body>
</html>