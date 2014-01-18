<?php
	include 'dblink.php';
	session_start();
	$title = $_POST['title'];
	$description = $_POST['description'];
	$content = $_POST['content'];
	$pi = $_SESSION['pi'];
	file_put_contents('C:\xampp\htdocs\ldms\temp\input.html',$title."<br>".$description."<br>".$content);
	$command = 'E:\"Program Files"\wkhtmltopdf\wkhtmltopdf.exe C:\xampp\htdocs\ldms\temp\input.html C:\xampp\htdocs\ldms\temp\output.pdf';
	exec($command);
?>