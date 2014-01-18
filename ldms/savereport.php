<?php
	include 'dblink.php';
	session_start();
	$username = $_POST['username'];
	$title = $_POST['title'];
	$description = $_POST['description'];
	$content = mysql_real_escape_string($_POST['content']);
	$pi = $_SESSION['pi'];
	$v = 0;
	if( $pi == "NONE")
		$v = 1;

	$sql = "Delete from reports where username='".$username."' and title='".$title."' and verified=".$v;
	mysql_query($sql);
	
	$sql = "INSERT into reports values(".
		"'".$username."',"
		."'".$title."',"
		."'".$description."',"
		."'".$content."',"
		."NULL,"
		.$v.");"
	;
	echo $sql;
	mysql_query($sql);
?>