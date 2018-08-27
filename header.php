<?php
session_start();

echo "<!DOCTYPE html>\n<html><head>";

//echo getcwd();

$current_file_name = basename($_SERVER['PHP_SELF']);
//echo $current_file_name."\n";

require_once 'functions.php';

$userstr = ' (Guest)';

if(isset($_SESSION['user'])){
	$user = $_SESSION['user'];
	$loggedin = TRUE;
	$userstr = " ($user)";
}
else $loggedin = FALSE;
echo "<span class = 'main'>Welcome to $appname</span><br>";

echo "<title>$appname$userstr</title><link rel='stylesheet' ".
 "href ='styles.css' type = 'text/css'>".
     "</head><body><a href= 'index.php' id ='back'> <- Back to Homepage</a>".
      "<script src= 'main.js'></script>";

 if($loggedin)
 echo "<a href = 'logout.php' id = 'logout' >Log out</a></div><br>";
else
	if($current_file_name == 'index.php')
 echo "<a href = 'login.php' id = 'login' >Log in</a><br>";
   // elseif ($current_file_name == "login.php") {
   // 	echo "<a href = 'index.php'> <-- Go Back</a><br>";
   // }


// echo <<<_END1 
// <input type = "text" name = "input">
// <input type = "text" name = "query">
// _END1;

// if($loggedin)


?>
