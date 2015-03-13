<?php	

ob_start();

session_start();

$_SESSION = array();

session_destroy();

$redirect = "http://web.engr.oregonstate.edu/~jurczakn/login.html";

header("Location:{$redirect}", false);

?>
