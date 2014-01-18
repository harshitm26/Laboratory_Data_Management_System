<?php
	include 'dblink.php';
	$username = $_POST['username'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$emailid = $_POST['emailid'];
	$password1 = $_POST['password1'];
	$pi = $_POST['pi'];
	$sql = "INSERT into users values (".
		"'".$username."',"
		."'".$firstname."',"
		."'".$lastname."',"
		."'".$password1."',"
		."'".$emailid."',"
		."'".$pi."');"
	;
	echo $sql;
	mysql_query($sql);
?>