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

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>cs290-create login</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <a href="logout.php">Logout</a>
  <br>
  <a href="uploadSong.html">Upload Song Song</a><br>
  <div id="cl">
    	 <table id="mySongs" border = 1px solid black>
      </table>
  </div>
  <div id="cl">
    	 <table id="popSongs" border = 1px solid black>
      </table>
  </div>
  <script src="final.js"></script>
  </body>
</html>
