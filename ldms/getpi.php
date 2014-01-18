<?php
	include 'dblink.php';
	$sql = "SELECT * FROM users where pi='NONE'";
	$result = mysql_query($sql);
	while($row = mysql_fetch_assoc($result)){
		echo "<li>\n<a href='#'
		 id='pi-".$row['username']
			."' >".$row['username']."\n</a>\n</li>";
	}
?>