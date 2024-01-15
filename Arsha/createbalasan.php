<?php
session_start();
include 'koneksi.php';

// Pastikan pengguna telah login
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Memproses pembuatan balasan saat formulir dikirim
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Mengambil data dari formulir
    $id_topik = $_POST['id_topik'];
    $isi_balasan = $_POST['deskripsi'];
    $id_user = $_SESSION['user_id'];
    
    // Mendapatkan waktu saat ini
    date_default_timezone_set('Asia/Jakarta');
    $waktu_dibuat = date('Y-m-d H:i:s');

    // Menyiapkan kueri SQL untuk menyimpan balasan ke database
    $create_balasan_query = "INSERT INTO balasan (id_topik, id_user, isi_balasan, waktu_dibuat) VALUES ($id_topik, $id_user, '$isi_balasan', '$waktu_dibuat')";
    
    // Menjalankan kueri SQL
    $create_balasan_result = mysqli_query($conn, $create_balasan_query);

    if ($create_balasan_result) {
        // Balasan berhasil dibuat
        header("Location: forumread.php?id=$id_topik");
        exit();
    } else {
        // Mengatasi kesalahan kueri
        die("Database query failed while creating reply: " . mysqli_error($conn));
    }
}
?>
