<?php
session_start();
include 'koneksi.php';

// Pastikan pengguna telah login
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Memproses pembuatan topik saat formulir dikirim
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Mengambil data dari formulir
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];
    $id_user = $_SESSION['user_id'];
    
    // Mendapatkan waktu saat ini
    date_default_timezone_set('Asia/Jakarta');
    $waktu_dibuat = date('Y-m-d H:i:s');

    // Menyiapkan kueri SQL untuk menyimpan topik ke database
    $create_topik_query = "INSERT INTO topik (judul, deskripsi, id_user, waktu_dibuat) VALUES ('$judul', '$deskripsi', $id_user, '$waktu_dibuat')";
    
    // Menjalankan kueri SQL
    $create_topik_result = mysqli_query($conn, $create_topik_query);

    if ($create_topik_result) {
        // Topik berhasil dibuat
        header('Location: forum.php?success=create');
        exit();
    } else {
        // Mengatasi kesalahan kueri
        die("Database query failed while creating topic: " . mysqli_error($koneksi));
    }
}
?>
