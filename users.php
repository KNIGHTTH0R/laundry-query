<?php //users.php
 require_once 'functions.php';
 
 $salt1 = "lw%q";
 $salt2 = "&l9z";

 $username = "may";
 $password = "may.wang";
 $token    = hash('ripemd128', "$salt1$password$salt2");

 add_user($connection,$username,$token);

  $username = "jason";
  $password = "jason.sun";
  $token    = hash('ripemd128', "$salt1$password$salt2");

 add_user($connection,$username,$token);

  $username = "guest";
  $password = "guest";
  $token    = hash('ripemd128', "$salt1$password$salt2");

 add_user($connection,$username,$token);

 function add_user($connection,$un,$pw)
 {
 	$query = "INSERT INTO members VALUES('$un','$pw')";
 	$result = $connection->query($query);
 	if(!$result) die($connection->error);
 }