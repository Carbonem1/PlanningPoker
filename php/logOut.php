<?php	  
session_start();
$_SESSION['logged_in'] = false;
$_SESSION['username'] = "";
session_destroy();
?>	 
