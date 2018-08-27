<?php
require_once 'header.php';

echo <<<_END
<form id = 'index_form' action = 'index.php' method = 'post'>
<input type = 'text' id = 'guest_form' name = 'guest_number' placeholder= "order number 12345,36235,etc">
<input type = 'submit' name = 'query' class = 'button' value ='query'>
</form>
_END;

 if(isset($_POST['guest_number']))
 {
 	$guest_number = get_post($connection,'guest_number');
 	$query = "SELECT ordernumber,time,name,tele,clothes,price,status,comments FROM ".
 	"client WHERE ordernumber ='$guest_number'";
 	$result = $connection->query($query);
 	if(!$result) die( "Database access failed:".$connection->error);
 	$rows = $result->num_rows;
 	$result->data_seek(0);
 	$row = $result->fetch_array(MYSQLI_NUM);

 	if(!$row) {echo "<div id = 'norecord'>no record/無紀錄</div>";exit;}
 	echo <<< _END
 	</style>
<pre><table id = "guest_query_table">
 	<tr>
 	<td>Ordernumber</td>
 	<td>$row[0]</td>
 	</tr>
 	<tr>
 	<td>Time</td>
 	<td>$row[1]</td>
 	</tr>
 	<tr>
 	<td>Name</td>
 	<td>$row[2]</td>
 	</tr>
 	<tr>
 	<td>Tele</td>
 	<td>$row[3]</td>
 	</tr>
 	<tr>
 	<td>Clothes</td>
 	<td>$row[4]</td>
 	</tr>
 	<tr>
 	<td>Price</td>
 	<td>$row[5]</td>
 	</tr>
 	<tr>
 	<td>Status</td>
 	<td>$row[6]</td>
 	</tr>
 	<tr>
 	<td>Comments</td>
 	<td>$row[7]</td>
 	</tr>
 	</table>
</pre>
_END;
 }



?>
<br><br>
</body>
</html>
