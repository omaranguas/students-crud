<?php
	include("database.php");

	if (isset($_POST['create'])){
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$datebirth = $_POST['datebirth'];

		$query = "INSERT INTO students(firstname, lastname, datebirth) VALUES ('$firstname', '$lastname', '$datebirth')";

		$result = mysqli_query($conn, $query);

		if (!$result){
			die("Connection has not been established");
		}

		$_SESSION['message'] = "Registered student";
		$_SESSION['message_type'] = 'success';

		header("Location: index.php");
	}
?>