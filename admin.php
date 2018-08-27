<?php // admin.php
require_once 'header.php';

  global $a ;

if($_SESSION['user'])
{$admin = $_SESSION['user'];



echo <<<END
<div id = 'guest'><h1 > Welcome,$admin ! </h1>
<form action = "admin.php" method = "post">
 <input type = 'submit' name = 'Add' value = 'Add New Record'>
 <input type = 'hidden' name = 'Add1' value = 'yes'>
  <input type = 'submit' name = 'admin_query' value = 'Query'>
 </form>
 <div id = 'cancel'></div><div>
END;

}
// function output(){

 // }

else {
	header("Location:index.php");
			exit;
}
     if(isset($_POST['Add1'])&&isset($_POST['Add']))//add record when click ADD RECORD button
	{
		echo <<<_END
	<form action = "admin.php" method = "post" id = 'add_form'><pre>
	Ordernumber <input type = "number" name = "ordernumber" min = "9999" required>
	       Time <input type = "date" name = "time" required>
	       Name <input type = "text" name = "name" required>
	       Tele <input type = "text" name = "tele" required>
	    Clothes <input type = "text" name = "clothes">
	      Price <input type = "text" name = "price">
	     Status <select name = 'status'>
	                 <option value = 'in_progress'>In Progress</option>
	                 <option value = 'ready_to_pick_up'>Ready to Pick Up</option>
	                 <option value = 'completed'>Completed</option>
	            </select>
         Comments   <textarea name = "comments" rows = '10' cols = '50' form = 'add_form'></textarea>
	            <input type = "submit" value = "ADD RECORD">
 </pre></form>
 	   
_END;

}
  if(isset($_POST['Add1'])&&isset($_POST['admin_query']))
  {
  	echo <<<END
  	<form action = "admin.php" method = 'post'>
  	<input type = 'text' name ='number1' placeholder = 'order number' >
  	<input type ='submit' name = 'query2' value = 'Search' >
  	</form>
END;
  }

 if(isset($_POST['number1']))
 {
 	$number1 = get_post($connection,'number1'); 
 	$query = "SELECT ordernumber,time,name,tele,clothes,price,status,comments FROM ".
 	"client WHERE ordernumber ='$number1'";
 	$result = $connection->query($query);
 	if(!$result) die( "Database access failed:".$connection->error);
 	$rows = $result->num_rows;
 	$result->data_seek(0);
 	$row = $result->fetch_array(MYSQLI_NUM);

 	$_SESSION['ordernumber'] = $row[0];
 	$_SESSION['time'] = $row[1];
 	$_SESSION['name'] = $row[2];
 	$_SESSION['tele'] = $row[3];
 	$_SESSION['clothes'] = $row[4];
 	$_SESSION['price'] = $row[5];
 	$_SESSION['status'] = $row[6];
 	$_SESSION['comments'] = $row[7];


 	if(!$row) {echo "no record/無紀錄";exit;}
 	echo <<< _END
 	<style>
 	table,td {
 		border:1px solid black;
 	}
 	</style>
<pre><table>
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
<form action = 'admin.php' method = 'post'>
<input type = 'hidden' name = 'modify' value = 'yes'>
 	<input type = 'submit' value = "Modify" >
 	</form>
_END;
 }

 if(isset($_POST['modify']))
 {
 	// echo $a[0];
 	$a1 = $_SESSION['ordernumber'];
 	$a2 = $_SESSION['time'];
 	$a3 = $_SESSION['name'];
 	$a4 = $_SESSION['tele'];
 	$a5 = $_SESSION['clothes'];
 	$a6 = $_SESSION['price'];
 	$a7 = $_SESSION['status'];
 	$a8 = $_SESSION['comments'];
 	echo $a8;

 		echo <<<_END
	<form action = 'admin.php' method = "post">
	<pre>
        Ordernumber $a1
	       Time <input type = "date" name = "time" value = '$a2'>
	       Name <input type = "text" name = "name"value = $a3 >
	       Tele <input type = "text" name = "tele" value = $a4>
	    Clothes <input type = "text" name = "clothes" value = $a5 >
	      Price <input type = "text" name = "price" value = $a6>
	     Status <select name = 'status' value = '$a7'>
	                 <option value = 'in_progress'>In Progress</option>
	                 <option value = 'ready_to_pick_up'>Ready to Pick Up</option>
	                 <option value = 'completed'>Completed</option>
	                 </select>
	   Comments <textarea name = "comments" rows = '10' cols = '50' >$a8</textarea>
	            <input type = 'hidden' name = 'save_cancel' value = 'yes'>
	            <input type = "submit" name = 'save' value = "SAVE" > <input type = "submit" name = 'cancel' onclick= "myfunction()" value = "Cancel" >
 </pre>
 </form>
_END;
 }

// if(isset($_POST['save_cancel'])&&isset($_POST['cancel']))
// {
// 	// echo '<script language = "javascript">';
// 	// echo "confirm('Are you sure to cancel?')";
// 	// echo "</script>";
// 	echo "cancelled";
// 	exit;
// }

 // if(!isset($_POST['ordernumber'])&&
 // 	isset($_POST['time'])   &&
 //      isset($_POST['name'])   &&
 //      isset($_POST['tele'])   &&
 //      isset($_POST['clothes'])   &&
 //      isset($_POST['price'])   &&   
 //      isset($_POST['status'])&&
 //      isset($_POST['comments']))
if(isset($_POST['save_cancel'])&&isset($_POST['save']))
 { 
 	$a1 = $_SESSION['ordernumber'];
 	// $ordernumber = get_post($connection,'ordernumber');
 	$time = get_post($connection,'time');
 	$name = get_post($connection,'name');
 	$tele = get_post($connection,'tele');
 	$clothes = get_post($connection,'clothes');
 	$price = get_post($connection,'price');
 	$status = get_post($connection,'status');
 	$comments = get_post($connection,'comments');
 	 $query = "UPDATE client SET time = '$time' ,name = '$name', tele = '$tele', clothes = '$clothes',price = '$price', status = '$status' ,comments = '$comments' WHERE ordernumber=$a1";
 	// $query = "UPDATE client SET tele = '$tele' , clothes = '$clothes' WHERE ordernumber=$a1";
 	
 	$result = $connection->query($query);

 	if(!$result) echo "UPDATE failed:$query<br>".
 		$connection->error. "<br><br>";
 	else echo "saved sucessfully";

 }

 if(isset($_POST['ordernumber'])   &&
      isset($_POST['time'])   &&
      isset($_POST['name'])   &&
      isset($_POST['tele'])   &&
      isset($_POST['clothes'])   &&
      isset($_POST['price'])   &&   
       isset($_POST['status'])&&
      isset($_POST['comments']))
 { 
 	$ordernumber = get_post($connection,'ordernumber');
 	$time = get_post($connection,'time');
 	$name = get_post($connection,'name');
 	$tele = get_post($connection,'tele');
 	$clothes = get_post($connection,'clothes');
 	$price = get_post($connection,'price');
 	$status = get_post($connection,'status');
 	$comments = get_post($connection,'comments');
 	$query = "INSERT INTO client VALUES".
 	"('$ordernumber','$time','$name','$tele','$clothes','$price','$status','$comments')";
 	$result = $connection->query($query);

 	if(!$result) echo "INSERT failed:$query<br>".
 		$connection->error. "<br><br>";
 	else echo "Added successfully!";

 }
?>

