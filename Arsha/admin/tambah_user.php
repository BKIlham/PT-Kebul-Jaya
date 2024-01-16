<?php
include "koneksi.php";

if (isset($_POST['submit'])) {
    $id_user = $_POST['id_user'];
    $username = $_POST['username'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $foto = $_POST['foto'];

    // Proses tambah data ke database
    $sql = "INSERT INTO user (id_user, username, first_name, last_name, email, password, foto) 
            VALUES ('$id_user', '$username', '$first_name', '$last_name', '$email', '$password', '$foto')";

    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("User added successfully");</script>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Tutup koneksi
$conn->close();
?>

<!-- Setelah proses penambahan selesai, arahkan kembali ke halaman yang diinginkan -->
<script>
    window.location.href = "adminpageuser.php";
</script>
