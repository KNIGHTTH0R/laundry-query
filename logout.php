<?php
require_once 'header.php';

if(isset($_SESSION['user']))
{
	destroySession();
	echo "<div id = 'guest1'>You have been logged out.Please ".
	"<a href = 'index.php'> click here</a> to refresh.</div>"; 
}
else echo "<br><div id = 'guest2'>You cannot log out because you are not logged in</div>";
?>
<br><br>
</body>
</html>