<?php
$mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_password = "harshit";
$mysql_database = "ldms";

$con = mysql_connect($mysql_hostname, $mysql_user, $mysql_password,$mysql_database) 
or die("Could not connect to database: ".mysql_error());

mysql_select_db($mysql_database, $con) or die("Could not select database: ".mysql_error());

if(isset($_GET['c'])){
	$sql = "CREATE TABLE users
	(
		username VARCHAR(20) NOT NULL,
		firstname VARCHAR(30) NOT NULL,
		lastname VARCHAR(30),
		password VARCHAR(20) NOT NULL,
		emailid VARCHAR(30) NOT NULL,
		pi VARCHAR(20) NOT NULL,
		PRIMARY KEY (username)
	);";
	$result = mysql_query($sql);

	$sql = "CREATE TABLE reports
	(
		username VARCHAR(20) NOT NULL,
		title VARCHAR(100) NOT NULL,
		time timestamp NOT NULL,
		verified INT DEFAULT '0',
		PRIMARY KEY (username,title,time),
		FOREIGN KEY (username) REFERENCES users(username)
	);";
	$result = mysql_query($sql);
	echo "tables created!";
}
else{
	/*$sql = "SELECT * FROM users;";
	$result = mysql_query($sql);
	while($row = mysql_fetch_assoc($result)){
		echo "<li>".$row['username'].": ";
		echo $row['password']."-".$row['pi']."</li>";
	}*/
}

?>
