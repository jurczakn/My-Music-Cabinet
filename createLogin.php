<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');

$mysqli = new mysqli("oniddb.cws.oregonstate.edu", "jurczakn-db", "681ouA5JomfiwgDp", "jurczakn-db");

if (!$mysqli || $mysqli->connect_errno){

	echo "Connection error".$mysqli->connect_errno." ".$mysqli->connection_error;

}

if (isset($_POST['username']) && isset($_POST['password'])){

	$stmt = $mysqli->prepare("INSERT INTO login (username, password) VALUES (?, ?)");
	
	if(!$stmt){

		echo "error on stmt";

	}

	$stmt->bind_param("ss", $_POST['username'], $_POST['password']);

	$stmt->execute();

	mysqli_stmt_store_result($stmt);

	//echo $stmt->errno . ": " . $stmt->error . "/n";

	if ($stmt->errno == 1062){

		echo "Sorry, username taken.";

	}

	else {

		echo "";

	}

	$stmt->close();

}

?>
