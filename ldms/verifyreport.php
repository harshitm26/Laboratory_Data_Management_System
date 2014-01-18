<?php
	include 'dblink.php';
	$title = $_POST['title'];
	$username = $_POST['username'];
	$decision = $_POST['decision'];
	if((int)$decision == 1){
		$sql = "DELETE from reports where username='".$username."' and title='".$title."' and verified=1";
		mysql_query($sql);
		$sql = "UPDATE reports SET verified=1 where title='".$title."' AND username='".$username."'";
		$result = mysql_query($sql);
	}
	else{
		/*TODO Add code for discarding the update */
	}
	echo $sql;
?>