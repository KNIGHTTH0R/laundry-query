	<?php 

	echo <<<_END
	<form action = 'admin.php' method = "post"><pre>
        Ordernumber <input type = "text" name = "ordernumber">
	       Time <input type = "date" name = "time">
	       Name <input type = "text" name = "name">
	       Tele <input type = "text" name = "tele">
	    Clothes <input type = "text" name = "clothes">
	      Price <input type = "text" name = "price">
	     Status <input type = "text" name = "status">
	            <input type = "submit" value = "ADD RECORD">
 </pre></form>
_END;
?>