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
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>My Music Cabinet</title>
  <link rel="stylesheet" href="final.css">
</head>
<body>
  <div id="title">
  My Music Cabinet
    <div id="user">
<?php
	echo "Hello " . $_SESSION['username'];

}

?>
      <a href="logout.php">Logout</a>
    </div>
  </div>
  <br>
  <div id="uploadSong">
    <a href="uploadSong.html" id="us">Upload Song</a>
  </div>
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
