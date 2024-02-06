<?php
	session_start();
	unset($_SESSION['logged']);
	session_destroy();
	//var_dump($_SESSION['logged']);
	//unset($_SESSION['logged']);
	header('Location:index.php');
?>