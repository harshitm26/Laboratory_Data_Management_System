<?php
	include 'dblink.php';
	session_start();
	$username = $_POST['username'];
	$title = $_POST['title'];
	$verified = $_POST['verified'];
	$comment = mysql_real_escape_string($_POST['comment']);
	$owner = $_SESSION['username'];

	$sql = "INSERT into comments values(".
		"'".$username."',"
		."'".$title."',"
		."'".(int)$verified."',"
		."'".$comment."',"
		."'".$owner."',"
		."NULL);"
	;
	mysql_query($sql);
	//echo $sql;
	echo $owner;
?>