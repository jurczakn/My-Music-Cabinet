<?php

session_start();

$mysqli = new mysqli("oniddb.cws.oregonstate.edu", "jurczakn-db", "681ouA5JomfiwgDp", "jurczakn-db");

if (!$mysqli || $mysqli->connect_errno){

	echo "Connection error".$mysqli->connect_errno." ".$mysqli->connection_error;

}

$stmt = $mysqli->prepare("INSERT INTO songs (artist, title, album, genre, length, file, adds, owner, user, shared) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

if(!$stmt){

	echo "error on stmt";

}

$adds = 0;

$owned = 0;

$shared = 0;

$stmt->bind_param("ssssdsiisi", $_POST['artist'], $_POST['title'], $_POST['album'], $_POST['genre'], $_POST['length'], $_POST['file'], $adds, $owned, $_SESSION['username'], $shared);

$stmt->execute();

$stmt->close();

$stmt = $mysqli->prepare("UPDATE songs SET adds = adds + 1 WHERE id=?");

$stmt->bind_param("i", $_POST['id']);

$stmt->execute();

$stmt->close();

?>
