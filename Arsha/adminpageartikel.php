<?php
include "koneksi.php";

$query = "SELECT id_artikel, judul, kategori, id_user, isi, waktu_dibuat FROM artikel";
$result = mysqli_query($koneksi, $query);
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
                        <!-- ... Bagian header tetap sama seperti sebelumnya ... -->
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
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Penulis/Pembuat</th>
                            <th>Isi</th>
                            <th>Waktu dibuat</th>
                            <th>Pelihat</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Menampilkan data artikel ke dalam tabel
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>
                                    <span class='custom-checkbox'>
                                        <input type='checkbox' id='checkbox1' name='options[]' value='{$row['id_artikel']}'>
                                        <label for='checkbox1'></label>
                                    </span>
                                </td>";
                            echo "<td>{$row['judul']}</td>";
                            echo "<td>{$row['kategori']}</td>";
                            
                            // Ambil nama user berdasarkan id_user
                            $queryUser = "SELECT username FROM user WHERE id_user = {$row['id_user']}";
                            $resultUser = mysqli_query($koneksi, $queryUser);
                            $userData = mysqli_fetch_assoc($resultUser);
                            echo "<td>{$userData['username']}</td>";
                            
                            echo "<td>{$row['isi']}</td>";
                            echo "<td>{$row['waktu_dibuat']}</td>";
                            echo "<td>[Jumlah Pelihat]</td>";
                            echo "<td>
                                    <a href='#editEmployeeModal' class='edit' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Edit'>&#xE254;</i></a>
                                    <a href='#deleteEmployeeModal' class='delete' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Delete'>&#xE872;</i></a>
                                </td>";
                            echo "</tr>";
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
						<h4 class="modal-title">Add Artikel</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Judul Artikel</label>
							<input type="text" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Kategori</label>
							<input type="email" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Isi</label>
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
						<h4 class="modal-title">Edit Artikel</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Judul Artikel</label>
							<input type="text" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Kategori</label>
							<input type="email" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Isi</label>
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
						<h4 class="modal-title">Delete Artikel</h4>
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