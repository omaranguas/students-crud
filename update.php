<?php
include("database.php");

if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$query = "SELECT * FROM students WHERE id = $id";
	$result = mysqli_query($conn, $query);

	if (mysqli_num_rows($result) == 1) {
		$row = mysqli_fetch_array($result);
		$firstname = $row['firstname'];
		$lastname = $row['lastname'];
		$datebirth = $row['datebirth'];
	}
}

if (isset($_POST['update'])) {
	$id = $_GET['id'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$datebirth = $_POST['datebirth'];

	$query = "UPDATE students set firstname = '$firstname', lastname = '$lastname', datebirth = '$datebirth' WHERE id = $id";
	mysqli_query($conn, $query);

	$_SESSION['message'] = 'Updated student';
	$_SESSION['message_type'] = 'info';

	header("Location: index.php");
}
?>

<?php include("includes/header.php"); ?>

<div class="container p-4">
	<div class="row">
		<div class="col-md-4 mx-auto">
			<div class="card card-body">
				<form action="update.php?id=<?php echo $_GET['id']; ?>" method="POST">
					<div class="form-group">
						<input type="text" name="firstname" value="<?php echo $firstname; ?>" class="form-control" placeholder="Update name" autofocus>
					</div>
					<div class="form-group">
						<input type="text" name="lastname" value="<?php echo $lastname; ?>" class="form-control" placeholder="Update lastname">
					</div>
					<div class="form-group">
						<input type="date" name="datebirth" value="<?php echo $datebirth; ?>" class="form-control">
					</div>
					<button type="submit" class=" btn btn-success" name="update">Update student</button>
				</form>
			</div>
		</div>
	</div>
</div>

<?php include("includes/footer.php"); ?>