<!DOCTYPE html>
<html>
 <head>
  <title>Setting up database</title>
 </head>
 <body>

 	<h3> Setting up...</h3>

<?php
   require_once 'functions.php';

   createTable('members',
                  'user VARCHAR(16),
                  pass VARCHAR(32),
                  INDEX(user(6))');


   createTable('client',
               'ordernumber INT UNSIGNED,
               time INT UNSIGNED,
                name VARCHAR(16),
                tele INT UNSIGNED,
                clothes VARCHAR(32),
                price FLOAT(16),
                status VARCHAR(16),
                comments VARCHAR(100),
                INDEX(ordernumber),
                INDEX(tele)');
?>

<br>...done.
</body>
</html>
