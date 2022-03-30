<?php
include('frame/navbar.php');
include('config/cookie.php');

// if(isset($_SESSION['user_id'])){
//     $id = $_SESSION['user_id'];   
// }

// if(isset($_SESSION['username'])){
//     $username = $_SESSION['username'];
// }  

// $sql = "SELECT * FROM user WHERE id = '$id'";
// $res = mysqli_query($conn, $sql);
// $user = mysqli_fetch_assoc($res);
// $name = $user['name'];
// $role = $user['role'];
?>
<nav class="navbar navbar-light bg-dark" style="margin-left: 1%; margin-right: 1%;">
	<a class="navbar-brand text-light">Selamat Datang <?php echo $_name; ?></a>
	<form class="form-inline d-flex justify-content-between">
		<a href="logout.php" class="btn btn-outline-danger my-2 my-sm-0 mx-1" type="submit">Logout</a>
	</form>
</nav>
<div class="row">
	<div class="col-lg-12 margin-tb">
		<div class="text-center mt-3 mb-5">
			<h2>Daftar Pembalap F1 2022</h2>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="text-right mb-4" style="margin-right: 1%;">
			<a class="btn btn-success" href="action/add.php">
				Tambah Pembalap
			</a>
		</div>
		<div>
		</div>
		<?php
		if (isset($_SESSION['login'])) {
			echo $_SESSION['login'];
			unset($_SESSION['login']);
		}
		if (isset($_SESSION['add'])) {
			echo $_SESSION['add'];
			unset($_SESSION['add']);
		}
		if (isset($_SESSION['delete'])) {
			echo $_SESSION['delete']; //Display session message
			unset($_SESSION['delete']); //Removing session message
		}
		if (isset($_SESSION['update'])) {
			echo $_SESSION['update']; //Display session message
			unset($_SESSION['update']); //Removing session message
		}

		if (isset($_SESSION['check-login'])) {
			echo $_SESSION['check-login']; //Display session message
			unset($_SESSION['check-login']); //Removing session message
		}
		?>
		<div class="container-fluid mt-4 mb-5">
			<table class="table table-bordered" id="list_driver">
				<thead class="table-dark">
					<tr class="text-center">
						<th>No</th>
						<th>Nama</th>
						<th>Tim</th>
						<th>Kebangsaan</th>
						<th>Nomor</th>
						<th>Action</th>
					</tr>
				</thead>
				<?php
				//Create a SQL Query to get all the food
				$sql = "SELECT * FROM driver";
				//Execute the query
				$res = mysqli_query($conn, $sql);

				//Count the rows to check whether we have food or not
				$count = mysqli_num_rows($res);

				//Create sn or id
				$sn = 1;

				if ($count > 0) {
					//We have food
					//Get the foods drom database and display
					while ($row = mysqli_fetch_assoc($res)) {
						//Get the value from individual column
						$id_driver = $row['id_driver'];
						$name = $row['name'];
						$team = $row['team'];
						$nation = $row['nation'];
						$number = $row['number'];
				?>

						<tr>
							<td class="text-center"><?php echo $sn++; ?></td>
							<td><?php echo $name; ?></td>
							<td><?php echo $team; ?></td>
							<td><?php echo $nation; ?></td>
							<td class="text-center"><?php echo $number; ?></td>
							<?php
							if ($role == "Admin") {
								$_SESSION['login'] = "";
							?>
								<td class="text-center">
									<a class="btn btn-primary" href="<?php echo SITEURL; ?>action/edit.php?id_driver=<?php echo $id_driver; ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
									<a class="btn btn-warning" href="<?php echo SITEURL; ?>action/show.php?id_driver=<?php echo $id_driver; ?>"><i class="fa fa-info" aria-hidden="true"></i></a>
									<a class="btn btn-danger" href="<?php echo SITEURL; ?>action/delete.php?id_driver=<?php echo $id_driver; ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
								</td>
						</tr>
					<?php
							} else if ($role == "User") {
					?>
						<td class="text-center">NULL</td>
			<?php
							}
						}
					}
			?>
			</table>
		</div>
		</body>

		</html>