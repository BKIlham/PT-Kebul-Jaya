<?php
include 'koneksi.php';
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
<link href="assets/css/admin.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
    <div class="container">
		<div class="table-responsive">
			<div class="table-wrapper">
				<div class="table-title">
					<div class="row">
						<div class="col-xs-6">
							<h2>Manage <b>Balasan</b></h2>
						</div>
						<div class="col-xs-6">
							<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Balasan</span></a>
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
                            <th>Judul Topik</th>
							<th>Name User</th>
							<th>Isi Balasan</th>
							<th>Waktu dibuat</th>
                            <th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$sql = "SELECT b.id_balasan, t.judul as judul_topik, u.username as user, b.isi_balasan, b.waktu_dibuat
							FROM balasan b
							INNER JOIN topik t ON b.id_topik = t.id_topik
							INNER JOIN user u ON b.id_user = u.id_user";
					
							$result = $conn->query($sql);
							
							// Tampilkan data dalam tabel HTML
							if ($result->num_rows > 0) {
								while ($row = $result->fetch_assoc()) {
									echo '<tr>';
									echo '<td><span class="custom-checkbox"><input type="checkbox" id="checkbox1" name="options[]" value="' . $row['id_balasan'] . '"><label for="checkbox1"></label></span></td>';
									echo '<td>' . $row['judul_topik'] . '</td>';
									echo '<td>' . $row['user'] . '</td>';
									echo '<td>' . $row['isi_balasan'] . '</td>';
									echo '<td>' . $row['waktu_dibuat'] . '</td>';
									echo '<td>
											<a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
											<a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
										</td>';
									echo '</tr>';
								}
							} else {
								echo '<tr><td colspan="6">Tidak ada data</td></tr>';
							}
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
				<form>
					<div class="modal-header">						
						<h4 class="modal-title">Add Balasan</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Judul Topik</label>
							<input type="text" class="form-control" required>
						</div>
                        <div class="form-group">
							<label for="id_user">Name User:</label>
							<select class="form-control" name="id_user" required>
							</select>
						</div>
						<div class="form-group">
							<label>Isi Balasan</label>
							<textarea class="form-control" required></textarea>
						</div>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-success" value="Add">
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
						<h4 class="modal-title">Edit Balasan</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Judul Topik</label>
							<input type="text" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Isi Balasan</label>
							<textarea class="form-control" required></textarea>
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
						<h4 class="modal-title">Delete Balasan</h4>
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

	<script src="assets/js/main.js"></script>
	<script src="assets/js/admin.js"></script>
</body>
</html>