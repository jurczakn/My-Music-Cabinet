<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');

session_start();

if (!isset($_SESSION['username'])){

	$filePath = explode('/', $_SERVER['PHP_SELF'], -1);

	$filePath = implode('/', $filePath);
	
	$redirect = "http://" . $_SERVER['HTTP_HOST'] . $filePath;

	header("Location:{$redirect}/login.html", true);

}

else {

	echo "Hello " . $_SESSION['username'];

}

?>