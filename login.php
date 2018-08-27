<?php // login.php
require_once 'header.php';
echo "<div id = 'login_detail'><h3>please enter your details to log in</h3>";
$error = $user = $pass = "";

 // if(!$loggedin) echo "ok";

if(isset($_POST['user']))
{
	$user = sanitizeString($_POST['user']);
	$pass = sanitizeString($_POST['pass']);
    
	if($user =="" || $pass == "")
	   $error = "Not all fileds were entered<br>";
	else
	{    
		$salt1 = "lw%q";
        $salt2 = "&l9z";

 
 $token    = hash('ripemd128', "$salt1$pass$salt2");

		$result = queryMySQL("SELECT user,pass FROM members
			where user ='$user' AND pass = '$token'");
		if($result->num_rows==0)
		{
			$error = "Username/Password invalid<br>";
		}
		else
		{
			$_SESSION['user'] = $user;
			$_SESSION['pass'] = $pass;
			header("Location:admin.php");
			exit;
			//die("You are now logged in.");
		}
	}

}

echo <<<_END
    <form method = 'post' action = 'login.php'>$error
    <pre>
    Username<input type = 'text' maxlength='16' name = 'user' value = 'guest'>
    Password<input type ='password' maxlength='16' name = 'pass' value = 'guest'>
            <input type="submit" class = 'name' value="Login">
    </pre>
_END;
?>

</form><br></div>
</body>
</html>