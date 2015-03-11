<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');

$mysqli = new mysqli("oniddb.cws.oregonstate.edu", "jurczakn-db", "681ouA5JomfiwgDp", "jurczakn-db");

if (!$mysqli || $mysqli->connect_errno){

	echo "Connection error".$mysqli->connect_errno." ".$mysqli->connection_error;

}

if (isset($_POST['username']) && isset($_POST['password'])){

	echo "in";

	$stmt = $mysqli->prepare("SELECT * FROM login Where username = ?");

	if(!$stmt){

		echo "error on stmt";

	}

	$stmt->bind_param("s", $_POST['username']);	

	$stmt->execute();

	if (mysqli_num_rows($stmt) > 0){

		echo "Sorry, username taken.";

	}

	$stmt->close();

	$stmt = $mysqli->prepare("INSERT INTO login (username, password) VALUES (?, ?)");
	
	if(!$stmt){

		echo "error on stmt";

	}

	$stmt->bind_param("ss", $_POST['username'], $_POST['password']);

	$stmt->execute();

	echo mysql_errno($stmt) . ": " . mysql_error($stmt) . "/n";

	$stmt->close();

}

?>

	

