<?php

session_start();

$folder = "test/";

$file = $folder . $_FILES["uploadFile"]["name"];

echo $file;

$uploadOk = 1;

$fileType = substr($file, strrpos($file, '.') + 1);

if(isset($_POST["submit"])){

	$uploadOk = 1;

}

if (file_exists($file)){

	echo "File already exists. ";

	$uploadOk = 0;

}

if ($fileType != "mp3"){

	echo "Only mp3 allowed. ";

	$uploadOk = 0;

}

if ($uploadOk == 0){

	echo "Sorry, your file was not uploaded.";

}

else {

	if (move_uploaded_file($_FILES["uploadFile"]["tmp_name"], $file)) {

		echo "The file " . basename( $_FILES["uploadFile"]["name"]). " has been uploaded.";

		chmod($file, 0777);

	}

	else {

		echo "Sorry, there was an error uploading your file.";

		$uploadOk = 0;

	}

}

if ($uploadOk != 0){

	$mysqli = new mysqli("oniddb.cws.oregonstate.edu", "jurczakn-db", "681ouA5JomfiwgDp", "jurczakn-db");

	if (!$mysqli || $mysqli->connect_errno){

		echo "Connection error".$mysqli->connect_errno." ".$mysqli->connection_error;

	}

	$stmt = $mysqli->prepare("INSERT INTO songs (artist, title, album, genre, length, file, adds, owner, user, shared) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

	if(!$stmt){

		echo "error on stmt";

	}

	$adds = 0;

	$owned = 1;

	$stmt->bind_param("ssssdsiisi", $_POST['artist'], $_POST['title'], $_POST['album'], $_POST['genre'], $_POST['length'], $file, $adds, $owned, $_SESSION['username'], $_POST['shared']);

	$stmt->execute();

	$stmt->close();


}

?>