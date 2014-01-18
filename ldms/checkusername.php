<?php
	include 'dblink.php';
	$username = $_POST['username'];
	$sql = "SELECT * FROM users where username='".$username."'";
	$result = mysql_query($sql);
	$row = mysql_num_rows($result);
	echo $row;
	// while($row = mysql_fetch_assoc($result)){
	// 	echo "<li>".$row['username'].": ";
	// 	echo $row['password']."-".$row['pi']."</li>";
	// }
?>