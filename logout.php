<?php
	session_start();
$login = $_SESSION['session_username'];	
	unset($_SESSION['session_username']);
	session_destroy();
	include("includes/connection.php");
	$con->query("UPDATE `users` SET `online` = '0' WHERE `users`.`login` = '$login '"); //возвращаем false
	$con->close();

	header("location:index.php");
?>