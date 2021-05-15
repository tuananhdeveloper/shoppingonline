<?php 
	$user="root";
	$pass="";
	$database="webdemo";
	$conn = mysqli_connect("localhost",$user,$pass,$database);
	mysqli_set_charset($conn, 'UTF8');
?>