<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');

if ($_POST['owned']){

	unlink($_POST['file']);

}

$mysqli = new mysqli("oniddb.cws.oregonstate.edu", "jurczakn-db", "681ouA5JomfiwgDp", "jurczakn-db");

$stmt = $mysqli->prepare("DELETE FROM songs WHERE id=?");

if(!$stmt){

	echo "error on stmt";

}

$stmt->bind_param("s", $_POST['id']);	

$stmt->execute();

$stmt->close();


?>