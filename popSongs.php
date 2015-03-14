<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');

session_start();

$mysqli = new mysqli("oniddb.cws.oregonstate.edu", "jurczakn-db", "681ouA5JomfiwgDp", "jurczakn-db");


$stmt = $mysqli->prepare("SELECT * FROM songs WHERE shared=1 AND user!=? ORDER BY adds DESC");

if(!$stmt){

	echo "error on stmt";

}

$stmt->bind_param("s", $_SESSION['username']);

$stmt->execute();

$stmt->bind_result($id, $artist, $title, $album, $genre, $length, $file, $adds, $owner, $user, $shared);

$results = array();

while ($stmt->fetch()){

	$results[] = array('id' => $id, 'artist' => $artist, 'title' => $title, 'album' => $album, 'genre' => $genre, 'length' => $length, 'file' => $file, 'adds' => $adds, 'owner' => $owner, 'user' => $user, 'shared' => $shared);

}

$stmt->close();

echo json_encode($results);

?>
