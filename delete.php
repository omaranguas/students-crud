<?php 
	include("database.php"); 

	if (isset($_GET['id'])){
		$id = $_GET['id'];
		$query = "DELETE FROM students WHERE id = $id";
		$result = mysqli_query($conn, $query);

		if (!$result){
			die("Connection has not been established");
		}

		$_SESSION['message'] = 'Eliminated student';
		$_SESSION['message_type'] = 'danger';
		header("Location: index.php");
	}
?>