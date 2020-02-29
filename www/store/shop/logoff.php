<?php
session_start();
session_unset();
header("Location:http://localhost:8080/main.html");
?>