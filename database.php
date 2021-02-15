<?php
	session_start();
	$conn = mysqli_connect(
		'localhost',
		'root',
		'1234',
		'school'
	);

	if (!$conn){
		die("Connection has not been established");
	}
?>