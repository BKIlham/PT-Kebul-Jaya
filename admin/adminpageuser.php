<?php
include '../koneksi.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Admin Page</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="../assets/css/admin.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>

	<a href="adminpageartikel.php" >artikel</a><br>
	<a href="adminpagetopik.php" >topik</a><br>
	<a href="adminpagefotoartikel.php" >foto artikel</a><br>
	<a href="adminpagebalasan.php" >balasan</a><br>
	<a href="adminpageuser.php" >user</a><br>

    <div class="container">
		<div class="table-responsive">
			<div class="table-wrapper">
				<div class="table-title">
					<div class="row">
						<div class="col-xs-6">
							<h2>Manage <b>User</b></h2>
						</div>
						<div class="col-xs-6">
							<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New User</span></a>
							<a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>						
						</div>
					</div>
				</div>
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>
								<span class="custom-checkbox">
									<input type="checkbox" id="selectAll">
									<label for="selectAll"></label>
								</span>
							</th>
							<th>Id User</th>
							<th>Username</th>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Email</th>
							<th>Password</th>
							<th>foto</th>
                            <th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$sql = "SELECT * FROM user";

							$result = $conn->query($sql);
							
							// Tampilkan data dalam tabel HTML
							if ($result->num_rows > 0) {
								while ($row = $result->fetch_assoc()) {
									echo '<tr>';
									echo '<td><span class="custom-checkbox"><input type="checkbox" id="checkbox1" name="options[]" value="' . $row['id_user'] . '"><label for="checkbox1"></label></span></td>';
									echo '<td>' . $row['id_user'] . '</td>';
									echo '<td>' . $row['username'] . '</td>';
									echo '<td>' . $row['first_name'] . '</td>';
									echo '<td>' . $row['last_name'] . '</td>';
									echo '<td>' . $row['email'] . '</td>';
									echo '<td>' . $row['password'] . '</td>';
									echo '<td><img src="../img/user/' . $row['foto'] .'" alt="" width="100px"></td>';
									echo '<td>
											<a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
											<a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
										</td>';
									echo '</tr>';
								}
							} else {
								echo '<tr><td colspan="7">Tidak ada data</td></tr>';
							}
							
							// Tutup koneksi
							$conn->close();
						?>
					</tbody>
				</table>
			</div>
		</div>        
    </div>
	<!-- Add Modal HTML -->
	<div id="addEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="tambah_user.php" method="post" enctype="multipart/form-data">
					<div class="modal-header">						
						<h4 class="modal-title">Add User</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Id User</label>
							<input type="text" class="form-control" name="id_user" >
						</div>
						<div class="form-group">
							<label>Username</label>
							<input type="text" class="form-control" name="username" required>
						</div>
						<div class="form-group">
							<label>First Name</label>
							<input type="text" class="form-control" name="first_name" required>
						</div>
                        <div class="form-group">
							<label>Last Name</label>
							<input type="text" class="form-control" name="last_name" required>
						</div>
                        <div class="form-group">
							<label>Email</label>
							<input type="email" class="form-control" name="email" required>
						</div>
                        <div class="form-group">
							<label>Password</label>
							<input type="password" class="form-control" name="password" required>
						</div>
						<div class="form-group">
							<label>Foto</label>
							<input type="file" class="form-control-file" id="profile_picture" name="profile_picture" required>
						</div>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-success" value="Add" name="submit">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Edit Modal HTML -->
	<div id="editEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
					<div class="modal-header">						
						<h4 class="modal-title">Edit User</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Id User</label>
							<input type="text" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Username</label>
							<input type="text" class="form-control" required>
						</div>
						<div class="form-group">
							<label>First Name</label>
							<input type="email" class="form-control" required>
						</div>
                        <div class="form-group">
							<label>Last Name</label>
							<input type="email" class="form-control" required>
						</div>
                        <div class="form-group">
							<label>Email</label>
							<input type="email" class="form-control" required>
						</div>
                        <div class="form-group">
							<label>Password</label>
							<input type="email" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Foto</label>
							<input type="text" class="form-control" required>
						</div>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-info" value="Save">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Delete Modal HTML -->
	<div id="deleteEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
					<div class="modal-header">						
						<h4 class="modal-title">Delete User</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<p>Are you sure you want to delete these Records?</p>
						<p class="text-warning"><small>This action cannot be undone.</small></p>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-danger" value="Delete">
					</div>
				</form>
			</div>
		</div>
	</div>

	<script src="../assets/js/main.js"></script>
	<script src="../assets/js/admin.js"></script>
</body>
</html>