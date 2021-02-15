<?php include("database.php") ?>
<?php include("includes/header.php") ?>
<?php include("includes/footer.php") ?>

<div class="container p-4">
	<div class="row">
		<div class="col-md-3">
			<?php if(isset($_SESSION['message'])){ ?>
				<div class="alert alert-<?=$_SESSION['message_type']?> alert-dismissible fade show" role="alert">
				  <?= $_SESSION['message'] ?>
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				  	<span aria-hidden="true">&times;</span>
				  </button>
				</div>
			<?php session_unset(); } ?>

			<div class="card card-body">
				<form action="create.php" method="POST">
					<div class="form-group">
						<input type="text" name="firstname" class="form-control" placeholder="Name" autofocus>
					</div>
					<div class="form-group">
						<input type="text" name="lastname" class="form-control" placeholder="Last name">
					</div>
					<div class="form-group">
						<input type="date" name="datebirth" class="form-control">
					</div>
					<input type="submit" name="create" class="btn btn-success btn-block" value="Submit">
				</form>
			</div>	
		</div>
		<div class="col-md-9">
			<table class="table table-bordered">
				<thead class="thead-dark">
					<tr>
						<th>Firts name</th>
						<th>Last name</th>
						<th>Date of birth</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$query = "SELECT * FROM students";
					$result = mysqli_query($conn, $query);

					while($row = mysqli_fetch_array($result)) { ?>
						<tr>
							<td><?php echo $row['firstname'] ?></td>
							<td><?php echo $row['lastname'] ?></td>
							<td><?php echo $row['datebirth'] ?></td>
							<td>
								<a href="update.php?id=<?php echo $row['id']?>" class="btn btn-primary">
									<i class="fas fa-user-edit"></i>
								</a>
								<a href="delete.php?id=<?php echo $row['id']?>" class="btn btn-danger">
									<i class="fas fa-user-times"></i>
								</a>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>