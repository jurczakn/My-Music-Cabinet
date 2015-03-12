<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');

$mysqli = new mysqli("oniddb.cws.oregonstate.edu", "jurczakn-db", "681ouA5JomfiwgDp", "jurczakn-db");

if (!$mysqli || $mysqli->connect_errno){

	echo "Connection error".$mysqli->connect_errno." ".$mysqli->connection_error;

}

if (isset($_POST['username']) && isset($_POST['password'])){

	$stmt = $mysqli->prepare("SELECT password FROM login WHERE username=?");
	
	if(!$stmt){

		echo "error on stmt";

	}

	$stmt->bind_param("s", $_POST['username']);

	$stmt->execute();
	
	$stmt->bind_result($password);

	if ($stmt->fetch()){

		if ($password == $_POST['password']){

			session_start();

			$_SESSION['username'] = $_POST['username'];

			$result = true;

			echo "";

		}
	
		else

			echo "Wrong Password";

	}

	else {

		echo "Username does not exist";

	}

	$stmt->close();

}

?>
